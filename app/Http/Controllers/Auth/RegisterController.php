<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Hash;
use Auth;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use Config;
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
		$aRegisterData['password'] = Hash::make($aRegisterData['password']);
		$oUser = User::create($aRegisterData);
		$oUser->UserTypes()->attach($request->input('user_type'));
		Auth::login($oUser);
		Auth::user()->last_logged_in = date('Y-m-d H:i:s');				
		Auth::user()->save();					
		return response()->redirectToAction('Auth\RegisterController@getStep2');
	}

	public function getStep2()
	{
		return $this->renderView('front.signup.step2');
	}
}