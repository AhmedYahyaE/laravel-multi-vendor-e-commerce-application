{{-- This is the order "Update ITEM Status" by a 'vendor' or 'admin' email file using Mailtrap --}} {{-- All the variables (like $name, $mobile, $email, ...) used here are passed in from the updateOrderItemStatus() method in Admin/OrderController.php --}}



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <table style="width: 700px">
            <tr><td>&nbsp;</td></tr>
            <tr><td><img src="{{ asset('front/images/main-logo/main-logo.png') }}"></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Hello {{ $name }}</td></tr>
            <tr><td>&nbsp;<br></td></tr>
            <tr><td>Your Order #{{ $order_id }} Item status has been updated to {{ $order_status }}</td></tr>
            <tr><td>&nbsp;</td></tr>

            
            @if (!empty($courier_name) && !empty($tracking_number))
                <tr>
                    <td>Courier Name is {{ $courier_name }} and Tracking Number is {{ $tracking_number }}</td>
                </tr>
                <tr><td>&nbsp;</td></tr>
            @endif

            <tr><td>Your Order Item details are as below:</td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table style="width: 95%" cellpadding="5" cellspacing="5" bgcolor="#f7f4f4">
                    <tr bgcolor="#cccccc">
                        <td>Product Name</td>
                        <td>Product Code</td>
                        <td>Product Size</td>
                        <td>Product Color</td>
                        <td>Product Quantity</td>
                        <td>Product Price</td>
                    </tr>
                    @foreach ($orderDetails['orders_products'] as $order)
                        <tr bgcolor="#f9f9f9">
                            <td>{{ $order['product_name'] }}</td>
                            <td>{{ $order['product_code'] }}</td>
                            <td>{{ $order['product_size'] }}</td>
                            <td>{{ $order['product_color'] }}</td>
                            <td>{{ $order['product_qty'] }}</td>
                            <td>{{ $order['product_price'] }}</td>
                        </tr>
                    @endforeach
                </table>    
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>
                <table>
                    <tr>
                        <td><strong>Delivery Address:</strong></td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['name'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['address'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['city'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['state'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['country'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['pincode'] }}</td>
                    </tr>
                    <tr>
                        <td>{{ $orderDetails['mobile'] }}</td>
                    </tr>
                </table>    
            </td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>For any queries, you can contact us at <a href="mailto:info@MultiVendorEcommerceApplication.com.eg">info@MultiVendorEcommerceApplication.com.eg</a></td></tr>
            <tr><td>&nbsp;</td></tr>
            <tr><td>Regards,<br>Team Multi-vendor E-commerce Application</td></tr>
            <tr><td>&nbsp;</td></tr>
        </table>
    </body>
</html>