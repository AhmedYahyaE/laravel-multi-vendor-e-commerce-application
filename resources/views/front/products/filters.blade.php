{{-- This is the filters sidebar which is included by 'listing.blade.php' --}}
@php
    
    $productFilters = \App\Models\ProductsFilter::productFilters(); // Get all the (enabled/active) Filters
    // dd($productFilters);
@endphp
<!-- Shop-Left-Side-Bar-Wrapper -->
<h6 class="mobile-filter-trigger"><a id="filter-trigger" href="#"><b>FILTERS</b></a></h6>
<div class="filters-inner">

    <form id="form-products-listing-filter" class="facet-form" action="" method="GET">
        @if(isset($filters))
            @foreach ($filters as $filterKey => $filter)
                <h3 class="title-name">{{$filterKey}}</h3>

                @if ($filterKey == "categories")
                <ul>
                    @foreach ($filter as $categoryKey => $category)
                       <li class=""><a href="{{ url('products/category/'.$category['url']) }}">{{$category['category_name']}}</a></li> 
                       @if (count($category['sub_categories']) > 0)
                           <ul>
                            @foreach ($category['sub_categories'] as $sub_category)
                                <li class=""><a href="{{ url('products/category/'.$sub_category['url']) }}">{{$sub_category['category_name']}}</a></li>
                            @endforeach
                           </ul>
                       @endif
                    @endforeach
                </ul>
                @else
                <div class="associate-wrapper">
                    @foreach ($filter as $key => $childFilters)
                    <div>
                        <input type="checkbox" class="check-box {{$key}}" id="{{$filterKey}}{{ $key }}" name="{{$filterKey}}[]" value="{{ $childFilters }}">
                        <label class="label-text" for="{{$filterKey}}{{ $key }}">{{ $childFilters }}
                            <span class="total-fetch-items">({{count($filter)}})</span>
                        </label>
                    </div>
                    @endforeach
                </div>
                @endif
            @endforeach
        @endif
        
        {{-- Dynamic Filters --}}
        <!-- Filter -->
        @foreach ($productFilters as $filter) {{-- $productFilters comes from the far top of this file --}}
            @php
                // dd($categoryDetails['categoryDetails']);
    
                // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $categoryDetails variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
                $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $categoryDetails['catIds']); // $categoryDetails was passed from the listing() method in the Front/ProductsController
            @endphp
    
            @if (count($filter['filter_values']) > 0) {{-- show ONLY the filters (`filter_name`) which have filter values (`filter_value`) e.g. if the `Operating System` filter doesn't have filter values like: '4GB', '6GB', ..., DON'T show it --}}
                <div class="facet-filter-associates">
                    <h3 class="title-name">{{ $filter['filter_name'] }}</h3> {{-- e.g. 'Screen Size' --}}
                    {{-- Sidenote: There are TWO ways to submit a <form> to the backed: firstly, the regular one using the <button type="submit">, secondly, using AJAX by sending the "value" attributes of the <input> fields --}}
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
                </div>
            @endif
    
        @endforeach
        <!-- Filter -->
        
        <!-- Filter-Price -->
        {{-- Size, price, color, brand, … are also Dynamic Filters, but won't be managed like the other Dynamic Filters, but we will manage every filter of them from the suitable respective database table, like the 'size' Filter from the `products_attributes` database table, 'color' Filter and `price` Filter from `products` table, 'brand' Filter from `brands` table --}}
        {{-- Third: the 'price' filter (from `products` database table). Show the correct relevant product 'price' filter values (e.g. for the 'men' category (red, blue, ...) BUT for the mobiles category (grey, black, ...)) depending on the URL --}}
        <div class="facet-filter-associates">
            <h3 class="title-name">Price</h3>
    
            <div id="slide-price-range"></div>
            <p id="slide-price-display">₱<span id="slide-price-min"></span> - ₱<span id="slide-price-max"></span></p>
        </div>
        <!-- Filter-Price /- -->
        <button type="submit" class="apply-filter">Apply Filters</button>
    </form>

</div>
<!-- Shop-Left-Side-Bar-Wrapper /- -->