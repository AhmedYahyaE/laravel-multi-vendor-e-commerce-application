<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

use App\Models\Product;
use App\Models\ProductsImage;
use App\Models\ProductsFilter;
use App\Models\ProductsAttribute;


class ProductsController extends Controller
{
    public function products() { // render products.blade.php in the Admin Panel
        Session::put('page', 'products');


        // Modify the last $products variable so that ONLY products that BELONG TO the 'vendor' show up in (not ALL products show up) in products.blade.php, and also make sure that the 'vendor' account is active/enabled/approved (`status` is 1) before they can access the products page    
        $adminType = Auth::guard('admin')->user()->type;      // `type`      is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `type`      column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        $vendor_id = Auth::guard('admin')->user()->vendor_id; // `vendor_id` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `vendor_id` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
        
        if ($adminType == 'vendor') { // if the authenticated user (the logged in user) is 'vendor', check his `status`
            $vendorStatus = Auth::guard('admin')->user()->status; // `status` is the column in `admins` table    // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Retrieving The Authenticated User and getting their `status` column in `admins` table    // https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            if ($vendorStatus == 0) { // if the 'vendor' is inactive/disabled
                return redirect('admin/update-vendor-details/personal')->with('error_message', 'Your Vendor Account is not approved yet. Please make sure to fill your valid personal, business and bank details.'); // the error_message will appear to the vendor in the route: 'admin/update-vendor-details/personal' which is the update_vendor_details.blade.php page
            }
        }

        // Get ALL products ($products)
        $products = Product::with([ // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries
            'section' => function($query) { // the 'section' relationship method in Product.php Model
                $query->select('id', 'name'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
            },
            'category' => function($query) { // the 'category' relationship method in Product.php Model
                $query->select('id', 'category_name'); // Important Note: It's a MUST to select 'id' even if you don't need it, because the relationship Foreign Key `product_id` depends on it, or else the `product` relationship would give you 'null'!
            }
        ]);

        // if the authenticated user (the logged in user) is 'vendor', show ONLY the products that BELONG TO them (in products.blade.php) ($products)
        if ($adminType == 'vendor') {
            $produtcs = $products->where('vendor_id', $vendor_id);
        }

        $products = $products->get()->toArray(); // $products will be either ALL products Or VENDOR products ONLY (depending on the last if condition)    // Using subqueries with Eager Loading for a better performance    // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // ['section', 'category'] are the relationships methods names
        // dd($products);


        return view('admin.products.products')->with(compact('products')); // render products.blade.php page, and pass $products variable to the view
    }
    
