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
        ])->with('subCategories'); // Using the subCategories() relationship in the Category.php Model itself to get the 'subcategories' where `parent_id` is NOT 0 zero (utilizing another relationship in the same model inside a relationship)    // Nested Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#nested-eager-loading     AND     Check https://www.youtube.com/watch?v=uu8CBDsWD7g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=109        // Check 17:00 in https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47
    }



    public static function sections() { // A STATIC function to use it in header.blade.php inside 'layout' folder inside 'front' folder    // https://www.youtube.com/watch?v=EVnpIehuQb8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=64
        $getSections = Section::with('categories')->where('status', 1)->get()->toArray(); // Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
        return $getSections;
    }
}
