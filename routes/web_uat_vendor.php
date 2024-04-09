<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function() {
    
    Route::match(['get', 'post'], 'login', 'AdminController@login'); // match() method is used to use more than one HTTP request method for the same route, so GET for rendering the login.php page, and POST for the login.php page <form> submission (e.g. GET and POST)    // Matches the '/admin/dashboard' URL (i.e. http://127.0.0.1:8000/admin/dashboard)
    
    // This a Route Group for routes that ALL start with 'admin/-something' and utilizes the 'admin' Authentication Guard    // Note: You must remove the '/admin'/ part from the routes that are written inside this Route Group (e.g.    Route::get('logout');    , NOT    Route::get('admin/logout');    )
    Route::group(['middleware' => ['admin']], function() { // using our 'admin' guard (which we created in auth.php)
        Route::get('dashboard', 'AdminController@dashboard'); // Admin login
        Route::get('logout', 'AdminController@logout'); // Admin logout
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword'); // GET request to view the update password <form>, and a POST request to submit the update password <form>
        Route::post('check-admin-password', 'AdminController@checkAdminPassword'); // Check Admin Password // This route is called from the AJAX call in admin/js/custom.js page
        Route::match(['get', 'post'], 'update-admin-details', 'AdminController@updateAdminDetails'); // Update Admin Details in update_admin_details.blade.php page    // 'GET' method to show the update_admin_details.blade.php page, and 'POST' method for the <form> submission in the same page
        Route::match(['get', 'post'], 'update-vendor-details/{slug}', 'AdminController@updateVendorDetails'); // Update Vendor Details    // In the slug we can pass: 'personal' which means update vendor personal details, or 'business' which means update vendor business details, or 'bank' which means update vendor bank details    // We'll create one view (not 3) for the 3 pages, but parts inside it will change depending on the $slug value    // GET method to show the update admin details page, POST method for <form> submission
    
        // Update the vendor's commission percentage (by the Admin) in `vendors` table (for every vendor on their own) in the Admin Panel in admin/admins/view_vendor_details.blade.php (Commissions module: Every vendor must pay a certain commission (that may vary from a vendor to another) for the website owner (admin) on every item sold, and it's defined by the website owner (admin))
        Route::post('update-vendor-commission', 'AdminController@updateVendorCommission');
    
        Route::get('admins/{type?}', 'AdminController@admins'); // In case the authenticated user (logged-in user) is superadmin, admin, subadmin, vendor these are the three Admin Management URLs depending on the slug. The slug is the `type` column in `admins` table which can only be: superadmin, admin, subadmin, or vendor    // Used an Optional Route Parameters (or Optional Route Parameters) using a '?' question mark sign, for in case that there's no any {type} passed, the page will show ALL superadmins, admins, subadmins and vendors at the same page
        Route::get('view-vendor-details/{id}', 'AdminController@viewVendorDetails'); // View further 'vendor' details inside Admin Management table (if the authenticated user is superadmin, admin or subadmin)
        Route::post('update-admin-status', 'AdminController@updateAdminStatus'); // Update Admin Status using AJAX in admins.blade.php
    
        // Brands
        Route::get('brands', 'BrandController@brands');
        Route::post('update-brand-status', 'BrandController@updateBrandStatus'); // Update Brands Status using AJAX in brands.blade.php
        Route::get('delete-brand/{id}', 'BrandController@deleteBrand'); // Delete a brand in brands.blade.php
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrand'); // the slug {id?} is an Optional Parameter, so if it's passed, this means Edit/Update the brand, and if not passed, this means Add a Brand
    
        // Products
        Route::get('products', 'ProductsController@products'); // render products.blade.php in the Admin Panel
        Route::post('update-product-status', 'ProductsController@updateProductStatus'); // Update Products Status using AJAX in products.blade.php
        Route::get('delete-product/{id}', 'ProductsController@deleteProduct'); // Delete a product in products.blade.php
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductsController@addEditProduct'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Product', and if not passed, this means' Add a Product'    // GET request to render the add_edit_product.blade.php view, and POST request to submit the <form> in that view
        Route::get('delete-product-image/{id}', 'ProductsController@deleteProductImage'); // Delete a product images (in the three folders: small, medium and large) in add_edit_product.blade.php page from BOTH SERVER (FILESYSTEM) & DATABASE
        Route::get('delete-product-video/{id}', 'ProductsController@deleteProductVideo'); // Delete a product video in add_edit_product.blade.php page from BOTH SERVER (FILESYSTEM) & DATABASE
    
        // Attributes
        Route::match(['get', 'post'], 'add-edit-attributes/{id}', 'ProductsController@addAttributes'); // GET request to render the add_edit_attributes.blade.php view, and POST request to submit the <form> in that view
        Route::post('update-attribute-status', 'ProductsController@updateAttributeStatus'); // Update Attributes Status using AJAX in add_edit_attributes.blade.php
        Route::get('delete-attribute/{id}', 'ProductsController@deleteAttribute'); // Delete an attribute in add_edit_attributes.blade.php
        Route::match(['get', 'post'], 'edit-attributes/{id}', 'ProductsController@editAttributes'); // in add_edit_attributes.blade.php
    
        // Images
        Route::match(['get', 'post'], 'add-images/{id}', 'ProductsController@addImages'); // GET request to render the add_edit_attributes.blade.php view, and POST request to submit the <form> in that view
        Route::post('update-image-status', 'ProductsController@updateImageStatus'); // Update Images Status using AJAX in add_images.blade.php
        Route::get('delete-image/{id}', 'ProductsController@deleteImage'); // Delete an image in add_images.blade.php
    
        // Banners
        Route::get('banners', 'BannersController@banners');
        Route::post('update-banner-status', 'BannersController@updateBannerStatus'); // Update Categories Status using AJAX in banners.blade.php
        Route::get('delete-banner/{id}', 'BannersController@deleteBanner'); // Delete a banner in banners.blade.php
        Route::match(['get', 'post'], 'add-edit-banner/{id?}', 'BannersController@addEditBanner'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Banner', and if not passed, this means' Add a Banner'    // GET request to render the add_edit_banner.blade.php view, and POST request to submit the <form> in that view
    
        // Filters
        Route::get('filters', 'FilterController@filters'); // Render filters.blade.php page
        Route::post('update-filter-status', 'FilterController@updateFilterStatus'); // Update Filter Status using AJAX in filters.blade.php
        Route::post('update-filter-value-status', 'FilterController@updateFilterValueStatus'); // Update Filter Value Status using AJAX in filters_values.blade.php
        Route::get('filters-values', 'FilterController@filtersValues'); // Render filters_values.blade.php page
        Route::match(['get', 'post'], 'add-edit-filter/{id?}', 'FilterController@addEditFilter'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the filter', and if not passed, this means' Add a filter'    // GET request to render the add_edit_filter.blade.php view, and POST request to submit the <form> in that view
        Route::match(['get', 'post'], 'add-edit-filter-value/{id?}', 'FilterController@addEditFilterValue'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Filter Value', and if not passed, this means' Add a Filter Value'    // GET request to render the add_edit_filter_value.blade.php view, and POST request to submit the <form> in that view
        Route::post('category-filters', 'FilterController@categoryFilters'); // Show the related filters depending on the selected category <select> in category_filters.blade.php (which in turn is included by add_edit_product.php) using AJAX. Check admin/js/custom.js
    
        // Coupons
        Route::get('coupons', 'CouponsController@coupons'); // Render admin/coupons/coupons.blade.php page in the Admin Panel
        Route::post('update-coupon-status', 'CouponsController@updateCouponStatus'); // Update Coupon Status (active/inactive) via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js
        Route::get('delete-coupon/{id}', 'CouponsController@deleteCoupon'); // Delete a Coupon via AJAX in admin/coupons/coupons.blade.php, check admin/js/custom.js
    
        // Render admin/coupons/add_edit_coupon.blade.php page with 'GET' request ('Edit/Update the Coupon') if the {id?} Optional Parameter is passed, or if it's not passed, it's a GET request too to 'Add a Coupon', or it's a POST request for the HTML Form submission in the same page
        Route::match(['get', 'post'], 'add-edit-coupon/{id?}', 'CouponsController@addEditCoupon'); // the slug (Route Parameter) {id?} is an Optional Parameter, so if it's passed, this means 'Edit/Update the Coupon', and if not passed, this means' Add a Coupon'    // GET request to render the add_edit_coupon.blade.php view (whether Add or Edit depending on passing or not passing the Optional Parameter {id?}), and POST request to submit the <form> in that same page
    
        // Users
        Route::get('users', 'UserController@users'); // Render admin/users/users.blade.php page in the Admin Panel
        Route::post('update-user-status', 'UserController@updateUserStatus'); // Update User Status (active/inactive) via AJAX in admin/users/users.blade.php, check admin/js/custom.js
    
        // Orders
        // Render admin/orders/orders.blade.php page (Orders Management section) in the Admin Panel
        Route::get('orders', 'OrderController@orders');
    
        // Render admin/orders/order_details.blade.php (View Order Details page) when clicking on the View Order Details icon in admin/orders/orders.blade.php (Orders tab under Orders Management section in Admin Panel)
        Route::get('orders/{id}', 'OrderController@orderDetails'); 
    
        // Update Order Status (which is determined by 'admin'-s ONLY, not 'vendor'-s, in contrast to "Update Item Status" which can be updated by both 'vendor'-s and 'admin'-s) (Pending, Shipped, In Progress, Canceled, ...) in admin/orders/order_details.blade.php in Admin Panel
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        Route::post('update-order-status', 'OrderController@updateOrderStatus');
    
        // Update Item Status (which can be determined by both 'vendor'-s and 'admin'-s, in contrast to "Update Order Status" which is updated by 'admin'-s ONLY, not 'vendor'-s) (Pending, In Progress, Shipped, Delivered, ...) in admin/orders/order_details.blade.php in Admin Panel
        // Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc.
        Route::post('update-order-item-status', 'OrderController@updateOrderItemStatus');
    
        // Orders Invoices
        // Render order invoice page (HTML) in order_invoice.blade.php
        Route::get('orders/invoice/{id}', 'OrderController@viewOrderInvoice'); 
    
        // Render order PDF invoice in order_invoice.blade.php using Dompdf Package
        Route::get('orders/invoice/pdf/{id}', 'OrderController@viewPDFInvoice'); 
    
        // Shipping Charges module
        // Render the Shipping Charges page (admin/shipping/shipping_charges.blade.php) in the Admin Panel for 'admin'-s only, not for vendors
        Route::resource('shipping-charges', ShippingController::class);
        Route::get('shipping-charges', 'ShippingController@shippingCharges');
        Route::post('shipping-charges/store', 'ShippingController@store');
    
        // Update Shipping Status (active/inactive) via AJAX in admin/shipping/shipping_charages.blade.php, check admin/js/custom.js
        Route::post('update-shipping-status', 'ShippingController@updateShippingStatus');
    
        // Render admin/shipping/edit_shipping_charges.blade.php page in case of HTTP 'GET' request ('Edit/Update Shipping Charges'), or hadle the HTML Form submission in the same page in case of HTTP 'POST' request
        Route::match(['get', 'post'], 'edit-shipping-charges/{id}', 'ShippingController@editShippingCharges'); 
    
        // Reports
        Route::get('reports/sales', 'ReportsController@salesReports');
    
    
        // Newsletter Subscribers module
        // Render admin/subscribers/subscribers.blade.php page (Show all Newsletter subscribers in the Admin Panel)
        Route::get('subscribers', 'NewsletterController@subscribers');
    
        // Update Subscriber Status (active/inactive) via AJAX in admin/subscribers/subscribers.blade.php, check admin/js/custom.js
        Route::post('update-subscriber-status', 'NewsletterController@updateSubscriberStatus');
    
        // Delete a Subscriber via AJAX in admin/subscribers/subscribers.blade.php, check admin/js/custom.js
        Route::get('delete-subscriber/{id}', 'NewsletterController@deleteSubscriber'); 
    
    
    
        // Export subscribers (`newsletter_subscribers` database table) as an Excel file using Maatwebsite/Laravel Excel Package in admin/subscribers/subscribers.blade.php
        Route::get('export-subscribers', 'NewsletterController@exportSubscribers');
    
        // User Ratings & Reviews
        // Render admin/ratings/ratings.blade.php page in the Admin Panel
        Route::get('ratings', 'RatingController@ratings');
    
        // Update Rating Status (active/inactive) via AJAX in admin/ratings/ratings.blade.php, check admin/js/custom.js
        Route::post('update-rating-status', 'RatingController@updateRatingStatus');
    
        // Delete a Rating via AJAX in admin/ratings/ratings.blade.php, check admin/js/custom.js
        Route::get('delete-rating/{id}', 'RatingController@deleteRating'); 
    });
});