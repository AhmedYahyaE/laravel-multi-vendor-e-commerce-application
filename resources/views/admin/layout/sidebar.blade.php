{{-- Correcting issues in the Skydash Admin Panel Sidebar using Session --}}


<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <button class="custom_btn_for_navbar_mobile navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
    </button>
    <img class="dashboard_admin_logo" width="154" height="34" src="{{ asset('front/images/main-logo/2023-12-logo-black-text-150x34.png') }}">

    <ul class="nav">
        <li class="nav-item">
            <a @if (Session::get('page') == 'dashboard') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- In case the authenticated user (the logged-in user) (using the 'admin' Authentication Guard in auth.php) type is 'vendor' --}}
        @if (Auth::guard('admin')->user()->type == 'vendor')
            {{-- Accessing Specific Guard Instances: https://laravel.com/docs/9.x/authentication#accessing-specific-guard-instances --}}
            <li class="nav-item">
                <a 
                  @if (in_array(Session::get('page'), ['update_personal_details','update_business_details','update_admin_password'])) 
                    style="background: #5f7a61 !important; color: #FFF !important" 
                  @endif 
                    class="nav-link" 
                    href="#my-account" 
                    data-toggle="collapse" 
                    aria-expanded="false" 
                    aria-controls="my-account"
                >
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">My Account</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="my-account">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_personal_details') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/personal') }}">Personal Details</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_business_details') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/update-vendor-details/business') }}">Business Details</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_password')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/update-admin-password') }}">User Management</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['sections','categories','products','brands','filters','coupons'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Catalogue Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'products')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/products') }}">Products</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'coupons')    style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/coupons') }}">Coupons</a></li> 
                    </ul>
                </div>
            </li>

            {{-- If the authenticated/logged-in user is 'vendor', show ONLY the orders of the products added by that specific 'vendor' (In constrast to the case where the authenticated/logged-in user is 'admin', we show ALL orders) --}} 
            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Orders Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['campaigns','affiliate_marketing'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-marketing" aria-expanded="false" aria-controls="ui-marketing">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Marketing</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-marketing">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'campaigns') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="#">Campaigns</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'affiliate_marketing') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="#">Affiliate Marketing</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['store_profile'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-store" aria-expanded="false" aria-controls="ui-store">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Store</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-store">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'store_profile')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="#">Store Profile - Reels</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['update_bank_details', 'income_statement', 'my_balance'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-finance" aria-expanded="false" aria-controls="ui-finance">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Finance</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-finance">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_bank_details')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="#">Bank Details</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'income_statement')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="#">Income Statement</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'my_balance')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="#">My Balance - Disbursements</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['sales'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-data" aria-expanded="false" aria-controls="ui-data">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Data and Reports</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-data">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sales')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/reports/sales') }}">Business Insights</a></li>
                    </ul>
                </div>
            </li>

        @else
            {{-- In case the authenticated user (the logged-in user) (using the 'admin' Authentication Guard in auth.php) type is 'superadmin', or 'admin', or 'subadmin' --}}
            
            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['view_admins','view_subadmins','view_vendors','view_all'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Admin Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-admins">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        
                        {{-- The Route Parameter {type} is the `type` column in the `admins` table, which can only be: admin, subadmin or vendor. And if there's no parameter passed at all, show ALL of the admins, subadmins and vendors at the same page --}}
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_admins')    style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/admins/admin') }}">Admins</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_subadmins') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/admins/subadmin') }}">Subadmins</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_vendors')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/admins/vendor') }}">Vendors</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'view_all')       style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/admins') }}">All</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['sections','categories','products','brands','filters','coupons'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Catalogue Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-catalogue">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'sections')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/sections') }}">Sections</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'categories') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/categories') }}">Categories</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'brands')     style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/brands') }}">Brands</a></li> 
                        <li class="nav-item"> <a @if (Session::get('page') == 'products')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/products') }}">Products</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'coupons')    style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/coupons') }}">Coupons</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'filters')    style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/filters') }}">Filters</a></li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'orders') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Orders Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-orders">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'orders')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/orders') }}">Orders</a></li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'ratings') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Ratings Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-ratings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'ratings')   style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/ratings') }}">Product Ratings & Reviews</a></li>
                    </ul>
                </div>
            </li>

            
            
            <li class="nav-item">
                <a @if (Session::get('page') == 'users') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Users Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-users">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'users')       style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/users') }}">Users</a></li>
                    </ul>
                </div>
            </li>


            
            <li class="nav-item">
                <a @if (Session::get('page') == 'banners') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Banners Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-banners">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'banners') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/banners') }}">Home Page Banners</a></li>
                    </ul>
                </div>
            </li>

            
            <li class="nav-item">
                <a @if (Session::get('page') == 'shipping') style="background: #5f7a61 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Shipping Management</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-shipping">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'shipping') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/shipping-charges') }}">Shipping Charges</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a @if (in_array(Session::get('page'), ['update_admin_password','update_admin_details'])) style="background: #052CA3 !important; color: #FFF !important" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
                    <i class="icon-layout menu-icon"></i>
                    <span class="menu-title">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-settings">
                    <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #5f7a61 !important">
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_password') style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/update-admin-password') }}">Update Admin Password</a></li>
                        <li class="nav-item"> <a @if (Session::get('page') == 'update_admin_details')  style="background: #5f7a61 !important; color: #FFF !important" @else style="background: #fff !important; color: #5f7a61 !important" @endif class="nav-link" href="{{ url('admin/update-admin-details') }}">Update Admin Details</a></li>
                    </ul>
                </div>
            </li>
        @endif


    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/logout') }}">
        <span class="elementor-icon-list-icon">
            <svg style="width: 17px; color:#6c7383; margin-right: 17px; fill: #6c7383;" aria-hidden="true" class="e-font-icon-svg e-fas-sign-out-alt" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
            </svg>
        </span>
            <span class="menu-title">Logout</span>
        </a>
    </li>



    </ul>
</nav>