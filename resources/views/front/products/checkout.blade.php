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
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- First-Accordion -->
                    <div>
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
                    </div>
                    <!-- First-Accordion /- -->
                    <!-- Second Accordion -->
                    <div>
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
                    </div>
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
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">Product Name</h6>
                                                    <span class="order-span-quantity">x 1</span>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">$100.00</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">Black Rock Dress with High Jewelery Necklace</h6>
                                                    <span class="order-span-quantity">x 1</span>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">$100.00</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">Xiaomi Note 2 Black Color</h6>
                                                    <span class="order-span-quantity">x 1</span>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">$100.00</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">Dell Inspiron 15</h6>
                                                    <span class="order-span-quantity">x 1</span>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">$100.00</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Subtotal</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">$220.00</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Shipping</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">$0.00</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Tax</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">$0.00</h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Total</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">$220.00</h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment-method" id="cash-on-delivery">
                                        <label class="label-text" for="cash-on-delivery">Cash on Delivery</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment-method" id="credit-card-stripe">
                                        <label class="label-text" for="credit-card-stripe">Credit Card (Stripe)</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="radio" class="radio-box" name="payment-method" id="paypal">
                                        <label class="label-text" for="paypal">Paypal</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="checkbox" class="check-box" id="accept">
                                        <label class="label-text no-color" for="accept">I’ve read and accept the
                                            <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                        </label>
                                    </div>
                                    <button type="submit" class="button button-outline-secondary">Place Order</button>
                                </div>
                            </div>
                            <!-- Checkout /- -->
                        </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Checkout-Page /- -->
@endsection