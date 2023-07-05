<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    // https://www.youtube.com/watch?v=xYDsEiQBXzk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=225



    // Relationship of a Rating `ratings` table with User `users` table (every rating belongs to a user)    // https://www.youtube.com/watch?v=xYDsEiQBXzk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=225
    public function user() { // user() is in the SINGULAR!    // A Rating `ratings` belongs to a User `users`, and the Foreign Key of the Relationship is the `user_id` column in `ratings` table
        return $this->belongsTo('App\Models\User', 'user_id'); // 'user_id' is the Foreign Key of the Relationship
    }

    // Relationship of a Rating `ratings` table with Product `products` table (every rating belongs to a product)    // https://www.youtube.com/watch?v=xYDsEiQBXzk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=225
    public function product() { // product() is in the SINGULAR!    // A Rating `ratings` belongs to a Product `products`, and the Foreign Key of the Relationship is the `product_id` column in `ratings` table
        return $this->belongsTo('App\Models\Product', 'product_id'); // 'product_id' is the Foreign Key of the Relationship
    }

}
