<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Rating;


class RatingController extends Controller
{
    // Add Rating & Review on a product in front/products/detail.blade.php    
    public function addRating(Request $request) {
        // Make sure the user is logged in to be able to rate the product
        if (!Auth::check()) { // If the current user is not authenticated / logged-out / guest / visitor    // Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated
            $message = 'Log in to rate this product';
            return redirect()->back()->with('error_message', $message);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            // Check if the user has already rated this product before
            $user_id = Auth::user()->id; // Get/Retrive the id of the authenticated/logged-in user    // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            $ratingCount = Rating::where([
                'user_id'    => $user_id,
                'product_id' => $data['product_id']
            ])->count();

            if ($ratingCount > 0) {
                $message = 'You\'ve already rated this product before!';
                return redirect()->back()->with('error_message', $message);
            } else { // Add the Rating
                // echo 'Add Rating<br>';

                // Validation
                // Check if the user has clicked on one of the stars to rate the product
                if (empty($data['rating'])) {
                    $message = 'Please click on a star to rate the product!';
                    return redirect()->back()->with('error_message', $message);
                } else {

                    $rating = new Rating();

                    $rating->user_id    = $user_id;
                    $rating->product_id = $data['product_id'];
                    $rating->review     = $data['review'];
                    $rating->rating     = $data['rating'];
                    $rating->status     = 0; // Will give a default value of 0 (disabled) to enable the admin to approve the rating first

                    $rating->save();

                    // Show a Success Message
                    $message = 'Thanks for rating the product! It\'ll be shown after being approved by an admin!';
                    return redirect()->back()->with('success_message', $message);
                }
            }
        }
    }

}