<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function categories() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'categories');



        // Note: The toArray() method problem with first() method is that toArray() doesn't work with first() if the table is empty and we're using first(). A solution is to use json_decode(json_encode(), true). Check 2:47 in https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        // $categories = \App\Models\Category::get()->toArray();
        $categories = \App\Models\Category::with(['section', 'parentCategory'])->get()->toArray(); // using with() method (we pass it an array of the two relationships methods names) to use the two relationships we created inside the Category.php Model: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading-multiple-relationships
        // dd($categories);


        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request) { // Update Category Status using AJAX in section.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Category::where('id', $data['category_id'])->update(['status' => $status]); // $data['category_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([
                'status'      => $status,
                'category_id' => $data['category_id']
            ]);
        }
    }
}
