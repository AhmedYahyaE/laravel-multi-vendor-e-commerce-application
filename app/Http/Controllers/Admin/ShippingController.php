<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\ShippingCharge;

class ShippingController extends Controller
{
    // We got two Shipping Charges modules: Simple one (every country has its own shipping rate (price/cost/charges) based on the Delivery Address in the Checkout page) and Advanced one (every country has its own shipping rate based on the Delivery Address in the Checkout page, plus, other charges are calculated based on shipment weight). We created the `shipping_charges` database table for that matter. Also, the Shipping Charge module will be available in the Admin Panel for 'admin'-s only, not for 'vendor'-s
    


    // Render the Shipping Charges page (admin/shipping/shipping_charges.blade.php) in the Admin Panel for 'admin'-s only, not for vendors    
    public function shippingCharges() {
        // Highlight the 'Shipping Charges' module in the Sidebar on the left in the Admin Panel. Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'shipping');

        $shippingCharges = ShippingCharge::get()->toArray();


        return view('admin.shipping.shipping_charges')->with(compact('shippingCharges'));
    }

    // Update Shipping Status (active/inactive) via AJAX in admin/shipping/shipping_charages.blade.php, check admin/js/custom.js    
    public function updateShippingStatus(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            ShippingCharge::where('id', $data['shipping_id'])->update(['status' => $status]); // $data['shipping_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'      => $status,
                'shipping_id' => $data['shipping_id']
            ]);
        }
    }

    // Render admin/shipping/edit_shipping_charges.blade.php page in case of HTTP 'GET' request ('Edit/Update Shipping Charges'), or hadle the HTML Form submission in the same page in case of HTTP 'POST' request    
    public function editShippingCharges($id, Request $request) { // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        // Highlight the 'Shipping Charges' module in the Sidebar on the left in the Admin Panel. Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'shipping');

        if ($request->isMethod('post')) { // if the HTML Form in edit_shipping_charges.blade.php is submitted (WHETHER Add or Update!)
            $data = $request->all();
            // dd($data);

            ShippingCharge::where('id', $id)->update([
                '0_500g'      => $data['0_500g'],
                '501g_1000g'  => $data['501g_1000g'],
                '1001_2000g'  => $data['1001_2000g'],
                '2001g_5000g' => $data['2001g_5000g'],
                'above_5000g' => $data['above_5000g'],
            ]);
            $message = 'Shipping Charges updated successfully!';


            return redirect()->back()->with('success_message', $message);
        }

        $shippingDetails = ShippingCharge::where('id', $id)->first();
        $title = 'Edit Shipping Charges';


        return view('admin.shipping.edit_shipping_charges')->with(compact('shippingDetails', 'title'));
    }

}