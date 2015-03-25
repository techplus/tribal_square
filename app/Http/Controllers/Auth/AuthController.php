<?php namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Config;
use App\Models\User;
use Mail;
use Hash;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\GraphUser;
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
			
		$this->middleware('guest', ['except' => ['getLogout','getSelectUserType','postSelectUserType']]);

		session_start ();

		// init app with app id (APPID) and secret (SECRET)
		FacebookSession::setDefaultApplication ( env('FACEBOOK_APP_ID') , env('FACEBOOK_CLIENT_SECRET') );
	}
	public function getIndex()
	{
		$this->data['body_class'] = 'signin_body';
		$this->data['fb_helper'] = new FacebookRedirectLoginHelper( url('login') );

		try {
			$session = $this->data['fb_helper']->getSessionFromRedirect ();
		} catch ( FacebookRequestException $ex ) {
			// When Facebook returns an error
		} catch ( Exception $ex ) {
			// When validation fails or other local issues
		}
		if ( isset( $session ) ) {
			// graph api request for user data
			$request = new FacebookRequest( $session , 'GET' , '/me' );
			$response = $request->execute ();
			// get response
			$graph = $response->getGraphObject ( GraphUser::className () )->asArray ();

			/** here you should add the logic of inserting data into our db */
			/* first check if user already exists */
			$oUser = User::where ( 'email' , '=' , $graph[ 'email' ] )->first ();

			if ( $oUser ) {
				/* found user */
				$this->auth->login ( $oUser );
				return response()->redirectTo('/');
			}

			/* not found user */
			$aUserData = array ();

			$aUserData[ 'email' ] = $graph[ 'email' ];
			$aUserData[ 'firstname' ] = $graph[ 'first_name' ];
			$aUserData['lastname'] = (isset( $graph['middle_name'] ) ? $graph['middle_name'] : '' )."  ".(isset( $graph['last_name'] ) ? $graph['last_name'] : '' );

			$plainPassword = str_random ( 8 );
			$aUserData[ 'password' ] = Hash::make ( $plainPassword );

			$oUser = User::create ( $aUserData );

			/* login the user */
			$this->auth->login ( $oUser );

			/** user should get mail about sign up success */
			Mail::send ( 'emails.signup' , array ( 'user' => $oUser , 'password' => $plainPassword ) , function ( $oMessage ) use ( $oUser ) {
				$oMessage->to ( $oUser->email , $oUser->firstname )->subject ( "Registration Completed!" );
			} );
			return response()->redirectTo(url('/'));
		}
		return $this->renderView('auth.login');
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
					//$redirectPath = route( '' );
				}
				else if( $oUser->name == 'SalesAgent')
				{

				}
			}	
			return redirect()->intended($redirectPath);
		}
		return redirect()->back()
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	public function getSelectUserType(Request $request)
	{
		if( $request->has('skip') )
		{
			$this->auth->user()->subscription_end_at = date('Y-m-d',time() + 3*24*3600);
			$this->auth->user()->save();
			return response()->redirectTo(url('/'));
		}


		return $this->renderView('auth.select_user_type');
	}

	public function postSelectUserType(Request $request)
	{
		$this->auth->user()->UserTypes()->attach($request->input('user_type'));
		return redirect()->to(url('/'));
	}
}
