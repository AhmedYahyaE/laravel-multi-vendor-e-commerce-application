<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsFilter;
use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionsController extends Controller
{
    private $section_tbl, $productsModel;

    public function __construct() {
        $this->section_tbl = new Section;
    }

    public function index($collectionname = '') {
        $pageTitle = $collectionname;
        if ($collectionname !== "all") {
            $sectionCategories = $this->section_tbl->whereRaw('LOWER(name) = ?', [strtolower($collectionname)])->where('status', 1);
            
            $collection = Product::getProductsBySectionName($collectionname);
        } else {
            $sectionCategories = $this->section_tbl->where('status', 1);

            $collection = Product::where('status', 1)->with('vendor');
        }

        if ($sectionCategories->count() > 0) {
            $catIds = $sectionCategories->get()->pluck('id')->toArray();
            $catDetails = $sectionCategories->with('categories')->get()->first()->toArray();
            
            $categoryDetails = [
                'catIds' => $catIds,
                'categoryDetails' => $catDetails
            ];
        }

        $filters = $this->getAvailableFilters($catDetails, $collection);
        
        $collection = $collection->paginate(15);
        // dd($collection);
        return view('front.products.collection_listings')->with(compact('pageTitle', 'collectionname', 'collection', 'categoryDetails', 'filters'));
    }

    public function showVendorCollection(Vendor $vendor) {
        $vendorname = $vendor->name;
        $pageTitle = $vendorname;
        $collection = $vendor->products();
        
        $catIds = $vendor->products()->pluck('category_id');
        $catDetails = Category::whereIn('id', $catIds)->where([
            'parent_id' => 0,
            'status'    => 1
        ])->with('subCategories')->get()->first()->toArray();
        // dd($catDetails);

        $categoryDetails = [
            'catIds' => $catIds,
            'categoryDetails' => $catDetails,
        ];

        $filters = $this->getAvailableFilters($catDetails, $collection);
        $collection = $collection->paginate(15);

        return view('front.products.collection_listings')->with(compact('pageTitle', 'vendorname', 'collection', 'categoryDetails', 'filters'));
    }

    /**
     * Get Available Filters
     * will return available filters depending on section/category/vendor
     */
    private function getAvailableFilters($categoryDetails, $products) {

        $selection = $products->select('id','product_color','brand_id', 'vendor_id', 'category_id')->with(['brand', 'attributes' => function($query) {
            return $query->select('product_id','size');
        }, 'vendor'])->get()->toArray();
        
        $filters = [];
        // check for categories
        $filters['categories'] = $categoryDetails['categories'];

        // check for brands
        $filters['brands'] = collect($selection)->pluck('brand.name')->unique()->toArray();
        
        // check for sizes
        $filters['sizes'] = collect($selection)->pluck('attributes.*.size')->flatten()->unique()->toArray();

        // check for color
        $filters['color'] = collect($selection)->pluck('product_color')->unique()->toArray();
        

        return $filters;
    }
}
