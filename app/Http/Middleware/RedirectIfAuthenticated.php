<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->role->type=='Admin') {
            return redirect()->route('admin.dashboard');
        }elseif(Auth::guard($guard)->check() && Auth::user()->role->type=='Officestaff'){
            return redirect()->route('staff.dashboard');
        }elseif(Auth::guard($guard)->check() && Auth::user()->role->type=='Dataentry') {
            return redirect()->route('entry.dashboard');
        }else {
            return $next($request);
        }

    }
}
