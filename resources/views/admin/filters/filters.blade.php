{{-- https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83 --}}


@extends('admin.layout.layout')



@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Filters</h4>
                        {{-- <p class="card-description">
                            Add class <code>.table-bordered</code>
                        </p> --}}


                        {{-- https://www.youtube.com/watch?v=0eFPxTAwqnQ&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=83 --}}
                        <a href="{{ url('admin/filters-values') }}"  style="max-width: 163px; float: right; display: inline-block" class="btn btn-block btn-primary">View Filter Values</a>
                        <a href="{{ url('admin/add-edit-filter') }}" style="max-width: 169px; float: left;  display: inline-block" class="btn btn-block btn-primary">Add Filter Column</a>

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
                            <table id="filters" class="table table-bordered"> {{-- using the id here for the DataTable --}}
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Filter Name</th>
                                        <th>Filter Column</th>
                                        <th>Categories</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filters as $filter)
                                        <tr>
                                            <td>{{ $filter['id'] }}</td>
                                            <td>{{ $filter['filter_name'] }}</td>
                                            <td>{{ $filter['filter_column'] }}</td>
                                            <td>
                                                @php
                                                    $catIds = explode(',', $filter['cat_ids']);
                                                    // echo '<pre>', var_dump($catIds), '</pre>';
                                                    foreach ($catIds as $key => $catId) {
                                                        $category_name = \App\Models\Category::getCategoryName($catId);
                                                        echo $category_name . ' ';
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                @if ($filter['status'] == 1)
                                                    <a class="updateFilterStatus" id="filter-{{ $filter['id'] }}" filter_id="{{ $filter['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-check" status="Active"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                @else {{-- if the admin status is inactive --}}
                                                    <a class="updateFilterStatus" id="filter-{{ $filter['id'] }}" filter_id="{{ $filter['id'] }}" href="javascript:void(0)"> {{-- Using HTML Custom Attributes --}}
                                                        <i style="font-size: 25px" class="mdi mdi-bookmark-outline" status="Inactive"></i> {{-- Icons from Skydash Admin Panel Template --}}
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="{{ url('admin/add-edit-filter/' . $filter['id']) }}"> --}}
                                                    {{-- <i style="font-size: 25px" class="mdi mdi-pencil-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                {{-- </a> --}}

                                                {{-- Confirm Deletion JS alert and Sweet Alert: Check 5:02 in https://www.youtube.com/watch?v=6TfdD5w-kls&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=33 --}}
                                                {{-- <a title="Filter" class="confirmDelete" href="{{ url('admin/delete-filter/' . $filter['id']) }}"> --}}
                                                    {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                {{-- </a> --}}
                                                {{-- <a href="JavaScript:void(0)" class="confirmDelete" module="filter" moduleid="{{ $filter['id'] }}"> --}}
                                                    {{-- <i style="font-size: 25px" class="mdi mdi-file-excel-box"></i> --}} {{-- Icons from Skydash Admin Panel Template --}}
                                                {{-- </a> --}}
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