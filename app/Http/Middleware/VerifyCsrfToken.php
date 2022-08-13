<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //

        // Our code: Check 9:49 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16
        // '/admin/check-admin-password'
    ];
}
