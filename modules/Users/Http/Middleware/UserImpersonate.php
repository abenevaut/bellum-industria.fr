<?php namespace Modules\Users\Http\Middleware;

use Closure;
use Auth;

/**
 * Class UserImpersonate
 *
 * If 'impersonate_member' key is set in session with a valid user id, we use the plateform as this user
 *
 * @package Modules\Users\Http\Middleware
 */
class UserImpersonate
{
    public function handle($request, Closure $next)
    {

        // \Session::set('impersonate_member', 42 /* user id*/);
        // \Session::forget('impersonate_member');

        if (

            Auth::check()
            && (
                Auth::user()->hasRole('admin')
                || Auth::user()->hasPermission('taking_session')
            )
            && $request->session()->has('impersonate_member')
            && $id = $request->session()->get('impersonate_member')

        )
        {
            Auth::onceUsingId($id);
        }
        return $next($request);
    }
}
