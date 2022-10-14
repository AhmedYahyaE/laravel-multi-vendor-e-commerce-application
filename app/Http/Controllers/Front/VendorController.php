<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    // https://www.youtube.com/watch?v=ODwOtaa2GxU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=98



    public function loginRegister() { // render vendor login_register.blade.php page    // https://www.youtube.com/watch?v=ODwOtaa2GxU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=98
        return view('front.vendors.login_register');
    }

    public function vendorRegister(Request $request) { // the register HTML form submission in vendor login_register.blade.php page    // https://www.youtube.com/watch?v=QbEFPGnTdBc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=98
        if ($request->isMethod('post')) { // if the register form is submitted
            $data = $request->all();
            // dd($data);
            

            // Validation (Validation of vendor registration form)    // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators    // Check 7:57 in https://www.youtube.com/watch?v=QbEFPGnTdBc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=98
            $rules = [
                // <input> "name" attribute => its rule
                                'name'      => 'required',
                                'email'     => 'required|email|unique:admins|unique:vendors',  // 'unique:admins' and 'unique:vendors' means check the `admins` table and `vendors` table for the `mobile` uniqueness: https://laravel.com/docs/9.x/validation#rule-unique
                                'mobile'    => 'required|min:10|numeric|unique:admins|unique:vendors', // 'unique:admins' and 'unique:vendors' means check the `admins` table and `vendors` table for the `mobile` uniqueness: https://laravel.com/docs/9.x/validation#rule-unique    // 'min:10|numeric' is the mobile number validation
                                'accept'    => 'required'
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                // <input> "name" attribute.validation rule => validation rule message
                                    'name.required'         => 'Name is required',
                                    'email.required'        => 'Email is required',
                                    'email.unique'          => 'Email alreay exists',
                                    'mobile.required'       => 'Mobile is required',
                                    'mobile.unique'         => 'Mobile alreay exists',
                                    'accept.required'       => 'Please accept Terms & Conditions',
            ];

            $validator = \Validator::make($data, $rules, $customMessages); // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators
            if ($validator->fails()) { // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators
                return \Illuminate\Support\Facades\Redirect::back()->withErrors($validator); // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators
            }


            // Create Vendor Account (Save the submitted data in BOTH `vendors` and `admins` tables)

            // Note: !!DATABASE TRANSACTION!! FIRSTLY, we'll save the vendor in the `vendors` table, then take the newly generated vendor `id` to use it as a `vendor_id` column value to save the vendor in `admins` table    // Check 6:58 in https://www.youtube.com/watch?v=EvFgN74IFlc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=99
            // Database Transactions: https://laravel.com/docs/9.x/database#database-transactions
            \DB::beginTransaction();
            
            $vendor = new \App\Models\Vendor; // Vendor.php model which models (represents) the `vendors` database table

            $vendor->name   = $data['name'];
            $vendor->mobile = $data['mobile'];
            $vendor->email  = $data['email'];
            $vendor->status = 0; // Note: After a new vendor registers a new account, they will remain inactive/disabled (status is 0), untill the confirmation email arrives for them and they click the link, and they complete filling their vendor details, then the admin APPROVES them (then status becomes 1)

            // Set Laravel's default timezone to Egypt's (to enter correct `created_at` and `updated_at` records in the database tables) instead of UTC
            date_default_timezone_set('Africa/Cairo'); // https://www.php.net/manual/en/timezones.php and https://www.php.net/manual/en/timezones.africa.php
            $vendor->created_at = date('Y-m-d H:i:s'); // enter `created_at` MANUALLY!    // Formatting the date for MySQL: https://www.php.net/manual/en/function.date.php
            $vendor->updated_at = date('Y-m-d H:i:s'); // enter `updated_at` MANUALLY!

            $vendor->save();

            // Get the `id` of the new vendor that we have just saved in the `vendors` table to use it as a value for the `vendor_id` column of the `admins` table to store the new vendor in the `admins` table too
            $vendor_id = \DB::getPdo()->lastInsertId(); // vendor `id` of the `vendors` table    // Check 3:20 in https://www.youtube.com/watch?v=EvFgN74IFlc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=99

            // Secondly, use the vendor `id` of the `vendors` table to serve a value of the `vendor_id` column in the `admins` table and save the new vendor in the `admins` table
            $admin = new \App\Models\Admin; // Admin.php model which models (represents) the `admins` database table

            $admin->type      = 'vendor';
            $admin->vendor_id = $vendor_id; // take the generated `id` of the `vendors` table to store it a `vendor_id` in the `admins` table
            $admin->name      = $data['name'];
            $admin->mobile    = $data['mobile'];
            $admin->email     = $data['email'];
            $admin->password  = bcrypt($data['password']); // hashing the password to store the hashed password in the table (NOT THE PASSWORD ITSELF!!)
            $admin->status    = 0; // Note: After a new vendor registers a new account, they will remain inactive/disabled (status is 0), untill the confirmation email arrives for them and they click the link, and they complete filling their vendor details, then the admin APPROVES them (then status becomes 1)

            // Set Laravel's default timezone to Egypt's (to enter correct `created_at` and `updated_at` records in the database tables) instead of UTC
            date_default_timezone_set('Africa/Cairo'); // https://www.php.net/manual/en/timezones.php and https://www.php.net/manual/en/timezones.africa.php
            $admin->created_at = date('Y-m-d H:i:s'); // enter `created_at` MANUALLY!    // Formatting the date for MySQL: https://www.php.net/manual/en/function.date.php
            $admin->updated_at = date('Y-m-d H:i:s'); // enter `updated_at` MANUALLY!

            $admin->save();

            \DB::commit(); // commit the Database Transaction


            // Send the Confirmation Email to the vendor
            # to-do


            // Redirect the vendor back with a success message
            $message = 'Thanks for registering as Vendor. We will confirm by email once your account is approved.';
            return redirect()->back()->with('success_message', $message);
        }
    }
}
