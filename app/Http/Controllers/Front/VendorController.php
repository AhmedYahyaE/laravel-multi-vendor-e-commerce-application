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
        }
    }
}
