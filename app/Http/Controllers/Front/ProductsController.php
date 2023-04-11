<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    // https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76



    // match() method is used for the HTTP 'GET' requests to render listing.blade.php page and the HTTP 'POST' method for the AJAX request of the Sorting Filter or the HTML Form submission and jQuery for the Sorting Filter WITHOUT AJAX, AND ALSO for submitting the Search Form in listing.blade.php    // e.g.    /men    or    /computers    // https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76
    // Search Form: https://www.youtube.com/watch?v=X5A8_TXcnRI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=197
    public function listing(Request $request) { // using the Dynamic Routes with the foreach loop
        // Sorting Filter WITH AJAX in listing.blade.php. Load (and check) ajax_products_listing.blade.php    // https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data); // Important Note: dd() doesn't work with AJAX, as it always gives an error. Using var_dump() works just fine.
            // echo '<pre>', var_dump($data), '</pre>'; // Important Note: dd() doesn't work with AJAX, as it always gives an error. Using var_dump() works just fine
            // exit;

            $url          = $data['url'];
            $_GET['sort'] = $data['sort'];
            // dd($url);
            $categoryCount = \App\Models\Category::where([
                'url'    => $url,
                'status' => 1
            ])->count();
            // dd($categoryCount);
    
            if ($categoryCount > 0) { // if the category entered as a URL in the browser address bar exists
                // Get the entered URL in the browser address bar category details
                $categoryDetails = \App\Models\Category::categoryDetails($url); // get the categories of the opened $url (get categories depending on the $url)
                // dd($categoryDetails);
                // dd($categoryDetails['sub_categories']);
                // dd('category exists');
    
                // Get the categories related products    // Note: if the entered URL in the browser address bar is a 'category', we need to fetch its related products as well as its subcategories related products, but if the URL is a subcategory, we need to fetch the subcategory related products only
                // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->get()->toArray(); // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->simplePaginate(3); // Simple Pagination: https://laravel.com/docs/9.x/pagination#simple-pagination    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->paginate(3); // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1); // moving the paginate() method after checking for the sorting filter <form>    // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->cursorPaginate(3); // Cursor Pagination: https://laravel.com/docs/9.x/pagination#cursor-pagination    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                // dd($categoryProducts);



                // We used TWO ways to OPERATE the Dynamic Filters (on the left side of the listing.blade.php page): statically for every filter using jQuery and dynamically from Admin Panel. Here we use the first way (for the 'fabric' filter only):    // Check front/js/custom.js    // Check https://www.youtube.com/watch?v=r-NjOGA4qFw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=88
                // Note: the checked checkboxes <input> fields will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php e.g.    'fabric' => ['cotton', 'polyester']    , or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all    // Sidenote: There are TWO ways to submit a <form> to the backed: firstly, the regular one using the <button type="submit">, secondly, using AJAX by sending the "value" attributes of the <input> fields
                // if (isset($data['fabric']) && !empty($data['fabric'])) { // coming from the AJAX call in front/js/custom.js
                    // $categoryProducts->whereIn('products.fabric', $data['fabric']); // `products.fabric` means the `fabric` column in the `products` table    // $data['fabric'] is an ARRAY like    $data['fabric'] = ['cotton', 'polyester'] (because the checked checkboxes <input> fields will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all)    // https://laravel.com/docs/9.x/queries#additional-where-clauses
                    // echo dd($data['fabric']); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($data['fabric']), '</pre>';
                // }

                // The second way to operate the Dynamic Filters    // https://www.youtube.com/watch?v=rwj3nRYpUEk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=91
                // Note: the checked checkboxes <input> fields will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php e.g.    'fabric' => ['cotton', 'polyester']    , or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all    // Sidenote: There are TWO ways to submit a <form> to the backed: firstly, the regular one using the <button type="submit">, secondly, using AJAX by sending the "value" attributes of the <input> fields
                $productFilters = \App\Models\ProductsFilter::productFilters(); // Get all the (enabled/active) Filters    // (Another way to go is using an AJAX call to get the $productFilters!)
                foreach ($productFilters as $key => $filter) {
                    if (isset($filter['filter_column']) && isset($data[$filter['filter_column']]) && !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])) {
                        $categoryProducts->whereIn($filter['filter_column'], $data[$filter['filter_column']]); // `products.fabric` means the `fabric` column in the `products` table    // $data['fabric'] is an ARRAY like    $data['fabric'] = ['cotton', 'polyester'] (because the checked checkboxes <input> fields will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all)    // https://laravel.com/docs/9.x/queries#additional-where-clauses
                    }
                }

    
    
                // Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery) in front/products/listing.blade.php
                if (isset($_GET['sort']) && !empty($_GET['sort'])) {// if the URL query string parameters contain '&sort=someValue'    // 'sort' is the 'name' HTML attribute of the <select> box
                    if ($_GET['sort'] == 'product_latest') {
                        $categoryProducts->orderBy('products.id', 'Desc');
                    } elseif ($_GET['sort'] == 'price_lowest') {
                        $categoryProducts->orderBy('products.product_price', 'Asc');
                    } elseif ($_GET['sort'] == 'price_highest') {
                        $categoryProducts->orderBy('products.product_price', 'Desc');
                    } elseif ($_GET['sort'] == 'name_z_a') {
                        $categoryProducts->orderBy('products.product_name', 'Desc');
                    } elseif ($_GET['sort'] == 'name_a_z') {
                        $categoryProducts->orderBy('products.product_name', 'Asc');
                    }
                }



                // https://www.youtube.com/watch?v=7Y1OOQr-PTs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=92
                // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
                // First: the 'size' filter (from `products_attributes` database table)
                if (isset($data['size']) && !empty($data['size'])) { // coming from the AJAX call in front/js/custom.js    // example:    $data['size'] = 'Large'
                    // echo dd($data['size']); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($data['size']), '</pre>';
                    // exit;
                    $productIds = \App\Models\ProductsAttribute::select('product_id')->whereIn('size', $data['size'])->pluck('product_id')->toArray(); // fetch the products ids of the $data['size'] from the `products_attributes` table

                    $categoryProducts->whereIn('products.id', $productIds); // `products.id` means that `products` is the table name (means grab the `id` column of the `products` table)
                }

                // https://www.youtube.com/watch?v=kan0Vypzalk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=92
                // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
                // Second: the 'color' filter (from `products` database table)
                if (isset($data['color']) && !empty($data['color'])) { // coming from the AJAX call in front/js/custom.js    // example:    $data['color'] = 'Large'
                    // echo dd($data['color']); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($data['color']), '</pre>';
                    // exit;
                    $productIds = \App\Models\Product::select('id')->whereIn('product_color', $data['color'])->pluck('id')->toArray(); // fetch the products ids of the $data['color'] from the `products` table

                    $categoryProducts->whereIn('products.id', $productIds); // `products.id` means that `products` is the table name (means grab the `id` column of the `products` table)
                }

                // https://www.youtube.com/watch?v=0opzfLVfwqg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=93 AND the beginning of https://www.youtube.com/watch?v=Q9-5g1qgsn4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=94
                // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
                // Third: the 'price' filter (from `products` database table)
                /*
                if (isset($data['price']) && !empty($data['price'])) { // coming from the AJAX call in front/js/custom.js    // example:    $data['price'] = 'Large'
                    // echo dd($data['price']); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($data['price']), '</pre>';
                    // exit;
                */

                    /*
                    $implodePrices = implode('-', $data['price']); // convert the price ranges array to a one string
                    // echo dd($implodePrices); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($implodePrices), '</pre>';
                    // exit;
                    $explodePrices = explode('-', $implodePrices); // convert the string to an array
                    // echo dd($implodePrices); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($explodePrices), '</pre>';
                    // exit;

                    $min = reset($explodePrices); // the minimum value of the price ranges checkboxes which are checked by the user in filters.blade.php (which is 'include'-ed by listing.blade.php)
                    $max = end($explodePrices);   // the maximum value of the price ranges checkboxes which are checked by the user in filters.blade.php (which is 'include'-ed by listing.blade.php)

                    $productIds = \App\Models\Product::select('id')->whereBetween('product_price', [$min, $max])->pluck('id')->toArray(); // fetch the products ids of the range (whereBetween() method) $min and $max from the `products` table    // whereBetween(): https://laravel.com/docs/9.x/queries#additional-where-clauses
                    $categoryProducts->whereIn('products.id', $productIds); // `products.id` means that `products` is the table name (means grab the `id` column of the `products` table)
                    */


                /*
                    // ENHANCING THE 'price' FILTER (TO AVOID WRONG RESULTS WHEN CHECKING TWO NON-ADJOINING PRICE RANGE CHECBOXES (NOT NEXT TO EACH OTHER) in filters.blade.php)
                    // https://www.youtube.com/watch?v=Q9-5g1qgsn4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=94
                    foreach ($data['price'] as $key => $price) {
                        // echo dd($price); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                        // echo '<pre>', var_dump($price), '</pre>'; // e.g. '2000-5000'

                        $priceArr = explode('-', $price); // convert the string (e.g. '2000-5000') to an array of TWO prices (minimum value and maximum value) e.g    ['2000', '5000']
                        // echo dd($priceArr); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                        // echo '<pre>', var_dump($priceArr), '</pre>'; // e.g    ['2000', '5000']

                        $productIds[] = \App\Models\Product::select('id')->whereBetween('product_price', [$priceArr[0], $priceArr[1]])->pluck('id')->toArray(); // fetch the products ids of the range $priceArr[0] and $priceArr[1] (whereBetween() method) from the `products` table    // whereBetween(): https://laravel.com/docs/9.x/queries#additional-where-clauses    // e.g.    [    [2], [4, 5], [6]    ]
                    }
                    // exit;

                    // echo dd($price); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($productIds), '</pre>'; // e.g.    [    [2], [4, 5], [6]    ]
                    // exit;

                    // How to merge multiple arrays inside one array? https://www.google.com/search?q=how+to+merge+multiple+arrays+of+one+array+in+php&sxsrf=ALiCzsYcQ5_NjBqAR5abD9FQL4gKVhHJyw%3A1665513751164&ei=F7lFY5-7CfCD9u8P-qiQuAk&ved=0ahUKEwjfooac6tj6AhXwgf0HHXoUBJcQ4dUDCA4&uact=5&oq=how+to+merge+multiple+arrays+of+one+array+in+php&gs_lcp=Cgdnd3Mtd2l6EAMyBQgAEKIEOgoIABBHENYEELADOggIIRDDBBCgAToKCCEQwwQQChCgAUoECE0YAUoECEEYAEoECEYYAFCMB1j3JmC-KGgDcAB4AIABpQGIAcwNkgEEMC4xMZgBAKABAcgBCMABAQ&sclient=gws-wiz    // https://stackoverflow.com/questions/13544985/merge-multiple-arrays-from-one-array    // https://stackoverflow.com/questions/17041278/php-how-to-merge-arrays-inside-array
                    $productIds = call_user_func_array('array_merge', $productIds); // merge the product ids arrays inside $productIds e.g. from    [    [2], [4, 5], [6]    ]    to    [    2, 4, 5, 6    ]
                    // $productIds = array_merge(...$productIds); // Another way to go!
                    // $productIds = array_merge_recursive(...$productIds); // A third way to go!
                    // echo dd($price); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($productIds), '</pre>'; // e.g.    [    [2], [4, 5], [6]    ]
                    // exit;

                    $categoryProducts->whereIn('products.id', $productIds); // `products.id` means that `products` is the table name (means grab the `id` column of the `products` table)
                */



                    // Correction by the instructor (in the Youtube comments) of the AJAX issue that occurs when using the price filter along with any other filter: https://www.youtube.com/watch?v=egx7-Hmb63Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=142
                    // checking for Price
                    // $productIds = array();
                    // if(!empty($data['price'])){
                    //     foreach($data['price'] as $key => $price){
                    //         $priceArr = explode('-',$price);
                    //         if(isset($priceArr[0]) && isset($priceArr[1])){
                    //             $getPricepids = \App\Models\Product::select('id')->whereBetween('product_price', [$priceArr[0], $priceArr[1]])->get()->toArray();
                    //             $productIds[] = array_column($getPricepids, 'id');
                    //         }
                    //     }
                    //     $productIds = array_unique(\Illuminate\Support\Arr::flatten($productIds)); // Arr::flatten(): https://laravel.com/docs/9.x/helpers#method-array-flatten
                    //     $categoryProducts->whereIn('products.id',$productIds);
                    // }


                    // He corrected it himself a long time later in a video, Check 1:57 in https://www.youtube.com/watch?v=xY9OYug0uaQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=150     and     https://packagist.org/packages/laravel/helpers#:~:text=This%20package%20provides%20a%20backwards%20compatibility%20layer%20for%20Laravel%205.8%20helpers%20in%20the%20latest%20Laravel%20release.
                    // checking for Price
                    $productIds = array();

                    if (isset($data['price']) && !empty($data['price'])) {
                        foreach($data['price'] as $key => $price){
                            $priceArr = explode('-', $price); // Example: First loop iteration: 0, 1000    then Second loop iteration: 1000, 2000, ...etc
                            // echo '<pre>', var_dump($priceArr), '</pre>';
                            // exit;

                            if (isset($priceArr[0]) && isset($priceArr[1])) { // Example: First loop iteration: 0, 1000    then Second loop iteration: 1000, 2000, ...etc
                                $productIds[] = \App\Models\Product::select('id')->whereBetween('product_price', [$priceArr[0], $priceArr[1]])->pluck('id')->toArray(); // fetch the products ids of the range $priceArr[0] and $priceArr[1] (whereBetween() method) from the `products` table    // whereBetween(): https://laravel.com/docs/9.x/queries#additional-where-clauses    // e.g.    [    [2], [4, 5], [6]    ]
                            }
                        }

                        // echo '<pre>', var_dump($priceArr), '</pre>';
                        // echo '<pre>', var_dump($productIds), '</pre>';
                        // exit;

                        $productIds = array_unique(\Illuminate\Support\Arr::flatten($productIds)); // Arr::flatten(): https://laravel.com/docs/9.x/helpers#method-array-flatten    // We use array_unique() function to eliminate any repeated product ids
                        $categoryProducts->whereIn('products.id', $productIds);
                    }                    



                // https://www.youtube.com/watch?v=Q9-5g1qgsn4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=96
                // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
                // Fourth: the 'brand' filter (from `products` and `brands` database table)
                if (isset($data['brand']) && !empty($data['brand'])) { // coming from the AJAX call in front/js/custom.js    // example:    $data['brand'] = 'Large'
                    // echo dd($data['brand']); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($data['brand']), '</pre>';    
                    // exit;
                    $productIds = \App\Models\Product::select('id')->whereIn('brand_id', $data['brand'])->pluck('id')->toArray(); // fetch the products ids with `brand_id` of $data['brand'] from the `products` table

                    $categoryProducts->whereIn('products.id', $productIds); // `products.id` means that `products` is the table name (means grab the `id` column of the `products` table)
                }



                // dd($categoryProducts);
                // echo '<pre>', var_dump($categoryProducts), '</pre>';
                // exit;    


    
                // Pagination (after the Sorting Filter)
                $categoryProducts = $categoryProducts->paginate(30); // Moved the pagination after checking for the sorting filter <form>
                // dd($categoryProducts);
                // echo '<pre>', var_dump($categoryProducts), '</pre>';
                // exit;

    
    
                return view('front.products.ajax_products_listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));

            } else {
                abort(404); // we will create the 404 page later on    // https://laravel.com/docs/9.x/helpers#method-abort
            }
        
        } else { // Sorting Filter WITHOUT AJAX (using the HTML <form> and jQuery) Or handling the website Search Form (in front/layout/header.blade.php) BOTH in front/products/listing.blade.php

            // Website Search Form (to search for all website products). Check the HTML Form in front/layout/header.blade.php    // https://www.youtube.com/watch?v=X5A8_TXcnRI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=197
            if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) { // If the Search Form is used, handle the Search Form submission
                $search_product = $_REQUEST['search'];

                // We fill in the $categoryDetails array MANUALLY with the same indexes/keys that come from the categoryDetails() method in Category.php model (because in either cases of the if-else statement, we pass in $categoryDetails variable to the view down below)
                $categoryDetails['breadcrumbs']                      = $search_product;
                $categoryDetails['categoryDetails']['category_name'] = $search_product;
                $categoryDetails['categoryDetails']['description']   = 'Search Products for ' . $search_product;

                // We join `products` table (at the `category_id` column) with `categoreis` table (becausee we're going to search `category_name` column in `categories` table)
                // Note: It's best practice to name table columns with more verbose descriptive names (e.g. if the table name is `products`, then you should have a column called `product_id`, NOT `id`), and also, don't have repeated column names THROUGHOUT/ACROSS the tables of a certain (one) database (i.e. make all your database tables column names (throughout your database) UNIQUE (even columns in different tables!)). That's because of that problem that emerges when you join (JOIN clause) two tables which have the same column names, when you join them, the column names of the second table overrides the column names of the first table (similar column names override each other), leading to many problems. There are TWO ways/workarounds to tackle this problem, check 24:04 in https://www.youtube.com/watch?v=X5A8_TXcnRI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=208
                $categoryProducts = \App\Models\Product::select(
                    'products.id', 'products.section_id', 'products.category_id', 'products.brand_id', 'products.vendor_id', 'products.product_name', 'products.product_code', 'products.product_color', 'products.product_price',  'products.product_discount', 'products.product_image', 'products.description'
                )->with('brand')->join( // Joins: Inner Join Clause: https://laravel.com/docs/9.x/queries#inner-join-clause    // moving the paginate() method after checking for the sorting filter <form>    // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php model    // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'brand' is the relationship method name in Product.php model
                    'categories', // `categories` table
                    'categories.id', '=', 'products.category_id' // JOIN both `products` and `categories` table at    `categories`.`id` = `products`.`category_id`
                )->where(function($query) use ($search_product) { // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'brand' is the relationship method name in Product.php model    // function () use ()     syntax: https://www.php.net/manual/en/functions.anonymous.php#:~:text=the%20use%20language%20construct
                    // We'll search for the searched term by the user in the `product_name`, `product_code`, `product_color` and `description` columns in the `products` table and in the `category_name` column in the `categories` table
                    $query->where('products.product_name',    'like', '%' . $search_product . '%')  // 'like' SQL operator    // '%' SQL Wildcard Character    // Basic Where Clauses: Where Clauses: https://laravel.com/docs/9.x/queries#where-clauses
                        ->orWhere('products.product_code',    'like', '%' . $search_product . '%')  // 'like' SQL operator    // '%' SQL Wildcard Character    // Basic Where Clauses: Where Clauses: https://laravel.com/docs/9.x/queries#where-clauses
                        ->orWhere('products.product_color',   'like', '%' . $search_product . '%')  // 'like' SQL operator    // '%' SQL Wildcard Character    // Basic Where Clauses: Where Clauses: https://laravel.com/docs/9.x/queries#where-clauses
                        ->orWhere('products.description',     'like', '%' . $search_product . '%')  // 'like' SQL operator    // '%' SQL Wildcard Character    // Basic Where Clauses: Where Clauses: https://laravel.com/docs/9.x/queries#where-clauses
                        ->orWhere('categories.category_name', 'like', '%' . $search_product . '%'); // 'like' SQL operator    // '%' SQL Wildcard Character    // Basic Where Clauses: Where Clauses: https://laravel.com/docs/9.x/queries#where-clauses
                })->where('products.status', 1);
                // dd($categoryProducts);

                // If the user selects a certain Section from the Search Form drop-down menu (the <select><option> HTML tags), do the search using the `section_id` too
                if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id'])) { // if the user selects a Section using <select><option> in the Search Form drop-down menu
                    $categoryProducts = $categoryProducts->where('products.section_id', $_REQUEST['section_id']);
                }

                $categoryProducts = $categoryProducts->get();
                // dd($categoryProducts);


                return view('front.products.listing')->with(compact('categoryDetails', 'categoryProducts'));

            } else { // If the Search Form is NOT used, render the listing.blade.php page with the Sorting Filter WITHOUT AJAX (using the HTML <form> and jQuery)
                $url = \Illuminate\Support\Facades\Route::getFacadeRoot()->current()->uri(); // Accessing The Current Route: https://laravel.com/docs/9.x/routing#accessing-the-current-route    // Accessing The Current URL: https://laravel.com/docs/9.x/urls#accessing-the-current-url    // Check 18:15 in https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76   
                // dd($url);
                $categoryCount = \App\Models\Category::where([
                    'url'    => $url,
                    'status' => 1
                ])->count();
                // dd($categoryCount);
        
                if ($categoryCount > 0) { // if the category entered as a URL in the browser address bar exists
                    // Get the entered URL in the browser address bar category details
                    $categoryDetails = \App\Models\Category::categoryDetails($url);
                    // dd($categoryDetails);
                    // dd($categoryDetails['sub_categories']);
                    // dd('category exists');
        
                    // Get the categories related products    // Note: if the entered URL in the browser address bar is a 'category', we need to fetch its related products as well as its subcategories related products, but if the URL is a subcategory, we need to fetch the subcategory related products only
                    // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->get()->toArray(); // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                    // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->simplePaginate(3); // Simple Pagination: https://laravel.com/docs/9.x/pagination#simple-pagination    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                    // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->paginate(3); // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                    $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1); // moving the paginate() method after checking for the sorting filter <form>    // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                    // $categoryProducts = \App\Models\Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])->where('status', 1)->cursorPaginate(3); // Cursor Pagination: https://laravel.com/docs/9.x/pagination#cursor-pagination    // Displaying Pagination Results Using Bootstrap: https://laravel.com/docs/9.x/pagination#using-bootstrap    // https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79    // https://laravel.com/docs/9.x/queries#additional-where-clauses    // using the brand() relationship method in Product.php
                    // dd($categoryProducts);
        
        
                    // Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery) in front/products/listing.blade.php
                    if (isset($_GET['sort']) && !empty($_GET['sort'])) {// if the URL query string parameters contain '&sort=someValue'    // 'sort' is the 'name' HTML attribute of the <select> box
                        if ($_GET['sort'] == 'product_latest') {
                            $categoryProducts->orderBy('products.id', 'Desc');
                        } elseif ($_GET['sort'] == 'price_lowest') {
                            $categoryProducts->orderBy('products.product_price', 'Asc');
                        } elseif ($_GET['sort'] == 'price_highest') {
                            $categoryProducts->orderBy('products.product_price', 'Desc');
                        } elseif ($_GET['sort'] == 'name_z_a') {
                            $categoryProducts->orderBy('products.product_name', 'Desc');
                        } elseif ($_GET['sort'] == 'name_a_z') {
                            $categoryProducts->orderBy('products.product_name', 'Asc');
                        }
                    }
        
                    // Pagination (after the Sorting Filter)
                    $categoryProducts = $categoryProducts->paginate(30); // Moved the pagination after checking for the sorting filter <form>
                    // dd($categoryProducts);
        
        
                    return view('front.products.listing')->with(compact('categoryDetails', 'categoryProducts', 'url'));

                } else {
                    abort(404); // we will create the 404 page later on    // https://laravel.com/docs/9.x/helpers#method-abort
                }

            }

        }
    }



    // Render Single Product Detail Page in front/products/detail.blade.php    // Check 19:09 in https://www.youtube.com/watch?v=fv9ZnNRKBBE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=103
    public function detail($id) { // Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        $productDetails = \App\Models\Product::with([
            'section', 'category', 'brand', 'attributes' => function($query) { // Constraining Eager Loads: https://laravel.com/docs/9.x/eloquent-relationships#constraining-eager-loads    // Subquery Where Clauses: https://laravel.com/docs/9.x/queries#subquery-where-clauses    // Advanced Subqueries: https://laravel.com/docs/9.x/eloquent#advanced-subqueries    // 'section', 'category', 'brand', 'attributes', 'images', 'vendor' are the relationship method names in Product.php model which are being Eager Loaded (Eager Loading)
                $query->where('stock', '>', 0)->where('status', 1); // the 'attributes' relationship method in Product.php model     // Constraining Eager Loads to get the `products_attributes` of `stock` more than Zero 0 ONLY and `status` is 1 (active/enabled), check 19:10 in https://www.youtube.com/watch?v=0Bpk4JfwvpI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=106
            }, 'images', 'vendor'
        ])->find($id)->toArray(); // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // Eager Loading Multiple Relationships: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading-multiple-relationships
        // dd($productDetails);
        // dd($productDetails->section);

        $categoryDetails = \App\Models\Category::categoryDetails($productDetails['category']['url']); // to get the Breadcrumb links (which is HTML) to show them in front/products/detail.blade.php
        // dd($categoryDetails);
        

        // Get similar products (or related products) (functionality) by getting other products from THE SAME CATEGORY    // https://www.youtube.com/watch?v=cC23wnRCumo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=111
        // $similarProducts = \App\Models\Product::with('brand')->where('category_id', $productDetails['category_id'])->get();
        $similarProducts = \App\Models\Product::with('brand')->where('category_id', $productDetails['category']['id'])->where('id', '!=', $id)->limit(4)->inRandomOrder()->get()->toArray(); // where('id', '!=', $id)    means get all similar products (of the same category) EXCEPT (exclude) the currently viewed product (to not be repeated (to prevent repetition))    // limit(4)->inRandomOrder()    means show only 4 similar products but IN RANDOM ORDER
        // dd($similarProducts);


        // dd(\Session::all());
        // dd(\Session::get('session_id'));
        // dd(\Session::getId());
        // echo '<pre>', var_dump(\Session::getId()), '</pre>';
        // echo '<pre>', var_dump(\Session::get('session_id')), '</pre>';
        // echo '<pre>', var_dump(session_id()), '</pre>';
        // exit;


        // Recently Viewed Products (Items) functionality (we created `recently_viewed_products` table but we won't need to create a Model for it, because we won't do much work with it)    // https://www.youtube.com/watch?v=if1nn-837wA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=112
        // Very Important Note: You'll need here Task Scheduling (Cron jobs) to clear the `recently_viewed_products` table from time to time because it will get very big and will make your database slow over time    // Task Scheduling (Laravel's Cron jobs): https://laravel.com/docs/9.x/scheduling
        // Set Session for the Recently Viewed Products
        // dd(\Session::all()); // Retrieving All Session Data: https://laravel.com/docs/9.x/session#retrieving-all-session-data
        if (empty(\Session::get('session_id'))) { // if the session is empty (user is not logged in), create a random session id (for the 'Guest' user)    // https://laravel.com/docs/9.x/authentication#ecosystem-overview    // Determining If An Item Exists In The Session: https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session
            $session_id = md5(uniqid(rand(), true)); // Searched Google for: 'generate alphanumeric random number in Laravel'    // https://stackoverflow.com/questions/1846202/how-to-generate-a-random-unique-alphanumeric-string
        } else { // if the session exists (user is logged in)    // https://laravel.com/docs/9.x/authentication#ecosystem-overview
            $session_id = \Session::get('session_id');
        }

        // Store the $session_id in the Session
        \Session::put('session_id', $session_id); // (!! this shouble be inside the last if statement case that the user is NOT logged in ONLY !!) $session_id comes from one of the two cases of the last if statement    // Storing Data: https://laravel.com/docs/9.x/session#storing-data

        // If they don't already exist, INSERT the currently viewed product `product_id` and `session_id` in `recently_viewed_products` table (ONE TIME ONLY)
        $countRecentlyViewedProducts = \DB::table('recently_viewed_products')->where([ // Note: Here we use Laravel 'DB' facade because we didn't create a Model for the `recently_viewed_products` table, because we don't need it because we won't do much work with it. So we'll just ONLY DIRECTLY interact with the `recently_viewed_products` table using Laravel 'DB' facade
            'product_id' => $id,
            'session_id' => $session_id // comes from the two cases of the last if statement
        ])->count(); // get the count or the number of that currently Viewed Product through the same Product (through `product_id`) and Session (through `session_id`). This should not be more than ONE TIME ONLY!

        if ($countRecentlyViewedProducts == 0) { // if that currently Viewed Product doesn't already exist in the `recently_viewed_products` table, INSERT it in
            \DB::table('recently_viewed_products')->INSERT([ // Note: Here we use Laravel 'DB' facade because we didn't create a Model for the `recently_viewed_products` table, because we don't need it because we won't do much work with it. So we'll just ONLY DIRECTLY interact with the `recently_viewed_products` table using Laravel 'DB' facade
                'product_id' => $id,
                'session_id' => $session_id // $session_id comes from one of the two cases of the last if statement
            ]);
        }

        // Get Recently Viewed Products (Items) IDs
        $recentProductsIds = \DB::table('recently_viewed_products')->select('product_id')->where('product_id', '!=', $id)->where('session_id', $session_id)->inRandomOrder()->get()->take(4)->pluck('product_id'); // take() is identical to limit(): https://laravel.com/docs/9.x/queries#limit-and-offset    // where('product_id', '!=', $id)    means exclude (EXCEPT) the currently viewed product (to not be repeated (to prevent repetition))    // Note: Here we use Laravel 'DB' facade because we didn't create a Model for the `recently_viewed_products` table, because we don't need it because we won't do much work with it. So we'll just ONLY DIRECTLY interact with the `recently_viewed_products` table using Laravel 'DB' facade
        // $recentProductsIds = \DB::table('recently_viewed_products')->select('product_id')->where([
        //     ['product_id', '!=', $id],
        //     ['session_id', $session_id]
        // ])->inRandomOrder()->take(4)->pluck('product_id'); // take() is identical to limit(): https://laravel.com/docs/9.x/queries#limit-and-offset    // where('product_id', '!=', $id)    means exclude (EXCEPT) the currently viewed product (to not be repeated (to prevent repetition))    // Note: Here we use Laravel 'DB' facade because we didn't create a Model for the `recently_viewed_products` table, because we don't need it because we won't do much work with it. So we'll just ONLY DIRECTLY interact with the `recently_viewed_products` table using Laravel 'DB' facade
        // dd($recentProductsIds);

        // Get Recently Viewed Products (Items)
        $recentlyViewedProducts = \App\Models\Product::with('brand')->whereIn('id', $recentProductsIds)->get()->toArray(); // https://laravel.com/docs/9.x/collections#method-wherein AND https://laravel.com/docs/9.x/queries#additional-where-clauses
        // dd($recentlyViewedProducts);



        // Managing Product Colors (in front/products/detail.blade.php)    // https://www.youtube.com/watch?v=Nle1w37JW2k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=115
        // Get Group Code Products `group_code` column in `products` table (get the `group_code` of the product, if exists (if any))
        $groupProducts = array();
        if (!empty($productDetails['group_code'])) { // if the product has a `group_code`
            // Get all other products who also have the same `group_code`
            $groupProducts = \App\Models\Product::select('id', 'product_image')->where('id', '!=', $id)->where([ // where('id', '!=', $id)    means exclude (EXCEPT) the currently viewed product (to not be repeated (to prevent repetition))
                'group_code' => $productDetails['group_code'],
                'status'     => 1
            ])->get()->toArray();
        }
        // dd($groupProducts);



        $totalStock = \App\Models\ProductsAttribute::where('product_id', $id)->sum('stock'); // sum() the `stock` column of the `products_attributes` table    // sum(): https://laravel.com/docs/9.x/collections#method-sum
        // dd($totalStock);


        return view('front.products.detail')->with(compact('productDetails', 'categoryDetails', 'totalStock', 'similarProducts', 'recentlyViewedProducts', 'groupProducts'));
    }



    // The AJAX call from front/js/custom.js file, to show the the correct related `price` and `stock` depending on the selected `size` (from the `products_attributes` table)) by clicking the size <select> box in front/products/detail.blade.php    // https://www.youtube.com/watch?v=T6ZyTfYLKRU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=106
    public function getProductPrice(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;
            
            $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($data['product_id'], $data['size']); // $data['product_id'] and $data['size'] come from the 'data' object inside the $.ajax() method in front/js/custom.js file
            // echo '<pre>', var_dump($getDiscountAttributePrice), '</pre>';
            // exit;

            return $getDiscountAttributePrice;
        }
    }



    // Show all Vendor products in front/products/vendor_listing.blade.php    // This route is accessed from the <a> HTML element in front/products/vendor_listing.blade.php    // https://www.youtube.com/watch?v=S8xbldfdLXc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=111
    public function vendorListing($vendorid) { // Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters
        // Get vendor shop name
        $getVendorShop = \App\Models\Vendor::getVendorShop($vendorid);
        // dd($getVendorShop);

        // Get all vendor products
        $vendorProducts = \App\Models\Product::with('brand')->where('vendor_id', $vendorid)->where('status', 1); // Eager Loading (using with() method): https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'brand' is the relationship method name in Product.php model that is being Eager Loaded

        // $vendorProducts Pagination
        $vendorProducts = $vendorProducts->paginate(30); // Paginating Eloquent Results: https://laravel.com/docs/9.x/pagination#paginating-eloquent-results
        // dd($vendorProducts);


        return view('front.products.vendor_listing')->with(compact('getVendorShop', 'vendorProducts'));
    }



    // Add to Cart <form> submission in front/products/detail.blade.php    // https://www.youtube.com/watch?v=LmovzZ9zdzE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=116
    public function cartAdd(Request $request) {
        if ($request->isMethod('post')) { // if the Add to Cart <form> is submitted
            $data = $request->all();
            // dd($data);


            // Prevent the ability to add an item to the Cart with 0 zero quantity. Check 16:30 in https://www.youtube.com/watch?v=tfkA9ATahiA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=197
            if ($data['quantity'] <= 0) { // if the ordered quantity is 0, convert it to at least 1
                $data['quantity'] = 1;
            }


            // Check if the selected product `product_id` with that selected `size` have available `stock` in `products_attributes` table
            $getProductStock = \App\Models\ProductsAttribute::getProductStock($data['product_id'], $data['size']);
            // dd($getProductStock);

            if ($getProductStock < $data['quantity']) { // if the `stock` available (in `products_attributes` table) is less than the ordered quantity by user (the quantity that the user desires)
                return redirect()->back()->with('error_message', 'Required Quantity is not available!');
            }


            // Note: If the user is not authenticated/logged in (guest), we'll use their `session_id` to enable users to Add to Cart (in `carts` table) WITHOUT LOGIN, then after that, once the user logins/gets authenticated, we'll use their `user_id` (NOT their #session_id) in `carts` table    // When user logins, their `user_id` gets updated (check userLogin() method in UserController.php)    // Check 12:52 in https://www.youtube.com/watch?v=qMa1g05oX74&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=117&t=912s
            // More explanation: We'll use Laravel's default Authentication Guard 'web' Guard (check config/auth.php)
            // Generate a $session_id if it doesn't exist:
            // dd(\Session::all()); // Retrieving All Session Data: https://laravel.com/docs/9.x/session#retrieving-all-session-data
            // Generate a session
            $session_id = \Session::get('session_id'); // if the $session_id already exists
            if (empty($session_id)) { // if the session is empty (user is not logged in), create a random session id (for the 'Guest' user)    // https://laravel.com/docs/9.x/authentication#ecosystem-overview    // Determining If An Item Exists In The Session: https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session
                $session_id = \Session::getId(); // Get the current session ID    // https://laravel.com/api/9.x/Illuminate/Contracts/Session/Session.html
                \Session::put('session_id', $session_id);  // Store the current $session_id in the Session of the user    // Storing Data: https://laravel.com/docs/9.x/session#storing-data    
            }

            // Get $user_id and $countProducts in two cases. Check if the same product `product_id` with the same `size` already exists (was ordered by the same user depending on `user_id` or `session_id`) in Cart `carts` table in TWO cases: firstly, the user is authenticated/logged in, and secondly, the user is NOT logged in i.e. guest
            // To prevent repetition of the ordered Cart products `product_id` with the same sizes `size` for a certain user (`session_id` or `user_id` depending on whether the user is authenticated/logged in or not) in the `carts` table
            if (\Auth::check()) { // Here we're using the default 'web' Authentication Guard    // if the user is authenticated/logged in (using the default Laravel Authentication Guard 'web' Guard (check config/auth.php file) whose 'Provider' is the User.php Model i.e. `users` table)    // Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated
                $user_id = \Auth::user()->id; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                // $user_id = \Auth::id(); // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

                // Check if that authenticated/logged in user has already THE SAME product `product_id` with THE SAME `size` (in `carts` table) in the Cart i.e. the `carts` table
                $countProducts = \App\Models\Cart::where([
                    'user_id'    => $user_id, // THAT EXACT authenticated/logged in user (using their `user_id` because they're authenticated/logged in)
                    'product_id' => $data['product_id'],
                    'size'       => $data['size']
                ])->count();

            } else { // if the user is NOT logged in (guest)
                // Check if that guest or NOT logged in user has already THE SAME products `product_id` with THE SAME `size` (in `carts` table) in the Cart i.e. the `carts` table    // When user logins, their `user_id` gets updated (check userLogin() method in UserController.php)
                $user_id = 0; // is the same as    $user_id = null;    // When user logins, their `user_id` gets updated (check userLogin() method in UserController.php)    // this is because that the use is NOT authenticated / NOT logged in i.e. guest 
                $countProducts = \App\Models\Cart::where([ // We get the count (number) of that specific product `product_id` with that specific `size` to prevent repetition in the `carts` table 
                    'session_id' => $session_id, // THAT EXACT NON-authenticated/NOT logged or Guest user (using their `session_id` because they're NOT authenticated/NOT logged in or Guest)
                    'product_id' => $data['product_id'],
                    'size'       => $data['size']
                ])->count();
            }


            // dd($countProducts);

            // MY CODE:
            // To prevent repetition of the ordered products `product_id` with the same sizes `size` for a certain user (`session_id` or `user_id` depending on whether the user is authenticated/logged in or not) in the `carts` table:
            if ($countProducts > 0) { // if that specific user (`session_id` or `user_id` i.e. depending on the user is authenticated/logged or not (guest)) ALREADY ordered that specific product `product_id` with that same exact `size`, we're going to just UPDATE the `quantity` in the `carts` table to prevent repetition of the ordered products inside the table (and won't create a new record)    // In other words, if the same product with the same size ALREADY EXISTS (ordered with the SAME user) in the `carts` table
                \App\Models\Cart::where([
                    'session_id' => $session_id, // THAT EXACT NON-authenticated/NOT logged or Guest user (using their `session_id` because they're NOT authenticated/NOT logged in or Guest)
                    'user_id'    => $user_id ?? 0, // if the user is authenticated/logged in, take its $user_id. If not, make it zero 0    // When user logins, their `user_id` gets updated (check userLogin() method in UserController.php)
                    'product_id' => $data['product_id'],
                    'size'       => $data['size']
                ])->increment('quantity', $data['quantity']); // Add the new added quantity (    $data['quantity']    ) to the already existing `quantity` in the `carts` table    // Update Statements: Increment & Decrement: https://laravel.com/docs/9.x/queries#increment-and-decrement
                // ])->update(['quantity' => $data['quantity']]); // Add the new added quantity (    $data['quantity']    ) to the already existing `quantity` in the `carts` table    // Update Statements: Increment & Decrement: https://laravel.com/docs/9.x/queries#increment-and-decrement
            } else { // if that `product_id` with that `size` was never ordered by that user `session_id` or `user_id` (i.e. that product with that size for that user doesn't exist in the `carts` table), INSERT it into the `carts` table for the first time
                // INSERT the ordered product `product_id`, the user's session ID `session_id`, `size` and `quantity` in the `carts` table
                $item = new \App\Models\Cart; // the `carts` table

                $item->session_id = $session_id; // $session_id will be stored whether the user is authenticated/logged in or NOT
                $item->user_id    = $user_id; // depending on the last if statement (whether user is authenticated/logged in or NOT (guest))    // $user_id will be always zero 0 if the user is NOT authenticated/logged in    // When user logins, their `user_id` gets updated (check userLogin() method in UserController.php)
                $item->product_id = $data['product_id'];
                $item->size       = $data['size'];
                $item->quantity   = $data['quantity'];

                $item->save();
            }



            /*
            // ORIGINAL CODE:
            // Instructor corrected issue (adding an already existing product to Cart) later this way in: 1:44 in https://www.youtube.com/watch?v=vGux2yXHOI8    // I developed an even better solution with respect to User Experience above there!
            if ($countProducts > 0) {
                return redirect()->back()->with('error_message', 'Product already exists in Cart!');
            }


            // INSERT the ordered product `product_id`, the user's session ID `session_id`, `size` and `quantity` in the `carts` table
            $item = new \App\Models\Cart; // the `carts` table

            $item->session_id = $session_id; // $session_id will be stored whether the user is authenticated/logged in or NOT
            $item->user_id    = $user_id; // depending on the last if statement (whether user is authenticated/logged in or NOT (guest))    // $user_id will be always zero 0 if the user is NOT authenticated/logged in    // When user logins, their `user_id` gets updated (check userLogin() method in UserController.php)
            $item->product_id = $data['product_id'];
            $item->size       = $data['size'];
            $item->quantity   = $data['quantity'];

            $item->save();
            */


            return redirect()->back()->with('success_message', 'Product has been added in Cart! <a href="/cart" style="text-decoration: underline !important">View Cart</a>');
        }
    }

    // Render Cart page (front/products/cart.blade.php)    // https://www.youtube.com/watch?v=yqkYp_iHsxQ&list=PLLUtELdNs2ZYTlQ97V1Tl8mirS3qXHNFZ&index=118
    public function cart() {
        // Get the Cart Items of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))    // https://www.youtube.com/watch?v=I98dEyyrZLU&list=PLLUtELdNs2ZYTlQ97V1Tl8mirS3qXHNFZ&index=120
        $getCartItems = \App\Models\Cart::getCartItems();
        // dd($getCartItems);


        return view('front.products.cart')->with(compact('getCartItems'));
    }

    // Update Cart Item Quantity AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js
    public function cartUpdate(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;



            // Apply some conditions (and showing them in the view!) before Update-ing the Cart Item Quantity (making sure that the desired quantity is not more than (doesn't exceed) the available `stock` in `products_attributes` table, and that the desired product `size` is not disabled/inactive (`status` is not zero 0) in `products_attributes` table)    // https://www.youtube.com/watch?v=egO3Jpw0qaM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=123
            // Get user's Cart details
            $cartDetails = \App\Models\Cart::find($data['cartid']); // $data['cartid'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            // echo '<pre>', var_dump($cartDetails), '</pre>';
            // echo '<pre>', var_dump($cartDetails['size']), '</pre>';
            // exit;

            // The 1st condition: Make sure that the desired quantity is not more than (doesn't exceed) the available `stock` in `products_attributes` table
            // Get available product `stock` from `products_attributes` table
            $availableStock = \App\Models\ProductsAttribute::select('stock')->where([
                'product_id' => $cartDetails['product_id'],
                'size'       => $cartDetails['size']
            ])->first()->toArray();
            // echo '<pre>', var_dump($availableStock), '</pre>';
            // exit;
            if ($data['qty'] > $availableStock['stock']) { // if the user's desired quantity exceeds the available `stack` in `products_attributes` table    // $data['cartid'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                // Get the Cart Items (after UPDATE-ing the Cart Item Quantity) of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))
                $getCartItems = \App\Models\Cart::getCartItems();
                // dd($getCartItems);

                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'status'     => false,
                    'message'    => 'Product Stock is not available',
                    // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                    'view'       => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    

                    // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                    'headerview' => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
            
                ]);
            }

            // The 2nd condition: Make sure that the desired product `size` is not disabled/inactive (`status` is not zero 0) in `products_attributes` table)
            // Get product `status` from `products_attributes` table
            $availableSize =  \App\Models\ProductsAttribute::where([
                'product_id' => $cartDetails['product_id'],
                'size'       => $cartDetails['size'],
                'status'     => 1 // making sure that product size is active/enabled
            ])->count();
            // echo '<pre>', var_dump($availableSize), '</pre>';
            // exit;
            if ($availableSize == 0) { // if the desired product's `status` in `products_attributes` table is zero 0 (inactive/disabled)
                // Get the Cart Items (after UPDATE-ing the Cart Item Quantity) of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))
                $getCartItems = \App\Models\Cart::getCartItems();
                // dd($getCartItems);


                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'status'  => false,
                    'message' => 'Product Size is not available. Please remove this Product and choose another one!', // that size's `status` is zero 0 (inactive/disabled)
                    // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                    'view'    => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views

                    // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                    'headerview' => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                ]);
            }



            // Update the `quantity` in `carts` table (after passing the last conditions and checks)
            \App\Models\Cart::where('id', $data['cartid'])->update([ // $data['cartid'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
                'quantity' => $data['qty'] // $data['qty'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file
            ]);



            // Get the Cart Items (after UPDATE-ing the Cart Item Quantity) of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))
            $getCartItems = \App\Models\Cart::getCartItems();
            // dd($getCartItems);
            $totalCartItems = totalCartItems(); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139



            // We need to remove/empty (forget) the 'couponAmount' Session Variable (reset the whole process of Applying the Coupon) whenever a user applies a new coupon, or updates Cart items (changes items quantity for example) or deletes items from the Cart or even adds new items in the Cart    // Check 27:25 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
            \Session::forget('couponAmount'); // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
            \Session::forget('couponCode');   // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data



            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                'status'         => true,
                'totalCartItems' => $totalCartItems, // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139
                // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                'view'           => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views

                // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                'headerview' => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
            ]);
        }
    }

    // Delete a Cart Item AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js    // https://www.youtube.com/watch?v=GCZ8a3Dw_Zg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    public function cartDelete(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            // We need to remove/empty (forget) the 'couponAmount' Session Variable (reset the whole process of Applying the Coupon) whenever a user applies a new coupon, or updates Cart items (changes items quantity for example) or deletes items from the Cart or even adds new items in the Cart    // Check 27:25 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
            \Session::forget('couponAmount'); // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
            \Session::forget('couponCode');   // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data



            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;


            // Delete the Cart Item
            \App\Models\Cart::where('id', $data['cartid'])->delete(); // $data['cartid'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file


            // Get the Cart Items (after DELETE-ing the Cart Item Quantity) of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))
            $getCartItems = \App\Models\Cart::getCartItems();
            // dd($getCartItems);
            $totalCartItems = totalCartItems(); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139


            return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                // 'status' => true,
                'totalCartItems' => $totalCartItems, // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139
                // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                'view'   => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views

                // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                'headerview' => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
            ]);
        }
    }



    // Note: For Coupons module, user must be logged in (authenticated) to be able to redeem them. Both 'admins' and 'vendors' can add Coupons. Coupons added by 'vendor' will be available for their products ONLY, but ones added by 'admins' will be available for ALL products.
    // Coupon Code redemption (Apply coupon) / Coupon Code HTML Form submission via AJAX in front/products/cart_items.blade.php, check front/js/custom.js    // https://www.youtube.com/watch?v=uZrZKqZnYdA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=147
    public function applyCoupon(Request $request) {
        if ($request->ajax()) { // if the request is coming via an AJAX call
            $data = $request->all(); // Getting the name/value pairs array that are sent from the AJAX request (AJAX call) (through the 'data' object)
            // dd($data); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
            // echo '<pre>', var_dump($data), '</pre>';
            // exit;



            // We need to remove/empty (forget) the 'couponAmount' Session Variable (reset the whole process of Applying the Coupon) whenever a user applies a new coupon, or updates Cart items (changes items quantity for example) or deletes items from the Cart or even adds new items in the Cart    // Check 27:25 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
            \Session::forget('couponAmount'); // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data
            \Session::forget('couponCode');   // Deleting Data: https://laravel.com/docs/9.x/session#deleting-data



            $getCartItems = \App\Models\Cart::getCartItems();
            $totalCartItems = totalCartItems(); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139



            // Check the validity of the Coupon Code
            $couponCount = \App\Models\Coupon::where('coupon_code', $data['code'])->count(); // $data['code'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file

            if ($couponCount == 0) { // if the submitted coupon is wrong, send error message
                return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                    'status'         => false,
                    'totalCartItems' => $totalCartItems, // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139
                    'message'        => 'The coupon is invalid!',
                    // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                    'view'           => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                    // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                    'headerview'     => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                ]);

            } else { // if the submitted coupon is valid, check some conditions (do some validation)
                // https://www.youtube.com/watch?v=LIxst1rLvlY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149

                // echo 'Entered Coupon is valid!'; // For the sake of debugging
                // exit;

                // SUBMITTED COUPON CODE VALIDATION:

                // Get the coupon submitted (via AJAX) details
                $couponDetails = \App\Models\Coupon::where('coupon_code', $data['code'])->first(); // $data['code'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file


                // Check if the submitted coupon code is active/inactive (enabled/disabled/activated/deactivated)
                if ($couponDetails->status == 0) {
                    $message = 'The coupon is inactive!';
                }


                // Check if the submitted coupon code is expired
                $expiry_date  = $couponDetails->expiry_date;
                $current_date = date('Y-m-d'); // this date format is understandable by MySQL
                
                if ($expiry_date < $current_date) {
                    $message = 'The coupon is expired!';
                }



                // Managing coupon types in `coupons` table: 'Single Time' or 'Multiple Times': https://www.youtube.com/watch?v=CzePzLpAvlI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181
                if ($couponDetails->coupon_type == 'Single Time') { // if the `coupon_type` in `coupons` table is 'Single Time'
                    // Check in the `orders` table if the currently authenticated/logged-in user really used this Coupon Code with their order
                    $couponCount = \App\Models\Order::where([
                        'coupon_code' => $data['code'],
                        'user_id'     => \Auth::user()->id // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                    ])->count();

                    if ($couponCount >= 1) { // if this 'Single Time' coupon code has been used/redeemed more than one single time by this user (this authenticated/logged-in user) (i.e. meaning that if that coupon code is already existing in the `orders` table and has been used/redeemed by this authenticated/logged-in user)
                        $message = 'This coupon code is already availed by you!';
                    }
                }



                // Check if the submitted coupon code belongs to the correct relevant selected categories and subcategories of the coupon in the Admin Panel (for example, if the coupon is for Smartphones Category, user can't use it while buying T-shirts)
                // Get the coupon's categories and subcategories (if any)
                $catArr = explode(',', $couponDetails->categories);

                // Check 2:58 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
                $total_amount = 0;

                foreach ($getCartItems as $key => $item) {
                    if (!in_array($item['product']['category_id'], $catArr)) { // if the category of one of the products in the Cart doesn't belong to the Coupon's categories (the categories of the coupon selected by 'vendor' or 'admin' in the Admin Panel for the coupon)
                        $message = 'This coupon code selected categories is not for one of the selected products category!';
                    }

                    // Check 2:58 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
                    $attrPrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                    // dd($attrPrice); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($attrPrice), '</pre>';
                    // exit;
                    $total_amount = $total_amount + ($attrPrice['final_price'] * $item['quantity']);
                }


                // Check if the coupon code submitted by user is not available for that user (in case the coupon is already selected for certain specific users selected by 'admin' or 'vendor' in the Coupons tab in Admin Panel, and it's not available for all users)
                // Get the coupon's selected users
                // echo $couponDetails->users . '<br>';
                if (isset($couponDetails->users) && !empty($couponDetails->users)) {
                    $usersArr = explode(',', $couponDetails->users);
                    // dd($usersArr); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($usersArr), '</pre>';
                    // exit;
    
                    // Check if the submitted coupon code is available ONLY for some specific users (from the Coupons tab in Admin Panel in 'Select User (by email):') and check if the coupon is available or not for the user submitting the coupon code
                    if (count($usersArr)) { // if there's at least a one specific selected user for the coupon
                        // dd($usersArr); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                        // echo '<pre>', var_dump($usersArr), '</pre>';
                        // exit;
    
                        // Get user ids of all the selected users that the coupon code are available for them
                        foreach ($usersArr as $key => $user) {
                            $getUserId = \App\Models\User::select('id')->where('email', $user)->first()->toArray();
                            // echo '<pre>', var_dump($getUserId), '</pre>';
                            // exit;
                            $usersId[] = $getUserId['id'];
                        }
    
                        foreach ($getCartItems as $item) {
                            if (!in_array($item['user_id'], $usersId)) { // if the user id of one of the products in the Cart doesn't belong to the Coupon's specifically selected users (to check if the submitted coupon code is available to the user submitting it or not)
                                $message = 'This coupon code is not available for you! Try again with a valid coupon code! (The coupon code is available only for certain selected users!)';
                            }
                        }
                    }
                }


                // Check if the submitted Coupon code belongs to the Vendor of that product (in case that a vendor (not an 'admin') added that coupon code, because vendor coupon codes are available ONLY for the products of that vendor, and not available for all other products. In contrast, 'Admin' coupon codes are available for ALL products)
                // Vendor's Coupons are eligible only for that vendor's products
                if ($couponDetails->vendor_id > 0) { // Check if submitted coupon code belongs to a 'vendor' (becasue a vendor' coupon is available ONLY for that vendor's products (not all products), whereas admin's coupons are available for all products)
                    // Get all the products ids of that very vendor
                    // echo $couponDetails->vendor_id . '<br>';

                    $productIds = \App\Models\Product::select('id')->where('vendor_id', $couponDetails->vendor_id)->pluck('id')->toArray();
                    // dd($productIds); // dd() method DOESN'T WORK WITH AJAX! - SHOWS AN ERROR!! USE var_dump() and exit; INSTEAD!
                    // echo '<pre>', var_dump($productIds), '</pre>';
                    // exit;

                    foreach ($getCartItems as $item) {
                        if (!in_array($item['product']['id'], $productIds)) { // if the user id of one of the products in the Cart doesn't belong to the products ids of that vendor (to check if the submitted coupon code pertains to that specific/very vendor or not)
                            $message = 'This coupon code is not available for you! Try again with a valid coupon code! (vendor validation)!. The coupon code exists but one of the products in the Cart doesn\'t belong to that specific vendor who created that Coupon';
                        }
                    }
                }


                // If there's an error message with the submitted coupon code, send this response to the AJAX call
                if (isset($message)) {
                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'status'         => false,
                        'totalCartItems' => $totalCartItems, // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139
                        'message'        => $message,
                        // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                        'view'           => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                        // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                        'headerview'     => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                    ]);

                } else { // if the sumbitted coupon code is correct and passes the previous coupon code validation and passes all the previous if conditions (free of errors)
                    // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149

                    // Check if the submitted Coupon code Amount Type is 'Fixed' or 'Percentage'
                    if ($couponDetails->amount_type == 'Fixed') { // if the submitted coupon code Amount Type is 'Fixed'
                        $couponAmount = $couponDetails->amount; // As is
                    } else { // if the submitted coupon code Amount Type is 'Percentage'
                        $couponAmount = $total_amount * ($couponDetails->amount / 100);
                    }


                    $grand_total = $total_amount - $couponAmount;


                    // Assign the Coupon Code and $couponAmount to Session Variables
                    \Session::put('couponAmount', $couponAmount);
                    \Session::put('couponCode'  , $data['code']); // $data['code'] comes from the 'data' object sent from inside the $.ajax() method in front/js/custom.js file

                    $message = 'Coupon Code successfully applied. You are availing discount!';


                    return response()->json([ // JSON Responses: https://laravel.com/docs/9.x/responses#json-responses
                        'status'         => true,
                        'totalCartItems' => $totalCartItems, // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139
                        'couponAmount'   => $couponAmount,
                        'grand_total'    => $grand_total,
                        'message'        => $message,
                        // We'll use that array key 'view' as a JavaScript 'response' property to render the view (    $('#appendCartItems').html(resp.view);    ). Check front/js/custom.js
                        'view'           => (String) \Illuminate\Support\Facades\View::make('front.products.cart_items')->with(compact('getCartItems')), // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                        // We added this view later (Mini Cart Widget) (separate file) in https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                        'headerview'     => (String) \Illuminate\Support\Facades\View::make('front.layout.header_cart_items')->with(compact('getCartItems')) // View Responses: https://laravel.com/docs/9.x/responses#view-responses    // Creating & Rendering Views: https://laravel.com/docs/9.x/views#creating-and-rendering-views    // Passing Data To Views: https://laravel.com/docs/9.x/views#passing-data-to-views
                    ]);
                }
            }
        }
    }



    // Checkout page (using match() method for the 'GET' request for rendering the front/products/checkout.blade.php page or the 'POST' request for the HTML Form submission in the same page) (for submitting the user's Delivery Address and Payment Method))    // https://www.youtube.com/watch?v=qzLinru4vkU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=152
    public function checkout(Request $request) {
        // https://www.youtube.com/watch?v=FUQyTb1vOI4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=192
        // Fetch all of the world countries from the database table `countries`: https://www.youtube.com/watch?v=zENahhmAM0w&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=30
        $countries = \App\Models\Country::where('status', 1)->get()->toArray(); // get the countries which have status = 1 (to ignore the blacklisted countries, in case)
        // dd($countries);

        // https://www.youtube.com/watch?v=3SuuAAyUgNw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=158
        // Get the Cart Items of a cerain user (using their `user_id` if they're authenticated/logged in or their `session_id` if they're not authenticated/not logged in (guest))    // https://www.youtube.com/watch?v=I98dEyyrZLU&list=PLLUtELdNs2ZYTlQ97V1Tl8mirS3qXHNFZ&index=120
        $getCartItems = \App\Models\Cart::getCartItems();
        // dd($getCartItems);


        // If the Cart is empty (If there're no Cart Items), don't allow opening/accessing the Checkout page (checkout.blade.php)    // https://www.youtube.com/watch?v=nGNkJBGqjlY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=161
        if (count($getCartItems) == 0) {
            $message = 'Shopping Cart is empty! Please add products to your Cart to checkout';

            return redirect('cart')->with('error_message', $message); // redirect user to the cart.blade.php page, and show an error message in cart.blade.php
        }


        // Calculate the total price    // https://www.youtube.com/watch?v=krS-KXdMQ64&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=190
        $total_price  = 0;
        $total_weight = 0;

        foreach ($getCartItems as $item) {
            // dd($item);
            // echo '<pre>', var_dump($item), '</pre>';
            
            $attrPrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
            $total_price = $total_price + ($attrPrice['final_price'] * $item['quantity']);

            // https://www.youtube.com/watch?v=FUQyTb1vOI4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=192
            $product_weight = $item['product']['product_weight'];
            $total_weight = $total_weight + $product_weight;
        }
        // dd($total_price);
        // dd($total_weight);


        $deliveryAddresses = \App\Models\DeliveryAddress::deliveryAddresses(); // the delivery addresses of the currently authenticated/logged in user
        // dd($deliveryAddresses);
        // echo '<pre>', var_dump($deliveryAddresses), '</pre>';


        // Calculating the Shipping Charges of every one of the user's Delivery Addresses (depending on the 'country' of the Delivery Address)    // https://www.youtube.com/watch?v=krS-KXdMQ64&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=190
        foreach ($deliveryAddresses as $key => $value) {
            // echo '<pre>', var_dump($key), '</pre>';
            // echo '<pre>', var_dump($value), '</pre>';

            $shippingCharges = \App\Models\ShippingCharge::getShippingCharges($total_weight, $value['country']);
            // dd($shippingCharges);
            // echo '<pre>', var_dump($shippingCharges), '</pre>';
            

            // Append/Add the Shipping Charge of every Delivery Address (depending on the 'country' of the Delivery Addresss) to the $deliveryAddresses array
            $deliveryAddresses[$key]['shipping_charges'] = $shippingCharges;
        }
        // dd($deliveryAddresses);
        // dd($shippingCharges);


        // Check 15:09 in https://www.youtube.com/watch?v=3SuuAAyUgNw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=159
        if ($request->isMethod('post')) { // if the <form> in front/products/checkout.blade.php is submitted (the HTML Form that the user submits to submit their Delivery Address and Payment Method)
            $data = $request->all();
            // dd($data);


            // Website Security
            // Note: We need to prevent orders (upon checkout and payment) of the 'disabled' products (`status` = 0), where the product ITSELF can be disabled in admin/products/products.blade.php (by checking the `products` database table) or a product's attribute (`stock`) can be disabled in 'admin/attributes/add_edit_attributes.blade.php' (by checking the `products_attributes` database table). We also prevent orders of the out of stock / sold-out products (by checking the `products_attributes` database table). Check https://www.youtube.com/watch?v=TpprgD6ZaZM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=194
            foreach ($getCartItems as $item) {
                // Prevent 'disabled' (`status` = 0) products from being ordered (if it's disabled in admin/products/products.blade.php) by checking the `products` database table
                $product_status = \App\Models\Product::getProductStatus($item['product_id']);
                if ($product_status == 0) { // if the product is disabled (`status` = 0)
                    /* \App\Models\Product::deleteCartProduct($item['product_id']); // Delete the item from the Cart

                    $message = 'One of the products is disabled! Please try again.'; */
                    $message = $item['product']['product_name'] . ' with ' . $item['size'] . ' size is not available. Please remove it from the Cart and choose another product.';
                    return redirect('/cart')->with('error_message', $message); // Redirect to the Cart page with an error message
                }
            }

            // Preventing out of stock / sold out products from being ordered (by checking the `products_attributes` database table)
            $getProductStock = \App\Models\ProductsAttribute::getProductStock($item['product_id'], $item['size']); // A product (`product_id`) with a certain `size`
            if ($getProductStock == 0) { // if the product's `stock` is 0 zero
                /* \App\Models\Product::deleteCartProduct($item['product_id']); // Delete the item from the Cart

                $message = 'One of the products is sold out! Please try again.'; */
                $message = $item['product']['product_name'] . ' with ' . $item['size'] . ' size is not available. Please remove it from the Cart and choose another product.';
                return redirect('/cart')->with('error_message', $message); // Redirect to the Cart page with an error message
            }

            // Preventing the products with 'disabled' Product Attributes (in admin/attributes/add_edit_attributes.blade.php) from being ordered (by checking the `products_attributes` database table)
            $getAttributeStatus = \App\Models\ProductsAttribute::getAttributeStatus($item['product_id'], $item['size']); // A product (`product_id`) with a certain `size`
            if ($getAttributeStatus == 0) { // if the product's `stock` is 0 zero
                /* \App\Models\Product::deleteCartProduct($item['product_id']); // Delete the item from the Cart

                $message = 'One of the products\' attributes is disabled! Please try again.'; */
                $message = $item['product']['product_name'] . ' with ' . $item['size'] . ' size is not available. Please remove it from the Cart and choose another product.';
                return redirect('/cart')->with('error_message', $message); // Redirect to the Cart page with an error message
            }

            // Note: We also prevent making orders of the products of the Categories that are disabled (`status` = 0) (whether the Category is a Child Category or a Parent Category (Root Category) is disabled) in admin/categories/categories.blade.php. Check https://www.youtube.com/watch?v=tfkA9ATahiA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=195
            $getCategoryStatus = \App\Models\Category::getCategoryStatus($item['product']['category_id']);
            if ($getCategoryStatus == 0) { // if the Category is disabled (`status` = 0)
                /* \App\Models\Product::deleteCartProduct($item['product_id']); // Delete the item from the Cart

                $message = 'One of the products\' Category is disabled! Please try again.'; */
                $message = $item['product']['product_name'] . ' with ' . $item['size'] . ' size is not available. Please remove it from the Cart and choose another product.';
                return redirect('/cart')->with('error_message', $message); // Redirect to the Cart page with an error message
            }


            // Validation:
            // Delivery Address Validation
            if (empty($data['address_id'])) { // if the user doesn't select a Delivery Address
                $message = 'Please select Delivery Address!';

                return redirect()->back()->with('error_message', $message);
            }

            // Payment Method Validation
            if (empty($data['payment_gateway'])) { // if the user doesn't select a Delivery Address
                $message = 'Please select Payment Method!';

                return redirect()->back()->with('error_message', $message);
            }

            // Agree to T&C (Accept Terms and Conditions) Validation
            if (empty($data['accept'])) { // if the user doesn't select a Delivery Address
                $message = 'Please agree to T&C!';

                return redirect()->back()->with('error_message', $message);
            }



            // If user passes Validation, we start Placing Order:
            // echo 'Ready to place order';
            // exit;
            // dd($data);


            // Note: For the Orders module, we created two database tables: orders and orders_products tables. The first one holds/stores the main information about the orders of a user (e.g. delivery address, coupon code, shipping, payment method, ...etc), and the second one holds/stores the detailed information about the order (the items/products that are bought by the order and product name, code, color, size, price, ...etc). There is a one-to-many relationship between the two tables where one order can have many order products.


            // Now, we'll collect the necessary data to fill in the `orders` and `orders_products` database tables    // https://www.youtube.com/watch?v=nGNkJBGqjlY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=161

            // Get the Delivery Address from    $data['address_id']
            $deliveryAddress = \App\Models\DeliveryAddress::where('id', $data['address_id'])->first()->toArray();
            // dd($deliveryAddress);

            // https://www.youtube.com/watch?v=nGNkJBGqjlY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=161
            // If the selected `payment_gateway` is 'COD', set the `payment_method` as 'COD' too (and `order_status` is 'New'), otherwise it's always 'prepaid' (and `order_status` is 'Pending')
            if ($data['payment_gateway'] == 'COD') {
                $payment_method = 'COD';
                $order_status   = 'New';

            } else { // if the user selects any `payment_gateway` other than 'COD', this means that the `payment_method` is 'prepaid'  (and `order_status` is 'pending')
                $payment_method = 'Prepaid';
                $order_status   = 'Pending'; // And after payment confirmation, `order_status` becomes 'Payment Captured'. (We'll create the API that will convert this to either 'Payment Captured' or 'Canceled')
            }


            // Note: !!DATABASE TRANSACTION!! Firstly, we'll save the order in the `orders` table, then take the newly generated order `id` to use it to fill in the `order_id` column in the `orders_products` table, and fill in the `orders_products` table    // Check 6:58 in https://www.youtube.com/watch?v=EvFgN74IFlc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=99
            // Database Transactions: https://laravel.com/docs/9.x/database#database-transactions
            \DB::beginTransaction();

            // Calculate Subtotal, Grand Total `grand_total` and Coupon Discount `coupon_amount` (to fill in the `orders` table)
            // Calculate Grand Total `grand_total
            // Get the Total Price (the 'Subtotal')
            $total_price = 0;
            foreach ($getCartItems as $item) {
                $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']);
            }

            // Calculate Shipping Charges `shipping_charges`
            $shipping_charges = 0;

            // Get the Shipping Charge based on the chosen Delivery Address    // https://www.youtube.com/watch?v=krS-KXdMQ64&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=190
            $shipping_charges = \App\Models\ShippingCharge::getShippingCharges($total_weight, $deliveryAddress['country']);
            // dd($shipping_charges);

            // Grand Total (`grand_total`)
            $grand_total = $total_price + $shipping_charges - \Session::get('couponAmount');

            // Store the $grand_total in Session to be able to use it wherever we need it later on (for example, it'll be used in front/paypal/paypal.blade.php)
            \Session::put('grand_total', $grand_total); // Storing Data: https://laravel.com/docs/10.x/session#storing-data

            // echo $total_price . '<br>'; // 'Subtotal'
            // exit;


            // INSERT the data we collected INTO the `orders` database table
            $order = new \App\Models\Order; // Create a new Order.php model object (represents the `orders` table)

            // Assign the $order data to be INSERT-ed INTO the `orders` table
            $order->user_id          = \Auth::user()->id; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            $order->name             = $deliveryAddress['name'];
            $order->address          = $deliveryAddress['address'];
            $order->city             = $deliveryAddress['city'];
            $order->state            = $deliveryAddress['state'];
            $order->country          = $deliveryAddress['country'];
            $order->pincode          = $deliveryAddress['pincode'];
            $order->mobile           = $deliveryAddress['mobile'];
            $order->email            = \Auth::user()->email; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
            $order->shipping_charges = $shipping_charges;
            $order->coupon_code      = \Session::get('couponCode');
            $order->coupon_amount    = \Session::get('couponAmount');
            $order->order_status     = $order_status;
            $order->payment_method   = $payment_method;
            $order->payment_gateway  = $data['payment_gateway'];
            $order->grand_total      = $grand_total;

            $order->save(); // INSERT data INTO the `orders` table

            // Get the last generated `id` of the the last inserted order in the `orders` table (to be able to store it in the `order_id` column in the `orders_products` table)
            $order_id = \DB::getPdo()->lastInsertId();
            // dd(\DB::getPdo());



            // INSERT/Fill in the data of the order in the `orders_products` table (after filling in the `orders` table)
            foreach ($getCartItems as $item) {
                $cartItem = new \App\Models\OrdersProduct; // Create a new OrdersProduct.php model object (represents the `orders_products` table)

                // Assign the order product/item data to be INSERT-ed INTO the `orders_products` table
                $cartItem->order_id = $order_id;
                $cartItem->user_id  = \Auth::user()->id; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

                // Get some product details of the Cart Items from the `products` table (to be able to fill in data in the `orders_products` table)
                $getProductDetails = \App\Models\Product::select('product_code', 'product_name', 'product_color', 'admin_id', 'vendor_id')->where('id', $item['product_id'])->first()->toArray();
                // dd($getProductDetails);

                // Continue filling in data into the `orders_products` table
                $cartItem->admin_id        = $getProductDetails['admin_id'];
                $cartItem->vendor_id       = $getProductDetails['vendor_id'];
                $cartItem->product_id      = $item['product_id'];
                $cartItem->product_code    = $getProductDetails['product_code'];
                $cartItem->product_name    = $getProductDetails['product_name'];
                $cartItem->product_color   = $getProductDetails['product_color'];
                $cartItem->product_size    = $item['size'];

                $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                $cartItem->product_price   = $getDiscountAttributePrice['final_price'];

                $cartItem->product_qty     = $item['quantity'];

                $cartItem->save(); // INSERT data INTO the `orders_products` table


                // Inventory Management - Reduce inventory/stock when an order gets placed: https://www.youtube.com/watch?v=9lo1j-jyEBE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=193
                // We wrote the Inventory/Stock Management script in TWO places: in the checkout() method in Front/ProductsController.php and in the success() method in Front/PaypalController.php. Check https://www.youtube.com/watch?v=9lo1j-jyEBE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=193
                $getProductStock = \App\Models\ProductsAttribute::getProductStock($item['product_id'], $item['size']); // Get the `stock` of that product `product_id` with that specific `size` from `products_attributes` table
                $newStock = $getProductStock - $item['quantity']; // The new product `stock` is the original stock reduced by the order `quantity`
                \App\Models\ProductsAttribute::where([ // Update the new `quantity` in the `products_attributes` table
                    'product_id' => $item['product_id'],
                    'size'       => $item['size']
                ])->update(['stock' => $newStock]);
            }


            // Store the `order_id` in Session so that we can use it in front/products/thanks.blade.php, thanks() method and paypal() method in Front/PayPalController.php
            \Session::put('order_id', $order_id); // Storing Data: https://laravel.com/docs/9.x/session#storing-data


            \DB::commit(); // commit the Database Transaction


            // echo 'Order placed successfully!';
            // exit;


            // dd($data['payment_gateway']);


            // Send placing an order confirmation email to the user    // https://www.youtube.com/watch?v=dF7OhPttepE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=169
            // Note: We send placing an order confirmation email and SMS to the user right away (immediately) if the order is "COD", but if the order payment method is like PayPal or any other payment gateway, we send the order confirmation email and SMS after the user makes the payment. Check https://www.youtube.com/watch?v=dF7OhPttepE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=169
            $orderDetails = \App\Models\Order::with('orders_products')->where('id', $order_id)->first()->toArray();// Eager Loading: https://laravel.com/docs/9.x/eloquent-relationships#eager-loading    // 'orders_products' is the relationship method name in Order.php model
            // dd($orderDetails);

            if ($data['payment_gateway'] == 'COD') { // if the `payment_gateway` selected by the user is 'COD' (in front/products/checkout.blade.php), we send the placing the order confirmation email and SMS immediately
                // Sending the Order confirmation email
                $email = \Auth::user()->email; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user

                // The email message data/variables that will be passed in to the email view
                $messageData = [
                    'email'        => $email,
                    'name'         => \Auth::user()->name, // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                    'order_id'     => $order_id,
                    'orderDetails' => $orderDetails
                ];

                \Illuminate\Support\Facades\Mail::send('emails.order', $messageData, function ($message) use ($email) { // Sending Mail: https://laravel.com/docs/9.x/mail#sending-mail    // 'emails.order' is the order.blade.php file inside the 'resources/views/emails' folder that will be sent as an email    // We pass in all the variables that order.blade.php will use    // https://www.php.net/manual/en/functions.anonymous.php
                    $message->to($email)->subject('Order Placed - StackDevelopers.in');
                });

                /*
                // Sending the Order confirmation SMS
                // Send an SMS using an SMS API and cURL    // https://www.youtube.com/watch?v=dF7OhPttepE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=170
                $message = 'Dear Customer, your order ' . $order_id . ' has been placed successfully with StackDevelopers.in. We will inform you once your order is shipped';
                // $mobile = $data['mobile']; // the user's mobile that they entered while submitting the registration form
                $mobile = \Auth::user()->moblie; // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user
                \App\Models\Sms::sendSms($message, $mobile); // Send the SMS
                */


            // PayPal payment gateway integration in Laravel: https://www.youtube.com/watch?v=eps18cJxUoQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=182
            } elseif ($data['payment_gateway'] == 'Paypal') {
                // redirect to the PayPalController.php (after saving the order details in `orders` and `orders_products` tables)
                return redirect('/paypal');

            } else { // if the `payment_gateway` selected by the user is not 'COD', meaning it's like PayPal, Prepaid, ... (in front/products/checkout.blade.php), we send the placing the order confirmation email and SMS after the user makes the payment
                echo 'Other Prepaid payment methods coming soon';
            }


            return redirect('thanks'); // redirect to front/products/thanks.blade.php page
        }


        return view('front.products.checkout')->with(compact('deliveryAddresses', 'countries', 'getCartItems', 'total_price'));
    }



    // Rendering Thanks page (after placing an order)    // https://www.youtube.com/watch?v=fQPYHPDR9wI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=162
    public function thanks() {
        if (\Session::has('order_id')) { // if there's an order has been placed, empty the Cart (remove the order (the cart items/products) from `carts`table)    // 'user_id' was stored in Session inside checkout() method in Front/ProductsController.php
            // We empty the Cart after placing the order
            \App\Models\Cart::where('user_id', \Auth::user()->id)->delete(); // Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user


            return view('front.products.thanks');
        } else { // if there's no order has been placed
            return redirect('cart'); // redirect user to cart.blade.php page
        }
    }

}