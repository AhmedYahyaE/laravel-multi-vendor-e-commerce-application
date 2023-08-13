// Using jQuery for the website FRONT section:

// We used TWO ways to operate the Dynamic Filters: statically for every filter using jQuery and dynamically from Admin Panel. Here we use the first way (for the 'fabric' filter):    
// Get all the filter values that the user have checked in the checkboxes <input>-s in filters.blade.php
function get_filter(class_name) { // get the filter values of a certain filter (e.g. the filter values of the 'fabric' filter which will be an array like    ['cotton', 'polyester', ...]    ) in filters.blade.php
    var filter = []; // get the filter values and store them in the array. Example: for the 'fabric' filter, store 'cotton', 'polyester'
    $('.' + class_name + ':checked').each(function() { // e.g. $('.fabric:checked')    // select all the checked ':checked' checkboxes in filters.blade.php    // https://www.w3schools.com/jquery/sel_input_checked.asp
        filter.push($(this).val()); // e.g. for the 'fabric' filter push the filter values like 'cotton', 'polyester' in the array
    });
    console.log(filter);


    return filter; // filter is an array
}

// Add a Newsletter Subscriber email HTML Form Submission in front/layout/footer.blade.php when clicking on the Submit button (using an AJAX Request/Call)    
function addSubscriber() {
    // alert('test');

    var subscriber_email = $('#subscriber_email').val(); // get the value that the user will enter in the <input> field having that said HTML id Global Attribute
    // alert(subscriber_email);

    // Email validation in JavaScript    // https://www.scaler.com/topics/email-validation-in-javascript/
    var mailFormat =  /\S+@\S+\.\S+/; // Regular Expression (RegExp/Regex)
    if (subscriber_email.match(mailFormat)) {
        // alert('Valid Email!');

    } else {
      alert("Please enter a valid Email!");
      return false;
    }



    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
        url    : '/add-subscriber-email', // check this route in web.php
        type   : 'post',
        data   : {subscriber_email: subscriber_email}, // Sending name/value pairs to server with the AJAX request (AJAX call)
        success: function(resp) { // if the AJAX request / AJAX call is successful
            // alert(resp);

            if (resp == 'Email already exists') { // Check addSubscriber() method in Front/NewsletterController.php
                alert('Your email already exists for Newsletter Subscription!');

            } else if (resp == 'Email saved in our database') { // Check addSubscriber() method in Front/NewsletterController.php
                alert('Thanks for subscribing!');
            }
        },
        error  : function() { // if the AJAX request is unsuccessful
            alert('Error');
        }
    });
}



