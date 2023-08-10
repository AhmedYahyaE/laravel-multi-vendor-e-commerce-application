{{-- Note: front/products/detail.blade.php is the page that opens when you click on a product in the FRONT home page --}} {{-- $productDetails, categoryDetails and $totalStock are passed in from detail() method in Front/ProductsController.php --}}
@extends('front.layout.layout')


@section('content')
    {{-- Star Rating (of a Product) (in the "Reviews" tab) --}}
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            /* position:absolute; */
            position:inherit;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>


    
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Detail</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">Detail</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Single-Product-Full-Width-Page -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- Product-Detail -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">



                    {{-- EasyZoom plugin for zooming product images upon hover --}}
                    {{-- My EasyZoom (jQuery image zoom plugin): https://i-like-robots.github.io/EasyZoom/ --}}

                    <!-- Product-zoom-area -->
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails"> {{-- EasyZoom plugin --}}
                        <a      href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="" width="500" height="500" />
                        </a>
                    </div>

                    <div class="thumbnails" style="margin-top: 30px"> {{-- EasyZoom plugin --}}
                        <a      href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}" width="120" height="120" alt="" />
                        </a>



                        {{-- Show the product Alternative images (`image` in `products_images` table) --}}
                        @foreach ($productDetails['images'] as $image)
                            {{-- EasyZoom plugin --}}
                            <a      href="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $image['image']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $image['image']) }}" width="120" height="120" alt="" />
                            </a>
                        @endforeach



                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">


                        {{-- My Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        @if (Session::has('error_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        {{-- Displaying Laravel Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors --}}    
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        {{-- My Bootstrap success message in case of updating admin password is successful: --}}
                        @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                {{-- There are TWO ways to: Displaying Unescaped Data: https://laravel.com/docs/9.x/blade#displaying-unescaped-data --}}
                                <strong>Success:</strong> @php echo Session::get('success_message') @endphp       {{-- Displaying Unescaped Data: https://laravel.com/docs/9.x/blade#displaying-unescaped-data --}}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;">{{ $productDetails['product_name'] }}</a> {{-- $productDetails is passed in from detail() method in Front/ProductsController.php --}}
                                </h1>
                            </div>



                            {{-- Breadcrumb --}}
                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">Home</a> {{-- Home --}}
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;">{{ $productDetails['section']['name'] }}</a> {{-- Section Name --}}
                                </li>
                                @php echo $categoryDetails['breadcrumbs'] @endphp {{-- $categoryDetails is passed in from detail() method in Front/ProductsController.php --}}
                            </ul>
                            {{-- Breadcrumb --}}



                            <div class="product-rating">
                                <div title="{{ $avgRating }} out of 5 - based on {{ count($ratings) }} Reviews">

                                    {{-- Show/Display the Rating Stars --}}
                                    @if ($avgStarRating > 0) {{-- If the product has been rated at least once, show the "Stars" HTML Entities --}}
                                        @php
                                            $star = 1;
                                            while ($star < $avgStarRating):
                                        @endphp

                                                <span style="color: gold; font-size: 17px">&#9733;</span>

                                        @php
                                                $star++;
                                            endwhile;
                                        @endphp
                                        ({{ $avgRating }})
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Description:</h6>
                            <p>{{ $productDetails['description'] }}</p>
                        </div>
                        <div class="section-3-price-original-discount u-s-p-y-14">

                        

                            @php $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']) @endphp

                            <span class="getAttributePrice">{{-- this <span> will be used by jQuery for getting the respective `price` and `stock` depending on the selected `size` in the <select> box (through the AJAX call). Check front/js/custom.js --}}

                                @if ($getDiscountPrice > 0) {{-- if there's a discount on the product price --}}
                                    <div class="price">
                                        <h4>EGP{{ $getDiscountPrice }}</h4>
                                    </div>
                                    <div class="original-price">
                                        <span>Original Price:</span>
                                        <span>EGP{{ $productDetails['product_price'] }}</span> {{-- the product original price (without discount) --}}
                                    </div>
                                @else {{-- if there's no discount on the product price --}}
                                    <div class="price">
                                        <h4>EGP{{ $productDetails['product_price'] }}</h4> {{-- the product original price (without discount) --}}
                                    </div>
                                @endif

                            </span> 



                        </div>
                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">Sku Information:</h6>
                            <div class="left">
                                <span>Product Code:</span>
                                <span>{{ $productDetails['product_code'] }}</span>
                            </div>
                            <div class="left">
                                <span>Product Color:</span>
                                <span>{{ $productDetails['product_color'] }}</span>
                            </div>
                            <div class="availability">
                                <span>Availability:</span>


                                @if ($totalStock > 0)
                                    <span>In Stock</span>
                                @else
                                    <span style="color: red">Out of Stock (Sold-out)</span>
                                @endif



                            </div>



                            @if ($totalStock > 0)
                                <div class="left">
                                    <span>Only:</span>
                                    <span>{{ $totalStock }} left</span>
                                </div>
                            @endif



                        </div>



                        {{-- Show the vendor shop name (only in case that the product is added by a vendor, not admin or superadmin) --}}
                        @if(isset($productDetails['vendor']))
                            <div>
                                {{-- Sold by: {{ $productDetails['vendor']['name'] }} --}}
                                Sold by: <a href="/products/{{ $productDetails['vendor']['id'] }}">
                                            {{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}
                                        </a>
                            </div>
                        @endif



                        {{-- Add to Cart <form> --}} 
                        <form action="{{ url('cart/add') }}" method="Post" class="post-form">
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}"> {{-- Add to Cart <form> --}} 


                            <div class="section-5-product-variants u-s-p-y-14">



                                {{-- Managing Product Colors (using the `group_code` column in `products` table) --}} 
                                @if (count($groupProducts) > 0) {{-- if there's a value for the `group_code` column (in `products` table) for the currently viewed product --}}
                                    <div>
                                        <div><strong>Product Colors</strong></div>
                                        <div style="margin-top: 10px">
                                            @foreach ($groupProducts as $product)
                                                <a href="{{ url('product/' . $product['id']) }}">
                                                    <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $product['product_image']) }}">
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif



                                <div class="sizes u-s-m-b-11" style="margin-top: 20px">
                                    <span>Available Size:</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size" id="getPrice" product-id="{{ $productDetails['id'] }}" name="size" required> {{-- Check front/js/custom.js file --}}



                                            <option value="">Select Size</option>
                                            @foreach ($productDetails['attributes'] as $attribute)
                                                <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                            @endforeach



                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">

                                
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        <input class="quantity-text-field" type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>



                            </div>
                        </form>


                        {{-- PIN code Availability Check: check if the PIN code of the user's Delivery Address exists in our database (in both `cod_pincodes` and `prepaid_pincodes`) or not via AJAX. Check front/js/custom.js --}} 
                        <br><br><b>Delivery</b>
                        <input type="text" id="pincode" placeholder="Check Pincode" required>
                        <button type="button" id="checkPincode">Go</button> {{-- We'll use that checkPincode HTML id attribute in front/js/custom.js as a handle for jQuery --}}


                    </div>
                    <!-- Product-details /- -->
                </div>
            </div>
            <!-- Product-Detail /- -->
            <!-- Detail-Tabs -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="detail-tabs-wrapper u-s-p-t-80">
                        <div class="detail-nav-wrapper u-s-m-b-30">
                            <ul class="nav single-product-nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#video">Product Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#detail">Product Details</a>
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" data-toggle="tab" href="#review">Reviews (15)</a> --}}
                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews {{ count($ratings) }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!-- Description-Tab -->
                            <div class="tab-pane fade active show" id="video">
                                <div class="description-whole-container">



                                    @if ($productDetails['product_video'])
                                        <video controls>
                                            <source src="{{ url('front/videos/product_videos/' . $productDetails['product_video']) }}" type="video/mp4">
                                        </video>
                                    @else
                                        Product Video does not exist    
                                    @endif



                                </div>
                            </div>
                            <!-- Description-Tab /- -->
                            <!-- Details-Tab -->
                            <div class="tab-pane fade" id="detail">
                                <div class="specification-whole-container">
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">Product Details</h4>
                                        <table>



                                            @php
                                                $productFilters = \App\Models\ProductsFilter::productFilters(); // Get ALL the (enabled/active) Filters
                                                // dd($productFilters);
                                            @endphp

                                            @foreach ($productFilters as $filter) {{-- show ALL the (enabled/active) Filters --}}
                                                @php
                                                    // echo '<pre>', var_dump($product), '</pre>';
                                                    // exit;
                                                    // echo '<pre>', var_dump($filter), '</pre>';
                                                    // exit;
                                                    // dd($filter);
                                                @endphp

                                                @if (isset($productDetails['category_id'])) {{-- which comes from the AJAX call (passed in through the categoryFilters() method in Admin/FilterController.php, and ALSO may come from the if condition above there (in this page) in case of 'Edit Product' (not 'Add a Product') from addEditProduct() method in Admin/ProductsController --}}
                                                    @php
                                                        // dd($filter);

                                                        // Firstly, for every filter in the `products_filters` table, Get the filter's (from the foreach loop) `cat_ids` using filterAvailable() method, then check if the current category id (using the $productDetails['category_id'] variable and depending on the URL) exists in the filter's `cat_ids`. If it exists, then show the filter, if not, then don't show the filter
                                                        $filterAvailable = \App\Models\ProductsFilter::filterAvailable($filter['id'], $productDetails['category_id']);
                                                    @endphp

                                                    @if ($filterAvailable == 'Yes') {{-- if the filter has the current productDetails['category_id'] in its `cat_ids` --}}

                                                        <tr>
                                                            <td>{{ $filter['filter_name'] }}</td>
                                                            <td>
                                                                @foreach ($filter['filter_values'] as $value) {{-- show the related values of the filter of the product --}}
                                                                    @php
                                                                        // echo '<pre>', var_dump($value), '</pre>'; exit;
                                                                    @endphp
                                                                    @if (!empty($productDetails[$filter['filter_column']]) && $productDetails[$filter['filter_column']] == $value['filter_value']) {{-- $value['filter_value'] is like '4GB' --}} {{-- $productDetails[$filter['filter_column']]    is like    $productDetails['screen_size']    which in turn, may be equal to    '5 to 5.4 in' --}}
                                                                        {{ ucwords($value['filter_value']) }}
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                        </tr>

                                                    @endif
                                                @endif
                                            @endforeach



                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- Specifications-Tab /- -->
                            <!-- Reviews-Tab -->
                            <div class="tab-pane fade" id="review">
                                <div class="review-whole-container">
                                    <div class="row r-1 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-score-wrapper">
                                                <h6 class="review-h6">Average Rating</h6>
                                                <div class="circle-wrapper">
                                                    <h1>{{ $avgRating }}</h1>
                                                </div>
                                                <h6 class="review-h6">Based on {{ count($ratings) }} Reviews</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingFiveStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingFourStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingThreeStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingTwoStarCount }})</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Star</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>({{ $ratingOneStarCount }})</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">


                                            {{-- Star Rating (of a Product) (in the "Reviews" tab). --}}
                                            <form method="POST" action="{{ url('add-rating') }}" name="formRating" id="formRating">
                                                @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                                <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                                                <div class="your-rating-wrapper">
                                                    <h6 class="review-h6">Your Review matters.</h6>
                                                    <h6 class="review-h6">Have you used this product before?</h6>
                                                    <div class="star-wrapper u-s-m-b-8">


                                                        {{-- Star Rating (of a Product) (in the "Reviews" tab). --}}
                                                        <div class="rate">
                                                            <input style="display: none" type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="text">5 stars</label>

                                                            <input style="display: none" type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>

                                                            <input style="display: none" type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>

                                                            <input style="display: none" type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 stars</label>

                                                            <input style="display: none" type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>


                                                    </div>
                                                        <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Your Review" name="review" required></textarea>
                                                        <button class="button button-outline-secondary">Submit Review</button>
                                                    {{-- </form> --}}
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                    <!-- Get-Reviews -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Review-Options -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reviews
                                                    <span> ({{ count($ratings) }}) </span>
                                                </h6>
                                            </div>
                                        </div>
                                        <!-- Review-Options /- -->
                                        <!-- All-Reviews -->
                                        <div class="reviewers">

                                            {{-- Display/Show user's Ratings --}}
                                            @if (count($ratings) > 0) {{-- if there're any ratings for the product --}}
                                                @foreach($ratings as $rating)
                                                    <div class="review-data">
                                                        <div class="reviewer-name-and-date">
                                                            <h6 class="reviewer-name">{{ $rating['user']['name'] }}</h6>
                                                            <h6 class="review-posted-date">{{ date('d-m-Y H:i:s', strtotime($rating['created_at'])) }}</h6>
                                                        </div>
                                                        <div class="reviewer-stars-title-body">
                                                            <div class="reviewer-stars">


                                                                {{-- Show/Display the Star Rating of the Review/Rating --}}
                                                                @php
                                                                    $count = 0;

                                                                    // Show the stars
                                                                    while ($count < $rating['rating']): // while $count is 0, 1, 2, 3, 4, or 5 Stars
                                                                @endphp

                                                                        <span style="color: gold">&#9733;</span> {{-- "BLACK STAR" HTML Entity --}} {{-- HTML Entities: https://www.w3schools.com/html/html_entities.asp --}}

                                                                @php
                                                                        $count++;
                                                                    endwhile;
                                                                @endphp


                                                            </div>
                                                            <p class="review-body">
                                                                {{ $rating['review'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <!-- All-Reviews /- -->
                                        <!-- Pagination-Review -->

                                        <!-- Pagination-Review /- -->
                                    </div>
                                    <!-- Get-Reviews /- -->
                                </div>
                            </div>
                            <!-- Reviews-Tab /- -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Detail-Tabs /- -->
            <!-- Different-Product-Section -->
            <div class="detail-different-product-section u-s-p-t-80">
                <!-- Similar-Products -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Similar Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">



                                {{-- Show similar products (or related products) (functionality) by getting other products from THE SAME CATEGORY --}}    
                                @foreach ($similarProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">



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
                                                    <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                </h6>

                                            </div>



                                            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        EGP{{ $getDiscountPrice }} 
                                                    </div>
                                                    <div class="item-old-price">
                                                        EGP{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        EGP{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
                <!-- Recently-View-Products  -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Recently Viewed Products</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">




                                {{-- Recently Viewed Products (Items) functionality --}}
                                @foreach ($recentlyViewedProducts as $product)
                                    <div class="item">
                                        <div class="image-container">
                                            <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">



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
                                                    <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                </h6>
                                            </div>



                                            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout --}}
                                            @php
                                                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                            @endphp

                                            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        EGP{{ $getDiscountPrice }} 
                                                    </div>
                                                    <div class="item-old-price">
                                                        EGP{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                <div class="price-template">
                                                    <div class="item-new-price">
                                                        EGP{{ $product['product_price'] }}
                                                    </div>
                                                </div>
                                            @endif



                                        </div>
                                        <div class="tag new">
                                            <span>NEW</span>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>
                </section>
                <!-- Recently-View-Products /- -->
            </div>
            <!-- Different-Product-Section /- -->
        </div>
    </div>
    <!-- Single-Product-Full-Width-Page /- -->
@endsection