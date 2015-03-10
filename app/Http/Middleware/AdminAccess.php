<?php namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Guard;
class AdminAccess 
{
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
		if( $this->auth->check() )
		{
			$oUser = $this->auth->user()->UserTypes()->first();
			if( $oUser->name == "SuperAdmin" )
			{
				return $next($request);
			}			
		}
		return abort(404);
	}
}