{{-- https://www.youtube.com/watch?v=qzLinru4vkU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=152 --}}
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
            {{-- https://www.youtube.com/watch?v=qMa1g05oX74&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=117 --}}
            {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
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
                        <!-- First-Accordion -->
                        {{-- <div>
                            <div class="message-open u-s-m-b-24">
                                Returning customer?
                                <strong>
                                    <a class="u-c-brand" data-toggle="collapse" href="#showlogin">Click here to login
                                    </a>
                                </strong>
                            </div>
                            <div class="collapse u-s-m-b-24" id="showlogin">
                                <h6 class="collapse-h6">Welcome back! Sign in to your account.</h6>
                                <h6 class="collapse-h6">If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</h6>
                                <form>
                                    <div class="group-inline u-s-m-b-13">
                                        <div class="group-1 u-s-p-r-16">
                                            <label for="user-name-email">Username or Email
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="user-name-email" class="text-field" placeholder="Username / Email">
                                        </div>
                                        <div class="group-2">
                                            <label for="password">Password
                                                <span class="astk">*</span>
                                            </label>
                                            <input type="text" id="password" class="text-field" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <button type="submit" class="button button-outline-secondary">Login</button>
                                        <input type="checkbox" class="check-box" id="remember-me-token">
                                        <label class="label-text" for="remember-me-token">Remember me</label>
                                    </div>
                                    <div class="page-anchor">
                                        <a href="#" class="u-c-brand">Lost your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <!-- First-Accordion /- -->
                        <!-- Second Accordion -->
                        {{-- <div>
                            <div class="message-open u-s-m-b-24">
                                Have a coupon?
                                <strong>
                                    <a class="u-c-brand" data-toggle="collapse" href="#showcoupon">Click here to enter your code</a>
                                </strong>
                            </div>
                            <div class="collapse u-s-m-b-24" id="showcoupon">
                                <h6 class="collapse-h6">
                                    Enter your coupon code if you have one.
                                </h6>
                                <div class="coupon-field">
                                    <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                    <input id="coupon-code" type="text" class="text-field" placeholder="Coupon Code">
                                    <button type="submit" class="button">Apply Coupon</button>
                                </div>
                            </div>
                        </div> --}}
                        <!-- Second Accordion /- -->

                        <div class="row">
                            <!-- Billing-&-Shipping-Details -->
                            <div class="col-lg-6" id="deliveryAddresses"> {{-- We created this id="deliveryAddresses" to use it as a handle for jQuery AJAX to refresh this page, check front/js/custom.js. Check https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153 --}}



                                {{-- https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153 --}}
                                {{-- https://www.youtube.com/watch?v=qzLinru4vkU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=152 --}}
                                @include('front.products.delivery_addresses')



                            </div>
                            <!-- Billing-&-Shipping-Details /- -->
                            <!-- Checkout -->
                            <div class="col-lg-6">



                                {{-- Laravel 9 Tutorial #156 | Resolve Checkout Page Issue | Fix Add/Edit Delivery Address Issue: Check https://www.youtube.com/watch?v=8h1fIWO8gyo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181 --}}
                                {{-- The complete HTML Form of the user submitting their Delivery Address and Payment Method. Check 15:06 in https://www.youtube.com/watch?v=3SuuAAyUgNw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=159 --}}
                                <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                                    @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                                    {{-- Laravel 9 Tutorial #156 | Resolve Checkout Page Issue | Fix Add/Edit Delivery Address Issue: Check https://www.youtube.com/watch?v=8h1fIWO8gyo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181 --}}
                                    {{-- https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153 --}}
                                    {{-- https://www.youtube.com/watch?v=qzLinru4vkU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=152 --}}
                                    @if (count($deliveryAddresses) > 0) {{-- Checking if there are any $deliveryAddreses for the currently authenticated/logged-in user --}} {{-- $deliveryAddresses variable is passed in from checkout() method in Front/ProductsController.php --}}

                                        <h4 class="section-h4">Delivery Addresses</h4>

                                        @foreach ($deliveryAddresses as $address)
                                            <div class="control-group" style="float: left; margin-right: 5px">
                                                <input type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}"> {{-- We created the Custom HTML Attribute id="address{{ $address['id'] }}" to get the UNIQUE ids of the addresses in order for the <label> HTML element to be able to point for that <input> --}}
                                            </div>
                                            <div>
                                                <label class="control-label" for="address{{ $address['id'] }}">
                                                    {{ $address['name'] }}, {{ $address['address'] }}, {{ $address['city'] }}, {{ $address['state'] }}, {{ $address['country'] }} ({{ $address['mobile'] }})
                                                </label>
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress" style="float: right; margin-left: 10px">Remove</a> {{-- We used href="javascript:;" to prevent the <a> link from being clickable (to make the <a> unclickable) (stop the <a> function or action) because we'll use jQuery AJAX to click this link, check front/js/custom.js. Check https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153 --}} {{-- We use the class="removeAddress" as a handle for the AJAX request in front/js/custom.js --}}
                                                <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress"   style="float: right"                   >Edit</a>   {{-- We used href="javascript:;" to prevent the <a> link from being clickable (to make the <a> unclickable) (stop the <a> function or action) because we'll use jQuery AJAX to click this link, check front/js/custom.js. Check https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153 --}} {{-- We use the class="editAddress" as a handle for the AJAX request in front/js/custom.js --}}
                                            </div>
                                        @endforeach
                                        <br>
                                    @endif {{-- https://www.youtube.com/watch?v=2vgBjI0i23M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=156 --}}


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


                                                {{-- https://www.youtube.com/watch?v=3SuuAAyUgNw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=158 --}}
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
                                                            <h6 class="order-h6">Rs.{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</h6> {{-- price of all products (after discount (if any)) (= price (after discoutn) * no. of products) --}}
                                                        </td>
                                                    </tr>


                                                    {{-- https://www.youtube.com/watch?v=3SuuAAyUgNw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=158 --}}
                                                    {{-- This is placed here INSIDE the foreach loop to calculate the total price of all products in Cart --}}
                                                    @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                                @endforeach


                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Subtotal</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">Rs.{{ $total_price }}</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Shipping Charges</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">Rs.0</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6 class="order-h6">Coupon Discount</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">
                                                            {{-- https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149 --}}
                                                            @if (\Session::has('couponAmount')) {{-- We stored the 'couponAmount' in a Session Variable inside the applyCoupon() method in Front/ProductsController.php --}}
                                                                Rs.{{ \Session::get('couponAmount') }}
                                                            @else
                                                                Rs.0
                                                            @endif
                                                        </h6>
                                                    </td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>
                                                        <h3 class="order-h3">Tax</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">$0.00</h3>
                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <td>
                                                        <h3 class="order-h3">Grand Total</h3>
                                                    </td>
                                                    <td>
                                                        <h3 class="order-h3">Rs.{{ $total_price - \Session::get('couponAmount') }}</h3> {{-- We create the 'grand_total' CSS class to use it as a handle for AJAX inside    $('#applyCoupon').submit();    function in front/js/custom.js: https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149 --}} {{-- We stored the 'couponAmount' a Session Variable inside the applyCoupon() method in Front/ProductsController.php --}}
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                            <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                        </div>
                                        {{-- <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment_gateway" id="credit-card-stripe" value="Stripe">
                                            <label class="label-text" for="credit-card-stripe">Credit Card (Stripe)</label>
                                        </div> --}}
                                        <div class="u-s-m-b-13">
                                            <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                            <label class="label-text" for="paypal">PayPal</label>
                                        </div>
                                        <div class="u-s-m-b-13">
                                            <input type="checkbox" class="check-box" id="accept" name="accept" value="Yes" title="Please agree to T&C">
                                            <label class="label-text no-color" for="accept">I’ve read and accept the
                                                <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                            </label>
                                        </div>
                                        <button type="submit" id="placeOrder" class="button button-outline-secondary">Place Order</button> {{-- Show our Preloader/Loader/Loading page/Preloading screen while the <form> is submitted using the    id="placeOrder"    HTML attribute. Check front. Check https://www.youtube.com/watch?v=CzePzLpAvlI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181 --}}
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