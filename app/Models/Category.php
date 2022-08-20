<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    // Every category belongs to a section: Check 7:33 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
    // The inverse of the relationship
    public function section() {
        return $this->belongsTo('App\Models\Section', 'section_id')->select('id', 'name'); // 'section_id' is the `categories` table foreign key to the `sections` table    // select('id', 'name') means select `id` and `name` coumns ONLY from the `sections` table for a better performance
    }

    public function parentCategory() { // A parent category inside the same `categories` table
        return $this->belongsTo('App\Models\Category', 'parent_id')->select('id', 'category_name'); // 'parent_id' is the `categories` table foreign key to the same table (the relationship between a category and its parent category inside the same table (`categories` table))    // select('id', 'category_name') means select `id` and `category_name` columns ONLY from the `sections` table for a better performance
    }
}
