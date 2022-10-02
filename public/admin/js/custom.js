// Using jQuery for the website ADMIN section:
$(document).ready(function() {

    // Calling the DataTable class for all pages: Check 18:55 in https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
    $('#sections').DataTable(); // in sections.blade.php
    $('#categories').DataTable(); // in categories.blade.php
    $('#brands').DataTable(); // in brands.blade.php
    $('#products').DataTable(); // in products.blade.php
    $('#banners').DataTable(); // in banners.blade.php
    $('#filters').DataTable(); // in filters.blade.php



    // Correcting issues in the Skydash Admin Panel Sidebar: https://www.youtube.com/watch?v=i_SUdNILIrc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=29
    $('.nav-item').removeClass('active');
    $('.nav-link').removeClass('active');



    // Check if the Admin Password is correct using AJAX in update_admin_password.blade.php page
    $('#current_password').keyup(function() {
        // console.log(this);
        var current_password = $(this).val();
        // console.log(current_password);
        // alert(current_password);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu

            type   : 'post',
            url    : '/admin/check-admin-password', // check the web.php for this route and check the AdminController for the checkAdminPassword() method
            data   : {current_password: current_password}, // A key/value pair that will checked inside the AdminController using Hash::check($data['current_password']) (e.g. current_password: 123456)    // send the the    var current_password    (Check the above variable)
            success: function(resp) {
                // alert(resp);
                if (resp == 'false') {
                    $('#check_password').html('<b style="color: red">Current Password is Incorrect!</b>'); // the <span> element in update_admin_password.blade.php
                } else if (resp == 'true') {
                    $('#check_password').html('<b style="color: green">Current Password is Correct!</b>'); // the <span> element in update_admin_password.blade.php
                }
            },
            error  : function() {alert('Error');}
        });
    });



    // Updating admin status (active/inactive) using AJAX in admins.blade.php    // https://www.youtube.com/watch?v=zabqYC14oKU&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=28
    $(document).on('click', '.updateAdminStatus', function() { // '.updateAdminStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateAdminStatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status   = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var admin_id = $(this).attr('admin_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(admin_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-admin-status', // check the web.php for this route and check the AdminController for the updateAdminStatus() method
            data   : {status: status, admin_id: admin_id}, // we pass the status and admin_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.admin_id);
                // console.log('#admin-' + admin_id);
                // console.log($('#admin-' + admin_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#admin-' + admin_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#admin-' + admin_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating section status (active/inactive) using AJAX in sections.blade.php    // https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
    $(document).on('click', '.updateSectionStatus', function() { // '.updateSectionStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateSectionStatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status     = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var section_id = $(this).attr('section_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(section_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-section-status', // check the web.php for this route and check the SectionController for the updateSectionStatus() method
            data   : {status: status, section_id: section_id}, // we pass the status and section_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.section_id);
                // console.log('#section-' + section_id);
                // console.log($('#section-' + section_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#section-' + section_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#section-' + section_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Category status (active/inactive) using AJAX in categories.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
    $(document).on('click', '.updateCategoryStatus', function() { // '.updateCategoryStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateCategoryStatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status      = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var category_id = $(this).attr('category_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(category_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-category-status', // check the web.php for this route and check the CategoryController for the updateCategoryStatus() method
            data   : {status: status, category_id: category_id}, // we pass the status and category_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.category_id);
                // console.log('#category-' + category_id);
                // console.log($('#category-' + category_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#category-' + category_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#category-' + category_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Brand status (active/inactive) using AJAX in brands.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
    $(document).on('click', '.updateBrandStatus', function() { // '.updateBrandStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateBrandStatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status   = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var brand_id = $(this).attr('brand_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(brand_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-brand-status', // check the web.php for this route and check the BrandController for the updateBrandStatus() method
            data   : {status: status, brand_id: brand_id}, // we pass the status and brand_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.brand_id);
                // console.log('#brand-' + brand_id);
                // console.log($('#brand-' + brand_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#brand-' + brand_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#brand-' + brand_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Product status (active/inactive) using AJAX in products.blade.php    // https://www.youtube.com/watch?v=sfLCZzuL1Ts&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=36
    $(document).on('click', '.updateProductStatus', function() { // '.updateProductStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateProductStatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status     = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var product_id = $(this).attr('product_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(product_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-product-status', // check the web.php for this route and check the ProductsController for the updateProductStatus() method
            data   : {status: status, product_id: product_id}, // we pass the status and product_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.product_id);
                // console.log('#product-' + product_id);
                // console.log($('#product-' + product_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#product-' + product_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#product-' + product_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Attribute status (active/inactive) using AJAX in add_edit_attributes.blade.php    // https://www.youtube.com/watch?v=n6mvuKbje-A&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=56
    $(document).on('click', '.updateAttributeStatus', function() { // '.updateAttributeStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateAttributetatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status       = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var attribute_id = $(this).attr('attribute_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(attribute_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-attribute-status', // check the web.php for this route and check the ProductsController for the updateAttributeStatus() method
            data   : {status: status, attribute_id: attribute_id}, // we pass the status and attribute_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.attribute_id);
                // console.log('#attribute-' + attribute_id);
                // console.log($('#attribute-' + attribute_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#attribute-' + attribute_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#attribute-' + attribute_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Image status (active/inactive) using AJAX in add_images.blade.php    // https://www.youtube.com/watch?v=N4LL5J2daCE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=60
    $(document).on('click', '.updateImageStatus', function() { // '.updateImageStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateAttributetatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status   = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var image_id = $(this).attr('image_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(image_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-image-status', // check the web.php for this route and check the ProductsController for the updateImageStatus() method
            data   : {status: status, image_id: image_id}, // we pass the status and image_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.image_id);
                // console.log('#image-' + image_id);
                // console.log($('#image-' + image_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#image-' + image_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#image-' + image_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Banner status (active/inactive) using AJAX in banners.blade.php    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67
    $(document).on('click', '.updateBannerStatus', function() { // '.updateBannerStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateBannerstatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status   = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var banner_id = $(this).attr('banner_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(banner_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-banner-status', // check the web.php for this route and check the ProductsController for the updateBannerStatus() method
            data   : {status: status, banner_id: banner_id}, // we pass the status and banner_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.banner_id);
                // console.log('#banner-' + banner_id);
                // console.log($('#banner-' + banner_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#banner-' + banner_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#banner-' + banner_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Filter status (active/inactive) using AJAX in filters.blade.php    // https://www.youtube.com/watch?v=R5_4PoNxnVQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=67
    $(document).on('click', '.updateFilterStatus', function() { // '.updateFilterStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateFilterstatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status    = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var filter_id = $(this).attr('filter_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(filter_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-filter-status', // check the web.php for this route and check the ProductsController for the updateFilterStatus() method
            data   : {status: status, filter_id: filter_id}, // we pass the status and filter_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.filter_id);
                // console.log('#filter-' + filter_id);
                // console.log($('#filter-' + filter_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#filter-' + filter_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#filter-' + filter_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });

    // Updating Filter Value status (active/inactive) using AJAX in filters_values.blade.php    // https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83
    $(document).on('click', '.updateFilterValueStatus', function() { // '.updateFilterValueStatus' is the anchor link <a> CSS class    // This is the same as    $('.updateFilterValuestatus').on('click', function() {
        // alert('test');

        // var status = $(this).children();
        // var status = $(this).children('i');
        var status    = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var filter_id = $(this).attr('filter_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(filter_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'post',
            url    : '/admin/update-filter-value-status', // check the web.php for this route and check the ProductsController for the updateFilterValueStatus() method
            data   : {status: status, filter_id: filter_id}, // we pass the status and filter_id
            success: function(resp) {
                // alert(resp);
                // console.log(resp);
                // console.log(resp.status);
                // console.log(resp.filter_id);
                // console.log('#filter-' + filter_id);
                // console.log($('#filter-' + filter_id));
                if (resp.status == 0) { // in case of success, reverse the status (active/inactive) and show the right icon in the frontend    // Or the same    if (resp['status'] == 0) {
                    $('#filter-' + filter_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (resp.status == 1) {
                    $('#filter-' + filter_id).html('<i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i>');
                }
            },
            error: function() {
                alert('Error');
            }
        });
    });



    // Confirm Deletion alert using Pure JavaScript: Check 5:02 in https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33
    // $('.confirmDelete').click(function() {
    //     var title = $(this).attr('title');
    //     // alert(title);

    //     if (confirm('Are you sure you want to delete this ' + title + '?')) {
    //         return true; // return true    means COMPLETE THE EXECUTION!, you can do whatever you want to do
    //     } else {
    //         return false; // return true    means STOP THE EXECUTION!, you can't do what you want to do
    //     }
    // });

    // This method will be GLOBAL/COMMON and SHARED with many things that are going to be deleted in different pages, but they ALL must have both the HTML custom attributs: module and module_id to use them here to redirect to the relevant proper route (Check down a little bit    window.location = ....)
    // Confirm Deletion using SweetAlert JavaScript package/plugin: Check 5:02 in https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33
    // Delete category image in add_edit_category.blade.php. Check https://www.youtube.com/watch?v=uHYf4HmJTS8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
    // $('.confirmDelete').click(function() {
    $(document).on('click', '.confirmDelete', function() { // correcting the issue of .confirmDelete (Delete button is not working) is not working when going to the next page (using pagination), Check 2:40 in https://www.youtube.com/watch?v=sCTv1gw201g&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=73 AND Check Elzero jQuery video #29: https://www.youtube.com/watch?v=NYMtSl5P0a0&list=PLDoPjvoNmBAwXDFEEpc8TT6MFbDAC5XNB&index=30
        var module   = $(this).attr('module');
        var moduleid = $(this).attr('moduleid');
        // alert(module);
        // alert(moduleid);
        // return; // Just STOP function execution!    // This is the same as:    return false;


        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )

              // We added this line by ourselves
              window.location = '/admin/delete-' + module + '/' + moduleid; // e.g.    '/admin/delete-sections/3'    or    '/admin/delete-category/5'    or    '/admin/delete-category-image/4'
            }
        })
    });



    // Show Categories <select> <option> depending on the choosed Section (show the relevant categories of the choosed section) in append_categories_level.blade.php page    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42    // https://www.w3schools.com/jquery/event_change.asp
    $('#section_id').change(function() { // When the sections <select> <option> HTML element in add_edit_category.blade.php is selected or changed
        // console.log(this);
        var section_id = $(this).val();
        // console.log(section_id);


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            type   : 'get',
            url    : '/admin/append-categories-level',
            data   : {section_id: section_id}, // name/value pair sent to server
            success: function(resp) {
                // alert(resp);
                // console.log(resp);

                // console.log($('#appendCategoriesLevel'));
                $('#appendCategoriesLevel').html(resp); // $('#appendCategoriesLeve') is the <div> in add_edit_category.blade.php
            },
            error  : function() {alert('Error');}
        });
    });



    // Add Remove Input Fields Dynamically using jQuery: https://www.codexworld.com/add-remove-input-fields-dynamically-using-jquery/    // https://www.youtube.com/watch?v=gaLXLO5knpc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=57
    // Products attributes add//remove input fields dynamically using jQuery
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><div style="height:10px"></div><input type="text" name="size[]" placeholder="Size" style="width:100px">&nbsp;<input type="text" name="sku[]" placeholder="SKU" style="width:100px">&nbsp;<input type="text" name="price[]" placeholder="Price" style="width:100px">&nbsp;<input type="text" name="stock[]" placeholder="Stock" style="width:100px">&nbsp;<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

}); // End of $(document).ready()