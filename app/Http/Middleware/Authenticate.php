<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // return route('login');


            // Change the default route that the 'auth' middleware redirects unauthenticated/not logged in (logged out) users to    // https://www.youtube.com/watch?v=VK2RX6zJ220&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=137
            redirect('user/login-register'); // This is WRONG!! Doesn't work! This is what the instructor did!

            // return 'user/login-register'; // This is the Right statement! It works!

        }
    }
}
