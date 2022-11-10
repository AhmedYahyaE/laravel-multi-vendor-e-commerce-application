// Using jQuery for the website FRONT section:
// Note: We edited and moved most of this file contents to the a new file called scripts.blade.php to enable us to write PHP code within JavaScript code (to operate the Dynamic Filters dynamically (the second way))    // Note: In order to be able to write PHP code within JavaScript code, you must write it in a .php file (a file with .php extension)    // https://www.youtube.com/watch?v=rwj3nRYpUEk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=90
/* $(document).ready(function() { */

    // Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery) in front/products/listing.blade.php    // https://www.youtube.com/watch?v=u2NiZzjRL8U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=80
    /*
    $('#sort').on('change', function() {
        // console.log(this);
        // console.log(this.form); // this.form means the containing <form> HTML element    // https://stackoverflow.com/questions/11042214/difference-between-this-form-and-document-forms
        this.form.submit(); // submit the <form> (if the HTML <form> "method" attribute is absent, this means the "method" is "GET")
    });
    */



    // Sorting Filter WITH AJAX in front/products/listing.blade.php. Check ajax_products_listing.blade.php (which is 'include'-ed by listing.blade.php page)    // https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
    /*
    $('#sort').on('change', function() { // selecting the <selec> box in listing.blade.php
        var sort = $('#sort').val(); // Get the <select> box value of the 'sort' name HTML attribute
        var url  = $('#url').val(); // Get the <input> field value of the 'url' name HTML attribute ($url is passed from listing() method in Front/ProductsController.php to view (lising.blade.php))
        // console.log(sort);
        // console.log(url);

        // Send all the 'fabric' Dynamic Filter values (the ':checked' checkboxes <input> fields values in filters.blade.php) along with the Sorting Filters 'sort'    // Check 22:19 in https://www.youtube.com/watch?v=r-NjOGA4qFw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=91
        var fabric = get_filter('fabric'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php // get the filter values array of 'fabric' filter like    ['cotton', 'polyester', ...]    as an ARRAY


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : url, // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
            type   : 'Post',
            data   : {sort: sort, url: url, fabric: fabric}, // we pass the 'sort' (Sorting Filter), 'url' variables and send 'fabric' Dynamic Filter along with them
            success: function(data) {
                // alert(data);
                // console.log(data);
                // console.log(data.sort);
                // console.log(data.url);
                $('.filter_products').html(data);
            },
            error  : function() {
                alert('Error');
            }
        });
    });
    */



// We used TWO ways to operate the Dynamic Filters: statically for every filter using jQuery and dynamically from Admin Panel. Here we use the first way (for the 'fabric' filter):    // Check https://www.youtube.com/watch?v=r-NjOGA4qFw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=88
// Get all the filter values that the user have checked in the checkboxes <input>-s in filters.blade.php
function get_filter(class_name) { // get the filter values of a certain filter (e.g. the filter values of the 'fabric' filter which will be an array like    ['cotton', 'polyester', ...]    ) in filters.blade.php
    var filter = []; // get the filter values and store them in the array. Example: for the 'fabric' filter, store 'cotton', 'polyester'
    $('.' + class_name + ':checked').each(function() { // e.g. $('.fabric:checked')    // select all the checked ':checked' checkboxes in filters.blade.php    // https://www.w3schools.com/jquery/sel_input_checked.asp
        filter.push($(this).val()); // e.g. for the 'fabric' filter push the filter values like 'cotton', 'polyester' in the array
    });
    console.log(filter);


    return filter; // filter is an array
}



    // operate Dynamic Filters statically using the first way (for the 'fabric' filter only): // Check get_filter() function in this file and the listing() method in Front/ProductsController.php
    // We will need to send the 'url' and 'sort' to include them too just like we did with the Sorting Filter function above (in this file) (along with sending 'fabric')
    /*
    $('.fabric').on('click', function() { // select the 'fabric' filter (which is generated dynamically from the foreach loop) in filters.blade.php
        var url  = $('#url').val(); // from the <select> box in listing.blade.php page (which, in turn, includes filters.blade.php page)
        var sort = $('#sort option:selected').val(); // select the :selected <option> element ONLY which is :selected in listing.blade.php (which, in turn, includes filters.blade.php) (like 'price_highest', 'name_z_a', ...)    // https://www.w3schools.com/jquery/sel_input_selected.asp    // .text() https://www.w3schools.com/jquery/html_text.asp    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
        // console.log(sort);

        var fabric = get_filter('fabric'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php // get the filter values array of 'fabric' filter like    ['cotton', 'polyester', ...]    as an ARRAY


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : url, // this will hit the listing() method in Front/ProductsController.php    // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
            method : 'Post',
            data   : {url: url, sort: sort, fabric: fabric}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
            success: function(data) {
                $('.filter_products').html(data); // in listing.blade.php
            },
            error  : function() {
                alert('Error');
            }
        });
    });
    */


/* }); */


