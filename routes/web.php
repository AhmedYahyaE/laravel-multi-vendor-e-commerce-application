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
})->middleware(['auth'])->name('dashboard');

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
        Route::post('check-admin-password', 'AdminController@checkAdminPassword'); // Check Admin Password // This route is called from the AJAX call in admin/js/custom.js page
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails'); // Update Admin Details in update_admin_details.blade.php page    // 'GET' method to show the update_admin_details.blade.php page, and 'POST' method for the <form> submission in the same page
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails'); // Update Vendor Details    // In the slug we can pass: 'personal' which means update vendor personal details, or 'business' which means update vendor business details, or 'bank' which means update vendor bank details    // We'll create one view (not 3) for the 3 pages, but parts inside it will change depending on the $slug value    // https://laravel.com/docs/9.x/routing#route-parameters    // https://www.youtube.com/watch?v=9l8YuyPjAUg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=22    // GET method to show the update admin details page, POST method for <form> submission
        Route::get('admins/{type?}', 'AdminController@admins'); // In case the authenticated user (logged in user) is superadmin, admin, subadmin, vendor these are the three Admin Management URLs depending on the slug. The slug is the `type` column in `admins` table which can only be: superadmin, admin, subadmin, or vendor    // Used an Optional URL Parameters (or Optional Route Parameters) using a '?' question mark sign, for in case that there's no any {type} passed, the page will show ALL superadmins, admins, subadmins and vendors at the same page. Check: https://laravel.com/docs/9.x/routing#parameters-optional-parameters
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails'); // View further 'vendor' details inside Admin Management table (if the authenticated user is superadmin, admin or subadmin)
        Route::post('update-admin-status', 'AdminController@updateAdminStatus'); // Update Admin Status using AJAX in admins.blade.php    // https://www.youtube.com/watch?v=zabqYC14oKU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=28
    

        // Sections (Sections, Categories, Subcategories, Products, Attributes)
        Route::get('sections', 'SectionController@sections');
        Route::post('update-section-status', 'SectionController@updateSectionStatus'); // Update Sections Status using AJAX in sections.blade.php    // https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
        Route::get('delete-section/{id}', 'SectionController@deleteSection'); // Delete a section in sections.blade.php    // https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSection'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit the section, and if not passed, this means Add a Section    // https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters
        
        // Categories
        Route::get('categories', 'CategoryController@categories'); // Categories in Catalogue Management in Admin Panel
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus'); // Update Categories Status using AJAX in categories.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit the Category, and if not passed, this means Add a Category    // https://www.youtube.com/watch?v=1G21b3-9cPo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=38
        Route::get('append-categories-level', 'CategoryController@appendCategoryLevel'); // Show Categories <select> <option> depending on the choosed Section (show the relevant categories of the choosed section) using AJAX in admin/js/custom.js in append_categories_level.blade.php page    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
        Route::get('delete-category/{id}', 'CategoryController@deleteCategory'); // Delete a category in categories.blade.php    // https://www.youtube.com/watch?v=uHYf4HmJTS8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=41
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage'); // Delete a category image in add_edit_category.blade.php from BOTH SERVER (FILESYSTEM) & DATABASE    // https://www.youtube.com/watch?v=uHYf4HmJTS8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42

        // Brands    // https://www.youtube.com/watch?v=ICe1NOaPB8w&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
        Route::get('brands', 'BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus'); // Update Brands Status using AJAX in brands.blade.php
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand'); // Delete a brand in brands.blade.php
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit the brand, and if not passed, this means Add a Brand    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters
        
        // Products    // https://www.youtube.com/watch?v=hTP1Tk1018M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=45
        Route::get('products', 'ProductsController@products'); // Products in Catalogue Management in Admin Panel
        Route::post('update-product-status', 'ProductsController@updateProductStatus'); // Update Products Status using AJAX in products.blade.php
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct'); // Delete a product in products.blade.php
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductsController@addEditProduct'); // the slug (URL parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit the Product', and if not passed, this means' Add a Product'    // GET request to render the add_edit_product.blade.php view, and POST request to submit the <form> in that view    // https://www.youtube.com/watch?v=-Lnk1N1jTNQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=47    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters
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
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannersController@addEditBanner'); // the slug (URL parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit the Banner', and if not passed, this means' Add a Banner'    // GET request to render the add_edit_banner.blade.php view, and POST request to submit the <form> in that view    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=YErUqekh47E&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67

        // Filters
        Route::get('filters', 'FilterController@filters'); // Render filters.blade.php page    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        Route::post('update-filter-status', 'FilterController@updateFilterStatus'); // Update Filter Status using AJAX in filters.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        Route::post('update-filter-value-status', 'FilterController@updateFilterValueStatus'); // Update Filter Value Status using AJAX in filters_values.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        // Route::get('delete-filter/{id}', 'FilterController@deletefilter'); // Delete a filter in filters.blade.php
        Route::get('filters-values', 'FilterController@filtersValues'); // Render filters_values.blade.php page    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
        Route::match(['get', 'post'], 'add-edit-filter/{id?}', 'FilterController@addEditFilter'); // the slug (URL parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit the filter', and if not passed, this means' Add a filter'    // GET request to render the add_edit_filter.blade.php view, and POST request to submit the <form> in that view    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=pGepSLCXH1Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=84
        Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', 'FilterController@addEditFilterValue'); // the slug (URL parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit the Filter Value', and if not passed, this means' Add a Filter Value'    // GET request to render the add_edit_filter_value.blade.php view, and POST request to submit the <form> in that view    // Optional Parameters: https://laravel.com/docs/9.x/routing#parameters-optional-parameters    // https://www.youtube.com/watch?v=mT_mMOM3KzM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=85
        Route::post('category-filters', 'FilterController@categoryFilters'); // Show the related filters depending on the selected category <select> in category_filters.blade.php (which in turn is included by add_edit_product.php) using AJAX. Check admin/js/custom.js    // https://www.youtube.com/watch?v=T7dcxauNyQc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=89
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
    Route::get('vendor/confirm/{code}', 'VendorController@confirmVendor'); // {code} is the base64 encoded vendor email with which they have registered which is a Route Parameters/URL Paramters: https://laravel.com/docs/9.x/routing#required-parameters
});