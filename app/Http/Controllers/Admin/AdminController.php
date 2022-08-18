<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Auth without a namespace here works fine because the Admin.php model extends Authenticatable
use Auth; // Check the Admin.php model and 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller
{
    public function dashboard() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'dashboard');
        
        
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


            // Laravel Server-Side Validation: https://www.youtube.com/watch?v=IiyqoBUrkZA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=12
            // https://laravel.com/docs/9.x/validation
            /*
            $validated = $request->validate([
                // Available Validation Rules: https://laravel.com/docs/9.x/validation#available-validation-rules
                'email'    => 'required|email|max:255',
                'password' => 'required',
            ]);
            */

            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 9:24 in https://www.youtube.com/watch?v=IiyqoBUrkZA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=12
            // https://laravel.com/docs/9.x/validation#manual-customizing-the-error-messages
            $rules = [
                'email'    => 'required|email|max:255',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required'    => 'Email Address is required!',
                'email.email'       => 'Valid Email Address is required',
                'password.required' => 'Password is required!',
            ];
            $this->validate($request, $rules, $customMessages);            



            // Logging in using our 'admin' guard we created in auth.php    // Check 5:44 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
            // Manually Authenticating Users (using attempt() method()): https://laravel.com/docs/9.x/authentication#authenticating-users
            // if (\Illuminate\Support\Facades\Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) { // Check the Admin.php model and 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) { // Check the Admin.php model and 12:47 in https://www.youtube.com/watch?v=_vBCl-77GYc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=11
                return redirect('/admin/dashboard'); // Let him LOGIN!
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

    public function updateAdminPassword(Request $request) {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'update_admin_password');



        // Handling the update admin password <form> submission (POST request) in update_admin_password.blade.php    // Check https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);

            // Check first if the entered admin current password is corret
            if (\Illuminate\Support\Facades\Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) { // ['current_password'] comes from the AJAX call in custom.js page from the data object inside $.ajax() method
                // Check if the new password is matching with confirm password
                if ($data['confirm_password'] == $data['new_password']) {
                    // dd(\App\Models\Admin::where('id', Auth::guard('admin')->user()->id));
                    // echo '<pre>', var_dump(\App\Models\Admin::where('id', Auth::guard('admin')->user()->id)), '</pre>';
                    \App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'password' => bcrypt($data['new_password'])
                    ]); // we persist (update) the hashed password (not the password itself)
                    return redirect()->back()->with('success_message', 'Admin Password has been updated successfully!');
                } else { // If new password and confirm password are not matching each other
                    return redirect()->back()->with('error_message', 'New Password and Confirm Password does not match!');
                }
            } else {
                return redirect()->back()->with('error_message', 'Your current admin password is Incorrect!');
            }
        }


        // Get data from 'admin' Authentication Guard to be able to show them in the <form> of update_admin_password.blade.php page: Check 19:10 in https://www.youtube.com/watch?v=b4ISE_polCo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=15
        // dd(Auth::guard('admin'));
        // dd(Auth::guard('admin')->user());
        // echo '<pre>', var_dump(\App\Models\Admin::where('email', Auth::guard('admin')->user()->email)), '</pre>';
        // echo '<pre>', var_dump(\App\Models\Admin::where('email', Auth::guard('admin')->user()->email)->first()), '</pre>';
        // echo '<pre>', var_dump(\App\Models\Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray()), '</pre>';
        // exit;
        // dd(Auth::guard('admin')->user()->email); // https://laravel.com/docs/9.x/eloquent#examining-attribute-changes
        // dd(Auth::guard('admin')->user()->email)->first(); // https://laravel.com/docs/9.x/eloquent#examining-attribute-changes
        $adminDetails = \App\Models\Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray(); // 'Admin' is the Admin.php model    // Auth::guard('admin') is the authenticated user using the 'admin' guard we created in auth.php    // https://laravel.com/docs/9.x/eloquent#retrieving-models
        return view('admin/settings/update_admin_password')->with(compact('adminDetails')); // Passing Data To Views: https://laravel.com/docs/9.x/views#sharing-data-with-all-views
    }

    public function checkAdminPassword(Request $request) { // This method is called from the AJAX call in custom.js page
        $data = $request->all();
        // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
        // echo '<pre>', var_dump($data), '</pre>';

        // Check 15:06 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17
        // Hashing Passwords: https://laravel.com/docs/9.x/hashing#hashing-passwords
        if (\Illuminate\Support\Facades\Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) { // ['current_password'] comes from the AJAX call in custom.js page from the data object inside $.ajax() method
            return 'true';
        } else {
            return 'false';
        }
    }

    public function updateAdminDetails(Request $request) { // the update_admin_details.blade.php
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'update_admin_details');



        // dd(\Illuminate\Support\Facades\Auth::guard('admin')->user()); // Retrieving the authenticated user using a certain guard ('admin' Authentication Guard which we created in auth.php)
        // dd(\Illuminate\Support\Facades\Auth::guard('admin')->user()->email); // Retrieving the authenticated user using a certain guard ('admin' Authentication Guard which we created in auth.php)
        if ($request->isMethod('post')) { // if the update <form> is submitted
            $data = $request->all();
            // dd($data);

            // Laravel's Validation    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            $rules = [
                'admin_name'   => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                'admin_mobile' => 'required|numeric',
            ];
            $customMessages = [
                'admin_name.required'   => 'Name is required',
                'admin_name.regex'      => 'Valid Name is required',
                'admin_mobile.required' => 'Mobile is required',
                'admin_mobile.numeric'  => 'Valid Mobile is required',
            ];
            $this->validate($request, $rules, $customMessages);



            // Uploading Admin Photo    // Check 5:08 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19
            // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
            // Using the Intervention package for uploading images
            if ($request->hasFile('admin_image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                $image_tmp = $request->file('admin_image');
                if ($image_tmp->isValid()) {
                    // Get the image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a random name for the uploaded image
                    $imageName = rand(111, 99999) . '.' . $extension;

                    // Assigning the uploaded images path inside the 'public' folder
                    $imagePath = 'admin/images/photos/' . $imageName;

                    // Upload the image using the Intervention package and save it in our path inside the 'public' folder
                    \Image::make($image_tmp)->save($imagePath); // '\Image' is the Intervention package
                }
            } else if (!empty($data['current_admin_image'])) { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), but there's an already existing old image
                $imageName = $data['current_admin_image'];
            } else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                $imageName = '';
            }


            // Update Admin Details
            \App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'name'   => $data['admin_name'],
                'mobile' => $data['admin_mobile'],
                'image'  => $imageName
            ]); // Note that the image name is the random image name that we generated
            return redirect()->back()->with('success_message', 'Admin details updated successfully!');
        }

        
        return view('admin/settings/update_admin_details');
    }

    public function updateVendorDetails($slug, Request $request) { // $slug can only be: 'personal', 'business' or 'bank'    // https://www.youtube.com/watch?v=9l8YuyPjAUg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=22
        if ($slug == 'personal') {
            // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
            \Session::put('page', 'update_personal_details');



            // Handling update vendor personal details <form> submission
            if ($request->isMethod('post')) { // if the <form> is submitted
                $data = $request->all();
                // dd($data);

                // Laravel's Validation    // Check 25:15 in https://www.youtube.com/watch?v=9l8YuyPjAUg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=22
                // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
                $rules = [
                    'vendor_name'   => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                    'vendor_city'   => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                    'vendor_mobile' => 'required|numeric',
                ];
                $customMessages = [
                    'vendor_name.required'   => 'Name is required',
                    'vendor_city.required'   => 'City is required',
                    'vendor_city.regex'      => 'Valid City alphabetical is required',
                    'vendor_name.regex'      => 'Valid Name is required',
                    'vendor_mobile.required' => 'Mobile is required',
                    'vendor_mobile.numeric'  => 'Valid Mobile is required',
                ];
                $this->validate($request, $rules, $customMessages);


                // Uploading Admin Photo    // Check 5:08 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19
                // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
                // Using the Intervention package for uploading images
                if ($request->hasFile('vendor_image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                    $image_tmp = $request->file('vendor_image');
                    if ($image_tmp->isValid()) {
                        // Get the image extension
                        $extension = $image_tmp->getClientOriginalExtension();

                        // Generate a random name for the uploaded image
                        $imageName = rand(111, 99999) . '.' . $extension;

                        // Assigning the uploaded images path inside the 'public' folder
                        $imagePath = 'admin/images/photos/' . $imageName;

                        // Upload the image using the Intervention package and save it in our path inside the 'public' folder
                        \Image::make($image_tmp)->save($imagePath); // '\Image' is the Intervention package
                    }
                } else if (!empty($data['current_vendor_image'])) { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), but there's an already existing old image
                    $imageName = $data['current_vendor_image'];
                } else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                    $imageName = '';
                }


                // Vendor details need to be updated in BOTH `admins` and `vendors` tables:

                // Update Vendor Details in 'admins' table
                \App\Models\Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'name'   => $data['vendor_name'],
                    'mobile' => $data['vendor_mobile'],
                    'image'  => $imageName
                ]); // Note that the image name is the random image name that we generated

                // Update Vendor Details in 'vendors' table
                \App\Models\Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'name'    => $data['vendor_name'],
                    'mobile'  => $data['vendor_mobile'],
                    'address' => $data['vendor_address'],
                    'city'    => $data['vendor_city'],
                    'state'   => $data['vendor_state'],
                    'country' => $data['vendor_country'],
                    'pincode' => $data['vendor_pincode'],
                ]);


                return redirect()->back()->with('success_message', 'Vendor details updated successfully!');
            }


            $vendorDetails = \App\Models\Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } else if ($slug == 'business') {
            // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
            \Session::put('page', 'update_business_details');



            if ($request->isMethod('post')) { // if the <form> is submitted
                $data = $request->all();
                // dd($data);

                // Laravel's Validation    // Check 25:15 in https://www.youtube.com/watch?v=9l8YuyPjAUg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=22
                // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
                $rules = [
                    'shop_name'           => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                    'shop_city'           => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                    'shop_mobile'         => 'required|numeric',
                    'address_proof'       => 'required',
                ];
                $customMessages = [
                    'shop_name.required'           => 'Name is required',
                    'shop_city.required'           => 'City is required',
                    'shop_city.regex'              => 'Valid City alphabetical is required',
                    'shop_name.regex'              => 'Valid Name is required',
                    'shop_mobile.required'         => 'Mobile is required',
                    'shop_mobile.numeric'          => 'Valid Mobile is required',
                ];
                $this->validate($request, $rules, $customMessages);


                // Uploading Admin Photo    // Check 5:08 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19
                // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
                // Using the Intervention package for uploading images
                if ($request->hasFile('address_proof_image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                    $image_tmp = $request->file('address_proof_image');
                    if ($image_tmp->isValid()) {
                        // Get the image extension
                        $extension = $image_tmp->getClientOriginalExtension();

                        // Generate a random name for the uploaded image
                        $imageName = rand(111, 99999) . '.' . $extension;

                        // Assigning the uploaded images path inside the 'public' folder
                        $imagePath = 'admin/images/proofs/' . $imageName;

                        // Upload the image using the Intervention package and save it in our path inside the 'public' folder
                        \Image::make($image_tmp)->save($imagePath); // '\Image' is the Intervention package
                    }
                } else if (!empty($data['current_address_proof'])) { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), but there's an already existing old image
                    $imageName = $data['current_address_proof'];
                } else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                    $imageName = '';
                }



                // Update `vendors_business_details` table
                \App\Models\VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                    'shop_name'               => $data['shop_name'],
                    'shop_mobile'             => $data['shop_mobile'],
                    'shop_address'            => $data['shop_address'],
                    'shop_city'               => $data['shop_city'],
                    'shop_state'              => $data['shop_state'],
                    'shop_country'            => $data['shop_country'],
                    'shop_pincode'            => $data['shop_pincode'],
                    'business_license_number' => $data['business_license_number'],
                    'gst_number'              => $data['gst_number'],
                    'pan_number'              => $data['pan_number'],
                    'address_proof'           => $data['address_proof'],
                    'address_proof_image'     => $imageName,
                ]);


                return redirect()->back()->with('success_message', 'Vendor details updated successfully!');
            }


            $vendorDetails = \App\Models\VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        } else if ($slug == 'bank') {
            // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
            \Session::put('page', 'update_bank_details');



            if ($request->isMethod('post')) { // if the <form> is submitted
                $data = $request->all();
                // dd($data);

                // Laravel's Validation    // Check 25:15 in https://www.youtube.com/watch?v=9l8YuyPjAUg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=22
                // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
                $rules = [
                    'account_holder_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                    'bank_name'           => 'required', // only alphabetical characters and spaces
                    'account_number'      => 'required|numeric',
                    'bank_ifsc_code'      => 'required',
                ];
                $customMessages = [
                    'account_holder_name.required' => 'Account Holder Name is required',
                    'bank_name.required'           => 'Bank Name is required',
                    'account_holder_name.regex'    => 'Valid Account Holder Name is required',
                    'account_number.required'      => 'Account Number is required',
                    'account_number.numeric'       => 'Valid Account Number is required',
                    'bank_ifsc_code.required'      => 'Bank IFSC Code is required',
                ];
                $this->validate($request, $rules, $customMessages);



                // Update `vendors_bank_details` table
                \App\Models\VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                    'account_holder_name' => $data['account_holder_name'],
                    'bank_name'           => $data['bank_name'],
                    'account_number'      => $data['account_number'],
                    'bank_ifsc_code'      => $data['bank_ifsc_code'],
                ]);


                return redirect()->back()->with('success_message', 'Vendor details updated successfully!');
            }



            $vendorDetails = \App\Models\VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        }



        // Fetch all of the world countries from the database table `country`: https://www.youtube.com/watch?v=zENahhmAM0w&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=30
        $countries = \App\Models\Country::where('status', 1)->get()->toArray(); // get the countries which have stats = 1 (to ignore the blacklisted countries, in case)
        // dd($countries);



        // The 'GET' request: to show the update_vendor_details.blade.php page
        // We'll create one view (not 3) for the 3 pages, but parts inside it will change depending on the $slug value
        return view('admin/settings/update_vendor_details')->with(compact('slug', 'vendorDetails', 'countries')); // compact('slug', 'vendorDetails') is used to pass $slug and $vendorDetails to the view
    }

    public function admins($type = null) { // $type is the `type` column in the `admins` which can only be: superadmin, admin, subadmin or vendor    // A default value of null (to allow not passing a {type} slug, and in this case, the page will view ALL of the superadmin, admins, subadmins and vendors at the same time)
        // $admins = new \App\Models\Admin();
        // dd($admins);

        // $admins = \App\Models\Admin::all(); // is the same as:    $admins = \App\Models\Admin::get();
        // $admins = \App\Models\Admin::get(); // is the same as:    $admins = \App\Models\Admin::all();
        $admins = \App\Models\Admin::query(); // https://www.youtube.com/watch?v=yviVaX7-wT4
        // $admins = \App\Models\Admin::get()->toArray(); // toArray() method converts the Collection object to a plain PHP array
        // dd($admins);

        if (!empty($type)) { // in this case, $type can be: superadmin, admin, subadmin or vendor
            $admins = $admins->where('type', $type);
            $title = ucfirst($type) . 's';

            // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
            \Session::put('page', 'view_' . strtolower($title));
        } else { // if there's no $type is passed, show ALL of the admins, subadmins and vendors
            $title = 'All Admins/Subadmins/Vendors';

            // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
            \Session::put('page', 'view_all');
        }

        $admins = $admins->get()->toArray(); // toArray() method converts the Collection object to a plain PHP array    // is the same as: $admins = \App\Models\Admin::all()->toArray();
        // dd($admins);

        return view('admin/admins/admins')->with(compact('admins', 'title'));
    }

    public function viewVendorDetails($id) { // // View further 'vendor' details inside Admin Management table (if the authenticated user is superadmin, admin or subadmin)
        // $vendorDetails = \App\Models\Admin::where('vendor_id', $id);
        // $vendorDetails = \App\Models\Admin::where('id', $id)->first();

        /*
        $vendor = \App\Models\Admin::find(2)->vendorPersonal;
        dd($vendor);
        */

        $vendorDetails = \App\Models\Admin::with('vendorPersonal', 'vendorBusiness','vendorBank')->where('id', $id)->first(); // Using the relationship defined in the Admin.php model to be able to get data from `vendors`, `vendors_business_details` and `vendors_bank_details` tables
        $vendorDetails = json_decode(json_encode($vendorDetails), true); // We used json_decode(json_encode($variable), true) to convert $vendorDetails to an array instead of Laravel's toArray() method
        // dd($vendorDetails);

        return view('admin/admins/view_vendor_details')->with(compact('vendorDetails'));
    }

    public function updateAdminStatus(Request $request) { // Update Admin Status using AJAX in admins.blade.php    // https://www.youtube.com/watch?v=zabqYC14oKU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=28
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Admin::where('id', $data['admin_id'])->update(['status' => $status]);
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([
                'status'   => $status,
                'admin_id' => $data['admin_id']
            ]);
        }
    }
}
