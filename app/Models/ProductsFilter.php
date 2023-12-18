<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Product;

class ProductsFilter extends Model
{
    use HasFactory;



    // this method is called in admin\filters\filters_values.blade.php to be able to translate the `filter_id` column to filter names to show them in the table in filters_values.blade.php in the Admin Panel    
    public static function getFilterName($filter_id) {
        $getFilterName = ProductsFilter::select('filter_name')->where('id', $filter_id)->first();


        return $getFilterName->filter_name;
    }



    // Every Product Dynamic Filter has many Product Filter Values (hasMany) (A 'RAM' product dynamic filter has many values like: 4GB, 6GB, 8GB, ...)    
    public function filter_values() {
        return $this->hasMany('App\Models\ProductsFiltersValue', 'filter_id'); // 'filter_id' is the foreign key
    }



    // Get all the (enabled/active) Filters
    public static function productFilters() { 
        $productFilters = ProductsFilter::with('filter_values')->where('status', 1)->get()->toArray(); // with('filter_values') is the relationship method name to get the values of a filter

        return $productFilters;
    }



    // Check if a specific filter has a said category    // Get the category related filters (to be able to get a some category filters to view them in filters.blade.php)    
    public static function filterAvailable($filter_id, $category_id) {
        $filterAvailable = ProductsFilter::select('cat_ids')->where([
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
        $categoryDetails = Category::categoryDetails($url);

        // Get the product ids of the fetched categories of the URL from `products` table
        $getProductIds = Product::select('id')->whereIn('category_id', $categoryDetails['catIds'])->pluck('id')->toArray();

        // Get the sizes of the product ids from the `products_attributes` table
        $getProductSizes = \App\Models\ProductsAttribute::select('size')->whereIn('product_id', $getProductIds)->groupBy('size')->pluck('size')->toArray(); // We used groupBy() method to eliminate the repeated product `size`-s (in order not to show repeated 'filters' values (like small, small, medium, ...)): https://laravel.com/docs/9.x/collections#method-groupby


        return $getProductSizes;
    }

    // Get the colors of a product from a URL (URL of the category)    
    public static function getColors($url) { // this method is used in filters.blade.php
        // Get the parent category & its subcategories (child categories) ids of a certain URL
        $categoryDetails = Category::categoryDetails($url);

        // Get the product ids of the fetched categories of the URL from `products` table
        $getProductIds = Product::select('id')->whereIn('category_id', $categoryDetails['catIds'])->pluck('id')->toArray();
        // dd($getProductIds);

        // Get the colors of the product ids from the `products` table
        $getProductColors = Product::select('product_color')->whereIn('id', $getProductIds)->groupBy('product_color')->pluck('product_color')->toArray(); // We used groupBy() method to eliminate the repeated product `color`-s (in order not to show repeated 'filters' values (like red, red, green, ...)): https://laravel.com/docs/9.x/collections#method-groupby
        // dd($getProductColors);


        return $getProductColors;
    }

    // Get the brand of a product from a URL (URL of the category)    
    public static function getBrands($url) { // this method is used in filters.blade.php
        // Get the parent category & its subcategories (child categories) ids of a certain URL
        $categoryDetails = Category::categoryDetails($url);

        // Get the product ids of the fetched categories of the URL from `products` table
        $getProductIds = Product::select('id')->whereIn('category_id', $categoryDetails['catIds'])->pluck('id')->toArray();


        // Get the brand ids of the product ids of the fetched categories (depending on the URL)
        $brandIds = Product::select('brand_id')->whereIn('id', $getProductIds)->groupBy('brand_id')->pluck('brand_id')->toArray(); // We used groupBy() method to eliminate the repeated product `brand_id`-s (in order not to show repeated 'filters' values (like Samsung, Samsung, LG, ...)): https://laravel.com/docs/9.x/collections#method-groupby


        // Get the brand names from `brands` table
        $brandDetails = \App\Models\Brand::select('id', 'name')->whereIn('id', $brandIds)->get()->toArray(); // from `brands` table 


        return $brandDetails;
    }

}