<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionsController extends Controller
{
    private $section_tbl;

    public function __construct() {
        $this->section_tbl = new Section;
    }

    public function index($collectionname = '') {
        $sectionCategories = $this->section_tbl->whereRaw('LOWER(name) = ?', [strtolower($collectionname)]);

        if ($sectionCategories->count() > 0) {
            $catIds = $sectionCategories->get()->pluck('id')->toArray();
            $catDetails = $sectionCategories->with('categories')->get()->first()->toArray();
            
            $categoryDetails = [
                'catIds' => $catIds,
                'categoryDetails' => $catDetails
            ];
    
            if ($collectionname !== "all") {
                $collection = \App\Models\Product::getProductsBySectionName($collectionname)->paginate(15);
            } else {
                $collection = \App\Models\Product::with('vendor')->paginate(15);
            }
            // dd($collection);
            return view('front.products.collection_listings')->with(compact('collectionname', 'collection', 'categoryDetails'));
        } else {
            abort(404);
        }
    }
}
