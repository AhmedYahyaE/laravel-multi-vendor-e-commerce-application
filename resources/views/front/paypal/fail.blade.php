{{-- This page is rendered by the error() method inside Front/PaypalController.php (if making the order PayPal payment fails) --}}
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
                        <a href="#">Payment Failed!</a>
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
                    <h3>YOUR Payment Failed!</h3>
                    <p>Please try again after some time and contact us if there is any enquiry.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection



{{-- Forget/Remove some data in the Session after making the PayPal payment --}} 
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
@endphp