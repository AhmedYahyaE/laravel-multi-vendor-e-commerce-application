{{-- https://www.youtube.com/watch?v=-ZVzg8vwUjk&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=27 --}}


@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Products</h4>
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}


                        {{-- https://www.youtube.com/watch?v=YqBzJmwrh8I&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=37 --}}
                        <a href="{{ url('/admin/add-edit-product') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Add Product</a>

                        {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                        {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
                        {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
                        @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                        <div class="table-responsive pt-3">
                            {{-- DataTable: Check 18:55 in https://www.youtube.com/watch?v=1XJ7908SJcM&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=34 --}}
                            <table id="products" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Product Color</th>
                                        <th>Category</th> {{-- Through the relationship --}}
                                        <th>Section</th> {{-- Through the relationship --}}
                                        <th>Added by</th> {{-- Through the relationship --}}
                                        <th>URL</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product['id'] }}</td>
                                            <td>{{ $product['product_name'] }}</td>
                                            <td>{{ $product['product_code'] }}</td>
                                            <td>{{ $product['product_color'] }}</td>
                                            <td>{{ $product['category']['category_name'] }}</td> {{-- Through the relationship --}}
                                            <td>{{ $product['section']['name'] }}</td> {{-- Through the relationship --}}
                                            <td>
                                                @if ($product['admin_type'] == 'vendor')
                                                    <a target="_blank" href="{{ url('admin/view-vendor-details/' . $product['admin_id']) }}">{{ ucfirst($product['admin_type']) }}</a>
                                                @else
                                                    {{ ucfirst($product['admin_type']) }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($product['status'] == 1)
                                                    <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                @else {{-- if the admin status is inactive --}}
                                                    <a class="updateProductStatus" id="product-{{ $product['id'] }}" product_id="{{ $product['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/add-edit-product/' . $product['id']) }}">
                                                    <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                </a>

                                                {{-- Confirm Deletion JS alert and Sweet Alert: Check 5:02 in https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33 --}}
                                                {{-- <a title="Product" class="confirmDelete" href="{{ url('admin/delete-product/' . $product['id']) }}"> --}}
                                                    {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                {{-- </a> --}}
                                                <a href="JavaScript:void(0)" class="confirmDelete" module="product" moduleid="{{ $product['id'] }}"> {{-- Check custom.js and web.php (routes) --}}
                                                    <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection