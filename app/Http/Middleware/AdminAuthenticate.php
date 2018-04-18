<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin')
    {

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }

            if ($request->path() !== 'admin/login') {
                return redirect()->guest('/admin/login');
            }
        }

        if (Auth::guard('admin')->check()) {
            Auth::setUser(Auth::guard('admin')->user());
        }

        return $next($request);
    }
}
