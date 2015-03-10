<?php namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Config;
class AuthController extends Controller {
	protected $redirectPath;
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
			
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function getIndex()
	{
		$this->data['body_class'] = 'signin_body';
		return $this->renderView('auth.login');
	}

	public function getRegister()
	{
		return $this->renderView('front.signup.step1');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');
		$redirectPath = "/";
		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			$oUser = $this->auth->user()->UserTypes()->first();										
			if( $oUser->name )
			{								
				if( $oUser->name == "SuperAdmin" )
				{		
					$aCats = Config::get('categories');
					$name = reset( $aCats );
					$redirectPath = route('category.sub-category.index' , [ $name ] );
				}
				else if( $oUser->name == 'Providers' )
				{
					$redirectPath = route('providers.index');
				}
				else if( $oUser->name == 'BabySitters' )
				{

				}
				else if( $oUser->name == 'SalesAgent')
				{

				}
			}	
			return redirect()->intended($redirectPath);
		}
		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}
}
