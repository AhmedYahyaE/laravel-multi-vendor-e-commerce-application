<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RatingController extends Controller
{
    // Add Rating & Review on a product in front/products/detail.blade.php    
    public function addRating(Request $request) {
        // Make sure the user is logged in to be able to rate the product
        if (!Auth::check()) { // If the current user is not authenticated / logged-out / guest / visitor    // Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated
            $message = 'Log in to rate this product';
            return redirect()->json([
                'success' => false,
                'message' => $message
            ]);
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            // Check if the user has already rated this product before
            $user_id = Auth::user()->id; // Get/Retrive the id of the authenticated/logged-in user    // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            $ratingCount = \App\Models\Rating::where([
                'user_id'    => $user_id,
                'product_id' => $data['product_id']
            ])->count();

            if ($ratingCount > 0) {
                $message = 'You\'ve already rated this product before!';
                return response()->json([
                    'success' => false,
                    'message' => $message
                ]);
            } else { // Add the Rating
                // echo 'Add Rating<br>';

                // Validation
                // Check if the user has clicked on one of the stars to rate the product
                if (empty($data['rating'])) {
                    $message = 'Please click on a star to rate the product!';
                    // return redirect()->back()->with('error_message', $message);
                    return response()->json([
                        'success' => false,
                        'message' => $message
                    ]);
                } else {

                    $rating = new \App\Models\Rating();

                    $rating->user_id    = $user_id;
                    $rating->product_id = $data['product_id'];
                    $rating->review     = $data['review'];
                    $rating->rating     = $data['rating'];
                    $rating->status     = 1; // Will give a default value of 0 (disabled) to enable the admin to approve the rating first

                    $rating->save();

                    // Show a Success Message
                    $message = 'Thanks for rating the product! It\'ll be shown after being approved by an admin!';

                    // Show Ratings & Reviews in front/products/detail.blade.php    
                    $ratings = \App\Models\Rating::with('user')->where([ // Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'user' is the relationship method name in Rating.php model
                        'product_id' => $rating->product_id,
                        'status'     => 1
                    ])->get()->toArray();

                    // Calculate Average Rating (for a product):
                    $ratingSum = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1
                    ])->sum('rating');

                    // Number of times a product has been rated by users
                    $ratingCount = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1
                    ])->count();

                    if ($ratingCount > 0) { // if there's at least one rating for a product (if a product has been rated at least once)
                        $avgRating     = round($ratingSum / $ratingCount, 2);
                        $avgStarRating = round($ratingSum / $ratingCount); // for showing the "Stars" in HTML
                    } else {
                        $avgRating     = 0;
                        $avgStarRating = 0;
                    }

                    // Calculate the count of Star Ratings for 1 Star, 2 Stars, 3 Stars, 4 Stars, and 5 Stars ratings (Each on its own)
                    $ratingOneStarCount = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1,
                        'rating'     => 1
                    ])->count();

                    $ratingTwoStarCount = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1,
                        'rating'     => 2
                    ])->count();

                    $ratingThreeStarCount = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1,
                        'rating'     => 3
                    ])->count();

                    $ratingFourStarCount = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1,
                        'rating'     => 4
                    ])->count();

                    $ratingFiveStarCount = \App\Models\Rating::where([
                        'product_id' => $rating->product_id,
                        'status'     => 1,
                        'rating'     => 5
                    ])->count();

                    $productDetails['id'] = $rating->product_id;
                    $data = [
                        'message' => $message, 'productDetails' => $productDetails,
                        'ratings' => $ratings, 'avgRating' => $avgRating, 'avgStarRating' => $avgStarRating, 'ratingOneStarCount' => $ratingOneStarCount, 
                        'ratingTwoStarCount' => $ratingTwoStarCount, 'ratingThreeStarCount' => $ratingThreeStarCount, 'ratingFourStarCount' => $ratingFourStarCount, 
                        'ratingFiveStarCount' => $ratingFiveStarCount
                    ];
                    
                    // return redirect()->back()->with('success_message', $message);
                    return response()->view('front.products.product_reviews', $data, 200)->header('Content-Type', 'text/html');
                }
            }
        }
    }

}