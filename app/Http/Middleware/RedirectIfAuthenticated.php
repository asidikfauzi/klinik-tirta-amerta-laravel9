<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if(Auth::guard($guard)->check() && Auth::user()->role == "admin")
            {
                return redirect()->route('admin.index');
            }
            elseif(Auth::guard($guard)->check() && Auth::user()->role == "rm_dony")
            {
                return redirect()->route('rm_dony.index');
            }
            elseif(Auth::guard($guard)->check() && Auth::user()->role == "rm_umum")
            {
                return redirect()->route('rm_umum.index');
            }
        }

        return $next($request);
    }
}
