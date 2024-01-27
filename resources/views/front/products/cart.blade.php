{{-- This page is rendered by orders() method inside Front/OrderController.php (depending on if the order id Optional Parameter (slug) is passed in or not) --}}


@extends('front.layout.layout')



@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="896"
    class="elementor elementor-896"
    data-elementor-post-type="page"
>
    <div
        class="elementor-element elementor-element-5992232 e-flex e-con-boxed e-con e-parent"
        data-id="5992232"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-4bfdb6c e-con-full e-flex e-con e-child"
                data-id="4bfdb6c"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-0a0e423 elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="0a0e423"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">Your Cart</h1>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-dfa69c4 elementor-widget elementor-widget-button"
                    data-id="dfa69c4"
                    data-element_type="widget"
                    data-widget_type="button.default"
                >
                    <div class="elementor-widget-container">
                        <div class="elementor-button-wrapper">
                            <a class="elementor-button elementor-button-link elementor-size-sm" href="{{ url('') }}">
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
                                    <span class="elementor-button-text">Continue Shopping</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-4b6f841 login-container e-flex e-con-boxed elementor-invisible e-con e-child"
                    data-id="4b6f841"
                    data-element_type="container"
                    data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-82cde54 elementor-widget elementor-widget-html"
                            data-id="82cde54"
                            data-element_type="widget"
                            data-widget_type="html.default"
                        >
                            <div class="elementor-widget-container">
                                <div style="width: 100%; overflow: auto;">
                                    <table width="100%">
                                        <thead>
                                            <tr>
                                                <th>PRODUCT</th>
                                                <th>QUANTITY</th>
                                                <th class="align-right">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- We'll place this $total_price inside the foreach loop to calculate the total price of all products in Cart. Check the end of the next foreach loop before @endforeach --}}
                                            @php $total_price = 0 @endphp

                                            @if (count($getCartItems) == 0)
                                                <tr>
                                                    <td colspan="3">No Cart Items.</td>
                                                </tr>
                                            @else
                                            @foreach ($getCartItems as $item)
                                            @php
                                                $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']); // from the `products_attributes` table, not the `products` table
                                                // dd($getDiscountAttributePrice);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="prod-cart">
                                                        <div class="cart-img">
                                                            <img decoding="async" class="prod-img" src="./images/2023-12-features-for-Accounting-Software-1.png">
                                                        </div>
                                                        <div class="cart-prod-desc">
                                                            <h4>{{ $item['product']['product_name'] }} ({{ $item['product']['product_code'] }}) - {{ $item['size'] }}</h4>
                                                            @if ($getDiscountAttributePrice['discount'] > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
                                                                <div class="price-template">
                                                                    <div class="item-new-price">
                                                                        {{ $getDiscountAttributePrice['final_price'] }}
                                                                    </div>
                                                                    <div class="item-old-price">
                                                                        {{ $getDiscountAttributePrice['product_price'] }}
                                                                    </div>
                                                                </div>
                                                            @else {{-- if there's no discount on the price, show the original price --}}
                                                                <div class="price-template">
                                                                    <div class="item-new-price">
                                                                        {{ $getDiscountAttributePrice['final_price'] }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <p class="other-info">{{ $item['product']['meta_keywords'] }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="qty-and-remove">
                                                        <div class="quantity-div">
                                                            <button class="qty-cart minus">-</button>
                                                            <input type="number" value="{{ $item['quantity'] }}">
                                                            <button class="qty-cart add">+</button>
                                                        </div>
                                                        <a href="#" class="remove-item">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-far-trash-alt"
                                                                viewbox="0 0 448 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="align-right">
                                                    <div class="cart-price">
                                                        <div class="price-template">
                                                            <div class="item-new-price">
                                                                {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- This is placed here INSIDE the foreach loop to calculate the total price of all products in Cart --}}
                                            @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                            @endforeach 
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <style></style>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-f6febfc elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                            data-id="f6febfc"
                            data-element_type="widget"
                            data-widget_type="divider.default"
                        >
                            <div class="elementor-widget-container">
                                <style>/*! elementor - v3.18.0 - 08-12-2023 */ .elementor-widget-divider{--divider-border-style:none;--divider-border-width:1px;--divider-color:#0c0d0e;--divider-icon-size:20px;--divider-element-spacing:10px;--divider-pattern-height:24px;--divider-pattern-size:20px;--divider-pattern-url:none;--divider-pattern-repeat:repeat-x}.elementor-widget-divider .elementor-divider{display:flex}.elementor-widget-divider .elementor-divider__text{font-size:15px;line-height:1;max-width:95%}.elementor-widget-divider .elementor-divider__element{margin:0 var(--divider-element-spacing);flex-shrink:0}.elementor-widget-divider .elementor-icon{font-size:var(--divider-icon-size)}.elementor-widget-divider .elementor-divider-separator{display:flex;margin:0;direction:ltr}.elementor-widget-divider--view-line_icon .elementor-divider-separator,.elementor-widget-divider--view-line_text .elementor-divider-separator{align-items:center}.elementor-widget-divider--view-line_icon .elementor-divider-separator:after,.elementor-widget-divider--view-line_icon .elementor-divider-separator:before,.elementor-widget-divider--view-line_text .elementor-divider-separator:after,.elementor-widget-divider--view-line_text .elementor-divider-separator:before{display:block;content:"";border-bottom:0;flex-grow:1;border-top:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--element-align-left .elementor-divider .elementor-divider-separator>.elementor-divider__svg:first-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-left .elementor-divider-separator:before{content:none}.elementor-widget-divider--element-align-left .elementor-divider__element{margin-left:0}.elementor-widget-divider--element-align-right .elementor-divider .elementor-divider-separator>.elementor-divider__svg:last-of-type{flex-grow:0;flex-shrink:100}.elementor-widget-divider--element-align-right .elementor-divider-separator:after{content:none}.elementor-widget-divider--element-align-right .elementor-divider__element{margin-right:0}.elementor-widget-divider:not(.elementor-widget-divider--view-line_text):not(.elementor-widget-divider--view-line_icon) .elementor-divider-separator{border-top:var(--divider-border-width) var(--divider-border-style) var(--divider-color)}.elementor-widget-divider--separator-type-pattern{--divider-border-style:none}.elementor-widget-divider--separator-type-pattern.elementor-widget-divider--view-line .elementor-divider-separator,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:after,.elementor-widget-divider--separator-type-pattern:not(.elementor-widget-divider--view-line) .elementor-divider-separator:before,.elementor-widget-divider--separator-type-pattern:not([class*=elementor-widget-divider--view]) .elementor-divider-separator{width:100%;min-height:var(--divider-pattern-height);-webkit-mask-size:var(--divider-pattern-size) 100%;mask-size:var(--divider-pattern-size) 100%;-webkit-mask-repeat:var(--divider-pattern-repeat);mask-repeat:var(--divider-pattern-repeat);background-color:var(--divider-color);-webkit-mask-image:var(--divider-pattern-url);mask-image:var(--divider-pattern-url)}.elementor-widget-divider--no-spacing{--divider-pattern-size:auto}.elementor-widget-divider--bg-round{--divider-pattern-repeat:round}.rtl .elementor-widget-divider .elementor-divider__text{direction:rtl}.e-con-inner>.elementor-widget-divider,.e-con>.elementor-widget-divider{width:var(--container-widget-width,100%);--flex-grow:var(--container-widget-flex-grow)}</style>
                                <div class="elementor-divider">
                                    <span class="elementor-divider-separator"></span>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-253bd4b e-flex e-con-boxed e-con e-child"
                            data-id="253bd4b"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-dba116a e-flex e-con-boxed e-con e-child"
                                    data-id="dba116a"
                                    data-element_type="container"
                                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-2d2e5dc elementor-widget__width-inherit elementor-button-align-stretch elementor-widget elementor-widget-form"
                                            data-id="2d2e5dc"
                                            data-element_type="widget"
                                            data-settings="{&quot;button_width&quot;:&quot;30&quot;,&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                                            data-widget_type="form.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <style>/*! elementor-pro - v3.18.0 - 06-12-2023 */ .elementor-button.elementor-hidden,.elementor-hidden{display:none}.e-form__step{width:100%}.e-form__step:not(.elementor-hidden){display:flex;flex-wrap:wrap}.e-form__buttons{flex-wrap:wrap}.e-form__buttons,.e-form__buttons__wrapper{display:flex}.e-form__indicators{display:flex;justify-content:space-between;align-items:center;flex-wrap:nowrap;font-size:13px;margin-bottom:var(--e-form-steps-indicators-spacing)}.e-form__indicators__indicator{display:flex;flex-direction:column;align-items:center;justify-content:center;flex-basis:0;padding:0 var(--e-form-steps-divider-gap)}.e-form__indicators__indicator__progress{width:100%;position:relative;background-color:var(--e-form-steps-indicator-progress-background-color);border-radius:var(--e-form-steps-indicator-progress-border-radius);overflow:hidden}.e-form__indicators__indicator__progress__meter{width:var(--e-form-steps-indicator-progress-meter-width,0);height:var(--e-form-steps-indicator-progress-height);line-height:var(--e-form-steps-indicator-progress-height);padding-right:15px;border-radius:var(--e-form-steps-indicator-progress-border-radius);background-color:var(--e-form-steps-indicator-progress-color);color:var(--e-form-steps-indicator-progress-meter-color);text-align:right;transition:width .1s linear}.e-form__indicators__indicator:first-child{padding-left:0}.e-form__indicators__indicator:last-child{padding-right:0}.e-form__indicators__indicator--state-inactive{color:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-inactive-secondary-color,#fff)}.e-form__indicators__indicator--state-inactive object,.e-form__indicators__indicator--state-inactive svg{fill:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-active{color:var(--e-form-steps-indicator-active-primary-color,#39b54a);border-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active object,.e-form__indicators__indicator--state-active svg{fill:var(--e-form-steps-indicator-active-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed{color:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a);background-color:initial}.e-form__indicators__indicator--state-completed object,.e-form__indicators__indicator--state-completed svg{fill:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator__icon{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);font-size:var(--e-form-steps-indicator-icon-size);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;overflow:hidden;margin-bottom:10px}.e-form__indicators__indicator__icon img,.e-form__indicators__indicator__icon object,.e-form__indicators__indicator__icon svg{width:var(--e-form-steps-indicator-icon-size);height:auto}.e-form__indicators__indicator__icon .e-font-icon-svg{height:1em}.e-form__indicators__indicator__number{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;margin-bottom:10px}.e-form__indicators__indicator--shape-circle{border-radius:50%}.e-form__indicators__indicator--shape-square{border-radius:0}.e-form__indicators__indicator--shape-rounded{border-radius:5px}.e-form__indicators__indicator--shape-none{border:0}.e-form__indicators__indicator__label{text-align:center}.e-form__indicators__indicator__separator{width:100%;height:var(--e-form-steps-divider-width);background-color:#babfc5}.e-form__indicators--type-icon,.e-form__indicators--type-icon_text,.e-form__indicators--type-number,.e-form__indicators--type-number_text{align-items:flex-start}.e-form__indicators--type-icon .e-form__indicators__indicator__separator,.e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,.e-form__indicators--type-number .e-form__indicators__indicator__separator,.e-form__indicators--type-number_text .e-form__indicators__indicator__separator{margin-top:calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)}.elementor-field-type-hidden{display:none}.elementor-field-type-html{display:inline-block}.elementor-field-type-tel input{direction:inherit}.elementor-login .elementor-lost-password,.elementor-login .elementor-remember-me{font-size:.85em}.elementor-field-type-recaptcha_v3 .elementor-field-label{display:none}.elementor-field-type-recaptcha_v3 .grecaptcha-badge{z-index:1}.elementor-button .elementor-form-spinner{order:3}.elementor-form .elementor-button>span{display:flex;justify-content:center;align-items:center}.elementor-form .elementor-button .elementor-button-text{white-space:normal;flex-grow:0}.elementor-form .elementor-button svg{height:auto}.elementor-form .elementor-button .e-font-icon-svg{height:1em}.elementor-select-wrapper .select-caret-down-wrapper{position:absolute;top:50%;transform:translateY(-50%);inset-inline-end:10px;pointer-events:none;font-size:11px}.elementor-select-wrapper .select-caret-down-wrapper svg{display:unset;width:1em;aspect-ratio:unset;fill:currentColor}.elementor-select-wrapper .select-caret-down-wrapper i{font-size:19px;line-height:2}.elementor-select-wrapper.remove-before:before{content:""!important}</style>
                                                <form class="elementor-form" method="post" name="COUPON CODE">
                                                    <input type="hidden" name="post_id" value="896">
                                                    <input type="hidden" name="form_id" value="2d2e5dc">
                                                    <input type="hidden" name="referer_title" value="Cart">
                                                    <input type="hidden" name="queried_id" value="896">
                                                    <div class="elementor-form-fields-wrapper elementor-labels-above">
                                                        <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-70 elementor-field-required">
                                                            <label for="form-field-name" class="elementor-field-label"> 								Enter your coupon code if you have one.</label>
                                                            <input
                                                                size="1"
                                                                type="text"
                                                                name="form_fields[name]"
                                                                id="form-field-name"
                                                                class="elementor-field elementor-size-sm  elementor-field-textual"
                                                                placeholder="Enter Coupon Code"
                                                                required="required"
                                                                aria-required="true"
                                                            >
                                                        </div>
                                                        <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-30 e-form__buttons">
                                                            <button type="submit" class="elementor-button elementor-size-sm">
                                                                <span>
                                                                    <span class="elementor-button-icon"></span>
                                                                    <span class="elementor-button-text">Apply Coupon</span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-5fb344f e-flex e-con-boxed e-con e-child"
                                            data-id="5fb344f"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-00e56ba elementor-widget-mobile__width-inherit elementor-widget elementor-widget-button"
                                                    data-id="00e56ba"
                                                    data-element_type="widget"
                                                    data-widget_type="button.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-text">Continue Shopping</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-8e3a800 elementor-widget-mobile__width-inherit elementor-widget elementor-widget-button"
                                                    data-id="8e3a800"
                                                    data-element_type="widget"
                                                    data-widget_type="button.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span class="elementor-button-text">Proceed to Checkout</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-2ff8c4e e-flex e-con-boxed e-con e-child"
                                    data-id="2ff8c4e"
                                    data-element_type="container"
                                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-e33e124 elementor-widget elementor-widget-html"
                                            data-id="e33e124"
                                            data-element_type="widget"
                                            data-widget_type="html.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <table>
                                                    <tr>
                                                        <th class="align-left" colspan="2">
                                                            <b>CART TOTALS</b>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub total</td>
                                                        <td>₱{{$total_price}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Coupon discount</td>
                                                        <td>₱150.00 PHP</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top: 40px">
                                                            <b>GRAND TOTAL</b>
                                                        </td>
                                                        <td style="padding-top: 40px">
                                                            <b>₱{{$total_price}}</b>
                                                        </td>
                                                    </tr>
                                                </table>
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
</div>
@endsection