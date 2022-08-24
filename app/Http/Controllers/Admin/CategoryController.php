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

    public function updateCategoryStatus(Request $request) { // Update Category Status using AJAX in categories.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        if ($request->ajax()) { // if the request is coming from an AJAX call
            $data = $request->all();
            // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            \App\Models\Category::where('id', $data['category_id'])->update(['status' => $status]); // $data['category_id'] comes from the 'data' object inside the $.ajax() method in custom.js
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([
                'status'      => $status,
                'category_id' => $data['category_id']
            ]);
        }
    }

    public function addEditCategory(Request $request, $id = null) { // If the $id is not passed, this means Add a Category, if not, this means Edit the Category    // https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=38
        // Correcting issues in the Skydash Admin Panel Sidebar using Session:  Check 6:33 in https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
        \Session::put('page', 'categories');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means Add a new Category
            $title = 'Add Category';
            $category = new \App\Models\Category();
            // dd($category);

            $getCategories = array(); // An array that contains all the parent categories that are under this section    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=40

            $message = 'Category added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Category
            $title = 'Edit Category';
            $category = \App\Models\Category::find($id);
            // dd($category->parentCategory);

            $getCategories = \App\Models\Category::with('subCategories')->where([ // 'subCategories' is the relationship method inside the Category.php model    // $getCategories are all the parent categories, and their child categories    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=40
            // $getCategories is the parent categories (with no parents i.e. parent_id is 0 zero) but having the subCategories (the categories that they're parent to) at the same time
                'parent_id'  => 0, // parent_id is 0 zero BECAUSE IT'S A PARENT CATEGORY
                'section_id' => $category['section_id']
            ])->get();
            // dd($getCategories);
            // foreach ($getCategories as $parentCategory) {
            //     echo '<pre>', var_dump($getCategories), '</pre>';
            //     echo '<pre>', var_dump($parentCategory), '</pre>';
            //     dd($parentCategory);
            //     dd($parentCategory['subCategories']);
            //     foreach ($parentCategory['subCategories'] as $subCategory) {
            //         dd($subCategory);
            //         dd($subCategory['category_name']);
            //     }
            // }


            // dd($category);
            // echo '<pre>', var_dump($category->connection), '</pre>';

            
            // $cats = \App\Models\Category::with('subCategories')->get()->toArray();
            // $cats = \App\Models\Category::with('subCategories')->where([
            //     'parent_id' => 0,
            //     'section_id' => $category['section_id']
            // ])->get()->toArray();
            // dd($cats);


            // dd($category->category_name); // is the same as    dd($category['category_name']);
            // dd($category['category_name']); // is the same as    dd($category->category_name);

            // dd($category->url); // is the same as    dd($category['url']);
            // dd($category['url']); // is the same as    dd($category->url);

            // dd($category::all());
            // dd($category::all()->toArray());
            // dd($category->toArray());

            $message = 'Category updated successfully!';
        }


        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);

            if ($data['category_discount'] == '') {
                $data['category_discount'] = 0;
            }

            
            // Uploading Category Image    // Check 5:08 in https://www.youtube.com/watch?v=dvVbp4poGfQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=19
            // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
            // Using the Intervention package for uploading images
            if ($request->hasFile('category_image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                $image_tmp = $request->file('category_image');
                if ($image_tmp->isValid()) {
                    // Get the image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a random name for the uploaded image
                    $imageName = rand(111, 99999) . '.' . $extension;

                    // Assigning the uploaded images path inside the 'public' folder
                    $imagePath = 'admin/front/images/category_images' . $imageName;

                    // Upload the image using the Intervention package and save it in our path inside the 'public' folder
                    \Image::make($image_tmp)->save($imagePath); // '\Image' is the Intervention package

                    $category->category_image = $imageName; // Check 31:58 in https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=39
                }
            } else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                $category->category_image = ''; // Check 31:58 in https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=39
            }


            $category->section_id        = $data['section_id'];
            $category->parent_id         = $data['parent_id'];
            $category->category_name     = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description       = $data['description'];
            $category->url               = $data['url'];
            $category->meta_title        = $data['meta_title'];
            $category->meta_description  = $data['meta_description'];
            $category->meta_keywords     = $data['meta_keywords'];
            $category->status            = 1;

            $category->save();

            return redirect('admin/categories')->with('success_message', $message);



            // Laravel's Validation    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            // $rules = [
            //     'category_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
            // ];
            // $customMessages = [
            //     'category_name.required' => 'Category Name is required',
            //     'category_name.regex'    => 'Valid Category Name is required',
            // ];
            // $this->validate($request, $rules, $customMessages);

            
            // // Saving inserted/updated data    // Inserting & Updating Models: https://laravel.com/docs/9.x/eloquent#inserts AND https://laravel.com/docs/9.x/eloquent#updates
            // $category->name   = $data['category_name']; // WHETHER ADDING or UPDATING
            // $category->status = 1;  // WHETHER ADDING or UPDATING
            // $category->save();


            // return redirect('admin/categories')->with('success_message', $message);
        }


        // Get all sections
        $getSections = \App\Models\Section::get()->toArray();
        // dd($getSections);


        return view('admin.categories.add_edit_category')->with(compact('title', 'category', 'getSections', 'getCategories'));
    }

    public function appendCategoryLevel(Request $request) { // Show Categories <select> <option> depending on the choosed Section (show the relevant categories of the choosed section) using AJAX in custom.js in append_categories_level.blade.php page    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
        // Note: We created the <div> in a separate file in order for the appendCategoryLevel() method inside the CategoryController to be able to return the whole file as a response to the AJAX call in custom.js to show the proper/relevant categories <select> box <option> depending on the choosed Section
        if ($request->ajax()) { // if the request is coming from an AJAX call
            // if ($request->isMethod('get')) {
                $data = $request->all();
                // dd($data); // THIS DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() INSTEAD!
                // echo '<pre>', var_dump($data), '</pre>';
                
                $getCategories = \App\Models\Category::with('subCategories')->where([ // 'subCategories' is the relationship method inside the Category.php model    // $getCategories are all the parent categories, and their child categories    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=40
                    'parent_id'  => 0,
                    'section_id' => $data['section_id'] // $data['section_id'] comes from the 'data' object inside the $.ajax() method in custom.js
                ])->get();
            // }
            
            return view('admin.categories.append_categories_level')->with(compact('getCategories')); // returning the WHOLE append_categories_level.blade.php page
        }
    }
}
