<?php

namespace App\Http\Middleware;

use Closure;

class UserValidate
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (session()->has('admin_user_id')) {
			return $next($request);
		}
		return redirect('/login');
	}
}
