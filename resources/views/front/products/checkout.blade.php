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
                                    class="elementor-element elementor-element-4605a74 elementor-widget elementor-widget-html"
                                    data-id="4605a74"
                                    data-element_type="widget"
                                    data-widget_type="html.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="addressess">
                                            <input
                                                checked
                                                type="radio"
                                                id="preferred_address"
                                                name="preferred_address"
                                                value="HTML"
                                            >
                                            <label for="html">
                                                <b>#407 Sesame Street, Bonga Menor, Bustos Bulacan 3007 PH
                                                    <br>(+63) 945 162 1033
                                                </b>
                                            </label>
                                            <a href="#">Edit</a>
                                            <a href="#">Remove</a>
                                        </div>
                                        <div class="addressess">
                                            <input
                                                type="radio"
                                                id="second-address"
                                                name="second-address"
                                                value="HTML"
                                            >
                                            <label for="html">#123 Burgos Street, Poblacion, San Jose Del Monte Bulacan 3022 PH
                                                <br>(+63) 945 321 5655
                                            </label>
                                            <a href="#">Edit</a>
                                            <a href="#">Remove</a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-010ca5e elementor-widget elementor-widget-heading"
                                    data-id="010ca5e"
                                    data-element_type="widget"
                                    data-widget_type="heading.default"
                                >
                                    <div class="elementor-widget-container">
                                        <h6 class="elementor-heading-title elementor-size-default">SHIP TO DIFFERENT ADDRESS</h6>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-4b9e609 add-address elementor-widget elementor-widget-button"
                                    data-id="4b9e609"
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
                                                            class="e-font-icon-svg e-fas-plus"
                                                            viewbox="0 0 448 512"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="elementor-button-text">Add different address</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-1f78c63 elementor-button-align-start add-address-form elementor-widget elementor-widget-form"
                                    data-id="1f78c63"
                                    data-element_type="widget"
                                    data-settings="{&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                                    data-widget_type="form.default"
                                >
                                    <div class="elementor-widget-container">
                                        <style>/*! elementor-pro - v3.18.0 - 06-12-2023 */ .elementor-button.elementor-hidden,.elementor-hidden{display:none}.e-form__step{width:100%}.e-form__step:not(.elementor-hidden){display:flex;flex-wrap:wrap}.e-form__buttons{flex-wrap:wrap}.e-form__buttons,.e-form__buttons__wrapper{display:flex}.e-form__indicators{display:flex;justify-content:space-between;align-items:center;flex-wrap:nowrap;font-size:13px;margin-bottom:var(--e-form-steps-indicators-spacing)}.e-form__indicators__indicator{display:flex;flex-direction:column;align-items:center;justify-content:center;flex-basis:0;padding:0 var(--e-form-steps-divider-gap)}.e-form__indicators__indicator__progress{width:100%;position:relative;background-color:var(--e-form-steps-indicator-progress-background-color);border-radius:var(--e-form-steps-indicator-progress-border-radius);overflow:hidden}.e-form__indicators__indicator__progress__meter{width:var(--e-form-steps-indicator-progress-meter-width,0);height:var(--e-form-steps-indicator-progress-height);line-height:var(--e-form-steps-indicator-progress-height);padding-right:15px;border-radius:var(--e-form-steps-indicator-progress-border-radius);background-color:var(--e-form-steps-indicator-progress-color);color:var(--e-form-steps-indicator-progress-meter-color);text-align:right;transition:width .1s linear}.e-form__indicators__indicator:first-child{padding-left:0}.e-form__indicators__indicator:last-child{padding-right:0}.e-form__indicators__indicator--state-inactive{color:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-inactive-secondary-color,#fff)}.e-form__indicators__indicator--state-inactive object,.e-form__indicators__indicator--state-inactive svg{fill:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-active{color:var(--e-form-steps-indicator-active-primary-color,#39b54a);border-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active object,.e-form__indicators__indicator--state-active svg{fill:var(--e-form-steps-indicator-active-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed{color:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a);background-color:initial}.e-form__indicators__indicator--state-completed object,.e-form__indicators__indicator--state-completed svg{fill:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator__icon{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);font-size:var(--e-form-steps-indicator-icon-size);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;overflow:hidden;margin-bottom:10px}.e-form__indicators__indicator__icon img,.e-form__indicators__indicator__icon object,.e-form__indicators__indicator__icon svg{width:var(--e-form-steps-indicator-icon-size);height:auto}.e-form__indicators__indicator__icon .e-font-icon-svg{height:1em}.e-form__indicators__indicator__number{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;margin-bottom:10px}.e-form__indicators__indicator--shape-circle{border-radius:50%}.e-form__indicators__indicator--shape-square{border-radius:0}.e-form__indicators__indicator--shape-rounded{border-radius:5px}.e-form__indicators__indicator--shape-none{border:0}.e-form__indicators__indicator__label{text-align:center}.e-form__indicators__indicator__separator{width:100%;height:var(--e-form-steps-divider-width);background-color:#babfc5}.e-form__indicators--type-icon,.e-form__indicators--type-icon_text,.e-form__indicators--type-number,.e-form__indicators--type-number_text{align-items:flex-start}.e-form__indicators--type-icon .e-form__indicators__indicator__separator,.e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,.e-form__indicators--type-number .e-form__indicators__indicator__separator,.e-form__indicators--type-number_text .e-form__indicators__indicator__separator{margin-top:calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)}.elementor-field-type-hidden{display:none}.elementor-field-type-html{display:inline-block}.elementor-field-type-tel input{direction:inherit}.elementor-login .elementor-lost-password,.elementor-login .elementor-remember-me{font-size:.85em}.elementor-field-type-recaptcha_v3 .elementor-field-label{display:none}.elementor-field-type-recaptcha_v3 .grecaptcha-badge{z-index:1}.elementor-button .elementor-form-spinner{order:3}.elementor-form .elementor-button>span{display:flex;justify-content:center;align-items:center}.elementor-form .elementor-button .elementor-button-text{white-space:normal;flex-grow:0}.elementor-form .elementor-button svg{height:auto}.elementor-form .elementor-button .e-font-icon-svg{height:1em}.elementor-select-wrapper .select-caret-down-wrapper{position:absolute;top:50%;transform:translateY(-50%);inset-inline-end:10px;pointer-events:none;font-size:11px}.elementor-select-wrapper .select-caret-down-wrapper svg{display:unset;width:1em;aspect-ratio:unset;fill:currentColor}.elementor-select-wrapper .select-caret-down-wrapper i{font-size:19px;line-height:2}.elementor-select-wrapper.remove-before:before{content:""!important}</style>
                                        <form class="elementor-form" method="post" name="Add Address">
                                            <input type="hidden" name="post_id" value="992">
                                            <input type="hidden" name="form_id" value="1f78c63">
                                            <input type="hidden" name="referer_title" value="Checkout">
                                            <input type="hidden" name="queried_id" value="992">
                                            <div class="elementor-form-fields-wrapper elementor-labels-">
                                                <div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_f4dd461 elementor-col-50 elementor-field-required">
                                                    <label for="form-field-field_f4dd461" class="elementor-field-label elementor-screen-only"> 								First Name</label>
                                                    <input
                                                        size="1"
                                                        type="email"
                                                        name="form_fields[field_f4dd461]"
                                                        id="form-field-field_f4dd461"
                                                        class="elementor-field elementor-size-sm  elementor-field-textual"
                                                        placeholder="First Name"
                                                        required="required"
                                                        aria-required="true"
                                                    >
                                                </div>
                                                <div class="elementor-field-type-email elementor-field-group elementor-column elementor-field-group-field_11df834 elementor-col-50 elementor-field-required">
                                                    <label for="form-field-field_11df834" class="elementor-field-label elementor-screen-only"> 								Last Name</label>
                                                    <input
                                                        size="1"
                                                        type="email"
                                                        name="form_fields[field_11df834]"
                                                        id="form-field-field_11df834"
                                                        class="elementor-field elementor-size-sm  elementor-field-textual"
                                                        placeholder="Last Name"
                                                        required="required"
                                                        aria-required="true"
                                                    >
                                                </div>
                                                <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_db46221 elementor-col-100 elementor-field-required">
                                                    <label for="form-field-field_db46221" class="elementor-field-label elementor-screen-only"> 								Address 1</label>
                                                    <textarea
                                                        class="elementor-field-textual elementor-field  elementor-size-sm"
                                                        name="form_fields[field_db46221]"
                                                        id="form-field-field_db46221"
                                                        rows="2"
                                                        placeholder="Address 1"
                                                        required="required"
                                                        aria-required="true"
                                                    ></textarea>
                                                </div>
                                                <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7dbec52 elementor-col-50 elementor-field-required">
                                                    <label for="form-field-field_7dbec52" class="elementor-field-label elementor-screen-only"> 								Country</label>
                                                    <div class="elementor-field elementor-select-wrapper remove-before">
                                                        <div class="select-caret-down-wrapper">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-eicon-caret-down"
                                                                viewbox="0 0 571.4 571.4"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                            </svg>
                                                        </div>
                                                        <select
                                                            name="form_fields[field_7dbec52]"
                                                            id="form-field-field_7dbec52"
                                                            class="elementor-field-textual elementor-size-sm"
                                                            required="required"
                                                            aria-required="true"
                                                        >
                                                            <option value="Select Country">Select Country</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="United States">United States</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_01a6d54 elementor-col-50 elementor-field-required">
                                                    <label for="form-field-field_01a6d54" class="elementor-field-label elementor-screen-only"> 								Country</label>
                                                    <div class="elementor-field elementor-select-wrapper remove-before">
                                                        <div class="select-caret-down-wrapper">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-eicon-caret-down"
                                                                viewbox="0 0 571.4 571.4"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z"></path>
                                                            </svg>
                                                        </div>
                                                        <select
                                                            name="form_fields[field_01a6d54]"
                                                            id="form-field-field_01a6d54"
                                                            class="elementor-field-textual elementor-size-sm"
                                                            required="required"
                                                            aria-required="true"
                                                        >
                                                            <option value="Select Province">Select Province</option>
                                                            <option value="Metro Manila">Metro Manila</option>
                                                            <option value="Bulacan">Bulacan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_81b413f elementor-col-50 elementor-field-required">
                                                    <label for="form-field-field_81b413f" class="elementor-field-label elementor-screen-only"> 								City</label>
                                                    <div class="elementor-field elementor-select-wrapper remove-before">
                                                        <label for="form-field-field_289f7z9" class="elementor-field-label elementor-screen-only"> 								City</label>
                                                        <input
                                                            size="1"
                                                            type="text"
                                                            name="form_fields[field_289f7z9]"
                                                            id="form-field-field_289f7z9"
                                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                                            placeholder="City"
                                                            required="required"
                                                            aria-required="true"
                                                        >
                                                        
                                                    </div>
                                                </div>
                                                <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_289f7f5 elementor-col-50 elementor-field-required">
                                                    <label for="form-field-field_289f7f5" class="elementor-field-label elementor-screen-only"> 								Zip Code</label>
                                                    <input
                                                        size="1"
                                                        type="text"
                                                        name="form_fields[field_289f7f5]"
                                                        id="form-field-field_289f7f5"
                                                        class="elementor-field elementor-size-sm  elementor-field-textual"
                                                        placeholder="Zip Code"
                                                        required="required"
                                                        aria-required="true"
                                                    >
                                                </div>
                                                <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                    <button type="submit" class="elementor-button elementor-size-sm">
                                                        <span>
                                                            <span class="elementor-button-icon"></span>
                                                            <span class="elementor-button-text">SAVE ADDRESS</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
                                    class="elementor-element elementor-element-52dbad4 elementor-widget elementor-widget-html"
                                    data-id="52dbad4"
                                    data-element_type="widget"
                                    data-widget_type="html.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="payment-gateway">
                                            <input
                                                checked
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
                                                <td>Sub total</td>
                                                <td class="align-right">₱{{$total_price}}</td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Coupon discount</td>
                                                <td class="align-right">₱150.00</td>
                                            </tr> -->
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