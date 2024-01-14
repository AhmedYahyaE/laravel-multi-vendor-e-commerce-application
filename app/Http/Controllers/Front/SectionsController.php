<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    //

    public function index($collectionname = '') {
        $collection = \App\Models\Product::getProductsBySectionName($collectionname);
        // dd($collection);
        return view('front.products.collection_listings')->with(compact('collectionname', 'collection'));
    }
}
