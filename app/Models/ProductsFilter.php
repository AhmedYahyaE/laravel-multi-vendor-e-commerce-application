<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsFilter extends Model
{
    use HasFactory;



    // this method is called in admin\filters\filters_values.blade.php to be able to translate the `filter_id` column to filter names to show them in the table in filters_values.blade.php in the Admin Panel    // Check 26:11 in https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
    public static function getFilterName($filter_id) {
        $getFilterName = \App\Models\ProductsFilter::select('filter_name')->where('id', $filter_id)->first();
        // dd($getFilterName);


        return $getFilterName->filter_name;
    }



    // Every Product Dynamic Filter has many Product Filter Values (hasMany) (A 'RAM' product dynamic filter has many values like: 4GB, 6GB, 8GB, ...)    // https://www.youtube.com/watch?v=Rr2tkfVtVMc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=86
    public function filter_values() {
        return $this->hasMany('App\Models\ProductsFiltersValue', 'filter_id'); // 'filter_id' is the foreign key
    }



    // Get all the (enabled/active) Filters
    public static function productFilters() { // https://www.youtube.com/watch?v=Rr2tkfVtVMc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=86
        $productFilters = \App\Models\ProductsFilter::with('filter_values')->where('status', 1)->get()->toArray(); // with('filter_values') is the relationship method name to get the values of a filter
        // dd($productFilters);

        return $productFilters;
    }



    // Check if a specific filter has a said category    // Get the category related filters (to be able to get a some category filters to view them in filters.blade.php)    // https://www.youtube.com/watch?v=Rr2tkfVtVMc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=86
    public static function filterAvailable($filter_id, $category_id) {
        $filterAvailable = \App\Models\ProductsFilter::select('cat_ids')->where([
            'id'     => $filter_id,
            'status' => 1
        ])->first()->toArray();

        $catIdsArray = explode(',', $filterAvailable['cat_ids']); // convert the string `cat_ids` column of the `products_filters` database table to an array


        if (in_array($category_id, $catIdsArray)) {
            $available = 'Yes';
        } else {
            $available = 'No';
        }


        return $available;
    }
}
