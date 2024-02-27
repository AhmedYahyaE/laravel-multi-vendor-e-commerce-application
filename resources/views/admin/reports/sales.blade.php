@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sales Reports</h4>
                            
                            <!-- <a href="{{ url('admin/add-edit-brand') }}" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-primary">Add Brand</a> -->

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

                            <div class="filter-container">
                                <form class="form-group d-flex">
                                    <div class="col-sm-12 col-md-3 mr-2">
                                        <div class="form-group">
                                          <label for="filterBy">Filter By:</label>
                                          <select class="form-control" name="filterBy" id="filterBy">
                                            <option>-- Select Filter --</option>
                                            <option value="0">Product Name</option>
                                            <option value="1">Product Category</option>
                                            <option value="2">Payment Method</option>
                                            <option value="3">Date Period</option>
                                            <option value="4">Price Range</option>
                                            <option value="5">Order Status</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <!-- filter for [0,1,2,5] -->
                                        <div class="input-group col-sm-1-12 mr-2" data-filterFor="0,1,2,5" style="display: none;">
                                            <div class="form-group">
                                                <label id="filterBy-labelValue" for="inputName"></label>
                                                <div class="col-sm-1-12">
                                                    <input type="text" class="form-control" name="searchName" id="searchName" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- filter for [3] -->
                                        <div class="input-group col-sm-1-12 mr-2" data-filterFor="3" style="display: none;">
                                            <div class="form-group">
                                                <label for="inputName">Date Range:</label>
                                                <div class="row m-0">
                                                    <div class="col-sm-6 pl-0">
                                                        <input type="date" format="mm/dd/yyyy" class="form-control" name="searchDateFrom" id="searchDateFrom" placeholder="">
                                                    </div>
                                                    <div class="col-sm-6 pl-0">
                                                        <input type="date" class="form-control" name="searchDateTo" id="searchDateTo" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- filter for [4] -->
                                        <div class="input-group col-sm-1-12 mr-2" data-filterFor="4" style="display: none;">
                                            <div class="form-group">
                                                <label for="inputName">Price Range:</label>
                                                <div class="row m-0">
                                                    <div class="col-sm-6 pl-0">
                                                        <input type="number" class="form-control" name="searchPriceMin" id="searchPriceMin" placeholder="">
                                                    </div>
                                                    <div class="col-sm-6 pl-0">
                                                        <input type="number" class="form-control" name="searchPriceMax" id="searchPriceMax" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2 p-0 d-flex justify-content-center align-items-center">
                                        <div>
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div>
                                <h6>This will include:</h6>
                                <p>
                                    <ol>
                                        <li>Analytics (Graphs)</li>
                                        <ol>
                                            <li>Line graph</li>
                                            <li>Bar graph</li>
                                        </ol>
                                    </ol>
                                </p>
                            </div>
                            <div class="chart-container">
                                <canvas id="lineChart"></canvas>
                            </div>
                            <div class="table-responsive pt-3">
                                {{-- DataTable --}}
                                <table id="brands" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Payment</th>
                                            <th>Shipping Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order['id'] }}</td>
                                                <td>{{ $order['name'] }}</td>
                                                <td>
                                                    @if ($order['status'] == 1)
                                                        <a class="updateBrandStatus" id="brand-{{ $order['id'] }}" brand_id="{{ $order['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @else {{-- if the admin status is inactive --}}
                                                        <a class="updateBrandStatus" id="brand-{{ $order['id'] }}" brand_id="{{ $order['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes. Check admin/js/custom.js --}}
                                                            <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ url('admin/add-edit-brand/' . $order['id']) }}">
                                                        <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>

                                                    {{-- Confirm Deletion JS alert and Sweet Alert --}}
                                                    {{-- <a title="Brand" class="confirmDelete" href="{{ url('admin/delete-brand/' . $order['id']) }}"> --}}
                                                        {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                    {{-- </a> --}}
                                                    <a href="JavaScript:void(0)" class="confirmDelete" module="brand" moduleid="{{ $order['id'] }}">
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection