{{-- https://www.youtube.com/watch?v=A5hIj_0L648&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=77 --}}
@extends('front.layout.layout')


@section('content')
<!-- Page Introduction Wrapper -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Shop</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="index.html">Home</a>
                </li>
                <li class="is-marked">
                    <a href="listing.html">Shop</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Page Introduction Wrapper /- -->

<!-- Shop-Page -->
<div class="page-shop u-s-p-t-80">
    <div class="container">
        <!-- Shop-Intro -->
        <div class="shop-intro">
            <ul class="bread-crumb">
                <li class="has-separator">
                    <a href="{{ url('/') }}">Home</a>
                </li>


                {{-- Breadcrumbs --}} {{-- https://www.youtube.com/watch?v=8kf1WDELK6o&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=77 --}}
                <?php
                    echo $categoryDetails['breadcrumbs'];
                ?>



            </ul>
        </div>
        <!-- Shop-Intro /- -->
        <div class="row">



            {{-- Include the listing page sidebar (Products filters (size, color, ...)) --}}
            @include('front.products.filters')



            <!-- Shop-Right-Wrapper -->
            <div class="col-lg-9 col-md-9 col-sm-12">
                <!-- Page-Bar -->
                <div class="page-bar clearfix">
                    <div class="shop-settings">
                        <a id="list-anchor">
                            <i class="fas fa-th-list"></i>
                        </a>
                        <a id="grid-anchor" class="active"> {{-- make this 'grid' layout the DEFAULT layout --}} {{-- Check 10:25 in https://www.youtube.com/watch?v=A5hIj_0L648&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=77 --}}
                            <i class="fas fa-th"></i>
                        </a>
                    </div>
                    


                    <!-- Toolbar Sorter 1  -->
                    {{-- Sorting Filter WITHOUT AJAX (using HTML <form> and jQuery). Check front/js/custom.js file for the related script --}} {{-- https://www.youtube.com/watch?v=u2NiZzjRL8U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=80 --}}
                    <form name="sortProducts" id="sortProducts"> {{-- Absence of the "action" attribute means submitting the <form> data to the same page --}}
                        <div class="toolbar-sorter">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="sort-by">Sort By</label>
                                <select name="sort" id="sort" class="select-box">
                                    {{-- <option selected="selected" value="">Sort By: Best Selling</option> --}}
                                    <option value="" selected>Select</option>
                                    <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_latest') selected @endif>Sort By: Latest</option>
                                    <option value="price_lowest"   @if(isset($_GET['sort']) && $_GET['sort'] == 'price_lowest')   selected @endif>Sort By: Lowest Price</option>
                                    <option value="price_highest"  @if(isset($_GET['sort']) && $_GET['sort'] == 'price_highest')  selected @endif>Sort By: Highest Price</option>
                                    <option value="name_a_z"       @if(isset($_GET['sort']) && $_GET['sort'] == 'name_a_z')       selected @endif>Sort By: Name A - Z</option>
                                    <option value="name_z_a"       @if(isset($_GET['sort']) && $_GET['sort'] == 'name_z_a')       selected @endif>Sort By: Name Z - A</option>
                                    {{-- <option value="">Sort By: Best Rating</option> --}}
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- //end Toolbar Sorter 1  -->


                    
                    
                    <!-- Toolbar Sorter 2  -->
                    {{-- <div class="toolbar-sorter-2">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="show-records">Show Records Per Page</label>
                            <select class="select-box" id="show-records">
                                <option selected="selected" value="">Show: 8</option>
                                <option value="">Show: 16</option>
                                <option value="">Show: 28</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="toolbar-sorter-2">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="show-records">Show Records Per Page</label>
                            <select class="select-box" id="show-records">
                                <option selected="selected" value="">Showing: {{ count($categoryProducts) }}</option>
                                <option value="">Showing: All</option>
                            </select>
                        </div>
                    </div>
                    <!-- //end Toolbar Sorter 2  -->
                </div>
                <!-- Page-Bar /- -->


                <!-- Row-of-Product-Container -->
                <div class="row product-container list-style">


                    @foreach ($categoryProducts as $product)
                        <div class="product-item col-lg-4 col-md-6 col-sm-6">
                            <div class="item">
                                <div class="image-container">
                                    <a class="item-img-wrapper-link" href="single-product.html">



                                        @php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                        @endphp


                                        @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Product">
                                        @else {{-- show the dummy image --}}
                                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Product">
                                        @endif



                                    </a>
                                    <div class="item-action-behaviors">
                                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                                        <a class="item-mail" href="javascript:void(0)">Mail</a>
                                        <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                                        <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                                    </div>
                                </div>
                                <div class="item-content">
                                    <div class="what-product-is">
                                        <ul class="bread-crumb">
                                            <li class="has-separator">
                                                <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                                            </li>
                                            <li class="has-separator">
                                                <a href="listing.html">{{ $product['product_color'] }}</a>
                                            </li>
                                            <li>
                                                <a href="listing.html">{{ $product['brand']['name'] }}</a>
                                            </li>
                                        </ul>
                                        <h6 class="item-title">
                                            <a href="single-product.html">{{ $product['product_name'] }}</a>
                                        </h6>
                                        <div class="item-description">
                                            <p>{{ $product['description'] }}</p>
                                        </div>
                                        {{-- <div class="item-stars">
                                            <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                <span style='width:67px'></span>
                                            </div>
                                            <span>(23)</span>
                                        </div> --}}
                                    </div>



                                    {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout    // Check 19:09 in https://www.youtube.com/watch?v=T_CWdKW5he0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=72 --}}
                                    @php
                                        $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                    @endphp


                                    @if ($getDiscountPrice > 0)
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                Rs . {{ $getDiscountPrice }} {{-- 'Rs' means Rupees the Indian currency --}}
                                            </div>
                                            <div class="item-old-price">
                                                Rs . {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                Rs . {{ $product['product_price'] }}
                                            </div>
                                        </div>
                                    @endif



                                </div>



                                {{-- https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79 --}}
                                @php
                                    $isProductNew = \App\Models\Product::isProductNew($product['id'])
                                @endphp
                                @if ($isProductNew == 'Yes')
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                @endif


                                
                            </div>
                        </div>
                    @endforeach


                </div>
                <!-- Row-of-Product-Container /- -->



                {{-- Laravel Pagination and showing it using Bootstrap Pagination --}} {{-- https://www.youtube.com/watch?v=tQNmKdQ-f-s&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=79 --}}
                {{-- <div>{{ $categoryProducts->links() }}</div> --}}


                {{-- Fixing the Laravel Pagination problem with the Sorting Filter where sorting gets messed up with pagination). The cause of the problem is that when you click on the pagination links like for example when you go to the second page, the URL query string parameters gets the pagination page number (e.g. 'page=2') but it loses the filter query string parameter (e.g. '&sort=desc'), so we have to always append the sorting filter query string parameter to the page number query string paramter  --}} {{-- Check 28:47 in https://www.youtube.com/watch?v=u2NiZzjRL8U&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=81 --}}
                {{-- Appending Query String Values: https://laravel.com/docs/9.x/pagination#appending-query-string-values --}}
                @if (isset($_GET['sort'])) {{-- if there's a Sorting Filter used --}}
                    <div>
                        {{ $categoryProducts->appends(['sort' => $_GET['sort']])->links() }}
                    </div>
                @else
                    <div>
                        {{ $categoryProducts->links() }}
                    </div>
                @endif


                <div>&nbsp;</div>

                {{-- Show the category and subcategory description --}} {{-- Check 12:39 in https://www.youtube.com/watch?v=8kf1WDELK6o&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=77 --}}
                <div>{{ $categoryDetails['categoryDetails']['description'] }}</div>



            </div>
            <!-- Shop-Right-Wrapper /- -->


            <!-- Shop-Pagination -->

            {{-- <div class="pagination-area">
                <div class="pagination-number">
                    <ul>
                        <li style="display: none">
                            <a href="shop-v1-root-category.html" title="Previous">
                                <i class="fa fa-angle-left"></i>
                            </a>
                        </li>
                        <li class="active">
                            <a href="shop-v1-root-category.html">1</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">2</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">3</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">...</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html">10</a>
                        </li>
                        <li>
                            <a href="shop-v1-root-category.html" title="Next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}

            <!-- Shop-Pagination /- -->


        </div>
    </div>
</div>
<!-- Shop-Page /- -->
@endsection