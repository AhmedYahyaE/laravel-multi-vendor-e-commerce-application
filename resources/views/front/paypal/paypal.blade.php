{{-- This page is rendered by paypal() method inside Front/PaypalController.php --}}
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">Proceed to Payment</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>PLEASE MAKE PAYMENT FOR YOUR ORDER</h3>
                    <form action="{{ route('payment') }}" method="post"> {{-- This is a Named Route. Check web.php --}} {{-- Generating URLs To Named Routes: https://laravel.com/docs/9.x/routing#generating-urls-to-named-routes --}}
                        @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                        <input type="hidden" name="amount" value="{{ round(Session::get('grand_total') / 80, 2) }}"> {{-- 'grand_total' was stored in Session in checkout() method in Front/ProductsController.php --}} {{-- Interacting With The Session: Retrieving Data: https://laravel.com/docs/9.x/session#retrieving-data --}} {{-- Note: PayPal accepts world major currencies ONLY, so we divided INR by 80 to convert INR to USD --}}
                        <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection