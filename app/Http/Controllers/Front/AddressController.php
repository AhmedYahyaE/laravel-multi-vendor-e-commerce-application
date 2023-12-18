<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\DeliveryAddress;
use App\Models\Country;


class AddressController extends Controller
{
    // Checkout page Delivery Addresses Controller



    // Edit Delivery Addresses via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    
    public function getDeliveryAddress(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);


            // Get the Delivery Address of the currently authenticated/logged-in user
            $deliveryAddress = DeliveryAddress::where('id', $data['addressid'])->first()->toArray(); // Get all the delivery addresses of the currently authenticated/logged-in user    


            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'address' => $deliveryAddress
            ]);
        }
    }

    // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    
    public function saveDeliveryAddress(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            // Validation    
            // Manually Creating Validators: https://laravel.com/docs/9.x/validation#manually-creating-validators
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'delivery_name'    => 'required|string|max:100',   // string: https://laravel.com/docs/9.x/validation#rule-string    // max:value: https://laravel.com/docs/9.x/validation#rule-max
                'delivery_address' => 'required|string|max:100',   // string: https://laravel.com/docs/9.x/validation#rule-string    // max:value: https://laravel.com/docs/9.x/validation#rule-max
                'delivery_city'    => 'required|string|max:100',   // string: https://laravel.com/docs/9.x/validation#rule-string    // max:value: https://laravel.com/docs/9.x/validation#rule-max
                'delivery_state'   => 'required|string|max:100',   // string: https://laravel.com/docs/9.x/validation#rule-string    // max:value: https://laravel.com/docs/9.x/validation#rule-max
                'delivery_country' => 'required|string|max:100',   // string: https://laravel.com/docs/9.x/validation#rule-string    // max:value: https://laravel.com/docs/9.x/validation#rule-max
                'delivery_pincode' => 'required|digits:6',         // digits:value: https://laravel.com/docs/9.x/validation#rule-digits
                'delivery_mobile'  => 'required|numeric|digits:10' // digits:value: https://laravel.com/docs/9.x/validation#rule-digits
            ]);

            if ($validator->passes()) { // if the user passes validation, add a new (INSERT) or edit (UPDATE) the delivery address
                $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
                // dd($data);
    
    
                $address = array();
                // We add the `delivery_addresses` table column names to the array in order to be able to UPDATE (Edit) or INSERT INTO (Add) the `delivery_addresses` table using the $address variable:
                $address['user_id'] = Auth::user()->id; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                $address['name']    = $data['delivery_name'];
                $address['address'] = $data['delivery_address'];
                $address['city']    = $data['delivery_city'];
                $address['state']   = $data['delivery_state'];
                $address['country'] = $data['delivery_country'];
                $address['pincode'] = $data['delivery_pincode'];
                $address['mobile']  = $data['delivery_mobile'];
    
    
                // EDIT delivery address (UPDATE the `delivery_addresses` database table)
                if (!empty($data['delivery_id'])) { // if there's a delivery address id submitted from the HTML Form via AJAX, this means it's Edit Delivery Address (not Add a new delivery address) i.e.  (UPDATE the `delivery_addresses` database table)    // $data['delivery_id'] comes from the 'data' object inside the $.ajax() method. Check front/js/custom.js
                    // UPDATE the `delivery_addresses` database table
                    DeliveryAddress::where('id', $data['delivery_id'])->update($address); // $data['delivery_id'] comes from the 'data' object inside the $.ajax() method. Check front/js/custom.js
    
                // ADD a new delivery address (INSERT INTO the `delivery_addresses` database table)
                } else { // if there's no delivery address id submitted from the HTML Form via AJAX, this means it's Add a new Delivery Address (not Edit delivery address) i.e. (INSERT INTO the `delivery_addresses` database table)    // $data['delivery_id'] comes from the 'data' object inside the $.ajax() method. Check front/js/custom.js                        
                    // INSERT INTO the `delivery_addresses` database table
                    DeliveryAddress::create($address); // Check the DeliveryAddress.php model for Mass Assignment: https://laravel.com/docs/10.x/eloquent#mass-assignment    // Check 5:56 in 
                }
    
    
                // Note: You must pass in to view the SAME variables ($deliveryAddresses and $countries) that were passed in to it in checkout() method in Front/ProductsController.php
                $deliveryAddresses = DeliveryAddress::deliveryAddresses(); // Get all the delivery addresses of the currently authenticated/logged-in user    

                // Fetch all of the world countries from the database table `countries`
                $countries = Country::where('status', 1)->get()->toArray(); // get the countries which have status = 1 (to ignore the blacklisted countries, in case)
                // dd($countries);
    
    
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    // Note: You must pass in to view the SAME variables ($deliveryAddresses and $countries) that were passed in to it in checkout() method in Front/ProductsController.php
                    'view' => (string) \Illuminate\Support\Facades\View::make('front.products.delivery_addresses')->with(compact('deliveryAddresses', 'countries')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                ]);

            } else { // if the user fails validation, return an error message
                // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                // dd($validator->messages());
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'type'   => 'error',
                    'errors' => $validator->messages() // we'll loop over the Validation Errors Messages array using jQuery to show them in the frontend (Check    $(document).on('submit', '#addressAddEditForm')    in front/js/custom.js)    // Working With Error Messages: https://laravel.com/docs/9.x/validation#working-with-error-messages    
                ]);
            }
        }
    }

    // Remove Delivery Addresse via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged-in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Remove button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    
    public function removeDeliveryAddress(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);


            // DELETE the delivery address from the `delivery_addresses` database table
            DeliveryAddress::where('id', $data['addressid'])->delete(); // $data['addressid'] comes from the 'data' object inside the $.ajax() method. Check front/js/custom.js
            // exit;


            // Note: You must pass in to view the SAME variables ($deliveryAddresses and $countries) that were passed in to it in checkout() method in Front/ProductsController.php
            $deliveryAddresses = DeliveryAddress::deliveryAddresses(); // Get all the delivery addresses of the currently authenticated/logged-in user   

            // Fetch all of the world countries from the database table `countries`
            $countries = Country::where('status', 1)->get()->toArray(); // get the countries which have status = 1 (to ignore the blacklisted countries, in case)
            // dd($countries);


            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                // Note: You must pass in to view the SAME variables ($deliveryAddresses and $countries) that were passed in to it in checkout() method in Front/ProductsController.php
                'view' => (string) \Illuminate\Support\Facades\View::make('front.products.delivery_addresses')->with(compact('deliveryAddresses', 'countries')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
            ]);
        }
    }
}