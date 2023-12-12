<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

use App\Models\Category;
use App\Models\Section;


class CategoryController extends Controller
{
    public function categories() {
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'categories');

        $categories = Category::with(['section', 'parentCategory'])->get()->toArray();
        // dd($categories);


        return view('admin.categories.categories')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request) { // Update Category Status using AJAX in categories.blade.php    
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            Category::where('id', $data['category_id'])->update(['status' => $status]); // $data['category_id'] comes from the 'data' object inside the $.ajax() method in admin/js/custom.js
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'      => $status,
                'category_id' => $data['category_id']
            ]);
        }
    }

    public function addEditCategory(Request $request, $id = null) { // If the $id is not passed, this means Add a Category, if not, this means Edit the Category    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'categories');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means Add a new Category
            $title = 'Add Category';
            $category = new Category();
            // dd($category);

            $getCategories = array(); // An array that contains all the parent categories that are under this section    

            $message = 'Category added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Category
            $title = 'Edit Category';
            $category = Category::find($id);
            // dd($category->parentCategory);

            $getCategories = Category::with('subCategories')->where([ // $getCategories are all the parent categories, and their child categories    
                // $getCategories is the parent categories (with no parents i.e. parent_id is 0 zero) but having the subCategories (the categories that they're parent to) at the same time
                'parent_id'  => 0, // parent_id is 0 zero BECAUSE IT'S A PARENT CATEGORY
                'section_id' => $category['section_id']
            ])->get();


            $message = 'Category updated successfully!';
        }


        if ($request->isMethod('post')) { // WHETHER Add or Update <form> submission!!
            $data = $request->all();
            // dd($data);


            // Laravel's Validation    // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    
            $rules = [
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                'section_id'    => 'required',
                'url'           => 'required',
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
                'category_name.required' => 'Category Name is required',
                'category_name.regex'    => 'Valid Category Name is required',
                'section_id.required'    => 'Section is required',
                'url.required'           => 'Category URL is required',
            ];

            $this->validate($request, $rules, $customMessages);


            if ($data['category_discount'] == '') {
                $data['category_discount'] = 0;
            }

            
            // Uploading Category Image    // Using the Intervention package for uploading images
            if ($request->hasFile('category_image')) { // the HTML name attribute    name="admin_name"    in update_admin_details.blade.php
                $image_tmp = $request->file('category_image'); // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
                if ($image_tmp->isValid()) {
                    // Get the image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a random name for the uploaded image (to avoid that the image might get overwritten if its name is repeated)
                    $imageName = rand(111, 99999) . '.' . $extension;

                    // Assigning the uploaded images path inside the 'public' folder
                    $imagePath = 'front/images/category_images/' . $imageName;

                    // Upload the image using the 'Intervention' package and save it in our path inside the 'public' folder
                    Image::make($image_tmp)->save($imagePath); // '\Image' is the Intervention package

                    // Insert the image name in the database table
                    $category->category_image = $imageName; 
                }

            } else { // In case the admins updates other fields but doesn't update the image itself (doesn't upload a new image), and originally there wasn't any image uploaded in the first place
                $category->category_image = ''; 
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

            $category->save(); // Save all data in the database

            return redirect('admin/categories')->with('success_message', $message);
        }


        // Get all sections
        $getSections = Section::get()->toArray();
        // dd($getSections);


        return view('admin.categories.add_edit_category')->with(compact('title', 'category', 'getSections', 'getCategories'));
    }

    public function appendCategoryLevel(Request $request) { // (AJAX) Show Categories <select> <option> depending on the chosen Section (show the relevant categories of the chosen section) using AJAX in admin/js/custom.js in append_categories_level.blade.php page    
        // Note: We created the <div> in a separate file in order for the appendCategoryLevel() method inside the CategoryController to be able to return the whole file as a response to the AJAX call in admin/js/custom.js to show the proper/relevant categories <select> box <option> depending on the selected (chosen) Section
        if ($request->ajax()) { // if the request is coming via an AJAX call
            // if ($request->isMethod('get')) {
                $data = $request->all();
                // dd($data);
                
                $getCategories = Category::with('subCategories')->where([ // 'subCategories' is the relationship method inside the Category.php model    // $getCategories are all the parent categories, and their child categories    
                    'parent_id'  => 0,
                    'section_id' => $data['section_id'] // $data['section_id'] comes from the 'data' object inside the $.ajax() method in admin/js/custom.js
                ])->get();
            // }
            
            return view('admin.categories.append_categories_level')->with(compact('getCategories')); // return-ing the WHOLE append_categories_level.blade.php page
        }
    }

    public function deleteCategory($id) { 
        Category::where('id', $id)->delete();
        
        $message = 'Category has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function deleteCategoryImage($id) { // AJAX call from admin/js/custom.js    // Delete the category image from BOTH SERVER (FILESYSTEM) & DATABASE    // $id is passed as a Route Parameter    
        // Category image record in the database
        $categoryImage = Category::select('category_image')->where('id', $id)->first();
        // dd($categoryImage);
        
        // Category image path on the server (filesystem)
        $category_image_path = 'front/images/category_images/';

        // Delete the category image on server (filesystem) (from the 'category_images' folder)
        if (file_exists($category_image_path . $categoryImage->category_image)) {
            unlink($category_image_path . $categoryImage->category_image);
        }

        // Delete the category image name from the `categories` database table (Note: We won't use delete() method because we're not deleting a complete record (entry) (we're just deleting a one column `category_image` value), we will just use update() method to update the `category_image` name to an empty string value '')
        Category::where('id', $id)->update(['category_image' => '']);

        $message = 'Category Image has been deleted successfully!';

        return redirect()->back()->with('success_message', $message);
    }
}
