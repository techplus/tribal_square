<?php namespace App\Repositories\PaypalRest;

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
use PayPal\Api\PaymentExecution;

class PaypalRest implements PaypalRestInterface
{
	protected $apiContext;

	protected $items = array ();

	protected $details;

	protected $transaction;

	protected $redirectUrl;

	protected $amount;

	protected $itemList;

	protected $payer;

	protected $payment;

	protected $paymentExecution;

	public function __construct ()
	{
		$this->apiContext = new ApiContext( new OAuthTokenCredential( config( 'paypal.client_id' ) , config( 'paypal.client_secret' ) ) );
		$config = config( 'paypal.configurations' );
		$config[ 'mode' ] = config( 'paypal.mode' );
		$this->apiContext->setConfig( $config );
		$this->details = new Details();
		$this->transaction = new Transaction();
		$this->redirectUrl = new RedirectUrls();
		$this->amount = new Amount();
		$this->itemList = new ItemList();
		$this->payer = new Payer();
		$this->payment = new Payment();
		$this->paymentExecution = new PaymentExecution();
	}

	public function getItemObject ()
	{
		return new Item();
	}

	public function addItem ( $details )
	{
		$item = $this->getItemObject();
		$item->setSku($details['id']);
		$item->setName( $details[ 'title' ] );
		$item->setCurrency( config( 'paypal.currency' ) );
		$item->setPrice( $details[ 'price' ] );
		$item->setQuantity( $details[ 'quantity' ] );
		$this->items[ ] = $item;
	}

	public function addAmount ( $description , $total )
	{
		$this->amount->setCurrency( config( 'paypal.currency' ) );
		$this->amount->setDetails( $this->details );
		$this->amount->setTotal( $total );

		/** set item list */
		$this->itemList->setItems( $this->items );

		/** set transaction */
		$this->transaction->setAmount( $this->amount );
		$this->transaction->setItemList( $this->itemList );
		$this->transaction->setDescription( $description );
		$this->transaction->setInvoiceNumber( uniqid() );
	}

	public function addDetails ( $shipping = 0 , $tax = 0 , $subtotal )
	{
		$this->details->setShipping( 0 );
		$this->details->setTax( 0 );
		$this->details->setSubtotal( 0 );
	}

	public function addPayer ()
	{
		$this->payer->setPaymentMethod( 'paypal' );
	}

	public function addRedirectUrls ( $returnurl , $cancelurl )
	{
		$this->redirectUrl->setReturnUrl( $returnurl );
		$this->redirectUrl->setCancelUrl( $cancelurl );
	}

	public function pay ()
	{
		$this->payment->setIntent( 'order' );
		$this->payment->setPayer( $this->payer );
		$this->payment->setRedirectUrls( $this->redirectUrl );
		$this->payment->setTransactions( [ $this->transaction ] );

		try {
			$this->payment->create( $this->apiContext );
		} catch ( Exception $ex ) {
			dd( $ex->getMessage() );
			exit( 1 );
		}

		$approvalLink = $this->payment->getApprovalLink();

		return $approvalLink;
	}

	public function executePayment ( $payer_id , $payment_id )
	{
		$payment = Payment::get( $payment_id , $this->apiContext );
		$this->paymentExecution->setPayerId( $payer_id );

		try {
			$result = $payment->execute( $this->paymentExecution , $this->apiContext );

			try {
				$payment = Payment::get( $payment_id , $this->apiContext );
			} catch ( Exception $ex ) {
				dd($ex->getMessage());
				exit( 1 );
			}
		} catch ( Exception $ex ) {
			dd($ex->getMessage());
			exit( 1 );
		}
		return $payment;
	}

	public function getPayment($payment_id)
	{
		return Payment::get( $payment_id , $this->apiContext );
	}
}