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

    public function addEditProduct(Request $request, $id = null) { // If the $id is not passed, this means 'Add a Product', if not, this means 'Edit the Product'    // https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        // \Session::put('page', 'products');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means 'Add a new product'
            $title = 'Add Product';
            $product = new \App\Models\Product();
            // dd($product);
            // $message = 'Product added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Product
            $title = 'Edit Product';
            // $product = \App\Models\Product::find($id);
            // dd($product);
            // $message = 'Product updated successfully!';
        }

        // if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
        //     $data = $request->all();
        //     // dd($data);

        //     // Laravel's Validation    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
        //     // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
        //     $rules = [
        //         'product_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
        //     ];
        //     $customMessages = [
        //         'product_name.required' => 'Product Name is required',
        //         'product_name.regex'    => 'Valid Product Name is required',
        //     ];
        //     $this->validate($request, $rules, $customMessages);

            
        //     // Saving inserted/updated data    // Inserting & Updating Models: https://laravel.com/docs/9.x/eloquent#inserts AND https://laravel.com/docs/9.x/eloquent#updates
        //     $product->name   = $data['product_name']; // WHETHER ADDING or UPDATING
        //     $product->status = 1;  // WHETHER ADDING or UPDATING
        //     $product->save();


        //     return redirect('admin/products')->with('success_message', $message);
        // }


        // Get Sections with Categories and Subcategories (Get all sections with its categories and subcategories)    // $categories are ALL the sections with their (parent) categories (if any (if exist)) and subcategories (if any (if exist))    // https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47
        // $categories = \App\Models\Section::find(1)->categories->toArray();
        $categories = \App\Models\Section::with('categories')->get()->toArray(); // with('categories') is the relationship method name in the Section.php Model
        // dd($categories);

        // Get all brands
        $brands = \App\Models\Brand::where('status', 1)->get()->toArray();
        // dd($brands);


        // return view('admin.products.add_edit_product')->with(compact('title', 'product'));
        return view('admin.products.add_edit_product')->with(compact('title', 'product', 'categories', 'brands'));
    }
}
