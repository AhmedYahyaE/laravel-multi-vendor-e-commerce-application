<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    
    // A one section has many categories (One To Many): https://laravel.com/docs/9.x/eloquent-relationships#one-to-many
    public function categories() {
        return $this->hasMany('App\Models\Category', 'section_id')->where([ // 'section_id' is the foreign key in the `categories` table
            'parent_id' => 0, // 'Root' categories only (Parent categories only) (No subcategories)
            'status'    => 1
        ])->with('subCategories'); // Using the subCategories() relationship in the Category.php Model itself to get the 'subcategories' where `parent_id` is NOT 0 zero (utilizing another relationship in the same model inside a relationship)        
    }



    public static function sections() { // A STATIC function to use it in header.blade.php inside 'layout' folder inside 'front' folder    
        $getSections = Section::with('categories')->where('status', 1)->get()->toArray(); // Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
        return $getSections;
    }

}