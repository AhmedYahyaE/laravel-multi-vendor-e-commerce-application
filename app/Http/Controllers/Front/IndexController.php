<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index() {
        // Get all active (enabled) banners
        $banners = \App\Models\Banner::where('status', 1)->get()->toArray();


        return view('front.index')->with(compact('banners')); // this is the same as:    return view('front/index');
    }
}
