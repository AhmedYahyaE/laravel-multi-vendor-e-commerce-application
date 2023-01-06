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


    // Relationship of a Product `products` table with Vendor `vendors` table (every product belongs to a vendor)    // https://www.youtube.com/watch?v=uu8CBDsWD7g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=109
    public function vendor() { // vendor() in the SINGULAR!    // A Product `products` belongs to a Vendor `vendors`, and the Foreign Key of the Relationship is the `vendor_id` column
        return $this->belongsTo('App\Models\Vendor', 'vendor_id')->with('vendorbusinessdetails'); // 'vendor_id' is the Foreign Key of the Relationhip    // Nested Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#nested-eager-loading     AND     Check https://www.youtube.com/watch?v=uu8CBDsWD7g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=109    // Utilizing another relationship inside a relationship (Nested Eager Loading) ('vendorbusinessdetails' is the relationship method name in Vendor.php model)
    }



    // A static method (to be able to be called directly without instantiating an object in index.blade.php) to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout    // Check 19:09 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72
    public static function getDiscountPrice($product_id) { // this method is called in front/index.blade.php
        // Get the product PRICE, DISCOUNT and CATEGORY ID
        $productDetails = \App\Models\Product::select('product_price', 'product_discount', 'category_id')->where('id', $product_id)->first();
        $productDetails = json_decode(json_encode($productDetails), true); // convert the object to an array    // The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36     AND     Check 22:30 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72

        // Get the product category discount `category_discount` from `categories` table using its `category_id` in `products` table
        $categoryDetails = \App\Models\Category::select('category_discount')->where('id', $productDetails['category_id'])->first();
        $categoryDetails = json_decode(json_encode($categoryDetails), true); // convert the object to an array    // The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36     AND     Check 22:30 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72

        
        if ($productDetails['product_discount'] > 0) { // if there's a 'product_discount' (in `products` table) (i.e. discount is not zero 0)
            // if there's a PRODUCT discount on the product itself
            $discounted_price = $productDetails['product_price'] - ($productDetails['product_price'] * $productDetails['product_discount'] / 100);
        } else if ($categoryDetails['category_discount'] > 0) { // if there's a `category_discount` (in `categories` table) (i.e. discount is not zero 0) (if there's a discount on the whole category of that product)
            // if there's NO a PRODUCT discount, but there's a CATEGORY discount
            $discounted_price = $productDetails['product_price'] - ($productDetails['product_price'] * $categoryDetails['category_discount'] / 100);
            // Note: Didn't ACCOUNT FOR presence of discounts of BOTH `product_discount` (in `products` table) AND `category_discount` (in `categories` table) AT THE SAME TIME!!
        } else { // there's no discount on neither `product_discount` (in `products` table) nor `category_discount` (in `categories` table)
            $discounted_price = 0;
        }


        return $discounted_price;
    }



    // Check 11:28 in https://www.youtube.com/watch?v=T6ZyTfYLKRU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=106
    public static function getDiscountAttributePrice($product_id, $size) { // this method is called (used) in front/products/detail.blade.php and cart_items.blade.php and in applyCoupon() method in Front/ProudctsController.php
        // Get that product attributes from `products_attributes` table which has that specific `product_id` and `size`
        $proAttrPrice = \App\Models\ProductsAttribute::where([ // from `products_attributes` table
            'product_id' => $product_id,
            'size'       => $size
        ])->first()->toArray();
        // echo '<pre>', var_dump($proAttrPrice), '</pre>';

        // Get the product DISCOUNT and CATEGORY ID of that product
        $proDetails = \App\Models\Product::select('product_discount', 'category_id')->where('id', $product_id)->first();
        $proDetails = json_decode(json_encode($proDetails), true); // convert the object to an array    // The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36     AND     Check 22:30 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72

        // Get the product category discount `category_discount` from `categories` table using its `category_id` in `products` table
        $catDetails = \App\Models\Category::select('category_discount')->where('id', $proDetails['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails), true); // convert the object to an array    // The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36     AND     Check 22:30 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72

        if ($proDetails['product_discount'] > 0) { // if there's a 'product_discount' (in `products` table) (i.e. discount is not zero 0)
            // if there's a PRODUCT discount on the product itself
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $proDetails['product_discount'] / 100);
            $discount = $proAttrPrice['price'] - $final_price; // the discount value = original price - price after discount
        } else if ($catDetails['category_discount'] > 0) { // if there's a `category_discount` (in `categories` table) (i.e. discount is not zero 0) (if there's a discount on the whole category of that product)
            // if there's NO a PRODUCT discount, but there's a CATEGORY discount
            $final_price = $proAttrPrice['price'] - ($proAttrPrice['price'] * $catDetails['category_discount'] / 100);
            $discount = $proAttrPrice['price'] - $final_price; // the discount value = original price - price after discount
        // Note: Didn't ACCOUNT FOR presence of discounts of BOTH `product_discount` (in `products` table) AND `category_discount` (in `categories` table) AT THE SAME TIME!!
        } else { // there's no discount on neither `product_discount` (in `products` table) nor `category_discount` (in `categories` table)
            $final_price = $proAttrPrice['price'];
            $discount = 0;
        }


        return array(
            'product_price' => $proAttrPrice['price'], // the original price of that `product_id` and `size` in `products_attributes` table
            'final_price'   => $final_price,           // the price of that `product_id` and `size` in `products_attributes` table after deducting the discount (of either `product_discount` (in `products` table) or `category_discount` (in `categories` table))
            'discount'      => $discount               // the value of the discount (if any)
        );
    }



    public static function isProductNew($product_id) { // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79
        // Get the last (latest) three 3 added products ids
        // $productIds = \App\Models\Product::select('id')->where('status', 1)->orderBy('id', 'Desc')->limit(3)->get()->toArray();
        $productIds = \App\Models\Product::select('id')->where('status', 1)->orderBy('id', 'Desc')->limit(3)->pluck('id');
        // dd($productIds);
        $productIds = json_decode(json_encode($productIds, true));
        // dd($productIds);

        if (in_array($product_id, $productIds)) { // if the passed in $product_id is in the array of the last (latest) 3 added products ids
            $isProductNew = 'Yes';
        } else {
            $isProductNew = 'No';
        }


        return $isProductNew;
    }

}
