{{-- This page is accessed from Vendor Login tab in the drop-down menu in the header (in front/layout/header.blade.php) --}} 
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Account</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Account</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80">
        <div class="container">



            {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}} 
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
            {{-- Displaying Success Message --}}
            @if (Session::has('success_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if (Session::has('error_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if ($errors->any()) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="row">
                <!-- Login -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Login</h2>
                        <h6 class="account-h6 u-s-m-b-30">Welcome back! Sign in to your account.</h6>


                        
                        <form action="{{ url('admin/login') }}" method="post"> {{-- the same HTML Form as the one in the Admin Panel in admin/login.blade.php --}}
                            @csrf {{-- https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <div class="u-s-m-b-30">
                                <label for="vendor-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="vendor-email" class="text-field" placeholder="Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendor-password">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="vendor-password" class="text-field" placeholder="Password">
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Login /- -->
                <!-- Register -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Register</h2>
                        <h6 class="account-h6 u-s-m-b-30">Registering for this site allows you to access your order status and history.</h6>



                        
                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">
                            @csrf


                            <div class="u-s-m-b-30">
                                <label for="vendorname">Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorname" class="text-field" placeholder="Vendor Name" name="name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendormobile" class="text-field" placeholder="Vendor Mobile" name="mobile">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendoremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="vendoremail" class="text-field" placeholder="Vendor Email" name="email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="vendorpassword" class="text-field" placeholder="Vendor Password" name="password">
                            </div>

                            <div class="u-s-m-b-30"> {{-- "I've read and accept the terms & conditions" Checkbox --}}
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">I’ve read and accept the
                                    <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                </label>
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register /- -->
            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection