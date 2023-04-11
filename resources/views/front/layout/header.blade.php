<?php
// Getting the 'enabled' sections ONLY and their child categories (using the 'categories' relationship method) which, in turn, include their 'subcategories`
$sections = \App\Models\Section::sections();
// dd($sections);
?>



<!-- Header -->
<header>
    <!-- Top-Header -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+111222333">
                        <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                        Telephone:+111-222-333</a>
                    </li>
                    <li>
                        <a href="mailto:info@sitemakers.in">
                        <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                        E-mail: info@sitemakers.in
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>



                        <a>
                            {{-- If the user is authenticated/logged in, show 'My Account', if not, show 'Login/Register' --}} {{-- https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=128 --}}
                            @if (\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                My Account
                            @else
                                Login/Register
                            @endif

                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="cart.html">
                                <i class="fas fa-cog u-s-m-r-9"></i>
                                My Cart</a>
                            </li>
                            <li>
                                <a href="wishlist.html">
                                <i class="far fa-heart u-s-m-r-9"></i>
                                My Wishlist</a>
                            </li>
                            {{-- <li>
                                <a href="checkout.html">
                                <i class="far fa-check-circle u-s-m-r-9"></i>
                                Checkout</a>
                            </li> --}}



                            {{-- If the user is authenticated/logged in, show 'My Account' and 'Logout', if not, show 'Customer Login' and 'Vendor Login' --}} {{-- https://www.youtube.com/watch?v=u_qC3I3BYAM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=128 --}}
                            @if (\Auth::check()) {{-- Determining If The Current User Is Authenticated: https://laravel.com/docs/9.x/authentication#determining-if-the-current-user-is-authenticated --}}
                                <li>
                                    <a href="{{ url('user/account') }}"> {{-- https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        My Account
                                    </a>
                                </li>

                                {{-- https://www.youtube.com/watch?v=4d_Hq33jihY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=164 --}}
                                <li>
                                    <a href="{{ url('user/orders') }}"> {{-- https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        My Orders
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('user/logout') }}"> {{-- https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Logout
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('user/login-register') }}"> {{-- https://www.youtube.com/watch?v=xYzsUn8_NT0&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=127 --}}
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Customer Login
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('vendor/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        Vendor Login
                                    </a>
                                </li>
                            @endif



                        </ul>
                    </li>
                    <li>
                        <a>USD
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">($) USD</a>
                            </li>
                            <li>
                                <a href="#">(£) GBP</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>ENG
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">ARB</a>
                            </li>
                        </ul>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Top-Header /- -->
    <!-- Mid-Header -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">


                        {{-- <a href="{{ url('/') }}"> --}} {{-- This is exactly THE SAME AS:    <a href="/">    --}}
                        <a href="/">                        {{-- This is exactly THE SAME AS:    <a href="{{ url('/') }}">    --}}


                            <img src="{{ asset('front/images/main-logo/stack-developers-logo.png') }}" alt="Stack Developers" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">



                    {{-- Website Search Form (to search for all website products) --}} {{-- https://www.youtube.com/watch?v=X5A8_TXcnRI&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=197 --}}
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">Search</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="Search everything" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif> {{-- We use the "name" HTML attribute as a key/name for the "value" HTML attribute for submitting the Search Form. Check the "value" HTML attribute too inside the <option> HTML tag down below! --}} {{-- if the user uses the Search Form --}}
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">Choose category for search</label>
                                <select class="select-box" id="select-category" name="section_id">

                                    <option selected="selected" value="">All</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section['id'] }}"  @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option> {{-- the search bar drop-down menu at the top --}} {{-- We use the "value" HTML attribute as a value for the "name" HTML attribute for submitting the Search Form. Check the "name" HTML attribute too inside the <input> HTML tag above there! --}}
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>

                    @php
                        // dd($_GET);
                    @endphp



                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="index.html">
                                <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li class="u-d-none-lg">
                                <a href="wishlist.html">
                                <i class="far fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                <i class="ion ion-md-basket"></i>
                                <span class="item-counter totalCartItems">{{ totalCartItems() }}</span> {{-- totalCartItems() function is in our custom Helpers/Helper.php file that we have registered in 'composer.json' file --}} {{-- We created the CSS class 'totalCartItems' to use it in front/js/custom.js to update the total cart items via AJAX, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check 12:08 in https://www.youtube.com/watch?v=J8ynmQSbZYY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=139 --}}
                                <span class="item-price">$220.00</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Mid-Header /- -->
    <!-- Responsive-Buttons -->
    <div class="fixed-responsive-container">
        <div class="fixed-responsive-wrapper">
            <button type="button" class="button fas fa-search" id="responsive-search"></button>
        </div>
        <div class="fixed-responsive-wrapper">
            <a href="wishlist.html">
            <i class="far fa-heart"></i>
            <span class="fixed-item-counter">4</span>
            </a>
        </div>
    </div>
    <!-- Responsive-Buttons /- -->



    <!-- Mini Cart Widget -->
    <div id="appendHeaderCartItems"> {{-- We created the CSS class 'appendHeaderCartItems' to use it in front/js/custom.js to update the total cart items via AJAX in the Mini Cart Wedget, because in pages that we originally use AJAX to update the cart items (such as when we delete a cart item in http://127.0.0.1:8000/cart using AJAX), the number doesn't change in the header automatically because AJAX is already used and no page reload/refresh has occurred. Check https://www.youtube.com/watch?v=dH4eyzRUO-c&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=141 --}}
        @include('front.layout.header_cart_items')
    </div>
    <!-- Mini Cart Widget /- -->



    <!-- Bottom-Header -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                        <span class="v-title">
                        <i class="ion ion-md-menu"></i>
                        All Categories
                        <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">



                                    @foreach ($sections as $section)
                                        @if (count($section['categories']) > 0) {{-- if the section has child categories, show the section name, but if it doesn't, don't show it --}}
                                            <li class="js-backdrop">
                                                <a href="javascript:;">
                                                <i class="ion-ios-add-circle"></i>


                                                {{ $section['name'] }} {{-- Show section name --}}


                                                <i class="ion ion-ios-arrow-forward"></i>
                                                </a>
                                                <button class="v-button ion ion-md-add"></button>
                                                <div class="v-drop-right" style="width: 700px;">
                                                    <div class="row">



                                                        @foreach ($section['categories'] as $category) {{-- Show the section child categories --}}
                                                            <div class="col-lg-4">
                                                                <ul class="v-level-2">
                                                                    <li>
                                                                        <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                        <ul>


 
                                                                            @foreach ($category['sub_categories'] as $subcategory) {{-- Show the section child categories child Subcategories --}}
                                                                            <li>
                                                                                <a href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                            </li>
                                                                            @endforeach



                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach

                                    

                                    <li>
                                        <a class="v-more">
                                        <i class="ion ion-md-add"></i>
                                        <span>View More</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="listing-without-filters.html">New Arrivals
                            <span class="superscript-label-new">NEW</span>
                            </a>
                        </li>
                        <li>
                            <a href="listing-without-filters.html">Best Seller
                            <span class="superscript-label-hot">HOT</span>
                            </a>
                        </li>
                        <li>
                            <a href="listing-without-filters.html">Featured
                            </a>
                        </li>
                        <li>
                            <a href="listing-without-filters.html">Discounted
                            <span class="superscript-label-discount">-30%</span>
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>More
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">COMPANY</li>
                                    <li>
                                        <a href="about.html" class="u-c-brand">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="faq.html">FAQ</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">COLLECTION</li>
                                    <li>
                                        <a href="cart.html">Men Clothing</a>
                                    </li>
                                    <li>
                                        <a href="checkout.html">Women Clothing</a>
                                    </li>
                                    <li>
                                        <a href="account.html">Kids Clothing</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">ACCOUNT</li>
                                    <li>
                                        <a href="shop-v1-root-category.html">My Account</a>
                                    </li>
                                    <li>
                                        <a href="shop-v1-root-category.html">My Profile</a>
                                    </li>
                                    <li>
                                        <a href="listing.html">My Orders</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Bottom-Header /- -->
</header>
<!-- Header /- -->