{{-- Note: front/products/detail.blade.php is the page that opens when you click on a product in the FRONT home page --}} {{-- $productDetails, categoryDetails and $totalStock are passed in from detail() method in Front/ProductsController.php --}}
@extends('front.layout.layout')

@section('content')
<div
    data-elementor-type="wp-page"
    data-elementor-id="491"
    class="elementor elementor-491"
    data-elementor-post-type="page"
>
<div class="popup_review_container">
    <img src="{{ asset('front/images/product/no-available-image.jpg')}}">
    <a href="#" class="close_image_review_popup">X</a>
</div>


    <div
        class="elementor-element elementor-element-51b2b2e e-flex e-con-boxed e-con e-parent"
        data-id="51b2b2e"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">

        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-37b0796 e-con-full e-flex e-con e-child"
                data-id="37b0796"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-e8c1cfd elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="e8c1cfd"
                    data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInLeft&quot;}"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        {{-- Breadcrumbs --}} 
                        <p class="elementor-heading-title elementor-size-default">Home / @php echo $categoryDetails['breadcrumbs']; @endphp </p>
                    </div>
                </div>
            </div>
            <div
                class="elementor-element elementor-element-de7af75 e-con-full e-flex elementor-invisible e-con e-child"
                data-id="de7af75"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInLeft&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-7e93cf1 e-flex e-con-boxed e-con e-child"
                    data-id="7e93cf1"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-14f2792 elementor-pagination-type-progressbar elementor-arrows-position-inside elementor-widget elementor-widget-n-carousel"
                            data-id="14f2792"
                            data-element_type="widget"
                            data-settings="{&quot;carousel_items&quot;:[{&quot;slide_title&quot;:&quot;Slide #1&quot;,&quot;_id&quot;:&quot;9df787b&quot;},{&quot;slide_title&quot;:&quot;Slide #1&quot;,&quot;_id&quot;:&quot;9a06489&quot;},{&quot;slide_title&quot;:&quot;Slide #1&quot;,&quot;_id&quot;:&quot;a96bbe5&quot;},{&quot;slide_title&quot;:&quot;Slide #1&quot;,&quot;_id&quot;:&quot;96cff8d&quot;},{&quot;slide_title&quot;:&quot;Slide #1&quot;,&quot;_id&quot;:&quot;8586e44&quot;},{&quot;slide_title&quot;:&quot;Slide #1&quot;,&quot;_id&quot;:&quot;1f406b6&quot;}],&quot;slides_to_show&quot;:&quot;1&quot;,&quot;pagination&quot;:&quot;progressbar&quot;,&quot;slides_to_show_tablet&quot;:&quot;1&quot;,&quot;slides_to_show_mobile&quot;:&quot;1&quot;,&quot;autoplay&quot;:&quot;yes&quot;,&quot;autoplay_speed&quot;:5000,&quot;pause_on_hover&quot;:&quot;yes&quot;,&quot;pause_on_interaction&quot;:&quot;yes&quot;,&quot;infinite&quot;:&quot;yes&quot;,&quot;speed&quot;:500,&quot;offset_sides&quot;:&quot;none&quot;,&quot;arrows&quot;:&quot;yes&quot;,&quot;image_spacing_custom&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;image_spacing_custom_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]},&quot;image_spacing_custom_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:&quot;&quot;,&quot;sizes&quot;:[]}}"
                            data-widget_type="nested-carousel.default"
                        >
                            <div class="elementor-widget-container">
                                <link rel="stylesheet" href="{{ url('front/css/elementor-css/elementor-pro-assets-css-widget-nested-carousel.min.css') }}">
                                <div class="e-n-carousel swiper" dir="ltr">
                                    <div class="swiper-wrapper" aria-live="off">
                                        @empty($productDetails['images'])
                                        <div
                                            class="swiper-slide"
                                            data-slide="1"
                                            role="group"
                                            aria-roledescription="slide"
                                            aria-label="1 of 1"
                                        >
                                            <div
                                                class="elementor-element elementor-element-09d9b51 e-flex e-con-boxed e-con e-child"
                                                data-id="09d9b51"
                                                data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                            >
                                                <div class="e-con-inner">
                                                    <div
                                                        class="elementor-element elementor-element-7496269 e-flex e-con-boxed e-con e-child"
                                                        data-id="7496269"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-9905f7b elementor-widget elementor-widget-image"
                                                                data-id="9905f7b"
                                                                data-element_type="widget"
                                                                data-widget_type="image.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <img
                                                                        fetchpriority="high"
                                                                        decoding="async"
                                                                        width="522"
                                                                        height="522"
                                                                        src="{{ asset('front/images/product/no-available-image.jpg')}}"
                                                                        class="attachment-large size-large wp-image-503"
                                                                        alt=""
                                                                        srcset="{{ asset('front/images/product/no-available-image.jpg')}} 522w, {{ asset('front/images/product/no-available-image.jpg')}} 300w, {{ asset('front/images/product/no-available-image.jpg')}} 150w"
                                                                        sizes="(max-width: 522px) 100vw, 522px"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endempty
                                        @foreach ($productDetails['images'] as $product_key => $product_image)
                                        <div
                                            class="swiper-slide"
                                            data-slide="{{$product_key}}"
                                            role="group"
                                            aria-roledescription="slide"
                                            aria-label="{{$product_key}} of {{count($productDetails['images'])}}"
                                        >
                                            <div
                                                class="elementor-element elementor-element-09d9b5{{$product_key}} e-flex e-con-boxed e-con e-child"
                                                data-id="09d9b5{{$product_key}}"
                                                data-element_type="container"
                                                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                            >
                                                <div class="e-con-inner">
                                                    <div
                                                        class="elementor-element elementor-element-7496269 e-flex e-con-boxed e-con e-child"
                                                        data-id="7496269"
                                                        data-element_type="container"
                                                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                    >
                                                        <div class="e-con-inner">
                                                            <div
                                                                class="elementor-element elementor-element-9905f7b elementor-widget elementor-widget-image"
                                                                data-id="9905f7b"
                                                                data-element_type="widget"
                                                                data-widget_type="image.default"
                                                            >
                                                                <div class="elementor-widget-container">
                                                                    <img
                                                                        fetchpriority="high"
                                                                        decoding="async"
                                                                        width="522"
                                                                        height="522"
                                                                        src="{{ asset('front/images/product_images/small/' . $product_image['image'])}}"
                                                                        class="attachment-large size-large wp-image-503"
                                                                        alt=""
                                                                        srcset="{{ asset('front/images/product_images/small/' . $product_image['image'])}} 522w, {{ asset('front/images/product_images/small/' . $product_image['image'])}} 300w, {{ asset('front/images/product_images/small/' . $product_image['image'])}} 150w"
                                                                        sizes="(max-width: 522px) 100vw, 522px"
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="elementor-swiper-button elementor-swiper-button-prev" role="button" tabindex="0">
                                    <svg
                                        aria-hidden="true"
                                        class="e-font-icon-svg e-eicon-chevron-left"
                                        viewbox="0 0 1000 1000"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path d="M646 125C629 125 613 133 604 142L308 442C296 454 292 471 292 487 292 504 296 521 308 533L604 854C617 867 629 875 646 875 663 875 679 871 692 858 704 846 713 829 713 812 713 796 708 779 692 767L438 487 692 225C700 217 708 204 708 187 708 171 704 154 692 142 675 129 663 125 646 125Z"></path>
                                    </svg>
                                </div>
                                <div class="elementor-swiper-button elementor-swiper-button-next" role="button" tabindex="0">
                                    <svg
                                        aria-hidden="true"
                                        class="e-font-icon-svg e-eicon-chevron-right"
                                        viewbox="0 0 1000 1000"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path d="M696 533C708 521 713 504 713 487 713 471 708 454 696 446L400 146C388 133 375 125 354 125 338 125 325 129 313 142 300 154 292 171 292 187 292 204 296 221 308 233L563 492 304 771C292 783 288 800 288 817 288 833 296 850 308 863 321 871 338 875 354 875 371 875 388 867 400 854L696 533Z"></path>
                                    </svg>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="elementor-element elementor-element-a402a83 e-con-full e-flex elementor-invisible e-con e-child"
                data-id="a402a83"
                data-element_type="container"
                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInRight&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
            >
                <div
                    class="elementor-element elementor-element-9707fe2 elementor-widget elementor-widget-heading"
                    data-id="9707fe2"
                    data-element_type="widget"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">

                        <div class="list-of-tags">
                            <span>100% Cotton</span>
                            <span>Recycled Materials</span>
                            <span>Eco - Friendly</span>
                        </div>

                        <h1 class="elementor-heading-title elementor-size-default">{{$productDetails['product_name']}}</h1>
                    </div>
                </div>
                <!-- <div
                    class="elementor-element elementor-element-e6c5248 elementor-widget elementor-widget-heading"
                    data-id="e6c5248"
                    data-element_type="widget"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h6 class="elementor-heading-title elementor-size-default">12-Month subscription with Auto-Renewal for PC/MAC</h6>
                    </div>
                </div> -->
                <div
                    class="elementor-element elementor-element-8305131 e-con-full e-flex e-con e-child"
                    data-id="8305131"
                    data-element_type="container"
                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                >
                    <div
                        class="elementor-element elementor-element-c850d33 e-con-full e-flex e-con e-child"
                        data-id="c850d33"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-8b97798 elementor-widget elementor-widget-image"
                            data-id="8b97798"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    decoding="async"
                                    width="300"
                                    height="300"
                                    src="{{ asset('front/images/brand-logos/2023-12-user.png') }}"
                                    class="attachment-large size-large wp-image-423"
                                    alt=""
                                    srcset="{{ asset('front/images/brand-logos/2023-12-user.png') }} 300w, {{ asset('front/images/brand-logos/2023-12-user-150x150.png') }} 150w"
                                    sizes="(max-width: 300px) 100vw, 300px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-621ad64 elementor-widget elementor-widget-heading"
                            data-id="621ad64"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">{{ (isset($productDetails['vendor']['name'])  ? $productDetails['vendor']['name']:'') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-0e1807c elementor-widget elementor-widget-rating"
                        data-id="0e1807c"
                        data-element_type="widget"
                        data-widget_type="rating.default"
                    >
                        <div class="elementor-widget-container">
                            <style>/*! elementor - v3.18.0 - 08-12-2023 */ .elementor-widget-rating{--e-rating-gap:0px;--e-rating-icon-font-size:16px;--e-rating-icon-color:#ccd6df;--e-rating-icon-marked-color:#f0ad4e;--e-rating-icon-marked-width:100%;--e-rating-justify-content:flex-start}.elementor-widget-rating .e-rating{display:flex;justify-content:var(--e-rating-justify-content)}.elementor-widget-rating .e-rating-wrapper{display:flex;justify-content:inherit;flex-direction:row;flex-wrap:wrap;width:-moz-fit-content;width:fit-content;margin-block-end:calc(0px - var(--e-rating-gap));margin-inline-end:calc(0px - var(--e-rating-gap))}.elementor-widget-rating .e-rating .e-icon{position:relative;margin-block-end:var(--e-rating-gap);margin-inline-end:var(--e-rating-gap)}.elementor-widget-rating .e-rating .e-icon-wrapper.e-icon-marked{--e-rating-icon-color:var(--e-rating-icon-marked-color);width:var(--e-rating-icon-marked-width);position:absolute;z-index:1;height:100%;left:0;top:0;overflow:hidden}.elementor-widget-rating .e-rating .e-icon-wrapper :is(i,svg){display:flex;flex-shrink:0}.elementor-widget-rating .e-rating .e-icon-wrapper i{font-size:var(--e-rating-icon-font-size);color:var(--e-rating-icon-color)}.elementor-widget-rating .e-rating .e-icon-wrapper svg{width:auto;height:var(--e-rating-icon-font-size);fill:var(--e-rating-icon-color)}</style>
                            <div
                                class="e-rating"
                                itemtype="https://schema.org/Rating"
                                itemscope=""
                                itemprop="reviewRating"
                            >
                                <meta itemprop="worstRating" content="0">
                                <meta itemprop="bestRating" content="5">
                                <div
                                    class="e-rating-wrapper"
                                    itemprop="ratingValue"
                                    content="4"
                                    role="img"
                                    aria-label="Rated 4 out of 5"
                                >
                                    @for ($x = 0; $x < 5; $x++)
                                        @php
                                            $marked = \App\Models\Product::product_computed_ratings($productDetails['id']);
                                        @endphp
                                    <!-- marked -->
                                    <div class="e-icon">
                                        <div class="e-icon-wrapper e-icon-marked" style="{{ ($x < $marked && $marked > 0) ? '':'--e-rating-icon-marked-width: 0%;' }}">
                                            <svg
                                                aria-hidden="true"
                                                class="e-font-icon-svg e-eicon-star"
                                                viewbox="0 0 1000 1000"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                            </svg>
                                        </div>
                                        <div class="e-icon-wrapper e-icon-unmarked">
                                            <svg
                                                aria-hidden="true"
                                                class="e-font-icon-svg e-eicon-star"
                                                viewbox="0 0 1000 1000"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']) @endphp

                <div
                    class="elementor-element elementor-element-0fe71b8 price-container e-flex e-con-boxed e-con e-child"
                    data-id="0fe71b8"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        @if ($getDiscountPrice > 0)
                        <div
                            class="elementor-element elementor-element-824f352 elementor-widget__width-auto elementor-widget elementor-widget-heading"
                            data-id="824f352"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default">₱{{$getDiscountPrice}}</h2>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-32fc723 elementor-widget__width-auto elementor-widget elementor-widget-heading"
                            data-id="32fc723"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default">₱{{$productDetails['product_price']}}</h2>
                            </div>
                        </div>
                        @else
                        <div
                            class="elementor-element elementor-element-824f352 elementor-widget__width-auto elementor-widget elementor-widget-heading"
                            data-id="824f352"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default">₱{{$productDetails['product_price']}}</h2>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-b77bd95 elementor-widget elementor-widget-text-editor"
                    data-id="b77bd95"
                    data-element_type="widget"
                    data-widget_type="text-editor.default"
                >
                    <div class="elementor-widget-container">
                        <style>/*! elementor - v3.18.0 - 08-12-2023 */ .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>
                        {{$productDetails['description']}}
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-6671d28 add-to-cart-form e-flex e-con-boxed e-con e-child"
                    data-id="6671d28"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-0b98135 elementor-button-align-stretch elementor-widget elementor-widget-form"
                            data-id="0b98135"
                            data-element_type="widget"
                            data-settings="{&quot;button_width&quot;:&quot;25&quot;,&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width_tablet&quot;:&quot;60&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                            data-widget_type="form.default"
                        >
                            <div class="elementor-widget-container">
                                <style>/*! elementor-pro - v3.18.0 - 06-12-2023 */ .elementor-button.elementor-hidden,.elementor-hidden{display:none}.e-form__step{width:100%}.e-form__step:not(.elementor-hidden){display:flex;flex-wrap:wrap}.e-form__buttons{flex-wrap:wrap}.e-form__buttons,.e-form__buttons__wrapper{display:flex}.e-form__indicators{display:flex;justify-content:space-between;align-items:center;flex-wrap:nowrap;font-size:13px;margin-bottom:var(--e-form-steps-indicators-spacing)}.e-form__indicators__indicator{display:flex;flex-direction:column;align-items:center;justify-content:center;flex-basis:0;padding:0 var(--e-form-steps-divider-gap)}.e-form__indicators__indicator__progress{width:100%;position:relative;background-color:var(--e-form-steps-indicator-progress-background-color);border-radius:var(--e-form-steps-indicator-progress-border-radius);overflow:hidden}.e-form__indicators__indicator__progress__meter{width:var(--e-form-steps-indicator-progress-meter-width,0);height:var(--e-form-steps-indicator-progress-height);line-height:var(--e-form-steps-indicator-progress-height);padding-right:15px;border-radius:var(--e-form-steps-indicator-progress-border-radius);background-color:var(--e-form-steps-indicator-progress-color);color:var(--e-form-steps-indicator-progress-meter-color);text-align:right;transition:width .1s linear}.e-form__indicators__indicator:first-child{padding-left:0}.e-form__indicators__indicator:last-child{padding-right:0}.e-form__indicators__indicator--state-inactive{color:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-inactive [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-inactive-secondary-color,#fff)}.e-form__indicators__indicator--state-inactive object,.e-form__indicators__indicator--state-inactive svg{fill:var(--e-form-steps-indicator-inactive-primary-color,#c2cbd2)}.e-form__indicators__indicator--state-active{color:var(--e-form-steps-indicator-active-primary-color,#39b54a);border-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-active-secondary-color,#fff)}.e-form__indicators__indicator--state-active object,.e-form__indicators__indicator--state-active svg{fill:var(--e-form-steps-indicator-active-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed{color:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator--state-completed [class*=indicator--shape-]:not(.e-form__indicators__indicator--shape-none){background-color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator__label{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a)}.e-form__indicators__indicator--state-completed .e-form__indicators__indicator--shape-none{color:var(--e-form-steps-indicator-completed-primary-color,#39b54a);background-color:initial}.e-form__indicators__indicator--state-completed object,.e-form__indicators__indicator--state-completed svg{fill:var(--e-form-steps-indicator-completed-secondary-color,#fff)}.e-form__indicators__indicator__icon{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);font-size:var(--e-form-steps-indicator-icon-size);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;overflow:hidden;margin-bottom:10px}.e-form__indicators__indicator__icon img,.e-form__indicators__indicator__icon object,.e-form__indicators__indicator__icon svg{width:var(--e-form-steps-indicator-icon-size);height:auto}.e-form__indicators__indicator__icon .e-font-icon-svg{height:1em}.e-form__indicators__indicator__number{width:var(--e-form-steps-indicator-padding,30px);height:var(--e-form-steps-indicator-padding,30px);border-width:1px;border-style:solid;display:flex;justify-content:center;align-items:center;margin-bottom:10px}.e-form__indicators__indicator--shape-circle{border-radius:50%}.e-form__indicators__indicator--shape-square{border-radius:0}.e-form__indicators__indicator--shape-rounded{border-radius:5px}.e-form__indicators__indicator--shape-none{border:0}.e-form__indicators__indicator__label{text-align:center}.e-form__indicators__indicator__separator{width:100%;height:var(--e-form-steps-divider-width);background-color:#babfc5}.e-form__indicators--type-icon,.e-form__indicators--type-icon_text,.e-form__indicators--type-number,.e-form__indicators--type-number_text{align-items:flex-start}.e-form__indicators--type-icon .e-form__indicators__indicator__separator,.e-form__indicators--type-icon_text .e-form__indicators__indicator__separator,.e-form__indicators--type-number .e-form__indicators__indicator__separator,.e-form__indicators--type-number_text .e-form__indicators__indicator__separator{margin-top:calc(var(--e-form-steps-indicator-padding, 30px) / 2 - var(--e-form-steps-divider-width, 1px) / 2)}.elementor-field-type-hidden{display:none}.elementor-field-type-html{display:inline-block}.elementor-field-type-tel input{direction:inherit}.elementor-login .elementor-lost-password,.elementor-login .elementor-remember-me{font-size:.85em}.elementor-field-type-recaptcha_v3 .elementor-field-label{display:none}.elementor-field-type-recaptcha_v3 .grecaptcha-badge{z-index:1}.elementor-button .elementor-form-spinner{order:3}.elementor-form .elementor-button>span{display:flex;justify-content:center;align-items:center}.elementor-form .elementor-button .elementor-button-text{white-space:normal;flex-grow:0}.elementor-form .elementor-button svg{height:auto}.elementor-form .elementor-button .e-font-icon-svg{height:1em}.elementor-select-wrapper .select-caret-down-wrapper{position:absolute;top:50%;transform:translateY(-50%);inset-inline-end:10px;pointer-events:none;font-size:11px}.elementor-select-wrapper .select-caret-down-wrapper svg{display:unset;width:1em;aspect-ratio:unset;fill:currentColor}.elementor-select-wrapper .select-caret-down-wrapper i{font-size:19px;line-height:2}.elementor-select-wrapper.remove-before:before{content:""!important}</style>
                                <form id="product-detail-add-to-cart-form" method="post" action="javascript:;" name="New Form">
                                    <input type="hidden" name="post_id" value="491">
                                    <input type="hidden" name="form_id" value="0b98135">
                                    <input type="hidden" name="referer_title" value="Product Page">
                                    <input type="hidden" name="queried_id" value="491">
                                    <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                                    <input type="hidden" name="size" value="{{ isset($productDetails['attributes'][0]) ? $productDetails['attributes'][0]['size']:"" }}">
                                    <div class="elementor-form-fields-wrapper elementor-labels-">
                                        <div class="elementor-field-type-number elementor-field-group elementor-column elementor-field-group-name elementor-col-20 elementor-field-required">
                                            <label for="form-field-name" class="elementor-field-label elementor-screen-only">Quantity</label>
                                            <input
                                                type="number"
                                                name="quantity"
                                                id="form-field-name"
                                                class="elementor-field elementor-size-sm  elementor-field-textual"
                                                placeholder="1"
                                                required="required"
                                                aria-required="true"
                                                min="1"
                                                max=""
                                                value="1"
                                            >
                                        </div>
                                        <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-25 e-form__buttons elementor-md-60">
                                            <button type="submit" class="elementor-button elementor-size-sm">
                                                <span>
                                                    <span class="elementor-button-icon"></span>
                                                    <span class="elementor-button-text">ADD TO CART</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="elementor-element elementor-element-b451558 elementor-widget elementor-widget-heading"
                    data-id="b451558"
                    data-element_type="widget"
                    data-widget_type="heading.default"
                >
                    <div class="elementor-widget-container">
                        <h6 class="elementor-heading-title elementor-size-default">SKU: KAPITON0001</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    
    @include('front.products.ajax_related_products_listings')


    <div
        class="elementor-element elementor-element-8916704 e-flex e-con-boxed e-con e-parent"
        data-id="8916704"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true">
        <div class="e-con-inner">
            <div
                class="elementor-element elementor-element-bc9eac4 e-flex e-con-boxed elementor-invisible e-con e-child"
                data-id="bc9eac4"
                data-element_type="container"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            >
                <div class="e-con-inner">
                    <div
                        class="elementor-element elementor-element-cdb250b elementor-widget elementor-widget-heading"
                        data-id="cdb250b"
                        data-element_type="widget"
                        data-widget_type="heading.default"
                    >
                        <div class="elementor-widget-container">
                            <h2 class="elementor-heading-title elementor-size-default">CUSTOMER REVIEWS</h2>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-ac0046e e-flex e-con-boxed e-con e-child"
                        data-id="ac0046e"
                        data-element_type="container"
                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    >
                        <div class="e-con-inner">
                            <div
                                class="elementor-element elementor-element-65b7b51 e-con-full e-flex e-con e-child"
                                data-id="65b7b51"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-09dfa96 elementor-widget elementor-widget-rating"
                                    data-id="09dfa96"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-c38b191 elementor-widget elementor-widget-text-editor"
                                    data-id="c38b191"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>
                                            <strong>4.5 out of 5</strong>
                                            <br>Based on 50 reviews
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="elementor-element elementor-element-ea8042d e-con-full e-flex e-con e-child"
                                data-id="ea8042d"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-117e49d elementor-widget elementor-widget-button"
                                    data-id="117e49d"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">ALL REVIEWS</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-1d834c8 elementor-widget elementor-widget-button"
                                    data-id="1d834c8"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">5 Star (30)</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-600f384 elementor-widget elementor-widget-button"
                                    data-id="600f384"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">4 Star (12)</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-68d8a9b elementor-widget elementor-widget-button"
                                    data-id="68d8a9b"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">3 Star (8)</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-3e71e7f elementor-widget elementor-widget-button"
                                    data-id="3e71e7f"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">2 Star (10)</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-2a1a322 elementor-widget elementor-widget-button"
                                    data-id="2a1a322"
                                    data-element_type="widget"
                                    data-widget_type="button.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div class="elementor-button-wrapper">
                                            <a class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                                <span class="elementor-button-content-wrapper">
                                                    <span class="elementor-button-text">1 Star (0)</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="elementor-element elementor-element-f5186bb elementor-align-justify elementor-mobile-align-justify elementor-widget-tablet__width-initial elementor-widget elementor-widget-button"
                                data-id="f5186bb"
                                data-element_type="widget"
                                data-widget_type="button.default"
                            >
                                <div class="elementor-widget-container">
                                    <div class="elementor-button-wrapper">
                                        <a id="write_review_btn" class="elementor-button elementor-button-link elementor-size-sm" href="#">
                                            <span class="elementor-button-content-wrapper">
                                                <span class="elementor-button-text">WRITE A REVIEW</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        id="form_write_review"
                        class="elementor-element elementor-element-1dc2f32 elementor-widget__width-initial elementor-button-align-stretch elementor-widget elementor-widget-form"
                        data-id="1dc2f32"
                        data-element_type="widget"
                        data-settings="{&quot;step_next_label&quot;:&quot;Next&quot;,&quot;step_previous_label&quot;:&quot;Previous&quot;,&quot;button_width&quot;:&quot;100&quot;,&quot;step_type&quot;:&quot;number_text&quot;,&quot;step_icon_shape&quot;:&quot;circle&quot;}"
                        data-widget_type="form.default"
                    >
                        <div class="elementor-widget-container">
                            <form class="elementor-form" method="post" name="Write a review">
                                <input type="hidden" name="post_id" value="491">
                                <input type="hidden" name="form_id" value="1dc2f32">
                                <input type="hidden" name="referer_title" value="Product Page">
                                <input type="hidden" name="queried_id" value="491">
                                <div class="elementor-form-fields-wrapper elementor-labels-">
                                    <div class="elementor-field-type-html elementor-field-group elementor-column elementor-field-group-field_e12c23e elementor-col-100">
                                        <h3 style="text-align: center; margin-bottom: 0px; color: #5F7A61">
                                            <b>Write a Review</b>
                                        </h3>
                                    </div>
                                    <div class="elementor-field-type-html elementor-field-group elementor-column elementor-field-group-field_2c1b095 elementor-col-100">
                                        <label style="text-align: center; width: 100%;">
                                            <b>Rating</b>
                                        </label>
                                        <div class="rating">
                                            <input
                                                type="radio"
                                                id="star5"
                                                name="rating"
                                                value="5"
                                                checked
                                            >
                                            <label for="star5"></label>
                                            <input
                                                type="radio"
                                                id="star4"
                                                name="rating"
                                                value="4"
                                            >
                                            <label for="star4"></label>
                                            <input
                                                type="radio"
                                                id="star3"
                                                name="rating"
                                                value="3"
                                            >
                                            <label for="star3"></label>
                                            <input
                                                type="radio"
                                                id="star2"
                                                name="rating"
                                                value="2"
                                            >
                                            <label for="star2"></label>
                                            <input
                                                type="radio"
                                                id="star1"
                                                name="rating"
                                                value="1"
                                            >
                                            <label for="star1"></label>
                                        </div>
                                    </div>
                                    <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-field_009055d elementor-col-100 elementor-field-required">
                                        <label for="form-field-field_009055d" class="elementor-field-label elementor-screen-only"> 								Name</label>
                                        <input
                                            size="1"
                                            type="text"
                                            name="form_fields[field_009055d]"
                                            id="form-field-field_009055d"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            placeholder="Name"
                                            required="required"
                                            aria-required="true"
                                        >
                                    </div>
                                    <div class="elementor-field-type-text elementor-field-group elementor-column elementor-field-group-name elementor-col-100 elementor-field-required">
                                        <label for="form-field-name" class="elementor-field-label elementor-screen-only"> 								Review Title</label>
                                        <input
                                            size="1"
                                            type="text"
                                            name="form_fields[name]"
                                            id="form-field-name"
                                            class="elementor-field elementor-size-sm  elementor-field-textual"
                                            placeholder="Review Title"
                                            required="required"
                                            aria-required="true"
                                        >
                                    </div>
                                    <div class="elementor-field-type-textarea elementor-field-group elementor-column elementor-field-group-email elementor-col-100 elementor-field-required">
                                        <label for="form-field-email" class="elementor-field-label elementor-screen-only"> 								Review</label>
                                        <textarea
                                            class="elementor-field-textual elementor-field  elementor-size-sm"
                                            name="form_fields[email]"
                                            id="form-field-email"
                                            rows="5"
                                            placeholder="Write your comments here"
                                            required="required"
                                            aria-required="true"
                                        ></textarea>
                                    </div>
                                    <div class="elementor-field-type-checkbox elementor-field-group elementor-column elementor-field-group-field_e55c601 elementor-col-100">
                                        <label for="form-field-field_e55c601" class="elementor-field-label elementor-screen-only">Write review anonymously</label>
                                        <div class="elementor-field-subgroup">
                                            <span class="elementor-field-option">
                                                <input type="checkbox" value="Write review anonymously" id="form-field-field_e55c601-0" name="accept" required="required" aria-required="true">
                                                <label for="form-field-field_e55c601-0">Write review anonymously</label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="elementor-field-group elementor-column elementor-field-type-submit elementor-col-100 e-form__buttons">
                                        <button type="submit" class="elementor-button elementor-size-sm">
                                            <span>
                                                <span class="elementor-button-icon"></span>
                                                <span class="elementor-button-text">SUBMIT REVIEW</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="elementor-element elementor-element-4e9dd00 e-flex e-con-boxed elementor-invisible e-con e-child"
                data-id="4e9dd00"
                data-element_type="container"
                data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            >
                <div class="e-con-inner">
                    <div
                        class="elementor-element elementor-element-39c92da e-con-full e-flex e-con e-child"
                        data-id="39c92da"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-09342e6 e-flex e-con-boxed e-con e-child"
                            data-id="09342e6"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-f65f7e3 elementor-widget elementor-widget-rating"
                                    data-id="f65f7e3"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-927c666 elementor-widget elementor-widget-text-editor"
                                    data-id="927c666"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>01/18/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-fa8389b elementor-widget elementor-widget-heading"
                            data-id="fa8389b"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">Rose Cruz
                                    <span>Verified</span>
                                </h5>
                            </div>
                        </div>

                        <div class="reviews_images">
                            <a href="#" class="popup_image_review_link">
                                <img src="{{ asset('front/images/product/no-available-image.jpg')}}">
                            </a>

                            <a href="#" class="popup_image_review_link">
                                <img src="{{ asset('front/images/product/no-available-image.jpg')}}">
                            </a>
                        </div>


                        <div
                            class="elementor-element elementor-element-ca9f8fc elementor-widget elementor-widget-text-editor"
                            data-id="ca9f8fc"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                    <br>Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                </p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-2786fa1 elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-right elementor-widget elementor-widget-icon-list"
                            data-id="2786fa1"
                            data-element_type="widget"
                            data-widget_type="icon-list.default"
                        >
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-up"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">4</span>
                                        </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-down"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-64aab27 e-con-full e-flex e-con e-child"
                        data-id="64aab27"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-bf095c4 e-flex e-con-boxed e-con e-child"
                            data-id="bf095c4"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-832afdd elementor-widget elementor-widget-rating"
                                    data-id="832afdd"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-c2bdc54 elementor-widget elementor-widget-text-editor"
                                    data-id="c2bdc54"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>01/18/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-fe09937 elementor-widget elementor-widget-heading"
                            data-id="fe09937"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">Rose Cruz
                                    <span>Verified</span>
                                </h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-409bcaf elementor-widget elementor-widget-text-editor"
                            data-id="409bcaf"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                    <br>Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.
                                </p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-6b8501a elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-right elementor-widget elementor-widget-icon-list"
                            data-id="6b8501a"
                            data-element_type="widget"
                            data-widget_type="icon-list.default"
                        >
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-up"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">4</span>
                                        </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-down"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-bbb368f e-con-full e-flex e-con e-child"
                        data-id="bbb368f"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-060a26c e-flex e-con-boxed e-con e-child"
                            data-id="060a26c"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-35f1971 elementor-widget elementor-widget-rating"
                                    data-id="35f1971"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-a743912 elementor-widget elementor-widget-text-editor"
                                    data-id="a743912"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>01/18/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-7a8c11d elementor-widget elementor-widget-heading"
                            data-id="7a8c11d"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">Rose Cruz
                                    <span>Verified</span>
                                </h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-027bcbb elementor-widget elementor-widget-text-editor"
                            data-id="027bcbb"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                    <br>Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                </p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-d531215 elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-right elementor-widget elementor-widget-icon-list"
                            data-id="d531215"
                            data-element_type="widget"
                            data-widget_type="icon-list.default"
                        >
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-up"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">4</span>
                                        </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-down"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-3f1398e e-con-full e-flex e-con e-child"
                        data-id="3f1398e"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-864caf0 e-flex e-con-boxed e-con e-child"
                            data-id="864caf0"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-d7be0ad elementor-widget elementor-widget-rating"
                                    data-id="d7be0ad"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-32af42c elementor-widget elementor-widget-text-editor"
                                    data-id="32af42c"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>01/18/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-5d021b7 elementor-widget elementor-widget-heading"
                            data-id="5d021b7"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">Rose Cruz
                                    <span>Verified</span>
                                </h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-16901ef elementor-widget elementor-widget-text-editor"
                            data-id="16901ef"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                    <br>Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                </p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-ebed214 elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-right elementor-widget elementor-widget-icon-list"
                            data-id="ebed214"
                            data-element_type="widget"
                            data-widget_type="icon-list.default"
                        >
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-up"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">4</span>
                                        </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-down"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-f93ba09 e-con-full e-flex e-con e-child"
                        data-id="f93ba09"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-d28e065 e-flex e-con-boxed e-con e-child"
                            data-id="d28e065"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-f88721a elementor-widget elementor-widget-rating"
                                    data-id="f88721a"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-23fb1a1 elementor-widget elementor-widget-text-editor"
                                    data-id="23fb1a1"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>01/18/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-3c5f4fc elementor-widget elementor-widget-heading"
                            data-id="3c5f4fc"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">Rose Cruz
                                    <span>Verified</span>
                                </h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-7d0cc2c elementor-widget elementor-widget-text-editor"
                            data-id="7d0cc2c"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                    <br>Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                </p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-87f7db8 elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-right elementor-widget elementor-widget-icon-list"
                            data-id="87f7db8"
                            data-element_type="widget"
                            data-widget_type="icon-list.default"
                        >
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-up"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">4</span>
                                        </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-down"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-b004388 e-con-full e-flex e-con e-child"
                        data-id="b004388"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-ca834ef e-flex e-con-boxed e-con e-child"
                            data-id="ca834ef"
                            data-element_type="container"
                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                        >
                            <div class="e-con-inner">
                                <div
                                    class="elementor-element elementor-element-3693829 elementor-widget elementor-widget-rating"
                                    data-id="3693829"
                                    data-element_type="widget"
                                    data-widget_type="rating.default"
                                >
                                    <div class="elementor-widget-container">
                                        <div
                                            class="e-rating"
                                            itemtype="https://schema.org/Rating"
                                            itemscope=""
                                            itemprop="reviewRating"
                                        >
                                            <meta itemprop="worstRating" content="0">
                                            <meta itemprop="bestRating" content="5">
                                            <div
                                                class="e-rating-wrapper"
                                                itemprop="ratingValue"
                                                content="4.5"
                                                role="img"
                                                aria-label="Rated 4.5 out of 5"
                                            >
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="e-icon">
                                                    <div class="e-icon-wrapper e-icon-marked" style="--e-rating-icon-marked-width: 50%;">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="e-icon-wrapper e-icon-unmarked">
                                                        <svg
                                                            aria-hidden="true"
                                                            class="e-font-icon-svg e-eicon-star"
                                                            viewbox="0 0 1000 1000"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                        >
                                                            <path d="M450 75L338 312 88 350C46 354 25 417 58 450L238 633 196 896C188 942 238 975 275 954L500 837 725 954C767 975 813 942 804 896L763 633 942 450C975 417 954 358 913 350L663 312 550 75C529 33 471 33 450 75Z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-5243e95 elementor-widget elementor-widget-text-editor"
                                    data-id="5243e95"
                                    data-element_type="widget"
                                    data-widget_type="text-editor.default"
                                >
                                    <div class="elementor-widget-container">
                                        <p>01/18/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-7f7bd83 elementor-widget elementor-widget-heading"
                            data-id="7f7bd83"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">Rose Cruz
                                    <span>Verified</span>
                                </h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-034afc5 elementor-widget elementor-widget-text-editor"
                            data-id="034afc5"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>
                                    <strong>Lorem ipsum dolor sit</strong>
                                    <br>Amet consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.
                                </p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-e071033 elementor-icon-list--layout-inline elementor-list-item-link-inline elementor-align-right elementor-widget elementor-widget-icon-list"
                            data-id="e071033"
                            data-element_type="widget"
                            data-widget_type="icon-list.default"
                        >
                            <div class="elementor-widget-container">
                                <ul class="elementor-icon-list-items elementor-inline-items">
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-up"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">4</span>
                                        </a>
                                    </li>
                                    <li class="elementor-icon-list-item elementor-inline-item">
                                        <a href="#">
                                            <span class="elementor-icon-list-icon">
                                                <svg
                                                    aria-hidden="true"
                                                    class="e-font-icon-svg e-fas-thumbs-down"
                                                    viewbox="0 0 512 512"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                >
                                                    <path d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path>
                                                </svg>
                                            </span>
                                            <span class="elementor-icon-list-text">0</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-f97c986 e-con-full e-flex elementor-invisible e-con e-child"
                        data-id="f97c986"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-45e43bb elementor-align-left elementor-widget elementor-widget-button"
                            data-id="45e43bb"
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
                            class="elementor-element elementor-element-39ce550 elementor-align-left elementor-widget elementor-widget-button"
                            data-id="39ce550"
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
                            class="elementor-element elementor-element-ba7d798 elementor-align-left elementor-widget elementor-widget-button"
                            data-id="ba7d798"
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
                            class="elementor-element elementor-element-57b81fa elementor-align-left elementor-widget elementor-widget-button"
                            data-id="57b81fa"
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
                            class="elementor-element elementor-element-ff0dbc2 elementor-align-left elementor-widget elementor-widget-button"
                            data-id="ff0dbc2"
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
                            class="elementor-element elementor-element-9eee646 elementor-align-left elementor-widget elementor-widget-button"
                            data-id="9eee646"
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
<div class="post-tags"></div>
@endsection