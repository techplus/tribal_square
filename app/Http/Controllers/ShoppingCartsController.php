<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Deal;
use Session;

Class ShoppingCartsController extends Controller{

	public function getIndex()
	{		
		$aProducts = array();
		//Session::pull('products');
		if( Session::has('products') )
		{				
			$aProducts = Session::get('products');
		}
		
		$this->data['aProducts'] = $aProducts;
		return $this->renderView('front.shopping_cart');
	}

	public function postSetSession()
	{
		if( Request::has('deal_id') AND Request::has('quantity') )
		{								
			$aProducts = array();
			
			$bFlag = 1;	 // add new product

			if( Session::has('products') )
			{
				$aProducts = Session::get('products');					
				if( !empty($aProducts) ){					
					foreach( $aProducts as $key => $aPro )
					{
						if( $aPro['id'] == Request::get('deal_id') )
						{
							$aProducts[$key]['quantity'] = Request::get('quantity');
							$bFlag = 0;
						}
					}				
				}
			}

			if( $bFlag ){
				$oProduct = Deal::with( [ 'DealImages' => function($q) {
					$q->where( 'is_cover' ,'=', 1);
				} ] )->find(Request::get('deal_id'));

				if( !$oProduct )
					return response()->json([ 'error' => "Couldn't find Deal" ],404);
				if( $oProduct->DealImages->count() > 0 )
				{
					$oProduct->image_path = $oProduct->DealImages->first()->image_path;
				}

				$oProduct->quantity = Request::get('quantity');				
				$aProduct = $oProduct->toArray();
				$aProducts[] = $aProduct;			
			}

			Session::put('products',$aProducts);
			return response()->json([],200);			
		}			
	}

	public function postChangeQuantity()
	{
		if( Request::has('id') AND Request::has('new_quantity') AND Request::has('key') )
		{
			if( Session::has('products') )
			{
				$aProducts = Session::get('products');
				$aProduct = $aProducts[ Request::get('key') ];
				if( $aProduct[ 'id' ] ==  Request::get('id') ){
					$aProduct[ 'quantity' ] = Request::get('new_quantity');	
					$aProducts[ Request::get('key') ] = $aProduct; 				 
					Session::put('products',$aProducts);
					return response()->json([],200);
				}
			}
		}
		return response()->json(['error'=>'Something went wrong , Please try again'] , 500 );
	}

	public function postRemoveProduct()
	{
		if( Request::has('id') AND Request::has('key') )
		{	
			if( Session::has('products') )
			{
				$aProducts = Session::get('products');
				$aProduct = $aProducts[ Request::get('key') ];
				if( $aProduct[ 'id' ] ==  Request::get('id') ){					
					unset( $aProducts[ Request::get('key') ] );
					$aProducts = array_values($aProducts);
					if( count($aProducts) > 0 )
						Session::put('products',$aProducts);
					else
						Session::pull('products');
					return response()->json([],200);
				}
			}
		}
		return response()->json(['error'=>'Something went wrong , Please try again'] , 500 );
	}

}

