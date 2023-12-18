<?php

use App\Models\Cart;
// Creating the 'Helpers' folder and the 'CUSTOM' 'Helper.php' file, then autoload/register it in 'composer.json' file
// echo 'Testing this Helper.php \'CUSTOM\' file<br>';


function totalCartItems() { // this function is used in front/layout/header.blade.php
    if (\Illuminate\Support\Facades\Auth::check()) { // if the user is authenticated/logged in    // Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated
        $user_id = \Illuminate\Support\Facades\Auth::user()->id;
        $totalCartItems = Cart::where('user_id', $user_id)->sum('quantity');
    } else { // if the user is unauthenticated/logged out
        $session_id = \Illuminate\Support\Facades\Session::get('session_id');
        $totalCartItems = Cart::where('session_id', $session_id)->sum('quantity');
    }

    
    return $totalCartItems;
}



// We copied this function from Cart.php model in
// Get the Cart Items of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))    
function getCartItems() { // this method is called (used) in cart() method in Front/ProductsController.php
    // Get all Cart items of the user depending on whether the user is authenticated/logged in or logged out (Guest)
    if (\Illuminate\Support\Facades\Auth::check()) { // if the user is authenticated/logged in, get their cart items through their BOTH `user_id` and `session_id` in `carts` table
        $getCartItems = Cart::with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading
            'product' => function ($query) { // 'product' is the relationship method name in Cart.php Model
                $query->select('id', 'category_id', 'product_name', 'product_code', 'product_color', 'product_image'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
            }
        ])->orderBy('id', 'Desc')->where([ // orderBy() method: https://laravel.com/docs/9.x/queries#orderby
            'user_id'    => \Illuminate\Support\Facades\Auth::user()->id // Through the `user_id` as the user is authenticated/logged in
            // 'session_id' => \Illuminate\Support\Facades\Session::get('session_id')
        ])->get()->toArray();

    } else { // if the user is NOT authenticated/logged out/Guest, get their cart items through their `session_id` ONLY (obviously `user_id` = 0 in this case) in `carts` table
        $getCartItems = Cart::with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading
            'product' => function ($query) { // 'product' is the relationship method name in Cart.php Model
                $query->select('id', 'category_id', 'product_name', 'product_code', 'product_color', 'product_image'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
            }
        ])->orderBy('id', 'Desc')->where([ // orderBy() method: https://laravel.com/docs/9.x/queries#orderby
            // 'user_id'    => 0,
            'session_id' => \Illuminate\Support\Facades\Session::get('session_id') // Through the `session_id` as the user is not authenticated/not logged in (guest)
        ])->get()->toArray();
    }

    // $getCartItems = $getCartItems->with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
    //     'product' => function ($query) { // the 'product' relationship method in Product.php Model
    //         $query->select('id', 'product_name', 'product_color', 'product_code', 'product_image'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
    //     }
    // ])->get()->toArray();
    // dd($getCartItems);


    return $getCartItems;
}