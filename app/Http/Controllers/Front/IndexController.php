<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        // Get all active (enabled) banners

        $sliderBanners = \App\Models\Banner::where('type', 'Slider')->where('status', 1)->get()->toArray(); 
        $fixBanners    = \App\Models\Banner::where('type', 'Fix')->where('status', 1)->get()->toArray(); 
        $categories    = \App\Models\Category::where([['parent_id', 0],['status', 1]])->get()->toArray();
        $newProducts   = \App\Models\Product::orderBy('id', 'Desc')->where('status', 1)->with('vendor')->limit(10)->get()->toArray(); // show the LATEST (DESCendingly) 8 added products (to show the 'New Arrivals' at the home page)    // Ordering, Grouping, Limit & Offset: https://laravel.com/docs/9.x/queries#ordering-grouping-limit-and-offset    
        $bestSellers   = \App\Models\Product::where([
            'is_bestseller' => 'Yes',
            'status'        => 1 // product is enabled (active)
        ])->limit(4)->inRandomOrder()->get()->toArray(); // show the 'BestSeller' products with RANDOM ORDERING: https://laravel.com/docs/9.x/queries#random-ordering    // using the inRandomOder() method    // Only 'superadmin' can mark a product as 'best seller', but 'vendor' can't    
        $discountedProducts = \App\Models\Product::where('product_discount', '>' , 0)->where('status', 1)->limit(6)->inRandomOrder()->get()->toArray(); // show 'Discounted Products' with RANDOM ORDERING    
        $featuredProducts   = \App\Models\Product::where([
            'is_featured' => 'Yes',
            'status'      => 1 // product is enabled (active)
        ])->limit(6)->get()->toArray(); // show 'Featured Products'    


        // Static SEO (HTML meta tags): Check the HTML <meta> tags and <title> tag in front/layout/layout.blade.php    
        $meta_title       = 'Kapiton - Philippines';
        $meta_description = 'Online Shopping Website which deals in Clothing, Electronics & Appliances Products';
        $meta_keywords    = 'eshop website, online shopping, multi vendor e-commerce';


        return view('front.index')->with(compact('sliderBanners', 'fixBanners', 'newProducts', 'bestSellers', 'discountedProducts', 'featuredProducts', 'meta_title', 'meta_description', 'meta_keywords', 'categories')); // this is the same as:    return view('front/index');
    }
}