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
    // Show our Preloader/Loader/Loading page/Preloading screen ALL THE TIME FOR TESTING!    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
    // $('.loader').show();


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
                $('.totalCartItems').html(resp.totalCartItems); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139

                // alert(resp.status);
                // alert(resp);
                // console.log(resp);
                // console.log(typeof resp.status);
                if (resp.status == false) { // if    'status' => 'false'    is sent from as a response from the backend, show the message    // 'status' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
                    alert(resp.message);
                }

                // console.log(resp.view);
                // console.log(resp.headerview);

                $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php

                $('#appendHeaderCartItems').html(resp.headerview); // 'headerview' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php    // https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
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
                    $('.totalCartItems').html(resp.totalCartItems); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139

                    $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php

                    $('#appendHeaderCartItems').html(resp.headerview); // 'headerview' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php    // https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141
                },
                error  : function() {
                    alert('Error');
                }
            });
        }
    });



    // Show our Preloader/Loader/Loading page/Preloading screen while the placing order <form> is submitted using the    id="placeOrder"    HTML attribute in front/products/checkout.blade.php. Check https://www.youtube.com/watch?v=CzePzLpAvlI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181
    $(document).on('click', '#placeOrder', function() {
        // Show our Preloader/Loader/Loading page/Preloading screen while the <form> is submitted    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
        $('.loader').show();
    });



    // User Registration <form> submission (in front/users/login_register.blade.php)    // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
    $('#registerForm').submit(function() { // When the registration <form> is submitted

        // Show our Preloader/Loader/Loading page/Preloading screen while the <form> is submitted    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // alert(formdata);


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/user/register', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp);
                // alert(resp.url);
                // console.log(resp);
                // console.log(resp.url);
                // console.log(typeof resp);
                // console.log(resp.type);


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // console.log(resp);
                    // console.log(resp.type);   // 'type'   is the PHP array key/index sent from the backend/server from inside the method in the controller
                    // console.log(resp.errors); // 'errors' is the PHP array key/index sent from the backend/server from inside the method in the controller


                    // Hide our Preloader/Loader/Loading page/Preloading screen when there's an error    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    // Note: in HTML in front/users/login_register.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#register-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="register-name" style="color: red"></p>    )    // This is the same as:    $('#register-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#register-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'register-x' (e.g. register-mobile, register-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                            // $('#register-' + i).attr('style', 'display: none');
                            // $('#register-' + i).css('display', 'none');
                            $('#register-' + i).css({
                                // display: 'none'
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // alert(resp.message);


                    // Hide our Preloader/Loader/Loading page/Preloading screen when the response is 'success'    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    $('#register-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#register-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)

                    // console.log(window.location.href);
                    // return;
                    // window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Login <form> submission (in front/users/login_register.blade.php)    // https://www.youtube.com/watch?v=Vbfhv2lMt9M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=131
    $('#loginForm').submit(function() { // When the login <form> is submitted
        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // alert(formdata);


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/user/login', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp);
                // alert(resp.url);
                // console.log(resp);
                // console.log(resp.url);
                // console.log(typeof resp);
                // console.log(resp.type);


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // console.log(resp);
                    // console.log(resp.type);   // 'type'   is the PHP array key/index sent from the backend/server from inside the method in the controller
                    // console.log(resp.errors); // 'errors' is the PHP array key/index sent from the backend/server from inside the method in the controller


                    // Note: in HTML in front/users/login_register.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#login-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#login-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                            // $('#login-' + i).attr('style', 'display: none');
                            // $('#login-' + i).css('display', 'none');
                            $('#login-' + i).css({
                                // display: 'none'
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'incorrect') { // if the Validation passes / is okay but the login credentials provided by user are incorrect, login fails, and show a generic 'Wrong Credentials!' messsage    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                    // alert(resp.message);
                    $('#login-error').attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                    $('#login-error').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)

                } else if (resp.type == 'inactive') { // if the user being authenticated/logged in is inactive/disabled/deactivated by an admin (`status` is zero 0 in `users` table), logout the user, then return them back with a message    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                    // alert(resp.message);
                    $('#login-error').attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                    $('#login-error').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                    // console.log(window.location.href);
                    // return;
                    window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Forgot Password Functionality (this route is accessed from the <a> tag in front/users/login_register.blade.php through a 'GET' request, and through a 'POST' request when the HTML Form is submitted in front/users/forgot_password.blade.php))    // https://www.youtube.com/watch?v=ADJ80Zejs4M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=135
    $('#forgotForm').submit(function() { // When the forgot password <form> (in front/users/forgot_password.blade.php) is submitted

        // Show our Preloader/Loader/Loading page/Preloading screen while the <form> is submitted    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // alert(formdata);


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/user/forgot-password', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp);
                // alert(resp.url);
                // console.log(resp);
                // console.log(resp.url);
                // console.log(typeof resp);
                // console.log(resp.type);


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // console.log(resp);
                    // console.log(resp.type);   // 'type'   is the PHP array key/index sent from the backend/server from inside the method in the controller
                    // console.log(resp.errors); // 'errors' is the PHP array key/index sent from the backend/server from inside the method in the controller


                    // Hide our Preloader/Loader/Loading page/Preloading screen when there's an error    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    // Note: in HTML in front/users/login_register.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#forgot-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="forgot-name" style="color: red"></p>    )    // This is the same as:    $('#forgot-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#forgot-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'forgot-x' (e.g. forgot-mobile, forgot-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                            // $('#forgot-' + i).attr('style', 'display: none');
                            // $('#forgot-' + i).css('display', 'none');
                            $('#forgot-' + i).css({
                                // display: 'none'
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // alert(resp.message);


                    // Hide our Preloader/Loader/Loading page/Preloading screen when the response is 'success'    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    $('#forgot-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="forgot-name" style="color: red"></p>    )    // This is the same as:    $('#forgot-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#forgot-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. forgot-mobile, forgot-email, ...)

                    // console.log(window.location.href);
                    // return;
                    // window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Update Details HTML Form submission (in front/users/user_account.blade.php)    // https://www.youtube.com/watch?v=wWITxuhwLtc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=136
    $('#accountForm').submit(function() { // When the registration <form> is submitted

        // Show our Preloader/Loader/Loading page/Preloading screen while the <form> is submitted    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // alert(formdata);


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/user/account', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp);
                // alert(resp.url);
                // console.log(resp);
                // console.log(resp.url);
                // console.log(typeof resp);
                // console.log(resp.type);


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // console.log(resp);
                    // console.log(resp.type);   // 'type'   is the PHP array key/index sent from the backend/server from inside the method in the controller
                    // console.log(resp.errors); // 'errors' is the PHP array key/index sent from the backend/server from inside the method in the controller


                    // Hide our Preloader/Loader/Loading page/Preloading screen when there's an error    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    // Note: in HTML in front/users/user_account.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#account-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#account-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#account-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                            // $('#account-' + i).attr('style', 'display: none');
                            // $('#account-' + i).css('display', 'none');
                            $('#account-' + i).css({
                                // display: 'none'
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // alert(resp.message);


                    // Hide our Preloader/Loader/Loading page/Preloading screen when the response is 'success'    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    $('#account-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#account-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)


                    // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                    setTimeout(function() {
                        // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                        // $('#account-success').attr('style', 'display: none');
                        // $('#account-success').css('display', 'none');
                        $('#account-success').css({
                            // display: 'none'
                            'display': 'none'
                        });
                    }, 3000);


                    // console.log(window.location.href);
                    // return;
                    // window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Update Password HTML Form submission (in front/users/user_account.blade.php)    // https://www.youtube.com/watch?v=vGux2yXHOI8
    $('#passwordForm').submit(function() { // When the registration <form> is submitted

        // Show our Preloader/Loader/Loading page/Preloading screen while the <form> is submitted    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // alert(formdata);


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/user/update-password', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp);
                // alert(resp.url);
                // console.log(resp);
                // console.log(resp.url);
                // console.log(typeof resp);
                // console.log(resp.type);


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // console.log(resp);
                    // console.log(resp.type);   // 'type'   is the PHP array key/index sent from the backend/server from inside the method in the controller
                    // console.log(resp.errors); // 'errors' is the PHP array key/index sent from the backend/server from inside the method in the controller


                    // Hide our Preloader/Loader/Loading page/Preloading screen when there's an error    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();


                    // Note: in HTML in front/users/user_account.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)

                        // console.log(i + '\n' + error + '\n'); // Used a newline character '\n' to print out a line break in the browser 'console'



                        $('#password-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#password-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#password-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                            // $('#password-' + i).attr('style', 'display: none');
                            // $('#password-' + i).css('display', 'none');
                            $('#password-' + i).css({
                                // display: 'none'
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'incorrect') { // if the entered current password is incorrect/wrong    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userUpdatePassword() method in Front/UserController.php
                    // alert(resp.message);

                    // Hide our Preloader/Loader/Loading page/Preloading screen when the response is 'success'    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();

                    $('#password-error').attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="password-name" style="color: red"></p>    )    // This is the same as:    $('#password-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                    $('#password-error').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'password-x' (e.g. password-mobile, password-email, ...)

                    // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                    setTimeout(function() {
                        // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                        // $('#password-error').attr('style', 'display: none');
                        // $('#password-error').css('display', 'none');
                        $('#password-error').css({
                            // display: 'none'
                            'display': 'none'
                        });
                    }, 3000);

                    // console.log(window.location.href);
                    // return;
                    // window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // alert(resp.message);

                    // Hide our Preloader/Loader/Loading page/Preloading screen when the response is 'success'    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();

                    $('#password-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="password-name" style="color: red"></p>    )    // This is the same as:    $('#password-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#password-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'password-x' (e.g. password-mobile, password-email, ...)

                    // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                    setTimeout(function() {
                        // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                        // $('#password-success').attr('style', 'display: none');
                        // $('#password-success').css('display', 'none');
                        $('#password-success').css({
                            // display: 'none'
                            'display': 'none'
                        });
                    }, 3000);

                    // console.log(window.location.href);
                    // return;
                    // window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // Coupon Code redemption (Apply coupon) / Coupon Code HTML Form submission in front/products/cart_items.blade.php    // https://www.youtube.com/watch?v=uZrZKqZnYdA&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=147
    // Note: For Coupons, user must be logged in (authenticated) to be able to redeem them. Both 'admins' and 'vendors' can add Coupons. Coupons added by 'vendor' will be available for their products ONLY, but ones added by 'admins' will be available for ALL products.
    $('#applyCoupon').submit(function() { // When the Coupon <form> is submitted
    // $(document).on('submit', '#applyCoupon', function() { // When the Coupon <form> is submitted    // To solve the problem of Submiting the Coupon Code works only once, we moved the Coupon part from cart_items.blade.php to here in cart.blade.php. Check 21:39 in https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149    // Explanation of the problem: http://publicvoidlife.blogspot.com/2014/03/on-on-or-event-delegation-explained.html
        var user = $(this).attr('user');
        // console.log(user);

        if (user == 1) { // if the user is logged in (authenticated), they can apply coupon (redeem coupons)
            // DO NOTHING!!!!!!!! (WEIRD!)
        } else { // if the user is unauthenticated/logged-out
            alert('Please login to apply Coupon!');
            return false; // Get out of the WHOLE function!
        }


        var code = $('#code').val();
        // console.log(code);



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/apply-coupon', // check this route in web.php
            type   : 'post',
            data   : {code: code}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp.couponAmount);

                if (resp.message != '') {
                    alert(resp.message);
                }
    
                $('.totalCartItems').html(resp.totalCartItems); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139

                // alert(resp);
                // console.log(resp);
                // alert(resp.status);
                // console.log(typeof resp.status);
                // if (resp.status == false) { // if    'status' => 'false'    is sent from as a response from the backend, show the message    // 'status' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
                //     alert(resp.message);
                // }

                // console.log(resp.view);
                // console.log(resp.headerview);

                $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php

                $('#appendHeaderCartItems').html(resp.headerview); // 'headerview' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php    // https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141

                // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
                if (resp.couponAmount > 0) { // if there's a coupon code submitted and it's valid    // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149    // 'couponAmount' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php
                    $('.couponAmount').text('Rs.' + resp.couponAmount); // 'couponAmount' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php    // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
                } else {
                    $('.couponAmount').text('Rs.0');
                }

                // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
                if (resp.grand_total > 0) { // if there's a coupon code submitted and it's valid    // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149    // 'grand_total' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php
                    $('.grand_total').text('Rs.' + resp.grand_total); // 'grand_total' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php    // https://www.youtube.com/watch?v=qRarBk49t7Q&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=149
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // Edit Delivery Addresses via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    // https://www.youtube.com/watch?v=-cVee5eL0Ew&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=153
    $(document).on('click', '.editAddress', function() {
        var addressid = $(this).data('addressid'); // We use the jQuery data() function to get the Custom HTML Attribute value
        // alert(addressid);



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/get-delivery-address', // check this route in web.php
            type   : 'post',
            data   : {addressid: addressid}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request / AJAX call is successful
                // alert(resp);

                $('#showdifferent').removeClass('collapse');
                $('.newAddress').hide();
                $('.deliveryText').text('Edit Delivery Address');


                // console.log(resp);
                // console.log(resp.address);
                $('[name="delivery_id"]'     ).val(resp.address['id']);      // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_name"]'   ).val(resp.address['name']);    // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_address"]').val(resp.address['address']); // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_city"]'   ).val(resp.address['city']);    // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_state"]'  ).val(resp.address['state']);   // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_country"]').val(resp.address['country']); // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_pincode"]').val(resp.address['pincode']); // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
                $('[name="delivery_mobile"]' ).val(resp.address['mobile']);  // Select the <input> field in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php), and change its value to the value coming from the server response to the AJAX request
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });

    // Remove Delivery Addresse via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Remove button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    // https://www.youtube.com/watch?v=2vgBjI0i23M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=157
    $(document).on('click', '.removeAddress', function() {
        if (confirm('Are you sure you want to remove this?')) { // if the user clicks on Yes/OK    // confirm(): https://www.w3schools.com/jsref/met_win_confirm.asp
            var addressid = $(this).data('addressid'); // We use the jQuery data() function to get the Custom HTML Attribute value
            // alert(addressid);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
                url    : '/remove-delivery-address', // check this route in web.php
                type   : 'post',
                data   : {addressid: addressid}, // Sending name/value pairs to server with the AJAX request (AJAX call)
                success: function(resp) { // if the AJAX request / AJAX call is successful
                    // alert(resp);

                    $('#deliveryAddresses').html(resp.view); // refresh the whole delivery_addresses.blade.php view    // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php

                    // Laravel 9 Tutorial #156 | Resolve Checkout Page Issue | Fix Add/Edit Delivery Address Issue: Check https://www.youtube.com/watch?v=8h1fIWO8gyo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181
                    window.location.href = 'checkout';
                },
                error  : function() { // if the AJAX request is unsuccessful
                    alert('Error');
                }
            });
        }
    });

    // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    // https://www.youtube.com/watch?v=vb5YVP8w9pQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=156
    $(document).on('submit', '#addressAddEditForm', function() {
        // var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        var formdata = $('#addressAddEditForm').serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        // console.log(typeof formdata); // 'string' data type
        // console.log(formdata);
        // return; // Stop execution and get out of the function!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    // Check 12:37 in https://www.youtube.com/watch?v=maEXuJNzE8M&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=16 AND Check 12:06 in https://www.youtube.com/watch?v=APPKmLlWEBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu
            url    : '/save-delivery-address', // check this route in web.php
            type   : 'post',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request / AJAX call is successful
                // console.log(resp);
                // alert(resp);


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                // https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=129
                if (resp.type == 'error') { // if there're Validation Errors, show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php
                    // console.log(resp);
                    // console.log(resp.type);   // 'type'   is the PHP array key/index sent from the backend/server from inside the method in the controller
                    // console.log(resp.errors); // 'errors' is the PHP array key/index sent from the backend/server from inside the method in the controller


                    // Hide our Preloader/Loader/Loading page/Preloading screen when there's an error    // https://www.youtube.com/watch?v=yPg_eAiaWLw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=134
                    $('.loader').hide();



                    // Note: in HTML in front/products/delivery_addresses.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, register-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#delivery-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#delivery-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#delivery-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            // NOTE !!: THOSE NEXT LINES ARE ALL THE SAME!!!
                            // $('#delivery-' + i).attr('style', 'display: none');
                            // $('#delivery-' + i).css('display', 'none');
                            $('#delivery-' + i).css({
                                // display: 'none'
                                'display': 'none'
                            });
                        }, 3000);

                    });
                } else { // if there're no Validation Errors
                    $('#deliveryAddresses').html(resp.view); // refresh the whole delivery_addresses.blade.php view    // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php

                    // Laravel 9 Tutorial #156 | Resolve Checkout Page Issue | Fix Add/Edit Delivery Address Issue: Check https://www.youtube.com/watch?v=8h1fIWO8gyo&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=181
                    window.location.href = 'checkout';
                }

            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });


});