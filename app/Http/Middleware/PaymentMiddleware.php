<?php namespace App\Http\Middleware;

use Closure;
use Auth;
class PaymentMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if( empty( Auth::user()->subscription_end_at) OR strtotime(Auth::user()->subscription_end_at ) < time() )
			return response()->redirectToAction('Auth\RegisterController@getStep2');

		return $next($request);
	}

}
