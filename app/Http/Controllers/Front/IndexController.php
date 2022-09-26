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
        // dd($fixBanners);


        // return view('front.index')->with(compact('banners')); // this is the same as:    return view('front/index');
        return view('front.index')->with(compact('sliderBanners', 'fixBanners')); // this is the same as:    return view('front/index');
    }
}
