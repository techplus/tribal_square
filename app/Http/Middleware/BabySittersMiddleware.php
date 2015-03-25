<?php namespace App\Http\Middleware;

use Closure;
use Auth;

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
		if( $oUser->name != 'BabySitters' )
			return response()->redirectToAction('HomeController@getIndex');

		return $next($request);
	}

}
