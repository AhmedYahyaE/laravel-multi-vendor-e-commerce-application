<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
    // Check API Endpoints/URLs/links in "api.php" file (NOT "web.php" file!)
    // Note: When working with APIs (like working in APIController.php), everything returned must be in JSON format.
    // https://www.youtube.com/watch?v=mcSoGDSrdsU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=2
    // Shiprocket API Documentation: https://apidocs.shiprocket.in/



    // Push our 'ecom9' website orders (from our `orders` database table) to Shiprocket    // Shiprocket API Documentation: https://apidocs.shiprocket.in/    // https://www.youtube.com/watch?v=mcSoGDSrdsU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=2
    public function pushOrder($id) { // This route/URL/link is: http://127.0.0.1:8000/api/push-order/3    // This method will be called from updateOrderStatus() method in Admin/OrderController.php    // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        // Get the Order from `orders` table and its order Details from `orders_products` table (using the 'order_items' Relationship)
        $getResults = \App\Models\Order::pushOrder($id);


        return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
            'status'  => $getResults['status'],
            'message' => $getResults['message']
        ]);
    }

}
