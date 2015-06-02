<?php namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Repositories\PaypalRest\PaypalRestInterface;
use App\Models\Payment;
use App\Models\SubscriptionPlan;
use Auth;
use Request;

class BillingsController extends Controller
{
	private $aMenu = array(
		'1' => 'account1',
		'2' => 'account2',
		'3' => 'bio',
		'4' => 'experience',
		'5' => 'availability',
		'6' => 'skill'
	);
	private $aMenuLabels = array(
		'1' => 'Account Basics',
		'2' => 'Account Info',
		'3' => 'Bio & Preferences',
		'4' => 'Experience',
		'5' => 'Availability',
		'6' => 'Skill and Abilities'
	);

	public function index(PaypalRestInterface $paypal)
	{
		$this->data['aMenu'] = $this->aMenu;
		$this->data['aMenuLables'] = $this->aMenuLabels;
		$subscription = Payment::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
		$role = Auth::user()->UserTypes()->first();
		$plan = SubscriptionPlan::where( 'role_id' , $role->id )->where( 'post_type' , 'monthly' )->first();
		$this->data[ 'plan' ] = $plan;
		if( $subscription ) {
			$transactions = $paypal->getTransactions( $subscription->subscription_id );
			$this->data[ 'transactions' ] = $transactions->getAgreementTransactionList();
			$this->data[ 'agreement' ] = $paypal->getSubscription( $subscription->subscription_id );
		}
		$this->data['section'] = '';
		$this->data['last_step'] = false;
		return $this->renderView('providers.billing');
	}

	public function update($id,PaypalRestInterface $paypal)
	{
		$subscription = Payment::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
		if( Request::input('_action') == 'suspend')
		{
			$paypal->suspendAgreement($subscription->subscription_id);
			$msg = 'Your subscription has been suspended!';
		}
		else if( Request::input('_action') == 're-active' )
		{
			$paypal->reActiveAgreement($subscription->subscription_id);
			$msg = "Your subscription is activated!";
		}

		$prefix = Auth::user()->UserTypes()->first()->name == 'Providers' ? 'provider' : 'baby-sitter';
		return redirect()->route($prefix.'.billings.index')->with('success',$msg);
	}
}