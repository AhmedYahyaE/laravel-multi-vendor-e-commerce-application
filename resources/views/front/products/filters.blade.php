{{-- This is the filters sidebar which is included by 'listing.blade.php' --}}



@php
    // https://www.youtube.com/watch?v=Rr2tkfVtVMc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=86
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



    <!-- Filters -->
    <!-- Filter-Size -->


    {{-- https://www.youtube.com/watch?v=7Y1OOQr-PTs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=92 --}}
    {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
    {{-- show the correct relevant product 'size' filter values (e.g. for the 'men' category (small, medium, large, XL, ...) BUT for the mobiles category (64GB-4GB, 128GB-6GB, ...)) depending on the URL --}}
    @php
        $getSizes = \App\Models\ProductsFilter::getSizes($url); // get product sizes depending on the URL (to show the proper relevant 'size' filter values (whether small, medium, ... OR 64GB-4GB, 128GB-6GB, ...))    // $url is passed from the Front/ProductsController.php
        // dd($getSizes);
    @endphp


    <div class="facet-filter-associates">
        <h3 class="title-name">Size</h3>
        <form class="facet-form" action="#" method="post">
            <div class="associate-wrapper">



                {{-- https://www.youtube.com/watch?v=7Y1OOQr-PTs&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=92 --}}
                {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
                @foreach ($getSizes as $key => $size) {{-- show the correct relevant product 'size' filter values (e.g. for the 'men' category (small, medium, large, XL, ...) BUT for the mobiles category (64GB-4GB, 128GB-6GB, ...)) depending on the URL --}}
                    <input type="checkbox" class="check-box size" id="size{{ $size }}" name="size[]" value="{{ $size }}"> {{-- Note!!: PLEASE NOTE THE SQUARE BRACKETS [] OF THE "name" ATTRIBUTE!! --}} {{-- echo the $size as a 'CSS class' to be able to use it in jQuery for filtering --}} {{-- the checked checkboxes <input> fields of the size filter values (like Small, medium, large, XL, ...) will be submitted as an ARRAY because we used SQUARE BRACKETS [] with the "name" HTML attribute in the checkbox <input> field in filters.blade.php, or else, AJAX is used to send the <input> values WITHOUT submitting the <form> at all --}}
                    <label class="label-text" for="size{{ $size }}">{{ $size }}
                        {{-- <span class="total-fetch-items">(2)</span> --}}
                    </label>
                @endforeach



            </div>
        </form>
    </div>
    <!-- Filter-Size -->
    <!-- Filter-Color -->
    <div class="facet-filter-associates">
        <h3 class="title-name">Color</h3>
        <form class="facet-form" action="#" method="post">
            <div class="associate-wrapper">
                <input type="checkbox" class="check-box" id="cbs-16">
                <label class="label-text" for="cbs-16">Heather Grey
                    <span class="total-fetch-items">(1)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-17">
                <label class="label-text" for="cbs-17">Black
                    <span class="total-fetch-items">(1)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-18">
                <label class="label-text" for="cbs-18">White
                    <span class="total-fetch-items">(3)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-19">
                <label class="label-text" for="cbs-19">Mischka Plain
                    <span class="total-fetch-items">(1)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-20">
                <label class="label-text" for="cbs-20">Black Bean
                    <span class="total-fetch-items">(1)</span>
                </label>
            </div>
        </form>
    </div>
    <!-- Filter-Color /- -->


    <!-- Filter-Brand -->
    <div class="facet-filter-associates">
        <h3 class="title-name">Brand</h3>
        <form class="facet-form" action="#" method="post">
            <div class="associate-wrapper">
                <input type="checkbox" class="check-box" id="cbs-21">
                <label class="label-text" for="cbs-21">Calvin Klein
                    <span class="total-fetch-items">(0)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-22">
                <label class="label-text" for="cbs-22">Diesel
                    <span class="total-fetch-items">(0)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-23">
                <label class="label-text" for="cbs-23">Polo
                    <span class="total-fetch-items">(0)</span>
                </label>
                <input type="checkbox" class="check-box" id="cbs-24">
                <label class="label-text" for="cbs-24">Tommy Hilfiger
                    <span class="total-fetch-items">(0)</span>
                </label>
            </div>
        </form>
    </div>
    <!-- Filter-Brand /- -->



    {{-- https://www.youtube.com/watch?v=Rr2tkfVtVMc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=86 --}}
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

                                {{-- We used TWO ways to operate the Dynamic Filters: statically for every filter using jQuery and dynamically from Admin Panel. Check https://www.youtube.com/watch?v=r-NjOGA4qFw&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=88 --}}
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



    <!-- Filter-Price -->
    <div class="facet-filter-by-price">
        <h3 class="title-name">Price</h3>
        <form class="facet-form" action="#" method="post">
            <!-- Final-Result -->
            <div class="amount-result clearfix">
                <div class="price-from">$0</div>
                <div class="price-to">$3000</div>
            </div>
            <!-- Final-Result /- -->
            <!-- Range-Slider  -->
            <div class="price-filter"></div>
            <!-- Range-Slider /- -->
            <!-- Range-Manipulator -->
            <div class="price-slider-range" data-min="0" data-max="5000" data-default-low="0" data-default-high="3000" data-currency="$"></div>
            <!-- Range-Manipulator /- -->
            <button type="submit" class="button button-primary">Filter</button>
        </form>
    </div>
    <!-- Filter-Price /- -->
    <!-- Filter-Free-Shipping -->
    <div class="facet-filter-by-shipping">
        <h3 class="title-name">Shipping</h3>
        <form class="facet-form" action="#" method="post">
            <input type="checkbox" class="check-box" id="cb-free-ship">
            <label class="label-text" for="cb-free-ship">Free Shipping</label>
        </form>
    </div>
    <!-- Filter-Free-Shipping /- -->
    <!-- Filter-Rating -->
    <div class="facet-filter-by-rating">
        <h3 class="title-name">Rating</h3>
        <div class="facet-form">
            <!-- 5 Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:76px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">(0)</span>
            </div>
            <!-- 5 Stars /- -->
            <!-- 4 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:60px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (5)</span>
            </div>
            <!-- 4 & Up Stars /- -->
            <!-- 3 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:45px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 3 & Up Stars /- -->
            <!-- 2 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:30px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 2 & Up Stars /- -->
            <!-- 1 & Up Stars -->
            <div class="facet-link">
                <div class="item-stars">
                    <div class='star'>
                        <span style='width:15px'></span>
                    </div>
                </div>
                <span class="total-fetch-items">& Up (0)</span>
            </div>
            <!-- 1 & Up Stars /- -->
        </div>
    </div>
    <!-- Filter-Rating -->
    <!-- Filters /- -->
</div>
<!-- Shop-Left-Side-Bar-Wrapper /- -->