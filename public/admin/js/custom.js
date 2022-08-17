// Using jQuery:
$(document).ready(function() {

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



    // Updating admin status (active/inactive) using AJAX in admins.blade.php
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



}); // End of $(document).ready()