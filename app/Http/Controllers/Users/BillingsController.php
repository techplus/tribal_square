<?php namespace App\Http\Controllers\Users;
use App\Http\Controllers\Controller;
use App\Repositories\PaypalRest\PaypalRestInterface;
use App\Models\Payment;
use App\Models\SubscriptionPlan;
use Auth;
use Request;

class BillingsController extends Controller
{
	public function index(PaypalRestInterface $paypal)
	{
		$subscription = Payment::where('user_id',Auth::user()->id)->orderBy('updated_at','desc')->first();
		$transactions = $paypal->getTransactions($subscription->subscription_id);
		$this->data['transactions'] = $transactions->getAgreementTransactionList();
		$role = Auth::user()->UserTypes()->first();
		$plan = SubscriptionPlan::where('role_id',$role->id)->where('post_type','monthly')->first();
		$this->data['plan'] = $plan;
		$this->data['agreement'] = $paypal->getSubscription($subscription->subscription_id);
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
		return redirect()->route('billings.index')->with('success',$msg);
	}
}