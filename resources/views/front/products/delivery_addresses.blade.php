<div class="elementor-element edit-address-checkout elementor-element-1f78c63">

    <div class="elementor-widget-container">
        <style>
            /*! elementor-pro - v3.18.0 - 06-12-2023 */
            .elementor-button.elementor-hidden,
            .elementor-hidden {
                display: none
            }
    
            .e-form__step {
                width: 100%
            }
    
            .e-form__step:not(.elementor-hidden) {
                display: flex;
                flex-wrap: wrap
            }
    
            .e-form__buttons {
                flex-wrap: wrap
            }
    
            .e-form__buttons,
            .e-form__buttons__wrapper {
                display: flex
            }
    
            .e-form__indicators {
                display: flex;
                justify-content: space-between;
                align-items: center;
                flex-wrap: nowrap;
                font-size: 13px;
                margin-bottom: var(--e-form-steps-indicators-spacing)
            }
    
            .e-form__indicators__indicator {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                flex-basis: 0;
                padding: 0 var(--e-form-steps-divider-gap)
            }
    
            .e-form__indicators__indicator__progress {
                width: 100%;
                position: relative;
                background-color: var(--e-form-steps-indicator-progress-background-color);
                border-radius: var(--e-form-steps-indicator-progress-border-radius);
                overflow: hidden
            }
    
            .e-form__indicators__indicator__progress__meter {
                width: var(--e-form-steps-indicator-progress-meter-width, 0);
                height: var(--e-form-steps-indicator-progress-height);
                line-height: var(--e-form-steps-indicator-progress-height);
                padding-right: 15px;
                border-radius: var(--e-form-steps-indicator-progress-border-radius);
                background-color: var(--e-form-steps-indicator-progress-color);
                color: var(--e-form-steps-indicator-progress-meter-color);
                text-align: right;
                transition: width .1s linear
            }
    
            .e-form__indicators__indicator:first-child {
                padding-left: 0
            }
    
            .e-form__indicators__indicator:last-child {
                padding-right: 0
            }
    
            .e-form__indicators__indicator--state-inactive {
                color: var(--e-form-steps-indicator-inactive-primary-color, #c2cbd2)
            }
    
            .e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none) {
                background-color: var(--e-form-steps-indicator-inactive-secondary-color, #fff)
            }
    
            .e-form__indicators__indicator--state-inactive object,
            .e-form__indicators__indicator--state-inactive svg {
                fill: var(--e-form-steps-indicator-inactive-primary-color, #c2cbd2)
            }
    
            .e-form__indicators__indicator--state-active {
                color: var(--e-form-steps-indicator-active-primary-color, #39b54a);
                border-color: var(--e-form-steps-indicator-active-secondary-color, #fff)
            }
    
            .e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none) {
                background-color: var(--e-form-steps-indicator-active-secondary-color, #fff)
            }
    
            .e-form__indicators__indicator--state-active object,
            .e-form__indicators__indicator--state-active svg {
                fill: var(--e-form-steps-indicator-active-primary-color, #39b54a)
            }
    
            .e-form__indicators__indicator--state-completed {
                color: var(--e-form-steps-indicator-completed-secondary-color, #fff)
            }
    
            .e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none) {
                background-color: var(--e-form-steps-indicator-completed-primary-color, #39b54a)
            }
    
            .e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label {
                color: var(--e-form-steps-indicator-completed-primary-color, #39b54a)
            }
    
            .e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none {
                color: var(--e-form-steps-indicator-completed-primary-color, #39b54a);
                background-color: initial
            }
    
            .e-form__indicators__indicator--state-completed object,
            .e-form__indicators__indicator--state-completed svg {
                fill: var(--e-form-steps-indicator-completed-secondary-color, #fff)
            }
    
            .e-form__indicators__indicator__icon {
                width: var(--e-form-steps-indicator-padding, 30px);
                height: var(--e-form-steps-indicator-padding, 30px);
                font-size: var(--e-form-steps-indicator-icon-size);
                border-width: 1px;
                border-style: solid;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                margin-bottom: 10px
            }
    
            .e-form__indicators__indicator__icon img,
            .e-form__indicators__indicator__icon object,
            .e-form__indicators__indicator__icon svg {
                width: var(--e-form-steps-indicator-icon-size);
                height: auto
            }
    
            .e-form__indicators__indicator__icon .e-font-icon-svg {
                height: 1em
            }
    
            .e-form__indicators__indicator__number {
                width: var(--e-form-steps-indicator-padding, 30px);
                height: var(--e-form-steps-indicator-padding, 30px);
                border-width: 1px;
                border-style: solid;
                display: flex;
                justify-content: center;
                align-items: center;
                margin-bottom: 10px
            }
    
            .e-form__indicators__indicator--shape-circle {
                border-radius: 50%
            }
    
            .e-form__indicators__indicator--shape-square {
                border-radius: 0
            }
    
            .e-form__indicators__indicator--shape-rounded {
                border-radius: 5px
            }
    
            .e-form__indicators__indicator--shape-none {
                border: 0
            }
    
            .e-form__indicators__indicator__label {
                text-align: center
            }
    
            .e-form__indicators__indicator__separator {
                width: 100%;
                height: var(--e-form-steps-divider-width);
                background-color: #babfc5
            }
    
            .e-form__indicators--type-icon,
            .e-form__indicators--type-icon_text,
            .e-form__indicators--type-number,
            .e-form__indicators--type-number_text {
                align-items: flex-start
            }
    
            .e-form__indicators--type-icon .e-form__indicators__indicator__separator,
            .e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,
            .e-form__indicators--type-number .e-form__indicators__indicator__separator,
            .e-form__indicators--type-number_text .e-form__indicators__indicator__separator {
                margin-top: calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)
            }
    
            .elementor-field-type-hidden {
                display: none
            }
    
            .elementor-field-type-html {
                display: inline-block
            }
    
            .elementor-field-type-tel input {
                direction: inherit
            }
    
            .elementor-login .elementor-lost-password,
            .elementor-login .elementor-remember-me {
                font-size: .85em
            }
    
            .elementor-field-type-recaptcha_v3 .elementor-field-label {
                display: none
            }
    
            .elementor-field-type-recaptcha_v3 .grecaptcha-badge {
                z-index: 1
            }
    
            .elementor-button .elementor-form-spinner {
                order: 3
            }
    
            .elementor-form .elementor-button>span {
                display: flex;
                justify-content: center;
                align-items: center
            }
    
            .elementor-form .elementor-button .elementor-button-text {
                white-space: normal;
                flex-grow: 0
            }
    
            .elementor-form .elementor-button svg {
                height: auto
            }
    
            .elementor-form .elementor-button .e-font-icon-svg {
                height: 1em
            }
    
            .elementor-select-wrapper .select-caret-down-wrapper {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                inset-inline-end: 10px;
                pointer-events: none;
                font-size: 11px
            }
    
            .elementor-select-wrapper .select-caret-down-wrapper svg {
                display: unset;
                width: 1em;
                aspect-ratio: unset;
                fill: currentColor
            }
    
            .elementor-select-wrapper .select-caret-down-wrapper i {
                font-size: 19px;
                line-height: 2
            }
    
            .elementor-select-wrapper.remove-before:before {
                content: "" !important
            }
        </style>
        <form id="form-editAddress" action="javascript:;" name="Add Address">
            <input type="hidden" name="post_id" value="992">
            <input type="hidden" name="form_id" value="1f78c63">
            <input type="hidden" name="referer_title" value="Checkout">
            <input type="hidden" name="queried_id" value="992">
            <input type="hidden" name="delivery_id" value="">
            <div class="elementor-form-fields-wrapper elementor-labels-">
                <div
                    class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_f4dd461 elementor-col-100 elementor-field-required">
                    <label for="form-field-field_f4dd461" class="elementor-field-label elementor-screen-only"> Name</label>
                    <input size="1" type="text" name="delivery_name" id="form-field-field_f4dd461"
                        class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Name"
                        required="required" aria-required="true" value="">
                </div>
    
                <div
                    class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-field_db46221 elementor-col-100 elementor-field-required">
                    <label for="form-field-field_db46221" class="elementor-field-label elementor-screen-only"> Address
                        1</label>
                    <textarea class="elementor-field-textual elementor-field  elementor-size-sm" name="delivery_address"
                        id="form-field-field_db46221" rows="2" placeholder="Address 1" required="required"
                        aria-required="true"></textarea>
                </div>
                <div
                    class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_7dbec52 elementor-col-50 elementor-field-required">
                    <label for="form-field-field_7dbec52" class="elementor-field-label elementor-screen-only">
                        Country</label>
                    <div class="elementor-field elementor-select-wrapper remove-before">
                        <div class="select-caret-down-wrapper">
                            <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z">
                                </path>
                            </svg>
                        </div>
                        <select name="delivery_country" id="form-field-field_7dbec52"
                            class="elementor-field-textual address-field elementor-size-sm" required="required"
                            aria-required="true">
                            <option value="Select Country">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{$country['country_name']}}">{{$country['country_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div
                    class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_01a6d54 elementor-col-50 elementor-field-required">
                    <label for="form-field-field_01a6d54" class="elementor-field-label elementor-screen-only">
                        Province</label>
                    <div class="elementor-field elementor-select-wrapper remove-before">
                        <div class="select-caret-down-wrapper">
                            <svg aria-hidden="true" class="e-font-icon-svg e-eicon-caret-down" viewbox="0 0 571.4 571.4"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M571 393Q571 407 561 418L311 668Q300 679 286 679T261 668L11 418Q0 407 0 393T11 368 36 357H536Q550 357 561 368T571 393Z">
                                </path>
                            </svg>
                        </div>
                        <select name="delivery_state" id="form-field-field_01a6d54"
                            class="elementor-field-textual address-field elementor-size-sm" required="required"
                            aria-required="true">
                            <option value="Select Province" selected>Select Province</option>
                        </select>
                    </div>
                </div>
                <div
                    class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_81b413f elementor-col-50 elementor-field-required">
                    <label for="form-field-field_81b413f" class="elementor-field-label elementor-screen-only"> City</label>
                    <div class="elementor-field elementor-select-wrapper remove-before">
                        <label for="form-field-field_289f7z9" class="elementor-field-label elementor-screen-only">
                            City</label>
                        <input size="1" type="text" name="delivery_city" id="form-field-field_289f7z9"
                            class="elementor-field elementor-size-sm address-field elementor-field-textual"
                            placeholder="City" required="required" aria-required="true" value="">
    
                    </div>
                </div>
                <div
                    class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_289f7f5 elementor-col-50 elementor-field-required">
                    <label for="form-field-field_289f7f5" class="elementor-field-label elementor-screen-only"> Zip
                        Code</label>
                    <input size="1" type="text" name="delivery_pincode" id="form-field-field_289f7f5"
                        class="elementor-field elementor-size-sm elementor-field-textual" placeholder="Zip Code"
                        required="required" aria-required="true" value="">
                </div>
                <div
                    class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_212z2x2 elementor-col-100 elementor-field-required">
                    <label for="form-field-field_212z2x2" class="elementor-field-label elementor-screen-only"> Phone</label>
                    <div class="elementor-field elementor-select-wrapper remove-before">
                        <label for="form-field-field_212z2x2" class="elementor-field-label elementor-screen-only">
                            Phone</label>
                        <select name="mobile-dialing-code" class="mobile-dialing-codes"></select>
                        <input size="1" type="text" name="delivery_mobile" id="form-field-field_212z2x2"
                            class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Phone"
                            required="required" aria-required="true" pattern="\d{10}$" value="">
    
                    </div>
                </div>
                <div
                    class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_81b127l elementor-col-50 elementor-field-required">
                    <label for="form-field-field_81b127l" class="elementor-field-label elementor-screen-only">
                        Latitude</label>
                    <div class="elementor-field elementor-select-wrapper remove-before">
                        <label for="form-field-field_81b127l" class="elementor-field-label elementor-screen-only">
                            Latitude</label>
                        <input size="1" type="text" name="delivery_lat" id="form-field-field_81b127l"
                            class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Latitude"
                            required="required" aria-required="true" hidden="hidden">
    
                    </div>
                </div>
                <div
                    class="elementor-field-type-select elementor-field-group elementor-column elementor-field-group-field_81b127o elementor-col-50 elementor-field-required">
                    <label for="form-field-field_81b127o" class="elementor-field-label elementor-screen-only">
                        Longtitude</label>
                    <div class="elementor-field elementor-select-wrapper remove-before">
                        <label for="form-field-field_81b127o" class="elementor-field-label elementor-screen-only">
                            Longtitude</label>
                        <input size="1" type="text" name="delivery_lng" id="form-field-field_81b127o"
                            class="elementor-field elementor-size-sm  elementor-field-textual" placeholder="Longtitude"
                            required="required" aria-required="true" hidden="hidden">
                    </div>
                </div>
                <div class="elementor-col-100 elementor-column iframe-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1398948.4068947558!2d120.6476580567829!3d14.422244530750318!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x324053215f87de63%3A0x784790ef7a29da57!2sPhilippines!5e0!3m2!1sen!2sph!4v1708934881306!5m2!1sen!2sph"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div
                    class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                    <button type="submit" class="elementor-button elementor-size-sm">
                        <span>
                            <span class="elementor-button-icon"></span>
                            <span class="elementor-button-text">EDIT ADDRESS</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>