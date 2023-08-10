@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Vendor Details</h3>
                            <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/admins/vendor') }}">Back to Vendors</a></h6>
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
                            <h4 class="card-title">Personal Information</h4>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly> <!-- Check updateAdminPassword() method in AdminController.php -->
                            </div>
                            <div class="form-group">
                                <label for="vendor_name">Name</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}" readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_address">Address</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_city">City</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">State</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">Country</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_pincode">Pincode</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_mobile">Mobile</label>
                                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile'] }}" readonly>
                            </div>
                            @if (!empty($vendorDetails['image']))
                                <div class="form-group">
                                    <label for="vendor_image">Vendor Photo</label>
                                    <br>
                                    <img style="width: 200px" src="{{ url('admin/images/photos/' . $vendorDetails['image']) }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Business Information</h4>
                            <div class="form-group">
                                <label for="vendor_name">Shop Name</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_name'])) value="{{ $vendorDetails['vendor_business']['shop_name'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_address">Shop Address</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_address'])) value="{{ $vendorDetails['vendor_business']['shop_address'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_city">Shop City</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_city'])) value="{{ $vendorDetails['vendor_business']['shop_city'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_state">Shop State</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_state'])) value="{{ $vendorDetails['vendor_business']['shop_state'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_country">Shop Country</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_country'])) value="{{ $vendorDetails['vendor_business']['shop_country'] }}" @endif readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_pincode">Shop Pincode</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_pincode'])) value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_mobile">Shop Mobile</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_mobile'])) value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" @endif  readonly>
                            </div>
                            <div class="form-group">
                                <label for="vendor_mobile">Shop Website</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_website'])) value="{{ $vendorDetails['vendor_business']['shop_website'] }}" @endif  readonly>
                            </div>
                            <div class="form-group">
                                <label>Shop Email</label>
                                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['shop_email'])) value="{{ $vendorDetails['vendor_business']['shop_email'] }}" @endif  readonly> <!-- Check updateAdminPassword() method in AdminController.php -->
                            </div>
                            <div class="form-group">
                                <label>Business License Number</label>
                                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['business_license_number'])) value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" @endif  readonly> <!-- Check updateAdminPassword() method in AdminController.php -->
                            </div>
                            <div class="form-group">
                                <label>GST Number</label>
                                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['gst_number'])) value="{{ $vendorDetails['vendor_business']['gst_number'] }}" @endif  readonly> <!-- Check updateAdminPassword() method in AdminController.php -->
                            </div>
                            <div class="form-group">
                                <label>PAN Number</label>
                                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['pan_number'])) value="{{ $vendorDetails['vendor_business']['pan_number'] }}" @endif  readonly> <!-- Check updateAdminPassword() method in AdminController.php -->
                            </div>
                            <div class="form-group">
                                <label>Address Proof</label>
                                <input class="form-control"  @if (isset($vendorDetails['vendor_business']['address_proof'])) value="{{ $vendorDetails['vendor_business']['address_proof'] }}" @endif  readonly> <!-- Check updateAdminPassword() method in AdminController.php -->
                            </div>
                            @if (!empty($vendorDetails['vendor_business']['address_proof_image']))
                                <div class="form-group">
                                    <label for="vendor_image">Address Proof Image</label>
                                    <br>
                                    <img style="width: 200px" src="{{ url('admin/images/proofs/' . $vendorDetails['vendor_business']['address_proof_image']) }}">
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Bank Information</h4>
                            <div class="form-group">
                                <label for="vendor_name">Account Holder Name</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['account_holder_name'])) value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_name">Bank Name</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['bank_name'])) value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_address">Account Number</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['account_number'])) value="{{ $vendorDetails['vendor_bank']['account_number'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                            <div class="form-group">
                                <label for="vendor_city">Bank IFSC Code</label>
                                <input type="text" class="form-control"  @if (isset($vendorDetails['vendor_bank']['bank_ifsc_code'])) value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" @endif  readonly> {{-- $vendorDetails was passed from AdminController --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Commissions module: Every vendor must pay a certain commission (that may vary from a vendor to another) for the website owner (admin) on every item sold, and it's defined by the website owner (admin) --}}
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Commission Information</h4>


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

                            <div class="form-group">
                                    <label for="vendor_name">Commission per order item (%)</label>
                                    <form method="post" action="{{ url('admin/update-vendor-commission') }}">
                                        @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                        <input                      type="hidden" name="vendor_id"   value="{{ $vendorDetails['vendor_personal']['id'] }}">
                                        <input class="form-control" type="text"   name="commission"  @if (isset($vendorDetails['vendor_personal']['commission'])) value="{{ $vendorDetails['vendor_personal']['commission'] }}" @endif required> {{-- $vendorDetails was passed from AdminController --}}
                                        <br>
                                        <button type="submit">Update</button>
                                    </form>
                            </div>
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