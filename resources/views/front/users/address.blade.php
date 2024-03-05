{{-- This page is accessed from My Account tab in the dropdown menu in the header (in front/layout/header.blade.php). Check userAccount() method in Front/UserController.php --}} 
@extends('front.layout.layout')


@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="1628"
    class="elementor elementor-1628"
    data-elementor-post-type="page">
    <div
        class="elementor-element elementor-element-46a57a5 e-flex e-con-boxed e-con e-parent"
        data-id="46a57a5"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-17fdaa4 e-con-full e-flex e-con e-child"
                data-id="17fdaa4"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-7d0d765 elementor-widget__width-inherit elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="7d0d765"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">Addresses</h1>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-a665c99 e-flex e-con-boxed e-con e-child"
                    data-id="a665c99"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-e6dd927 e-con-full e-flex e-con e-child"
                            data-id="e6dd927"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-380188f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="380188f"
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
                                            <a href="{{ url('user/address') }}">
                                                <span class="elementor-icon-list-icon">
                                                    <svg aria-hidden="true" class="e-font-icon-svg e-fas-map-marker-alt" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                                                </svg>
                                                </span>
                                                <span class="elementor-icon-list-text">Addresses</span>
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
                            class="elementor-element elementor-element-48758d2 e-con-full e-flex e-con e-child"
                            data-id="48758d2"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-0425fae e-flex e-con-boxed e-con e-child"
                                data-id="0425fae"
                                data-element_type="container"
                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                            >
                                <div class="e-con-inner">
                                    <div
                                        class="elementor-element elementor-element-63746a5 e-con-full e-flex e-con e-child"
                                        data-id="63746a5"
                                        data-element_type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                    >
                                        <div
                                            class="elementor-element elementor-element-ca26535 elementor-widget elementor-widget-heading"
                                            data-id="ca26535"
                                            data-element_type="widget"
                                            data-widget_type="heading.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <h6 class="elementor-heading-title elementor-size-default">DEFAULT</h6>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-4721cbd elementor-widget elementor-widget-heading"
                                            data-id="4721cbd"
                                            data-element_type="widget"
                                            data-widget_type="heading.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <h5 class="elementor-heading-title elementor-size-default">Niño Feliciano
                                                    <br> #407 Bonga Menor, Bustos, Bulacan 3007 Philippines
                                                    <br> (+63) 945 162 1033
                                                    <br> 14.621911, 121.046155
                                                </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-51d3094 elementor-widget elementor-widget-text-editor"
                                            data-id="51d3094"
                                            data-element_type="widget"
                                            data-widget_type="text-editor.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <style>/*! elementor - v3.18.0 - 08-12-2023 */ .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>
                                                <p>
                                                    <span style="text-decoration: underline; color: #000000;">
                                                        <a class="edit-address" style="color: #000000; text-decoration: underline;" href="#">Edit</a>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="text-decoration: underline; color: #000000;">
                                                        <a style="color: #000000; text-decoration: underline;" href="#">Delete</a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-element elementor-element-39fce9a e-con-full e-flex e-con e-child"
                                        data-id="39fce9a"
                                        data-element_type="container"
                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                    >
                                        <div
                                            class="elementor-element elementor-element-05bf1f4 elementor-widget elementor-widget-heading"
                                            data-id="05bf1f4"
                                            data-element_type="widget"
                                            data-widget_type="heading.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <h6 class="elementor-heading-title elementor-size-default">ADDRESS #2</h6>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-66ff1cb elementor-widget elementor-widget-heading"
                                            data-id="66ff1cb"
                                            data-element_type="widget"
                                            data-widget_type="heading.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <h5 class="elementor-heading-title elementor-size-default">Abdul Mohammad
                                                    <br> #407 Bonga Menor, Bustos, Bulacan 3007 Philippines
                                                    <br> (+63) 941 321 3790
                                                    <br> 12.69823, 315.216155
                                                </h5>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-7deb183 elementor-widget elementor-widget-text-editor"
                                            data-id="7deb183"
                                            data-element_type="widget"
                                            data-widget_type="text-editor.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <p>
                                                    <span style="text-decoration: underline; color: #000000;">
                                                        <a class="edit-address" style="color: #000000; text-decoration: underline;" href="#">Edit</a>
                                                    </span>
                                                </p>
                                                <p>
                                                    <span style="text-decoration: underline; color: #000000;">
                                                        <a style="color: #000000; text-decoration: underline;" href="#">Delete</a>
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-element elementor-element-a0b40fb elementor-widget__width-auto elementor-widget elementor-widget-button"
                                        data-id="a0b40fb"
                                        data-element_type="widget"
                                        data-widget_type="button.default"
                                    >
                                        <div class="elementor-widget-container">
                                            <div class="elementor-button-wrapper">
                                                <a id="add-address-btn" class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                    <span class="elementor-button-content-wrapper">
                                                        <span class="elementor-button-text">ADD NEW ADDRESS</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-element elementor-element-6d78141 elementor-button-align-start address-page-form elementor-widget elementor-widget-form"
                                        data-id="6d78141"
                                        data-element_type="widget"
                                        data-settings="{&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                                        data-widget_type="form.default"
                                    >
                                        <div class="elementor-widget-container">
                                            <style>/*! elementor-pro - v3.18.0 - 06-12-2023 */ .elementor-button.elementor-hidden,.elementor-hidden{display:none}.e-form__step{width:100%}.e-form__step:not(.elementor-hidden){display:flex;flex-wrap:wrap}.e-form__buttons{flex-wrap:wrap}.e-form__buttons,.e-form__buttons__wrapper{display:flex}.e-form__indicators{display:flex;justify-content:space-between;align-items:center;flex-wrap:nowrap;font-size:13px;margin-bottom:var(--e-form-steps-indicators-spacing)}.e-form__indicators__indicator{display:flex;flex-direction:column;align-items:center;justify-content:center;flex-basis:0;padding:0 var(--e-form-steps-divider-gap)}.e-form__indicators__indicator__progress{width:100%;position:relative;background-color:var(--e-form-steps-indicator-progress-background-color);border-radius:var(--e-form-steps-indicator-progress-border-radius);overflow:hidden}.e-form__indicators__indicator__progress__meter{width:var(--e-form-steps-indicator-progress-meter-width,0);height:var(--e-form-steps-indicator-progress-height);line-height:var(--e-form-steps-indicator-progress-height);padding-right:15px;border-radius:var(--e-form-steps-indicator-progress-border-radius);background-color:var(--e-form-steps-indicator-progress-color);color:var(--e-form-steps-indicator-progress-meter-color);text-align:right;transition:width .1s linear}.e-form__indicators__indicator:first-child{padding-left:0}.e-form__indicators__indicator:last-child{padding-right:0}.e-form__indicators__indicator--state-inactive{color:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-inactive-secondary-color,#fff)}.e-form__indicators__indicator--state-inactive object,.e-form__indicators__indicator--state-inactive svg{fill:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-active{color:var(--e-form-steps-indicator-active-primary-color,#39b54a);border-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active object,.e-form__indicators__indicator--state-active svg{fill:var(--e-form-steps-indicator-active-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed{color:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a);background-color:initial}.e-form__indicators__indicator--state-completed object,.e-form__indicators__indicator--state-completed svg{fill:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator__icon{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);font-size:var(--e-form-steps-indicator-icon-size);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;overflow:hidden;margin-bottom:10px}.e-form__indicators__indicator__icon img,.e-form__indicators__indicator__icon object,.e-form__indicators__indicator__icon svg{width:var(--e-form-steps-indicator-icon-size);height:auto}.e-form__indicators__indicator__icon .e-font-icon-svg{height:1em}.e-form__indicators__indicator__number{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;margin-bottom:10px}.e-form__indicators__indicator--shape-circle{border-radius:50%}.e-form__indicators__indicator--shape-square{border-radius:0}.e-form__indicators__indicator--shape-rounded{border-radius:5px}.e-form__indicators__indicator--shape-none{border:0}.e-form__indicators__indicator__label{text-align:center}.e-form__indicators__indicator__separator{width:100%;height:var(--e-form-steps-divider-width);background-color:#babfc5}.e-form__indicators--type-icon,.e-form__indicators--type-icon_text,.e-form__indicators--type-number,.e-form__indicators--type-number_text{align-items:flex-start}.e-form__indicators--type-icon .e-form__indicators__indicator__separator,.e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,.e-form__indicators--type-number .e-form__indicators__indicator__separator,.e-form__indicators--type-number_text .e-form__indicators__indicator__separator{margin-top:calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)}.elementor-field-type-hidden{display:none}.elementor-field-type-html{display:inline-block}.elementor-field-type-tel input{direction:inherit}.elementor-login .elementor-lost-password,.elementor-login .elementor-remember-me{font-size:.85em}.elementor-field-type-recaptcha_v3 .elementor-field-label{display:none}.elementor-field-type-recaptcha_v3 .grecaptcha-badge{z-index:1}.elementor-button .elementor-form-spinner{order:3}.elementor-form .elementor-button>span{display:flex;justify-content:center;align-items:center}.elementor-form .elementor-button .elementor-button-text{white-space:normal;flex-grow:0}.elementor-form .elementor-button svg{height:auto}.elementor-form .elementor-button .e-font-icon-svg{height:1em}.elementor-select-wrapper .select-caret-down-wrapper{position:absolute;top:50%;transform:translateY(-50%);inset-inline-end:10px;pointer-events:none;font-size:11px}.elementor-select-wrapper .select-caret-down-wrapper svg{display:unset;width:1em;aspect-ratio:unset;fill:currentColor}.elementor-select-wrapper .select-caret-down-wrapper i{font-size:19px;line-height:2}.elementor-select-wrapper.remove-before:before{content:""!important}</style>
                                            <form class="elementor-form form-address" method="post" name="Add Address">
                                                <input type="hidden" name="post_id" value="1628">
                                                <input type="hidden" name="form_id" value="6d78141">
                                                <input type="hidden" name="referer_title" value="Addresses">
                                                <input type="hidden" name="queried_id" value="1628">
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
                                                                name="form_fields[field_81b413f]"
                                                                id="form-field-field_81b413f"
                                                                class="elementor-field-textual elementor-size-sm"
                                                                required="required"
                                                                aria-required="true"
                                                            >
                                                                <option value="Select City">Select City</option>
                                                                <option value="Baliuag">Baliuag</option>
                                                                <option value="Bustos">Bustos</option>
                                                            </select>
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