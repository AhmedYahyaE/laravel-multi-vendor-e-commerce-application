// Using jQuery:
$(document).ready(function() {


    // Calling the DataTable class: Check 18:55 in https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34
    $('#sections').DataTable(); // in sections.blade.php
    $('#categories').DataTable(); // in categories.blade.php



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
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16

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
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16
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
        var status   = $(this).children('i').attr('status'); // Using HTML Custom Attributes
        var section_id = $(this).attr('section_id'); // Using HTML Custom Attributes
        // console.log(status);
        // console.log(section_id);
        // var status = $(this).children(); // the child of the <a> anchor link

        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16
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



    // Confirm Deletion using SweetAlert JavaScript package/plugin: Check 5:02 in https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33
    // Delete category image in add_edit_category.blade.php. Check https://www.youtube.com/watch?v=uHYf4HmJTS8&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42
    $('.confirmDelete').click(function() {
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
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16
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



    // Show Categories <select> <option> depending on the choosed Section (show the relevant categories of the choosed section) in append_categories_level.blade.php page    // https://www.youtube.com/watch?v=GS2sCr4olJo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=42    // https://www.w3schools.com/jquery/event_change.asp
    $('#section_id').change(function() { // When the sections <select> <option> HTML element in add_edit_category.blade.php is selected or changed
        // console.log(this);
        var section_id = $(this).val();
        // console.log(section_id);


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16
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

}); // End of $(document).ready()