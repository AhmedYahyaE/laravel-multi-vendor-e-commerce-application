<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index() {
        // Get all active (enabled) banners
        // $banners = \App\Models\Banner::where('status', 1)->get()->toArray();

        $sliderBanners = \App\Models\Banner::where('type', 'Slider')->where('status', 1)->get()->toArray(); // https://www.youtube.com/watch?v=GC_5WN0PeeM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=70
        $fixBanners    = \App\Models\Banner::where('type', 'Fix')->where('status', 1)->get()->toArray(); // https://www.youtube.com/watch?v=GC_5WN0PeeM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=70
        $newProducts   = \App\Models\Product::orderBy('id', 'Desc')->where('status', 1)->limit(8)->get()->toArray(); // show the LATEST (DESCendingly) 8 added products (to show the 'New Arrivals' at the home page)    // Ordering, Grouping, Limit & Offset: https://laravel.com/docs/9.x/queries#ordering-grouping-limit-and-offset    // https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=71
        $bestSellers   = \App\Models\Product::where([
            'is_bestseller' => 'Yes',
            'status'        => 1 // product is enabled (active)
        ])->inRandomOrder()->get()->toArray(); // show the 'BestSeller' products with RANDOM ORDERING: https://laravel.com/docs/9.x/queries#random-ordering    // using the inRandomOder() method    // Only 'superadmin' can mark a product as 'best seller', but 'vendor' can't    // https://www.youtube.com/watch?v=jCWz6fqoFno&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72
        $discountedProducts = \App\Models\Product::where('product_discount', '>' , 0)->where('status', 1)->limit(6)->inRandomOrder()->get()->toArray(); // show 'Discounted Products' with RANDOM ORDERING    // https://www.youtube.com/watch?v=sCTv1gw201g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=74
        $featuredProducts   = \App\Models\Product::where([
            'is_featured' => 'Yes',
            'status'      => 1 // product is enabled (active)
        ])->limit(6)->get()->toArray(); // show 'Featured Products'    // https://www.youtube.com/watch?v=4cMus91lkDs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=74
        // dd($fixBanners);
        // dd($newProducts);
        // dd($bestSellers);
        // dd($discountedProducts);
        // dd($featuredProducts);


        // return view('front.index')->with(compact('banners')); // this is the same as:    return view('front/index');
        return view('front.index')->with(compact('sliderBanners', 'fixBanners', 'newProducts', 'bestSellers', 'discountedProducts', 'featuredProducts')); // this is the same as:    return view('front/index');
    }
}
