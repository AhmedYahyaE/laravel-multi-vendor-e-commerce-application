<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

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

    public function brand() { // Every product belongs to some brand    // this relationship method is used in Front/ProductsController.php    
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


    // Relationship of a Product `products` table with Vendor `vendors` table (every product belongs to a vendor)    
    public function vendor() {    
        return $this->belongsTo('App\Models\Vendor', 'vendor_id')->with('vendorbusinessdetails'); // 'vendor_id' is the Foreign Key of the Relationship    
    }



    // A static method (to be able to be called directly without instantiating an object in index.blade.php) to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout    
    public static function getDiscountPrice($product_id) { // this method is called in front/index.blade.php
        // Get the product PRICE, DISCOUNT and CATEGORY ID
        $productDetails = Product::select('product_price', 'product_discount', 'category_id')->where('id', $product_id)->first();
        $productDetails = json_decode(json_encode($productDetails), true); // convert the object to an array    

        // Get the product category discount `category_discount` from `categories` table using its `category_id` in `products` table
        $categoryDetails = Category::select('category_discount')->where('id', $productDetails['category_id'])->first();
        $categoryDetails = json_decode(json_encode($categoryDetails), true); // convert the object to an array    

        
        if ($productDetails['product_discount'] > 0) { // if there's a 'product_discount' (in `products` table) (i.e. discount is not zero 0)
            // if there's a PRODUCT discount on the product itself
            $discounted_price = $productDetails['product_price'] - ($productDetails['product_price'] * $productDetails['product_discount'] / 100);
        } else if ($categoryDetails['category_discount'] > 0) { // if there's a `category_discount` (in `categories` table) (i.e. discount is not zero 0) (if there's a discount on the whole category of that product)
            // if there's NO a PRODUCT discount, but there's a CATEGORY discount
            $discounted_price = $productDetails['product_price'] - ($productDetails['product_price'] * $categoryDetails['category_discount'] / 100);
        } else { // there's no discount on neither `product_discount` (in `products` table) nor `category_discount` (in `categories` table)
            $discounted_price = 0;
        }


        return $discounted_price;
    }


    
    public static function getDiscountAttributePrice($product_id, $size) { // this method is called (used) in front/products/detail.blade.php and cart_items.blade.php and in applyCoupon() method in Front/ProudctsController.php
        // Get that product attributes from `products_attributes` table which has that specific `product_id` and `size`
        $proAttrPrice = \App\Models\ProductsAttribute::where([ // from `products_attributes` table
            'product_id' => $product_id,
            'size'       => $size
        ])->first()->toArray();

        // Get the product DISCOUNT and CATEGORY ID of that product
        $proDetails = Product::select('product_discount', 'category_id')->where('id', $product_id)->first();
        $proDetails = json_decode(json_encode($proDetails), true); // convert the object to an array    

        // Get the product category discount `category_discount` from `categories` table using its `category_id` in `products` table
        $catDetails = Category::select('category_discount')->where('id', $proDetails['category_id'])->first();
        $catDetails = json_decode(json_encode($catDetails), true); // convert the object to an array    

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



    public static function isProductNew($product_id) { 
        // Get the last (latest) three 3 added products ids
        $productIds = Product::select('id')->where('status', 1)->orderBy('id', 'Desc')->limit(3)->pluck('id');
        $productIds = json_decode(json_encode($productIds, true));

        if (in_array($product_id, $productIds)) { // if the passed in $product_id is in the array of the last (latest) 3 added products ids
            $isProductNew = 'Yes';
        } else {
            $isProductNew = 'No';
        }


        return $isProductNew;
    }



    
    public static function getProductImage($product_id) { // this method is used in front/orders/order_details.blade.php
        $getProductImage = Product::select('product_image')->where('id', $product_id)->first()->toArray();


        return $getProductImage['product_image'];
    }

    
    // Note: We need to prevent orders (upon checkout and payment) of the 'disabled' products (`status` = 0), where the product ITSELF can be disabled in admin/products/products.blade.php (by checking the `products` database table) or a product's attribute (`stock`) can be disabled in 'admin/attributes/add_edit_attributes.blade.php' (by checking the `products_attributes` database table). We also prevent orders of the out of stock / sold-out products (by checking the `products_attributes` database table)
    public static function getProductStatus($product_id) {
        $getProductStatus = Product::select('status')->where('id', $product_id)->first();


        return $getProductStatus->status;
    }

    // Delete a product from Cart if it's 'disabled' (`status` = 0) or it's out of stock (sold out)    
    public static function deleteCartProduct($product_id) {
        Cart::where('product_id', $product_id)->delete();
    }

}