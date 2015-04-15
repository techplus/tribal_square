<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Auth;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use App\Repositories\PaypalRest\PaypalRestInterface;
use Request;
class RegisterController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['except'=>['getIndex','postIndex']]);

		session_start ();

		// init app with app id (APPID) and secret (SECRET)
		FacebookSession::setDefaultApplication ( env('FACEBOOK_APP_ID') , env('FACEBOOK_CLIENT_SECRET') );
	}
	public function getIndex()
	{
		$this->data['fb_helper'] = new FacebookRedirectLoginHelper( action('Auth\AuthController@getIndex') );
		return $this->renderView('front.signup.step1');
	}

	public function postIndex(SignUpRequest $request)
	{
		$aRegisterData = $request->except(['_token','user_type','g-recaptcha-response','password_confirmation','agreement']);
		//$aRegisterData['password'] = Hash::make($aRegisterData['password']); removed because added in user model
		$oUser = User::create($aRegisterData);
		$oUser->UserTypes()->attach($request->input('user_type'));
		Auth::login($oUser);
		Auth::user()->last_logged_in = date('Y-m-d H:i:s');				
		Auth::user()->save();					
		return response()->redirectToAction('Auth\RegisterController@getStep2');
	}

	public function getStep2()
	{
		$this->data['plan'] = SubscriptionPlan::where('role_id',Auth::user()->UserTypes()->first()->id)->where('post_type','monthly')->first();
		return $this->renderView('front.signup.step2');
	}

	public function getPaypalSubscription(PaypalRestInterface $paypal)
	{
		$user = Auth::user();
		$plan = SubscriptionPlan::where('role_id',Auth::user()->UserTypes()->first()->id)->where('post_type','monthly')->first();
		// set this for different paypal benificiarry
		//$paypal->setClient($client_id,$client_secret);

		$agreement = $paypal->createSubscription($plan->paypal_id,'Subscription for tribal square','For tribal square subscription You will be charged $'.$plan->amount." every month from now!");
		return redirect()->to($agreement->getApprovalLink());
	}


}