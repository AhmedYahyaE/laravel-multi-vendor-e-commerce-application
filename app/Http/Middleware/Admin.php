<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // This is a middleware we created by ourselves
        // dd(Illuminate\Support\Facades\Auth::class);
        // dd(Illuminate\Support\Facades\Auth::user());
        // dd(auth());
        // dd(auth()->user());

        // Multiple Authentication    // https://laravel.com/docs/9.x/passport#multiple-authentication-guards
        // Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated
        // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
        if (! \Illuminate\Support\Facades\Auth::guard('admin')->check()) { // If the user making the incoming HTTP request is not authenticated, redirect to login page    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            return redirect('/admin/login');
        }


        return $next($request);
    }
}