// jQuery
$(document).ready(function() {
    // Show our Preloader/Loader/Loading Page/Preloading Screen ALL THE TIME FOR TESTING!    
    // $('.loader').show();


    // the <select> box in front/products/detail.blade.php (to show the correct related `price` and `stock` depending on the selected `size` (from the `products_attributes` table))
    $('#getPrice').change(function() {
        // console.log(this);
        var size       = $(this).val();
        var product_id = $(this).attr('product-id');
        // console.log(size, product_id);


        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/get-product-price', // check this route in web.php
            type   : 'post',
            data   : {size: size, product_id: product_id}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) {
                console.log(resp);
                if (resp.discount > 0) { // if there's a discount    // this is the same as:    if (resp['discount'] > 0) {
                    $('.getAttributePrice').html(
                        '<div class="price"><h4>EGP' + resp.final_price + '</h4></div><div class="original-price"><span>Original Price: </span><span>EGP' + resp.product_price + '</span></div>'
                    ); // Note: resp.product_price    is the same as    resp['product_price']
                } else { // if there's no discount
                    $('.getAttributePrice').html(
                        '<div class="price"><h4>EGP' + resp.final_price + '</h4></div>'
                    ); // Note: resp.final_price    is the same as    resp['final_price']
                }
            },
            error  : function() {
                alert('Error');
            }
        });
    });



    // Update Cart Item Quantity in front/products/cart_items.blade.php (which is 'include'-ed by front/products/cart.blade.php)     
    $(document).on('click', '.updateCartItem', function() {
        // alert('test');
        if ($(this).hasClass('plus-a')) { // if this clicked <a> tag has the CSS class 'plus-a', this means increase quantity by 1
            var quantity = $(this).data('qty'); // the already existing current quantity    // using Custom HTML Attributes (data-*)
            // alert(quantity);
            // new_qty = quantity + 1; // Increase quantity by 1
            new_qty = parseInt(quantity) + 1; // Increase quantity by 1    // parseInt() method is used to make sure that quantity is always a number (in case it might be a string)
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
        }

        var cartid = $(this).data('cartid'); // using Custom HTML Attributes (data-*)
        // alert(cartid);



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            data   : {cartid: cartid, qty: new_qty}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            url    : '/cart/update', // check this route in web.php
            type   : 'post',
            success: function(resp) {
                $('.totalCartItems').html(resp.totalCartItems); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred

                if (resp.status == false) { // if    'status' => 'false'    is sent from as a response from the backend, show the message    // 'status' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
                    alert(resp.message);
                }

                // console.log(resp.view);
                // console.log(resp.headerview);

                $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php

                $('#appendHeaderCartItems').html(resp.headerview); // 'headerview' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php    
            },
            error  : function() {
                alert('Error');
            }
        });
    });



    // Delete a Cart Item in front/products/cart_items.blade.php (which is 'include'-ed by front/products/cart.blade.php)     
    $(document).on('click', '.deleteCartItem', function() {
        var cartid = $(this).data('cartid'); // using Custom HTML Attributes (data-*)
        // alert(cartId);


        // Confirm Deletion
        var result = confirm('Are you sure you want to delete this Cart Item?'); // confirm() method returns a Boolean
        if (result) { // if user confirms deletion ('true' is return-ed from confirm() method), do the delete AJAX call, if not ('false' is return-ed from confirm() method), don't do anything
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                data   : {cartid: cartid}, // Sending name/value pairs to server with the AJAX request (AJAX call)
                url    : '/cart/delete', // check this route in web.php
                type   : 'post',
                success: function(resp) {
                    $('.totalCartItems').html(resp.totalCartItems); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred
                    $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php
                    $('#appendHeaderCartItems').html(resp.headerview); // 'headerview' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the cartUpdate() method in Front/ProductsController.php    
                },
                error  : function() {
                    alert('Error');
                }
            });
        }
    });



    // Show our Preloader/Loader/Loading Page/Preloading Screen while the placing order <form> is submitted using the    id="placeOrder"    HTML attribute in front/products/checkout.blade.php
    $(document).on('click', '#placeOrder', function() {
        // Show our Preloader/Loader/Loading Page/Preloading Screen while the <form> is submitted    
        $('.loader').show();
    });



    // User Registration <form> submission (in front/users/login_register.blade.php)    
    $('#registerForm').submit(function() { // When the registration <form> is submitted

        // Show our Preloader/Loader/Loading Page/Preloading Screen while the <form> is submitted    
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/user/register', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when there's an error    
                    $('.loader').hide();


                    // Note: in HTML in front/users/login_register.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#register-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="register-name" style="color: red"></p>    )    // This is the same as:    $('#register-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#register-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'register-x' (e.g. register-mobile, register-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            $('#register-' + i).css({
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when the response is 'success'    
                    $('.loader').hide();

                    $('#register-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#register-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Login <form> submission (in front/users/login_register.blade.php)    
    $('#loginForm').submit(function() { // When the login <form> is submitted
        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp

        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/user/login', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful


                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php

                    // Note: in HTML in front/users/login_register.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                        // console.log(i);     // The JavaScript ojbect keys   (properties names)  (the PHP array (sent from backend/server response from method inside controller) keys/indexes)
                        // console.log(error); // The JavaScript ojbect values (properties values) (the PHP array (sent from backend/server response from method inside controller) values)


                        $('#login-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#login-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            $('#login-' + i).css({
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'incorrect') { // if the Validation passes / is okay but the login credentials provided by user are incorrect, login fails, and show a generic 'Wrong Credentials!' messsage    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                    $('#login-error').attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                    $('#login-error').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)

                } else if (resp.type == 'inactive') { // if the user being authenticated/logged in is inactive/disabled/deactivated by an admin (`status` is zero 0 in `users` table), logout the user, then return them back with a message    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                    $('#login-error').attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                    $('#login-error').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                    // console.log(window.l
                    window.location.href = resp.url; // redirect user to another page (Cart page) if authentication/login is successful    // 'url' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userLogin() method in Front/UserController.php
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Forgot Password Functionality (this route is accessed from the <a> tag in front/users/login_register.blade.php through a 'GET' request, and through a 'POST' request when the HTML Form is submitted in front/users/forgot_password.blade.php))    
    $('#forgotForm').submit(function() { // When the forgot password <form> (in front/users/forgot_password.blade.php) is submitted

        // Show our Preloader/Loader/Loading Page/Preloading Screen while the <form> is submitted    
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp


        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/user/forgot-password', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when there's an error    
                    $('.loader').hide();


                    // Note: in HTML in front/users/login_register.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: register-x (e.g. register-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php

                        $('#forgot-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="forgot-name" style="color: red"></p>    )    // This is the same as:    $('#forgot-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#forgot-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'forgot-x' (e.g. forgot-mobile, forgot-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            $('#forgot-' + i).css({

                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userRegister() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when the response is 'success'    
                    $('.loader').hide();


                    $('#forgot-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/login_register.blade.php (    <p id="forgot-name" style="color: red"></p>    )    // This is the same as:    $('#forgot-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#forgot-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/login_register.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. forgot-mobile, forgot-email, ...)
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Update Details HTML Form submission (in front/users/user_account.blade.php)    
    $('#accountForm').submit(function() { // When the registration <form> is submitted

        // Show our Preloader/Loader/Loading Page/Preloading Screen while the <form> is submitted    
        $('.loader').show();

        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp

        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/user/account', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when there's an error    
                    $('.loader').hide();


                    // Note: in HTML in front/users/user_account.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php

                        $('#account-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#account-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#account-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            $('#account-' + i).css({
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when the response is 'success'    
                    $('.loader').hide();


                    $('#account-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="login-name" style="color: red"></p>    )    // This is the same as:    $('#login-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#account-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'login-x' (e.g. login-mobile, login-email, ...)


                    // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                    setTimeout(function() {
                        $('#account-success').css({
                            'display': 'none'
                        });
                    }, 3000);
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // User Update Password HTML Form submission (in front/users/user_account.blade.php)    
    $('#passwordForm').submit(function() { // When the registration <form> is submitted

        // Show our Preloader/Loader/Loading Page/Preloading Screen while the <form> is submitted    
        $('.loader').show();


        var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp

        // return false; // DON'T SUBMIT THE FORM!!



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/user/update-password', // check this route in web.php
            type   : 'POST',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful



                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                if (resp.type == 'error') { // if there're Validation Errors (login fails), show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when there's an error    
                    $('.loader').hide();


                    // Note: in HTML in front/users/user_account.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, regitster-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                        $('#password-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#password-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#password-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            $('#password-' + i).css({
                                'display': 'none'
                            });
                        }, 3000);

                    });

                } else if (resp.type == 'incorrect') { // if the entered current password is incorrect/wrong    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userUpdatePassword() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when the response is 'success'    
                    $('.loader').hide();

                    $('#password-error').attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="password-name" style="color: red"></p>    )    // This is the same as:    $('#password-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                    $('#password-error').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'password-x' (e.g. password-mobile, password-email, ...)

                    // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                    setTimeout(function() {
                        $('#password-error').css({
                            'display': 'none'
                        });
                    }, 3000);

                } else if (resp.type == 'success') { // if there're no validation errors (login is successful), redirect to the Cart page    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when the response is 'success'    
                    $('.loader').hide();

                    $('#password-success').attr('style', 'color: green'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="password-name" style="color: red"></p>    )    // This is the same as:    $('#password-' + i).css('color', 'green');    // Change the CSS color of the <p> tags
                    $('#password-success').html(resp.message); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'password-x' (e.g. password-mobile, password-email, ...)

                    // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                    setTimeout(function() {
                        $('#password-success').css({
                            'display': 'none'
                        });
                    }, 3000);
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // Coupon Code redemption (Apply coupon) / Coupon Code HTML Form submission in front/products/cart_items.blade.php    
    // Note: For Coupons, user must be logged in (authenticated) to be able to redeem them. Both 'admins' and 'vendors' can add Coupons. Coupons added by 'vendor' will be available for their products ONLY, but ones added by 'admins' will be available for ALL products.
    $('#applyCoupon').submit(function() { // When the Coupon <form> is submitted
        var user = $(this).attr('user');
        // console.log(user);

        if (user == 1) { // if the user is logged in (authenticated), they can apply coupon (redeem coupons)

        } else { // if the user is unauthenticated/logged-out
            alert('Please login to apply Coupon!');
            return false; // Get out of the WHOLE function!
        }


        var code = $('#code').val();
        // console.log(code);



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/apply-coupon', // check this route in web.php
            type   : 'post',
            data   : {code: code}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request is successful
                // alert(resp.couponAmount);

                if (resp.message != '') {
                    alert(resp.message);
                }
    
                $('.totalCartItems').html(resp.totalCartItems); // totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file    // We created the CSS class 'totalCartItems' in front/layout/header.blade.php to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred
                $('#appendCartItems').html(resp.view); // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php
                $('#appendHeaderCartItems').html(resp.headerview); // 'headerview' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php    

                
                if (resp.couponAmount > 0) { // if there's a coupon code submitted and it's valid        // 'couponAmount' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php
                    $('.couponAmount').text('EGP' + resp.couponAmount); // 'couponAmount' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php    
                } else {
                    $('.couponAmount').text('EGP 0');
                }

                
                if (resp.grand_total > 0) { // if there's a coupon code submitted and it's valid        // 'grand_total' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php
                    $('.grand_total').text('EGP' + resp.grand_total); // 'grand_total' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the applyCoupon() method in Front/ProductsController.php    
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });



    // Edit Delivery Addresses via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Edit button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    
    $(document).on('click', '.editAddress', function() {
        var addressid = $(this).data('addressid'); // We use the jQuery data() function to get the Custom HTML Attribute value
        // alert(addressid);



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/get-delivery-address', // check this route in web.php
            type   : 'post',
            data   : {addressid: addressid}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request / AJAX call is successful
                // alert(resp);

                $('#showdifferent').removeClass('collapse');
                $('.newAddress').hide();
                $('.deliveryText').text('Edit Delivery Address');


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

    // Remove Delivery Addresse via AJAX (Page refresh and fill in the <input> fields with the authenticated/logged in user Delivery Addresses details from the `delivery_addresses` database table when clicking on the Remove button) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    
    $(document).on('click', '.removeAddress', function() {
        if (confirm('Are you sure you want to remove this?')) { // if the user clicks on Yes/OK    // confirm(): https://www.w3schools.com/jsref/met_win_confirm.asp
            var addressid = $(this).data('addressid'); // We use the jQuery data() function to get the Custom HTML Attribute value
            // alert(addressid);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                url    : '/remove-delivery-address', // check this route in web.php
                type   : 'post',
                data   : {addressid: addressid}, // Sending name/value pairs to server with the AJAX request (AJAX call)
                success: function(resp) { // if the AJAX request / AJAX call is successful
                    // alert(resp);

                    $('#deliveryAddresses').html(resp.view); // refresh the whole delivery_addresses.blade.php view    // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php

                    window.location.href = 'checkout';
                },
                error  : function() { // if the AJAX request is unsuccessful
                    alert('Error');
                }
            });
        }
    });

    // Save Delivery Addresses via AJAX (save the delivery addresses of the authenticated/logged-in user in `delivery_addresses` database table when submitting the HTML Form) in front/products/delivery_addresses.blade.php (which is 'include'-ed in front/products/checkout.blade.php) via AJAX, check front/js/custom.js    
    $(document).on('submit', '#addressAddEditForm', function() {
        // var formdata = $(this).serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp
        var formdata = $('#addressAddEditForm').serialize(); // serialize() method comes in handy when submitting an HTML Form using an AJAX request / Ajax call, as it collects all the name/value pairs from the HTML Form input fields like: <input>, <textarea>, <select><option>, ... HTML elements of the <form> (instead of the heavy work of assigning an identifier/handle for every <input> and <textarea>, ... using an HTML 'id' or CSS 'class', and then getting the value for every one of them like this:    $('#username).val();    )    // serialize() jQuery method: https://www.w3schools.com/jquery/ajax_serialize.asp



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/save-delivery-address', // check this route in web.php
            type   : 'post',
            data   : formdata, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request / AJAX call is successful
                // Showing Validation Errors in the view (from the backend/server response of our AJAX request):
                if (resp.type == 'error') { // if there're Validation Errors, show the Validation Error Messages (each of them under its respective <input> field)    // 'type' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php
                    // Hide our Preloader/Loader/Loading Page/Preloading Screen when there's an error    
                    $('.loader').hide();


                    // Note: in HTML in front/products/delivery_addresses.blade.php, to conveniently display the errors by jQuery loop, the pattern must be like: account-x (e.g. account-mobile, register-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="account-mobile"    ) so that when the vaildation errors array are sent as a response to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop)
                    $.each(resp.errors, function(i, error) { // 'i' is the attribute (the 'name' HTML attribute) ('i' is the JavaScript object keys or the PHP array (sent from backend/server response from method inside controller) keys/indexes, and 'error' is the Validation Error ('error' is the JavaScript object values or the PHP array (sent from backend/server response from method inside controller) values    // $.each(): https://api.jquery.com/jquery.each/    // 'errors' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the userAccount() method in Front/UserController.php
                        $('#delivery-' + i).attr('style', 'color: red'); // I already did this in the HTML page in the <p> tags in the HTML in front/users/user_account.blade.php (    <p id="account-name" style="color: red"></p>    )    // This is the same as:    $('#delivery-' + i).css('color', 'red');    // Change the CSS color of the <p> tags
                        $('#delivery-' + i).html(error); // replace the <p> tags that we created inside the user registration <form> in front/users/user_account.blade.php depending on x in their 'id' HTML attributes 'account-x' (e.g. account-mobile, account-email, ...)


                        // Make the Validation Error Messages disappear after a certain amount of time (don't stick)
                        setTimeout(function() {
                            $('#delivery-' + i).css({
                                'display': 'none'
                            });
                        }, 3000);
                    });
                } else { // if there're no Validation Errors
                    $('#deliveryAddresses').html(resp.view); // refresh the whole delivery_addresses.blade.php view    // 'view' is sent as a PHP array key (in the HTTP response from the server (backend)) from inside the saveDeliveryAddress() method in Front/AddressController.php

                    window.location.href = 'checkout';
                }
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });
    });

    // Calculate the Grand Total, Shipping Charges and Coupon Amount and displaying them depending on the chosen Delivery Address in front/products/checkout.blade.php
    $('input[name=address_id]').bind('change', function() {

        var shipping_charges = $(this).attr('shipping_charges'); // using Custom HTML data attributes (data-*)
        var total_price      = $(this).attr('total_price');      // using Custom HTML data attributes (data-*)
        var coupon_amount    = $(this).attr('coupon_amount');    // using Custom HTML data attributes (data-*)
        // alert(shipping_charges);

        // Display the Shipping Charges
        $('.shipping_charges').html('EGP' + shipping_charges);

        // Show the right Payment Methods radio buttons in front/products/checkout.blade.php based on Getting the results of checking if both the COD and Prepaid PIN codes of the user's Delviery Address exist in our both `cod_pincodes` and `prepaid_pincodes` database tables. Check the checkout() method in Front/ProductsController.php and front/products/checkout.blade.php    
        var codpincodeCount     = $(this).attr('codpincodeCount');     // using Custom HTML data attributes (data-*)
        var prepaidpincodeCount = $(this).attr('prepaidpincodeCount'); // using Custom HTML data attributes (data-*)
        if (codpincodeCount > 0) {
            $('.codMethod').show();
        } else {
            $('.codMethod').hide();
        }

        if (prepaidpincodeCount > 0) {
            $('.prepaidMethod').show();
        } else {
            $('.prepaidMethod').hide();
        }

        if (coupon_amount == '') {
            coupon_amount = 0;
        }

        // Display the Coupon Amount
        $('.couponAmount').html('EGP' + coupon_amount);

        // Calculate the Grand Total
        var grand_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        // alert(grand_total);

        // Display the Grand Total
        $('.grand_total').html('EGP' + grand_total);
    });

    // PIN code Availability Check: check if the PIN code of the user's Delivery Address exists in our database (in both `cod_pincodes` and `prepaid_pincodes`) or not in front/products/detail.blade.php via AJAX    
    $('#checkPincode').click(function() {
        // alert('test');

        var pincode = $('#pincode').val(); // using Custom HTML data attributes (data-*)
        // alert(pincode);
        if (pincode == '') { // If the user doesn't enter their PIN code (if the PIN code is empty)
            alert('Please enter Pincode');

            return false; // Stop the function's execution and get out!
        }



        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
            url    : '/check-pincode', // check this route in web.php
            type   : 'post',
            data   : {pincode: pincode}, // Sending name/value pairs to server with the AJAX request (AJAX call)
            success: function(resp) { // if the AJAX request / AJAX call is successful
                alert(resp);
            },
            error  : function() { // if the AJAX request is unsuccessful
                alert('Error');
            }
        });

    });

});