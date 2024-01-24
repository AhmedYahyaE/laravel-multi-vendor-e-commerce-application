{{-- Note: cart.blade.php is the page that opens when you ... --}}
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
                        <a href="cart.html">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
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
                <div class="col-lg-12">



                    
                    <div id="appendCartItems"> {{-- We 'include'-ed this file to allow the AJAX call in front/js/custom.js when updating orders quantities in the Cart --}}
                        @include('front.products.cart_items')
                    </div>





                    {{-- To solve the problem of Submiting the Coupon Code works only once, we moved the Coupon part from cart_items.blade.php to here in cart.blade.php --}} {{-- Explanation of the problem: http://publicvoidlife.blogspot.com/2014/03/on-on-or-event-delegation-explained.html --}}
                    <!-- Coupon -->
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6>Enter your coupon code if you have one.</h6>
                            <div class="coupon-field">



                                {{-- Note: For Coupons, user must be logged in (authenticated) to be able to redeem them. Both 'admins' and 'vendors' can add Coupons. Coupons added by 'vendor' will be available for their products ONLY, but ones added by 'admins' will be available for ALL products. --}}
                                
                                <form id="applyCoupon" method="post" action="javascript:void(0)"  @if (\Illuminate\Support\Facades\Auth::check()) user=1 @endif> {{-- Created an id for this <form> to use it as a handle in jQuery for submission via AJAX. Check front/js/custom.js --}} {{-- Only logged in (authenticated) users can redeem the coupon, so we make a condition, if the user is logged in (authenticated), we create that Custom HTML attribute 'user = 1' so that jQuery can use it to submit the form. Check front/js/custom.js --}} {{-- Note: We need to deactivate the 'action' HTML attribute (using    action="javascript:void(0)"    ) as we'r going to submit using an AJAX call. Check front/js/custom.js --}}
                                    <label class="sr-only" for="coupon-code">Apply Coupon</label>
                                    <input type="text" class="text-field" placeholder="Enter Coupon Code" id="code" name="code">
                                    <button type="submit" class="button">Apply Coupon</button>
                                </form>



                            </div>
                        </div>
                        <div class="button-area">
                            <a href="{{ url('/') }}" class="continue">Continue Shopping</a>
                            <a href="{{ url('/checkout') }}" class="checkout">Proceed to Checkout</a>
                        </div>
                    </div>
                    <!-- Coupon /- -->





                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection