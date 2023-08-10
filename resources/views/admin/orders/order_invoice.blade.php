{{-- This is the HTML Order Invoice. This page is rendered by viewOrderInvoice() method inside Admin/OrderController.php --}}



<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2>
                <h3 class="pull-right">
                    Order # {{ $orderDetails['id'] }}

                    {{-- Laravel barcode/QR code generation package (to show barcodes/QR codes for both Product ID and Product Code): https://github.com/milon/barcode --}} 
                    @php
                        echo DNS1D::getBarcodeHTML($orderDetails['id'], 'C39');       // This is the product `id` Barcode
                        // echo DNS2D::getBarcodeHTML($orderDetails['id'], 'QRCODE'); // This is the product `id` QR code
                    @endphp
                </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				    <strong>Billed To:</strong><br>
    					{{ $userDetails['name'] }}<br>

                        @if (!empty($userDetails['address']))
                            {{ $userDetails['address'] }}<br>
                        @endif
                        @if (!empty($userDetails['city']))
                            {{ $userDetails['city'] }}<br>
                        @endif
                        @if (!empty($userDetails['state']))
                            {{ $userDetails['state'] }}<br>
                        @endif
                        @if (!empty($userDetails['country']))
                            {{ $userDetails['country'] }}<br>
                        @endif
                        @if (!empty($userDetails['pincode']))
                            {{ $userDetails['pincode'] }}<br>
                        @endif

                        {{ $userDetails['mobile'] }}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			    <strong>Shipped To:</strong><br>
                        {{ $orderDetails['name'] }}<br>
                        {{ $orderDetails['address'] }}<br>
                        {{ $orderDetails['city'] }}, {{ $orderDetails['state'] }}<br>
                        {{ $orderDetails['country'] }}-{{ $orderDetails['pincode'] }}<br>
                        {{ $userDetails['mobile'] }}<br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
                        {{ $orderDetails['payment_method'] }}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Product Code</strong></td>
        							<td class="text-center"><strong>Size</strong></td>
        							<td class="text-center"><strong>Color</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>


                                {{-- Calculate the Subtotal --}}
                                @php
                                    $subTotal = 0;
                                @endphp

                                @foreach ($orderDetails['orders_products'] as $product)
                                    <tr>
                                        <td>
                                            {{ $product['product_code'] }}

                                            {{-- Laravel barcode/QR code generation package (to show barcodes/QR codes for both Product ID and Product Code): https://github.com/milon/barcode --}} 
                                            @php
                                                echo DNS1D::getBarcodeHTML($product['product_code'], 'C39');       // This is the product `product_code` Barcode
                                                // echo DNS2D::getBarcodeHTML($product['product_code'], 'QRCODE'); // This is the product `product_code` QR code
                                            @endphp
                                        </td>
                                        <td class="text-center">{{ $product['product_size'] }}</td>
                                        <td class="text-center">{{ $product['product_color'] }}</td>
                                        <td class="text-center">INR {{ $product['product_price'] }}</td>
                                        <td class="text-center">{{ $product['product_qty'] }}</td>
                                        <td class="text-right">INR {{ $product['product_price'] * $product['product_qty'] }}</td>
                                    </tr>

                                    {{-- Continue: Calculate the Subtotal --}}
                                    @php
                                        $subTotal = $subTotal + ($product['product_price'] * $product['product_qty'])
                                    @endphp
                                @endforeach

                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-right"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">INR {{ $subTotal }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Shipping Charges</strong></td>
                                    <td class="no-line text-right">INR 0</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-right"><strong>Grand Total</strong></td>
                                    <td class="no-line text-right">
                                        <strong>INR {{ $orderDetails['grand_total'] }}</strong>
                                        <br>

                                        @if ($orderDetails['payment_method'] == 'COD')
                                            <font color=red>(Already Paid)</font>
                                        @endif
                                    </td>
                                </tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>