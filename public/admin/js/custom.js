// Using jQuery:
$(document).ready(function() {

    // Check if the Admin Password is correct in update_admin_password.blade.php page using AJAX
    $('#current_password').keyup(function() {
        // console.log(this);
        var current_password = $(this).val();
        // console.log(current_password);
        // alert(current_password);

        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16

            type   : 'post',
            url    : '/admin/check-admin-password', // Check the web.php for this route and check the AdminController for the checkAdminPassword() method
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

}); // End of $(document).ready()