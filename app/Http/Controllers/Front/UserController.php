<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127



    // Render User Login/Register (front/users/login_register.blade.php)    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    public function loginRegister() {
        return view('front.users.login_register');
    }

    // User Login/Register (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    // https://www.youtube.com/watch?v=rOlDDq03veE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    public function userRegister(Request $request) {
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;


            // Register the new user
            $user = new \App\Models\User;

            $user->name     = $data['name'];   // $data['name']   comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            $user->mobile   = $data['mobile']; // $data['mobile'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            $user->email    = $data['email'];  // $data['email']  comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            $user->password = bcrypt($data['password']); // storing the HASH-ed password (not the original password) in the database    // bcrypt(): https://laravel.com/docs/9.x/helpers#method-bcrypt    // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            $user->status   = 1; // 0 means supposing that user is active/enabled/activated

            $user->save();



            // Login the user in IMMEDIATELY and AUTOMATICALLY and DIRECTLY after registration
            if (\Auth::attempt([ // Manually Authenticating Users: https://laravel.com/docs/9.x/authentication#other-authentication-methods
                'email'    => $data['email'],   // $data['email']    comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                'password' => $data['password'] // $data['password'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            ])) {
                $redirectTo = url('cart');

                // Here, we return a JSON response because the request is ORIGINALLY submitting an HTML <form> data using an AJAX request
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'url' => $redirectTo
                ]);
            }
        }
    }


}
