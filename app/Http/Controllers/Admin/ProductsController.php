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
            $message = 'Product added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Product
            $title = 'Edit Product';
            // $product = \App\Models\Product::find($id);
            // dd($product);
            // $message = 'Product updated successfully!';
        }

        if ($request->isMethod('post')) { // WHETHER 'Add a Product' or 'Update a Product' <form> is submitted (THE SAME <form>)!!
            $data = $request->all();
            // dd($data);
            // dd($product->is_featured);

            // Laravel's Validation    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules    // Check 14:49 in https://www.youtube.com/watch?v=ydubcZC3Hbw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=18
            $rules = [
                'category_id'   => 'required',
                'product_name'  => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
                'product_code'  => 'required|regex:/^\w+$/', // Alphanumeric regular expression
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
            ];
            $customMessages = [
                'category_id.required'   => 'Category is required',
                'product_name.required'  => 'Product Name is required',
                'product_name.regex'     => 'Valid Product Name is required',
                'product_code.required'  => 'Product Code is required',
                'product_code.regex'     => 'Valid Product Code is required',
                'product_price.required' => 'Product Price is required',
                'product_price.numeric'  => 'Valid Product Price is required',
                'product_color.required' => 'Product Color is required',
                'product_color.regex'    => 'Valid Product Color is required',

            ];
            $this->validate($request, $rules, $customMessages);

            // Upload Product Image after Resize
            // Important Note: There are going to be 3 three sizes for the product image: Admin will upload the image with the recommended size which 1000*1000 which is the 'large' size, but then we're going to use 'Intervention' package to get another two sizes: 500*500 which is the 'medium' size and 250*250 which is the 'small' size
            // The 3 three image sizes: large: 1000x1000, medium: 500x500, small: 250x250
            if ($request->hasFile('product_image')) { // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
                $image_tmp = $request->file('product_image');
                if ($image_tmp->isValid()) { // Validating Successful Uploads: https://laravel.com/docs/9.x/requests#validating-successful-uploads
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    // Generate a new random name for the uploaded image (to avoid that the image might get overwritten if its name is repeated)
                    $imageName = rand(111, 99999) . '.' . $extension; // e.g. 5954.png

                    // Assigning the uploaded images path inside the 'public' folder
                    // We will have three folders: small, medium and large, depending on the images sizes
                    $largeImagePath  = 'front/images/product_images/large/'  . $imageName; // 'large'  images folder
                    $mediumImagePath = 'front/images/product_images/medium/' . $imageName; // 'medium' images folder
                    $smallImagePath  = 'front/images/product_images/small/'  . $imageName; // 'small'  images folder

                    // Upload the image using the 'Intervention' package and save it in our THREE paths (folders) inside the 'public' folder
                    \Image::make($image_tmp)->resize(1000, 1000)->save($largeImagePath);  // resize the 'large'  image size then store it in the 'large'  folder
                    \Image::make($image_tmp)->resize(500,   500)->save($mediumImagePath); // resize the 'medium' image size then store it in the 'medium' folder
                    \Image::make($image_tmp)->resize(250,   250)->save($smallImagePath);  // resize the 'small'  image size then store it in the 'small'  folder
                
                    // Insert the image name in the database table
                    $product->product_image = $imageName;
                }
            }


            // Upload Product Video
            if ($request->hasFile('product_video')) { // Retrieving Uploaded Files: https://laravel.com/docs/9.x/requests#retrieving-uploaded-files
                $video_tmp = $request->file('product_video');

                if ($video_tmp->isValid()) { // Validating Successful Uploads: https://laravel.com/docs/9.x/requests#validating-successful-uploads
                    // Upload video
                    // $video_name = $video_tmp->getClientOriginalName();
                    $extension  = $video_tmp->getClientOriginalExtension();
                    
                    // Generate a new random name for the uploaded video (to avoid that the video might get overwritten if its name is repeated)
                    // $videoName = $video_name . '-' . rand() . '.' . $extension; // e.g.    shirtVideo-75935.mp4
                    $videoName = rand() . '.' . $extension; // e.g.    75935.mp4

                    // Assigning the uploaded videos path inside the 'public' folder
                    $videoPath = 'front/videos/product_videos/';

                    // Move the video from the temporary path (which is assigned by the web server) to our assigned path inside the 'public' folder    // Copying & Moving Files: https://laravel.com/docs/9.x/filesystem#copying-moving-files
                    $video_tmp->move($videoPath, $videoName);

                    // Insert the video name in the database table
                    $product->product_video = $videoName;
                }
            }


            // Saving BOTH inserted ('Add a product' <form>) AND updated ('Update a Product' <form>) data in `products` database table    // Inserting & Updating Models: https://laravel.com/docs/9.x/eloquent#inserts AND https://laravel.com/docs/9.x/eloquent#updates
            $categoryDetails = \App\Models\Category::find($data['category_id']); // Get the section from the submitted category
            // dd($categoryDetails);

            $product->section_id  = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id    = $data['brand_id'];
            // $adminType = \Auth::guard('admin')->user();
            $adminType = \Auth::guard('admin')->user()->type; // Get the `type` column value of the `admins` table through Retrieving The Authenticated User (the logged in user) using the 'admin' guard which we defined in auth.php page: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            // dd($adminType);
            $vendor_id = \Auth::guard('admin')->user()->vendor_id; // Get the `vendor_id` column value of the `admins` table through Retrieving The Authenticated User (the logged in user) using the 'admin' guard which we defined in auth.php page: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            $admin_id  = \Auth::guard('admin')->user()->id; // Get the `id` column value of the `admins` table through Retrieving The Authenticated User (the logged in user) using the 'admin' guard which we defined in auth.php page: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            
            $product->admin_type = $adminType;
            if ($adminType == 'vendor') {
                $product->vendor_id  = $vendor_id;
            } else {
                $product->vendor_id = 0;
            }
            $product->admin_id   = $admin_id;

            $product->product_name     = $data['product_name'];
            $product->product_code     = $data['product_code'];
            $product->product_color    = $data['product_color'];
            $product->product_price    = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight   = $data['product_weight'];
            $product->description      = $data['description'];
            $product->meta_title       = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keywords    = $data['meta_keywords'];
            

            // dd($product->is_featured);

            if (!empty($product->is_featured)) {
                // dd($data);
                $product->is_featured = $data['is_featured'];
            } else {
                // dd($data);
                $product->is_featured = 'No';
            }

            $product->status = 1;

            $product->save(); // Save all data in the database

            return redirect('admin/products')->with('success_message', $message);
        }


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
