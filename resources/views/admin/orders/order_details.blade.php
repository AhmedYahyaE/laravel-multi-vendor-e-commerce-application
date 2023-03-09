{{-- https://www.youtube.com/watch?v=EraPx_a3iBg&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168 --}}
{{-- This page is rendered by orderDetails() method inside Admin/OrderController.php --}}



@extends('admin.layout.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">



            {{-- Displaying The Validation Errors: https://laravel.com/docs/9.x/validation#quick-displaying-the-validation-errors AND https://laravel.com/docs/9.x/blade#validation-errors --}} {{-- https://www.youtube.com/watch?v=QbEFPGnTdBc&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=99 --}}
            {{-- Determining If An Item Exists In The Session (using has() method): https://laravel.com/docs/9.x/session#determining-if-an-item-exists-in-the-session --}}
            {{-- Our Bootstrap success message in case of updating admin password is successful: --}}
            {{-- https://www.youtube.com/watch?v=oAZKXYrkcr4&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=17 --}}
            {{-- Displaying Success Message --}}
            @if (Session::has('success_message')) <!-- Check vendorRegister() method in Front/VendorController.php -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif



            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Order Details</h3>
                            <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/orders') }}">Back to Orders</a></h6>
                            {{-- 
                            <h6 class="font-weight-normal mb-0">Update Admin Password</h6>
                            --}}
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
                            <h4 class="card-title">Order Details</h4>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Order ID: </label>
                                <label>#{{ $orderDetails['id'] }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Order Date: </label>
                                <label>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Order Status: </label>
                                <label>{{ $orderDetails['order_status'] }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Order Total: </label>
                                <label>Rs.{{ $orderDetails['grand_total'] }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Shipping Charges: </label>
                                <label>Rs.{{ $orderDetails['shipping_charges'] }}</label>
                            </div>

                            @if (!empty($orderDetails['coupon_code']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Coupon Code: </label>
                                    <label>{{ $orderDetails['coupon_code'] }}</label>
                                </div>
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Coupon Amount: </label>
                                    <label>Rs.{{ $orderDetails['coupon_amount'] }}</label>
                                </div>                                
                            @endif

                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Payment Method: </label>
                                <label>{{ $orderDetails['payment_method'] }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Payment Gateway: </label>
                                <label>{{ $orderDetails['payment_gateway'] }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Customer Details</h4>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Name: </label>
                                <label>{{ $userDetails['name'] }}</label>
                            </div>

                            @if (!empty($userDetails['address']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Address: </label>
                                    <label>{{ $userDetails['address'] }}</label>
                                </div>
                            @endif

                            @if (!empty($userDetails['city']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">City: </label>
                                    <label>{{ $userDetails['city'] }}</label>
                                </div>
                            @endif

                            @if (!empty($userDetails['state']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">State: </label>
                                    <label>{{ $userDetails['state'] }}</label>
                                </div>
                            @endif
                            
                            @if (!empty($userDetails['country']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Country: </label>
                                    <label>{{ $userDetails['country'] }}</label>
                                </div>
                            @endif
                            
                            @if (!empty($userDetails['pincode']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Pincode: </label>
                                    <label>{{ $userDetails['pincode'] }}</label>
                                </div>
                            @endif

                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Mobile: </label>
                                <label>{{ $userDetails['mobile'] }}</label>
                            </div>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Email: </label>
                                <label>{{ $userDetails['email'] }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Delivery Address</h4>
                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Name: </label>
                                <label>{{ $orderDetails['name'] }}</label>
                            </div>

                            @if (!empty($orderDetails['address']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Address: </label>
                                    <label>{{ $orderDetails['address'] }}</label>
                                </div>
                            @endif

                            @if (!empty($orderDetails['city']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">City: </label>
                                    <label>{{ $orderDetails['city'] }}</label>
                                </div>
                            @endif

                            @if (!empty($orderDetails['state']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">State: </label>
                                    <label>{{ $orderDetails['state'] }}</label>
                                </div>
                            @endif
                            
                            @if (!empty($orderDetails['country']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Country: </label>
                                    <label>{{ $orderDetails['country'] }}</label>
                                </div>
                            @endif
                            
                            @if (!empty($orderDetails['pincode']))
                                <div class="form-group" style="height: 15px">
                                    <label style="font-weight: 550">Pincode: </label>
                                    <label>{{ $orderDetails['pincode'] }}</label>
                                </div>
                            @endif

                            <div class="form-group" style="height: 15px">
                                <label style="font-weight: 550">Mobile: </label>
                                <label>{{ $orderDetails['mobile'] }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Order Status</h4>  {{-- determined by 'admin'-s ONLY, not 'vendor'-s --}}

                            {{-- Allowing the general "Update Order Status" feature for 'admin'-s ONLY, and restricting it from 'vendor'-s ('vendor'-s can update their Ordered Products item statuses ONLY (at this page bottom)) --}} {{-- Check 16:20 in https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168 --}}
                            @if (Auth::guard('admin')->user()->type != 'vendor') {{-- If the authenticated/logged-in user is 'admin', allow "Update Order Status" feature --}} {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}} {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                {{-- https://www.youtube.com/watch?v=W-aEaJQGeKE&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=167 --}}
                                {{-- Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc. --}}
                                <form action="{{ url('admin/update-order-status') }}" method="post">  {{-- determined by 'admin'-s ONLY, not 'vendor'-s. This is in contrast to 'Order Item Status' which can be updated by both 'vendor'-s and 'admin'-s --}}
                                    @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                    <input type="hidden" name="order_id" value="{{ $orderDetails['id'] }}">
                                    <select name="order_status" required>
                                        <option value="">Select</option>
                                        @foreach ($orderStatuses as $status)
                                            <option value="{{ $status['name'] }}"  @if (!empty($orderDetails['order_status']) && $orderDetails['order_status'] == $status['name']) selected @endif>{{ $status['name'] }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit">Update</button>
                                </form>
                                <br>
                                {{-- Show the "Update Order Status" History/Log in admin/orders/order_details.blade.php    // Check 7:47 in https://www.youtube.com/watch?v=7nb4feE7FBY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=171 --}}
                                @foreach ($orderLog as $log)
                                    <strong>{{ $log['order_status'] }}</strong>
                                    <br>
                                    {{ date('Y-m-d h:i:s', strtotime($log['created_at'])) }}
                                    <br>
                                    <hr>
                                @endforeach

                            @else {{-- If the authenticated/logged-in user is 'vendor', restrict the "Update Order Status" feature --}}
                                This feature is restricted.
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ordered Products</h4>

                            {{-- Order products info table --}}
                            <table class="table table-striped table-borderless">
                                <tr class="table-danger">
                                    <th>Product Image</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Product Size</th>
                                    <th>Product Color</th>
                                    <th>Product Qty</th>
                                    <th>Item Status</th> {{-- can be updated by both 'vendor'-s and 'admin'-s. This is in contrast to 'Update Order Status' which can be updated by 'admin'-s ONLY --}} {{-- https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168 --}}
                                    {{-- Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc. --}}
                                </tr>
                                @foreach ($orderDetails['orders_products'] as $product)
                                    <tr>
                                        <td>
                                            @php
                                                $getProductImage = \App\Models\Product::getProductImage($product['product_id']);
                                            @endphp
                                            <a target="_blank" href="{{ url('product/' . $product['product_id']) }}">
                                                <img src="{{ asset('front/images/product_images/small/' . $getProductImage) }}">
                                            </a>
                                        </td>
                                        <td>{{ $product['product_code'] }}</td>
                                        <td>{{ $product['product_name'] }}</td>
                                        <td>{{ $product['product_size'] }}</td>
                                        <td>{{ $product['product_color'] }}</td>
                                        <td>{{ $product['product_qty'] }}</td>

                                        {{-- https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168 --}}
                                        <td>

                                        {{-- https://www.youtube.com/watch?v=QEdO_maniDY&list=PLLUtELdNs2ZaAC30yEEtR6n-EPXQFmiVu&index=168 --}}
                                        {{-- Note: The `order_statuses` table contains all kinds of order statuses (that can be updated by 'admin'-s ONLY in `orders` table) like: pending, in progress, shipped, canceled, ...etc. In `order_statuses` table, the `name` column can be: 'New', 'Pending', 'Canceled', 'In Progress', 'Shipped', 'Partially Shipped', 'Delivered', 'Partially Delivered' and 'Paid'. 'Partially Shipped': If one order has products from different vendors, and one vendor has shipped their product to the customer while other vendor (or vendors) didn't!. 'Partially Delivered': if one order has products from different vendors, and one vendor has shipped and DELIVERED their product to the customer while other vendor (or vendors) didn't!    // The `order_item_statuses` table contains all kinds of order statuses (that can be updated by both 'vendor'-s and 'admin'-s in `orders_products` table) like: pending, in progress, shipped, canceled, ...etc. --}}
                                        <form action="{{ url('admin/update-order-item-status') }}" method="post">  {{-- can be updated by both 'vendor'-s and 'admin'-s. This is in contrast to 'Update Order Status' which can be updated by 'admin'-s ONLY --}}
                                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}

                                            <input type="hidden" name="order_item_id" value="{{ $product['id'] }}">
                                            <select name="order_item_status" required>
                                                <option value="">Select</option>
                                                @foreach ($orderItemStatuses as $status)
                                                    <option value="{{ $status['name'] }}"  @if (!empty($product['item_status']) && $product['item_status'] == $status['name']) selected @endif>{{ $status['name'] }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit">Update</button>
                                        </form>

                                        </td>
                                    </tr>         
                                @endforeach
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