import Swal from './sweetalert2.js'
console.log(Swal);




// Confirm Deletion alert using Pure JavaScript
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
// Confirm Deletion using SweetAlert JavaScript package/plugin
// Delete category image in add_edit_category.blade.php
// $('.confirmDelete').click(function() {
$(document).on('click', '.confirmDelete', function() { // correcting the issue of .confirmDelete (Delete button is not working) is not working when going to the next page (using pagination)
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

            // We added this line by ourselves (to go to this route to delete the said module ...)
            window.location = '/admin/delete-' + module + '/' + moduleid; // e.g.    '/admin/delete-sections/3'    or    '/admin/delete-category/5'    or    '/admin/delete-category-image/4'    or    /admin/delete-subscriber/43
        }
    })
});