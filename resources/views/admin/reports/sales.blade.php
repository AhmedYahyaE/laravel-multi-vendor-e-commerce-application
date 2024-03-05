@extends('admin.layout.layout')


@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                        <div
    data-elementor-type="wp-page"
    data-elementor-id="1286"
    class="elementor elementor-1286"
    data-elementor-post-type="page">
    <div
        class="elementor-element elementor-element-845a870 e-flex e-con-boxed e-con e-parent"
        data-id="845a870"
        data-element_type="container"
        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
        data-core-v316-plus="true"
    >
        <div class="e-con-inner no-padding">
            <div
                class="elementor-element elementor-element-0704237 e-flex e-con-boxed e-con e-child"
                data-id="0704237"
                data-element_type="container"
                data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
            >
                <div class="e-con-inner">
                    <div
                        class="elementor-element elementor-element-5a83e69 elementor-invisible elementor-widget elementor-widget-heading"
                        data-id="5a83e69"
                        data-element_type="widget"
                        data-settings="{&quot;_animation&quot;:&quot;fadeInUp&quot;}"
                        data-widget_type="heading.default"
                    >
                        <div class="elementor-widget-container">
                            <h1 class="elementor-heading-title elementor-size-default">SALES REPORT</h1>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-788fcae elementor-widget elementor-widget-html"
                        data-id="788fcae"
                        data-element_type="widget"
                        data-widget_type="html.default"
                    >
                        <div class="elementor-widget-container">
                            <script src="https://www.gstatic.com/charts/loader.js"></script>
                            <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-6d1530b e-flex e-con-boxed e-con e-child"
                        data-id="6d1530b"
                        data-element_type="container"
                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    >
                        <div class="e-con-inner">
                            <div
                                class="elementor-element elementor-element-4560fd4 e-con-full e-flex e-con e-child"
                                data-id="4560fd4"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-204c77b e-flex e-con-boxed e-con e-child"
                                    data-id="204c77b"
                                    data-element_type="container"
                                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-53c7c66 elementor-widget elementor-widget-text-editor"
                                            data-id="53c7c66"
                                            data-element_type="widget"
                                            data-widget_type="text-editor.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <style>/*! elementor - v3.18.0 - 08-12-2023 */ .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap{background-color:#69727d;color:#fff}.elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap{color:#69727d;border:3px solid;background-color:transparent}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap{margin-top:8px}.elementor-widget-text-editor:not(.elementor-drop-cap-view-default) .elementor-drop-cap-letter{width:1em;height:1em}.elementor-widget-text-editor .elementor-drop-cap{float:left;text-align:center;line-height:1;font-size:50px}.elementor-widget-text-editor .elementor-drop-cap-letter{display:inline-block}</style>
                                                <p>
                                                    <strong>Realtime Performance</strong>
                                                </p>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-b69c49b elementor-widget elementor-widget-html"
                                            data-id="b69c49b"
                                            data-element_type="widget"
                                            data-widget_type="html.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <select>
                                                    <option value="Today">Today</option>
                                                    <option value="Yesterday">Yesterday</option>
                                                    <option value="Last 7 Days">Last 7 Days</option>
                                                    <option value="Last Month">Last Month</option>
                                                    <option value="All Time">All Time</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-665d48d e-con-full e-flex e-con e-child"
                                    data-id="665d48d"
                                    data-element_type="container"
                                    data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                >
                                    <div
                                        class="elementor-element elementor-element-2b323fb e-n-tabs-mobile elementor-widget elementor-widget-n-tabs"
                                        data-id="2b323fb"
                                        data-element_type="widget"
                                        data-widget_type="nested-tabs.default"
                                    >
                                        <div class="elementor-widget-container">
                                            <div class="e-n-tabs" data-widget-number="452" aria-label="Tabs. Open items with Enter or Space, close with Escape and navigate using the Arrow keys.">
                                                <div class="e-n-tabs-heading" role="tablist">
                                                    <button
                                                        id="e-n-tabs-title-4521"
                                                        class="e-n-tab-title"
                                                        aria-selected="true"
                                                        data-tab-index="1"
                                                        role="tab"
                                                        tabindex="0"
                                                        aria-controls="e-n-tab-content-4521"
                                                        style="--n-tabs-title-order: 1;"
                                                    >
                                                        <span class="e-n-tab-icon">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-wallet"
                                                                viewbox="0 0 512 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M461.2 128H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h384c8.84 0 16-7.16 16-16 0-26.51-21.49-48-48-48H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h397.2c28.02 0 50.8-21.53 50.8-48V176c0-26.47-22.78-48-50.8-48zM416 336c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path>
                                                            </svg>
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-wallet"
                                                                viewbox="0 0 512 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M461.2 128H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h384c8.84 0 16-7.16 16-16 0-26.51-21.49-48-48-48H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h397.2c28.02 0 50.8-21.53 50.8-48V176c0-26.47-22.78-48-50.8-48zM416 336c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="e-n-tab-title-text"> 					Revenue</span>
                                                    </button>
                                                    <button
                                                        id="e-n-tabs-title-4522"
                                                        class="e-n-tab-title"
                                                        aria-selected="false"
                                                        data-tab-index="2"
                                                        role="tab"
                                                        tabindex="-1"
                                                        aria-controls="e-n-tab-content-4522"
                                                        style="--n-tabs-title-order: 2;"
                                                    >
                                                        <span class="e-n-tab-icon">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-user-check"
                                                                viewbox="0 0 640 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zm323-128.4l-27.8-28.1c-4.6-4.7-12.1-4.7-16.8-.1l-104.8 104-45.5-45.8c-4.6-4.7-12.1-4.7-16.8-.1l-28.1 27.9c-4.7 4.6-4.7 12.1-.1 16.8l81.7 82.3c4.6 4.7 12.1 4.7 16.8.1l141.3-140.2c4.6-4.7 4.7-12.2.1-16.8z"></path>
                                                            </svg>
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-user-check"
                                                                viewbox="0 0 640 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zm323-128.4l-27.8-28.1c-4.6-4.7-12.1-4.7-16.8-.1l-104.8 104-45.5-45.8c-4.6-4.7-12.1-4.7-16.8-.1l-28.1 27.9c-4.7 4.6-4.7 12.1-.1 16.8l81.7 82.3c4.6 4.7 12.1 4.7 16.8.1l141.3-140.2c4.6-4.7 4.7-12.2.1-16.8z"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="e-n-tab-title-text"> 					Visitors</span>
                                                    </button>
                                                    <button
                                                        id="e-n-tabs-title-4523"
                                                        class="e-n-tab-title"
                                                        aria-selected="false"
                                                        data-tab-index="3"
                                                        role="tab"
                                                        tabindex="-1"
                                                        aria-controls="e-n-tab-content-4523"
                                                        style="--n-tabs-title-order: 3;"
                                                    >
                                                        <span class="e-n-tab-icon">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-cart-plus"
                                                                viewbox="0 0 576 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                                            </svg>
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-cart-plus"
                                                                viewbox="0 0 576 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="e-n-tab-title-text"> 					Buyers</span>
                                                    </button>
                                                    <button
                                                        id="e-n-tabs-title-4524"
                                                        class="e-n-tab-title"
                                                        aria-selected="false"
                                                        data-tab-index="4"
                                                        role="tab"
                                                        tabindex="-1"
                                                        aria-controls="e-n-tab-content-4524"
                                                        style="--n-tabs-title-order: 4;"
                                                    >
                                                        <span class="e-n-tab-icon">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-check"
                                                                viewbox="0 0 512 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                            </svg>
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-check"
                                                                viewbox="0 0 512 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="e-n-tab-title-text"> 					Page Views</span>
                                                    </button>
                                                    <button
                                                        id="e-n-tabs-title-4525"
                                                        class="e-n-tab-title"
                                                        aria-selected="false"
                                                        data-tab-index="5"
                                                        role="tab"
                                                        tabindex="-1"
                                                        aria-controls="e-n-tab-content-4525"
                                                        style="--n-tabs-title-order: 5;"
                                                    >
                                                        <span class="e-n-tab-icon">
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-clipboard-list"
                                                                viewbox="0 0 384 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"></path>
                                                            </svg>
                                                            <svg
                                                                aria-hidden="true"
                                                                class="e-font-icon-svg e-fas-clipboard-list"
                                                                viewbox="0 0 384 512"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                            >
                                                                <path d="M336 64h-80c0-35.3-28.7-64-64-64s-64 28.7-64 64H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48zM96 424c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm0-96c-13.3 0-24-10.7-24-24s10.7-24 24-24 24 10.7 24 24-10.7 24-24 24zm96-192c13.3 0 24 10.7 24 24s-10.7 24-24 24-24-10.7-24-24 10.7-24 24-24zm128 368c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16zm0-96c0 4.4-3.6 8-8 8H168c-4.4 0-8-3.6-8-8v-16c0-4.4 3.6-8 8-8h144c4.4 0 8 3.6 8 8v16z"></path>
                                                            </svg>
                                                        </span>
                                                        <span class="e-n-tab-title-text"> 					Orders</span>
                                                    </button>
                                                </div>
                                                <div class="e-n-tabs-content">
                                                    <div
                                                        id="e-n-tab-content-4521"
                                                        role="tabpanel"
                                                        aria-labelledby="e-n-tabs-title-4521"
                                                        data-tab-index="1"
                                                        style="--n-tabs-title-order: 1;"
                                                        class="e-active elementor-element elementor-element-6f012cd e-con-full e-flex e-con e-child"
                                                        data-id="6f012cd"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-49b1bf5 e-flex e-con-boxed e-con e-child"
                                                            data-id="49b1bf5"
                                                            data-element_type="container"
                                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                        >
                                                            <div class="e-con-inner">
                                                                <div
                                                                    class="elementor-element elementor-element-35ead5f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                                    data-id="35ead5f"
                                                                    data-element_type="widget"
                                                                    data-widget_type="icon-list.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <ul class="elementor-icon-list-items">
                                                                            <li class="elementor-icon-list-item">
                                                                                <span class="elementor-icon-list-icon">
                                                                                    <svg
                                                                                        aria-hidden="true"
                                                                                        class="e-font-icon-svg e-fas-wallet"
                                                                                        viewbox="0 0 512 512"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                    >
                                                                                        <path d="M461.2 128H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h384c8.84 0 16-7.16 16-16 0-26.51-21.49-48-48-48H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h397.2c28.02 0 50.8-21.53 50.8-48V176c0-26.47-22.78-48-50.8-48zM416 336c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <span class="elementor-icon-list-text">Revenue</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-d90bd23 elementor-widget elementor-widget-heading"
                                                                    data-id="d90bd23"
                                                                    data-element_type="widget"
                                                                    data-widget_type="heading.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <h1 class="elementor-heading-title elementor-size-default">
                                                                            <span>₱</span> 25,968.00
                                                                        </h1>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-2cd92de elementor-widget elementor-widget-html"
                                                                    data-id="2cd92de"
                                                                    data-element_type="widget"
                                                                    data-widget_type="html.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <div id="revenue-chart" style="width:100%; max-width:590px; height: 400px"></div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        id="e-n-tab-content-4522"
                                                        role="tabpanel"
                                                        aria-labelledby="e-n-tabs-title-4522"
                                                        data-tab-index="2"
                                                        style="--n-tabs-title-order: 2;"
                                                        class="elementor-element elementor-element-fb57a37 e-con-full e-flex e-con e-child"
                                                        data-id="fb57a37"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-449f363 e-flex e-con-boxed e-con e-child"
                                                            data-id="449f363"
                                                            data-element_type="container"
                                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                        >
                                                            <div class="e-con-inner">
                                                                <div
                                                                    class="elementor-element elementor-element-2692b4d elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                                    data-id="2692b4d"
                                                                    data-element_type="widget"
                                                                    data-widget_type="icon-list.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <ul class="elementor-icon-list-items">
                                                                            <li class="elementor-icon-list-item">
                                                                                <span class="elementor-icon-list-icon">
                                                                                    <svg
                                                                                        aria-hidden="true"
                                                                                        class="e-font-icon-svg e-fas-user-check"
                                                                                        viewbox="0 0 640 512"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                    >
                                                                                        <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4zm323-128.4l-27.8-28.1c-4.6-4.7-12.1-4.7-16.8-.1l-104.8 104-45.5-45.8c-4.6-4.7-12.1-4.7-16.8-.1l-28.1 27.9c-4.7 4.6-4.7 12.1-.1 16.8l81.7 82.3c4.6 4.7 12.1 4.7 16.8.1l141.3-140.2c4.6-4.7 4.7-12.2.1-16.8z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <span class="elementor-icon-list-text">Visitors</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-7856963 elementor-widget elementor-widget-heading"
                                                                    data-id="7856963"
                                                                    data-element_type="widget"
                                                                    data-widget_type="heading.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <h1 class="elementor-heading-title elementor-size-default">2,734</h1>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-978f019 elementor-widget elementor-widget-html"
                                                                    data-id="978f019"
                                                                    data-element_type="widget"
                                                                    data-widget_type="html.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <div id="visitors-chart" style="width:100%; max-width:590px; height: 400px"></div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        id="e-n-tab-content-4523"
                                                        role="tabpanel"
                                                        aria-labelledby="e-n-tabs-title-4523"
                                                        data-tab-index="3"
                                                        style="--n-tabs-title-order: 3;"
                                                        class="elementor-element elementor-element-93fc740 e-con-full e-flex e-con e-child"
                                                        data-id="93fc740"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-8aee3ac e-flex e-con-boxed e-con e-child"
                                                            data-id="8aee3ac"
                                                            data-element_type="container"
                                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                        >
                                                            <div class="e-con-inner">
                                                                <div
                                                                    class="elementor-element elementor-element-c83920f elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                                    data-id="c83920f"
                                                                    data-element_type="widget"
                                                                    data-widget_type="icon-list.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <ul class="elementor-icon-list-items">
                                                                            <li class="elementor-icon-list-item">
                                                                                <span class="elementor-icon-list-icon">
                                                                                    <svg
                                                                                        aria-hidden="true"
                                                                                        class="e-font-icon-svg e-fas-cart-plus"
                                                                                        viewbox="0 0 576 512"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                    >
                                                                                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <span class="elementor-icon-list-text">Buyers</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-d7e38b2 elementor-widget elementor-widget-heading"
                                                                    data-id="d7e38b2"
                                                                    data-element_type="widget"
                                                                    data-widget_type="heading.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <h1 class="elementor-heading-title elementor-size-default">541</h1>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-b090dd5 elementor-widget elementor-widget-html"
                                                                    data-id="b090dd5"
                                                                    data-element_type="widget"
                                                                    data-widget_type="html.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <div id="buyers-chart" style="width:100%; max-width:590px; height: 400px"></div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        id="e-n-tab-content-4524"
                                                        role="tabpanel"
                                                        aria-labelledby="e-n-tabs-title-4524"
                                                        data-tab-index="4"
                                                        style="--n-tabs-title-order: 4;"
                                                        class="elementor-element elementor-element-e4ccc9d e-con-full e-flex e-con e-child"
                                                        data-id="e4ccc9d"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-cd4e69a e-flex e-con-boxed e-con e-child"
                                                            data-id="cd4e69a"
                                                            data-element_type="container"
                                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                        >
                                                            <div class="e-con-inner">
                                                                <div
                                                                    class="elementor-element elementor-element-966ace2 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                                    data-id="966ace2"
                                                                    data-element_type="widget"
                                                                    data-widget_type="icon-list.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <ul class="elementor-icon-list-items">
                                                                            <li class="elementor-icon-list-item">
                                                                                <span class="elementor-icon-list-icon">
                                                                                    <svg
                                                                                        aria-hidden="true"
                                                                                        class="e-font-icon-svg e-fas-check"
                                                                                        viewbox="0 0 512 512"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                    >
                                                                                        <path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <span class="elementor-icon-list-text">Page Views</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-c301273 elementor-widget elementor-widget-heading"
                                                                    data-id="c301273"
                                                                    data-element_type="widget"
                                                                    data-widget_type="heading.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <h1 class="elementor-heading-title elementor-size-default">3,221</h1>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-7a4b1c5 elementor-widget elementor-widget-html"
                                                                    data-id="7a4b1c5"
                                                                    data-element_type="widget"
                                                                    data-widget_type="html.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <div id="pageviews-chart" style="width:100%; max-width:590px; height: 400px"></div>
                                                                     
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        id="e-n-tab-content-4525"
                                                        role="tabpanel"
                                                        aria-labelledby="e-n-tabs-title-4525"
                                                        data-tab-index="5"
                                                        style="--n-tabs-title-order: 5;"
                                                        class="elementor-element elementor-element-a9c9762 e-con-full e-flex e-con e-child"
                                                        data-id="a9c9762"
                                                        data-element_type="container"
                                                        data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                                                    >
                                                        <div
                                                            class="elementor-element elementor-element-1a1781e e-flex e-con-boxed e-con e-child"
                                                            data-id="1a1781e"
                                                            data-element_type="container"
                                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                                        >
                                                            <div class="e-con-inner">
                                                                <div
                                                                    class="elementor-element elementor-element-bf10ce1 elementor-icon-list--layout-traditional elementor-list-item-link-full_width elementor-widget elementor-widget-icon-list"
                                                                    data-id="bf10ce1"
                                                                    data-element_type="widget"
                                                                    data-widget_type="icon-list.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <ul class="elementor-icon-list-items">
                                                                            <li class="elementor-icon-list-item">
                                                                                <span class="elementor-icon-list-icon">
                                                                                    <svg
                                                                                        aria-hidden="true"
                                                                                        class="e-font-icon-svg e-fas-book"
                                                                                        viewbox="0 0 448 512"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                    >
                                                                                        <path d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                                                                    </svg>
                                                                                </span>
                                                                                <span class="elementor-icon-list-text">Orders</span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-c06c70c elementor-widget elementor-widget-heading"
                                                                    data-id="c06c70c"
                                                                    data-element_type="widget"
                                                                    data-widget_type="heading.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <h1 class="elementor-heading-title elementor-size-default">5,241</h1>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="elementor-element elementor-element-2ec8eca elementor-widget elementor-widget-html"
                                                                    data-id="2ec8eca"
                                                                    data-element_type="widget"
                                                                    data-widget_type="html.default"
                                                                >
                                                                    <div class="elementor-widget-container">
                                                                        <div id="orders-chart" style="width:100%; max-width:590px; height: 400px"></div>
                                                                       
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
                            <div
                                class="elementor-element elementor-element-5172301 e-con-full e-flex e-con e-child"
                                data-id="5172301"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-15e2857 e-flex e-con-boxed e-con e-child"
                                    data-id="15e2857"
                                    data-element_type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-87d2da3 e-flex e-con-boxed e-con e-child"
                                            data-id="87d2da3"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-6b70f74 elementor-widget elementor-widget-text-editor"
                                                    data-id="6b70f74"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Top Selling Products</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-31ff876 elementor-widget elementor-widget-html"
                                                    data-id="31ff876"
                                                    data-element_type="widget"
                                                    data-widget_type="html.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <select>
                                                            <option value="Today">Today</option>
                                                            <option value="Yesterday">Yesterday</option>
                                                            <option value="Last 7 Days">Last 7 Days</option>
                                                            <option value="Last Month">Last Month</option>
                                                            <option value="All Time">All Time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-bdd4fbb e-flex e-con-boxed e-con e-child"
                                            data-id="bdd4fbb"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-695296f elementor-widget elementor-widget-text-editor"
                                                    data-id="695296f"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Product</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-853c011 elementor-widget elementor-widget-text-editor"
                                                    data-id="853c011"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>#</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-121d543 e-flex e-con-boxed e-con e-child"
                                            data-id="121d543"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-f7bd8db elementor-widget elementor-widget-text-editor"
                                                    data-id="f7bd8db"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Classic Polo Shirt</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-f75b162 elementor-widget elementor-widget-text-editor"
                                                    data-id="f75b162"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>3,531</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-14d1b92 e-flex e-con-boxed e-con e-child"
                                            data-id="14d1b92"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-b79c5d1 elementor-widget elementor-widget-text-editor"
                                                    data-id="b79c5d1"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>High-End Gaming Smartphone</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-557c49e elementor-widget elementor-widget-text-editor"
                                                    data-id="557c49e"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>2,559</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-3507d37 e-flex e-con-boxed e-con e-child"
                                            data-id="3507d37"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-df82086 elementor-widget elementor-widget-text-editor"
                                                    data-id="df82086"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Pro Camera Smartphone</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-870386d elementor-widget elementor-widget-text-editor"
                                                    data-id="870386d"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>1,321</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-8fafae3 e-flex e-con-boxed e-con e-child"
                                            data-id="8fafae3"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-636193f elementor-widget elementor-widget-text-editor"
                                                    data-id="636193f"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Interactive Learning Toy</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-4490455 elementor-widget elementor-widget-text-editor"
                                                    data-id="4490455"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>788</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-0d108f4 e-flex e-con-boxed e-con e-child"
                                            data-id="0d108f4"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-9937e4f elementor-widget elementor-widget-text-editor"
                                                    data-id="9937e4f"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Creative Art Kit</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-65207be elementor-widget elementor-widget-text-editor"
                                                    data-id="65207be"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>123</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-84d47c2 e-flex e-con-boxed e-con e-child"
                                            data-id="84d47c2"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-3e85367 elementor-widget elementor-widget-text-editor"
                                                    data-id="3e85367"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Formal Business Shirt</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-540f2fd elementor-widget elementor-widget-text-editor"
                                                    data-id="540f2fd"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>80</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-9a44e56 e-flex e-con-boxed e-con e-child"
                                            data-id="9a44e56"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-cb38aa5 elementor-widget elementor-widget-text-editor"
                                                    data-id="cb38aa5"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Interactive Learning Toy</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-32903cc elementor-widget elementor-widget-text-editor"
                                                    data-id="32903cc"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>53</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-5f9e4ce e-flex e-con-boxed e-con e-child"
                                            data-id="5f9e4ce"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-1431caa elementor-widget elementor-widget-text-editor"
                                                    data-id="1431caa"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Pro Camera Smartphone</b>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-a6973dd elementor-widget elementor-widget-text-editor"
                                                    data-id="a6973dd"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>12</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="elementor-element elementor-element-5d724d5 e-flex e-con-boxed e-con e-child"
                                    data-id="5d724d5"
                                    data-element_type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;slideshow&quot;,&quot;background_slideshow_gallery&quot;:[{&quot;id&quot;:1503,&quot;url&quot;:&quot;https:\/\/kapiton.seikodesigns.com\/wp-content\/uploads\/2024\/02\/TB1Wodes4naK1RjSZFtXXbC2VXa-420-193.jpg&quot;},{&quot;id&quot;:1504,&quot;url&quot;:&quot;https:\/\/kapiton.seikodesigns.com\/wp-content\/uploads\/2024\/02\/O1CN01CPKVqy1SYDC5atlgE_6000000002258-2-tps-832-360.png&quot;}],&quot;background_slideshow_slide_duration&quot;:2000,&quot;background_slideshow_ken_burns&quot;:&quot;yes&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;,&quot;background_slideshow_loop&quot;:&quot;yes&quot;,&quot;background_slideshow_slide_transition&quot;:&quot;fade&quot;,&quot;background_slideshow_transition_duration&quot;:500,&quot;background_slideshow_ken_burns_zoom_direction&quot;:&quot;in&quot;}"
                                >
                                    <div class="e-con-inner"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="elementor-element elementor-element-846caf8 e-flex e-con-boxed e-con e-child"
                        data-id="846caf8"
                        data-element_type="container"
                        data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    >
                        <div class="e-con-inner">
                            <div
                                class="elementor-element elementor-element-49757dc e-con-full e-flex e-con e-child"
                                data-id="49757dc"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-3a4f95a e-flex e-con-boxed e-con e-child"
                                    data-id="3a4f95a"
                                    data-element_type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-5e30505 e-flex e-con-boxed e-con e-child"
                                            data-id="5e30505"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-a48f5b8 elementor-widget elementor-widget-text-editor"
                                                    data-id="a48f5b8"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>Conversion Rate</b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-5f0e6d5 e-flex e-con-boxed e-con e-child"
                                            data-id="5f0e6d5"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-bee2fa0 elementor-widget elementor-widget-text-editor"
                                                    data-id="bee2fa0"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <b>2.25%</b>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-e35eae0 e-flex e-con-boxed e-con e-child"
                                            data-id="e35eae0"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-684d5d9 elementor-widget elementor-widget-text-editor"
                                                    data-id="684d5d9"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Added to cart
                                                                <br>
                                                            </strong>212 sessions
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-f41d3af elementor-widget elementor-widget-text-editor"
                                                    data-id="f41d3af"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>3.92%</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-01a1f2f e-flex e-con-boxed e-con e-child"
                                            data-id="01a1f2f"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-4bef69c elementor-widget elementor-widget-text-editor"
                                                    data-id="4bef69c"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Reached checkout
                                                                <br>
                                                            </strong>321 sessions
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-e084835 elementor-widget elementor-widget-text-editor"
                                                    data-id="e084835"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>3.55%</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-c1102f7 e-flex e-con-boxed e-con e-child"
                                            data-id="c1102f7"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-c0cabd3 elementor-widget elementor-widget-text-editor"
                                                    data-id="c0cabd3"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Sessions converted
                                                                <br>
                                                            </strong>166 sessions
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-79b24cf elementor-widget elementor-widget-text-editor"
                                                    data-id="79b24cf"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>2.48%</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="elementor-element elementor-element-1d0bb72 e-con-full e-flex e-con e-child"
                                data-id="1d0bb72"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-0a5e50a e-flex e-con-boxed e-con e-child"
                                    data-id="0a5e50a"
                                    data-element_type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-56fa488 e-flex e-con-boxed e-con e-child"
                                            data-id="56fa488"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-9495eb9 elementor-widget elementor-widget-text-editor"
                                                    data-id="9495eb9"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Session by social source</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-ed6c065 elementor-widget elementor-widget-html"
                                                    data-id="ed6c065"
                                                    data-element_type="widget"
                                                    data-widget_type="html.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <select>
                                                            <option value="Today">Today</option>
                                                            <option value="Yesterday">Yesterday</option>
                                                            <option value="Last 7 Days">Last 7 Days</option>
                                                            <option value="Last Month">Last Month</option>
                                                            <option value="All Time">All Time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-dffea85 elementor-widget elementor-widget-html"
                                            data-id="dffea85"
                                            data-element_type="widget"
                                            data-widget_type="html.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <div id="socials-chart" style="width:100%; max-width:590px; height: 250px"></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="elementor-element elementor-element-9024317 e-con-full e-flex e-con e-child"
                                data-id="9024317"
                                data-element_type="container"
                                data-settings="{&quot;content_width&quot;:&quot;full&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;}"
                            >
                                <div
                                    class="elementor-element elementor-element-5da3e6f e-flex e-con-boxed e-con e-child"
                                    data-id="5da3e6f"
                                    data-element_type="container"
                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                >
                                    <div class="e-con-inner">
                                        <div
                                            class="elementor-element elementor-element-c302961 e-flex e-con-boxed e-con e-child"
                                            data-id="c302961"
                                            data-element_type="container"
                                            data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                                        >
                                            <div class="e-con-inner">
                                                <div
                                                    class="elementor-element elementor-element-7389bfd elementor-widget elementor-widget-text-editor"
                                                    data-id="7389bfd"
                                                    data-element_type="widget"
                                                    data-widget_type="text-editor.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <p>
                                                            <strong>Session by device type</strong>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="elementor-element elementor-element-c97546f elementor-widget elementor-widget-html"
                                                    data-id="c97546f"
                                                    data-element_type="widget"
                                                    data-widget_type="html.default"
                                                >
                                                    <div class="elementor-widget-container">
                                                        <select>
                                                            <option value="Today">Today</option>
                                                            <option value="Yesterday">Yesterday</option>
                                                            <option value="Last 7 Days">Last 7 Days</option>
                                                            <option value="Last Month">Last Month</option>
                                                            <option value="All Time">All Time</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="elementor-element elementor-element-cec862e elementor-widget elementor-widget-html"
                                            data-id="cec862e"
                                            data-element_type="widget"
                                            data-widget_type="html.default"
                                        >
                                            <div class="elementor-widget-container">
                                                <div id="device-chart" style="width:100%; max-width:590px; height: 250px"></div>
                                                
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

                        </div>





                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection