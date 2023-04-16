<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Note: For the Orders module, we created two database tables: orders and orders_products tables. The first one holds/stores the main information about the orders of a user (e.g. delivery address, coupon code, shipping, payment method, ...etc), and the second one holds/stores the detailed information about the order (the items/products that are bought by the order and product name, code, color, size, price, ...etc). There is a one-to-many relationship between the two tables where one order can have many order products.



    // Relationship of an Order `orders` table with Order_Products `orders_products` table (every Order has many Order_Products)    // https://www.youtube.com/watch?v=4d_Hq33jihY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=164
    public function orders_products() { // vendor() in the SINGULAR!    // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `vendor_id` column
        return $this->hasMany('App\Models\OrdersProduct', 'order_id'); // 'order_id' (column of `orders_products` table) is the Foreign Key of the Relationship
    }






    // Shiprocket API Integration! Shiprocket needs an "order_items" key/name in the JSON request, so we create this relationship method specifically for this matter (in order for the $getResults array in pushOrder() method in APIController.php to have the key/name of "order_items"). Check 11:22 in https://www.youtube.com/watch?v=mcSoGDSrdsU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=2
    // Relationship of an Order `orders` table with Order_Products `orders_products` table (every Order has many Order_Products)    // https://www.youtube.com/watch?v=4d_Hq33jihY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=164
    public function order_items() { // vendor() in the SINGULAR!    // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `vendor_id` column
        return $this->hasMany('App\Models\OrdersProduct', 'order_id'); // 'order_id' (column of `orders_products` table) is the Foreign Key of the Relationship
    }

    // Shiprocket API Integration!    // https://www.youtube.com/watch?v=mcSoGDSrdsU&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=2
    public static function pushOrder($order_id) { // this method is called from the pushOrder() method in API/APIController.php
        $orderDetails = Order::with('order_items')->where('id', $order_id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'order_items' is the relationship method name in Order.php model
        // dd($orderDetails);

        // Prepare the Shiprocket's JSON request: We copy the "Create Order" JSON request keys/names from Shiprocket Documentation: https://apidocs.shiprocket.in/#639199eb-4fed-4770-9057-c8b3e32b2cd6, and place (append) them as array keys in $orderDetails array:
        $orderDetails['order_id']              = $orderDetails['id'];         // 'order_id'                is the Shiprocket's JSON request key/name, while 'id'         is our `orders` table column name
        $orderDetails['order_date']            = $orderDetails['created_at']; // 'order_date'              is the Shiprocket's JSON request key/name, while 'created_at' is our `orders` table column name
        $orderDetails['pickup_location']       = "Test";    // We created a Pickup Location (We called it "Test") while creating the Shiprocket account for the first time. Check the last video: https://www.youtube.com/watch?v=UZ33MfeR6wM&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=1
        $orderDetails['channel_id']            = "1852727"; // We generated a channel_id using the Channels API. Check the last video: https://www.youtube.com/watch?v=UZ33MfeR6wM&list=PLLUtELdNs2ZaPSOuYoosmSj5TUuXjl_uu&index=1
        $orderDetails['comment']               = 'Test Order';
        $orderDetails['billing_customer_name'] = $orderDetails['name'];       // 'billing_customer_name'   is the Shiprocket's JSON request key/name, while 'name'       is our `orders` table column name
        $orderDetails['billing_last_name']     = '';
        $orderDetails['billing_address']       = $orderDetails['address'];    // 'billing_address'         is the Shiprocket's JSON request key/name, while 'address'    is our `orders` table column name
        $orderDetails['billing_address_2']     = '';
        $orderDetails['billing_city']          = $orderDetails['city'];       // 'billing_city'            is the Shiprocket's JSON request key/name, while 'city'       is our `orders` table column name
        $orderDetails['billing_pincode']       = $orderDetails['pincode'];    // 'billing_pincode'         is the Shiprocket's JSON request key/name, while 'pincode'    is our `orders` table column name
        $orderDetails['billing_state']         = $orderDetails['state'];      // 'billing_state'           is the Shiprocket's JSON request key/name, while 'state'      is our `orders` table column name
        $orderDetails['billing_country']       = $orderDetails['country'];    // 'billing_country'         is the Shiprocket's JSON request key/name, while 'country'    is our `orders` table column name
        $orderDetails['billing_email']         = $orderDetails['email'];      // 'billing_email'           is the Shiprocket's JSON request key/name, while 'email'      is our `orders` table column name
        $orderDetails['billing_phone']         = $orderDetails['mobile'];     // 'billing_phone'           is the Shiprocket's JSON request key/name, while 'mobile'     is our `orders` table column name

        $orderDetails['shipping_is_billing']   = true; // the customer's Shipping Address is the same as their Billing Address

        $orderDetails['shipping_customer_name'] = $orderDetails['name'];       // 'shipping_customer_name' is the Shiprocket's JSON request key/name, while 'name'       is our `orders` table column name
        $orderDetails['shipping_last_name']     = '';
        $orderDetails['shipping_address']       = $orderDetails['address'];    // 'shipping_address'       is the Shiprocket's JSON request key/name, while 'address'    is our `orders` table column name
        $orderDetails['shipping_address_2']     = '';
        $orderDetails['shipping_city']          = $orderDetails['city'];       // 'shipping_city'          is the Shiprocket's JSON request key/name, while 'city'       is our `orders` table column name
        $orderDetails['shipping_pincode']       = $orderDetails['pincode'];    // 'shipping_pincode'       is the Shiprocket's JSON request key/name, while 'pincode'    is our `orders` table column name
        $orderDetails['shipping_state']         = $orderDetails['state'];      // 'shipping_state'         is the Shiprocket's JSON request key/name, while 'state'      is our `orders` table column name
        $orderDetails['shipping_country']       = $orderDetails['country'];    // 'shipping_country'       is the Shiprocket's JSON request key/name, while 'country'    is our `orders` table column name
        $orderDetails['shipping_email']         = $orderDetails['email'];      // 'shipping_email'         is the Shiprocket's JSON request key/name, while 'email'      is our `orders` table column name
        $orderDetails['shipping_phone']         = $orderDetails['mobile'];     // 'shipping_phone'         is the Shiprocket's JSON request key/name, while 'mobile'     is our `orders` table column name

        foreach ($orderDetails['order_items'] as $key => $item) {                         // 'order_items'   is the Shiprocket's JSON request key/name    // 'order_items' is the Relationship method name in Order.php model    // $key    denotes the 1st order, 2nd order, 3rd order, ...etc
            $orderDetails['order_items'][$key]['name']          = $item['product_name'];  // 'name'          is the Shiprocket's JSON request key/name, while 'product_name'  is our `orders_products` table column name
            $orderDetails['order_items'][$key]['sku']           = $item['product_code'];  // 'sku'           is the Shiprocket's JSON request key/name, while 'product_code'  is our `orders_products` table column name
            $orderDetails['order_items'][$key]['units']         = $item['product_qty'];   // 'units'         is the Shiprocket's JSON request key/name, while 'product_qty'   is our `orders_products` table column name
            $orderDetails['order_items'][$key]['selling_price'] = $item['product_price']; // 'selling_price' is the Shiprocket's JSON request key/name, while 'product_price' is our `orders_products` table column name
            $orderDetails['order_items'][$key]['discount']      = '';                     // 'discount'      is the Shiprocket's JSON request key/name
            $orderDetails['order_items'][$key]['tax']           = '';                     // 'tax'           is the Shiprocket's JSON request key/name
            $orderDetails['order_items'][$key]['hsn']           = '';                     // 'hsn'           is the Shiprocket's JSON request key/name
        }

        $orderDetails['payment_method']      = '';                           // 'payment_method'      is the Shiprocket's JSON request key/name
        $orderDetails['shipping_charges']    = 0;                            // 'shipping_charges'    is the Shiprocket's JSON request key/name
        $orderDetails['giftwrap_charges']    = 0;                            // 'giftwrap_charges'    is the Shiprocket's JSON request key/name
        $orderDetails['transaction_charges'] = 0;                            // 'transaction_charges' is the Shiprocket's JSON request key/name
        $orderDetails['total_discount']      = 0;                            // 'total_discount'      is the Shiprocket's JSON request key/name
        $orderDetails['sub_total']           = $orderDetails['grand_total']; // 'sub_total'           is the Shiprocket's JSON request key/name, while 'grand_total' is our `orders` table column name
        $orderDetails['length']              = 1;                            // 'length'              is the Shiprocket's JSON request key/name
        $orderDetails['breadth']             = 1;                            // 'breadth'             is the Shiprocket's JSON request key/name
        $orderDetails['height']              = 1;                            // 'height'              is the Shiprocket's JSON request key/name
        $orderDetails['weight']              = 1;                            // 'weight'              is the Shiprocket's JSON request key/name


        // dd($orderDetails);
        
        // Convert the $orderDetails array into JSON for testing before sending the Shiprocket's API JSON HTTP request
        dd(json_encode($orderDetails));
    }

}
