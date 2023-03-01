<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); // Protecting Routes: https://laravel.com/docs/9.x/authentication#protecting-routes

require __DIR__.'/auth.php';




// dd(Illuminate\Support\Facades\Auth::class);
// dd(Illuminate\Support\Facades\Auth::user());
// dd(auth());
// dd(auth()->user());



// Note: OUR WEBSITE WILL HAVE TWO MAJOR SECTIONS: ADMIN ROUTES & FRONT ROUTES!



// NOTE: ALL THE ROUTES INSIDE THIS PREFIX STATRT WITH 'admin/', SO THOSE ROUTES INSIDE THE PREFIX, YOU DON'T WRITE '/admin' WHEN YOU DEFINE THEM, IT'LL BE DEFINED AUTOMATICALLY!!
// The website 'ADMIN' Section: Route Group (for routes starting with 'admin' (Admin Route Group)) (https://laravel.com/docs/9.x/routing#route-group-prefixes)
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function() {
    // Matches the 'admin/login' URL
    Route::match(['get', 'post'], 'login', 'AdminController@login'); // match() method is used to use more than one HTTP request method for the same route, so GET for rendering the login.php page, and POST for the login.php page <form> submission (e.g. GET and POST)
    // Matches the 'admin/dashboard' URL
    // Route::get('dashboard', 'AdminController@dashboard');

    // Protected routes or protecting routes:
    // Route Groups: https://laravel.com/docs/9.x/routing#route-groups
    // Route Group (A middleware Route Group) (Applying our 'admin' middleware (our App\Http\Middleware\Admin))
    /*
    Route::middleware(['admin'])->group(function() {
        Route::get('dashboard', 'AdminController@dashboard');
    });
    */
    // This is the same as last couple of lines of code
    // This a Route Group for routes that ALL start with 'admin/-something' and utilized the 'admin' Authentication Guard    // Note: You must remove the '/admin'/ part from the routes that are written inside this Route Group
    Route::group(['middleware' => ['admin']], function() { // using our 'admin' guard (which we created in auth.php)
        Route::get('dashboard', 'AdminController@dashboard'); // Admin login
        Route::get('logout', 'AdminController@logout'); // Admin logout
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword'); // GET request to view the update password <form>, and a POST request to submit the update password <form>
        Route::post('check-admin-password', 'AdminController@checkAdminPassword'); // Check Admin Password // This route is called from the AJAX call in admin/js/custom.js page    // https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails'); // Update Admin Details in update_admin_details.blade.php page    // 'GET' method to show the update_admin_details.blade.php page, and 'POST' method for the <form> submission in the same page
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails'); // Update Vendor Details    // In the slug we can pass: 'personal' which means update vendor personal details, or 'business' which means update vendor business details, or 'bank' which means update vendor bank details    // We'll create one view (not 3) for the 3 pages, but parts inside it will change depending on the $slug value    // https://laravel.com/docs/9.x/routing#route-parameters    // https://www.youtube.com/watch?v=9l8YuyPjAUg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=22    // GET method to show the update admin details page, POST method for <form> submission
        Route::get('admins/{type?}', 'AdminController@admins'); // In case the authenticated user (logged in user) is superadmin, admin, subadmin, vendor these are the three Admin Management URLs depending on the slug. The slug is the `type` column in `admins` table which can only be: superadmin, admin, subadmin, or vendor    // Used an Optional Route Parameters (or Optional Route Parameters) using a '?' question mark sign, for in case that there's no any {type} passed, the page will show ALL superadmins, admins, subadmins and vendors at the same page. Check: https://laravel.com/docs/9.x/routing#parameters-optional-parameters
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails'); // View further 'vendor' details inside Admin Management table (if the authenticated user is superadmin, admin or subadmin)
        Route::post('update-admin-status', 'AdminController@updateAdminStatus'); // Update Admin Status using AJAX in admins.blade.php    // https://www.youtube.com/watch?v=zabqYC14oKU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=28
    

        // Sections (Sections, Categories, Subcategories, Products, Attributes)
        Route::get('sections', 'SectionController@sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus'); // Update Sections Status using AJAX in sections.blade.php    // https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
        Route::get('delete-section/{id}', 'SectionController@deleteSection'); // Delete a section in sections.blade.php    // https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit/Update the section, and if not passed, this means Add a Section    // https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters

        // Categories
        Route::get('categories', 'CategoryController@categories'); // Categories in Catalogue Management in Admin Panel
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus'); // Update Categories Status using AJAX in categories.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit/Update the Category, and if not passed, this means Add a Category    // https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=38
        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel'); // Show Categories <select> <option> depending on the choosed Section (show the relevant categories of the choosed section) using AJAX in admin/js/custom.js in append_categories_level.blade.php page    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory'); // Delete a category in categories.blade.php    // https://www.youtube.com/watch?v=uHYf4HmJTS8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=41
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage'); // Delete a category image in add_edit_category.blade.php from BOTH SERVER (FILESYSTEM) & DATABASE    // https://www.youtube.com/watch?v=uHYf4HmJTS8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42

        // Brands    // https://www.youtube.com/watch?v=ICe1NOaPB8w&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
        Route::get('brands', 'BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus'); // Update Brands Status using AJAX in brands.blade.php
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand'); // Delete a brand in brands.blade.php
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit/Update the brand, and if not passed, this means Add a Brand    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters

        // Products    // https://www.youtube.com/watch?v=hTP1Tk1018M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=45
        Route::get('products', 'ProductsController@products'); // render products.blade.php in the Admin Panel
        Route::post('update-product-status', 'ProductsController@updateProductStatus'); // Update Products Status using AJAX in products.blade.php
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct'); // Delete a product in products.blade.php
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductsController@addEditProduct'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Product', and if not passed, this means' Add a Product'    // GET request to render the add_edit_product.blade.php view, and POST request to submit the <form> in that view    // https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters
        Route::get('delete-product-image/{id}', 'ProductsController@deleteProductImage'); // Delete a product images (in the three folders: small, medium and large) in add_edit_product.blade.php page from BOTH SERVER (FILESYSTEM) & DATABASE    // https://www.youtube.com/watch?v=0vLLzemWUmk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=53
        Route::get('delete-product-video/{id}', 'ProductsController@deleteProductVideo'); // Delete a product video in add_edit_product.blade.php page from BOTH SERVER (FILESYSTEM) & DATABASE    // https://www.youtube.com/watch?v=0vLLzemWUmk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=53

        // Attributes
        Route::match(['get', 'post'], 'add-edit-attributes/{id}', 'ProductsController@addAttributes'); // GET request to render the add_edit_attributes.blade.php view, and POST request to submit the <form> in that view    // https://www.youtube.com/watch?v=gaLXLO5knpc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=52
        Route::post('update-attribute-status', 'ProductsController@updateAttributeStatus'); // Update Attributes Status using AJAX in add_edit_attributes.blade.php
        Route::get('delete-attribute/{id}', 'ProductsController@deleteAttribute'); // Delete an attribute in add_edit_attributes.blade.php
        Route::match(['get', 'post'], 'edit-attributes/{id}', 'ProductsController@editAttributes'); // in add_edit_attributes.blade.php

        // Images
        Route::match(['get', 'post'], 'add-images/{id}', 'ProductsController@addImages'); // GET request to render the add_edit_attributes.blade.php view, and POST request to submit the <form> in that view    // https://www.youtube.com/watch?v=gaLXLO5knpc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=52
        Route::post('update-image-status', 'ProductsController@updateImageStatus'); // Update Images Status using AJAX in add_images.blade.php
        Route::get('delete-image/{id}', 'ProductsController@deleteImage'); // Delete an image in add_images.blade.php

        // Banners
        Route::get('banners', 'BannersController@banners');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus'); // Update Categories Status using AJAX in banners.blade.php    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=66
        Route::get('delete-banner/{id}', 'BannersController@deleteBanner'); // Delete a banner in banners.blade.php    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannersController@addEditBanner'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Banner', and if not passed, this means' Add a Banner'    // GET request to render the add_edit_banner.blade.php view, and POST request to submit the <form> in that view    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=YErUqekh47E&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67

        // Filters
        Route::get('filters', 'FilterController@filters'); // Render filters.blade.php page    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        Route::post('update-filter-status', 'FilterController@updateFilterStatus'); // Update Filter Status using AJAX in filters.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        Route::post('update-filter-value-status', 'FilterController@updateFilterValueStatus'); // Update Filter Value Status using AJAX in filters_values.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        // Route::get('delete-filter/{id}', 'FilterController@deletefilter'); // Delete a filter in filters.blade.php
        Route::get('filters-values', 'FilterController@filtersValues'); // Render filters_values.blade.php page    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        Route::match(['get', 'post'], 'add-edit-filter/{id?}', 'FilterController@addEditFilter'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the filter', and if not passed, this means' Add a filter'    // GET request to render the add_edit_filter.blade.php view, and POST request to submit the <form> in that view    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=pGepSLCXH1Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=84
        Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', 'FilterController@addEditFilterValue'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Filter Value', and if not passed, this means' Add a Filter Value'    // GET request to render the add_edit_filter_value.blade.php view, and POST request to submit the <form> in that view    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=mT_mMOM3KzM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=85
        Route::post('category-filters', 'FilterController@categoryFilters'); // Show the related filters depending on the selected category <select> in category_filters.blade.php (which in turn is included by add_edit_product.php) using AJAX. Check admin/js/custom.js    // https://www.youtube.com/watch?v=T7dcxauNyQc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=89

        // Coupons
        Route::get('coupons', 'CouponsController@coupons'); // Render admin/coupons/coupons.blade.php page in the Admin Panel    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143
        Route::post('update-coupon-status', 'CouponsController@updateCouponStatus'); // Update Coupon Status (active/inactive) via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143
        Route::get('delete-coupon/{id}', 'CouponsController@deleteCoupon'); // Delete a Coupon via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=VYUjkgA9W0k&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=143
        // Render admin/coupons/add_edit_coupon.blade.php page with 'GET' request ('Edit/Update the Coupon') if the {id?} Optional Parameter is passed, or if it's not passed, it's a GET request too to 'Add a Coupon', or it's a POST request for the HTML Form submission in the same page    // https://www.youtube.com/watch?v=SJ4rhQ71fj4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=144
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', 'CouponsController@addEditCoupon'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Coupon', and if not passed, this means' Add a Coupon'    // GET request to render the add_edit_coupon.blade.php view (whether Add or Edit depending on passing or not passing the Optional Parameter {id?}), and POST request to submit the <form> in that same page    // {id?} Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=SJ4rhQ71fj4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=144

        // Users
        Route::get('users', 'UserController@users'); // Render admin/users/users.blade.php page in the Admin Panel    // https://www.youtube.com/watch?v=xY9OYug0uaQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=150
        Route::post('update-user-status', 'UserController@updateUserStatus'); // Update User Status (active/inactive) via AJAX in admin/users/users.blade.php, check admin/js/custom.js    // https://www.youtube.com/watch?v=xY9OYug0uaQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=151
    });
});

