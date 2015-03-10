<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;
use Config;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->check())
		{
			$path = "/";
			$oUser = $this->auth->user()->UserTypes()->first();

			if( ! $oUser )
				return response()->redirectToAction('Auth\AuthController@getSelectUserType');
			if( $oUser->name )
			{
				if( $oUser->name == "SuperAdmin" )
				{
					$aCats = Config::get('categories');
					$name = reset( $aCats );
					$path = route('category.sub-category.index' , [ $name ] );
				}
				else if( $oUser->name == 'Providers' )
				{
					$path = route('providers.index');
				}
				else if( $oUser->name == 'BabySitters' )
				{
					$path = route('baby-sitters.index');
				}
				else if( $oUser->name == 'SalesAgent')
				{
					$path = route('sales-agents.index');
				}
			}
			return new RedirectResponse($path);
		}

		return $next($request);
	}

}