    public function updateProductStatus(Request $request) { // Update Product Status using AJAX in products.blade.php
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            Product::where('id', $data['product_id'])->update(['status' => $status]); // $data['product_id'] comes from the 'data' object inside the $.ajax() method
            // echo '<pre>', var_dump($data), '</pre>';

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'     => $status,
                'product_id' => $data['product_id']
            ]);
        }
    }

    public function deleteProduct($id) {
        Product::where('id', $id)->delete();
        
        $message = 'Product has been deleted successfully!';
        
        return redirect()->back()->with('success_message', $message);
    }

    public function addEditProduct(Request $request, $id = null) { // If the $id is not passed, this means 'Add a Product', if not, this means 'Edit the Product'    
        // Correcting issues in the Skydash Admin Panel Sidebar using Session
        Session::put('page', 'products');


        if ($id == '') { // if there's no $id is passed in the route/URL parameters, this means 'Add a new product'
            $title = 'Add Product';
            $product = new \App\Models\Product();
            // dd($product);
            $message = 'Product added successfully!';
        } else { // if the $id is passed in the route/URL parameters, this means Edit the Product
            $title = 'Edit Product';
            $product = Product::find($id);
            // dd($product);
            $message = 'Product updated successfully!';
        }

        if ($request->isMethod('post')) { // WHETHER 'Add a Product' or 'Update a Product' <form> is submitted (THE SAME <form>)!!
            $data = $request->all();
            // dd($data);


            // Laravel's Validation    // Customizing Laravel's Validation Error Messages: https://laravel.com/docs/9.x/validation#customizing-the-error-messages    // Customizing Validation Rules: https://laravel.com/docs/9.x/validation#custom-validation-rules
            $rules = [
                'category_id'   => 'required',
                'product_name'  => 'required', // only alphabetical characters and spaces
                'product_code'  => 'required|regex:/^\w+$/', // alphanumeric regular expression
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s\-]+$/u', // only alphabetical characters and spaces
            ];

            $customMessages = [ // Specifying A Custom Message For A Given Attribute: https://laravel.com/docs/9.x/validation#specifying-a-custom-message-for-a-given-attribute
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
            if ($request->hasFile('product_image')) {
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
                    Image::make($image_tmp)->resize(1000, 1000)->save($largeImagePath);  // resize the 'large'  image size then store it in the 'large'  folder
                    Image::make($image_tmp)->resize(500,   500)->save($mediumImagePath); // resize the 'medium' image size then store it in the 'medium' folder
                    Image::make($image_tmp)->resize(250,   250)->save($smallImagePath);  // resize the 'small'  image size then store it in the 'small'  folder
                
                    // Insert the image name in the database table
                    $product->product_image = $imageName;
                }
            }


            // Upload Product Video
            // Important Note: Default php.ini file upload Maximum file size is 2MB (If you upload a file with a larger size, it won't be uploaded!). Check upload_max_filesize using phpinfo() method.
            if ($request->hasFile('product_video')) {
                $video_tmp = $request->file('product_video');

                if ($video_tmp->isValid()) { // Validating Successful Uploads: https://laravel.com/docs/9.x/requests#validating-successful-uploads
                    // Upload video
                    $extension  = $video_tmp->getClientOriginalExtension();
                    
                    // Generate a new random name for the uploaded video (to avoid that the video might get overwritten if its name is repeated)
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
            $product->group_code  = $data['group_code']; // Managing Product Colors (in front/products/detail.blade.php)

            
            // Saving the seleted filter for a product
            $productFilters = ProductsFilter::productFilters(); // Get ALL the (enabled/active) Filters
            foreach ($productFilters as $filter) { // get ALL the filters, then check if every filter's `filter_column` is submitted by the category_filters.blade.php page
                // dd($filter);

                // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category_id exists in the filter cat_ids, then show the filter, if not, then don't show the filter
                $filterAvailable = ProductsFilter::filterAvailable($filter['id'], $data['category_id']);
                if ($filterAvailable == 'Yes') {
                    if (isset($filter['filter_column']) && $data[$filter['filter_column']]) { // check if every filter's `filter_column` is submitted by the category_filters.blade.php page
                        // Save the product filter in the `products` table
                        $product->{$filter['filter_column']} = $data[$filter['filter_column']]; // i.e. $product->filter_column = filter_value    // $data[$filter['filter_column']]    is like    $data['screen_size']    which is equal to the filter value e.g.    $data['screen_size'] = 5 to 5.4 in    // $data comes from the <select> box in category_filters.blade.php
                    }
                }
            }


            if ($id == '') { // if a NEW product is added by an 'admin' or 'vendor', assign those new values. Otherwise, when Edit/Update an already existing product, leave everything as is
                // $adminType = Auth::guard('admin')->user(); // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances
                $adminType = Auth::guard('admin')->user()->type; // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Get the `type` column value of the `admins` table through Retrieving The Authenticated User (the logged in user) using the 'admin' guard which we defined in auth.php page: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                // dd($adminType);
                $vendor_id = Auth::guard('admin')->user()->vendor_id; // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Get the `vendor_id` column value of the `admins` table through Retrieving The Authenticated User (the logged in user) using the 'admin' guard which we defined in auth.php page: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                $admin_id  = Auth::guard('admin')->user()->id; // Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances    // Get the `id` column value of the `admins` table through Retrieving The Authenticated User (the logged in user) using the 'admin' guard which we defined in auth.php page: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

                $product->admin_type = $adminType;
                $product->admin_id   = $admin_id;

                if ($adminType == 'vendor') {
                    $product->vendor_id  = $vendor_id;
                } else {
                    $product->vendor_id = 0;
                }
            }


            if (empty($data['product_discount'])) {
                $data['product_discount'] = 0;
            }

            if (empty($data['product_weight'])) {
                $data['product_weight'] = 0;
            }


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



            if (!empty($data['is_featured'])) {
                // dd($data);
                $product->is_featured = $data['is_featured'];
            } else {
                // dd($data);
                $product->is_featured = 'No';
            }


            if (!empty($data['is_bestseller'])) {
                // dd($data);
                $product->is_bestseller = $data['is_bestseller'];
            } else {
                // dd($data);
                $product->is_bestseller = 'No';
            }


            $product->status = 1;


            $product->save(); // Save all data in the database

            return redirect('admin/products')->with('success_message', $message);
        }


        // Get ALL the Sections with their Categories and Subcategories (Get all sections with its categories and subcategories)    // $categories are ALL the `sections` with their (parent) categories (if any (if exist)) and subcategories (if any (if exist))    
        $categories = \App\Models\Section::with('categories')->get()->toArray(); // with('categories') is the relationship method name in the Section.php Model
        // dd($categories);

        // Get all brands
        $brands = \App\Models\Brand::where('status', 1)->get()->toArray();
        // dd($brands);


        // return view('admin.products.add_edit_product')->with(compact('title', 'product'));
        return view('admin.products.add_edit_product')->with(compact('title', 'product', 'categories', 'brands'));
    }

    public function deleteProductImage($id) { // AJAX call from admin/js/custom.js    // Delete the product image from BOTH SERVER (FILESYSTEM) & DATABASE    // $id is passed as a Route Parameter    
        // Get the product image record stored in the database
        $productImage = Product::select('product_image')->where('id', $id)->first();
        // dd($productImage);
        
        // Get the product image three paths on the server (filesystem) ('small', 'medium' and 'large' folders)
        $small_image_path  = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path  = 'front/images/product_images/large/';

        // Delete the product physical actual images on server (filesystem) (from the the THREE folders)
        // First: Delete from the 'small' folder
        if (file_exists($small_image_path . $productImage->product_image)) {
            unlink($small_image_path . $productImage->product_image);
        }

        // Second: Delete from the 'medium' folder
        if (file_exists($medium_image_path . $productImage->product_image)) {
            unlink($medium_image_path . $productImage->product_image);
        }

        // Third: Delete from the 'large' folder
        if (file_exists($large_image_path . $productImage->product_image)) {
            unlink($large_image_path . $productImage->product_image);
        }


        // Delete the product image name (record) from the `products` database table (Note: We won't use delete() method because we're not deleting a complete record (entry) (we're just deleting a one column `product_image` value), we will just use update() method to update the `product_image` name to an empty string value '')
        Product::where('id', $id)->update(['product_image' => '']);

        $message = 'Product Image has been deleted successfully!';


        return redirect()->back()->with('success_message', $message);
    }

    public function deleteProductVideo($id) { // AJAX call from admin/js/custom.js    // Delete the product video from BOTH SERVER (FILESYSTEM) & DATABASE    // $id is passed as a Route Parameter    
        // Get the product video record stored in the database
        $productVideo = Product::select('product_video')->where('id', $id)->first();
        // dd($productVideo);
        
        // Get the product video path on the server (filesystem)
        $product_video_path = 'front/videos/product_videos/';

        // Delete the product videos on server (filesystem) (from the the 'product_videos' folder)
        if (file_exists($product_video_path . $productVideo->product_video)) {
            unlink($product_video_path . $productVideo->product_video);
        }

        // Delete the product video name (record) from the `products` database table (Note: We won't use delete() method because we're not deleting a complete record (entry) (we're just deleting a one column `product_video` value), we will just use update() method to update the `product_video` name to an empty string value '')
        Product::where('id', $id)->update(['product_video' => '']);

        $message = 'Product Video has been deleted successfully!';

        return redirect()->back()->with('success_message', $message);
    }

    public function addAttributes(Request $request, $id) { // Add/Edit Attributes function    
        Session::put('page', 'products');

        $product = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'product_image')->with('attributes')->find($id); // with('attributes') is the relationship method name in the Product.php model

        if ($request->isMethod('post')) { // When the <form> is submitted
            $data = $request->all();
            // dd($data);

            foreach ($data['sku'] as $key => $value) { // or instead could be: $data['size'], $data['price'] or $data['stock']
                // echo '<pre>', var_dump($key), '</pre>';
                // echo '<pre>', var_dump($value), '</pre>';
                
                if (!empty($value)) {
                    // Validation:
                    // SKU duplicate check (Prevent duplicate SKU) because SKU is UNIQUE for every product
                    $skuCount = ProductsAttribute::where('sku', $value)->count();
                    if ($skuCount > 0) { // if there's an SKU for the product ALREADY EXISTING
                        return redirect()->back()->with('error_message', 'SKU already exists! Please add another SKU!');
                    }

                    // Size duplicate check (Prevent duplicate Size) because Size is UNIQUE for every product
                    $sizeCount = ProductsAttribute::where(['product_id' => $id, 'size' => $data['size'][$key]])->count();
                    if ($sizeCount > 0) { // if there's an SKU for the product ALREADY EXISTING
                        return redirect()->back()->with('error_message', 'Size already exists! Please add another Size!');
                    }


                    $attribute = new ProductsAttribute;

                    $attribute->product_id = $id; // $id is passed in up there to the addAttributes() method
                    $attribute->sku        = $value;
                    $attribute->size       = $data['size'][$key];  // $key denotes the iteration/loop cycle number (0, 1, 2, ...), e.g. $data['size'][0]
                    $attribute->price      = $data['price'][$key]; // $key denotes the iteration/loop cycle number (0, 1, 2, ...), e.g. $data['price'][0]
                    $attribute->stock      = $data['stock'][$key]; // $key denotes the iteration/loop cycle number (0, 1, 2, ...), e.g. $data['stock'][0]
                    $attribute->status     = 1;
                    
                    $attribute->save();
                }
            }
            return redirect()->back()->with('success_message', 'Product Attributes have been addded successfully!');
        }


        return view('admin.attributes.add_edit_attributes')->with(compact('product'));
    }

    public function updateAttributeStatus(Request $request) { // Update Attribute Status using AJAX in add_edit_attributes.blade.php
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            ProductsAttribute::where('id', $data['attribute_id'])->update(['status' => $status]); // $data['attribute_id'] comes from the 'data' object inside the $.ajax() method

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'       => $status,
                'attribute_id' => $data['attribute_id']
            ]);
        }
    }

    public function editAttributes(Request $request) {
        Session::put('page', 'products');

        if ($request->isMethod('post')) { // if the <form> is submitted
            $data = $request->all();
            // dd($data);

            foreach ($data['attributeId'] as $key => $attribute) {
                if (!empty($attribute)) {
                    ProductsAttribute::where([
                        'id' => $data['attributeId'][$key]
                    ])->update([
                        'price' => $data['price'][$key],
                        'stock' => $data['stock'][$key]
                    ]);
                }
            }

            return redirect()->back()->with('success_message', 'Product Attributes have been updated successfully!');
        }
    }

    public function addImages(Request $request, $id) { // $id is the URL Paramter (slug) passed from the URL
        Session::put('page', 'products');

        $product = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'product_image')->with('images')->find($id); // with('images') is the relationship method name in the Product.php model


        if ($request->isMethod('post')) { // if the <form> is submitted
            $data = $request->all();
            // dd($data);

            if ($request->hasFile('images')) {
                $images = $request->file('images');
                // dd($images);

                foreach ($images as $key => $image) {
                    // Uploading the images:
                    // Generate Temp Image
                    $image_tmp = Image::make($image);

                    // Get image name
                    $image_name = $image->getClientOriginalName();
                    // dd($image_tmp);

                    // Get image extension
                    $extension = $image->getClientOriginalExtension();

                    // Generate a new random name for the uploaded image (to avoid that the image might get overwritten if its name is repeated)
                    $imageName = $image_name . rand(111, 99999) . '.' . $extension; // e.g. 5954.png

                    // Assigning the uploaded images path inside the 'public' folder
                    // We will have three folders: small, medium and large, depending on the images sizes
                    $largeImagePath  = 'front/images/product_images/large/'  . $imageName; // 'large'  images folder
                    $mediumImagePath = 'front/images/product_images/medium/' . $imageName; // 'medium' images folder
                    $smallImagePath  = 'front/images/product_images/small/'  . $imageName; // 'small'  images folder

                    // Upload the image using the 'Intervention' package and save it in our THREE paths (folders) inside the 'public' folder
                    Image::make($image_tmp)->resize(1000, 1000)->save($largeImagePath);  // resize the 'large'  image size then store it in the 'large'  folder
                    Image::make($image_tmp)->resize(500,   500)->save($mediumImagePath); // resize the 'medium' image size then store it in the 'medium' folder
                    Image::make($image_tmp)->resize(250,   250)->save($smallImagePath);  // resize the 'small'  image size then store it in the 'small'  folder
                
                    // Insert the image name in the database table `products_images`
                    $image = new ProductsImage;

                    $image->image      = $imageName;
                    $image->product_id = $id;
                    $image->status     = 1;

                    $image->save();
                }
            }

            return redirect()->back()->with('success_message', 'Product Images have been added successfully!');
        }


        return view('admin.images.add_images')->with(compact('product'));
    }

    public function updateImageStatus(Request $request) { // Update Image Status using AJAX in add_images.blade.php
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data);

            if ($data['status'] == 'Active') { // $data['status'] comes from the 'data' object inside the $.ajax() method    // reverse the 'status' from (ative/inactive) 0 to 1 and 1 to 0 (and vice versa)
                $status = 0;
            } else {
                $status = 1;
            }


            ProductsImage::where('id', $data['image_id'])->update(['status' => $status]); // $data['image_id'] comes from the 'data' object inside the $.ajax() method

            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'   => $status,
                'image_id' => $data['image_id']
            ]);
        }
    }

    public function deleteImage($id) { // AJAX call from admin/js/custom.js    // Delete the product image from BOTH SERVER (FILESYSTEM) & DATABASE    // $id is passed as a Route Parameter    
        // Get the product image record stored in the database
        $productImage = ProductsImage::select('image')->where('id', $id)->first();
        // dd($productImage);
        
        // Get the product image three paths on the server (filesystem) ('small', 'medium' and 'large' folders)
        $small_image_path  = 'front/images/product_images/small/';
        $medium_image_path = 'front/images/product_images/medium/';
        $large_image_path  = 'front/images/product_images/large/';

        // Delete the product images on server (filesystem) (from the the THREE folders)
        // First: Delete from the 'small' folder
        if (file_exists($small_image_path . $productImage->image)) {
            unlink($small_image_path . $productImage->image);
        }

        // Second: Delete from the 'medium' folder
        if (file_exists($medium_image_path . $productImage->image)) {
            unlink($medium_image_path . $productImage->image);
        }

        // Third: Delete from the 'large' folder
        if (file_exists($large_image_path . $productImage->image)) {
            unlink($large_image_path . $productImage->image);
        }


        // Delete the product image name (record) from the `products_images` database table
        ProductsImage::where('id', $id)->delete();

        $message = 'Product Image has been deleted successfully!';

        return redirect()->back()->with('success_message', $message);
    }

}