// jQuery
$(document).ready(function() {
    // the <select> box in front/products/detail.blade.php (to show the correct related `price` and `stock` depending on the selected `size` (from the `products_attributes` table))
    $('#getPrice').change(function() {
        // console.log(this);
        var size       = $(this).val();
        var product_id = $(this).attr('product-id');
        // console.log(size, product_id);


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/get-product-price', // check this route in web.php
            type   : 'post',
            data   : {size: size, product_id: product_id}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) {
                console.log(resp);
                if (resp.discount > 0) { // if there's a discount    // this is the same as:    if (resp['discount'] > 0) {
                    $('.getAttributePrice').html(
                        '<div class="price"><h4>Rs.' + resp.final_price + '</h4></div><div class="original-price"><span>Original Price: </span><span>Rs.' + resp.product_price + '</span></div>'
                    ); // Note: resp.product_price    is the same as    resp['product_price']
                } else { // if there's no discount
                    $('.getAttributePrice').html(
                        '<div class="price"><h4>Rs.' + resp.final_price + '</h4></div>'
                    ); // Note: resp.final_price    is the same as    resp['final_price']
                }
            },
            error  : function() {
                alert('Error');
            }
        });
    });



    // Update Cart Item Quantity in front/products/cart_items.blade.php (which is 'include'-ed by front/products/cart.blade.php)     // https://www.youtube.com/watch?v=8OZ5iAK8m50&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    // $('.updateCartItem').click(function() {
    //     alert('test');
    // });
    $(document).on('click', '.updateCartItem', function() {
        // alert('test');
        if ($(this).hasClass('plus-a')) { // if this clicked <a> tag has the CSS class 'plus-a', this means increase quantity by 1
            var quantity = $(this).data('qty'); // the already existing current quantity    // using Custom HTML Attributes (data-*)
            // alert(quantity);
            // new_qty = quantity + 1; // Increase quantity by 1
            new_qty = parseInt(quantity) + 1; // Increase quantity by 1    // parseInt() method is used to make sure that quantity is always a number (in case it might be a string)
            // alert(new_qty);
            // console.log(new_qty);
            // console.log(typeof new_qty);
        }

        if ($(this).hasClass('minus-a')) { // if this clicked <a> tag has the CSS class 'minus-a', this means decrease quantity by 1
            var quantity = $(this).data('qty'); // the already existing current quantity    // using Custom HTML Attributes (data-*)
            // alert(quantity);
            // new_qty = quantity + 1; // Decrease quantity by 1
            if (quantity <= 1) { // Making sure that quantity can never be a negative value (can never be less than zero <0)
                alert('Item quantity must be 1 or greater!');
                return false; // Stop Execution here! Don't do anything anymore!
            }
            new_qty = parseInt(quantity) - 1; // Decrease quantity by 1    // parseInt() method is used to make sure that quantity is always a number (in case it might be a string)
            // alert(new_qty);
            // console.log(new_qty);
            // console.log(typeof new_qty);
        }

        var cartid = $(this).data('cartid'); // using Custom HTML Attributes (data-*)
        // alert(cartid);



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            data   : {cartid: cartid, qty: new_qty}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            url    : '/cart/update', // check this route in web.php
            type   : 'post',
            success: function(resp) {
                // alert(resp.status);
                // alert(resp);
                // console.log(resp);
                // console.log(typeof resp.status);
                if (resp.status == false) { // if    'status' => 'false'    is sent from as a response from the backend, show the message    // 'status' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
                    alert(resp.message);
                }

                $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
            },
            error  : function() {
                alert('Error');
            }
        });
    });



    // Delete a Cart Item in front/products/cart_items.blade.php (which is 'include'-ed by front/products/cart.blade.php)     // https://www.youtube.com/watch?v=GCZ8a3Dw_Zg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127
    $(document).on('click', '.deleteCartItem', function() {
        var cartid = $(this).data('cartid'); // using Custom HTML Attributes (data-*)
        // alert(cartId);


        // Confirm Deletion
        var result = confirm('Are you sure you want to delete this Cart Item?'); // confirm() method returns a Boolean
        if (result) { // if user confirms deletion ('true' is return-ed from confirm() method), do the delete AJAX call, if not ('false' is return-ed from confirm() method), don't do anything
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
                data   : {cartid: cartid}, // Sending name/value pairs to server with the AJAX request (AJAX call)
                url    : '/cart/delete', // check this route in web.php
                type   : 'post',
                success: function(resp) {
                    $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
                },
                error  : function() {
                    alert('Error');
                }
            });
        }
    });



    // User Registration <form> submission (in front/users/login_register.blade.php)
    $('#registerForm').submit(function() { // When the registration <form> is submitted
        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request, as it collects all the name/value pairs from the <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // alert(formdata);


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/user/register', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) {
                // alert(resp);
                // alert(resp.url);
                // console.log(resp);
                // console.log(resp.url);
                // console.log(typeof resp);

                // console.log(window.location.href);
                // return;
                window.location.href = resp.url; // redirect to another page if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
            },
            error  : function() {
                alert('Error');
            }
        });
    });


});