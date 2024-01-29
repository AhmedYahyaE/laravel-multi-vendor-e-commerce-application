<div
    class="elementor-element elementor-element-c9a5113 e-flex e-con-boxed e-con e-parent"
    data-id="c9a5113"
    data-element_type="container"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
    data-core-v316-plus="true"
>
    <div class="e-con-inner">
        <div
            class="elementor-element elementor-element-b3acb66 elementor-widget__width-inherit elementor-invisible elementor-widget elementor-widget-heading"
            data-id="b3acb66"
            data-element_type="widget"
            data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
            data-widget_type="heading.default"
        >
            <div class="elementor-widget-container">
                <h2 class="elementor-heading-title elementor-size-default">RELATED PRODUCTS</h2>
            </div>
        </div>

        @foreach ($similarProducts as $product)
        @php
            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
        @endphp
        <div
            class="elementor-element elementor-element-34808d4 e-con-full e-flex elementor-invisible e-con e-child"
            data-id="34808d4"
            data-element_type="container"
            data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;container_type&quot;:&quot;flex&quot;}">
            <div
                class="elementor-element elementor-element-72ef1d2 elementor-widget__width-inherit elementor-widget elementor-widget-image"
                data-id="72ef1d2"
                data-element_type="widget"
                data-widget_type="image.default"
            >
                <div class="elementor-widget-container">
                    <a href="{{ url('product/' . $product['id']) }}">
                    @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- if the product image exists in BOTH database table AND filesystem (on server) --}}
                        <img
                            loading="lazy"
                            decoding="async"
                            width="800"
                            height="968"
                            src="{{ asset($product_image_path) }}"
                            class="attachment-large size-large wp-image-422"
                            alt=""
                            srcset="{{ asset($product_image_path) }} 846w, {{ asset($product_image_path) }} 248w, {{ asset($product_image_path) }} 768w, {{ asset($product_image_path) }} 879w"
                            sizes="(max-width: 800px) 100vw, 800px"
                        >
                    @else {{-- show the dummy image --}}
                        <img
                            loading="lazy"
                            decoding="async"
                            width="800"
                            height="968"
                            src="{{ asset('front/images/product/no-available-image.jpg')}}"
                            class="attachment-large size-large wp-image-422"
                            alt=""
                            srcset="{{ asset('front/images/product/no-available-image.jpg')}} 846w, {{ asset('front/images/product/no-available-image.jpg')}} 248w, {{ asset('front/images/product/no-available-image.jpg')}} 768w, {{ asset('front/images/product/no-available-image.jpg')}} 879w"
                            sizes="(max-width: 800px) 100vw, 800px"
                        >
                    @endif
                    </a>
                </div>
            </div>
            <div
                class="elementor-element elementor-element-130ac6a elementor-widget__width-inherit elementor-widget elementor-widget-heading"
                data-id="130ac6a"
                data-element_type="widget"
                data-widget_type="heading.default"
            >
                <div class="elementor-widget-container">
                    <h2 class="elementor-heading-title elementor-size-default">{{ $product['product_name'] }}</h2>
                </div>
            </div>
            {{-- Call the static getDiscountPrice() method in the Product.php Model to determine the final price of a product because a product can have a discount from TWO things: either a `CATEGORY` discount or `PRODUCT` discout     --}}
            @php
                $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
            @endphp

            @if ($getDiscountPrice > 0) {{-- If there's a discount on the price, show the price before (the original price) and after (the new price) the discount --}}
            <div
                class="elementor-element elementor-element-482d1e5 elementor-widget elementor-widget-text-editor"
                data-id="482d1e5"
                data-element_type="widget"
                data-widget_type="text-editor.default"
            >
                <div class="elementor-widget-container">
                    <p> ₱{{$getDiscountPrice}}</p>
                </div>
            </div>
            <div
                class="elementor-element elementor-element-7435885 elementor-widget elementor-widget-text-editor"
                data-id="7435885"
                data-element_type="widget"
                data-widget_type="text-editor.default"
            >
                <div class="elementor-widget-container">
                    <em style="text-decoration: line-through;">₱{{$product['product_price']}}</em>
                </div>
            </div>
            @else
            <div
                class="elementor-element elementor-element-482d1e5 elementor-widget elementor-widget-text-editor"
                data-id="482d1e5"
                data-element_type="widget"
                data-widget_type="text-editor.default"
            >
                <div class="elementor-widget-container">
                    <p> ₱{{$product['product_price']}}</p>
                </div>
            </div>
            @endif
            <div
                class="elementor-element elementor-element-288cf62 e-flex e-con-boxed e-con e-child"
                data-id="288cf62"
                data-element_type="container"
                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            >
                <div class="e-con-inner">
                    <div
                        class="elementor-element elementor-element-97a0459 e-con-full e-flex e-con e-child"
                        data-id="97a0459"
                        data-element_type="container"
                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                    >
                        <div
                            class="elementor-element elementor-element-b1a54c1 elementor-widget elementor-widget-image"
                            data-id="b1a54c1"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    decoding="async"
                                    width="300"
                                    height="300"
                                    src="./images/2023-12-user.png"
                                    class="attachment-large size-large wp-image-423"
                                    alt=""
                                    srcset="./images/2023-12-user.png 300w, ./images/2023-12-user-150x150.png 150w"
                                    sizes="(max-width: 300px) 100vw, 300px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-de8aaff elementor-widget elementor-widget-heading"
                            data-id="de8aaff"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">{{$product['vendor']['name']}}</h5>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-9c2e47e elementor-widget elementor-widget-rating"
                        data-id="9c2e47e"
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
                                    content="4"
                                    role="img"
                                    aria-label="Rated 4 out of 5"
                                >
                                    @for ($x = 0; $x < 5; $x++)
                                    @php
                                        $marked = \App\Models\Product::product_computed_ratings($product['id']);
                                    @endphp
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
            </div>
        </div>
        @endforeach
    
    </div>
</div>