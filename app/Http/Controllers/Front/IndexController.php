<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index() {
        return view('front.index'); // this is the same as:    return view('front/index');
    }
}
