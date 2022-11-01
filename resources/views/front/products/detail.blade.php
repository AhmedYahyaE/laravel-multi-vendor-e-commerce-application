{{-- Check 19:09 in https://www.youtube.com/watch?v=fv9ZnNRKBBE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=103 --}}
{{-- Note: front/products/detail.blade.php is the page that opens when you click on a product in the FRONT home page --}} {{-- $productDetails, categoryDetails and $totalStock are passed in from detail() method in Front/ProductsController.php --}}


@extends('front.layout.layout')


@section('content')
    
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
                    <!-- Product-zoom-area -->
                    <div class="zoom-area">

            

                        {{-- Show the Main image (`product_image` in `products` table) --}}
                        <img id="zoom-pro" class="img-fluid" src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-zoom-image="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="Zoom Image">

                        
                        <div id="gallery" class="u-s-m-t-10">

                            {{-- Show the product main image (`product_image` in `products` table) as the first image --}}
                            <a class="active" data-image="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-zoom-image="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                                <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="Product">
                            </a>



                            {{-- Show the product Alternative images (`image` in `products_images` table) --}}
                            @foreach ($productDetails['images'] as $image)
                                <a data-image="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-zoom-image="{{ asset('front/images/product_images/large/' . $image['image']) }}">
                                    <img src="{{ asset('front/images/product_images/large/' . $image['image']) }}" alt="Product">
                                </a>
                            @endforeach



                        </div>
                    </div>
                    <!-- Product-zoom-area /- -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- Product-details -->
                    <div class="all-information-wrapper">
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
                                {{-- <li class="has-separator">
                                    <a href="shop-v1-root-category.html">Men Clothing </a>
                                </li>
                                <li class="has-separator">
                                    <a href="listing.html">Tops</a>
                                </li>
                                <li class="is-marked">
                                    <a href="shop-v3-sub-sub-category.html">Hoodies</a>
                                </li> --}}
                            </ul>
                            {{-- Breadcrumb --}}



                            <div class="product-rating">
                                <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                    <span style='width:67px'></span>
                                </div>
                                <span>(23)</span>
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
                                        <h4>Rs.{{ $getDiscountPrice }}</h4>
                                    </div>
                                    <div class="original-price">
                                        <span>Original Price:</span>
                                        <span>Rs.{{ $productDetails['product_price'] }}</span> {{-- the product original price (without discount) --}}
                                    </div>
                                    {{-- <div class="discount-price">
                                        <span>Discount:</span>
                                        <span>15%</span>
                                    </div>
                                    <div class="total-save">
                                        <span>Save:</span>
                                        <span>$20</span>
                                    </div> --}}
                                @else {{-- if there's no discount on the product price --}}
                                    <div class="price">
                                        <h4>Rs.{{ $productDetails['product_price'] }}</h4> {{-- the product original price (without discount) --}}
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



                                {{-- https://www.youtube.com/watch?v=0Bpk4JfwvpI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=105 --}}
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
                        <div class="section-5-product-variants u-s-p-y-14">
                            {{-- <h6 class="information-heading u-s-m-b-8">Product Variants:</h6>
                            <div class="color u-s-m-b-11">
                                <span>Available Color:</span>
                                <div class="color-variant select-box-wrapper">
                                    <select class="select-box product-color">
                                        <option value="1">Heather Grey</option>
                                        <option value="3">Black</option>
                                        <option value="5">White</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="sizes u-s-m-b-11">
                                <span>Available Size:</span>
                                <div class="size-variant select-box-wrapper">
                                    <select class="select-box product-size" id="getPrice" product-id="{{ $productDetails['id'] }}" name="size"> {{-- Check front/js/custom.js file --}}



                                        <option value="">Select Size</option>
                                        @foreach ($productDetails['attributes'] as $attribute)
                                            <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                        @endforeach



                                        {{-- <option value="">Male 3XL</option>
                                        <option value="">Kids 4</option>
                                        <option value="">Kids 6</option>
                                        <option value="">Kids 8</option>
                                        <option value="">Kids 10</option>
                                        <option value="">Kids 12</option>
                                        <option value="">Female Small</option>
                                        <option value="">Male Small</option>
                                        <option value="">Female Medium</option>
                                        <option value="">Male Medium</option>
                                        <option value="">Female Large</option>
                                        <option value="">Male Large</option>
                                        <option value="">Female XL</option>
                                        <option value="">Male XL</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                            <form action="#" class="post-form">
                                <div class="quick-social-media-wrapper u-s-m-b-22">
                                    <span>Share:</span>
                                    <ul class="social-media-list">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fas fa-rss"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>Quantity:</span>
                                    <div class="quantity">
                                        {{-- <input type="text" class="quantity-text-field" value="1">
                                        <a class="plus-a" data-max="1000">&#43;</a>
                                        <a class="minus-a" data-min="1">&#45;</a> --}}
                                        <input class="quantity-text-field" type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">Add to cart</button>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>
                            </form>
                        </div>
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
                                    <a class="nav-link" data-toggle="tab" href="#specification">Specifications</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#review">Reviews (15)</a>
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



                                    {{-- <img class="desc-img img-fluid u-s-m-b-26" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product"> --}}
                                    {{-- <iframe class="desc-iframe u-s-m-b-45" width="710" height="400" src="{{ asset('front/images/product/iframe-youtube.jpg') }}" allowfullscreen></iframe> --}}
                                </div>
                            </div>
                            <!-- Description-Tab /- -->
                            <!-- Specifications-Tab -->
                            <div class="tab-pane fade" id="specification">
                                <div class="specification-whole-container">
                                    <div class="spec-ul u-s-m-b-50">
                                        <h4 class="spec-heading">Key Features</h4>
                                        <ul>
                                            <li>Heather Grey</li>
                                            <li>Black</li>
                                            <li>White</li>
                                        </ul>
                                    </div>
                                    <div class="u-s-m-b-50">
                                        <h4 class="spec-heading">What's in the Box?</h4>
                                        <h3 class="spec-answer">1 x hoodie</h3>
                                    </div>
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">General Information</h4>
                                        <table>
                                            <tr>
                                                <td>Sku</td>
                                                <td>AY536FA08JT86NAFAMZ</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="spec-table u-s-m-b-50">
                                        <h4 class="spec-heading">Product Information</h4>
                                        <table>
                                            <tr>
                                                <td>Main Material</td>
                                                <td>Cotton</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Heather Grey, Black, White</td>
                                            </tr>
                                            <tr>
                                                <td>Sleeves</td>
                                                <td>Long Sleeve</td>
                                            </tr>
                                            <tr>
                                                <td>Top Fit</td>
                                                <td>Regular</td>
                                            </tr>
                                            <tr>
                                                <td>Print</td>
                                                <td>Not Printed</td>
                                            </tr>
                                            <tr>
                                                <td>Neck</td>
                                                <td>Round Neck</td>
                                            </tr>
                                            <tr>
                                                <td>Pieces Count</td>
                                                <td>1 piece</td>
                                            </tr>
                                            <tr>
                                                <td>Occasion</td>
                                                <td>Casual</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Weight (kg)</td>
                                                <td>0.5</td>
                                            </tr>
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
                                                    <h1>4.5</h1>
                                                </div>
                                                <h6 class="review-h6">Based on 23 Reviews</h6>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="total-star-meter">
                                                <div class="star-wrapper">
                                                    <span>5 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>4 Stars</span>
                                                    <div class="star">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>3 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>2 Stars</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                                <div class="star-wrapper">
                                                    <span>1 Star</span>
                                                    <div class="star">
                                                        <span style='width:0'></span>
                                                    </div>
                                                    <span>(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row r-2 u-s-m-b-26 u-s-p-b-22">
                                        <div class="col-lg-12">
                                            <div class="your-rating-wrapper">
                                                <h6 class="review-h6">Your Review is matter.</h6>
                                                <h6 class="review-h6">Have you used this product before?</h6>
                                                <div class="star-wrapper u-s-m-b-8">
                                                    <div class="star">
                                                        <span id="your-stars" style='width:0'></span>
                                                    </div>
                                                    <label for="your-rating-value"></label>
                                                    <input id="your-rating-value" type="text" class="text-field" placeholder="0.0">
                                                    <span id="star-comment"></span>
                                                </div>
                                                <form>
                                                    <label for="your-name">Name
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="your-name" type="text" class="text-field" placeholder="Your Name">
                                                    <label for="your-email">Email
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="your-email" type="text" class="text-field" placeholder="Your Email">
                                                    <label for="review-title">Review Title
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <input id="review-title" type="text" class="text-field" placeholder="Review Title">
                                                    <label for="review-text-area">Review
                                                        <span class="astk"> *</span>
                                                    </label>
                                                    <textarea class="text-area u-s-m-b-8" id="review-text-area" placeholder="Review"></textarea>
                                                    <button class="button button-outline-secondary">Submit Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Get-Reviews -->
                                    <div class="get-reviews u-s-p-b-22">
                                        <!-- Review-Options -->
                                        <div class="review-options u-s-m-b-16">
                                            <div class="review-option-heading">
                                                <h6>Reviews
                                                    <span> (15) </span>
                                                </h6>
                                            </div>
                                            <div class="review-option-box">
                                                <div class="select-box-wrapper">
                                                    <label class="sr-only" for="review-sort">Review Sorter</label>
                                                    <select class="select-box" id="review-sort">
                                                        <option value="">Sort by: Best Rating</option>
                                                        <option value="">Sort by: Worst Rating</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Review-Options /- -->
                                        <!-- All-Reviews -->
                                        <div class="reviewers">
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">John</h6>
                                                    <h6 class="review-posted-date">10 May 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Good!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Good Quality...!
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Doe</h6>
                                                    <h6 class="review-posted-date">10 June 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Cotton is good.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Tim</h6>
                                                    <h6 class="review-posted-date">10 July 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Excellent condition
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Johnny</h6>
                                                    <h6 class="review-posted-date">10 March 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Bright!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Cotton
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="review-data">
                                                <div class="reviewer-name-and-date">
                                                    <h6 class="reviewer-name">Alexia C. Marshall</h6>
                                                    <h6 class="review-posted-date">12 May 2018</h6>
                                                </div>
                                                <div class="reviewer-stars-title-body">
                                                    <div class="reviewer-stars">
                                                        <div class="star">
                                                            <span style='width:67px'></span>
                                                        </div>
                                                        <span class="review-title">Well done!</span>
                                                    </div>
                                                    <p class="review-body">
                                                        Good polyester Cotton
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- All-Reviews /- -->
                                        <!-- Pagination-Review -->
                                        <div class="pagination-review-area">
                                            <div class="pagination-review-number">
                                                <ul>
                                                    <li style="display: none">
                                                        <a href="single-product.html" title="Previous">
                                                            <i class="fas fa-angle-left"></i>
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="single-product.html">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">...</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html">10</a>
                                                    </li>
                                                    <li>
                                                        <a href="single-product.html" title="Next">
                                                            <i class="fas fa-angle-right"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="single-product.html">
                                            <img class="img-fluid" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product">
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
                                                    <a href="shop-v1-root-category.html">Product Code</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="single-product.html">Product Name</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                $100.00
                                            </div>
                                            <div class="item-old-price">
                                                $120.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag new">
                                        <span>NEW</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="single-product.html">
                                            <img class="img-fluid" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product">
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
                                                    <a href="shop-v1-root-category.html">Product Code</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="single-product.html">Fern Green Men's Jacket</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                $100.00
                                            </div>
                                            <div class="item-old-price">
                                                $120.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag hot">
                                        <span>HOT</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="single-product.html">
                                            <img class="img-fluid" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product">
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
                                                    <a href="shop-v1-root-category.html">Product Code</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="single-product.html">Brown Dark Tan Round Double Bridge Sunglasses</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                $100.00
                                            </div>
                                            <div class="item-old-price">
                                                $120.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag hot">
                                        <span>HOT</span>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="single-product.html">
                                            <img class="img-fluid" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product">
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
                                                    <a href="shop-v1-root-category.html">Product Code</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="single-product.html">Black Round Double Bridge Sunglasses</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                $100.00
                                            </div>
                                            <div class="item-old-price">
                                                $120.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag hot">
                                        <span>HOT</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Similar-Products /- -->
                <!-- Recently-View-Products  -->
                <section class="section-maker">
                    <div class="container">
                        <div class="sec-maker-header text-center">
                            <h3 class="sec-maker-h3">Recently View</h3>
                        </div>
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="single-product.html">
                                            <img class="img-fluid" src="{{ asset('front/images/product/product@3x.jpg') }}" alt="Product">
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
                                                    <a href="shop-v1-root-category.html">Product Code</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="single-product.html">Maire Battlefield Jeep Men's Jacket</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 out of 5 - based on 0 Reviews">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <div class="price-template">
                                            <div class="item-new-price">
                                                $100.00
                                            </div>
                                            <div class="item-old-price">
                                                $120.00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tag hot">
                                        <span>HOT</span>
                                    </div>
                                </div>
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