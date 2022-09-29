<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Every 'product' belongs to a 'section'
    public function section() {
        return $this->belongsTo('App\Models\Section', 'section_id'); // 'section_id' is the foreign key
    }

    // Every 'product' belongs to a 'category'
    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id'); // 'category_id' is the foreign key
    }

    public function brand() { // Every product belongs to some brand    // this relationship method is used in Front/ProductsController.php    // https://www.youtube.com/watch?v=8kf1WDELK6o&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=77
        return $this->belongsTo('App\Models\Brand', 'brand_id'); // 'brand_id' is the foreign key
    }

    // Every product has many attributes
    public function attributes() {
        return $this->hasMany('App\Models\ProductsAttribute');
    }

    // Every product has many images
    public function images() {
        return $this->hasMany('App\Models\ProductsImage');
    }


    // A static method (to be able to be called directly without instantiating an object in index.blade.php) to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout    // Check 19:09 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72
    public static function getDiscountPrice($product_id) { // this method is called in front/index.blade.php
        // Get the product PRICE, DISCOUNT and CATEGORY ID
        $productDetails = \App\Models\Product::select('product_price', 'product_discount', 'category_id')->where('id', $product_id)->first();
        $productDetails = json_decode(json_encode($productDetails), true); // convert the object to an array    // The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36     AND     Check 22:30 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72

        // Get the product CATEGORY using its `category_id`
        $categoryDetails = \App\Models\Category::select('category_discount')->where('id', $productDetails['category_id'])->first();
        $categoryDetails = json_decode(json_encode($categoryDetails), true); // convert the object to an array    // The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36     AND     Check 22:30 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72

        
        if ($productDetails['product_discount'] > 0) { // if there's a 'PRODUCT discount' (i.e. discount is not zero 0)
            // if there's a PRODUCT discount on the product itself
            $discount_price = $productDetails['product_price'] - ($productDetails['product_price'] * $productDetails['product_discount'] / 100);
        } else if ($categoryDetails['category_discount'] > 0) { // if there's a 'CATEGORY discount' (i.e. discount is not zero 0) (if there's a discount on the whole category of that product)
            // if there's NO a PRODUCT discount, but there's a CATEGORY discount
            $discount_price = $productDetails['product_price'] - ($productDetails['product_price'] * $categoryDetails['category_discount'] / 100);
        } else { // there's no discount
            $discount_price = 0;
        }


        return $discount_price;
    }


}
