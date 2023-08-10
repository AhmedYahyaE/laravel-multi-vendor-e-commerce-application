{{-- This is the filters sidebar which is included by 'listing.blade.php' --}}
@php
    
    $productFilters = \App\Models\ProductsFilter::productFilters(); // Get all the (enabled/active) Filters
    // dd($productFilters);
@endphp



<!-- Shop-Left-Side-Bar-Wrapper -->
<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- Fetch-Categories-from-Root-Category  -->
    <div class="fetch-categories">
        <h3 class="title-name">Browse Categories</h3>
        <!-- Level 1 -->
        <h3 class="fetch-mark-category">
            <a href="listing.html">T-Shirts
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Casual T-Shirts
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Formal T-Shirts
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        <!-- //end Level 1 -->
        <!-- Level 2 -->
        <h3 class="fetch-mark-category">
            <a href="listing.html">Shirts
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">Casual Shirts
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">Formal Shirts
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        <!-- //end Level 2 -->
    </div>
    <!-- Fetch-Categories-from-Root-Category  /- -->



    {{-- If the Search Form is not used for searching in front/layout/header.blade.php. Note that Filters will be hidden and won't work in case of using the Search Form --}} 
    @if (!isset($_REQUEST['search']))

        <!-- Filters -->
        <!-- Filter-Size -->

        
        {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
        {{-- First: the 'size' filter (from `products_attributes` database table). Show the correct relevant product 'size' filter values (e.g. for the 'men' category (small, medium, large, XL, ...) BUT for the mobiles category (64GB-4GB, 128GB-6GB, ...)) depending on the URL --}}
        @php
            $getSizes = \App\Models\ProductsFilter::getSizes($url); // get product sizes depending on the URL (to show the proper relevant 'size' filter values (whether small, medium, ... OR 64GB-4GB, 128GB-6GB, ...))    // $url is passed from the Front/ProductsController.php
            // dd($getSizes);
        @endphp


        <div class="facet-filter-associates">
            <h3 class="title-name">Size</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">



                    
                    {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
                    {{-- First: the 'size' filter (from `products_attributes` database table). Show the correct relevant product 'size' filter values (e.g. for the 'men' category (small, medium, large, XL, ...) BUT for the mobiles category (64GB-4GB, 128GB-6GB, ...)) depending on the URL --}}
                    @foreach ($getSizes as $key => $size) {{-- show the correct relevant product 'size' filter values (e.g. for the 'men' category (small, medium, large, XL, ...) BUT for the mobiles category (64GB-4GB, 128GB-6GB, ...)) depending on the URL --}}
                        <input type="checkbox" class="check-box size" id="size{{ $key }}" name="size[]" value="{{ $size }}"> {{-- Note!!: PLEASE NOTE THE SQUARE BRACKETS [] OF THE "name" ATTRIBUTE!! --}} {{-- echo the $size as a 'CSS class' to be able to use it in jQuery for filtering --}} {{-- the checked checkboxes <input> fields of the size filter values (like Small, medium, large, XL, ...) will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all --}}
                        <label class="label-text" for="size{{ $key }}">{{ $size }}
                            {{-- <span class="total-fetch-items">(2)</span> --}}
                        </label>
                    @endforeach



                </div>
            </form>
        </div>
        <!-- Filter-Size -->




        <!-- Filter-Color -->

        
        {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
        {{-- Second: the 'color' filter (from `products` database table). Show the correct relevant product 'color' filter values (e.g. for the 'men' category (red, blue, ...) BUT for the mobiles category (grey, black, ...)) depending on the URL --}}
        @php
            $getColors = \App\Models\ProductsFilter::getColors($url); // get product colors depending on the URL (to show the proper relevant 'color' filter values (whether small, medium, ... OR 64GB-4GB, 128GB-6GB, ...))    // $url is passed from the Front/ProductsController.php
            // dd($getColors);
        @endphp
        <div class="facet-filter-associates">
            <h3 class="title-name">Color</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">



                    
                    {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
                    {{-- Second: the 'color' filter (from `products` database table). Show the correct relevant product 'color' filter values (e.g. for the 'men' category (red, blue, ...) BUT for the mobiles category (grey, black, ...)) depending on the URL --}}
                    @foreach ($getColors as $key => $color) {{-- show the correct relevant product 'color' filter values (e.g. for the 'men' category (red, blue, ...) BUT for the mobiles category (grey, black, ...)) depending on the URL --}}
                        <input type="checkbox" class="check-box color" id="color{{ $key }}" name="color[]" value="{{ $color }}"> {{-- Note!!: PLEASE NOTE THE SQUARE BRACKETS [] OF THE "name" ATTRIBUTE!! --}} {{-- echo the $color as a 'CSS class' to be able to use it in jQuery for filtering --}} {{-- the checked checkboxes <input> fields of the color filter values (like red, blue, ...) will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all --}}
                        <label class="label-text" for="color{{ $key }}">{{ $color }}
                            {{-- <span class="total-fetch-items">(1)</span> --}}
                        </label>
                    @endforeach



                </div>
            </form>
        </div>
        <!-- Filter-Color /- -->


        <!-- Filter-Brand -->

        
        {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
        {{-- Fourth: the 'brand' filter (from `products` and `brands` database table). Show the correct relevant product 'price' filter values (e.g. for the 'men' category (LC Waikiki, Concrete, ...) BUT for the mobiles category (iPhone, Xiaomi, ...)) depending on the URL --}}
        @php
            $getBrands = \App\Models\ProductsFilter::getBrands($url); // get product brands depending on the URL (to show the proper relevant 'brand' filter values (whether LC Waikiki, Concrete, ... OR iPhone, Xiaomi, ...))    // $url is passed from the Front/ProductsController.php
            // dd($getColors);
        @endphp
        <div class="facet-filter-associates">
            <h3 class="title-name">Brand</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">



                    
                    {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
                    {{-- Fourth: the 'brand' filter (from `products` and `brands` database table). Show the correct relevant product 'price' filter values (e.g. for the 'men' category (LC Waikiki, Concrete, ...) BUT for the mobiles category (iPhone, Xiaomi, ...)) depending on the URL --}}
                    @foreach ($getBrands as $key => $brand) {{-- show the correct relevant product 'brand' filter values (e.g. for the 'men' category (LC Waikiki, Concrete, ...) BUT for the mobiles category (iPhone, Xiaomi, ...)) depending on the URL --}}
                        <input type="checkbox" class="check-box brand" id="brand{{ $key }}" name="brand[]" value="{{ $brand['id'] }}"> {{-- Note!!: PLEASE NOTE THE SQUARE BRACKETS [] OF THE "name" ATTRIBUTE!! --}} {{-- echo the $brand as a 'CSS class' to be able to use it in jQuery for filtering --}} {{-- the checked checkboxes <input> fields of the brand filter values (like Concrete, Zara, ...) will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all --}}
                            <label class="label-text" for="brand{{ $key }}">{{ $brand['name'] }}
                                {{-- <span class="total-fetch-items">(0)</span> --}}
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filter-Brand /- -->



        <!-- Filter-Price -->

        
        {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
        {{-- Third: the 'price' filter (from `products` database table). Show the correct relevant product 'price' filter values (e.g. for the 'men' category (red, blue, ...) BUT for the mobiles category (grey, black, ...)) depending on the URL --}}
        <div class="facet-filter-associates">
            <h3 class="title-name">Price</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">


                    {{-- Third: the 'price' filter --}} 
                    @php
                        // our desired array of price ranges
                        $prices = array('0-1000', '1000-2000', '2000-5000', '5000-10000', '10000-100000');
                    @endphp

                    @foreach ($prices as $key => $price)
                        <input type="checkbox" class="check-box price" id="price{{ $key }}" name="price[]" value="{{ $price }}"> {{-- Note!!: PLEASE NOTE THE SQUARE BRACKETS [] OF THE "name" ATTRIBUTE!! --}} {{-- echo the $price as a 'CSS class' to be able to use it in jQuery for filtering --}} {{-- the checked checkboxes <input> fields of the price filter values (like '1000-2000', '2000-5000', ...) will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all --}}
                        <label class="label-text" for="price{{ $key }}">EGP {{ $price }}
                        </label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- Filter-Price /- -->



        
        {{-- Dynamic Filters --}}
        <!-- Filter -->
        @foreach ($productFilters as $filter) {{-- $productFilters comes from the far top of this file --}}
            @php
                // dd($filter);

                // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $categoryDetails variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
                $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $categoryDetails['categoryDetails']['id']); // $categoryDetails was passed from the listing() method in the Front/ProductsController
            @endphp

            @if ($filterAvailable == 'Yes') {{-- if the current category has a filter --}}
                @if (count($filter['filter_values']) > 0) {{-- show ONLY the filters (`filter_name`) which have filter values (`filter_value`) e.g. if the `Operating System` filter doesn't have filter values like: '4GB', '6GB', ..., DON'T show it --}}
                    <div class="facet-filter-associates">
                        <h3 class="title-name">{{ $filter['filter_name'] }}</h3> {{-- e.g. 'Screen Size' --}}
                        {{-- Sidenote: There are TWO ways to submit a <form> to the backed: firstly, the regular one using the <button type="submit">, secondly, using AJAX by sending the "value" attributes of the <input> fields --}}
                        <form class="facet-form" action="#" method="post"> {{-- Absence of the "action" attribute means submitting the <form> data to the same page, and absence of "method" attribute means the <form> uses the default "method" which is "GET" --}}
                            <div class="associate-wrapper">
                                @foreach ($filter['filter_values'] as $value) {{-- $value means 'filter value' --}}
                                    {{-- <input type="checkbox" class="check-box" id="{{ $value['filter_value'] }}"> --}}

                                    {{-- We used TWO ways to operate the Dynamic Filters: statically for every filter using jQuery and dynamically from Admin Panel --}}
                                    {{-- First way: Statically using jQuery. Check front/custom.js --}}
                                    <input type="checkbox" class="check-box {{ $filter['filter_column'] }}" id="{{ $value['filter_value'] }}" name="{{ $filter['filter_column'] }}[]" value="{{ $value['filter_value'] }}"> {{-- Note!!: PLEASE NOTE THE SQUARE BRACKETS [] OF THE "name" ATTRIBUTE!! --}} {{-- echo the filter name as a 'CSS class' to be able to use it in jQuery for filtering, and also add the "name" (as an array!! PLEASE NOTE THE SQUARE BRACKETS [] !!! e.g.    'fabric' => ['cotton', 'polyester']    ) and "value" HTML attributes too --}}    {{-- the checked checkboxes <input> fields will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php e.g.    'fabric' => ['cotton', 'polyester']    , or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all --}}
                                    <label class="label-text" for="{{ $value['filter_value'] }}">{{ ucwords($value['filter_value']) }}
                                        {{-- <span class="total-fetch-items">(0)</span> --}}
                                    </label>
                                @endforeach
                            </div>
                        </form>
                    </div>
                @endif
            @endif

        @endforeach
        <!-- Filter -->

    @endif


</div>
<!-- Shop-Left-Side-Bar-Wrapper /- -->