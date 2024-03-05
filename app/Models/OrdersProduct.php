<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
    use HasFactory;

    public function product_category() {
        return $this->hasOneThrough('\App\Models\Category', '\App\Models\Product', 'id', 'id');
    }
}
