{{-- This page is accessed from My Account tab in the dropdown menu in the header (in front/layout/header.blade.php). Check userAccount() method in Front/UserController.php --}} 
@extends('front.layout.layout')


@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="843"
    class="elementor elementor-843"
    data-elementor-post-type="page"
>
    <div
        class="elementor-element elementor-element-a808a63 e-flex e-con-boxed e-con e-parent"
        data-id="a808a63"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-9042c63 e-con-full e-flex e-con e-child"
                data-id="9042c63"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-f5f7679 elementor-widget__width-inherit elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="f5f7679"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">MY ACCOUNT</h1>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-7e92083 e-flex e-con-boxed e-con e-child"
                    data-id="7e92083"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-7d962be e-con-full e-flex e-con e-child"
                            data-id="7d962be"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-0b40ac1 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="0b40ac1"
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
                            class="elementor-element elementor-element-bc5a439 e-con-full e-flex e-con e-child"
                            data-id="bc5a439"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-cdff04f e-flex e-con-boxed e-con e-child"
                                data-id="cdff04f"
                                data-element_type="container"
                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                            >
                                <div class="e-con-inner">
                                    <div
                                        class="elementor-element elementor-element-35d4b08 e-flex e-con-boxed e-con e-child"
                                        data-id="35d4b08"
                                        data-element_type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                    >
                                        <div class="e-con-inner">
                                            <div
                                                class="elementor-element elementor-element-98b638c elementor-widget elementor-widget-heading"
                                                data-id="98b638c"
                                                data-element_type="widget"
                                                data-widget_type="heading.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <h6 class="elementor-heading-title elementor-size-default">ORDER ID:  &nbsp;
                                                        <span style="font-size: 26px; color: black;">002</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-204e225 elementor-widget elementor-widget-heading"
                                                data-id="204e225"
                                                data-element_type="widget"
                                                data-widget_type="heading.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <h6 class="elementor-heading-title elementor-size-default">STATUS:  &nbsp;
                                                        <span style="font-size:15px; color: black;">ON ITS WAY</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-8eb326b e-con-full e-flex e-con e-child"
                                                data-id="8eb326b"
                                                data-element_type="container"
                                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                            >
                                                <div
                                                    class="elementor-element elementor-element-29bf9f8 e-con-full e-flex e-con e-child"
                                                    data-id="29bf9f8"
                                                    data-element_type="container"
                                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-0e45477 elementor-widget elementor-widget-image"
                                                        data-id="0e45477"
                                                        data-element_type="widget"
                                                        data-widget_type="image.default"
                                                    >
                                                        <div class="elementor-widget-container">
                                                            <img
                                                                fetchpriority="high"
                                                                decoding="async"
                                                                width="800"
                                                                height="968"
                                                                src="./images/2023-12-features-for-Accounting-Software-1-846x1024.png"
                                                                class="attachment-large size-large wp-image-422"
                                                                alt=""
                                                                srcset="./images/2023-12-features-for-Accounting-Software-1-846x1024.png 846w, ./images/2023-12-features-for-Accounting-Software-1-248x300.png 248w, ./images/2023-12-features-for-Accounting-Software-1-768x930.png 768w, ./images/2023-12-features-for-Accounting-Software-1.png 879w"
                                                                sizes="(max-width: 800px) 100vw, 800px"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-381647d e-con-full e-flex e-con e-child"
                                                    data-id="381647d"
                                                    data-element_type="container"
                                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-eedc1b6 e-con-full e-flex e-con e-child"
                                                        data-id="eedc1b6"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-807f510 elementor-widget elementor-widget-heading"
                                                            data-id="807f510"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h6 class="elementor-heading-title elementor-size-default">ELECTRONICS</h6>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="elementor-element elementor-element-fca610d elementor-widget elementor-widget-heading"
                                                            data-id="fca610d"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">Kreyon SOFTWARE</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-0441394 e-con-full e-flex e-con e-child"
                                                        data-id="0441394"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-5a93cd1 elementor-widget elementor-widget-heading"
                                                            data-id="5a93cd1"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">1 x
                                                                    <b>₱599.99</b>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-ef36158 e-con-full e-flex e-con e-child"
                                                data-id="ef36158"
                                                data-element_type="container"
                                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                            >
                                                <div
                                                    class="elementor-element elementor-element-2c34f3f e-con-full e-flex e-con e-child"
                                                    data-id="2c34f3f"
                                                    data-element_type="container"
                                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-60656d4 elementor-widget elementor-widget-image"
                                                        data-id="60656d4"
                                                        data-element_type="widget"
                                                        data-widget_type="image.default"
                                                    >
                                                        <div class="elementor-widget-container">
                                                            <img
                                                                fetchpriority="high"
                                                                decoding="async"
                                                                width="800"
                                                                height="968"
                                                                src="./images/2023-12-features-for-Accounting-Software-1-846x1024.png"
                                                                class="attachment-large size-large wp-image-422"
                                                                alt=""
                                                                srcset="./images/2023-12-features-for-Accounting-Software-1-846x1024.png 846w, ./images/2023-12-features-for-Accounting-Software-1-248x300.png 248w, ./images/2023-12-features-for-Accounting-Software-1-768x930.png 768w, ./images/2023-12-features-for-Accounting-Software-1.png 879w"
                                                                sizes="(max-width: 800px) 100vw, 800px"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-be1ae3e e-con-full e-flex e-con e-child"
                                                    data-id="be1ae3e"
                                                    data-element_type="container"
                                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-97bb609 e-con-full e-flex e-con e-child"
                                                        data-id="97bb609"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-8289c15 elementor-widget elementor-widget-heading"
                                                            data-id="8289c15"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h6 class="elementor-heading-title elementor-size-default">ELECTRONICS</h6>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="elementor-element elementor-element-c16a9ba elementor-widget elementor-widget-heading"
                                                            data-id="c16a9ba"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">Kreyon SOFTWARE</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-a6f9035 e-con-full e-flex e-con e-child"
                                                        data-id="a6f9035"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-ff08cc4 elementor-widget elementor-widget-heading"
                                                            data-id="ff08cc4"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">1 x
                                                                    <b>₱599.99</b>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-10d4b50 e-flex e-con-boxed e-con e-child"
                                                data-id="10d4b50"
                                                data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                            >
                                                <div class="e-con-inner">
                                                    <div
                                                        class="elementor-element elementor-element-e62d433 elementor-widget elementor-widget-text-editor"
                                                        data-id="e62d433"
                                                        data-element_type="widget"
                                                        data-widget_type="text-editor.default"
                                                    >
                                                        <div class="elementor-widget-container">
                                                            <style>/*! elementor - v3.18.0 - 08-12-2023 */ .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>
                                                            <p>Placed on
                                                                <strong>January 4, 2024 at 9:04</strong>
                                                                <br>Payment Method
                                                                <strong>Debit via Paymongo
                                                                    <br>
                                                                </strong>Shipping Method&nbsp;
                                                                <strong>Metro Manila 3-7 business days</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-d8675f7 e-flex e-con-boxed e-con e-child"
                                                        data-id="d8675f7"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-f2ae024 elementor-widget elementor-widget-text-editor"
                                                                data-id="f2ae024"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Subtotal</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-c1905dc elementor-widget elementor-widget-text-editor"
                                                                data-id="c1905dc"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱ 1,199.99</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-9d06d34 e-flex e-con-boxed e-con e-child"
                                                        data-id="9d06d34"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-05e2ccf elementor-widget elementor-widget-text-editor"
                                                                data-id="05e2ccf"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Tax (8.0%)</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-c0b0f0b elementor-widget elementor-widget-text-editor"
                                                                data-id="c0b0f0b"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱ 123.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-242615c e-flex e-con-boxed e-con e-child"
                                                        data-id="242615c"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-7bf30f6 elementor-widget elementor-widget-text-editor"
                                                                data-id="7bf30f6"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Shipping Fee</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-493bb62 elementor-widget elementor-widget-text-editor"
                                                                data-id="493bb62"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱ 99.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-f053d19 e-flex e-con-boxed e-con e-child"
                                                        data-id="f053d19"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-128e2e3 elementor-widget elementor-widget-text-editor"
                                                                data-id="128e2e3"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Total</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-dd85fe7 elementor-widget elementor-widget-text-editor"
                                                                data-id="dd85fe7"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱2,331.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-element elementor-element-9344ff2 e-flex e-con-boxed e-con e-child"
                                        data-id="9344ff2"
                                        data-element_type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                    >
                                        <div class="e-con-inner">
                                            <div
                                                class="elementor-element elementor-element-f457259 elementor-widget elementor-widget-heading"
                                                data-id="f457259"
                                                data-element_type="widget"
                                                data-widget_type="heading.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <h6 class="elementor-heading-title elementor-size-default">ORDER ID:  &nbsp;
                                                        <span style="font-size: 26px; color: black;">001​</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-a61972a elementor-widget elementor-widget-heading"
                                                data-id="a61972a"
                                                data-element_type="widget"
                                                data-widget_type="heading.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <h6 class="elementor-heading-title elementor-size-default">STATUS:  &nbsp;
                                                        <span style="font-size: 15px; color: black;">COMPLETED</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-958a31e e-con-full e-flex e-con e-child"
                                                data-id="958a31e"
                                                data-element_type="container"
                                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                            >
                                                <div
                                                    class="elementor-element elementor-element-c298c94 e-con-full e-flex e-con e-child"
                                                    data-id="c298c94"
                                                    data-element_type="container"
                                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-8fec39b elementor-widget elementor-widget-image"
                                                        data-id="8fec39b"
                                                        data-element_type="widget"
                                                        data-widget_type="image.default"
                                                    >
                                                        <div class="elementor-widget-container">
                                                            <img
                                                                fetchpriority="high"
                                                                decoding="async"
                                                                width="800"
                                                                height="968"
                                                                src="./images/2023-12-features-for-Accounting-Software-1-846x1024.png"
                                                                class="attachment-large size-large wp-image-422"
                                                                alt=""
                                                                srcset="./images/2023-12-features-for-Accounting-Software-1-846x1024.png 846w, ./images/2023-12-features-for-Accounting-Software-1-248x300.png 248w, ./images/2023-12-features-for-Accounting-Software-1-768x930.png 768w, ./images/2023-12-features-for-Accounting-Software-1.png 879w"
                                                                sizes="(max-width: 800px) 100vw, 800px"
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-96bb8db e-con-full e-flex e-con e-child"
                                                    data-id="96bb8db"
                                                    data-element_type="container"
                                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                >
                                                    <div
                                                        class="elementor-element elementor-element-3d675a4 e-con-full e-flex e-con e-child"
                                                        data-id="3d675a4"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-505857f elementor-widget elementor-widget-heading"
                                                            data-id="505857f"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h6 class="elementor-heading-title elementor-size-default">ELECTRONICS</h6>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="elementor-element elementor-element-808d4bd elementor-widget elementor-widget-heading"
                                                            data-id="808d4bd"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">Kreyon SOFTWARE</h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-03a8e1a e-con-full e-flex e-con e-child"
                                                        data-id="03a8e1a"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-094ee91 elementor-widget elementor-widget-heading"
                                                            data-id="094ee91"
                                                            data-element_type="widget"
                                                            data-widget_type="heading.default"
                                                        >
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">1 x
                                                                    <b>₱599.99</b>
                                                                </h2>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-f0891eb e-flex e-con-boxed e-con e-child"
                                                data-id="f0891eb"
                                                data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                            >
                                                <div class="e-con-inner">
                                                    <div
                                                        class="elementor-element elementor-element-6250c06 elementor-widget elementor-widget-text-editor"
                                                        data-id="6250c06"
                                                        data-element_type="widget"
                                                        data-widget_type="text-editor.default"
                                                    >
                                                        <div class="elementor-widget-container">
                                                            <p>Placed on
                                                                <strong>January 4, 2024 at 9:04</strong>
                                                                <br>Payment Method
                                                                <strong>Debit via Paymongo
                                                                    <br>
                                                                </strong>Shipping Method
                                                                <strong>Outside Metro Manila 5-9 business days</strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-e203980 e-flex e-con-boxed e-con e-child"
                                                        data-id="e203980"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-0f2e57f elementor-widget elementor-widget-text-editor"
                                                                data-id="0f2e57f"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Subtotal</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-75f3293 elementor-widget elementor-widget-text-editor"
                                                                data-id="75f3293"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱ 1,199.99</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-6ea91c2 e-flex e-con-boxed e-con e-child"
                                                        data-id="6ea91c2"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-901d3f1 elementor-widget elementor-widget-text-editor"
                                                                data-id="901d3f1"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Tax (8.0%)</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-350db39 elementor-widget elementor-widget-text-editor"
                                                                data-id="350db39"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱ 123.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="elementor-element elementor-element-3310012 e-flex e-con-boxed e-con e-child"
                                                        data-id="3310012"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-9a4b6f3 elementor-widget elementor-widget-text-editor"
                                                                data-id="9a4b6f3"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>Total</p>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="elementor-element elementor-element-35fb713 elementor-widget elementor-widget-text-editor"
                                                                data-id="35fb713"
                                                                data-element_type="widget"
                                                                data-widget_type="text-editor.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <p>₱2,232.00</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="elementor-element elementor-element-c7b7623 e-con-full e-flex elementor-invisible e-con e-child"
                                data-id="c7b7623"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-fb31ee5 elementor-align-left elementor-widget elementor-widget-button"
                                    data-id="fb31ee5"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-size-sm" role="button">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">1</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-59d4cac elementor-align-left elementor-widget elementor-widget-button"
                                    data-id="59d4cac"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">2</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-4bb859d elementor-align-left elementor-widget elementor-widget-button"
                                    data-id="4bb859d"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">3</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-79136ad elementor-align-left elementor-widget elementor-widget-button"
                                    data-id="79136ad"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-size-sm" role="button">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">...</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-2f9dc83 elementor-align-left elementor-widget elementor-widget-button"
                                    data-id="2f9dc83"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">24</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-4cdd8a3 elementor-align-left elementor-widget elementor-widget-button"
                                    data-id="4cdd8a3"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-icon elementor-align-icon-left">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-fas-angle-right"
                                                            viewbox="0 0 256 512"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-button-text"></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
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