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

    // Every product has many attributes
    public function attributes() {
        return $this->hasMany('App\Models\ProductsAttribute');
    }

    // Every product has many images
    public function images() {
        return $this->hasMany('App\Models\ProductsImage');
    }
}
