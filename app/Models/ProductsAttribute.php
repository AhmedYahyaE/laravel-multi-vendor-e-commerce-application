<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsAttribute extends Model
{
    use HasFactory;



    // https://www.youtube.com/watch?v=qMa1g05oX74&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=117
    public static function getProductStock($product_id, $size) { // Get the `stock` available for that specific product (`product_id`) with that specific size (`size`) (in `products_attributes` table)?
        $getProductStock = ProductsAttribute::select('stock')->where([
            'product_id' => $product_id,
            'size'       => $size
        ])->first();


        return $getProductStock->stock;
    }


}
