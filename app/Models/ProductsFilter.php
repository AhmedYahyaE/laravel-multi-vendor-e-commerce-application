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
}
