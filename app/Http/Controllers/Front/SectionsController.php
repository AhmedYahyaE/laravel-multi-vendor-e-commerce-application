<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    //

    public function index() {
        return view('front.products.collection_listings');
    }
}
