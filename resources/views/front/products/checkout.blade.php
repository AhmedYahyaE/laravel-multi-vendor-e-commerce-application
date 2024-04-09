{{-- This page is rendered by orders() method inside Front/OrderController.php (depending on if the order id Optional Parameter (slug) is passed in or not) --}}
@extends('front.layout.layout')


@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="992"
    class="elementor elementor-992"
    data-elementor-post-type="page"
>
    <div
        class="elementor-element elementor-element-5a04e41 e-flex e-con-boxed e-con e-parent"
        data-id="5a04e41"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner">
            <div
                id="checkout-details-container"
                class="elementor-element elementor-element-7a52fdc e-con-full e-flex e-con e-child"
                data-id="7a52fdc"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-6760428 elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="6760428"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">CHECKOUT</h1>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-bbcb354 elementor-widget elementor-widget-button"
                    data-id="bbcb354"
                    data-element_type="widget"
                    data-widget_type="button.default"
                >
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ url('/cart') }}">
                                <span class="elementor-button-content-wrapper">
                                    <span class="elementor-button-icon elementor-align-icon-left">
                                        <svg
                                            aria-hidden="true"
                                            class="e-font-icon-svg e-fas-arrow-left"
                                            viewbox="0 0 448 512"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path d="M257.5 445.1l-22.2 22.2c-9.4 9.4-24.6 9.4-33.9 0L7 273c-9.4-9.4-9.4-24.6 0-33.9L201.4 44.7c9.4-9.4 24.6-9.4 33.9 0l22.2 22.2c9.5 9.5 9.3 25-.4 34.3L136.6 216H424c13.3 0 24 10.7 24 24v32c0 13.3-10.7 24-24 24H136.6l120.5 114.8c9.8 9.3 10 24.8.4 34.3z"></path>
                                        </svg>
                                    </span>
                                    <span class="elementor-button-text">View cart</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-831ec76 e-flex e-con-boxed e-con e-child"
                    data-id="831ec76"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-30ff520 e-flex e-con-boxed e-con e-child"
                            data-id="30ff520"
                            data-element_type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-4d22d4f elementor-widget elementor-widget-heading"
                                    data-id="4d22d4f"
                                    data-element_type="widget"
                                    data-widget_type="heading.default"
                                >
                                    <div class="elementor-widget-container">
                                        <h6 class="elementor-heading-title elementor-size-default">SHIP TO</h6>
                                    </div>
                                </div>
                                <div
                                    class="checkout-form elementor-element elementor-element-4605a74 elementor-widget elementor-widget-html"
                                    data-id="4605a74"
                                    data-element_type="widget"
                                    data-widget_type="html.default"
                                >
                                    <div id="checkout-user-preferred-addresses" class="elementor-widget-container">
                                        @foreach ($deliveryAddresses as $deliveryAddress_key => $deliveryAddress)
                                        <div class="addressess">
                                            <input
                                                {{$deliveryAddress_key == 0 ? "checked":""}}
                                                type="radio"
                                                class="address"
                                                name="preferred_address-{{$deliveryAddress['user_id']}}"
                                                value="{{$deliveryAddress['id']}}"
                                            >
                                            <label for="html">
                                                <b>{{$deliveryAddress['address']}}, {{$deliveryAddress['city']}}, {{$deliveryAddress['state']}}, {{$deliveryAddress['country']}}
                                                    <br>{{$deliveryAddress['mobile']}}
                                                </b>
                                            </label>
                                            <a href="#" class="address_edit_checkout editAddress" data-addressid="{{$deliveryAddress['id']}}">Edit</a>
                                            <a href="#">Remove</a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- edit delivery address section -->
                                @include('front.products.delivery_addresses')
                                <!-- add new delivery address section -->
                                @include('front.products.new_delivery_address')
                                <div
                                    class="elementor-element elementor-element-79e7f6d elementor-widget elementor-widget-heading"
                                    data-id="79e7f6d"
                                    data-element_type="widget"
                                    data-widget_type="heading.default"
                                >
                                    <div class="elementor-widget-container">
                                        <h6 class="elementor-heading-title elementor-size-default">PAYMENT METHOD</h6>
                                    </div>
                                </div>
                                <div
                                    class="checkout-form elementor-element elementor-element-52dbad4 elementor-widget elementor-widget-html"
                                    data-id="52dbad4"
                                    data-element_type="widget"
                                    data-widget_type="html.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="payment-gateway">
                                            <input
                                                checked
                                                type="radio"
                                                id="COD"
                                                name="paymentgateway"
                                                value="COD"
                                            >
                                            <label for="html">
                                                <b>COD</b>
                                            </label>
                                        </div>
                                        <div class="payment-gateway">
                                            <input
                                                type="radio"
                                                id="paymongo"
                                                name="paymentgateway"
                                                value="paymongo"
                                            >
                                            <label for="html">
                                                <b>Secure Payment via PayMongo</b>
                                            </label>
                                        </div>
                                        <div class="payment-gateway">
                                            <input
                                                type="radio"
                                                id=""
                                                name="paymentgateway"
                                                value="xendit"
                                            >
                                            <label for="html">  Payments By Xendit</label>
                                        </div>
                                        <div class="payment-gateway">
                                            <input
                                                type="radio"
                                                id=""
                                                name="paymentgateway"
                                                value="atomepaylater"
                                            >
                                            <label for="html">Atome PayLater - 3 easy payments, 0% interest</label>
                                        </div>
                                        <div class="payment-gateway">
                                            <input
                                                type="radio"
                                                id=""
                                                name="paymentgateway"
                                                value="bankdeposit"
                                            >
                                            <label for="html">Bank Deposit</label>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-e2935f5 e-flex e-con-boxed e-con e-child"
                                    data-id="e2935f5"
                                    data-element_type="container"
                                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-3aabf85 elementor-widget__width-inherit elementor-widget-mobile__width-inherit elementor-hidden-mobile elementor-widget elementor-widget-button"
                                            data-id="3aabf85"
                                            data-element_type="widget"
                                            data-widget_type="button.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <div class="elementor-button-wrapper">
                                                    <button id="checkout-submit-btn" class="elementor-button elementor-button-link elementor-size-sm" type="button">
                                                        <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-text">PAY NOW</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-c8a9d24 e-flex e-con-boxed e-con e-child"
                            data-id="c8a9d24"
                            data-element_type="container"
                            data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-9827c6f elementor-widget elementor-widget-heading"
                                    data-id="9827c6f"
                                    data-element_type="widget"
                                    data-widget_type="heading.default"
                                >
                                    <div class="elementor-widget-container">
                                        <h6 class="elementor-heading-title elementor-size-default">YOUR ORDER</h6>
                                    </div>
                                </div>
                                @foreach ($getCartItems as $item)
                                @php
                                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                                @endphp
                                <div
                                    class="elementor-element elementor-element-35df199 e-flex e-con-boxed e-con e-child"
                                    data-id="35df199"
                                    data-element_type="container"
                                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-825f4dd e-con-full e-flex e-con e-child"
                                            data-id="825f4dd"
                                            data-element_type="container"
                                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                        >
                                            <div
                                                class="elementor-element elementor-element-d9f74cd elementor-widget elementor-widget-image"
                                                data-id="d9f74cd"
                                                data-element_type="widget"
                                                data-widget_type="image.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <img
                                                        fetchpriority="high"
                                                        decoding="async"
                                                        width="800"
                                                        height="968"
                                                        src="{{ asset('front/images/product_images/small/' .$item['product']['product_image']) }}"
                                                        class="attachment-large size-large wp-image-422"
                                                        alt=""
                                                        srcset="{{ asset('front/images/product_images/small/'.$item['product']['product_image']) }} 846w, {{asset('front/images/product_images/small/'.$item['product']['product_image'])}} 248w, {{asset('front/images/product_images/small/'.$item['product']['product_image'])}} 768w, {{asset('front/images/product_images/small/'.$item['product']['product_image'])}} 879w"
                                                        sizes="(max-width: 800px) 100vw, 800px"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-dc91550 e-con-full e-flex e-con e-child"
                                            data-id="dc91550"
                                            data-element_type="container"
                                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                        >
                                            <div
                                                class="elementor-element elementor-element-60145ec elementor-widget elementor-widget-heading"
                                                data-id="60145ec"
                                                data-element_type="widget"
                                                data-widget_type="heading.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <h6 class="elementor-heading-title elementor-size-default">{{ $item['product']['product_name'] }}</h6>
                                                </div>
                                            </div>
                                            <div
                                                class="elementor-element elementor-element-626fc5b elementor-widget elementor-widget-text-editor"
                                                data-id="626fc5b"
                                                data-element_type="widget"
                                                data-widget_type="text-editor.default"
                                            >
                                                <div class="elementor-widget-container">
                                                    <p>
                                                        <strong>₱{{ $getDiscountAttributePrice['final_price'] }} x {{ $item['quantity'] }}
                                                            <br>
                                                        </strong>{{ $item['product']['meta_keywords'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-e3a5e3c e-flex e-con-boxed e-con e-child"
                                            data-id="e3a5e3c"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-434c9b8 elementor-widget elementor-widget-text-editor"
                                                    data-id="434c9b8"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>₱{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div
                                    class="elementor-element elementor-element-a05a04e elementor-widget elementor-widget-html"
                                    data-id="a05a04e"
                                    data-element_type="widget"
                                    data-widget_type="html.default"
                                >
                                    <div class="elementor-widget-container">
                                        <table>
                                            <tr>
                                                <td>Shipping Fee</td>
                                                <td class="align-right">₱499.00</td>
                                            </tr>
                                            <tr>
                                                <td>Sub total</td>
                                                <td class="align-right">₱{{$sub_total}}</td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Coupon discount</td>
                                                <td class="align-right">₱150.00</td>
                                            </tr> -->
                                            <tr>
                                                <td>Delivery Fee</td>
                                                <td class="align-right">₱ {{number_format($delivery_fee, 2)}}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top: 40px">
                                                    <b>GRAND TOTAL</b>
                                                </td>
                                                <td class="align-right" style="padding-top: 40px">
                                                    <b>₱{{$total_price}}</b>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-00d6840 elementor-widget__width-inherit elementor-widget-mobile__width-inherit elementor-hidden-desktop elementor-hidden-tablet elementor-widget elementor-widget-button"
                                    data-id="00d6840"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">PAY NOW</span>
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

<script>
    var LALAMOVE = @json(config('app.lalamove'))
</script>