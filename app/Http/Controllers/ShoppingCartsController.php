<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Deal;
use Session;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
Class ShoppingCartsController extends Controller{

	private $paypal;
	private $paypalApiContext;

	public function __construct()
	{
		$oAuth = new OAuthTokenCredential(config('services.paypal.client_id'),config('services.paypal.secret'));
		$this->paypalApiContext = new ApiContext($oAuth);

//		$this->paypalApiContext->setConfig(array(
//			'mode' => 'sandbox',
//			'service.EndPoint' => 'https://api.sandbox.paypal.com',
//			'http.ConnectionTimeOut' => 30,
//			'log.LogEnabled' => true,
//			'log.FileName' => storage_path('logs/paypal.log'),
//			'log.LogLevel' => 'FINE'
//		));

	}
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
					//$aProducts = array_values($aProducts);
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

	public function getPaypalCheckOut()
	{
		$cart = Session::get('products');
		if( empty( $cart ) )
			return redirect()->action('ShoppingCartsController@index');

		$total = 0;
		$items = array();
		foreach( $cart AS $product )
		{
			$total += ( $product['new_price'] * $product['quantity'] );
			$cart_item = new Item();
			$cart_item->setName($product['title'])
				->setCurrency('USD')
				->setQuantity($product['quantity'])
				->setPrice($product['new_price']);
			$items[] = $cart_item;
		}

		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$itemList = new ItemList();
		$itemList->setItems($items);
//		$details = new Details();
//		$details->setShipping(1.2)
//			->setTax(1.3)
//			->setSubtotal(17.50);
		$amount = new Amount();
		$amount->setCurrency("USD")
			->setTotal($total);
			//->setDetails($details);
		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($itemList)
			->setDescription("Purchases From Tribal Square")
			->setInvoiceNumber(uniqid());
		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl(action('ShoppingCartsController@getPaymentDone'))
			->setCancelUrl(action('ShoppingCartsController@getPaymentCancel'));

		$payment = new Payment();
		$payment->setIntent("order")
			->setPayer($payer)
			->setRedirectUrls($redirectUrls)
			->setTransactions(array($transaction));

		//$request = clone $payment;
		try {
			$payment->create($this->paypalApiContext);
		} catch (Exception $ex) {
			//ResultPrinter::printError("Created Payment Order Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
			exit(1);
		}
		$approvalUrl = $payment->getApprovalLink();

		return redirect()->to($approvalUrl);
	}

	public function getPaymentDone()
	{
		dd(Request::all());
	}

	public function getPaymentCancel()
	{

	}

}

