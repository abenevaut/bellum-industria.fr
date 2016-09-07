<?php namespace cms\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class Authenticate
 * @package cms\Http\Middleware
 */
class Authenticate
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 * @param  string|null              $guard
	 *
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::guard($guard)->guest())
		{
			if ($request->ajax() || $request->wantsJson())
			{
				return response('Unauthorized.', 401);
			}
			else if (
				$request->is(config('cms.uri.backend'))
				|| $request->is(config('cms.uri.backend') . '/*')
			)
			{
				return redirect()->guest(config('cms.uri.backend') . '/login');
			}
			else
			{
				return redirect()->guest('login');
			}
		}

		return $next($request);
	}

}