// Admin Login page Route WTIHOUT Admin Group
// Route::get('admin/login', ['App\Http\Controllers\Admin\AdminController', 'login']); // is the same as:    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\AdminController@login');

// Admin Dashboard Route WTIHOUT Admin Route Group
// Route::get('admin/dashboard', ['App\Http\Controllers\Admin\AdminController', 'dashboard']); // is the same as:    Route::get('admin/dashboard', 'App\Http\Controllers\Admin\AdminController@dashboard');






// The website 'FRONT' Section routes: (Route Groups: https://laravel.com/docs/9.x/routing#route-groups)
Route::namespace('App\Http\Controllers\Front')->group(function() {
    Route::get('/', 'IndexController@index');


    // Dynamic Routes for the `url` column in the `categories` table using a foreach loop    // Check 8:42 in https://www.youtube.com/watch?v=JzKi78lyz0g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=76
    // Listing/Categories Routes
    // $catUrls = \App\Models\Category::select('url')->where('status', 1)->get()->toArray();
    $catUrls = \App\Models\Category::select('url')->where('status', 1)->get()->pluck('url')->toArray(); // Routes like: /men, /women, /shirts, ...    // https://laravel.com/docs/9.x/collections#method-pluck
    // dd($catUrls);
    foreach ($catUrls as $key => $url) {
        Route::match(['get', 'post'], '/' . $url, 'ProductsController@listing'); // used match() for the 'POST' method of the AJAX request of the Sorting Filter in listing.blade.php    // e.g.    /men    or    /computers
    }


    // Vendor Login/Register
    Route::get('vendor/login-register', 'VendorController@loginRegister'); // render vendor login_register.blade.php page

    // Vendor Register
    Route::post('vendor/register', 'VendorController@vendorRegister'); // the register HTML form submission in vendor login_register.blade.php page

    // Confirm Vendor Account (from 'vendor_confirmation.blade.php) from the mail by Mailtrap    // https://www.youtube.com/watch?v=UcN-IMTUWOA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=100
    Route::get('vendor/confirm/{code}', 'VendorController@confirmVendor'); // {code} is the base64 encoded vendor e-mail with which they have registered which is a Route Parameters/URL Paramters: https://laravel.com/docs/9.x/routing#required-parameters    // this route is requested (accessed/opened) from inside the mail sent to vendor (vendor_confirmation.blade.php)

    // Render Single Product Detail Page in front/products/detail.blade.php    // Check 19:09 in https://www.youtube.com/watch?v=fv9ZnNRKBBE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=103
    Route::get('/product/{id}', 'ProductsController@detail'); // Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters

    // The AJAX call from front/js/custom.js file, to show the the correct related `price` and `stock` depending on the selected `size` (from the `products_attributes` table)) by clicking the size <select> box in front/products/detail.blade.php    // https://www.youtube.com/watch?v=T6ZyTfYLKRU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=106
    Route::post('get-product-price', 'ProductsController@getProductPrice');

    // Show all Vendor products in front/products/vendor_listing.blade.php    // This route is accessed from the <a> HTML element in front/products/vendor_listing.blade.php    // https://www.youtube.com/watch?v=S8xbldfdLXc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=111
    Route::get('/products/{vendorid}', 'ProductsController@vendorListing'); // Required Parameters: https://laravel.com/docs/9.x/routing#required-parameters

    // Add to Cart <form> submission in front/products/detail.blade.php    // https://www.youtube.com/watch?v=LmovzZ9zdzE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=116
    Route::post('cart/add', 'ProductsController@cartAdd');

    // Render Cart page (front/products/cart.blade.php)    // this route is accessed from the <a> HTML tag inside the flash message inside cartAdd() method in Front/ProductsController.php (inside front/products/detail.blade.php)
    Route::get('cart', 'ProductsController@cart')->name('cart');

    // Update Cart Item Quantity AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js    // https://www.youtube.com/watch?v=yqkYp_iHsxQ&list=PLLUtELdNs2ZYTlQ97V1Tl8mirS3qXHNFZ&index=118
    Route::post('cart/update', 'ProductsController@cartUpdate');

    // Delete a Cart Item AJAX call in front/products/cart_items.blade.php. Check front/js/custom.js    // https://www.youtube.com/watch?v=GCZ8a3Dw_Zg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    Route::post('cart/delete', 'ProductsController@cartDelete');



    // Render User Login/Register page (front/users/login_register.blade.php)    // https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    Route::get('user/login-register', ['as' => 'login', 'uses' => 'UserController@loginRegister']); // 'as' => 'login'    is Giving this route a name 'login' route in order for the 'auth' middleware ('auth' middleware is the Authenticate.php) to redirect to the right page, check https://www.youtube.com/watch?v=VK2RX6zJ220&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=137    // Named Routes: https://laravel.com/docs/9.x/routing#named-routes

    // User Registration (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    // https://www.youtube.com/watch?v=rOlDDq03veE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    Route::post('user/register', 'UserController@userRegister');

    // User Login (in front/users/login_register.blade.php) <form> submission using an AJAX request. Check front/js/custom.js    // https://www.youtube.com/watch?v=Vbfhv2lMt9M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=131
    Route::post('user/login', 'UserController@userLogin');

    // User logout (This route is accessed from Logout tab in the drop-down menu in the header (in front/layout/header.blade.php))    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=128
    Route::get('user/logout', 'UserController@userLogout');

    // User Forgot Password Functionality (this route is accessed from the <a> tag in front/users/login_register.blade.php through a 'GET' request, and through a 'POST' request when the HTML Form is submitted in front/users/forgot_password.blade.php)    // https://www.youtube.com/watch?v=ADJ80Zejs4M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=135
    Route::match(['get', 'post'], 'user/forgot-password', 'UserController@forgotPassword'); // We used match() method to use get() to render the front/users/forgot_password.blade.php page, and post() when the HTML Form in the same page is submitted    // The POST request is from an AJAX request. Check front/js/custom.js

    // User account Confirmation E-mail which contains the 'Activation Link' to activate the user account (in resources/views/emails/confirmation.blade.php, using Mailtrap)    // https://www.youtube.com/watch?v=hpG0UD_DuR4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=133
    Route::get('user/confirm/{code}', 'UserController@confirmAccount'); // {code} is the base64 encoded user's 'Activation Code' sent to the user in the Confirmation E-mail with which they have registered, which is received as a Route Parameters/URL Paramters in the 'Activation Link': https://laravel.com/docs/9.x/routing#required-parameters    // this route is requested (accessed/opened) from inside the mail sent to user (in resources/views/emails/confirmation.blade.php)



    // Protecting the routes of user (user must be authenticated/logged in) (to prevent access to these links while being unauthenticated/not being logged in (logged out))    // Protecting Routes: https://laravel.com/docs/9.x/authentication#protecting-routes    // https://www.youtube.com/watch?v=VK2RX6zJ220&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=137
    Route::group(['middleware' => ['auth']], function() {
        // Render User Account page with 'GET' request (front/users/user_account.blade.php), or the HTML Form submission in the same page with 'POST' request using AJAX (to update user details). Check front/js/custom.js    // https://www.youtube.com/watch?v=wWITxuhwLtc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=136
        Route::match(['GET', 'POST'], 'user/account', 'UserController@userAccount');

        // User Account Update Password HTML Form submission via AJAX. Check front/js/custom.js    // https://www.youtube.com/watch?v=vGux2yXHOI8
        Route::post('user/update-password', 'UserController@userUpdatePassword');

        // Coupon Code redemption (Apply coupon) / Coupon Code HTML Form submission via AJAX in front/products/cart_items.blade.php, check front/js/custom.js    // https://www.youtube.com/watch?v=uZrZKqZnYdA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=147
        Route::post('/apply-coupon', 'ProductsController@applyCoupon'); // Important Note: We added this route here as a protected route inside the 'auth' middleware group because ONLY logged in/authenticated users are allowed to redeem Coupons!

        // Checkout page (using match() method for the 'GET' request for rendering the front/products/checkout.blade.php page or the 'POST' request for the HTML Form submission in the same page (for submitting the user's Delivery Address and Payment Method))    // https://www.youtube.com/watch?v=qzLinru4vkU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=152
        Route::match(['GET', 'POST'], '/checkout', 'ProductsController@checkout');

        // Edit Delivery Addresses (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    // https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153
        Route::post('get-delivery-address', 'AddressController@getDeliveryAddress');

        // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    // https://www.youtube.com/watch?v=vb5YVP8w9pQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=156
        Route::post('save-delivery-address', 'AddressController@saveDeliveryAddress');

        // Remove Delivery Addresse via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged-in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Remove button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    // https://www.youtube.com/watch?v=2vgBjI0i23M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=157
        Route::post('remove-delivery-address', 'AddressController@removeDeliveryAddress');

        // Rendering Thanks page (after placing an order)    // https://www.youtube.com/watch?v=fQPYHPDR9wI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=162
        Route::get('thanks', 'ProductsController@thanks');
    });


});