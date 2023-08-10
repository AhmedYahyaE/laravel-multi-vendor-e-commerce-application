@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">

                            <h4 class="card-title">Images</h4> {{-- meaning Product images --}}
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
                            <h4 class="card-title">Add Images</h4>


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
                

                            


                            
                            <form class="forms-sample" action="{{ url('admin/add-images/' . $product['id']) }}" method="post" enctype="multipart/form-data"> {{-- "enctype" attribute must be used becasue we're uploading files --}}
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
                                        <input type="file" name="images[]" multiple id="images"> {{-- Upload multiple images for the product --}} {{-- "multiple" HTML attribute: https://www.w3schools.com/tags/att_multiple.asp --}}
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset"  class="btn btn-light">Cancel</button>
                            </form>

                            <br><br>
                            
                            <h4 class="card-title">Product Images</h4>

                            {{-- DataTable --}}
                            <table id="products" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product['images'] as $image) {{-- using the relationship 'images' --}}<tr>
                                            <td>{{ $image['id'] }}</td>
                                            <td>
                                                <img src="{{ url('front/images/product_images/small/' . $image['image']) }}"> {{-- Small --}}
                                                {{-- Medium --}}
                                                {{-- Large --}}
                                            </td>
                                            <td>
                                                @if ($image['status'] == 1)
                                                    <a class="updateImageStatus" id="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                @else {{-- if the admin status is inactive --}}
                                                    <a class="updateImageStatus" id="image-{{ $image['id'] }}" image_id="{{ $image['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                @endif
                                                &nbsp;
                                                <a href="JavaScript:void(0)" class="confirmDelete" module="image" moduleid="{{ $image['id'] }}"> {{-- Check admin/js/custom.js and web.php (routes) --}}
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
        <!-- content-wrapper ends -->
        @include('admin.layout.footer')
        <!-- partial -->
    </div>
@endsection