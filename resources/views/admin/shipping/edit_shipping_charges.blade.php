{{-- This file is rendered by editShippingCharges() method in Admin/ShippingController.php --}}
@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Edit Shipping Charges</h3>
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
                            <h4 class="card-title">{{ $title }}</h4>


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
                                {{-- <strong>Error:</strong> {{ Session::get('error_message') }} --}}

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
                

                            
                            <form class="forms-sample" action="{{ url('admin/edit-shipping-charges/' . $shippingDetails['id']) }}" method="post"> <!-- If the id is not passed in from the route, this measn 'Add a new Shipping Charge', but if the id is passed in from the route, this means 'Edit the Shipping Charge' --> <!-- Using the enctype="multipart/form-data" to allow uploading files (images) -->
                                @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control" value="{{ $shippingDetails['country'] }}" readonly> 
                                </div>
                                <div class="form-group">
                                    <label for="0_500g">Rate (0-500g)</label>
                                    <input type="text" class="form-control" id="0_500g" placeholder="Enter Shipping Rate" name="0_500g" value="{{ $shippingDetails['0_500g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="501g_1000g">Rate (501g-1000g)</label>
                                    <input type="text" class="form-control" id="501g_1000g" placeholder="Enter Shipping Rate" name="501g_1000g" value="{{ $shippingDetails['501g_1000g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="1001_2000g">Rate (1001-2000g)</label>
                                    <input type="text" class="form-control" id="1001_2000g" placeholder="Enter Shipping Rate" name="1001_2000g" value="{{ $shippingDetails['1001_2000g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="2001g_5000g">Rate (2001g-5000g)</label>
                                    <input type="text" class="form-control" id="2001g_5000g" placeholder="Enter Shipping Rate" name="2001g_5000g" value="{{ $shippingDetails['2001g_5000g'] }}"> 
                                </div>
                                <div class="form-group">
                                    <label for="above_5000g">Rate (Above 5000g)</label>
                                    <input type="text" class="form-control" id="above_5000g" placeholder="Enter Shipping Rate" name="above_5000g" value="{{ $shippingDetails['above_5000g'] }}"> 
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button type="reset"  class="btn btn-light">Cancel</button>
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