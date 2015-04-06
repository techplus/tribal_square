<?php namespace App\Http\Controllers;

use Auth;
use Request;
use App\Models\Deal;
use Session;
use App\Repositories\PaypalRest\PaypalRestInterface;
use App\Models\Transaction;
use App\Models\Purchase;

Class ShoppingCartsController extends Controller
{

	private $paypal;

	public function __construct ( PaypalRestInterface $paypal )
	{
		$this->paypal = $paypal;
	}

	public function getIndex ()
	{
		$aProducts = array ();
		//Session::pull('products');
		if ( Session::has( 'products' ) ) {
			$aProducts = Session::get( 'products' );
		}

		$this->data[ 'aProducts' ] = $aProducts;

		return $this->renderView( 'front.shopping_cart' );
	}

	public function postSetSession ()
	{
		if ( Request::has( 'deal_id' ) AND Request::has( 'quantity' ) ) {
			$aProducts = array ();

			$bFlag = 1;     // add new product

			if ( Session::has( 'products' ) ) {
				$aProducts = Session::get( 'products' );
				if ( ! empty( $aProducts ) ) {
					foreach ( $aProducts as $key => $aPro ) {
						if ( $aPro[ 'id' ] == Request::get( 'deal_id' ) ) {
							$aProducts[ $key ][ 'quantity' ] = Request::get( 'quantity' );
							$bFlag = 0;
						}
					}
				}
			}

			if ( $bFlag ) {
				$oProduct = Deal::with( [
					'DealImages' => function ( $q ) {
						$q->where( 'is_cover' , '=' , 1 );
					}
				] )->find( Request::get( 'deal_id' ) );

				if ( ! $oProduct )
					return response()->json( [ 'error' => "Couldn't find Deal" ] , 404 );
				if ( $oProduct->DealImages->count() > 0 ) {
					$oProduct->image_path = $oProduct->DealImages->first()->image_path;
				}

				$oProduct->quantity = Request::get( 'quantity' );
				$aProduct = $oProduct->toArray();
				$aProducts[ ] = $aProduct;
			}

			Session::put( 'products' , $aProducts );

			return response()->json( [ ] , 200 );
		}
	}

	public function postChangeQuantity ()
	{
		if ( Request::has( 'id' ) AND Request::has( 'new_quantity' ) AND Request::has( 'key' ) ) {
			if ( Session::has( 'products' ) ) {
				$aProducts = Session::get( 'products' );
				$aProduct = $aProducts[ Request::get( 'key' ) ];
				if ( $aProduct[ 'id' ] == Request::get( 'id' ) ) {
					$aProduct[ 'quantity' ] = Request::get( 'new_quantity' );
					$aProducts[ Request::get( 'key' ) ] = $aProduct;
					Session::put( 'products' , $aProducts );

					return response()->json( [ ] , 200 );
				}
			}
		}

		return response()->json( [ 'error' => 'Something went wrong , Please try again' ] , 500 );
	}

	public function postRemoveProduct ()
	{
		if ( Request::has( 'id' ) AND Request::has( 'key' ) ) {
			if ( Session::has( 'products' ) ) {
				$aProducts = Session::get( 'products' );
				$aProduct = $aProducts[ Request::get( 'key' ) ];
				if ( $aProduct[ 'id' ] == Request::get( 'id' ) ) {
					unset( $aProducts[ Request::get( 'key' ) ] );
					//$aProducts = array_values($aProducts);
					if ( count( $aProducts ) > 0 )
						Session::put( 'products' , $aProducts );
					else
						Session::pull( 'products' );

					return response()->json( [ ] , 200 );
				}
			}
		}

		return response()->json( [ 'error' => 'Something went wrong , Please try again' ] , 500 );
	}

	public function getPaypalCheckOut ()
	{
		$cart = Session::get( 'products' );
		if ( empty( $cart ) )
			return redirect()->action( 'ShoppingCartsController@index' );

		$total = 0;
		foreach ( $cart AS $product ) {
			$total += ( $product[ 'new_price' ] * $product[ 'quantity' ] );
			$this->paypal->addItem( array (
				'id'       => $product[ 'id' ] ,
				'title'    => $product[ 'title' ] ,
				'quantity' => $product[ 'quantity' ] ,
				'price'    => $product[ 'new_price' ]
			) );
		}

		//to add shipping tax and subtotal
		//$this->paypal->addDetails($shipping,$tax,$subtotal);

		$this->paypal->addPayer();

		$this->paypal->addAmount( 'Purchases From Tribal Square' , $total );

		$this->paypal->addRedirectUrls( action( 'ShoppingCartsController@getPaymentDone' ) , action( 'ShoppingCartsController@getPaymentCancel' ) );

		$approvalUrl = $this->paypal->pay();

		return redirect()->to( $approvalUrl );
	}

	public function getPaymentDone ()
	{
		if( ! Session::has('products') )
			return redirect()->action('ShoppingCartsController@getIndex');
		$payment = $this->paypal->executePayment(Request::input('PayerID'),Request::input('paymentId'));
		//$payment = $this->paypal->getPayment( Request::input( 'paymentId' ) );
		$payer = $payment->getPayer()->getPayerInfo();
		$transactions = $payment->getTransactions();
		$transaction = reset($transactions);
		$already_exists = Transaction::where('txn_id',$payment->getId())->first();
		if( $already_exists )
		{
			return redirect()->action('ShoppingCartsController@getIndex');
		}
		$system_transaction = Transaction::create( [
			'type'           => 'paypal' ,
			'email'          => $payer->getEmail() ,
			'txn_id'         => $payment->getId() ,
			'amount'         => $transaction->getAmount()->getTotal() ,
			'currency'       => config( 'paypal.currency' ) ,
			'invoice_number' => $transaction->getInvoiceNumber()
		] );
		$this->data[ 'transaction' ] = $system_transaction;
		$items = $transaction->getItemList()->getItems();
		$this->data[ 'purchases' ] = array ();
		foreach ( $items AS $item ) {
			$this->data[ 'purchases' ][ ] = Purchase::create( [
				'item_id'   => $item->getSku() ,
				'order_id'  => $system_transaction->id ,
				'user_id'   => Auth::check() ? Auth::user()->id : NULL ,
				'email'     => $payer->getEmail() ,
				'item_type' => 'deal' ,
				'quantity'  => $item->getQuantity() ,
				'amount'    => $item->getPrice() ,
				'currency'  => config( 'paypal.currency' )
			] );
		}
		Session::flush('products');
		return $this->renderView( 'front.payment_success' );
	}

	public function getPaymentCancel ()
	{
		return $this->renderView('front.payment_cancel');
	}

}

