<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Models\User;
use App\Models\Content;
use Illuminate\Http\Request;

class PasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * Create a new password controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\PasswordBroker  $passwords
	 * @return void
	 */
	public function __construct(Guard $auth, PasswordBroker $passwords)
	{
		$this->auth = $auth;
		$this->passwords = $passwords;

		$this->middleware('guest');
		
	}

	public function getIndex()
	{
		$this->data['aFooterData'] = Content::all();
		
		//return $this->getEmail();
		return $this->renderView('auth.password');
	}

	public function postEmail(Request $request)
	{
		$this->data['aFooterData'] = Content::all();

		$this->validate($request, ['email' => 'required|email']);

		$user = User::where('email',$request->input('email'))->first();
		$response = $this->passwords->sendResetLink($request->only('email'), function($m) use($user)
		{
			$this->data['aFooterData'] = Content::all();
			$m->subject( ucfirst($user->firstname).", link to reset your TribalSquare password");
		});

		switch ($response)
		{
			case PasswordBroker::RESET_LINK_SENT:
				return redirect()->back()->with('status', trans($response));

			case PasswordBroker::INVALID_USER:
				return redirect()->back()->withErrors(['email' => trans($response)]);
		}
	}

}
