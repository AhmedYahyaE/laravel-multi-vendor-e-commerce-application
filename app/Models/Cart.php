<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class Cart extends Model
{
    use HasFactory;


    
    // Relationship of a Cart Item `carts` table with a Product `products` table (every cart item belongs to a product)    
    public function product() { // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `product_id` column
        return $this->belongsTo('App\Models\Product', 'product_id'); // 'product_id' is the Foreign Key of the Relationship
    }



    // Get the Cart Items of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))    
    public static function getCartItems() { // this method is called (used) in cart() method in Front/ProductsController.php
        // Get all Cart items of the user depending on whether the user is authenticated/logged in or logged out (Guest)
        if (Auth::check()) { // if the user is authenticated/logged in, get their cart items through their BOTH `user_id` and `session_id` in `carts` table
            $getCartItems = Cart::with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading
                'product' => function ($query) { // 'product' is the relationship method name in Cart.php Model
                    $query->select('id', 'category_id', 'product_name', 'product_code', 'product_color', 'product_image', 'product_weight'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
                }
            ])->orderBy('id', 'Desc')->where([ // orderBy() method: https://laravel.com/docs/9.x/queries#orderby
                'user_id'    => Auth::user()->id // Through the `user_id` as the user is authenticated/logged in
            ])->get()->toArray();

        } else { // if the user is NOT authenticated/logged out/Guest, get their cart items through their `session_id` ONLY (obviously `user_id` = 0 in this case) in `carts` table
            $getCartItems = Cart::with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading
                'product' => function ($query) { // 'product' is the relationship method name in Cart.php Model
                    $query->select('id', 'category_id', 'product_name', 'product_code', 'product_color', 'product_image', 'product_weight'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
                }
            ])->orderBy('id', 'Desc')->where([ // orderBy() method: https://laravel.com/docs/9.x/queries#orderby
                // 'user_id'    => 0,
                'session_id' => Session::get('session_id') // Through the `session_id` as the user is not authenticated/not logged in (guest)
            ])->get()->toArray();
        }


        return $getCartItems;
    }

}