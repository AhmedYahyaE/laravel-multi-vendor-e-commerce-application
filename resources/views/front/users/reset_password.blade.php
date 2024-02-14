{{-- User Forgot Password Functionality --}} 
{{-- This page is accessed from the <a> tag in front/users/login_register.blade.php --}}
@extends('front.layout.layout')


@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="884"
    class="elementor elementor-884"
    data-elementor-post-type="page">
    <div
        class="elementor-element elementor-element-d3252f2 e-flex e-con-boxed e-con e-parent"
        data-id="d3252f2"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-ca39307 e-con-full e-flex e-con e-child"
                data-id="ca39307"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-002e603 elementor-widget__width-inherit elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="002e603"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h1 class="elementor-heading-title elementor-size-default">CHANGE PASSWORD</h1>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-b8b23ee e-flex e-con-boxed e-con e-child"
                    data-id="b8b23ee"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-d30a90d e-con-full e-flex e-con e-child"
                            data-id="d30a90d"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-31ace6b elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                data-id="31ace6b"
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
                                                    <svg
                                                        aria-hidden="true"
                                                        class="e-font-icon-svg e-fas-lock"
                                                        viewbox="0 0 448 512"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                    >
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
                            class="elementor-element elementor-element-1d0a7bf e-con-full e-flex e-con e-child"
                            data-id="1d0a7bf"
                            data-element_type="container"
                            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                        >
                            <div
                                class="elementor-element elementor-element-24f0421 e-flex e-con-boxed e-con e-child"
                                data-id="24f0421"
                                data-element_type="container"
                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                            >
                                <div class="e-con-inner">
                                    <div
                                        class="elementor-element elementor-element-ae8f5ac elementor-widget__width-initial elementor-button-align-stretch elementor-widget elementor-widget-form"
                                        data-id="ae8f5ac"
                                        data-element_type="widget"
                                        data-settings="{&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                                        data-widget_type="form.default"
                                    >
                                        <div class="elementor-widget-container">
                                            <style>/*! elementor-pro - v3.18.0 - 06-12-2023 */ .elementor-button.elementor-hidden,.elementor-hidden{display:none}.e-form__step{width:100%}.e-form__step:not(.elementor-hidden){display:flex;flex-wrap:wrap}.e-form__buttons{flex-wrap:wrap}.e-form__buttons,.e-form__buttons__wrapper{display:flex}.e-form__indicators{display:flex;justify-content:space-between;align-items:center;flex-wrap:nowrap;font-size:13px;margin-bottom:var(--e-form-steps-indicators-spacing)}.e-form__indicators__indicator{display:flex;flex-direction:column;align-items:center;justify-content:center;flex-basis:0;padding:0 var(--e-form-steps-divider-gap)}.e-form__indicators__indicator__progress{width:100%;position:relative;background-color:var(--e-form-steps-indicator-progress-background-color);border-radius:var(--e-form-steps-indicator-progress-border-radius);overflow:hidden}.e-form__indicators__indicator__progress__meter{width:var(--e-form-steps-indicator-progress-meter-width,0);height:var(--e-form-steps-indicator-progress-height);line-height:var(--e-form-steps-indicator-progress-height);padding-right:15px;border-radius:var(--e-form-steps-indicator-progress-border-radius);background-color:var(--e-form-steps-indicator-progress-color);color:var(--e-form-steps-indicator-progress-meter-color);text-align:right;transition:width .1s linear}.e-form__indicators__indicator:first-child{padding-left:0}.e-form__indicators__indicator:last-child{padding-right:0}.e-form__indicators__indicator--state-inactive{color:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-inactive-secondary-color,#fff)}.e-form__indicators__indicator--state-inactive object,.e-form__indicators__indicator--state-inactive svg{fill:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-active{color:var(--e-form-steps-indicator-active-primary-color,#39b54a);border-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active object,.e-form__indicators__indicator--state-active svg{fill:var(--e-form-steps-indicator-active-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed{color:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a);background-color:initial}.e-form__indicators__indicator--state-completed object,.e-form__indicators__indicator--state-completed svg{fill:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator__icon{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);font-size:var(--e-form-steps-indicator-icon-size);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;overflow:hidden;margin-bottom:10px}.e-form__indicators__indicator__icon img,.e-form__indicators__indicator__icon object,.e-form__indicators__indicator__icon svg{width:var(--e-form-steps-indicator-icon-size);height:auto}.e-form__indicators__indicator__icon .e-font-icon-svg{height:1em}.e-form__indicators__indicator__number{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;margin-bottom:10px}.e-form__indicators__indicator--shape-circle{border-radius:50%}.e-form__indicators__indicator--shape-square{border-radius:0}.e-form__indicators__indicator--shape-rounded{border-radius:5px}.e-form__indicators__indicator--shape-none{border:0}.e-form__indicators__indicator__label{text-align:center}.e-form__indicators__indicator__separator{width:100%;height:var(--e-form-steps-divider-width);background-color:#babfc5}.e-form__indicators--type-icon,.e-form__indicators--type-icon_text,.e-form__indicators--type-number,.e-form__indicators--type-number_text{align-items:flex-start}.e-form__indicators--type-icon .e-form__indicators__indicator__separator,.e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,.e-form__indicators--type-number .e-form__indicators__indicator__separator,.e-form__indicators--type-number_text .e-form__indicators__indicator__separator{margin-top:calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)}.elementor-field-type-hidden{display:none}.elementor-field-type-html{display:inline-block}.elementor-field-type-tel input{direction:inherit}.elementor-login .elementor-lost-password,.elementor-login .elementor-remember-me{font-size:.85em}.elementor-field-type-recaptcha_v3 .elementor-field-label{display:none}.elementor-field-type-recaptcha_v3 .grecaptcha-badge{z-index:1}.elementor-button .elementor-form-spinner{order:3}.elementor-form .elementor-button>span{display:flex;justify-content:center;align-items:center}.elementor-form .elementor-button .elementor-button-text{white-space:normal;flex-grow:0}.elementor-form .elementor-button svg{height:auto}.elementor-form .elementor-button .e-font-icon-svg{height:1em}.elementor-select-wrapper .select-caret-down-wrapper{position:absolute;top:50%;transform:translateY(-50%);inset-inline-end:10px;pointer-events:none;font-size:11px}.elementor-select-wrapper .select-caret-down-wrapper svg{display:unset;width:1em;aspect-ratio:unset;fill:currentColor}.elementor-select-wrapper .select-caret-down-wrapper i{font-size:19px;line-height:2}.elementor-select-wrapper.remove-before:before{content:""!important}</style>
                                            <form class="elementor-form" method="post" name="Reset Password">
                                                <input type="hidden" name="post_id" value="884">
                                                <input type="hidden" name="form_id" value="ae8f5ac">
                                                <input type="hidden" name="referer_title" value="RESET PASSWORD">
                                                <input type="hidden" name="queried_id" value="884">
                                                <div class="elementor-form-fields-wrapper elementor-labels-">
                                                    <div class="elementor-field-type-password elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
                                                        <label for="form-field-email" class="elementor-field-label elementor-screen-only"> 								Current Password</label>
                                                        <input
                                                            size="1"
                                                            type="password"
                                                            name="form_fields[email]"
                                                            id="form-field-email"
                                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                                            placeholder="Current Password"
                                                            required="required"
                                                            aria-required="true"
                                                        >
                                                    </div>
                                                    <div class="elementor-field-type-password elementor-field-group elementor-column elementor-field-group-field_3ff5bb2 elementor-col-100 elementor-field-required">
                                                        <label for="form-field-field_3ff5bb2" class="elementor-field-label elementor-screen-only"> 								New Password</label>
                                                        <input
                                                            size="1"
                                                            type="password"
                                                            name="form_fields[field_3ff5bb2]"
                                                            id="form-field-field_3ff5bb2"
                                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                                            placeholder="New Password"
                                                            required="required"
                                                            aria-required="true"
                                                        >
                                                    </div>
                                                    <div class="elementor-field-type-password elementor-field-group elementor-column elementor-field-group-field_cfa2f1f elementor-col-100 elementor-field-required">
                                                        <label for="form-field-field_cfa2f1f" class="elementor-field-label elementor-screen-only"> 								Confirm New Password</label>
                                                        <input
                                                            size="1"
                                                            type="password"
                                                            name="form_fields[field_cfa2f1f]"
                                                            id="form-field-field_cfa2f1f"
                                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                                            placeholder="Confirm New Password"
                                                            required="required"
                                                            aria-required="true"
                                                        >
                                                    </div>
                                                    <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                                        <button type="submit" class="elementor-button elementor-size-sm">
                                                            <span>
                                                                <span class="elementor-button-icon"></span>
                                                                <span class="elementor-button-text">Change Password</span>
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