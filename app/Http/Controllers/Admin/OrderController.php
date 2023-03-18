<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // https://www.youtube.com/watch?v=WqPCkJaTgFI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=166
    // Note: In the Admin Panel, in the Orders Management section, if the authenticated/logged-in user is 'vendor', we'll show the orders of the products added by/related to that 'vendor' ONLY, but if the authenticated/logged-in user is 'admin', we'll show ALL orders    // Check https://www.youtube.com/watch?v=WqPCkJaTgFI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=166



    // Render admin/orders/orders.blade.php page (Orders Management section) in the Admin Panel    // https://www.youtube.com/watch?v=WqPCkJaTgFI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=166
    public function orders() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'orders');


        // We determine the authenticated/logged-in user. If the authenticated/logged-in user is 'vendor', we show ONLY the orders of the products added by that specific 'vendor' ONLY, but if the authenticated/logged-in user is 'admin', we show ALL orders    // Check 16:00 in https://www.youtube.com/watch?v=WqPCkJaTgFI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=166
        $adminType = \Auth::guard('admin')->user()->type;      // `type`      is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `type`      column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        $vendor_id = \Auth::guard('admin')->user()->vendor_id; // `vendor_id` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `vendor_id` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        
        if ($adminType == 'vendor') { // if the authenticated user (the logged in user) is 'vendor', check his `status`
            $vendorStatus = \Auth::guard('admin')->user()->status; // `status` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `status` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

            if ($vendorStatus == 0) { // if the 'vendor' is inactive/disabled
                return redirect('admin/update-vendor-details/personal')->with('error_message', 'Your Vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details.'); // the error_message will appear to the vendor in the route: 'admin/update-vendor-details/personal' which is the update_vendor_details.blade.php page
            }
        }

        if ($adminType == 'vendor') { // If the authenticated/logged-in user is 'vendor', we show ONLY the orders of the products added by that specific 'vendor' ONLY
            $orders = \App\Models\Order::with([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
                'orders_products' => function($query) use ($vendor_id) { // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct     // 'orders_products' is the Relationship method name in Order.php model
                    $query->where('vendor_id', $vendor_id); // `vendor_id` in `orders_products` table
                }
            ])->orderBy('id', 'Desc')->get()->toArray();
            // dd($orders);

        } else { // if the authenticated/logged-in user is 'admin', we show ALL orders
            $orders = \App\Models\Order::with('orders_products')->orderBy('id', 'Desc')->get()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orders);
        }


        return view('admin.orders.orders')->with(compact('orders'));
    }

    // Render admin/orders/order_details.blade.php (View Order Details page) when clicking on the View Order Details icon in admin/orders/orders.blade.php (Orders tab under Orders Management section in Admin Panel)    // https://www.youtube.com/watch?v=EraPx_a3iBg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168
    public function orderDetails($id) {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'orders');


        // https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168
        // We determine the authenticated/logged-in user. If the authenticated/logged-in user is 'vendor', we show ONLY the details (the `orders_products` table) of the orders of the products added by that specific 'vendor' ONLY (in admin/orders/order_details.blade.php page), but if the authenticated/logged-in user is 'admin', we show ALL orders details (in admin/orders/order_details.blade.php page)    // Check 16:00 in https://www.youtube.com/watch?v=WqPCkJaTgFI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=166
        $adminType = \Auth::guard('admin')->user()->type;      // `type`      is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `type`      column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        $vendor_id = \Auth::guard('admin')->user()->vendor_id; // `vendor_id` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `vendor_id` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        
        if ($adminType == 'vendor') { // if the authenticated user (the logged in user) is 'vendor', check his `status`
            $vendorStatus = \Auth::guard('admin')->user()->status; // `status` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `status` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

            if ($vendorStatus == 0) { // if the 'vendor' is inactive/disabled
                return redirect('admin/update-vendor-details/personal')->with('error_message', 'Your Vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details.'); // the error_message will appear to the vendor in the route: 'admin/update-vendor-details/personal' which is the update_vendor_details.blade.php page
            }
        }


        // https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168
        if ($adminType == 'vendor') { // If the authenticated/logged-in user is 'vendor', we show ONLY the details of the orders of the products added by that specific 'vendor' ONLY (from `orders_products` table) in admin/orders/order_details.blade.php page
            $orderDetails = \App\Models\Order::with([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
                'orders_products' => function($query) use ($vendor_id) { // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct     // 'orders_products' is the Relationship method name in Order.php model
                    $query->where('vendor_id', $vendor_id); // `vendor_id` in `orders_products` table
                }
            ])->where('id', $id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);

        } else { // if the authenticated/logged-in user is 'admin', we show ALL the orders details (from the `orders_products` table) in admin/orders/order_details.blade.php page
            $orderDetails = \App\Models\Order::with('orders_products')->where('id', $id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);
        }


        $userDetails = \App\Models\User::where('id', $orderDetails['user_id'])->first()->toArray();
        // dd($userDetails);

        // Get the 'active' order statuses from `orders` table (which is determined by 'admin'-s ONLY, not 'vendor'-s, in contrast to "Update Item Status" which can be updated by both 'vendor'-s and 'admin'-s) (Pending, Shipped, In Progress, Canceled, ...)    // https://www.youtube.com/watch?v=W-aEaJQGeKE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=167
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        $orderStatuses = \App\Models\OrderStatus::where('status', 1)->get()->toArray();
        // dd($orderStatuses);

        // Get the 'active' item statuses from `orders_products` table (which can be determined by both 'vendor'-s and 'admin'-s, in contrast to "Update Order Status" which is updated by 'admin'-s ONLY, not 'vendor'-s) (Pending, In Progress, Shipped, Delivered, ...)    // Check 8:25 in https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        $orderItemStatuses = \App\Models\OrderItemStatus::where('status', 1)->get()->toArray();
        // dd($orderItemStatuses);

        // Show the "Update Order Status" History/Log in admin/orders/order_details.blade.php    // Check 7:47 in https://www.youtube.com/watch?v=7nb4feE7FBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=171
        $orderLog = \App\Models\OrdersLog::with('orders_products')->where('order_id', $id)->orderBy('id', 'Desc')->get()->toArray(); // Show Order Log descendingly    // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in OrdersLog.php model
        // dd($orderLog);


        return view('admin.orders.order_details')->with(compact('orderDetails', 'userDetails', 'orderStatuses', 'orderItemStatuses', 'orderLog'));
    }

    // Update Order Status (by 'admin'-s ONLY, not 'vendor'-s, in contrast to "Update Item Status" which can be updated by both 'vendor'-s and 'admin'-s) (Pending, Shipped, In Progress, Canceled, ...) in admin/orders/order_details.blade.php in Admin Panel    // https://www.youtube.com/watch?v=W-aEaJQGeKE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=167
    // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
    public function updateOrderStatus(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Update Order Status in `orders` table
            \App\Models\Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status']]);


            // Note: There are two types of Shipping Process: "manual" and "automatic". "Manual" is in the case like small businesses, where the courier arrives at the owner warehouse to to pick up the order for shipping, and the small business owner takes the shipment details (like courier name, tracking number, ...) from the courier, and inserts those details themselves in the Admin Panel when they "Update Order Status" Section (by an 'admin') or "Update Item Status" Section (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php). With "automatic" shipping process, we're integrating third-party APIs and orders go directly to the shipping partner, and the updates comes from the courier's end, and orders are automatically delivered to customers. Check https://www.youtube.com/watch?v=ZjeCjuzU9wM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=172
            // First: "Manual" Shipping Process (Business owner takes the order shipment information from the courier and inserts them themselves when they "Update Order Status" (by an 'admin') (in admin/orders/order_details.blade.php)) i.e. Updating `courier_name` and `tracking_number` columns in `orders` table
            if (!empty($data['courier_name']) && !empty($data['tracking_number'])) { // if an 'admin' Updates the Order Status to 'Shipped' in admin/orders/order_details.blade.php, and submits both Courier Name and Tracking Number HTML input fields
                \App\Models\Order::where('id', $data['order_id'])->update([
                    'courier_name'    => $data['courier_name'],
                    'tracking_number' => $data['tracking_number']
                ]);
            }


            // We'll save the "Update Order Status" History/Logs in `orders_logs` database table (whenever an 'admin' updates an order status)    // https://www.youtube.com/watch?v=7nb4feE7FBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=171
            $log = new \App\Models\OrdersLog;
            $log->order_id     = $data['order_id'];
            $log->order_status = $data['order_status'];
            $log->save();


            // "Update Order Status" email: We send an email and SMS to the user when the general Order Status is updated by an 'admin' (pending, shipped, in progress, …). Check https://www.youtube.com/watch?v=nUM9e83WzIo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
            $deliveryDetails = \App\Models\Order::select('mobile', 'email', 'name')->where('id', $data['order_id'])->first()->toArray();
            $orderDetails    = \App\Models\Order::with('orders_products')->where('id', $data['order_id'])->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model

            // Check 36:55 in https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
            if (!empty($data['courier_name']) && !empty($data['tracking_number'])) { // if an 'admin' Updates the Order Status to 'Shipped' in admin/orders/order_details.blade.php, and submits both Courier Name and Tracking Number HTML input fields, include the Courier Name and Tracking Nubmer data in the email (send them with the email)
                $email = $deliveryDetails['email'];

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'email'           => $email,
                    'name'            => $deliveryDetails['name'],
                    'order_id'        => $data['order_id'],
                    'orderDetails'    => $orderDetails,
                    'order_status'    => $data['order_status'],
                    'courier_name'    => $data['courier_name'],
                    'tracking_number' => $data['tracking_number']
                ];

                \Illuminate\Support\Facades\Mail::send('emails.order_status', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order_status' is the order_status.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order_status.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Order Status Updated - StackDevelopers.in');
                });

            } else { // if there are no Courier Name and Tracking Number data, don't include them in the email
                $email = $deliveryDetails['email'];

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'email'        => $email,
                    'name'         => $deliveryDetails['name'],
                    'order_id'     => $data['order_id'],
                    'orderDetails' => $orderDetails,
                    'order_status' => $data['order_status']
                ];
    
                \Illuminate\Support\Facades\Mail::send('emails.order_status', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order_status' is the order_status.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order_status.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Order Status Updated - StackDevelopers.in');
                });
            }

            /*
            // "Update Order Status" SMS: We send an email and SMS to the user when the general Order Status is updated by an 'admin' (pending, shipped, in progress, …). Check https://www.youtube.com/watch?v=nUM9e83WzIo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
            // Sending the Order Status Update (by 'admin') SMS
            // Send an SMS using an SMS API and cURL    // https://www.youtube.com/watch?v=dF7OhPttepE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
            $message = 'Dear Customer, your order #' . $data['order_id'] . ' status has been updated to ' . $data['order_status'] . ' placed with StackDevelopers';
            // $mobile = $data['mobile']; // the user's mobile that they entered while submitting the registration form
            $mobile = $deliveryDetails['mobile'];
            // $mobile = \Auth::user()->moblie; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            \App\Models\Sms::sendSms($message, $mobile); // Send the SMS
            */


            $message = 'Order Status has been updated successfully!';
            return redirect()->back()->with('success_message', $message);
        }
    }

    // Update Item Status (which can be determined by both 'vendor'-s and 'admin'-s, in contrast to "Update Order Status" which is updated by 'admin'-s ONLY, not 'vendor'-s) (Pending, In Progress, Shipped, Delivered, ...) in admin/orders/order_details.blade.php in Admin Panel    // https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168
    // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
    public function updateOrderItemStatus(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Update Order Item Status in `orders_products` table
            \App\Models\OrdersProduct::where('id', $data['order_item_id'])->update(['item_status' => $data['order_item_status']]);


            // Note: There are two types of Shipping Process: "manual" and "automatic". "Manual" is in the case like small businesses, where the courier arrives at the owner warehouse to to pick up the order for shipping, and the small business owner takes the shipment details (like courier name, tracking number, ...) from the courier, and inserts those details themselves in the Admin Panel when they "Update Order Status" Section (by an 'admin') or "Update Item Status" Section (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php). With "automatic" shipping process, we're integrating third-party APIs and orders go directly to the shipping partner, and the updates comes from the courier's end, and orders are automatically delivered to customers. Check https://www.youtube.com/watch?v=ZjeCjuzU9wM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=172
            // First: "Manual" Shipping Process (Business owner takes the order shipment information from the courier and inserts them themselves when they "Update Order Item Status" (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php)) i.e. Updating `courier_name` and `tracking_number` columns in `orders_products` table
            if (!empty($data['item_courier_name']) && !empty($data['item_tracking_number'])) { // if a 'vendor' or 'admin' updates the order Item Status to 'Shipped' in admin/orders/order_details.blade.php, and submits both Courier Name and Tracking Number HTML input fields
                \App\Models\OrdersProduct::where('id', $data['order_item_id'])->update([
                    'courier_name'    => $data['item_courier_name'],
                    'tracking_number' => $data['item_tracking_number']
                ]);
            }


            // Get the `order_id` column (which is the foreign key to the `id` column in `orders` table) value from `orders_products` table
            $getOrderId = \App\Models\OrdersProduct::select('order_id')->where('id', $data['order_item_id'])->first()->toArray();


            // We'll save the Update "Item Status" History/Logs in `orders_logs` database table (whenever a 'vendor' or 'admin' updates an order item status)    // https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
            // Note: In `orders_logs` table, if the `order_item_id` column is zero 0, this means the "Item Status" has never been updated, and if it's not zero 0, this means it's been previously updated by a 'vendor' or 'admin' and the number references/denotes the `id` column (foreign key) of the `orders_products` table
            $log = new \App\Models\OrdersLog;
            $log->order_id      = $getOrderId['order_id'];
            $log->order_item_id = $data['order_item_id'];
            $log->order_status  = $data['order_item_status'];
            $log->save();


            // "Item Status" update email: We send an email and SMS to the user when the Item Status (in the "Ordered Products" section) is updated by a 'vendor' or 'admin' (pending, shipped, in progress, …) for every product on its own in the email (not the whole order products, but the email is about the product that has been updated ONLY). Check https://www.youtube.com/watch?v=lyG3Ut317M8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=175 AND check https://www.youtube.com/watch?v=nUM9e83WzIo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
            // $getOrderId = \App\Models\OrdersProduct::select('order_id')->where('id', $data['order_item_id'])->first()->toArray();
            $deliveryDetails = \App\Models\Order::select('mobile', 'email', 'name')->where('id', $getOrderId['order_id'])->first()->toArray();

            // Making sure that ONLY ONE order product (from the `orders_products` table) that has been item status updated, NOT all the order products, are sent in the email. Check 34:00 in https://www.youtube.com/watch?v=lyG3Ut317M8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=175
            $order_item_id = $data['order_item_id'];
            $orderDetails  = \App\Models\Order::with([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
                'orders_products' => function($query) use ($order_item_id) { // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct     // 'orders_products' is the Relationship method name in Order.php model
                    $query->where('id', $order_item_id); // `id` column in `orders_products` table
                }
            ])->where('id', $getOrderId['order_id'])->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);
            // Note: Now in this case, updating the item status of one product will send an email to user but with telling the item statuses of all of the Order items (not ONLY the item with the status updated!). The solution to this is using a subquery (Constraining Eager Loads), check 16:44 in https://www.youtube.com/watch?v=nUM9e83WzIo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170

            // Check 36:55 in https://www.youtube.com/watch?v=WNCFYaSv-N4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=173
            if (!empty($data['item_courier_name']) && !empty($data['item_tracking_number'])) { // if a 'vendor' or 'admin' Updates the Order "Item Status" to 'Shipped' in admin/orders/order_details.blade.php, and submits both Courier Name and Tracking Number HTML input fields, include the Courier Name and Tracking Nubmer data in the email (send them with the email)
                $email = $deliveryDetails['email'];

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'email'           => $email,
                    'name'            => $deliveryDetails['name'],
                    'order_id'        => $getOrderId['order_id'],
                    'orderDetails'    => $orderDetails,
                    'order_status'    => $data['order_item_status'],
                    'courier_name'    => $data['item_courier_name'],
                    'tracking_number' => $data['item_tracking_number']
                ];

                \Illuminate\Support\Facades\Mail::send('emails.order_item_status', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order_item_status' is the order_item_status.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order_item_status.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Order Item Status Updated - StackDevelopers.in');
                });

            } else { // if there are no Courier Name and Tracking Number data, don't include them in the email
                $email = $deliveryDetails['email'];

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'email'        => $email,
                    'name'         => $deliveryDetails['name'],
                    'order_id'     => $getOrderId['order_id'],
                    'orderDetails' => $orderDetails,
                    'order_status' => $data['order_item_status']
                ];
    
                \Illuminate\Support\Facades\Mail::send('emails.order_item_status', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order_item_status' is the order_item_status.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order_item_status.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Order Item Status Updated - StackDevelopers.in');
                });              
            }

            /*
            // "Item Status" update SMS: We send an email and SMS to the user when the Item Status (in the "Ordered Products" section) is updated by a 'vendor' or 'admin' (pending, shipped, in progress, …). Check https://www.youtube.com/watch?v=nUM9e83WzIo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
            // Sending the Item Status Update (by 'admin') SMS
            // Send an SMS using an SMS API and cURL    // https://www.youtube.com/watch?v=dF7OhPttepE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
            $message = 'Dear Customer, your order #' . $data['order_id'] . ' item status has been updated to ' . $data['order_status'] . ' placed with StackDevelopers';
            // $mobile = $data['mobile']; // the user's mobile that they entered while submitting the registration form
            $mobile = $deliveryDetails['mobile'];
            // $mobile = \Auth::user()->moblie; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            \App\Models\Sms::sendSms($message, $mobile); // Send the SMS
            */


            $message = 'Order Item Status has been updated successfully!';
            return redirect()->back()->with('success_message', $message);
        }
    }

}
