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
use Mail;
class RegisterController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except'=>['getIndex','postIndex']]);

		session_start ();

		// init app with app id (APPID) and secret (SECRET)
		FacebookSession::setDefaultApplication ( env('FACEBOOK_APP_ID') , env('FACEBOOK_CLIENT_SECRET') );
	}
	
	public function randomPrefix($length) 
	{ 
		$random= "";
		srand((double)microtime()*1000000);

		$data = "AbcDE123IJKLMN67QRSTUVWXYZ"; 
		$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; 
		$data .= "0FGH45OP89";

		for($i = 0; $i < $length; $i++) 
		{ 
		$random .= substr($data, (rand()%(strlen($data))), 1); 
		}

		return $random; 
	}

	public function getIndex()
	{
		$this->data['fb_helper'] = new FacebookRedirectLoginHelper( action('Auth\AuthController@getIndex') );
		return $this->renderView('front.signup.step1');
	}

	public function postIndex(SignUpRequest $request)
	{
		$userMail = $request->get('email');
		
		if($request->input('user_type') != 4)
		{
			$aRegisterData = $request->except(['_token','user_type','g-recaptcha-response','password_confirmation','paypalid','agreement']);
		}
		else
		{
			$aRegisterData = $request->except(['_token','user_type','g-recaptcha-response','password_confirmation','agreement']);	
		}
		
		//$aRegisterData['password'] = Hash::make($aRegisterData['password']); removed because added in user model
		$oUser = User::create($aRegisterData);

		if($request->input('user_type') != 4)
		{
			$oUser->UserTypes()->attach($request->input('user_type'));
		}
		else
		{
			$oUser->UserTypes()->attach($request->input('user_type'),array('paypalid' => $request->input('paypalid'),'refferal_code'=>$this->randomPrefix(8)));	
		}
		Auth::login($oUser);
		Auth::user()->last_logged_in = date('Y-m-d H:i:s');				
		Auth::user()->save();

		// Service provider = 2
		// Baby sitter = 3
		// Sales Agent = 4

		if($request->input('user_type') == 3)
		{
			Mail::send('emails.sitterwelcome',
		        array(
		            'firstname' => $request->get('firstname'),
		            'lastname' => $request->get('lastname'),
		            'email' => $request->get('email')
		        ), function($message) use ($userMail)
			{
				// sitter@tribalsquare.com 
			    $message->from('sitter@tribalsquare.compact(varname)', 'Tribal Square');
		  		$message->to($userMail)->subject('Welcome Email');
			});
			return response()->redirectToAction('Auth\RegisterController@getStep2');
		}
		else if($request->input('user_type') == 2)
		{
			Mail::send('emails.providerwelcome',
		        array(
		            'firstname' => $request->get('firstname'),
		            'lastname' => $request->get('lastname'),
		            'email' => $request->get('email')
		        ), function($message) use ($userMail)
			{
				// deals@tribalsquare.com
			    $message->from('deals@tribalsquare.com', 'Tribal Square');
		  		$message->to($userMail)->subject('Welcome Email');
			});
			return response()->redirectToAction('Auth\RegisterController@getStep2');
		}
		else if($request->input('user_type') == 4)
		{
			Mail::send('emails.agentwelcome',
		        array(
		            'firstname' => $request->get('firstname'),
		            'lastname' => $request->get('lastname'),
		            'email' => $request->get('email')
		        ), function($message) use ($userMail)
			{
			    $message->from('agent@tribalsquare.com', 'Tribal Square');
		  		$message->to($userMail)->subject('Welcome Email');
			});
			//return response()->redirectToAction('Users\SalesAgentController@index');
			return redirect()->action('Users\SalesAgentController@index');//$this->renderView ( 'agents.index' );
		}
									
		//return response()->redirectToAction('Auth\RegisterController@getStep2');
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