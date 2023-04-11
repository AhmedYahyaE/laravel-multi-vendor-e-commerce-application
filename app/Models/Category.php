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



    // Multi-level categories (and subcategories (children)) relationships
    public function parentCategory() { // This relationship brings the categories that the current category `parent_id` points to. (Example: If the current category with the `id` = 5, i.e. \App\Models\Category::find(5), and its `parent_id` = 4, the relationship brings the category with the `id` = 4) (Check the $getCategories in the CategoryController inside addEditCategory() method))    // Note: This is a relationship inside the same table `categories` (not between two different tables))    // A parent category has no parent category
        return $this->belongsTo('App\Models\Category', 'parent_id')->select('id', 'category_name'); // 'parent_id' is the `categories` table foreign key to the same table (the relationship between a category and its parent category inside the same table (`categories` table))    // select('id', 'category_name') means select `id` and `category_name` columns ONLY from the `sections` table for a better performance
    }
    public function subCategories() { // this method could be better named 'children'    // This relationship brings the categories that point to the current category (using their `parent_id`) (Example: If the current category with `id` = 4, i.e. \App\Models\Category::find(4), the relationship brings all the categories that their `parent_id` = 4)    // A one category can have many subcategories (this is a relationship inside the same table `categories` (not between two different tables))    // Check 14:47 in https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=41
        return $this->hasMany('App\Models\Category', 'parent_id')->where('status', 1);
    }



    // Get the parent category & its subcategories (child categories) of a URL
    public static function categoryDetails($url) { // this method is used inside ProductsController.php to be used in listing.blade.php page    // Note: if the URL is a 'category', we need to fetch its related products as well as its subcategories related products, but if the url is a subcategory, we need to fetch the subcategory related products only    // Check 24:00 in https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76
        $categoryDetails = \App\Models\Category::select('id', 'parent_id', 'category_name', 'url', 'description')->with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
            'subCategories' => function($query) { // the 'subCategories' relationship method in Category.php model (this model)
                $query->select('id', 'parent_id', 'category_name', 'url'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
            }
        ])->where('url', $url)->first()->toArray(); // using the relationship subCategories() method with with() method    // Get the parent category and its subcategories
        // dd($categoryDetails);
        // dd($categoryDetails['subCategories']); // Doesn't work!
        // dd($categoryDetails['sub_categories']); // Works!

        $catIds = array(); // this array will contain both the parent category ids and its subcategories (child categories) ids too
        $catIds[] = $categoryDetails['id']; // add/append the PARENT category id to the $catIds array



        // Category Breadcrumb in listing.blade.php: There're two Breadrumbs: category Breadcrumb and subcategory Breadcrumb    // Check 14:37 in https://www.youtube.com/watch?v=8kf1WDELK6o&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=77
        if ($categoryDetails['parent_id'] == 0) { // if the category is PARENT category (not SUBcategory)
            // Show main category only in the Breadcrumb
            $breadcrumbs = '
                <li class="is-marked"><a href="' . url($categoryDetails['url']) .'">' . $categoryDetails['category_name'] .'</a></li>
            ';
        } else { // if the category is SUBcategory category (not PARENT category)
            // Show BOTH main (parent) category AND subcategory in the Breadcrumb
            $parentCategory = \App\Models\Category::select('category_name', 'url')->where('id', $categoryDetails['parent_id'])->first()->toArray();
            $breadcrumbs = '
                <li class="has-separator"><a href="' . url($parentCategory['url'])  .'">' . $parentCategory['category_name']  . '</a></li>
                <li class="is-marked"><a href="'     . url($categoryDetails['url']) .'">' . $categoryDetails['category_name'] . '</a></li>
            ';
        }



        // dd($categoryDetails);
        foreach ($categoryDetails['sub_categories'] as $key => $subcat) { // Get the SUBCATEGORIES ids of the PARENT category
            // echo '<pre>', var_dump($subcat), '</pre>';
            // dd($subcat);
            $catIds[] = $subcat['id']; // add the $subcategories ids of the parent category to the $catIds array
        }

        // dd($catIds);

        $resp = array(
            'catIds'          => $catIds, // the parent category id and its subcategories (child categories), if any, of a certain URL
            'categoryDetails' => $categoryDetails, // the category details of a certain URL
            'breadcrumbs'     => $breadcrumbs
        );


        return $resp;
    }



    // this method is called in admin\filters\filters.blade.php to be able to translate the filter cat_ids column to category names to show them in the table in filters.blade.php in the Admin Panel    // Check 21:30 in https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
    public static function getCategoryName($category_id) {
        $getCategoryName = \App\Models\Category::select('category_name')->where('id', $category_id)->first();
        // dd($getCategoryName);


        return $getCategoryName->category_name;
    }

    // Note: We also prevent making orders of the products of the Categories that are disabled (`status` = 0) (whether the Category is a Child Category or a Parent Category (Root Category) is disabled) in admin/categories/categories.blade.php. Check https://www.youtube.com/watch?v=tfkA9ATahiA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=195
    public static function getCategoryStatus($category_id) {
        $getCategoryStatus = Category::select('status')->where('id', $category_id)->first();


        return $getCategoryStatus->status;
    }

}