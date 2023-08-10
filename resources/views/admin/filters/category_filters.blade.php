{{-- This page is included by the add_edit_product.php page to show the related filters <select> box for the newly added product DEPENDING ON THE SELECTED CATEGORY of the product --}} 


@php
    
    $productFilters = \App\Models\ProductsFilter::productFilters(); // Get ALL the (enabled/active) Filters
    // dd($productFilters);

    // Note: $category_id may come from TWO places: the AJAX call and gets passed in through categoryFilters() method in Admin/FilterController.php    OR    the $product object in case of 'Edit Product' from addEditProduct() method in Admin/ProductsController    

    // In case of 'Edit a Product' only (NOT 'Add a new Product' and NOT from the $category_id which comes from the AJAX call), where $product is passed from addEditProduct() method in Admin/ProductsController    
    if (isset($product['category_id'])) {
        $category_id = $product['category_id'];
    }
@endphp


@foreach ($productFilters as $filter) {{-- show ALL the (enabled/active) Filters --}}
    @php
        // echo '<pre>', var_dump($product), '</pre>';
        // exit;
        // echo '<pre>', var_dump($filter), '</pre>';
        // exit;
        // dd($filter);
    @endphp

    @if (isset($category_id)) {{-- which comes from the AJAX call (passed in through the categoryFilters() method in Admin/FilterController.php, and ALSO may come from the if condition above there (in this page) in case of 'Edit Product' (not 'Add a Product') from addEditProduct() method in Admin/ProductsController --}}
        @php
            // dd($filter);

            // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $category_id variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
            $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $category_id); // $category_id comes from the AJAX call (check categoryFilters() method in Admin/FilterController.php
        @endphp

        @if ($filterAvailable == 'Yes') {{-- if the filter has the current category_id in its `cat_ids` --}}
            <div class="form-group">
                <label for="{{ $filter['filter_column'] }}">Select {{ $filter['filter_name'] }}</label> {{-- ONLY show the related filters of the added product! (NOT ALL FILTERS!) --}}
                <select name="{{ $filter['filter_column'] }}" id="{{ $filter['filter_column'] }}" class="form-control text-dark"> {{-- $filter['filter_column'] is like 'ram' --}}
                    <option value="">Select Filter Value</option>
                    @foreach ($filter['filter_values'] as $value) {{-- show the related values of the filter of the product --}}
                        @php
                            // echo '<pre>', var_dump($value), '</pre>'; exit;
                        @endphp
                        <option value="{{ $value['filter_value'] }}" @if (!empty($product[$filter['filter_column']]) && $product[$filter['filter_column']] == $value['filter_value']) selected @endif>{{ ucwords($value['filter_value']) }}</option> {{-- $value['filter_value'] is like '4GB' --}} {{-- $product[$filter['filter_column']]    is like    $product['screen_size']    which in turn, may be equal to    '5 to 5.4 in' --}}
                    @endforeach
                </select>
            </div>
        @endif
    @endif
@endforeach