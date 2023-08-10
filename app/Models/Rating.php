<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;



    // Relationship of a Rating `ratings` table with User `users` table (every rating belongs to a user)    
    public function user() { // A Rating `ratings` belongs to a User `users`, and the Foreign Key of the Relationship is the `user_id` column in `ratings` table
        return $this->belongsTo('App\Models\User', 'user_id'); // 'user_id' is the Foreign Key of the Relationship
    }

    // Relationship of a Rating `ratings` table with Product `products` table (every rating belongs to a product)    
    public function product() { // A Rating `ratings` belongs to a Product `products`, and the Foreign Key of the Relationship is the `product_id` column in `ratings` table
        return $this->belongsTo('App\Models\Product', 'product_id'); // 'product_id' is the Foreign Key of the Relationship
    }

}