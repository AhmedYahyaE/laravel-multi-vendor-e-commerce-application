<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductsFilter extends Model
{
    use HasFactory;

    public function categories() {
        return $this->select([
            'products_filters.id',
            DB::raw('SUBSTRING_INDEX(SUBSTRING_INDEX(products_filters.cat_ids, ",", categories.id), ",", -1) as `category_id`'),
            'products_filters.filter_name'
        ])
            ->join('categories', function ($join) {
                $join->whereRaw('CHAR_LENGTH(products_filters.cat_ids) - CHAR_LENGTH(REPLACE(products_filters.cat_ids, ",", "")) >= categories.id - 1');
            })
            ->where('products_filters.status', 1)
            ->orderBy('products_filters.id')
            ->orderBy('categories.id');
    }

    // this method is called in admin\filters\filters_values.blade.php to be able to translate the `filter_id` column to filter names to show them in the table in filters_values.blade.php in the Admin Panel    
    public static function getFilterName($filter_id) {
        $getFilterName = \App\Models\ProductsFilter::select('filter_name')->where('id', $filter_id)->first();


        return $getFilterName->filter_name;
    }



    // Every Product Dynamic Filter has many Product Filter Values (hasMany) (A 'RAM' product dynamic filter has many values like: 4GB, 6GB, 8GB, ...)    
    public function filter_values() {
        return $this->hasMany('App\Models\ProductsFiltersValue', 'filter_id'); // 'filter_id' is the foreign key
    }



    // Get all the (enabled/active) Filters
    public static function productFilters() { 
        $productFilters = \App\Models\ProductsFilter::with('filter_values')->where('status', 1)->get()->toArray(); // with('filter_values') is the relationship method name to get the values of a filter

        return $productFilters;
    }



    // Check if a specific filter has a said category    // Get the category related filters (to be able to get a some category filters to view them in filters.blade.php)    
    public static function filterAvailable($filter_id, $category_id) {
        $filterAvailable = \App\Models\ProductsFilter::select('cat_ids')->where([
            'id'     => $filter_id,
            'status' => 1
        ])->first()->toArray();

        $catIdsArray = explode(',', $filterAvailable['cat_ids']); // convert the string `cat_ids` column of the `products_filters` database table to an array


        if (in_array($category_id, $catIdsArray)) {
            $available = 'Yes';
        } else {
            $available = 'No';
        }


        return $available;
    }



    // Get the sizes of a product from a URL (URL of the category)    
    public static function getSizes($url) { // this method is used in filters.blade.php
        // Get the parent category & its subcategories (child categories) ids of a certain URL
        $categoryDetails = \App\Models\Category::categoryDetails($url);

        // Get the product ids of the fetched categories of the URL from `products` table
        $getProductIds = \App\Models\Product::select('id')->whereIn('category_id', $categoryDetails['catIds'])->pluck('id')->toArray();

        // Get the sizes of the product ids from the `products_attributes` table
        $getProductSizes = \App\Models\ProductsAttribute::select('size')->whereIn('product_id', $getProductIds)->groupBy('size')->pluck('size')->toArray(); // We used groupBy() method to eliminate the repeated product `size`-s (in order not to show repeated 'filters' values (like small, small, medium, ...)): https://laravel.com/docs/9.x/collections#method-groupby


        return $getProductSizes;
    }

    // Get the colors of a product from a URL (URL of the category)    
    public static function getColors($url) { // this method is used in filters.blade.php
        // Get the parent category & its subcategories (child categories) ids of a certain URL
        $categoryDetails = \App\Models\Category::categoryDetails($url);

        // Get the product ids of the fetched categories of the URL from `products` table
        $getProductIds = \App\Models\Product::select('id')->whereIn('category_id', $categoryDetails['catIds'])->pluck('id')->toArray();
        // dd($getProductIds);

        // Get the colors of the product ids from the `products` table
        $getProductColors = \App\Models\Product::select('product_color')->whereIn('id', $getProductIds)->groupBy('product_color')->pluck('product_color')->toArray(); // We used groupBy() method to eliminate the repeated product `color`-s (in order not to show repeated 'filters' values (like red, red, green, ...)): https://laravel.com/docs/9.x/collections#method-groupby
        // dd($getProductColors);


        return $getProductColors;
    }

    // Get the brand of a product from a URL (URL of the category)    
    public static function getBrands($url) { // this method is used in filters.blade.php
        // Get the parent category & its subcategories (child categories) ids of a certain URL
        $categoryDetails = \App\Models\Category::categoryDetails($url);

        // Get the product ids of the fetched categories of the URL from `products` table
        $getProductIds = \App\Models\Product::select('id')->whereIn('category_id', $categoryDetails['catIds'])->pluck('id')->toArray();


        // Get the brand ids of the product ids of the fetched categories (depending on the URL)
        $brandIds = \App\Models\Product::select('brand_id')->whereIn('id', $getProductIds)->groupBy('brand_id')->pluck('brand_id')->toArray(); // We used groupBy() method to eliminate the repeated product `brand_id`-s (in order not to show repeated 'filters' values (like Samsung, Samsung, LG, ...)): https://laravel.com/docs/9.x/collections#method-groupby


        // Get the brand names from `brands` table
        $brandDetails = \App\Models\Brand::select('id', 'name')->whereIn('id', $brandIds)->get()->toArray(); // from `brands` table 


        return $brandDetails;
    }

    public static function getCollectionSizes($collection) {
        if ($collection == "all") {
            return [];
        } else {
            $collection_id = \App\Models\Section::select('id')->whereRaw('LOWER(name) = ?', [strtolower($collection)])->first()->toArray();
            
            $category_ids = \App\Models\Category::select('id')->where('section_id', $collection_id)->get()->pluck('id')->toArray();
            
            $product_ids = \App\Models\Product::select('id')->whereIn('category_id', $category_ids)->get()->pluck('id')->toArray();
            
            // We used groupBy() method to eliminate the repeated product `size`-s (in order not to show repeated 'filters' values (like small, small, medium, ...)): https://laravel.com/docs/9.x/collections#method-groupby
            $getProductSizes = \App\Models\ProductsAttribute::select('size')->whereIn('product_id', $product_ids)->groupBy('size')->pluck('size')->toArray(); 
            // dd($getProductSizes);
    
            return $getProductSizes;
        }
    }

    public static function getCollectionColors($collection) {
        if ($collection == "all") {
            return [];
        } else {
            $collection_id = \App\Models\Section::select('id')->whereRaw('LOWER(name) = ?', [strtolower($collection)])->first()->toArray();
            
            $category_ids = \App\Models\Category::select('id')->where('section_id', $collection_id)->get()->pluck('id')->toArray();
            
            $product_ids = \App\Models\Product::select('id')->whereIn('category_id', $category_ids)->get()->pluck('id')->toArray();
    
            // Get the colors of the product ids from the `products` table
            $getProductColors = \App\Models\Product::select('product_color')->whereIn('id', $product_ids)->groupBy('product_color')->pluck('product_color')->toArray();
    
            return $getProductColors;
        }
    }

    public static function getCollectionBrands($collection) {
        
        if ($collection == "all"){
            $collection_id = \App\Models\Section::select('id')->get()->toArray();
        } else {
            $collection_id = \App\Models\Section::select('id')->whereRaw('LOWER(name) = ?', [strtolower($collection)])->first()->toArray();
        }

        $category_ids = \App\Models\Category::select('id')->whereIn('section_id', $collection_id)->get()->pluck('id')->toArray();
        
        $product_ids = \App\Models\Product::select('id')->whereIn('category_id', $category_ids)->get()->pluck('id')->toArray();

        // Get the brand ids of the product ids of the fetched categories (depending on the URL)
        $brandIds = \App\Models\Product::select('brand_id')->whereIn('id', $product_ids)->groupBy('brand_id')->pluck('brand_id')->toArray();

        // Get the brand names from `brands` table
        $brandDetails = \App\Models\Brand::select('id', 'name')->whereIn('id', $brandIds)->get()->toArray(); // from `brands` table 

        return $brandDetails;        
    }

}