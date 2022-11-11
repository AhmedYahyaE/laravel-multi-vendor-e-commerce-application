{{-- This page is accessed from Customer Login tab in the dropdown menu in the header (in front/layout/header.blade.php) --}} {{-- https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}


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



            {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}} {{-- https://www.youtube.com/watch?v=QbEFPGnTdBc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=99 --}}
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
            {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
            {{-- Displaying Success Message --}}
            @if (Session::has('success_message')) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if (Session::has('error_message')) <!-- Check userRegister() method in Front/UserController.php -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- Displaying Error Messages --}}
            @if ($errors->any()) <!-- Check userRegister() method in Front/UserController.php -->
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


                        {{-- https://www.youtube.com/watch?v=UXUDxtN68XE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=101 --}}
                        <form action="{{ url('admin/login') }}" method="post"> {{-- the same form as the one in admin/login.blade.php --}}
                            @csrf {{-- https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <div class="u-s-m-b-30">
                                <label for="user-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="user-email" class="text-field" placeholder="Email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="user-password" class="text-field" placeholder="Password">
                            </div>
                            {{-- <div class="group-inline u-s-m-b-30">
                                <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Remember me</label>
                                </div>
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="lost-password.html">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Lost your password?</a>
                                    </div>
                                </div>
                            </div> --}}
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



                        {{-- https://www.youtube.com/watch?v=rOlDDq03veE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}
                        <form id="registerForm" action="javascript:;" method="post"> {{-- We need to deactivate the 'action' HTML attribute (using    'javascript:;'    ) as we'r going to submit using an AJAX call. Check front/js/custom.js --}}
                            @csrf


                            <div class="u-s-m-b-30">
                                <label for="username">Name
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" class="text-field" placeholder="User Name" name="name">
                                {{-- <p id="register-name" style="color: red"></p> --}} {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                                <p id="register-name"></p> {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" class="text-field" placeholder="User Mobile" name="mobile">
                                {{-- <p id="register-mobile" style="color: red"></p> --}} {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                                <p id="register-mobile"></p> {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" class="text-field" placeholder="User Email" name="email">
                                {{-- <p id="register-email" style="color: red"></p> --}} {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                                <p id="register-email"></p> {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" class="text-field" placeholder="User Password" name="password">
                                {{-- <p id="register-password" style="color: red"></p> --}} {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                                <p id="register-password"></p> {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                            </div>
                            <div class="u-s-m-b-30"> {{-- "I've read and accept the terms & conditions" Checkbox --}}
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">I’ve read and accept the
                                    <a href="terms-and-conditions.html" class="u-c-brand">terms & conditions</a>
                                </label>
                                {{-- <p id="register-accept" style="color: red"></p> --}} {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
                                <p id="register-accept"></p> {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop) --}}
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