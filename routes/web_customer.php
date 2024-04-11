<?php

use Illuminate\Support\Facades\Route;

// Second: FRONT section routes:
Route::namespace('App\Http\Controllers\Front')->group(function() {
    Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);

    /**
     * type = collection/category/vendor/search
     * name = {type}_name
     */
    Route::get('products/{type}/{name?}', 'ProductsController@listing')->name('listing');

    // Vendor Login/Register
    Route::get('vendor/login-register', 'VendorController@loginRegister'); // render vendor login_register.blade.php page

    Route::get('vendor/register', 'VendorController@create')->name('front.vendor.account.create');
    // Vendor Register
    Route::post('vendor/registration', 'VendorController@vendorRegister'); // the register HTML form submission in vendor login_register.blade.php page

    // Confirm Vendor Account (from 'vendor_confirmation.blade.php) from the mail by Mailtrap
    Route::get('vendor/confirm/{code}', 'VendorController@confirmVendor'); // {code} is the base64 encoded vendor e-mail with which they have registered which is a Route Parameters/URL Paramters: https://laravel.com/docs/9.x/routing#required-parameters    // this route is requested (accessed/opened) from inside the mail sent to vendor (vendor_confirmation.blade.php)

    // Render Single Product Detail Page in front/products/detail.blade.php
    Route::get('/product/{id}', ['as' => 'product_detail.show', 'uses' => 'ProductsController@detail']);

    // The AJAX call from front/js/custom.js file, to show the the correct related `price` and `stock` depending on the selected `size` (from the `products_attributes` table)) by clicking the size <select> box in front/products/detail.blade.php
    Route::post('get-product-price', 'ProductsController@getProductPrice');

    // Add to Cart <form> submission in front/products/detail.blade.php
    Route::post('cart/add', 'ProductsController@cartAdd');

    // Render Cart page (front/products/cart.blade.php)    // this route is accessed from the <a> HTML tag inside the flash message inside cartAdd() method in Front/ProductsController.php (inside front/products/detail.blade.php)
    Route::get('cart', 'ProductsController@cart')->name('front.user.cart');

    // Update Cart Item Quantity AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    Route::post('cart/update', 'ProductsController@cartUpdate');

    // Delete a Cart Item AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    Route::post('cart/delete', 'ProductsController@cartDelete');


    // Delete a Cart Item AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    Route::get('about-us', 'IndexController@aboutUs')->name('front.user.about-us');

    // Delete a Cart Item AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    Route::get('management', 'IndexController@aboutUsManagement')->name('front.user.management');



    // Render User Login/Register page (front/users/login_register.blade.php)
    Route::get('user/login-register', ['as' => 'login', 'uses' => 'UserController@loginRegister']); // 'as' => 'login'    is Giving this route a name 'login' route in order for the 'auth' middleware ('auth' middleware is the Authenticate.php) to redirect to the right page

    // User Registration (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js
    Route::match(['get', 'post'], 'user/register', ['as' => 'user_register', 'uses' => 'UserController@userRegister']);

    // User Login (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js
    Route::post('user/login', 'UserController@userLogin');

    // User logout (This route is accessed from Logout tab in the drop-down menu in the header (in front/layout/header.blade.php))
    Route::get('user/logout', 'UserController@userLogout');

    // User Forgot Password Functionality (this route is accessed from the <a> tag in front/users/login_register.blade.php through a 'GET' request, and through a 'POST' request when the HTML Form is submitted in front/users/forgot_password.blade.php)
    Route::match(['get', 'post'], 'user/forgot-password', ['as' => 'forgot_password', 'uses' => 'UserController@forgotPassword']); // We used match() method to use get() to render the front/users/forgot_password.blade.php page, and post() when the HTML Form in the same page is submitted    // The POST request is from an AJAX request. Check front/js/custom.js

    // User account Confirmation E-mail which contains the 'Activation Link' to activate the user account (in resources/views/emails/confirmation.blade.php, using Mailtrap)
    Route::get('user/confirm/{code}', 'UserController@confirmAccount'); // {code} is the base64 encoded user's 'Activation Code' sent to the user in the Confirmation E-mail with which they have registered, which is received as a Route Parameters/URL Paramters in the 'Activation Link'    // this route is requested (accessed/opened) from inside the mail sent to user (in resources/views/emails/confirmation.blade.php)

    // Website Search Form (to search for all website products). Check the HTML Form in front/layout/header.blade.php
    Route::get('search-products', 'ProductsController@listing')->name('search.listing');

    // PIN code Availability Check: check if the PIN code of the user's Delivery Address exists in our database (in both `cod_pincodes` and `prepaid_pincodes`) or not in front/products/detail.blade.php via AJAX. Check front/js/custom.js
    Route::post('check-pincode', 'ProductsController@checkPincode');

    // Render the Contact Us page (front/pages/contact.blade.php) using GET HTTP Requests, or the HTML Form Submission using POST HTTP Requests
    Route::match(['get', 'post'], 'contact', 'CmsController@contact');

    // Add a Newsletter Subscriber email HTML Form Submission in front/layout/footer.blade.php when clicking on the Submit button (using an AJAX Request/Call)
    Route::post('add-subscriber-email', 'NewsletterController@addSubscriber');

    // Add Rating & Review on a product in front/products/detail.blade.php
    Route::post('add-rating', 'RatingController@addRating');


    // Protecting the routes of user (user must be authenticated/logged in) (to prevent access to these links while being unauthenticated/not being logged in (logged out))
    Route::group(['middleware' => ['auth']], function() {
        // Render User Account page with 'GET' request (front/users/user_account.blade.php), or the HTML Form submission in the same page with 'POST' request using AJAX (to update user details). Check front/js/custom.js
        Route::match(['GET', 'POST'], 'user/account', ['as' => 'front.user.account', 'uses' => 'UserController@userAccount']);

        // User Account Update Password HTML Form submission via AJAX. Check front/js/custom.js
        Route::post('user/update-password', 'UserController@userUpdatePassword');
        
        Route::get('user/delivery-addresses', 'UserController@showDeliveryAddresses')->name('user.delivery_address_list.show');

        Route::get('user/security', 'UserController@showSecurity')->name('front.user.security');

        // Coupon Code redemption (Apply coupon) / Coupon Code HTML Form submission via AJAX in front/products/cart_items.blade.php, check front/js/custom.js
        Route::post('/apply-coupon', 'ProductsController@applyCoupon'); // Important Note: We added this route here as a protected route inside the 'auth' middleware group because ONLY logged in/authenticated users are allowed to redeem Coupons!

        // Checkout page (using match() method for the 'GET' request for rendering the front/products/checkout.blade.php page or the 'POST' request for the HTML Form submission in the same page (for submitting the user's Delivery Address and Payment Method))
        Route::match(['GET', 'POST'], '/checkout', 'ProductsController@checkout')->name('front.user.checkout');

        // Edit Delivery Addresses (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
        Route::post('get-delivery-address', 'AddressController@getDeliveryAddress');

        // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
        Route::post('save-delivery-address', 'AddressController@saveDeliveryAddress');

        // Remove Delivery Addresse via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged-in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Remove button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js
        Route::post('remove-delivery-address', 'AddressController@removeDeliveryAddress');

        // Rendering Thanks page (after placing an order)
        Route::get('thanks', 'ProductsController@thanks');

        // Render User 'My Orders' page
        Route::get('user/orders/{id?}', [
            'as' => 'front.user.orders',
            'uses' => 'OrderController@orders'
        ]); // If the slug {id?} (Optional Parameters) is passed in, this means go to the front/orders/order_details.blade.php page, and if not, this means go to the front/orders/orders.blade.php page

        Route::get('user/chats', 'ChatsController@index')->name('user.chats.show');


        // PayPal routes:
        // PayPal payment gateway integration in Laravel (this route is accessed from checkout() method in Front/ProductsController.php). Rendering front/paypal/paypal.blade.php page
        Route::get('paypal', 'PaypalController@paypal');

        // Make a PayPal payment
        Route::post('pay', 'PaypalController@pay')->name('payment'); 

        // PayPal successful payment
        Route::get('success', 'PaypalController@success');

        // PayPal failed payment
        Route::get('error', 'PaypalController@error');



        // iyzipay (iyzico) routes:    // iyzico Payment Gateway integration in/with Laravel
        // iyzico payment gateway integration in Laravel (this route is accessed from checkout() method in Front/ProductsController.php). Rendering front/iyzipay/iyzipay.blade.php page
        Route::get('iyzipay', 'IyzipayController@iyzipay');

        // Make an iyzipay payment (redirect the user to iyzico payment gateway with the order details)
        Route::get('iyzipay/pay', 'IyzipayController@pay'); 
    });

});