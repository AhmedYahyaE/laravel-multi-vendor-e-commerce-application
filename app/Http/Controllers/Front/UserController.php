<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127



    // Render User Login/Register page (front/users/login_register.blade.php)    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    public function loginRegister() {
        return view('front.users.login_register');
    }

    // User Registration (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    // https://www.youtube.com/watch?v=rOlDDq03veE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    public function userRegister(Request $request) {
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;



            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
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


            // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
            // echo '<pre>', var_dump($validator->messages()), '</pre>';
            // exit;


            if ($validator->passes()) { // if validation passes (is successful), register (INSERT) the new user into the database `users` table, and log the user in IMMEDIATELY and AUTOMATICALLY and DIRECTLY, and redirect them to the Cart cart.blade.php page
                // Register the new user
                $user = new \App\Models\User;

                $user->name     = $data['name'];   // $data['name']   comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->mobile   = $data['mobile']; // $data['mobile'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->email    = $data['email'];  // $data['email']  comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->password = bcrypt($data['password']); // storing the HASH-ed password (not the original password) in the database    // bcrypt(): https://laravel.com/docs/9.x/helpers#method-bcrypt    // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                $user->status   = 1; // 0 means supposing that user is active/enabled/activated

                $user->save();



                // Send a Welcome Email to user after registration    // HELO / Mailtrap / MailHog: https://laravel.com/docs/9.x/mail#mailtrap    // https://www.youtube.com/watch?v=OtH7CCwnwAo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                $email = $data['email']; // the user's email that they entered while submitting the registration form
                $messageData = [
                    'name'   => $data['name'], // the user's name that they entered while submitting the registration form
                    'mobile' => $data['mobile'], // the user's mobile that they entered while submitting the registration form
                    'email'  => $data['email'] // the user's email that they entered while submitting the registration form
                    // 'code'   => base64_encode($data['email']) // We base64 code the user's $email and send it as a Route Parameter from user_confirmation.blade.php to the 'user/confirm/{code}' route in web.php, then it gets base64 decoded again in confirmUser() method in Front/UserController.php    // we will use the opposite: base64_decode() in the confirmUser() method (encode X decode)
                ];
                \Illuminate\Support\Facades\Mail::send('emails.register', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.register' is the register.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass all the variables that register.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Welcome to Stack Developers');
                });


                /*
                // Send an SMS using an SMS API    // https://www.youtube.com/watch?v=QA86hHuD4_w&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=130
                $message = 'Dear customer, you have successfully registered with Stack Developers. Login to your account to access orders, addresses and available offers';
                $mobile = $data['mobile']; // the user's mobile that they entered while submitting the registration form
                \App\Models\Sms::sendSms($message, $mobile); // Send the SMS
                */



                // Log the user in IMMEDIATELY and AUTOMATICALLY and DIRECTLY after registration, and update the user's Cart (update the user's `user_id` column in `carts` table)
                if (\Auth::attempt([ // Here, we use the Laravel's default 'web' Authentication Guard (check config/auth.php), whose 'Provider' is the User.php model i.e. `users` table    // Manually Authenticating Users: https://laravel.com/docs/9.x/authentication#other-authentication-methods
                    'email'    => $data['email'],   // $data['email']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'password' => $data['password'] // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                ])) {
                        // Update the user's Cart (the `user_id` column in `carts` table) with their `user_id` (because before registration, user's orders in the Cart were stored only using the session (and `user_id` is zero 0) (check the cartAdd() method in Front/ProductsController.php))    // Check 29:42 in https://www.youtube.com/watch?v=Vbfhv2lMt9M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
                        if (!empty(\Session::get('session_id'))) {
                            $user_id    = \Auth::user()->id;
                            $session_id = \Session::get('session_id');

                            \App\Models\Cart::where('session_id', $session_id)->update(['user_id' => $user_id]);
                        }


                    $redirectTo = url('cart'); // redirect user to the Cart cart.blade.php page    // Check that route in web.php

                    // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'type' => 'success',
                        'url'  => $redirectTo // redirect user to the Cart cart.blade.php page
                    ]);
                }

            } else { // if validation fails (is unsuccessful), send the Validation Error Messages
                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                ]);
            }
        }
    }

    // User Login (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    // https://www.youtube.com/watch?v=Vbfhv2lMt9M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=131
    public function userLogin(Request $request) {
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;


            // Validation    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                // the 'name' HTML attribute of the request (the array key of the $request array) (ATTRIBUTE) => Validation Rules
                'email'    => 'required|email|max:150|exists:users', // 'exists:users'    means it must already exist in the `users` table    // exists:table,column: https://laravel.com/docs/9.x/validation#rule-exists
                'password' => 'required|min:6'
            ]);


            // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
            // echo '<pre>', var_dump($validator->messages()), '</pre>';
            // exit;


            if ($validator->passes()) { // if validation passes (is successful), log the user in (but check first if they're inactive), and update the user's Cart (update the user's `user_id` column in `carts` table)
                // Log the user in
                if (\Auth::attempt([ // Here, we use the Laravel's default 'web' Authentication Guard, whose 'Provider' is the User.php model i.e. `users` table    // Manually Authenticating Users: https://laravel.com/docs/9.x/authentication#other-authentication-methods
                    'email'    => $data['email'],   // $data['email']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                    'password' => $data['password'] // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                ])) {
                    // First, check if the user being authenticated/logged in is inactive/disabled/deactivated by an admin (`status` is zero 0 in `users` table), logout the user, then return them back with a message
                    if (\Auth::user()->status == 0) {
                        \Auth::logout(); // logout the user

                        // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                        return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                            'type'    => 'inactive',
                            'message' => 'Your account is inactive. Please contact Admin'
                        ]);
                    }


                    // Update the user's Cart (the `user_id` column in `carts` table) with their `user_id` (because before login, user's orders in the Cart were stored only using the session (and `user_id` is zero 0) (check the cartAdd() method in Front/ProductsController.php))    // https://www.youtube.com/watch?v=Vbfhv2lMt9M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
                    if (!empty(\Session::get('session_id'))) {
                        $user_id    = \Auth::user()->id;
                        $session_id = \Session::get('session_id');

                        \App\Models\Cart::where('session_id', $session_id)->update(['user_id' => $user_id]);
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
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                ]);
            }
        }
    }

    // User logout (This route is accessed from Logout tab in the drop-down menu in the header (in front/layout/header.blade.php))    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=128
    public function userLogout() {
        \Auth::logout(); // Logging Out: https://laravel.com/docs/9.x/authentication#logging-out


        return redirect('/');
    }


}
