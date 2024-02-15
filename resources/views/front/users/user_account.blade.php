{{-- This page is accessed from My Account tab in the dropdown menu in the header (in front/layout/header.blade.php). Check userAccount() method in Front/UserController.php --}} 
@extends('front.layout.layout')


@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="743"
    class="elementor elementor-743"
    data-elementor-post-type="page"
>
    <div
        class="elementor-element elementor-element-f854b76 e-flex e-con-boxed e-con e-parent"
        data-id="f854b76"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-e2653fa e-con-full e-flex e-con e-child"
                data-id="e2653fa"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-af14eb6 elementor-widget__width-inherit elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="af14eb6"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">MY ACCOUNT</h1>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-5ff7960 e-flex e-con-boxed e-con e-child"
                    data-id="5ff7960"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-96c8ec8 e-con-full e-flex e-con e-child"
                            data-id="96c8ec8"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-9a22a87 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="9a22a87"
                                data-element_type="widget"
                                data-widget_type="icon-list.default"
                            >
                                <div class="elementor-widget-container">
                                    <ul class="elementor-icon-list-items">
                                        <li class="elementor-icon-list-item">
                                            <a href="{{ url('user/account') }}">
                                                <span class="elementor-icon-list-icon">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="e-font-icon-svg e-fas-user-alt"
                                                        viewbox="0 0 512 512"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zm128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128z"></path>
                                                    </svg>
                                                </span>
                                                <span class="elementor-icon-list-text">Profile</span>
                                            </a>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <a href="{{ url('user/security') }}">
                                                <span class="elementor-icon-list-icon">
                                                <svg aria-hidden="true" class="e-font-icon-svg e-fas-lock" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path>
                                                </svg>
                                                </span>
                                                <span class="elementor-icon-list-text">Change Password</span>
                                            </a>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <a href="{{ url('user/orders') }}">
                                                <span class="elementor-icon-list-icon">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="e-font-icon-svg e-fas-cart-arrow-down"
                                                        viewbox="0 0 576 512"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM403.029 192H360v-60c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v60h-43.029c-10.691 0-16.045 12.926-8.485 20.485l67.029 67.029c4.686 4.686 12.284 4.686 16.971 0l67.029-67.029c7.559-7.559 2.205-20.485-8.486-20.485z"></path>
                                                    </svg>
                                                </span>
                                                <span class="elementor-icon-list-text">Order List</span>
                                            </a>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <a href="{{ url('user/chats') }}">
                                                <span class="elementor-icon-list-icon">
                                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-comments" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path>
                                                    </svg>
                                                </span>
                                                <span class="elementor-icon-list-text">Chats</span>
                                            </a>
                                        </li>
                                        <li class="elementor-icon-list-item">
                                            <a href="{{ url('user/logout') }}">
                                                <span class="elementor-icon-list-icon">
                                                    <svg
                                                        aria-hidden="true"
                                                        class="e-font-icon-svg e-fas-sign-out-alt"
                                                        viewbox="0 0 512 512"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
                                                        <path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path>
                                                    </svg>
                                                </span>
                                                <span class="elementor-icon-list-text">Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-df7ebda e-con-full e-flex e-con e-child customer_information"
                            data-id="df7ebda"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-66eba68 e-grid e-con-boxed e-con e-child"
                                data-id="66eba68"
                                data-element_type="container"
                                data-settings="{&quot;container_type&quot;:&quot;grid&quot;,&quot;grid_columns_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:2,&quot;sizes&quot;:[]},&quot;content_width&quot;:&quot;boxed&quot;,&quot;grid_outline&quot;:&quot;yes&quot;,&quot;grid_columns_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:3,&quot;sizes&quot;:[]},&quot;grid_columns_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;grid_rows_grid&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:2,&quot;sizes&quot;:[]},&quot;grid_rows_grid_tablet&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_rows_grid_mobile&quot;:{&quot;unit&quot;:&quot;fr&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;grid_auto_flow&quot;:&quot;row&quot;,&quot;grid_auto_flow_tablet&quot;:&quot;row&quot;,&quot;grid_auto_flow_mobile&quot;:&quot;row&quot;}"
                            >
                                <div class="">

                                    <form id="accountForm" action="javascript:;" method="post" name="Edit Form" class="edit-information-form">
                                        <div id="account-success" class="message-form"></div>
                                        <div id="account-error" class="message-form"></div>
                                        <div
                                            class="elementor-element elementor-element-8ef6cca e-flex e-con-boxed e-con e-child"
                                            data-id="8ef6cca"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-846d9e7 elementor-widget elementor-widget-heading"
                                                    data-id="846d9e7"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">FIRST NAME</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-fce3415 elementor-widget elementor-widget-heading"
                                                    data-id="fce3415"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->first_name }}</h5>
                                                        <input class="text-field first_name_edit" type="text" id="first_name_edit" name="first_name" value="{{ $user->first_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-4c294d7 e-flex e-con-boxed e-con e-child"
                                            data-id="4c294d7"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-0954561 elementor-widget elementor-widget-heading"
                                                    data-id="0954561"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">LAST NAME</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-30f458e elementor-widget elementor-widget-heading"
                                                    data-id="30f458e"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->last_name }}</h5>
                                                        <input class="text-field last_name_edit" type="text" id="last_name_edit" name="last_name" value="{{ $user->last_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-bd6cfb3 e-flex e-con-boxed e-con e-child"
                                            data-id="bd6cfb3"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-3f22892 elementor-widget elementor-widget-heading"
                                                    data-id="3f22892"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">Address 1</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-f49bf8e elementor-widget elementor-widget-heading"
                                                    data-id="f49bf8e"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->address }}</h5>
                                                        <input class="text-field address_1_edit" type="text" id="address_1_edit" name="address" value="{{ $user->address }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="elementor-element elementor-element-39ebcd7 e-flex e-con-boxed e-con e-child"
                                            data-id="39ebcd7"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-735d997 elementor-widget elementor-widget-heading"
                                                    data-id="735d997"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">COUNTRY</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-9f0221a elementor-widget elementor-widget-heading"
                                                    data-id="9f0221a"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->country }}</h5>
                                                        <select class="text-field address-field country-edit" id="user-country" name="country" style="color: #495057">
                                                            <option value="">Select Country</option>

                                                            @foreach ($countries as $country) {{-- $countries was passed from UserController to view using compact() method --}}
                                                                <option value="{{ $country['country_name'] }}"  @if ($country['country_name'] == \Illuminate\Support\Facades\Auth::user()->country) selected @endif>{{ $country['country_name'] }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="elementor-element elementor-element-b364a78 e-flex e-con-boxed e-con e-child"
                                            data-id="b364a78"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-d3788cf elementor-widget elementor-widget-heading"
                                                    data-id="d3788cf"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">PROVINCE</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-72c84e2 elementor-widget elementor-widget-heading"
                                                    data-id="72c84e2"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->state }}</h5>
                                                        <select class="text-field address-field state-edit" id="user-state" name="state" style="color: #495057">
                                                            <option value="">Select State</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="elementor-element elementor-element-00b548d e-flex e-con-boxed e-con e-child"
                                            data-id="00b548d"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}">
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-27fbff6 elementor-widget elementor-widget-heading"
                                                    data-id="27fbff6"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">CITY</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-6892f69 elementor-widget elementor-widget-heading"
                                                    data-id="6892f69"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->city }}</h5>
                                                        <input class="text-field user-city" type="text" id="user-city" name="city" value="{{ $user->city }}">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        

                                        

                                        <div
                                            class="elementor-element elementor-element-e30bacf e-flex e-con-boxed e-con e-child"
                                            data-id="e30bacf"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-5a654f7 elementor-widget elementor-widget-heading"
                                                    data-id="5a654f7"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">ZIP CODE</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-cba44ce elementor-widget elementor-widget-heading"
                                                    data-id="cba44ce"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->pincode }}</h5>
                                                        <input class="text-field zip_code_edit" type="text" id="zip_code_edit" name="pincode" value="{{ $user->pincode }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-647b37c e-flex e-con-boxed e-con e-child"
                                            data-id="647b37c"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-fa1ec7a elementor-widget elementor-widget-heading"
                                                    data-id="fa1ec7a"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">MOBILE</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-e51720f elementor-widget elementor-widget-heading"
                                                    data-id="e51720f"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->mobile }}</h5>
                                                        <input type="text" class="text-field phone_edit" id="phone_edit" name="mobile" pattern="^0\d{10}$" value="{{ $user->mobile }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-4ad3441 e-flex e-con-boxed e-con e-child"
                                            data-id="4ad3441"
                                            data-element_type="container"
                                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-3739a7b elementor-widget elementor-widget-heading"
                                                    data-id="3739a7b"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h6 class="elementor-heading-title elementor-size-default">EMAIL</h6>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-7bd22e0 elementor-widget elementor-widget-heading"
                                                    data-id="7bd22e0"
                                                    data-element_type="widget"
                                                    data-widget_type="heading.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <h5 class="elementor-heading-title elementor-size-default">{{ $user->email }}</h5>
                                                        <input class="text-field email_edit" type="email" id="email_edit" name="email_edit" value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div
                                            class="elementor-element elementor-element-1765a07 tablet-grid-col-1 elementor-mobile-align-center elementor-widget elementor-widget-button"
                                            data-id="1765a07"
                                            data-element_type="widget"
                                            data-widget_type="button.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                    <a id="edit_info" class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Edit information</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="elementor-element elementor-element-1765a09 tablet-hide elementor-mobile-align-center elementor-widget elementor-widget-button"
                                            data-id="1765a09"
                                            data-element_type="widget"
                                            data-widget_type="button.default"
                                        >
                                            
                                        </div>

                                        <div
                                            class="elementor-element elementor-element-1765a07 mobile-grid-col-1 elementor-mobile-align-center elementor-widget elementor-widget-button"
                                            data-id="1765a07"
                                            data-element_type="widget"
                                            data-widget_type="button.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper text-align-right save_button text-align-center-mobile">
                                                    <button id="save_info" type="submit" class="elementor-button elementor-button-link elementor-size-sm">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">Save changes</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection