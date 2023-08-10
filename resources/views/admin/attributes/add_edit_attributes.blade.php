
{{-- This page is rendered by addAttributes() method in Admin/ProductsController.php --}}
@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h4 class="card-title">Attributes</h4> {{-- meaning Product attributes --}}
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add Attributes</h4>


                            {{-- Our Bootstrap error code in case of wrong current password or the new password and confirm password are not matching: --}}
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
                            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
                            @if (Session::has('success_message')) <!-- Check AdminController.php, updateAdminPassword() method -->
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success:</strong> {{ Session::get('success_message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                

                            


                            
                            <form class="forms-sample" action="{{ url('admin/add-edit-attributes/' . $product['id']) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="product_name">Product Name:</label>
                                    &nbsp; {{ $product['product_name'] }}
                                </div>
                                <div class="form-group">
                                    <label for="product_code">Product Code:</label>
                                    &nbsp; {{ $product['product_code'] }}
                                </div>
                                <div class="form-group">
                                    <label for="product_color">Product Color:</label>
                                    &nbsp; {{ $product['product_color'] }}
                                </div>
                                <div class="form-group">
                                    <label for="product_price">Product Price:</label>
                                    &nbsp; {{ $product['product_price'] }}
                                </div>
                                <div class="form-group">
                                    {{-- Show the product image, if any (if exits) --}}
                                    @if (!empty($product['product_image']))
                                        <img style="width: 120px" src="{{ url('front/images/product_images/small/' . $product['product_image']) }}"> {{--  the 'small' image --}}
                                    @else
                                        <img style="width: 120px" src="{{ url('front/images/product_images/small/no-image.png') }}"> {{--  the 'small' image --}}
                                    @endif
                                </div>

                

                                {{-- Add Remove Input Fields Dynamically using jQuery: https://www.codexworld.com/add-remove-input-fields-dynamically-using-jquery/ --}} 
                                {{-- Products attributes add//remove input fields dynamically using jQuery --}}
                                <div class="form-group">
                                    <div class="field_wrapper">
                                        <div>
                                            <input type="text" name="size[]"  placeholder="Size"  style="width:100px" required> {{-- !! Note that the "name" HTML attribute is an ARRAY (using SQUARE BRAKETS [] !!) --}}
                                            <input type="text" name="sku[]"   placeholder="SKU"   style="width:100px" required> {{-- !! Note that the "name" HTML attribute is an ARRAY (using SQUARE BRAKETS [] !!) --}}
                                            <input type="text" name="price[]" placeholder="Price" style="width:100px" required> {{-- !! Note that the "name" HTML attribute is an ARRAY (using SQUARE BRAKETS [] !!) --}}
                                            <input type="text" name="stock[]" placeholder="Stock" style="width:100px" required> {{-- !! Note that the "name" HTML attribute is an ARRAY (using SQUARE BRAKETS [] !!) --}}
                                            <a href="javascript:void(0);" class="add_button" title="Add Attributes">Add</a> {{-- Add another 4 input fields like the former --}}
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset"  class="btn btn-light">Cancel</button>
                            </form>

                            <br><br>
                            
                            <h4 class="card-title">Product Attributes</h4>

                            <form method="post" action="{{ url('admin/edit-attributes/' . $product['id']) }}">
                                @csrf

                                {{-- DataTable --}}
                                <table id="products" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Size</th>
                                            <th>SKU</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product['attributes'] as $attribute) {{-- using the relationship 'attributes' --}}
                                            {{--  <input type="hidden" name="attributeId[]" value="{{ $attribute['id'] }}">  --}} {{-- A hidden input field --}} {{-- IMPORTANT NOTE: DIDN'T WORK INSIDE FOR LOOP!! MUST BE OUSTSIDE IT IN ORDER TO WORK! --}}
                                            <input style="display: none" type="text" name="attributeId[]" value="{{ $attribute['id'] }}"> {{-- A hidden input field --}}
                                            <tr>
                                                <td>{{ $attribute['id'] }}</td>
                                                <td>{{ $attribute['size'] }}</td>
                                                <td>{{ $attribute['sku'] }}</td>
                                                <td>
                                                    <input type="number" name="price[]" value="{{ $attribute['price'] }}" required style="width: 60px"> {{-- !! Note the "name" HTML attribute SQUARE BRACKETS [] !! --}}
                                                </td>
                                                <td>
                                                    <input type="number" name="stock[]" value="{{ $attribute['stock'] }}" required style="width: 60px"> {{-- !! Note the "name" HTML attribute SQUARE BRACKETS [] !! --}}
                                                </td>
                                                <td>
                                                    @if ($attribute['status'] == 1)
                                                        <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @else {{-- if the admin status is inactive --}}
                                                        <a class="updateAttributeStatus" id="attribute-{{ $attribute['id'] }}" attribute_id="{{ $attribute['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary">Update Attributes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection