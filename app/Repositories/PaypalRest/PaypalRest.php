<?php namespace App\Repositories\PaypalRest;

use Carbon\Carbon;

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

//plan api dependency
use PayPal\Api\Plan;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Currency;
use PayPal\Api\ChargeModel;
use PayPal\Api\PatchRequest;
use PayPal\Api\Patch;
use PayPal\Common\PayPalModel;

//agreement dependency
use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;



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

	public function setClient($client_id,$client_secret)
	{
		$this->apiContext = new ApiContext( new OAuthTokenCredential( $client_id , $client_secret ) );
		$config = config( 'paypal.configurations' );
		$config[ 'mode' ] = config( 'paypal.mode' );
		$this->apiContext->setConfig( $config );
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
		$this->details->setShipping( $shipping );
		$this->details->setTax( $tax );
		$this->details->setSubtotal( $subtotal );
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

	// to create billing plan in paypal
	public function createPlan($title,$description,$price)
	{
		$plan = new Plan();
		$plan->setName($title)->setDescription($description)->setType('INFINITE');

		$paymentDefinitions = new PaymentDefinition();
		$paymentDefinitions->setName('Subscription Payment')->setType('REGULAR')
				->setFrequency('Month')->setCycles('0')->setFrequencyInterval("1")
				->setAmount(new Currency(['value'=>$price,'currency'=>config('paypal.currency')]));

		$charge = new ChargeModel();
		$charge->setType('SHIPPING')->setAmount(new Currency(['value'=>$price,'currency'=>config('paypal.currency')]));

		$paymentDefinitions->setChargeModels([$charge]);

		$merchant = new MerchantPreferences();
		$merchant->setReturnUrl(action('Users\PaymentsController@getPaymentDone'))
			->setCancelUrl(action('Users\PaymentsController@getPaymentCancel'))
			->setAutoBillAmount('yes')
			->setInitialFailAmountAction("CONTINUE")
			->setMaxFailAttempts("0")
          ->setSetupFee(new Currency(array('value' => $price, 'currency' => config('paypal.currency'))));;

		$plan->setPaymentDefinitions(array($paymentDefinitions));
		$plan->setMerchantPreferences($merchant);

		return $plan->create($this->apiContext);
	}

	// to activate the existing plan
	public function activatePlan($id)
	{
		$patch = new Patch();

		$value = new PayPalModel('{
	       "state":"ACTIVE"
	     }');

		$patch->setOp('replace')
			->setPath('/')
			->setValue($value);
		$patchRequest = new PatchRequest();
		$patchRequest->addPatch($patch);
		$plan = self::getPlan($id);
		$plan->update($patchRequest, $this->apiContext);

		return self::getPlan($id);
	}

	public function getPlan($id)
	{
		return Plan::get($id,$this->apiContext);
	}

	public function deletePlan($id)
	{
		$plan = new Plan();
		$plan->setId($id);
		return $plan->delete($this->apiContext);
	}

	public function createSubscription($plan_id,$name,$description)
	{
		$plan = new Plan();
		$plan->setId($plan_id);
		$agreement = new Agreement();
		$agreement->setName($name)->setDescription($description)->setStartDate(Carbon::now('Asia/Kolkata')->addMonth()->toIso8601String());
		$merchant = new MerchantPreferences();
		$merchant->setReturnUrl(action('Users\PaymentsController@getPaymentDone'))
			//->setNotifyUrl(action('Users\PaymentsController@anyPaymentReceived'))
			->setCancelUrl(action('Users\PaymentsController@getPaymentCancel'));
		$agreement->setOverrideMerchantPreferences($merchant);
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		$agreement->setPayer($payer);
		$agreement->setPlan($plan);
		return $agreement->create($this->apiContext);

	}

	public function executeSubscription($token)
	{
		$agreement = new Agreement();
		try {
	        $agreement->execute($token, $this->apiContext);
	    } catch (Exception $ex) {
				dd($ex->getMessage());
				exit(1);
		}
		return self::getSubscription($agreement->getId());
	}

	public function getSubscription($id)
	{
		return Agreement::get($id,$this->apiContext);
	}

	public function suspendAgreement($id)
	{
		$agreement = $this->getSubscription($id);
		$agreementStateDescriptor = new AgreementStateDescriptor();
		$agreementStateDescriptor->setNote("Suspending the agreement");
		$agreement->suspend($agreementStateDescriptor,$this->apiContext);
		return $agreement;
	}

	public function reActiveAgreement($id)
	{
		$agreement = $this->getSubscription($id);
		$agreementStateDescriptor = new AgreementStateDescriptor();
		$agreementStateDescriptor->setNote("Reactivating the agreement");
		$agreement->reActivate($agreementStateDescriptor,$this->apiContext);
	}

	public function getTransactions($subscriptionId)
	{
		$params = array('start_date' => date('Y-m-d', strtotime('-15 years')), 'end_date' => date('Y-m-d', strtotime('+5 days')));
		return Agreement::searchTransactions($subscriptionId,$params,$this->apiContext);
	}
}