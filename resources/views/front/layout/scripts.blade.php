@php
    // Note: Most of this file contents were moved from front/js/custom.js to enable us to write PHP code within JavaScript code (to operate the Dynamic Filters dynamically (the second way)). This file is 'include'-ed in front/layout/layout.blade.php    // Note: In order to be able to write PHP code within JavaScript code, you must write it in a .php file (a file with .php extension) (Note that this file has a '.php' extension!) (Another way to go is using an AJAX call to get the $productFilters!) 
    // This file is 'include'-ed in front/layout/layout.blade.php
    // Operate the Dynamic Filters dynamically not statically (the second way)    



    $productFilters = \App\Models\ProductsFilter::productFilters(); // Get all the (enabled/active) Filters    // (Another way to go is using an AJAX call to get the $productFilters!)
    // dd($productFilters);
@endphp


<script> // Note: We must use a <script> tag to write JavaScript because this file has a .php extension
    // Using jQuery for the website FRONT section:
    $(document).ready(function() {

        // Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery) in front/products/listing.blade.php    



        // Sorting Filter WITH AJAX in front/products/listing.blade.php. Check ajax_products_listing.blade.php (which is 'include'-ed by listing.blade.php page)    
        $('#sort').on('change', function() { // selecting the <selec> box in listing.blade.php
            var sort = $('#sort').val(); // Get the <select> box value of the 'sort' name HTML attribute
            var url  = $('#url').val(); // Get the <input> field value of the 'url' name HTML attribute ($url is passed from listing() method in Front/ProductsController.php to view (lising.blade.php))


            // Send all the 'fabric' Dynamic Filter values (the ':checked' checkboxes <input> fields values in filters.blade.php) along with the Sorting Filters 'sort'    


            var size  = get_filter('size'); // get all the ':checked' checkboxes (the 'size' filter values) in filters.blade.php    // get the filter values array of 'size' filter like    ['small', 'medium', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var color = get_filter('color'); // get all the ':checked' checkboxes (the 'color' filter values) in filters.blade.php    // get the filter values array of 'color' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var price = get_filter('price'); // get all the ':checked' checkboxes (the 'price' filter values) in filters.blade.php    // get the filter values array of 'price' filter like    ['1000-2000', '2000-5000', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var brand = get_filter('brand'); // get all the ':checked' checkboxes (the 'brand' filter values) in filters.blade.php    // get the filter values array of 'brand' filter like    ['Concrete', 'Adidas', ...]    as an ARRAY    // get_filter() is in front/js/custom.js


            // Send all the Dynamic Filter values DYNAMICALLY (the ':checked' checkboxes <input> fields values in filters.blade.php) along with the Sorting Filters 'sort'    
            // When a Sorting Filter is clicked, get all the Dynamic Filters's filter values to send them too with the AJAX call, along with sort and url
            @foreach ($productFilters as $filters) // A new separate loop to get all the other remaining filters' values, along with the current jQuery selected filter    // We have to loop over the main filters here AGAIN, otherwise the $(.filter) selector would select the filter values of ONE filter ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'fabric' filter values like: ['cotton', 'polyester'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}'); // get all the ':checked' checkboxes (all the other filter values along with current jQuery selected filter) in filters.blade.php    // get the filter values array of filter like    ['cotton', 'polyester', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            @endforeach


            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                url    : url, // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
                type   : 'Post',
                data   : { // we pass the 'sort' (Sorting Filter), 'url' variables along with the all Dynamic Filters's values DYNAMICALLY    

                    // When a Sorting Filter is clicked, send all the Dynamic Filters's filter values too with the AJAX call, along with sort and url
                    @foreach ($productFilters as $filters) // A new separate loop to send all the other remaining filters' values in the AJAX call, along with sending the current jQuery selected filter's values    // We have to loop over the main filters here AGAIN, otherwise the $(.filter) selector would select the filter values of ONE filter ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'fabric' filter values like: ['cotton', 'polyester'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                        {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
                    @endforeach
                    sort: sort, url: url, size: size, color: color, price: price, brand: brand

                },
                success: function(data) {
                    $('.filter_products').html(data);
                },
                error  : function() {
                    alert('Error');
                }
            });
        });

        // operate Dynamic Filters statically using the first way (for the 'fabric' filter only): // Check get_filter() function in this file and the listing() method in Front/ProductsController.php
        // We will need to send the 'url' and 'sort' to include them too just like we did with the Sorting Filter function above (in this file) (along with sending 'fabric')

        // operate Dynamic Filters DYNAMICALLY using the SECOND way (for ALL filters): // Check get_filter() function in front/js/custom.js and the listing() method in Front/ProductsController.php    
        // We will need to send the 'url' and 'sort' to include them too just like we did with the Sorting Filter function above (in this file) (along with sending 'fabric')
        // WHEN ANY FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
        @foreach ($productFilters as $filter) // get all the active/enabled filters from database ($productFilters comes from the far top of this file)

            // WHEN ANY FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
            $('.{{ $filter['filter_column'] }}').on('click', function() { // select the 'fabric' filter (which is generated dynamically from the foreach loop) in filters.blade.php
                var url  = $('#url').val(); // from the <select> box in listing.blade.php page (which, in turn, includes filters.blade.php page)
                var sort = $('#sort option:selected').val(); // select the :selected <option> element ONLY which is :selected in listing.blade.php (which, in turn, includes filters.blade.php) (like 'price_highest', 'name_z_a', ...)    // https://www.w3schools.com/jquery/sel_input_selected.asp    // .text() https://www.w3schools.com/jquery/html_text.asp    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)


                var size  = get_filter('size'); // get all the ':checked' checkboxes (the 'size' filter values) in filters.blade.php    // get the filter values array of 'size' filter like    ['small', 'medium', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
                var color = get_filter('color'); // get all the ':checked' checkboxes (the 'color' filter values) in filters.blade.php    // get the filter values array of 'color' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
                var price = get_filter('price'); // get all the ':checked' checkboxes (the 'price' filter values) in filters.blade.php    // get the filter values array of 'price' filter like    ['1000-2000', '2000-5000', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
                var brand = get_filter('brand'); // get all the ':checked' checkboxes (the 'brand' filter values) in filters.blade.php    // get the filter values array of 'brand' filter like    ['Concrete', 'Adidas', ...]    as an ARRAY    // get_filter() is in front/js/custom.js


                
                // WHEN ANY FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
                @foreach ($productFilters as $filters) // A new separate loop to get all the other remaining filters' values, along with the current jQuery selected filter    // We have to loop over the main filters here AGAIN, otherwise the $(.filter) selector would select the filter values of ONE filter ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'fabric' filter values like: ['cotton', 'polyester'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                    var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php    // get the filter values array of 'fabric' filter like    ['cotton', 'polyester', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
                @endforeach



                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                    url    : url, // this will hit the listing() method in Front/ProductsController.php    // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
                    method : 'Post',
                    data   : {

                        // WHEN ANY FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!! (Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js))
                        @foreach ($productFilters as $filters) // A new separate loop to send all the other remaining filters' values in the AJAX call, along with sending the current jQuery selected filter's values    // We have to loop over the main filters here AGAIN, otherwise the $(.filter) selector would select the filter values of ONE filter ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'color' filter values like: ['red', 'green'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                            {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
                        @endforeach
                        url: url, sort: sort, size: size, color: color, price: price, brand: brand

                    },
                    success: function(data) {
                        $('.filter_products').html(data); // in listing.blade.php
                    },
                    error  : function() {
                        alert('Error');
                    }
                });
            });

        @endforeach



        
        // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
        // First: the 'size' filter (from `products_attributes` database table)
        // WHEN the 'size' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'size' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
        $('.size').on('click', function() { // select the 'size' filter in filters.blade.php
            var url  = $('#url').val(); // from the <select> box in listing.blade.php page (which, in turn, includes filters.blade.php page)
            var sort = $('#sort option:selected').val(); // select the :selected <option> element ONLY which is :selected in listing.blade.php (which, in turn, includes filters.blade.php) (like 'price_highest', 'name_z_a', ...)    // https://www.w3schools.com/jquery/sel_input_selected.asp    // .text() https://www.w3schools.com/jquery/html_text.asp    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)


            var size  = get_filter('size'); // get all the ':checked' checkboxes (the 'size' filter values) in filters.blade.php    // get the filter values array of 'size' filter like    ['small', 'medium', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var color = get_filter('color'); // get all the ':checked' checkboxes (the 'color' filter values) in filters.blade.php    // get the filter values array of 'color' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var price = get_filter('price'); // get all the ':checked' checkboxes (the 'price' filter values) in filters.blade.php    // get the filter values array of 'price' filter like    ['1000-2000', '2000-5000', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var brand = get_filter('brand'); // get all the ':checked' checkboxes (the 'brand' filter values) in filters.blade.php    // get the filter values array of 'brand' filter like    ['Concrete', 'Adidas', ...]    as an ARRAY    // get_filter() is in front/js/custom.js


            
            // WHEN the 'size' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'size' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
            @foreach ($productFilters as $filters) // A new separate loop to get all the other remaining filters' values, along with the current jQuery selected 'size' filter    // We have to loop over the main filters here AGAIN, otherwise the $(.size) selector would select the 'size' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'size' filter values like: ['small', 'medium'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php    // get the filter values array of 'fabric' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            @endforeach



            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                url    : url, // this will hit the listing() method in Front/ProductsController.php    // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
                method : 'Post',
                data   : {

                    // WHEN the 'size' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'size' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!! (Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js))
                    @foreach ($productFilters as $filters) // A new separate loop to send all the other remaining filters' values in the AJAX call, along with sending the current jQuery selected 'size' filter's values    // We have to loop over the main filters here AGAIN, otherwise the $(.size) selector would select the 'size' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'size' filter values like: ['small', 'medium'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                        {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
                    @endforeach
                    url: url, sort: sort, size: size, color: color, price: price, brand: brand

                },
                success: function(data) {
                    $('.filter_products').html(data); // in listing.blade.php
                },
                error  : function() {
                    alert('Error');
                }
            });
        });

        
        // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
        // Second: the 'color' filter (from `products` database table)
        // WHEN the 'color' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'color' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
        $('.color').on('click', function() { // select the 'color' filter in filters.blade.php
            var url  = $('#url').val(); // from the <select> box in listing.blade.php page (which, in turn, includes filters.blade.php page)
            var sort = $('#sort option:selected').val(); // select the :selected <option> element ONLY which is :selected in listing.blade.php (which, in turn, includes filters.blade.php) (like 'price_highest', 'name_z_a', ...)    // https://www.w3schools.com/jquery/sel_input_selected.asp    // .text() https://www.w3schools.com/jquery/html_text.asp    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)

            var size  = get_filter('size'); // get all the ':checked' checkboxes (the 'size' filter values) in filters.blade.php    // get the filter values array of 'size' filter like    ['small', 'medium', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var color = get_filter('color'); // get all the ':checked' checkboxes (the 'color' filter values) in filters.blade.php    // get the filter values array of 'color' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var price = get_filter('price'); // get all the ':checked' checkboxes (the 'price' filter values) in filters.blade.php    // get the filter values array of 'price' filter like    ['1000-2000', '2000-5000', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var brand = get_filter('brand'); // get all the ':checked' checkboxes (the 'brand' filter values) in filters.blade.php    // get the filter values array of 'brand' filter like    ['Concrete', 'Adidas', ...]    as an ARRAY    // get_filter() is in front/js/custom.js


            
            // WHEN the 'color' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'color' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
            @foreach ($productFilters as $filters) // A new separate loop to get all the other remaining filters' values, along with the current jQuery selected 'color' filter    // We have to loop over the main filters here AGAIN, otherwise the $(.color) selector would select the 'color' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'color' filter values like: ['small', 'medium'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php    // get the filter values array of 'fabric' filter like    ['red', 'green', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            @endforeach



            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                url    : url, // this will hit the listing() method in Front/ProductsController.php    // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
                method : 'Post',
                data   : {

                    // WHEN the 'color' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'color' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!! (Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js))
                    @foreach ($productFilters as $filters) // A new separate loop to send all the other remaining filters' values in the AJAX call, along with sending the current jQuery selected 'color' filter's values    // We have to loop over the main filters here AGAIN, otherwise the $(.color) selector would select the 'color' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'color' filter values like: ['small', 'medium'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                        {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
                    @endforeach
                    url: url, sort: sort, size: size, color: color, price: price, brand: brand

                },
                success: function(data) {
                    $('.filter_products').html(data); // in listing.blade.php
                },
                error  : function() {
                    alert('Error');
                }
            });
        });

        
        // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
        // Third: the 'price' filter (from `products` database table)
        // WHEN the 'price' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'price' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
        $('.price').on('click', function() { // select the 'price' filter in filters.blade.php
            var url  = $('#url').val(); // from the <select> box in listing.blade.php page (which, in turn, includes filters.blade.php page)
            var sort = $('#sort option:selected').val(); // select the :selected <option> element ONLY which is :selected in listing.blade.php (which, in turn, includes filters.blade.php) (like 'price_highest', 'name_z_a', ...)    // https://www.w3schools.com/jquery/sel_input_selected.asp    // .text() https://www.w3schools.com/jquery/html_text.asp    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)

            var size  = get_filter('size'); // get all the ':checked' checkboxes (the 'size' filter values) in filters.blade.php    // get the filter values array of 'size' filter like    ['small', 'medium', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var color = get_filter('color'); // get all the ':checked' checkboxes (the 'color' filter values) in filters.blade.php    // get the filter values array of 'color' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var price = get_filter('price'); // get all the ':checked' checkboxes (the 'price' filter values) in filters.blade.php    // get the filter values array of 'price' filter like    ['1000-2000', '2000-5000', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var brand = get_filter('brand'); // get all the ':checked' checkboxes (the 'brand' filter values) in filters.blade.php    // get the filter values array of 'brand' filter like    ['Concrete', 'Adidas', ...]    as an ARRAY    // get_filter() is in front/js/custom.js


            // WHEN the 'price' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'price' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
            @foreach ($productFilters as $filters) // A new separate loop to get all the other remaining filters' values, along with the current jQuery selected 'price' filter    // We have to loop over the main filters here AGAIN, otherwise the $(.price) selector would select the 'price' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'price' filter values like: ['small', 'medium'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php    // get the filter values array of 'fabric' filter like    ['cotton', 'polyester', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            @endforeach



            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                url    : url, // this will hit the listing() method in Front/ProductsController.php    // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
                method : 'Post',
                data   : {

                    // WHEN the 'price' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'price' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!! (Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js))
                    @foreach ($productFilters as $filters) // A new separate loop to send all the other remaining filters' values in the AJAX call, along with sending the current jQuery selected 'price' filter's values    // We have to loop over the main filters here AGAIN, otherwise the $(.price) selector would select the 'price' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'price' filter values like: ['small', 'medium'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                        {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
                    @endforeach
                    url: url, sort: sort, size: size, color: color, price: price, brand: brand

                },
                success: function(data) {
                    $('.filter_products').html(data); // in listing.blade.php
                },
                error  : function() {
                    alert('Error');
                }
            });
        });

        
        // Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table
        // Fourth: the 'brand' filter (from `products` and `brands` database tables)
        // WHEN the 'brand' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'brand' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
        $('.brand').on('click', function() { // select the 'brand' filter in filters.blade.php
            var url  = $('#url').val(); // from the <select> box in listing.blade.php page (which, in turn, includes filters.blade.php page)
            var sort = $('#sort option:selected').val(); // select the :selected <option> element ONLY which is :selected in listing.blade.php (which, in turn, includes filters.blade.php) (like 'brand_highest', 'name_z_a', ...)    // https://www.w3schools.com/jquery/sel_input_selected.asp    // .text() https://www.w3schools.com/jquery/html_text.asp    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)

            var size  = get_filter('size'); // get all the ':checked' checkboxes (the 'size' filter values) in filters.blade.php    // get the filter values array of 'size' filter like    ['small', 'medium', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var color = get_filter('color'); // get all the ':checked' checkboxes (the 'color' filter values) in filters.blade.php    // get the filter values array of 'color' filter like    ['red', 'blue', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var price = get_filter('price'); // get all the ':checked' checkboxes (the 'price' filter values) in filters.blade.php    // get the filter values array of 'price' filter like    ['1000-2000', '2000-5000', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            var brand = get_filter('brand'); // get all the ':checked' checkboxes (the 'brand' filter values) in filters.blade.php    // get the filter values array of 'brand' filter like    ['Concrete', 'Adidas', ...]    as an ARRAY    // get_filter() is in front/js/custom.js


            // WHEN the 'brand' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'brand' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!!
            @foreach ($productFilters as $filters) // A new separate loop to get all the other remaining filters' values, along with the current jQuery selected 'brand' filter    // We have to loop over the main filters here AGAIN, otherwise the $(.brand) selector would select the 'brand' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'brand' filter values like: ['Concrete', 'Adidas'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}'); // get all the ':checked' checkboxes (the 'fabric' filter values) in filters.blade.php    // get the filter values array of 'fabric' filter like    ['cotton', 'polyester', ...]    as an ARRAY    // get_filter() is in front/js/custom.js
            @endforeach



            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token    
                url    : url, // this will hit the listing() method in Front/ProductsController.php    // e.g. /men (this url hits the Dynamic Routes in web.php using a foreach loop ('ProductsController@listing'))    // check the web.php for this route and check the ProductsController for the listing() method
                method : 'Post',
                data   : {

                    // WHEN the 'brand' FILTER'S FILTER VALUE IS CLICKED, SEND THE CLICKED 'brand' FILTER'S FILTER VALUES ALONG WITH THE OTHER FILTERS' FILTER VALUES TOO!! (Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js))
                    @foreach ($productFilters as $filters) // A new separate loop to send all the other remaining filters' values in the AJAX call, along with sending the current jQuery selected 'brand' filter's values    // We have to loop over the main filters here AGAIN, otherwise the $(.brand) selector would select the 'brand' filter values ONLY, and would ignore the filter values of all the other filters e.g. Without the foreach loop, it would select the 'brand' filter values like: ['Concrete', 'Adidas'] but would ignore another filter like 'sleeve' filter and ignore its checked values like: ['full sleeve', 'half sleeve'] . Tip: Remove the foreach loop and change $filters to $filter and check the console (Don't forget to console.log(filter) inside the get_filter() function in front/js/custom.js)
                        {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }}, // Note that fabric is an ARRAY of the filter values (like    ['cotton', 'polyester', ...]    ) of the 'fabric' filter    // send the Sorting Filters values (sort) along with the Dynamic Filters values ('fabric' Dynamic Filter values)
                    @endforeach
                    url: url, sort: sort, size: size, color: color, price: price, brand: brand

                },
                success: function(data) {
                    $('.filter_products').html(data); // in listing.blade.php
                },
                error  : function() {
                    alert('Error');
                }
            });
        });
    });
</script>