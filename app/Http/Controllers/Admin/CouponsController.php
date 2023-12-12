<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Coupon;



class CouponsController extends Controller
{
    // Render admin/coupons/coupons.blade.php page in the Admin Panel    
    public function coupons() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'coupons');

        
        // Get ONLY the coupons that BELONG TO the 'vendor' to show them up in (not ALL coupons show up) in coupons.blade.php, and also make sure that the 'vendor' account is active/enabled/approved (`status` is 1) before they can access the products page    
        $adminType = Auth::guard('admin')->user()->type;      // `type`      is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `type`      column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        $vendor_id = Auth::guard('admin')->user()->vendor_id; // `vendor_id` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `vendor_id` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

        if ($adminType == 'vendor') { // if the authenticated user (the logged in user) is 'vendor', check his `status`
            $vendorStatus = Auth::guard('admin')->user()->status; // `status` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `status` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            // dd($vendorStatus);
            if ($vendorStatus == 0) { // if the 'vendor' is inactive/disabled
                return redirect('admin/update-vendor-details/personal')->with('error_message', 'Your Vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details'); // the error_message will appear to the vendor in the route: 'admin/update-vendor-details/personal' which is the update_vendor_details.blade.php page
            }

            $coupons = Coupon::where('vendor_id', $vendor_id)->get()->toArray(); // Get ONLY the coupons that BELONG TO the vendor

        } else { // if the $adminType is 'admin'
            $coupons = Coupon::get()->toArray();
            // dd($coupons);
        }


        return view('admin.coupons.coupons')->with(compact('coupons'));
    }

    // Update Coupon Status (active/inactive) via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js    
    public function updateCouponStatus(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            Coupon::where('id', $data['coupon_id'])->update(['status' => $status]); // $data['coupon_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'   => $status,
                'coupon_id' => $data['coupon_id']
            ]);
        }
    }

    // Delete a Coupon via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js    
    public function deleteCoupon($id) {
        Coupon::where('id', $id)->delete();
        
        $message = 'Coupon has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    // Render admin/coupons/add_edit_coupon.blade.php page with 'GET' request ('Edit/Upate the Coupon') if the {id?} Optional Parameter is passed, or if it's not passed, it's a GET request too to 'Add a Coupon', or it's a POST request for the HTML Form submission in the same page    
    public function addEditCoupon(Request $request, $id = null) { // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Coupon', and if not passed, this means' Add a Coupon'    // GET request to render the add_edit_coupon.blade.php view (whether Add or Edit depending on passing or not passing the Optional Parameter {id?}), and POST request to submit the <form> in that same page    // {id?} Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'coupons');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters (Optional Parameters {id?}), this means 'Add a new Coupon'
            // Add a new Coupon
            $title = 'Add Coupon';
            $coupon = new Coupon;
            // dd($coupon);

            $selCats   = array();
            $selBrands = array();
            $selUsers  = array();

            $message = 'Coupon added successfully!';

        } else { // if the $id is passed in the route/URL parameters (Optional Parameters {id?}), this means 'Edit/Update the Coupon'
            // Edit/Update the Coupon
            $title = 'Edit Coupon';
            $coupon = Coupon::find($id);
            // dd($coupon);

            $selCats   = explode(',', $coupon['categories']); // selected categories
            $selBrands = explode(',', $coupon['brands']);     // selected brands
            $selUsers  = explode(',', $coupon['users']);      // selected users

            $message = 'Coupon updated successfully!';
        }



        if ($request->isMethod('post')) { // if the HTML Form is submitted (WHETHER Add or Update!)
            $data = $request->all();
            // dd($data);


            // Laravel's Validation    // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    
            $rules = [
                'categories'    => 'required',
                'brands'        => 'required',
                'coupon_option' => 'required',
                'coupon_type'   => 'required',
                'amount_type'   => 'required',
                'amount'        => 'required|numeric',
                'expiry_date'   => 'required'
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                'categories.required'    => 'Select Categories',
                'brands.required'        => 'Select Brands',
                'coupon_option.required' => 'Select Coupon Option',
                'coupon_type.required'   => 'Select Coupon Type',
                'amount_type.required'   => 'Select Amount Type',
                'amount.required'        => 'Enter Amount',
                'amount.numeric'         => 'Enter Valid Amount',
                'expiry_date.required'   => 'Enter Expiry Date',
            ];

            $this->validate($request, $rules, $customMessages);



            if (isset($data['categories'])) {
                $categories = implode(',', $data['categories']);
            } else {
                $categories = '';
            }

            if (isset($data['brands'])) {
                $brands = implode(',', $data['brands']);
            } else {
                $brands = '';
            }

            if (isset($data['users'])) {
                $users = implode(',', $data['users']);
            } else {
                $users = '';
            }


            // In case of 'Automatic' Coupon Option, we generate a random coupon code string, but in case it's 'Manual', we take the inserted coupon code as is
            if ($data['coupon_option'] == 'Automatic') {
                $coupon_code = \Illuminate\Support\Str::random(8); // Str::random(): https://laravel.com/docs/9.x/helpers#method-str-random
                // echo $coupon_code . '<br>';
            } else { // if the Coupon Option is 'Manual', take the inserted code (by superadmin/admin/vendor)
                $coupon_code = $data['coupon_code'];
            }


            $adminType = Auth::guard('admin')->user()->type; // Get the currently authenticated user's `type` from `admins` table using our Custom 'admin' Authentication Guard    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            if ($adminType == 'vendor') {
                $coupon->vendor_id = Auth::guard('admin')->user()->vendor_id; // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
            } else {
                $coupon->vendor_id = 0;
            }


            // dd($data);


            // Insert data into `coupons` database table
            $coupon->coupon_option = $data['coupon_option'];
            $coupon->coupon_code   = $coupon_code;
            $coupon->categories    = $categories;
            $coupon->brands        = $brands;
            $coupon->users         = $users;
            $coupon->coupon_type   = $data['coupon_type'];
            $coupon->amount_type   = $data['amount_type'];
            $coupon->amount        = $data['amount'];
            $coupon->expiry_date   = $data['expiry_date'];
            $coupon->status        = 1;

            $coupon->save();


            return redirect('admin/coupons')->with('success_message', $message);
        }



        // Get ALL the Sections with their Categories and Subcategories (Get all sections with its categories and subcategories)    // $categories are ALL the `sections` with their (parent) categories (if any (if exist)) and subcategories (if any (if exist))    
        $categories = \App\Models\Section::with('categories')->get()->toArray(); // with('categories') is the relationship method name in the Section.php Model
        // dd($categories);

        // Get all brands
        $brands = \App\Models\Brand::where('status', 1)->get()->toArray();
        // dd($brands);

        // Get all users' emails
        $users = \App\Models\User::select('email')->where('status', 1)->get();
        // dd($users);


        return view('admin.coupons.add_edit_coupon')->with(compact('title', 'coupon', 'categories', 'brands', 'users', 'selCats', 'selBrands', 'selUsers'));
    }

}