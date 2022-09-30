<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76


    public function listing() { // using the Dynamic Routes with the foreach loop
        $url = \Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri(); // Accessing The Current Route: https://laravel.com/docs/9.x/routing#accessing-the-current-route    // Accessing The Current URL: https://laravel.com/docs/9.x/urls#accessing-the-current-url    // Check 18:15 in https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76   
        // dd($url);
        $categoryCount = \App\Models\Category::where([
            'url'    => $url,
            'status' => 1
        ])->count();
        // dd($categoryCount);

        if ($categoryCount > 0) { // if the category entered as a URL in the browser address bar exists
            // Get the entered URL in the browser address bar category details
            $categoryDetails = \App\Models\Category::categoryDetails($url);
            // dd($categoryDetails);
            // dd($categoryDetails['sub_categories']);
            // dd('category exists');

            // Get the categories related products    // Note: if the entered URL in the browser address bar is a 'category', we need to fetch its related products as well as its subcategories related products, but if the URL is a subcategory, we need to fetch the subcategory related products only
            // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->get()->toArray(); // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
            // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->simplePaginate(3); // Simple Pagination: https://laravel.com/docs/9.x/pagination#simple-pagination    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
            $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->paginate(3); // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
            // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->cursorPaginate(3); // Cursor Pagination: https://laravel.com/docs/9.x/pagination#cursor-pagination    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
            // dd($categoryProducts);


            return view('front.products.listing')->with(compact('categoryDetails', 'categoryProducts'));

        } else {
            abort(404); // we will create the 404 page later on    // https://laravel.com/docs/9.x/helpers#method-abort
        }
    }
}
