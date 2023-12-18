<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Cart;



class UserController extends Controller
{
    // Render User Login/Register page (front/users/login_register.blade.php)    
    public function loginRegister() {
        return view('front.users.login_register');
    }

    // User Registration (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    
    public function userRegister(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)

            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Validation Rules
                'name'     => 'required|string|max:100',
                'mobile'   => 'required|numeric|digits:11',
                'email'    => 'required|email|max:150|unique:users', // 'unique:users'    means it's unique in the `users` table
                'password' => 'required|min:6',
                'accept'   => 'required'

            ], [ // Customizing The Error Messages: https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Custom Messages
                'accept.required' => 'Please accept our Terms & Conditions'
            ]);


            // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
            // dd($validator->messages());
            // echo '<pre>', var_dump($validator->messages()), '</pre>';
            // exit;


            if ($validator->passes()) { // if validation passes (is successful), register (INSERT) the new user into the database `users` table, and log the user in IMMEDIATELY and AUTOMATICALLY and DIRECTLY, and redirect them to the Cart cart.blade.php page
                // Register the new user
                $user = new User;

                $user->name     = $data['name'];   // $data['name']   comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->mobile   = $data['mobile']; // $data['mobile'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->email    = $data['email'];  // $data['email']  comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->password = bcrypt($data['password']); // storing the HASH-ed password (not the original password) in the database    // bcrypt(): https://laravel.com/docs/9.x/helpers#method-bcrypt    // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->status   = 0; // 0 means that the user is inactive/disabled/deactivated. After they click on the link in the 'Confirmation Email' sent to them, they become active/enabled/activated i.e. `status` is one 1    

                $user->save();



                // ACTIVATE USER AFTER SENDING A CONFIRMATION E-MAIL AND USER CLICKS ON LINK INSIDE THAT E-MAIL
                $email = $data['email']; // the user's email that they entered while submitting the registration form

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'name'   => $data['name'],   // the user's name that they entered while submitting the registration form
                    'email'  => $data['email'],  // the user's email that they entered while submitting the registration form
                    'code'   => base64_encode($data['email']) // We base64 code the user's $email and send it as a Route Parameter from resources/views/emails/confirmation.blade.php to the 'user/confirm/{code}' route in web.php, then it gets base64 de-coded again in confirmUser() method in Front/UserController.php    // We will use the opposite: base64_decode() in the confirmUser() method to decode the encoded string (encode X decode)
                ];
                \Illuminate\Support\Facades\Mail::send('emails.confirmation', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.confirmation' is the resources/views/emails/confirmation.blade.php file that will be sent as an email    // We pass in all the variables that confirmation.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Confirm your Multi-vendor E-commerce Application Account');
                });

                // Redirect user back with a success message
                $redirectTo = url('user/login-register'); // redirect user to the front/users/login_register.blade.php    // Check that route in web.php

                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'    => 'success',
                    'url'     => $redirectTo, // redirect user to the Cart cart.blade.php page
                    'message' => 'Please confirm your email to activate your account!'
                ]);


                /*
                // Send an SMS using an SMS API and cURL    
                $message = 'Dear customer, you have successfully registered with Multi-vendor E-commerce Application. Login to your account to access orders, addresses and available offers';
                $mobile = $data['mobile']; // the user's mobile that they entered while submitting the registration form
                \App\Models\Sms::sendSms($message, $mobile); // Send the SMS
                */

            } else { // if validation fails (is unsuccessful), send the Validation Error Messages
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery to show them in the frontend (check front/js/custom.js)    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                ]);
            }
        }
    }

    // User Login (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    
    public function userLogin(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)


            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Validation Rules
                'email'    => 'required|email|max:150|exists:users', // 'exists:users'    means it must already exist in the `users` table    // exists:table,column: https://laravel.com/docs/9.x/validation#rule-exists
                'password' => 'required|min:6'
            ]);


            // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
            // dd($validator->messages());
            // echo '<pre>', var_dump($validator->messages()), '</pre>';
            // exit;


            if ($validator->passes()) { // if validation passes (is successful), log the user in (but check first if they're inactive), and update the user's Cart (update the user's `user_id` column in `carts` table)
                // Log the user in
                if (Auth::attempt([ // Here, we use the Laravel's default 'web' Authentication Guard, whose 'Provider' is the User.php model i.e. `users` table    // Manually Authenticating Users: https://laravel.com/docs/9.x/authentication#other-authentication-methods
                    'email'    => $data['email'],   // $data['email']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'password' => $data['password'] // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                ])) {
                    // First, check if the user being authenticated/logged in is inactive/disabled/deactivated by an admin (`status` is zero 0 in `users` table), logout the user, then return them back with a message
                    if (Auth::user()->status == 0) {
                        Auth::logout(); // logout the user

                        // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                        return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                            'type'    => 'inactive',
                            // 'message' => 'Your account is inactive. Please contact Admin'
                            'message' => 'Your account is not activated! Please confirm your account (by clicking on the Activation Link in the Confirmation Mail) to activate your account.'
                        ]);
                    }


                    // Update the user's Cart (the `user_id` column in `carts` table) with their `user_id` (because before login, user's orders in the Cart were stored only using the session (and `user_id` is zero 0) (check the cartAdd() method in Front/ProductsController.php))    
                    if (!empty(Session::get('session_id'))) {
                        $user_id    = Auth::user()->id;
                        $session_id = Session::get('session_id');

                        Cart::where('session_id', $session_id)->update(['user_id' => $user_id]);
                    }

 
                    // redirect user to the Cart cart.blade.php page
                    $redirectTo = url('cart'); // Check that route in web.php

                    // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'type' => 'success',
                        'url'  => $redirectTo // redirect user to the Cart cart.blade.php page
                    ]);

                } else { // if Validation passes / is okay but login credentials provided by user are incorrect, login fails, and send a generic 'Wrong Credentials!' message
                    // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'type'    => 'incorrect',
                        'message' => 'Incorrect Email or Password! Wrong Credentials!'
                    ]);
                }

            } else { // if validation fails (is unsuccessful), send the Validation Error Messages array
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery to show them in the frontend (check front/js/custom.js)    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                ]);
            }
        }
    }

    // User logout (This route is accessed from Logout tab in the drop-down menu in the header (in front/layout/header.blade.php))    
    public function userLogout() {
        Auth::logout(); // Logging Out: https://laravel.com/docs/9.x/authentication#logging-out


        // Emptying the Session to empty the Cart when the user logs out
        Session::flush(); // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data


        return redirect('/');
    }



    // User account Confirmation E-mail which contains the 'Activation Link' to activate the user account (in resources/views/emails/confirmation.blade.php, using Mailtrap)    
    public function confirmAccount($code) { // {code} is the base64 encoded user's 'Activation Code' sent to the user in the Confirmation E-mail with which they have registered, which is received as a Route Parameters/URL Paramters in the 'Activation Link': https://laravel.com/docs/9.x/routing#required-parameters    // this route is requested (accessed/opened) from inside the mail sent to user (in resources/views/emails/confirmation.blade.php)
        $email = base64_decode($code); // $code is the encoded $email (check userRegister() method in UserController.php)    // we use the opposite (base64_decode()) of what we used in the userRegister() (base_64encode) 
        // dd($email);

        // For Security Reasons, check if that decoded user's $email exists in the `users` database table
        $userCount = User::where('email', $email)->count();
        if ($userCount > 0) { // if the user's email exists in `users` table
            // Check if the user is alreay active
            $userDetails = User::where('email', $email)->first();
            if ($userDetails->status == 1) { // if the user's account is already activated
                // Redirect the user to the User Login/Register page with an 'error' message
                return redirect('user/login-register')->with('error_message', 'Your account is already activated. You can login now.');
            } else { // if the user's account is not yet activated, activate it (update `status` to 1) and send a 'Welcome' Email
                User::where('email', $email)->update([
                    'status' => 1
                ]);

                // Send a Welcome Email to user after confirmation (clicking on the 'Activation Link' inside the Confirmation Email)    // HELO / Mailtrap / MailHog: https://laravel.com/docs/9.x/mail#mailtrap    

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'name'   => $userDetails->name, // the user's name that they entered while submitting the registration form
                    'mobile' => $userDetails->mobile, // the user's mobile that they entered while submitting the registration form
                    'email'  => $email // the user's email that they entered while submitting the registration form
                    // 'code'   => base64_encode($data['email']) // We base64 code the user's $email and send it as a Route Parameter from user_confirmation.blade.php to the 'user/confirm/{code}' route in web.php, then it gets base64 decoded again in confirmUser() method in Front/UserController.php    // we will use the opposite: base64_decode() in the confirmAccount() method (encode X decode)
                ];
                \Illuminate\Support\Facades\Mail::send('emails.register', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.register' is the register.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that register.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Welcome to Multi-vendor E-commerce Application');
                });

                // Note: Here, we have TWO options, either redirect user with a success message or Log the user In IMMDEIATELY, AUTOMATICALLY and DIRECTLY

                // Redirect the user to the User Login/Register page with a 'success' message
                return redirect('user/login-register')->with('success_message', 'Your account is activated. You can login now.');
            }

        } else { // if the user's email doesn't exist (hacking or cyber attack!!)
            abort(404);
        }
    }



    // User Forgot Password Functionality (this route is accessed from the <a> tag in front/users/login_register.blade.php through a 'GET' request, and through a 'POST' request when the HTML Form is submitted in front/users/forgot_password.blade.php))    
    public function forgotPassword(Request $request) { // We used match() method to use get() to render the front/users/forgot_password.blade.php page, and post() when the HTML Form in the same page is submitted    // The POST request is from an AJAX request. Check front/js/custom.js
        if ($request->ajax()) { // if the 'POST' request is coming from an AJAX call (if the Forgot Password HTML Form is submitted (in front/users/forgot_password.blade.php))
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);


            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'email'    => 'required|email|max:150|exists:users', // 'exists:users'    means it must already exist in the `users` table    // exists:table,column: https://laravel.com/docs/9.x/validation#rule-exists

            ], [ // Customizing The Error Messages: https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Custom Messages
                // 'accept.required' => 'Please accept our Terms & Conditions'
                'email.exists' => 'Email does not exist'
            ]);



            if ($validator->passes()) { // if validation passes (is successful), generate a new password for the user
                $new_password = \Illuminate\Support\Str::random(16);

                // Generate a new password
                // Change the current password immediately as the user forgot it, update it to a new random password, untill the user updates it by themselves
                User::where('email', $data['email'])->update([
                    'password' => bcrypt($new_password) // storing the HASH-ed password (not the original password) in the database    // bcrypt(): https://laravel.com/docs/9.x/helpers#method-bcrypt
                ]);

                // Get user details
                $userDetails = User::where('email', $data['email'])->first()->toArray();

                // Send an email to the user to get the new password (reset their password)    // HELO / Mailtrap / MailHog: https://laravel.com/docs/9.x/mail#mailtrap    
                $email = $data['email']; // the user's email that they entered while submitting the registration form

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'name'     => $userDetails['name'], // the user's name that they entered while submitting the registration form
                    'email'    => $email, // the user's email that they entered while submitting the registration form
                    'password' => $new_password // the user's email that they entered while submitting the registration form
                    // 'code'  => base64_encode($data['email']) // We base64 code the user's $email and send it as a Route Parameter from user_confirmation.blade.php to the 'user/confirm/{code}' route in web.php, then it gets base64 decoded again in confirmUser() method in Front/UserController.php    // we will use the opposite: base64_decode() in the confirmUser() method (encode X decode)
                ];
                \Illuminate\Support\Facades\Mail::send('emails.user_forgot_password', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.user_forgot_password' is the resources/views/emails/user_forgot_password.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that the user_forgot_password.blade.php file will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('New Password - Multi-vendor E-commerce Application');
                });

                // Redirect user with a success message
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request. Check    $('#forgotForm').submit();    in front/js/custom.js
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'    => 'success',
                    'message' => 'New Password sent to your registered email.'
                ]);

            } else { // if validation fails (is unsuccessful), send the Validation Error Messages
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery to show them in the frontend (check front/js/custom.js)    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                ]);
            }


        } else { // if the 'GET' request is coming from the <a> tag in front/users/login_register.blade.php, render the front/users/forgot_password.blade.php page
            return view('front.users.forgot_password');
        }

    }



    // Render User User Account page with 'GET' request (front/users/user_account.blade.php), or the HTML Form submission in the same page with 'POST' request using AJAX (to update user details). Check front/js/custom.js    
    public function userAccount(Request $request) {
        if ($request->ajax()) { // if the 'POST' request is coming from an AJAX call (update user details)
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)


            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Validation Rules
                'name'    => 'required|string|max:100',
                'city'    => 'required|string|max:100',
                'state'   => 'required|string|max:100',
                'address' => 'required|string|max:100',
                'country' => 'required|string|max:100',
                'mobile'  => 'required|numeric|digits:11',
                'pincode' => 'required|digits:6',

            ] /*, [ // Customizing The Error Messages: https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Custom Messages
                'accept.required' => 'Please accept our Terms & Conditions'
            ]*/ );


            // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
            // dd($validator->messages());
            // echo '<pre>', var_dump($validator->messages()), '</pre>';
            // exit;

            if ($validator->passes()) { // if validation passes (is successful), register (INSERT) the new user into the database `users` table, and log the user in IMMEDIATELY and AUTOMATICALLY and DIRECTLY, and redirect them to the Cart cart.blade.php page
                // Update user details in `users` table
                User::where('id', Auth::user()->id)->update([ // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                    'name'    => $data['name'],    // $data['name']       comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'mobile'  => $data['mobile'],  // $data['mobile']     comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'city'    => $data['city'],    // $data['city']       comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'state'   => $data['state'],   // $data['state']      comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'country' => $data['country'], // $data['country']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'pincode' => $data['pincode'], // $data['pincode']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'address' => $data['address'], // $data['address']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                ]);

                // Redirect user back with a success message
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'    => 'success',
                    // 'url'     => $redirectTo, // redirect user to the Cart cart.blade.php page
                    'message' => 'Your contact/billing details successfully updated!'
                ]);

            } else { // if validation fails (is unsuccessful), send the Validation Error Messages
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery to show them in the frontend (Check    $('#accountForm').submit();    in front/js/custom.js)    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                ]);
            }

        } else { // if it's a 'GET' request, render front/users/user_account.blade.php
            // Fetch all of the world countries from the database table `countries`
            $countries = \App\Models\Country::where('status', 1)->get()->toArray(); // get the countries which have status = 1 (to ignore the blacklisted countries, in case)


            return view('front.users.user_account')->with(compact('countries'));
        }
    }



    // User Account Update Password HTML Form submission via AJAX. Check front/js/custom.js    
    public function userUpdatePassword(Request $request) {
        if ($request->ajax()) { // if the 'POST' request is coming from an AJAX call (update user details)
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)


            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Validation Rules
                'current_password'  => 'required',
                'new_password'     => 'required|min:6',
                'confirm_password' => 'required|min:6|same:new_password' // same:field: https://laravel.com/docs/9.x/validation#rule-same

            ] /*, [ // Customizing The Error Messages: https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Custom Messages
                'accept.required' => 'Please accept our Terms & Conditions'
            ]*/ );


            // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
            // dd($validator->messages());
            // echo '<pre>', var_dump($validator->messages()), '</pre>';
            // exit;

            if ($validator->passes()) { // if validation passes (is successful), update the user's current password
                $current_password = $data['current_password']; // $data['current_password']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $checkPassword    = User::where('id', Auth::user()->id)->first();

                if (Hash::check($current_password, $checkPassword->password)) { // if the entered current password is correct, update the current password    // Confirming The Password: https://laravel.com/docs/9.x/authentication#confirming-the-password
                    // Update the user's current password to the new password
                    $user = User::find(Auth::user()->id);
                    $user->password = bcrypt($data['new_password']); // $data['new_password']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    $user->save();

                    // Redirect user back with a success message
                    // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'type'    => 'success',
                        'message' => 'Account password successfully updated!'
                    ]);

                } else { // if the entered current password is incorrect/wrong, redirect with an error message
                    // Redirect user back with an error message
                    // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'type'    => 'incorrect',
                        'message' => 'Your current password is incorrect!'
                    ]);
                }

            } else { // if validation fails (is unsuccessful), send the Validation Error Messages
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery to show them in the frontend (Check    $('#accountForm').submit();    in front/js/custom.js)    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                ]);
            }

        }
    }

}