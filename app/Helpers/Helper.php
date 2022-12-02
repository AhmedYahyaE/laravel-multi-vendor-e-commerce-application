<?php
// Creating the 'Helpers' folder and the 'CUSTOM' 'Helper.php' file, then autoload/register it in 'composer.json' file: https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139    and    https://getcomposer.org/doc/04-schema.md#files
// echo 'Testing this Helper.php \'CUSTOM\' file<br>';


function totalCartItems() { // this function is used in front/layout/header.blade.php
    if (\Auth::check()) { // if the user is authenticated/logged in    // Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated
        $user_id = \Auth::user()->id;
        $totalCartItems = \App\Models\Cart::where('user_id', $user_id)->sum('quantity');
    } else { // if the user is unauthenticated/logged out
        $session_id = \Session::get('session_id');
        $totalCartItems = \App\Models\Cart::where('session_id', $session_id)->sum('quantity');
    }

    
    return $totalCartItems;
}