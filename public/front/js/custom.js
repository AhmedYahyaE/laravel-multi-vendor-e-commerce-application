// Using jQuery for the website FRONT section:
$(document).ready(function() {

    // Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery) in front/products/listing.blade.php    // https://www.youtube.com/watch?v=u2NiZzjRL8U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=80
    /*
    $('#sort').on('change', function() {
        // console.log(this);
        // console.log(this.form); // this.form means the containing form element    // https://stackoverflow.com/questions/11042214/difference-between-this-form-and-document-forms
        this.form.submit();
    });
    */



    // Sorting Filter WITH AJAX in front/products/listing.blade.php. Check ajax_products_listing.blade.php    // https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
    $('#sort').on('change', function() {
        var sort = $('#sort').val(); // Get the <select> box value of the 'sort' name HTML attribute
        var url  = $('#url').val(); // Get the <input> field value of the 'url' name HTML attribute (was passed from controller to view)
        // console.log(sort);
        // console.log(url);


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : url, // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
            type   : 'Post',
            data   : {sort: sort, url: url}, // we pass the sort and url variables
            success: function(data) {
                // alert(data);
                // console.log(data);
                // console.log(data.sort);
                // console.log(data.url);
                $('.filter_products').html(data);
            },
            error: function() {
                alert('Error');
            }
        });
    });
});