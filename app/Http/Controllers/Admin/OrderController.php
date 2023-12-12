<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Order;
use App\Models\OrdersProduct;
use App\Models\OrdersLog;
use App\Models\OrderStatus;
use App\Models\OrderItemStatus;


class OrderController extends Controller
{
    // Note: In the Admin Panel, in the Orders Management section, if the authenticated/logged-in user is 'vendor', we'll show the orders of the products added by/related to that 'vendor' ONLY, but if the authenticated/logged-in user is 'admin', we'll show ALL orders    



    // Render admin/orders/orders.blade.php page (Orders Management section) in the Admin Panel    
    public function orders() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'orders');


        // We determine the authenticated/logged-in user. If the authenticated/logged-in user is 'vendor', we show ONLY the orders of the products added by that specific 'vendor' ONLY, but if the authenticated/logged-in user is 'admin', we show ALL orders    
        $adminType = Auth::guard('admin')->user()->type;      // `type`      is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `type`      column in `admins` table    
        $vendor_id = Auth::guard('admin')->user()->vendor_id; // `vendor_id` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `vendor_id` column in `admins` table    


        if ($adminType == 'vendor') { // if the authenticated user (the logged in user) is 'vendor', check his `status`
            $vendorStatus = Auth::guard('admin')->user()->status; // `status` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `status` column in `admins` table    

            if ($vendorStatus == 0) { // if the 'vendor' is inactive/disabled
                return redirect('admin/update-vendor-details/personal')->with('error_message', 'Your Vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details.'); // the error_message will appear to the vendor in the route: 'admin/update-vendor-details/personal' which is the update_vendor_details.blade.php page
            }
        }


        if ($adminType == 'vendor') { // If the authenticated/logged-in user is 'vendor', we show ONLY the orders of the products added by that specific 'vendor' ONLY
            $orders = Order::with([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
                'orders_products' => function($query) use ($vendor_id) { // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct     // 'orders_products' is the Relationship method name in Order.php model
                    $query->where('vendor_id', $vendor_id); // `vendor_id` in `orders_products` table
                }
            ])->orderBy('id', 'Desc')->get()->toArray();
            // dd($orders);

        } else { // if the authenticated/logged-in user is 'admin', we show ALL orders
            $orders = Order::with('orders_products')->orderBy('id', 'Desc')->get()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orders);
        }


        return view('admin.orders.orders')->with(compact('orders'));
    }

    // Render admin/orders/order_details.blade.php (View Order Details page) when clicking on the View Order Details icon in admin/orders/orders.blade.php (Orders tab under Orders Management section in Admin Panel)    
    public function orderDetails($id) {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'orders');

        
        // We determine the authenticated/logged-in user. If the authenticated/logged-in user is 'vendor', we show ONLY the details (the `orders_products` table) of the orders of the products added by that specific 'vendor' ONLY (in admin/orders/order_details.blade.php page), but if the authenticated/logged-in user is 'admin', we show ALL orders details (in admin/orders/order_details.blade.php page)    
        $adminType = Auth::guard('admin')->user()->type;      // `type`      is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `type`      column in `admins` table    
        $vendor_id = Auth::guard('admin')->user()->vendor_id; // `vendor_id` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `vendor_id` column in `admins` table    
        
        if ($adminType == 'vendor') { // if the authenticated user (the logged in user) is 'vendor', check his `status`
            $vendorStatus = Auth::guard('admin')->user()->status; // `status` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `status` column in `admins` table    

            if ($vendorStatus == 0) { // if the 'vendor' is inactive/disabled
                return redirect('admin/update-vendor-details/personal')->with('error_message', 'Your Vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details.'); // the error_message will appear to the vendor in the route: 'admin/update-vendor-details/personal' which is the update_vendor_details.blade.php page
            }
        }


        
        if ($adminType == 'vendor') { // If the authenticated/logged-in user is 'vendor', we show ONLY the details of the orders of the products added by that specific 'vendor' ONLY (from `orders_products` table) in admin/orders/order_details.blade.php page
            $orderDetails = Order::with([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
                'orders_products' => function($query) use ($vendor_id) { // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct     // 'orders_products' is the Relationship method name in Order.php model
                    $query->where('vendor_id', $vendor_id); // `vendor_id` in `orders_products` table
                }
            ])->where('id', $id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);

        } else { // if the authenticated/logged-in user is 'admin', we show ALL the orders details (from the `orders_products` table) in admin/orders/order_details.blade.php page
            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);
        }


        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray();
        // dd($userDetails);

        // Get the 'active' order statuses from `orders` table (which is determined by 'admin'-s ONLY, not 'vendor'-s, in contrast to "Update Item Status" which can be updated by both 'vendor'-s and 'admin'-s) (Pending, Shipped, In Progress, Canceled, ...)    
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        $orderStatuses = OrderStatus::where('status', 1)->get()->toArray();
        // dd($orderStatuses);

        // Get the 'active' item statuses from `orders_products` table (which can be determined by both 'vendor'-s and 'admin'-s, in contrast to "Update Order Status" which is updated by 'admin'-s ONLY, not 'vendor'-s) (Pending, In Progress, Shipped, Delivered, ...)    
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        $orderItemStatuses = OrderItemStatus::where('status', 1)->get()->toArray();
        // dd($orderItemStatuses);

        // Show the "Update Order Status" History/Log in admin/orders/order_details.blade.php    
        $orderLog = OrdersLog::with('orders_products')->where('order_id', $id)->orderBy('id', 'Desc')->get()->toArray(); // Show Order Log descendingly    // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in OrdersLog.php model
        // dd($orderLog);


        
        // Calculate the total items count (the total quantity of all items) in the Cart (including how many items of the same product i.e. 3 small-sized T-shirts + 2 mobile phones of 128GB RAM)
        $total_items = 0;

        foreach ($orderDetails['orders_products'] as $product) {
            $total_items = $total_items + $product['product_qty'];
        }
        // dd($total_items);

        // Calculate item discount, if any (if exists)
        if ($orderDetails['coupon_amount'] > 0) { // if there's a Coupon Code (discount) used
            $item_discount = round($orderDetails['coupon_amount'] / $total_items, 2); // (Not very convinced about the logic!) For example, if the discout of the Coupon Code gives a discount of 200 LE on all Cart items of a certain user (the discount is on the WHOLE order), and the user has 4 items in their Cart, then this means every item has a 200/4= 50 LE discount (quota)
            // dd($item_discount);
        } else {
            $item_discount = 0;
        }


        return view('admin.orders.order_details')->with(compact('orderDetails', 'userDetails', 'orderStatuses', 'orderItemStatuses', 'orderLog', 'item_discount'));
    }

    // Update Order Status (by 'admin'-s ONLY, not 'vendor'-s, in contrast to "Update Item Status" which can be updated by both 'vendor'-s and 'admin'-s) (Pending, Shipped, In Progress, Canceled, ...) in admin/orders/order_details.blade.php in Admin Panel    
    // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
    public function updateOrderStatus(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Note: There are two types of Shipping Process: "manual" and "automatic". "Manual" is in the case like small businesses, where the courier arrives at the owner warehouse to to pick up the order for shipping, and the small business owner takes the shipment details (like courier name, tracking number, ...) from the courier, and inserts those details themselves in the Admin Panel when they "Update Order Status" Section (by an 'admin') or "Update Item Status" Section (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php). With "automatic" shipping process, we're integrating third-party APIs (e.g. Shiprocket API) and orders go directly to the shipping partner, and the updates comes from the courier's end, and orders are automatically delivered to customers
            // "Automatic" Shipping Process (when 'admin' does NOT enter the Courier Name and Tracking Number): Configure the Shiprocket API in our Admin Panel in admin/orders/order_details.blade.php (to automate Pushing Orders to Shiprocket API by selecting "Shipped" from the drop-down menu)    
            if (empty($data['courier_name']) && empty($data['tracking_number']) && $data['order_status'] == 'Shipped') { // if the 'admin' didn't enter the Courier Name and Tracking Nubmer when they selected "Shipped" from the drop-down menu in admin/orders/order_details.blade.php, use the "Automatic" Shipping Process (Push Orders to Shiprocket API), not the "Manual" Shipping process. Check the "Manual" Shipping process in the next if statement
                // dd('Inside Automatic Shipping Process if statement in updateOrderStatus() method in Admin/OrderController.php<br>');
                // echo 'Inside Automatic Shipping Process if statement in updateOrderStatus() method in Admin/OrderController.php<br>';
                // exit;

                $getResults = Order::pushOrder($data['order_id']);
                // dd($getResults);
                if (!isset($getResults['status']) || (isset($getResults['status']) && $getResults['status'] == false)) { // If Status is not coming at all, or it's coming but it's false
                    Session::put('error_message', $getResults['message']); // The message is coming from the Shiprocket API    // Storing Data: https://laravel.com/docs/9.x/session#storing-data

                    return redirect()->back(); // Redirecting With Flashed Session Data: https://laravel.com/docs/10.x/responses#redirecting-with-flashed-session-data
                    // return redirect()->back()->with('error_message', $getResults['message']); // Redirecting With Flashed Session Data: https://laravel.com/docs/10.x/responses#redirecting-with-flashed-session-data
                }
            }


            // Update Order Status in `orders` table
            Order::where('id', $data['order_id'])->update(['order_status' => $data['order_status']]);


            // Note: There are two types of Shipping Process: "manual" and "automatic". "Manual" is in the case like small businesses, where the courier arrives at the owner warehouse to to pick up the order for shipping, and the small business owner takes the shipment details (like courier name, tracking number, ...) from the courier, and inserts those details themselves in the Admin Panel when they "Update Order Status" Section (by an 'admin') or "Update Item Status" Section (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php). With "automatic" shipping process, we're integrating third-party APIs (e.g. Shiprocket API) and orders go directly to the shipping partner, and the updates comes from the courier's end, and orders are automatically delivered to customers
            // First: "Manual" Shipping Process (when 'admin' enters the Courier Name and Tracking Number. Check the last if statement for the "Automatic" Shipping Process) (Business owner takes the order shipment information from the courier and inserts them themselves when they "Update Order Status" (by an 'admin') (in admin/orders/order_details.blade.php)) i.e. Updating `courier_name` and `tracking_number` columns in `orders` table
            if (!empty($data['courier_name']) && !empty($data['tracking_number'])) { // if an 'admin' Updates the Order Status to 'Shipped' in admin/orders/order_details.blade.php, and submits both Courier Name and Tracking Number HTML input fields
                Order::where('id', $data['order_id'])->update([
                    'courier_name'    => $data['courier_name'],
                    'tracking_number' => $data['tracking_number']
                ]);
            }


            // We'll save the "Update Order Status" History/Logs in `orders_logs` database table (whenever an 'admin' updates an order status)    
            $log = new OrdersLog;
            $log->order_id     = $data['order_id'];
            $log->order_status = $data['order_status'];
            $log->save();


            // "Update Order Status" email: We send an email and SMS to the user when the general Order Status is updated by an 'admin' (pending, shipped, in progress, …)
            $deliveryDetails = Order::select('mobile', 'email', 'name')->where('id', $data['order_id'])->first()->toArray();
            $orderDetails    = Order::with('orders_products')->where('id', $data['order_id'])->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model

            
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
                    $message->to($email)->subject('Order Status Updated - MultiVendorEcommerceApplication.com.eg');
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
                    $message->to($email)->subject('Order Status Updated - MultiVendorEcommerceApplication.com.eg');
                });
            }

            $message = 'Order Status has been updated successfully!';


            return redirect()->back()->with('success_message', $message);
        }
    }

    // Update Item Status (which can be determined by both 'vendor'-s and 'admin'-s, in contrast to "Update Order Status" which is updated by 'admin'-s ONLY, not 'vendor'-s) (Pending, In Progress, Shipped, Delivered, ...) in admin/orders/order_details.blade.php in Admin Panel    
    // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
    public function updateOrderItemStatus(Request $request) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Update Order Item Status in `orders_products` table
            OrdersProduct::where('id', $data['order_item_id'])->update(['item_status' => $data['order_item_status']]);


            // Note: There are two types of Shipping Process: "manual" and "automatic". "Manual" is in the case like small businesses, where the courier arrives at the owner warehouse to to pick up the order for shipping, and the small business owner takes the shipment details (like courier name, tracking number, ...) from the courier, and inserts those details themselves in the Admin Panel when they "Update Order Status" Section (by an 'admin') or "Update Item Status" Section (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php). With "automatic" shipping process, we're integrating third-party APIs and orders go directly to the shipping partner, and the updates comes from the courier's end, and orders are automatically delivered to customers
            // First: "Manual" Shipping Process (Business owner takes the order shipment information from the courier and inserts them themselves when they "Update Order Item Status" (by a 'vendor' or 'admin') (in admin/orders/order_details.blade.php)) i.e. Updating `courier_name` and `tracking_number` columns in `orders_products` table
            if (!empty($data['item_courier_name']) && !empty($data['item_tracking_number'])) { // if a 'vendor' or 'admin' updates the order Item Status to 'Shipped' in admin/orders/order_details.blade.php, and submits both Courier Name and Tracking Number HTML input fields
                OrdersProduct::where('id', $data['order_item_id'])->update([
                    'courier_name'    => $data['item_courier_name'],
                    'tracking_number' => $data['item_tracking_number']
                ]);
            }


            // Get the `order_id` column (which is the foreign key to the `id` column in `orders` table) value from `orders_products` table
            $getOrderId = OrdersProduct::select('order_id')->where('id', $data['order_item_id'])->first()->toArray();


            // We'll save the Update "Item Status" History/Logs in `orders_logs` database table (whenever a 'vendor' or 'admin' updates an order item status)    
            // Note: In `orders_logs` table, if the `order_item_id` column is zero 0, this means the "Item Status" has never been updated, and if it's not zero 0, this means it's been previously updated by a 'vendor' or 'admin' and the number references/denotes the `id` column (foreign key) of the `orders_products` table
            $log = new OrdersLog;
            $log->order_id      = $getOrderId['order_id'];
            $log->order_item_id = $data['order_item_id'];
            $log->order_status  = $data['order_item_status'];
            $log->save();


            // "Item Status" update email: We send an email and SMS to the user when the Item Status (in the "Ordered Products" section) is updated by a 'vendor' or 'admin' (pending, shipped, in progress, …) for every product on its own in the email (not the whole order products, but the email is about the product that has been updated ONLY)
            $deliveryDetails = Order::select('mobile', 'email', 'name')->where('id', $getOrderId['order_id'])->first()->toArray();

            // Making sure that ONLY ONE order product (from the `orders_products` table) that has been item status updated, NOT all the order products, are sent in the email
            $order_item_id = $data['order_item_id'];
            $orderDetails  = Order::with([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
                'orders_products' => function($query) use ($order_item_id) { // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct     // 'orders_products' is the Relationship method name in Order.php model
                    $query->where('id', $order_item_id); // `id` column in `orders_products` table
                }
            ])->where('id', $getOrderId['order_id'])->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);
            // Note: Now in this case, updating the item status of one product will send an email to user but with telling the item statuses of all of the Order items (not ONLY the item with the status updated!). The solution to this is using a subquery (Constraining Eager Loads)


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
                    $message->to($email)->subject('Order Item Status Updated - MultiVendorEcommerceApplication.com.eg');
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
                    $message->to($email)->subject('Order Item Status Updated - MultiVendorEcommerceApplication.com.eg');
                });
            }

            $message = 'Order Item Status has been updated successfully!';


            return redirect()->back()->with('success_message', $message);
        }
    }

    // Render order invoice page (HTML) in order_invoice.blade.php    
    public function viewOrderInvoice($order_id) { // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        $orderDetails = Order::with('orders_products')->where('id', $order_id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
        // dd($orderDetails);
        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray(); // details of the user who made the order


        return view('admin.orders.order_invoice')->with(compact('orderDetails', 'userDetails'));
    }

    // Render order PDF invoice in order_invoice.blade.php using Dompdf Package    
    // (We'll use the same viewPDFInvoice() function (but with different routes/URLs!) to render the PDF invoice for 'admin'-s in the Admin Panel and for the user to download it!)    // User download order PDF invoice (we created this route outside outside the Admin Panel routes so that the user could use it!)
    public function viewPDFInvoice($order_id) { // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        $orderDetails = Order::with('orders_products')->where('id', $order_id)->first()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
        // dd($orderDetails);
        $userDetails = User::where('id', $orderDetails['user_id'])->first()->toArray(); // details of the user who made the order


        // We remove all SINGLE Quotes in order for all the errors to disappear
        $invoiceHTML = '
            <!DOCTYPE html>
            <html>
            <head>
                <title>HTML to API - Invoice</title>
                <meta content="width=device-width, initial-scale=1.0" name="viewport">
                <meta http-equiv="content-type" content="text-html; charset=utf-8">
                <style type="text/css">
                    html, body, div, span, applet, object, iframe,
                    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
                    a, abbr, acronym, address, big, cite, code,
                    del, dfn, em, img, ins, kbd, q, s, samp,
                    small, strike, strong, sub, sup, tt, var,
                    b, u, i, center,
                    dl, dt, dd, ol, ul, li,
                    fieldset, form, label, legend,
                    table, caption, tbody, tfoot, thead, tr, th, td,
                    article, aside, canvas, details, embed,
                    figure, figcaption, footer, header, hgroup,
                    menu, nav, output, ruby, section, summary,
                    time, mark, audio, video {
                        margin: 0;
                        padding: 0;
                        border: 0;
                        font: inherit;
                        font-size: 100%;
                        vertical-align: baseline;
                    }
            
                    html {
                        line-height: 1;
                    }
            
                    ol, ul {
                        list-style: none;
                    }
            
                    table {
                        border-collapse: collapse;
                        border-spacing: 0;
                    }
            
                    caption, th, td {
                        text-align: left;
                        font-weight: normal;
                        vertical-align: middle;
                    }
            
                    q, blockquote {
                        quotes: none;
                    }
                    q:before, q:after, blockquote:before, blockquote:after {
                        content: "";
                        content: none;
                    }
            
                    a img {
                        border: none;
                    }
            
                    article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
                        display: block;
                    }
            
                    body {
                        font-family: "Source Sans Pro", sans-serif;
                        font-weight: 300;
                        font-size: 12px;
                        margin: 0;
                        padding: 0;
                    }
                    body a {
                        text-decoration: none;
                        color: inherit;
                    }
                    body a:hover {
                        color: inherit;
                        opacity: 0.7;
                    }
                    body .container {
                        min-width: 500px;
                        margin: 0 auto;
                        padding: 0 20px;
                    }
                    body .clearfix:after {
                        content: "";
                        display: table;
                        clear: both;
                    }
                    body .left {
                        float: left;
                    }
                    body .right {
                        float: right;
                    }
                    body .helper {
                        display: inline-block;
                        height: 100%;
                        vertical-align: middle;
                    }
                    body .no-break {
                        page-break-inside: avoid;
                    }
            
                    header {
                        margin-top: 20px;
                        margin-bottom: 50px;
                    }
                    header figure {
                        float: left;
                        width: 60px;
                        height: 60px;
                        margin-right: 10px;
                        background-color: #8BC34A;
                        border-radius: 50%;
                        text-align: center;
                    }
                    header figure img {
                        margin-top: 13px;
                    }
                    header .company-address {
                        float: left;
                        max-width: 150px;
                        line-height: 1.7em;
                    }
                    header .company-address .title {
                        color: #8BC34A;
                        font-weight: 400;
                        font-size: 1.5em;
                        text-transform: uppercase;
                    }
                    header .company-contact {
                        float: right;
                        height: 60px;
                        padding: 0 10px;
                        background-color: #8BC34A;
                        color: white;
                    }
                    header .company-contact span {
                        display: inline-block;
                        vertical-align: middle;
                    }
                    header .company-contact .circle {
                        width: 20px;
                        height: 20px;
                        background-color: white;
                        border-radius: 50%;
                        text-align: center;
                    }
                    header .company-contact .circle img {
                        vertical-align: middle;
                    }
                    header .company-contact .phone {
                        height: 100%;
                        margin-right: 20px;
                    }
                    header .company-contact .email {
                        height: 100%;
                        min-width: 100px;
                        text-align: right;
                    }
            
                    section .details {
                        margin-bottom: 55px;
                    }
                    section .details .client {
                        width: 50%;
                        line-height: 20px;
                    }
                    section .details .client .name {
                        color: #8BC34A;
                    }
                    section .details .data {
                        width: 50%;
                        text-align: right;
                    }
                    section .details .title {
                        margin-bottom: 15px;
                        color: #8BC34A;
                        font-size: 3em;
                        font-weight: 400;
                        text-transform: uppercase;
                    }
                    section table {
                        width: 100%;
                        border-collapse: collapse;
                        border-spacing: 0;
                        font-size: 0.9166em;
                    }
                    section table .qty, section table .unit, section table .total {
                        width: 15%;
                    }
                    section table .desc {
                        width: 55%;
                    }
                    section table thead {
                        display: table-header-group;
                        vertical-align: middle;
                        border-color: inherit;
                    }
                    section table thead th {
                        padding: 5px 10px;
                        background: #8BC34A;
                        border-bottom: 5px solid #FFFFFF;
                        border-right: 4px solid #FFFFFF;
                        text-align: right;
                        color: white;
                        font-weight: 400;
                        text-transform: uppercase;
                    }
                    section table thead th:last-child {
                        border-right: none;
                    }
                    section table thead .desc {
                        text-align: left;
                    }
                    section table thead .qty {
                        text-align: center;
                    }
                    section table tbody td {
                        padding: 10px;
                        background: #E8F3DB;
                        color: #777777;
                        text-align: right;
                        border-bottom: 5px solid #FFFFFF;
                        border-right: 4px solid #E8F3DB;
                    }
                    section table tbody td:last-child {
                        border-right: none;
                    }
                    section table tbody h3 {
                        margin-bottom: 5px;
                        color: #8BC34A;
                        font-weight: 600;
                    }
                    section table tbody .desc {
                        text-align: left;
                    }
                    section table tbody .qty {
                        text-align: center;
                    }
                    section table.grand-total {
                        margin-bottom: 45px;
                    }
                    section table.grand-total td {
                        padding: 5px 10px;
                        border: none;
                        color: #777777;
                        text-align: right;
                    }
                    section table.grand-total .desc {
                        background-color: transparent;
                    }
                    section table.grand-total tr:last-child td {
                        font-weight: 600;
                        color: #8BC34A;
                        font-size: 1.18181818181818em;
                    }
            
                    footer {
                        margin-bottom: 20px;
                    }
                    footer .thanks {
                        margin-bottom: 40px;
                        color: #8BC34A;
                        font-size: 1.16666666666667em;
                        font-weight: 600;
                    }
                    footer .notice {
                        margin-bottom: 25px;
                    }
                    footer .end {
                        padding-top: 5px;
                        border-top: 2px solid #8BC34A;
                        text-align: center;
                    }
                </style>
            </head>
            
            <body>
                <header class="clearfix">
                    <div class="container">
                        <div class="company-address">
                            <h2 class="title">Multi-vendor E-commerce Application</h2>
                            <p>
                                37 Salah Salem St.<br>
                                Cairo, Egypt
                            </p>
                        </div>
                        <div class="company-contact">
                            <div class="phone left">
                                <span class="circle"><img src="data:image/svg+xml;charset=utf-8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIg0KCSB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjkuNzYycHgiIGhlaWdodD0iOS45NThweCINCgkgdmlld0JveD0iLTQuOTkyIDAuNTE5IDkuNzYyIDkuOTU4IiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IC00Ljk5MiAwLjUxOSA5Ljc2MiA5Ljk1OCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8dGl0bGU+RmlsbCAxPC90aXRsZT4NCjxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPg0KPGcgaWQ9IlBhZ2UtMSIgc2tldGNoOnR5cGU9Ik1TUGFnZSI+DQoJPGcgaWQ9IklOVk9JQ0UtMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTMwMS4wMDAwMDAsIC01NC4wMDAwMDApIiBza2V0Y2g6dHlwZT0iTVNBcnRib2FyZEdyb3VwIj4NCgkJPGcgaWQ9IlpBR0xBVkxKRSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMzAuMDAwMDAwLCAxNS4wMDAwMDApIiBza2V0Y2g6dHlwZT0iTVNMYXllckdyb3VwIj4NCgkJCTxnIGlkPSJLT05UQUtUSSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMjY3LjAwMDAwMCwgMzUuMDAwMDAwKSIgc2tldGNoOnR5cGU9Ik1TU2hhcGVHcm91cCI+DQoJCQkJPGcgaWQ9Ik92YWwtMS1feDJCXy1GaWxsLTEiPg0KCQkJCQk8cGF0aCBpZD0iRmlsbC0xIiBmaWxsPSIjOEJDMzRBIiBkPSJNOC43NjUsMTIuMzc1YzAuMDIsMC4xNjItMC4wMjgsMC4zMDMtMC4xNDMsMC40MjJMNy4yNDYsMTQuMTkNCgkJCQkJCWMtMC4wNjIsMC4wNy0wLjE0MywwLjEzMy0wLjI0MywwLjE4MmMtMC4xMDEsMC4wNDktMC4xOTcsMC4wOC0wLjI5NSwwLjA5NGMtMC4wMDcsMC0wLjAyOCwwLTAuMDYyLDAuMDA0DQoJCQkJCQljLTAuMDM0LDAuMDA1LTAuMDgsMC4wMDgtMC4xMzQsMC4wMDhjLTAuMTMxLDAtMC4zNDMtMC4wMjMtMC42MzUtMC4wNjhjLTAuMjkzLTAuMDQ1LTAuNjUxLTAuMTU4LTEuMDc2LTAuMzM2DQoJCQkJCQljLTAuNDI0LTAuMTgyLTAuOTA0LTAuNDUxLTEuNDQyLTAuODA5Yy0wLjUzNi0wLjM1Ny0xLjEwOS0wLjg1Mi0xLjcxNi0xLjQ3OWMtMC40ODEtMC40ODQtMC44OC0wLjk1LTEuMTk4LTEuMzkzDQoJCQkJCQlDMC4xMjgsOS45NS0wLjEyNSw5LjU0MS0wLjMxOSw5LjE2NGMtMC4xOTMtMC4zNzYtMC4zMzgtMC43MTctMC40MzQtMS4wMjNjLTAuMDk3LTAuMzA2LTAuMTYxLTAuNTctMC4xOTUtMC43OTINCgkJCQkJCWMtMC4wMzUtMC4yMjEtMC4wNS0wLjM5NC0wLjA0Mi0wLjUyMWMwLjAwNy0wLjEyNiwwLjAxLTAuMTk3LDAuMDEtMC4yMTFjMC4wMTQtMC4wOTksMC4wNDQtMC4xOTgsMC4wOTMtMC4zMDENCgkJCQkJCWMwLjA0OS0wLjEwMSwwLjEwOC0wLjE4NCwwLjE3Ni0wLjI0N2wxLjM3NS0xLjQwM2MwLjA5Ny0wLjA5OCwwLjIwNi0wLjE0NywwLjMzLTAuMTQ3YzAuMDksMCwwLjE2OSwwLjAyNiwwLjIzOCwwLjA3OQ0KCQkJCQkJQzEuMyw0LjY0OCwxLjM1OSw0LjcxNCwxLjQwNiw0Ljc5MWwxLjEwNiwyLjE0MWMwLjA2MiwwLjExNCwwLjA4LDAuMjM1LDAuMDUyLDAuMzdDMi41MzgsNy40MzYsMi40NzgsNy41NDgsMi4zODksNy42NA0KCQkJCQkJTDEuODgzLDguMTU3QzEuODY5LDguMTcxLDEuODU2LDguMTk0LDEuODQ2LDguMjI2QzEuODM1LDguMjU2LDEuODMsOC4yODMsMS44Myw4LjMwNGMwLjAyNywwLjE0NywwLjA5LDAuMzE3LDAuMTg3LDAuNTA3DQoJCQkJCQljMC4wODIsMC4xNjksMC4yMSwwLjM3NSwwLjM4MiwwLjYxOGMwLjE3MiwwLjI0MywwLjQxNywwLjUyMSwwLjczNCwwLjgzOWMwLjMxMSwwLjMyMiwwLjU4NSwwLjU3NCwwLjgyOCwwLjc1NQ0KCQkJCQkJYzAuMjQsMC4xNzgsMC40NDMsMC4zMDksMC42MDQsMC4zOTVjMC4xNjIsMC4wODUsMC4yODYsMC4xMzUsMC4zNzIsMC4xNTRsMC4xMjgsMC4wMjRjMC4wMTUsMCwwLjAzOC0wLjAwNiwwLjA2Ny0wLjAxNg0KCQkJCQkJYzAuMDMyLTAuMDEsMC4wNTQtMC4wMjEsMC4wNjctMC4wMzdsMC41ODgtMC42MTJjMC4xMjUtMC4xMTIsMC4yNy0wLjE2OCwwLjQzNi0wLjE2OGMwLjExNywwLDAuMjA3LDAuMDIxLDAuMjc3LDAuMDYxaDAuMDENCgkJCQkJCWwxLjk5NSwxLjIwM0M4LjY1MSwxMi4xMiw4LjczNywxMi4yMzQsOC43NjUsMTIuMzc1TDguNzY1LDEyLjM3NXoiLz4NCgkJCQk8L2c+DQoJCQk8L2c+DQoJCTwvZz4NCgk8L2c+DQo8L2c+DQo8L3N2Zz4NCg==" alt=""><span class="helper"></span></span>
                                <span class="helper"></span>
                            </div>
                            <div class="email right">
                                <span class="circle"><img src="data:image/svg+xml;charset=utf-8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNS4xLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIg0KCSB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE0LjE3M3B4Ig0KCSBoZWlnaHQ9IjE0LjE3M3B4IiB2aWV3Qm94PSIwLjM1NCAtMi4yNzIgMTQuMTczIDE0LjE3MyIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwLjM1NCAtMi4yNzIgMTQuMTczIDE0LjE3MyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSINCgk+DQo8dGl0bGU+ZW1haWwxOTwvdGl0bGU+DQo8ZGVzYz5DcmVhdGVkIHdpdGggU2tldGNoLjwvZGVzYz4NCjxnIGlkPSJQYWdlLTEiIHNrZXRjaDp0eXBlPSJNU1BhZ2UiPg0KCTxnIGlkPSJJTlZPSUNFLTEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC00MTcuMDAwMDAwLCAtNTUuMDAwMDAwKSIgc2tldGNoOnR5cGU9Ik1TQXJ0Ym9hcmRHcm91cCI+DQoJCTxnIGlkPSJaQUdMQVZMSkUiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDMwLjAwMDAwMCwgMTUuMDAwMDAwKSIgc2tldGNoOnR5cGU9Ik1TTGF5ZXJHcm91cCI+DQoJCQk8ZyBpZD0iS09OVEFLVEkiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDI2Ny4wMDAwMDAsIDM1LjAwMDAwMCkiIHNrZXRjaDp0eXBlPSJNU1NoYXBlR3JvdXAiPg0KCQkJCTxnIGlkPSJPdmFsLTEtX3gyQl8tZW1haWwxOSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTE3LjAwMDAwMCwgMC4wMDAwMDApIj4NCgkJCQkJPHBhdGggaWQ9ImVtYWlsMTkiIGZpbGw9IiM4QkMzNEEiIGQ9Ik0zLjM1NCwxNC4yODFoMTQuMTczVjUuMzQ2SDMuMzU0VjE0LjI4MXogTTEwLjQ0LDEwLjg2M0w0LjYyNyw2LjAwOGgxMS42MjZMMTAuNDQsMTAuODYzDQoJCQkJCQl6IE04LjEyNSw5LjgxMkw0LjA1LDEzLjIxN1Y2LjQwOUw4LjEyNSw5LjgxMnogTTguNjUzLDEwLjI1M2wxLjc4OCwxLjQ5M2wxLjc4Ny0xLjQ5M2w0LjAyOSwzLjM2Nkg0LjYyNEw4LjY1MywxMC4yNTN6DQoJCQkJCQkgTTEyLjc1NSw5LjgxMmw0LjA3NS0zLjQwM3Y2LjgwOEwxMi43NTUsOS44MTJ6Ii8+DQoJCQkJPC9nPg0KCQkJPC9nPg0KCQk8L2c+DQoJPC9nPg0KPC9nPg0KPC9zdmc+DQo=" alt=""><span class="helper"></span></span>
                                <a href="mailto:company@example.com">company@example.com</a>
                                <span class="helper"></span>
                            </div>
                        </div>
                    </div>
                </header>
            
                <section>
                    <div class="container">
                        <div class="details clearfix">
                            <div class="client left">
                                <p>INVOICE TO:</p>
                                <p class="name">' . $orderDetails['name'] . '</p>
                                <p>'
                                    . $orderDetails['address'] . ', ' . $orderDetails['city'] . ', ' . $orderDetails['state'] . ', ' . $orderDetails['country'] . '-' . $orderDetails['pincode'] .
                                '</p>
                                <a href="mailto:' . $orderDetails['email'] . '">' . $orderDetails['email'] . '</a>
                            </div>
                            <div class="data right">
                                <div class="title">Order ID: ' . $orderDetails['id'] . '</div>
                                <div class="date">
                                    Order Date: ' . date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) . '<br>
                                    Order Amount: INR ' . $orderDetails['grand_total'] . '<br>
                                    Order Status: ' . $orderDetails['order_status'] . '<br>
                                    Payment Method: ' . $orderDetails['payment_method'] . '<br>
                                </div>
                            </div>
                        </div>
            
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="desc">Product Code</th>
                                    <th class="qty">Size</th>
                                    <th class="qty">Color</th>
                                    <th class="qty">Quantity</th>
                                    <th class="unit">Unit price</th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>
                            <tbody>';

                            // Calculate the Subtotal
                            $subTotal = 0;
                            foreach ($orderDetails['orders_products'] as $product) {
                                // We CONCATENATE $invoiceHTML
                                $invoiceHTML .= '
                                    <tr>
                                        <td class="desc">' . $product['product_code'] . '</td>
                                        <td class="qty">' . $product['product_size'] . '</td>
                                        <td class="qty">' . $product['product_color'] . '</td>
                                        <td class="qty">' . $product['product_qty'] . '</td>
                                        <td class="unit">INR ' . $product['product_price'] . '</td>
                                        <td class="total">INR ' . $product['product_price'] * $product['product_qty'] . '</td>
                                    </tr>';

                                // Continue: Calculate the Subtotal
                                $subTotal = $subTotal + ($product['product_price'] * $product['product_qty']);
                            }

                            // We CONCATENATE $invoiceHTML
                            $invoiceHTML .= '
                            </tbody>
                        </table>
                        <div class="no-break">
                            <table class="grand-total">
                                <tbody>
                                    <tr>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="total" colspan=2>SUBTOTAL</td>
                                        <td class="total">INR ' . $subTotal . '</td>
                                    </tr>
                                    <tr>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="total" colspan=2>SHIPPING</td>
                                        <td class="total">INR 0</td>
                                    </tr>
                                    <tr>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="total" colspan=2>DISCOUNT</td>';

                                        if ($orderDetails['coupon_amount'] > 0) {
                                            // We CONCATENATE $invoiceHTML
                                            $invoiceHTML .= '<td class="total">INR '. $orderDetails['coupon_amount'] . '</td>';
                                        } else {
                                            // We CONCATENATE $invoiceHTML
                                            $invoiceHTML .= '<td class="total">INR 0</td>';
                                        }

                                        // We CONCATENATE $invoiceHTML
                                        $invoiceHTML .= '
                                    </tr>
                                    <tr>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="desc"></td>
                                        <td class="total" colspan="2">TOTAL</td>
                                        <td class="total">INR ' . $orderDetails['grand_total'] . '</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            
                <footer>
                    <div class="container">
                        <div class="thanks">Thank you!</div>
                        <div class="end">Invoice was created on a computer and is valid without the signature and seal.</div>
                    </div>
                </footer>
            
            </body>
            
            </html>
        ';


        // Using Dompdf Package: https://github.com/dompdf/dompdf
        // instantiate and use the dompdf class
        $dompdf = new \Dompdf\Dompdf();
        // dd($dompdf);
        
        $dompdf->loadHtml($invoiceHTML);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }

}