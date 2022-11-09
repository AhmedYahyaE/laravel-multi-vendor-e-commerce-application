{{-- https://www.youtube.com/watch?v=yqkYp_iHsxQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=118 --}}
{{-- Note: cart.blade.php is the page that opens when you ... --}}

@extends('front.layout.layout')



@section('content')
    <!-- Page Introduction Wrapper -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Cart</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="is-marked">
                        <a href="cart.html">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Introduction Wrapper /- -->
    <!-- Cart-Page -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">



                    {{-- https://www.youtube.com/watch?v=8OZ5iAK8m50&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=120 --}}
                    <div id="appendCartItems"> {{-- We 'include'-ed this file to allow the AJAX call in front/js/custom.js when updating orders quantities in the Cart --}}
                        @include('front.products.cart_items')
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- Cart-Page /- -->
@endsection