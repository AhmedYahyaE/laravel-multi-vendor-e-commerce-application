<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; // Check the Admin.php model and 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin/dashboard'); // is the same as:    return view('admin.dashboard');
    }

    public function login(Request $request) { // Logging in using our 'admin' guard we created in auth.php
        // Hashing Passwords: https://laravel.com/docs/9.x/hashing#hashing-passwords
        // echo $password = \Illuminate\Support\Facades\Hash::make('123456');
        // die;


        // https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
        // HTTP Requests: https://laravel.com/docs/9.x/requests
        // Retrieving The Request Method: https://laravel.com/docs/9.x/requests#retrieving-the-request-method
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Logging in using our 'admin' guard we created in auth.php    // Check 5:44 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
            // Manually Authenticating Users (using attempt() method()): https://laravel.com/docs/9.x/authentication#authenticating-users
            // if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) { // Check the Admin.php model and 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) { // Check the Admin.php model and 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
                return redirect('/admin/dashboard');
            } else { // If login credentials are incorrect
                // Redirecting With Flashed Session Data: https://laravel.com/docs/9.x/responses#redirecting-with-flashed-session-data
                // return back()->with('error_message', 'Invalid Email or Password');
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('admin/login'); // is the same as:    return view('admin.login');
    }

    public function logout() {
        Auth::guard('admin')->logout(); // Logging out using our 'admin' guard that we created in auth.php
        return redirect('admin/login');
    }
}
