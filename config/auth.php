<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [ // the Laravel's default Authentication Guard is 'web' Authentication Guard
            'driver'   => 'session',
            'provider' => 'users', // the `users' provider     // `users` database table
        ],


        // My code: (Check Admin.php model    protected $guard = 'admin';    )
        // Multiple Authentication    // https://laravel.com/docs/9.x/passport#multiple-authentication-guards
        'admin' => [
            'driver'   => 'session',
            'provider' => 'admins' // the `admins' provider    // `admins` database table
        ],


        // My code: "Laravel Passport" Package for API Authentication        // https://laravel.com/docs/9.x/passport#:~:text=Finally%2C%20in%20your,configuration%20file
        'api' => [
            'driver'   => 'passport', // "Laravel Passport" Package
            'provider' => 'users' // the `admins' provider    // `admins` database table
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // the User.php Model of the `users` database table
        ],

        // My code: (Check Admin.php model    protected $guard = 'admin';    )
        // Multiple Authentication    // https://laravel.com/docs/9.x/passport#multiple-authentication-guards
        'admins' => [
            'driver' => 'eloquent',
            'model'  => App\Models\Admin::class, // the Admin.php Model of the `admins` database table
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that each reset token will be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Here you may define the amount of seconds before a password confirmation
    | times out and the user is prompted to re-enter their password via the
    | confirmation screen. By default, the timeout lasts for three hours.
    |
    */

    'password_timeout' => 10800,

];
