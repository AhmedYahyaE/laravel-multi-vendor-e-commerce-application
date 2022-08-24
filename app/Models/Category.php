<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    // Multi-level categories (and subcategories) relationships
    // Every category belongs to a section: Check 7:33 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
    // The inverse of the relationship
    public function section() {
        return $this->belongsTo('App\Models\Section', 'section_id')->select('id', 'name'); // 'section_id' is the `categories` table foreign key to the `sections` table    // select('id', 'name') means select `id` and `name` coumns ONLY from the `sections` table for a better performance
    }

    public function parentCategory() { // This relationship brings the categories that the current category `parent_id` points to. (Example: If the current category with the `id` = 5, i.e. \App\Models\Category::find(5), and its `parent_id` = 4, the relationship brings the category with the `id` = 4) (Check the $getCategories in the CategoryController inside addEditCategory() method))    // Note: This is a relationship inside the same table `categories` (not between two different tables))    // A parent category has no parent category
        return $this->belongsTo('App\Models\Category', 'parent_id')->select('id', 'category_name'); // 'parent_id' is the `categories` table foreign key to the same table (the relationship between a category and its parent category inside the same table (`categories` table))    // select('id', 'category_name') means select `id` and `category_name` columns ONLY from the `sections` table for a better performance
    }



    public function subCategories() { // this method could be better named 'children'    // This relationship brings the categories that point to the current category (using their `parent_id`) (Example: If the current category with `id` = 4, i.e. \App\Models\Category::find(4), the relationship brings all the categories that their `parent_id` = 4)    // A one category can have many subcategories (this is a relationship inside the same table `categories` (not between two different tables))    // Check 14:47 in https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=41
        return $this->hasMany('App\Models\Category', 'parent_id')->where('status', 1);
    }
}