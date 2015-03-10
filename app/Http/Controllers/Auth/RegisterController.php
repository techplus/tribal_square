<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Hash;
use Auth;

class RegisterController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except'=>['getIndex','postIndex']]);
	}
	public function getIndex()
	{
		return $this->renderView('front.signup.step1');
	}

	public function postIndex(SignUpRequest $request)
	{
		$aRegisterData = $request->except(['_token','user_type','g-recaptcha-response','password_confirmation']);
		$aRegisterData['password'] = Hash::make($aRegisterData['password']);
		$oUser = User::create($aRegisterData);
		$oUser->UserTypes()->attach($request->input('user_type'));
		Auth::login($oUser);
		return response()->redirectToAction('Auth\RegisterController@getStep2');
	}

	public function getStep2()
	{
		return $this->renderView('front.signup.step2');
	}
}