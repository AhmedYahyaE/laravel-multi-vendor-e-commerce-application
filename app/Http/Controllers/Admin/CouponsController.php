<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143



    // Render admin/coupons/coupons.blade.php page in the Admin Panel    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143
    public function coupons() {
        $coupons = \App\Models\Coupon::get()->toArray();
        // dd($coupons);


        return view('admin.coupons.coupons')->with(compact('coupons'));
    }

    // Update Coupon Status (active/inactive) via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143
    public function updateCouponStatus(Request $request) {
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Coupon::where('id', $data['coupon_id'])->update(['status' => $status]); // $data['coupon_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'   => $status,
                'coupon_id' => $data['coupon_id']
            ]);
        }
    }

    // Delete a Coupon via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143
    public function deleteCoupon($id) {
        \App\Models\Coupon::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements
        
        $message = 'Coupon has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }
}
