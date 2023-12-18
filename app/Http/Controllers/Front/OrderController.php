<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;

class OrderController extends Controller
{
    // Render User 'My Orders' page    
    public function orders($id = null) { // If the slug {id?} (Optional Parameters) is passed in, this means go to the front/orders/order_details.blade.php page, and if not, this means go to the front/orders/orders.blade.php page    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    
        if (empty($id)) { // if the order id is not passed in in the route (URL) as an Optional Parameter (slug), this means go to front/orders/orders.blade.php page
            // Get all the orders of the currently authenticated/logged-in user
            $orders = Order::with('orders_products')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray(); // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user    // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orders);


            return view('front.orders.orders')->with(compact('orders'));

        } else { // if the order id is passed in in the route (URL) as an Optional Parameter (slug), this means go to front/orders/order_details.blade.php page
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();// Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);


            return view('front.orders.order_details')->with(compact('orderDetails'));
        }

    }

}