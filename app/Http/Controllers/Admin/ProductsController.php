<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //

    // https://www.youtube.com/watch?v=hTP1Tk1018M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=45

    
    public function products() {
        // $products = \App\Models\Product::get()->toArray();
        // $products = \App\Models\Product::with(['section', 'category'])->get(); // ['section', 'category'] are the relationships methods names
        // $products = \App\Models\Product::with(['section', 'category'])->get()->toArray(); // ['section', 'category'] are the relationships methods names
        $products = \App\Models\Product::with(['section' => function($query) {
            $query->select('id', 'name');
        }, 'category' => function($query) {
            $query->select('id', 'category_name');
        }])->get()->toArray(); // Using subqueries with Eager Loading for a better performance (Check 9:40 in https://www.youtube.com/watch?v=iDpDS9vNswE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=46) AND Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // ['section', 'category'] are the relationships methods names
        // dd($products);

        return view('admin.products.products')->with(compact('products'));
    }
    
    public function updateProductStatus(Request $request) { // Update Product Status using AJAX in products.blade.php
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Product::where('id', $data['product_id'])->update(['status' => $status]); // $data['product_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([
                'status'     => $status,
                'product_id' => $data['product_id']
            ]);
        }
    }

    public function deleteProduct($id) {
        \App\Models\Product::where('id', $id)->delete(); // https://laravel.com/docs/9.x/queries#delete-statements
        
        $message = 'Product has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }
}
