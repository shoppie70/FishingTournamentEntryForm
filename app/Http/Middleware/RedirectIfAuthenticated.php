<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    private const GUARD_USER = 'users';
    private const GUARD_ADMIN = 'admins';

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if ($request->routeIs('user.*') && Auth::guard(self::GUARD_USER)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }
        if ($request->routeIs('admin.*') && Auth::guard(self::GUARD_ADMIN)->check()) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }

        return $next($request);
    }
}
