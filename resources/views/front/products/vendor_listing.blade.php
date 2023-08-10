{{-- Show all Vendor products page (when you click on a shop name in front/products/detail.blade.php) --}} {{-- This view is returned from vendorListing() method in Front/ProductsController.php --}} 
@extends('front.layout.layout')


@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ $getVendorShop }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="listing.html">{{ $getVendorShop }}</a>
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


                    <li>{{ $getVendorShop }}</li>



                </ul>
            </div>
            <!-- Shop-Intro /- -->
            <div class="row">



                <!-- Shop-Right-Wrapper -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- Page-Bar -->
                    <div class="page-bar clearfix">
                        

                        <!-- //end Toolbar Sorter 2  -->
                    </div>
                    <!-- Page-Bar /- -->


                    <!-- Row-of-Product-Container -->

                    {{-- Sorting Filter WITH AJAX. Check ajax_products_listing.blade.php --}} 
                    <div class="">
                        @include('front.products.vendor_products_listing')
                    </div>

                    <!-- Row-of-Product-Container /- -->



                    {{-- Laravel Pagination and showing it using Bootstrap Pagination --}} 
                    {{-- <div>{{ $vendorProducts->links() }}</div> --}}


                    {{-- Fixing the Laravel Pagination problem with the Sorting Filter where sorting gets messed up with pagination). The cause of the problem is that when you click on the pagination links like for example when you go to the second page, the URL query string parameters gets the pagination page number (e.g. 'page=2') but it loses the filter query string parameter (e.g. '&sort=desc'), so we have to always append the sorting filter query string parameter to the page number query string paramter  --}} 
                    {{-- Appending Query String Values: https://laravel.com/docs/9.x/pagination#appending-query-string-values --}}
                    @if (isset($_GET['sort'])) {{-- if there's a Sorting Filter used --}}
                        <div>
                            {{ $vendorProducts->appends(['sort' => $_GET['sort']])->links() }}
                        </div>
                    @else
                        <div>
                            {{ $vendorProducts->links() }}
                        </div>
                    @endif


                    <div>&nbsp;</div>
                </div>
                <!-- Shop-Right-Wrapper /- -->


                <!-- Shop-Pagination -->



                <!-- Shop-Pagination /- -->


            </div>
        </div>
    </div>
    <!-- Shop-Page /- -->
@endsection