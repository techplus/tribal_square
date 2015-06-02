<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class ProvidersMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if( ! Auth::check() )
			return response()->redirectToAction('HomeController@getIndex');

		$oUser = Auth::user()->UserTypes()->first();
		if( $oUser->name != 'Providers' )
		{
			if( $oUser->name == "SuperAdmin" OR $oUser->name == 'Admin' )
			{
				return $next($request);
			}
			else
			{
				return response()->redirectToAction('HomeController@getIndex');	
			}			
			
		}	
		return $next($request);
	}

}
