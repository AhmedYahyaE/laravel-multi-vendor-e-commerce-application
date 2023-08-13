{{-- Note: This page (view) is rendered by the checkout() method in the Front/ProductsController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Checkout</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="checkout.html">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Checkout-Page -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">

            {{-- Showing the following HTML Form Validation Errors: (check checkout() method in Front/ProductsController.php) --}}
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <!-- Second Accordion /- -->

                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6" id="deliveryAddresses"> {{-- We created this id="deliveryAddresses" to use it as a handle for jQuery AJAX to refresh this page, check front/js/custom.js --}}



                                
                                
                                @include('front.products.delivery_addresses')



                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">



                                {{-- The complete HTML Form of the user submitting their Delivery Address and Payment Method --}}
                                <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                                    @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                                    
                                    
                                    @if (count($deliveryAddresses) > 0) {{-- Checking if there are any $deliveryAddreses for the currently authenticated/logged-in user --}} {{-- $deliveryAddresses variable is passed in from checkout() method in Front/ProductsController.php --}}

                                        <h4 class="section-h4">Delivery Addresses</h4>

                                        @foreach ($deliveryAddresses as $address)
                                            <div class="control-group" style="float: left; margin-right: 5px">
                                                {{-- We'll use the Custom HTML data attributes:    shipping_charges    ,    total_price    ,    coupon_amount    ,    codpincodeCount    and    prepaidpincodeCount    to use them as handles for jQuery to change the calculations in "Your Order" section using jQuery. Check front/js/custom.js file --}}  
                                                <input type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}" shipping_charges="{{ $address['shipping_charges'] }}" total_price="{{ $total_price }}" coupon_amount="{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}" codpincodeCount="{{ $address['codpincodeCount'] }}" prepaidpincodeCount="{{ $address['prepaidpincodeCount'] }}"> {{-- $total_price variable is passed in from checkout() method in Front/ProductsController.php --}} {{-- We created the Custom HTML Attribute id="address{{ $address['id'] }}" to get the UNIQUE ids of the addresses in order for the <label> HTML element to be able to point for that <input> --}}
                                            </div>
                                            <div>
                                                <label class="control-label" for="address{{ $address['id'] }}">
                                                    {{ $address['name'] }}, {{ $address['address'] }}, {{ $address['city'] }}, {{ $address['state'] }}, {{ $address['country'] }} ({{ $address['mobile'] }})
                                                </label>
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress" style="float: right; margin-left: 10px">Remove</a> {{-- We used href="javascript:;" to prevent the <a> link from being clickable (to make the <a> unclickable) (stop the <a> function or action) because we'll use jQuery AJAX to click this link, check front/js/custom.js --}} {{-- We use the class="removeAddress" as a handle for the AJAX request in front/js/custom.js --}}
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress"   style="float: right"                   >Edit</a>   {{-- We used href="javascript:;" to prevent the <a> link from being clickable (to make the <a> unclickable) (stop the <a> function or action) because we'll use jQuery AJAX to click this link, check front/js/custom.js --}} {{-- We use the class="editAddress" as a handle for the AJAX request in front/js/custom.js --}}
                                            </div>
                                        @endforeach
                                        <br>
                                    @endif 


                                    <h4 class="section-h4">Your Order</h4>
                                    <div class="order-table">
                                        <table class="u-s-m-b-13">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                
                                                {{-- We'll place this $total_price inside the foreach loop to calculate the total price of all products in Cart. Check the end of the next foreach loop before @endforeach --}}
                                                @php $total_price = 0 @endphp

                                                @foreach ($getCartItems as $item) {{-- $getCartItems is passed in from cart() method in Front/ProductsController.php --}}
                                                    @php
                                                        $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                                                        // dd($getDiscountAttributePrice);
                                                    @endphp


                                                    <tr>
                                                        <td>
                                                            <a href="{{ url('product/' . $item['product_id']) }}">
                                                                <img width="50px" src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="Product">
                                                                <h6 class="order-h6">{{ $item['product']['product_name'] }}
                                                                <br>
                                                                {{ $item['size'] }}/{{ $item['product']['product_color'] }}</h6>
                                                            </a>
                                                            <span class="order-span-quantity">x {{ $item['quantity'] }}</span>
                                                        </td>
                                                        <td>
                                                            <h6 class="order-h6">EGP{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</h6> {{-- price of all products (after discount (if any)) (= price (after discoutn) * no. of products) --}}
                                                        </td>
                                                    </tr>


                                                    
                                                    {{-- This is placed here INSIDE the foreach loop to calculate the total price of all products in Cart --}}
                                                    @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                                @endforeach


                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">EGP{{ $total_price }}</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Shipping Charges</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            <span class="shipping_charges">EGP0</span>
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Coupon Discount</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            
                                                            @if (\Illuminate\Support\Facades\Session::has('couponAmount')) {{-- We stored the 'couponAmount' in a Session Variable inside the applyCoupon() method in Front/ProductsController.php --}}
                                                                <span class="couponAmount">EGP{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}</span>
                                                            @else
                                                                EGP0
                                                            @endif
                                                        </h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Grand Total</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">
                                                            <strong class="grand_total">EGP{{ $total_price - \Illuminate\Support\Facades\Session::get('couponAmount') }}</strong> {{-- We create the 'grand_total' CSS class to use it as a handle for AJAX inside    $('#applyCoupon').submit();    function in front/js/custom.js --}} {{-- We stored the 'couponAmount' a Session Variable inside the applyCoupon() method in Front/ProductsController.php --}}
                                                        </h3>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                        <div class="u-s-m-b-13 codMethod"> {{-- We added the codMethod CSS class to disable that payment method (check front/js/custom.js) if the PIN code of that user's Delivery Address doesn't exist in our `cod_pincodes` database table --}}
                                            <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                            <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                        </div>
                                        <div class="u-s-m-b-13 prepaidMethod"> {{-- We added the prepaidMethod CSS class to disable that payment method (check front/js/custom.js) if the PIN code of that user's Delivery Address doesn't exist in our `prepaid_pincodes` database table --}}
                                            <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                            <label class="label-text" for="paypal">PayPal</label>
                                        </div>


                                        {{-- iyzico Payment Gateway integration in/with Laravel --}}
                                        <div class="u-s-m-b-13 prepaidMethod"> {{-- We added the prepaidMethod CSS class to disable that payment method (check front/js/custom.js) if the PIN code of that user's Delivery Address doesn't exist in our `prepaid_pincodes` database table --}}
                                            <input type="radio" class="radio-box" name="payment_gateway" id="iyzipay" value="iyzipay">
                                            <label class="label-text" for="iyzipay">iyzipay</label>
                                        </div>


                                        <div class="u-s-m-b-13">
                                            <input type="checkbox" class="check-box" id="accept" name="accept" value="Yes" title="Please agree to T&C">
                                            <label class="label-text no-color" for="accept">I’ve read and accept the
                                                <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                            </label>
                                        </div>
                                        <button type="submit" id="placeOrder" class="button button-outline-secondary">Place Order</button> {{-- Show our Preloader/Loader/Loading Page/Preloading Screen while the <form> is submitted using the    id="placeOrder"    HTML attribute. Check front/js/custom.js --}}
                                    </div>
                                </form>


                            </div>
                            <!-- Checkout /- -->
                        </div>

                    </div>
                </div>


        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection