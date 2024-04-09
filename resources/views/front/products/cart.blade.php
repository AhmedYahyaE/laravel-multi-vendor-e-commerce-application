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
                    <div id="appendCartItems" class="e-con-inner">
                        @include('front.products.cart_items')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection