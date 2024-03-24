<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    use HasFactory;

    protected $table = 'orders_products';

    public function product_category() {
        return $this->hasOneThrough('\App\Models\Category', '\App\Models\Product', 'id', 'id');
    }

    public static function hasUserOrderedThisProduct($user_id, $product_id) {
        return OrdersProduct::select('id')
            ->where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->where('item_status', 'Delivered')
            ->get()->count() > 0 ? true:false;
    }
}
