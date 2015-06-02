<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\Session;

class BabySittersMiddleware {

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
			return redirect()->action('Users\BabySittersController@getIndex');

		$oUser = Auth::user()->UserTypes()->first();
		if( $oUser->name != 'BabySitters' AND $oUser->name != "Admin" AND $oUser->name != "SuperAdmin" )
			return response()->redirectToAction('HomeController@getIndex');

		return $next($request);
	}

}
