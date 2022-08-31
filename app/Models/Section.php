<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    // https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47
    // A one section has many categories (One To Many): https://laravel.com/docs/9.x/eloquent-relationships#one-to-many
    public function categories() {
        return $this->hasMany('App\Models\Category', 'section_id')->where([ // 'section_id' is the foreign key in the `categories` table
            'parent_id' => 0, // 'Root' categories only (Parent categories only) (No subcategories)
            'status'    => 1
        ])->with('subCategories'); // Using the subCategories() relationship in the Category.php Model itself to get the 'subcategories' where `parent_id` is NOT 0 zero    // Check 17:00 in https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47
    }
}
