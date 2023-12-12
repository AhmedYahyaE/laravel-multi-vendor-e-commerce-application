<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use App\Models\Rating;

class RatingController extends Controller
{
    // Render admin/ratings/ratings.blade.php page in the Admin Panel    
    public function ratings() {
        // Highlight the 'Product Ratings & Reviews' tab in the 'Ratings Management' module in the Admin Panel left Sidebar (admin/layout/sidebar.blade.php) on the left in the Admin Panel. Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'ratings');

        $ratings = Rating::with(['user', 'product'])->get()->toArray(); // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'user' and 'product' are the relationship method names in Rating.php model
        // dd($ratings);


        return view('admin.ratings.ratings')->with(compact('ratings'));
    }

    // Update Rating Status (active/inactive) via AJAX in admin/ratings/ratings.blade.php, check admin/js/custom.js    
    public function updateRatingStatus(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            Rating::where('id', $data['rating_id'])->update(['status' => $status]); // $data['rating_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'    => $status,
                'rating_id' => $data['rating_id']
            ]);
        }
    }

    // Delete a Rating via AJAX in admin/ratings/ratings.blade.php, check admin/js/custom.js    
    public function deleteRating($id) { // Route Parameters: Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        Rating::where('id', $id)->delete();

        $message = 'Rating has been deleted successfully!';
        

        return redirect()->back()->with('success_message', $message);
    }

}