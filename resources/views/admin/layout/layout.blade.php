<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



        {{-- X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token --}} 
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <title>Admin Panel</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="{{ url('admin/vendors/feather/feather.css') }}">
        <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ url('admin/vendors/css/vendor.bundle.base.css') }}">
        <!-- endinject -->


        <!-- Plugin css for this page (The icons from Skydash Admin Panel template) -->
        <link rel="stylesheet" href="{{ url('admin/vendors/mdi/css/materialdesignicons.min.css')}}">


        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ url('admin/vendors/ti-icons/css/themify-icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ url('admin/js/select.dataTables.min.css') }}">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{ url('admin/css/vertical-layout-light/style.css') }}">
        <!-- endinject -->
        <link rel="shortcut icon" href="{{ url('admin/images/favicon.jpg') }}" />

        {{-- Elementor --}}
        <style id="wp-emoji-styles-inline-css">  	img.wp-smiley, img.emoji { 		display: inline !important; 		border: none !important; 		box-shadow: none !important; 		height: 1em !important; 		width: 1em !important; 		margin: 0 0.07em !important; 		vertical-align: -0.1em !important; 		background: none !important; 		padding: 0 !important; 	}</style>
        <style id="classic-theme-styles-inline-css"> /*! This file is auto-generated */ .wp-block-button__link{color:#fff;background-color:#32373c;border-radius:9999px;box-shadow:none;text-decoration:none;padding:calc(.667em + 2px) calc(1.333em + 2px);font-size:1.125em}.wp-block-file__button{background:#32373c;color:#fff;text-decoration:none}</style>
        <style id="global-styles-inline-css"> body{--wp--preset--color--black: #000000;--wp--preset--color--cyan-bluish-gray: #abb8c3;--wp--preset--color--white: #ffffff;--wp--preset--color--pale-pink: #f78da7;--wp--preset--color--vivid-red: #cf2e2e;--wp--preset--color--luminous-vivid-orange: #ff6900;--wp--preset--color--luminous-vivid-amber: #fcb900;--wp--preset--color--light-green-cyan: #7bdcb5;--wp--preset--color--vivid-green-cyan: #00d084;--wp--preset--color--pale-cyan-blue: #8ed1fc;--wp--preset--color--vivid-cyan-blue: #0693e3;--wp--preset--color--vivid-purple: #9b51e0;--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%);--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%);--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%);--wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%);--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%);--wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%);--wp--preset--gradient--blush-light-purple: linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%);--wp--preset--gradient--blush-bordeaux: linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%);--wp--preset--gradient--luminous-dusk: linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%);--wp--preset--gradient--pale-ocean: linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%);--wp--preset--gradient--electric-grass: linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%);--wp--preset--gradient--midnight: linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%);--wp--preset--font-size--small: 13px;--wp--preset--font-size--medium: 20px;--wp--preset--font-size--large: 36px;--wp--preset--font-size--x-large: 42px;--wp--preset--spacing--20: 0.44rem;--wp--preset--spacing--30: 0.67rem;--wp--preset--spacing--40: 1rem;--wp--preset--spacing--50: 1.5rem;--wp--preset--spacing--60: 2.25rem;--wp--preset--spacing--70: 3.38rem;--wp--preset--spacing--80: 5.06rem;--wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);--wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);--wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);--wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);--wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);}:where(.is-layout-flex){gap: 0.5em;}:where(.is-layout-grid){gap: 0.5em;}body .is-layout-flow > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-flow > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-flow > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignleft{float: left;margin-inline-start: 0;margin-inline-end: 2em;}body .is-layout-constrained > .alignright{float: right;margin-inline-start: 2em;margin-inline-end: 0;}body .is-layout-constrained > .aligncenter{margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > :where(:not(.alignleft):not(.alignright):not(.alignfull)){max-width: var(--wp--style--global--content-size);margin-left: auto !important;margin-right: auto !important;}body .is-layout-constrained > .alignwide{max-width: var(--wp--style--global--wide-size);}body .is-layout-flex{display: flex;}body .is-layout-flex{flex-wrap: wrap;align-items: center;}body .is-layout-flex > *{margin: 0;}body .is-layout-grid{display: grid;}body .is-layout-grid > *{margin: 0;}:where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;}:where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;}.has-black-color{color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-color{color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-color{color: var(--wp--preset--color--white) !important;}.has-pale-pink-color{color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-color{color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-color{color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-color{color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-color{color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-color{color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-color{color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-color{color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-color{color: var(--wp--preset--color--vivid-purple) !important;}.has-black-background-color{background-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-background-color{background-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-background-color{background-color: var(--wp--preset--color--white) !important;}.has-pale-pink-background-color{background-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-background-color{background-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-background-color{background-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-background-color{background-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-background-color{background-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-background-color{background-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-background-color{background-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-background-color{background-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-background-color{background-color: var(--wp--preset--color--vivid-purple) !important;}.has-black-border-color{border-color: var(--wp--preset--color--black) !important;}.has-cyan-bluish-gray-border-color{border-color: var(--wp--preset--color--cyan-bluish-gray) !important;}.has-white-border-color{border-color: var(--wp--preset--color--white) !important;}.has-pale-pink-border-color{border-color: var(--wp--preset--color--pale-pink) !important;}.has-vivid-red-border-color{border-color: var(--wp--preset--color--vivid-red) !important;}.has-luminous-vivid-orange-border-color{border-color: var(--wp--preset--color--luminous-vivid-orange) !important;}.has-luminous-vivid-amber-border-color{border-color: var(--wp--preset--color--luminous-vivid-amber) !important;}.has-light-green-cyan-border-color{border-color: var(--wp--preset--color--light-green-cyan) !important;}.has-vivid-green-cyan-border-color{border-color: var(--wp--preset--color--vivid-green-cyan) !important;}.has-pale-cyan-blue-border-color{border-color: var(--wp--preset--color--pale-cyan-blue) !important;}.has-vivid-cyan-blue-border-color{border-color: var(--wp--preset--color--vivid-cyan-blue) !important;}.has-vivid-purple-border-color{border-color: var(--wp--preset--color--vivid-purple) !important;}.has-vivid-cyan-blue-to-vivid-purple-gradient-background{background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;}.has-light-green-cyan-to-vivid-green-cyan-gradient-background{background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;}.has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;}.has-luminous-vivid-orange-to-vivid-red-gradient-background{background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;}.has-very-light-gray-to-cyan-bluish-gray-gradient-background{background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;}.has-cool-to-warm-spectrum-gradient-background{background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;}.has-blush-light-purple-gradient-background{background: var(--wp--preset--gradient--blush-light-purple) !important;}.has-blush-bordeaux-gradient-background{background: var(--wp--preset--gradient--blush-bordeaux) !important;}.has-luminous-dusk-gradient-background{background: var(--wp--preset--gradient--luminous-dusk) !important;}.has-pale-ocean-gradient-background{background: var(--wp--preset--gradient--pale-ocean) !important;}.has-electric-grass-gradient-background{background: var(--wp--preset--gradient--electric-grass) !important;}.has-midnight-gradient-background{background: var(--wp--preset--gradient--midnight) !important;}.has-small-font-size{font-size: var(--wp--preset--font-size--small) !important;}.has-medium-font-size{font-size: var(--wp--preset--font-size--medium) !important;}.has-large-font-size{font-size: var(--wp--preset--font-size--large) !important;}.has-x-large-font-size{font-size: var(--wp--preset--font-size--x-large) !important;} .wp-block-navigation a:where(:not(.wp-element-button)){color: inherit;} :where(.wp-block-post-template.is-layout-flex){gap: 1.25em;}:where(.wp-block-post-template.is-layout-grid){gap: 1.25em;} :where(.wp-block-columns.is-layout-flex){gap: 2em;}:where(.wp-block-columns.is-layout-grid){gap: 2em;} .wp-block-pullquote{font-size: 1.5em;line-height: 1.6;}</style>
        <link
            rel="stylesheet"
            id="hello-elementor-css"
            href="{{ url('front/css/elementor-css/hello-elementor-style.min.css') }}"
            media="all"
        >
        <link
            rel="stylesheet"
            id="hello-elementor-theme-style-css"
            href="{{ url('front/css/elementor-css/hello-elementor-theme.min.css') }}"
            media="all"
        >
        <link
            rel="stylesheet"
            id="elementor-frontend-css"
            href="{{ url('front/css/elementor-css/elementor-assets-css-frontend-lite.min.css') }}"
            media="all"
        >
        <link
            rel="stylesheet"
            id="elementor-post-6-css"
            href="{{ url('front/css/elementor-css/elementor-css-post-6.css') }}"
            media="all"
        >
        <link
            rel="stylesheet"
            id="swiper-css"
            href="{{ url('front/css/elementor-css/elementor-assets-lib-swiper-v8-css-swiper.min.css') }}"
            media="all"
        >
        <link
            rel="stylesheet"
            id="elementor-pro-css"
            href="{{ url('front/css/elementor-css/elementor-pro-assets-css-frontend-lite.min.css') }}"
            media="all"
        >
        <link
            rel="stylesheet"
            id="elementor-global-css"
            href="{{ url('front/css/elementor-css/elementor-css-global.css') }}"
            media="all"
        >

        {{-- DataTable --}}
        <link rel="stylesheet" href="{{ url('admin/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('admin/css/dataTables.bootstrap4.min.css') }}">

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-W02N3JGNCH"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-W02N3JGNCH');
        </script>


            <link
                rel="stylesheet"
                href="{{ url('admin/css/elementor-css/elementor-css-post-1286.css') }}"
                media="all">

            <link
                rel="stylesheet"
                href="{{ url('admin/css/elementor-css/elementor-assets-css-widget-icon-list.min.css') }}"
                media="all">

            <link
                rel="stylesheet"
                href="{{ url('admin/css/elementor-css/elementor-assets-css-frontend-lite.min.css') }}"
                media="all">

            <link
                rel="stylesheet"
                href="{{ url('admin/css/elementor-css/elementor-pro-assets-css-frontend-lite.min.css') }}"
                media="all">

            <link
                rel="stylesheet"
                href="{{ url('front/css/elementor-css/elementor-css-post-444.css') }}"
                media="all">

            <link
                rel="stylesheet"
                href="{{ url('front/css/elementor-css/elementor-css-post-34.css') }}"
                media="all">



                

            


    </head>
    <body>
        <div class="container-scroller">




          @include('admin.layout.header')




            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
            <!-- partial -->




                @include('admin.layout.sidebar')




                <!-- partial -->
                <!-- container-scroller -->




                <!-- Middle Content (varies from a page to another) -->
                @yield('content')




                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- plugins:js -->
        <script src="{{ url('admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{ url('admin/vendors/chart.js/Chart.min.js') }}"></script>
        <script src="{{ url('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ url('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ url('admin/js/dataTables.select.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{ url('admin/js/off-canvas.js') }}"></script>
        <script src="{{ url('admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ url('admin/js/template.js') }}"></script>
        <script src="{{ url('admin/js/settings.js') }}"></script>
        <script src="{{ url('admin/js/todolist.js') }}"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="{{ url('admin/js/dashboard.js') }}"></script>
        <script src="{{ url('admin/js/chart.js') }}"></script>
        <script src="{{ url('admin/js/Chart.roundedBarCharts.js') }}"></script>
        <!-- End custom js for this page-->



        {{-- NOTE: I MOVED THIS SECTION TO admin/js/My-Sweet-Alert.js FILE! After the SweetAlert2 CDN link block in the Country! I downloaded the library using 'npm' --}}
        {{-- The SweetAlert2 package for Confirm Deletion Message in sections.blade.php --}}
        {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}} <!-- CDNs blocked in Country! -->
        {{-- <script type="module" src="{{ url('admin/js/sweetalert2.js') }}"></script>
        <script type="module" src="{{ url('admin/js/My-Sweet-Alert.js') }}"></script> --}}
        



        {{-- Start: Our Custom Admin JS --}}
        <script src="{{ url('admin/js/custom.js') }}"></script>
        {{-- End: Our Custom Admin JS --}}




        <link
            rel="stylesheet"
            id="e-animations-css"
            href="{{ url('front/css/elementor-css/elementor-assets-lib-animations-animations.min.css') }}"
            media="all"
        >
        <script src="{{ url('front/js/elementor-js/hello-elementor-assets-js-hello-frontend.min.js') }}" id="hello-theme-frontend-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-pro-assets-lib-smartmenus-jquery.smartmenus.min.js') }}" id="smartmenus-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-pro-assets-js-webpack-pro.runtime.min.js') }}" id="elementor-pro-webpack-runtime-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-assets-js-webpack.runtime.min.js') }}" id="elementor-webpack-runtime-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-assets-js-frontend-modules.min.js') }}" id="elementor-frontend-modules-js"></script>
        <script src="{{ url('front/js/elementor-js/dist-vendor-wp-polyfill-inert.min.js') }}" id="wp-polyfill-inert-js"></script>
        <script src="{{ url('front/js/elementor-js/dist-vendor-regenerator-runtime.min.js') }}" id="regenerator-runtime-js"></script>
        <script src="{{ url('front/js/elementor-js/dist-vendor-wp-polyfill.min.js') }}" id="wp-polyfill-js"></script>
        <script src="{{ url('front/js/elementor-js/dist-hooks.min.js') }}" id="wp-hooks-js"></script>
        <script src="{{ url('front/js/elementor-js/dist-i18n.min.js') }}" id="wp-i18n-js"></script>
        <script id="wp-i18n-js-after">
wp.i18n.setLocaleData( { 'text direction\u0004ltr': [ 'ltr' ] } );
        </script>
        <script id="elementor-pro-frontend-js-before">
var ElementorProFrontendConfig = {"ajaxurl":"./wp-admin\/admin-ajax.php","nonce":"9b6b08724d","urls":{"assets":"\/front/wp-content/plugins/elementor-pro/assets\/","rest":"./wp-json\/"},"shareButtonsNetworks":{"facebook":{"title":"Facebook","has_counter":true},"twitter":{"title":"Twitter"},"linkedin":{"title":"LinkedIn","has_counter":true},"pinterest":{"title":"Pinterest","has_counter":true},"reddit":{"title":"Reddit","has_counter":true},"vk":{"title":"VK","has_counter":true},"odnoklassniki":{"title":"OK","has_counter":true},"tumblr":{"title":"Tumblr"},"digg":{"title":"Digg"},"skype":{"title":"Skype"},"stumbleupon":{"title":"StumbleUpon","has_counter":true},"mix":{"title":"Mix"},"telegram":{"title":"Telegram"},"pocket":{"title":"Pocket","has_counter":true},"xing":{"title":"XING","has_counter":true},"whatsapp":{"title":"WhatsApp"},"email":{"title":"Email"},"print":{"title":"Print"}},"facebook_sdk":{"lang":"en_US","app_id":""},"lottie":{"defaultAnimationUrl":"\/front/wp-content/plugins/elementor-pro/modules/lottie/assets/animations/default.json"}};
        </script>
        <script src="{{ url('front/js/elementor-js/elementor-pro-assets-js-frontend.min.js') }}" id="elementor-pro-frontend-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-assets-lib-waypoints-waypoints.min.js') }}" id="elementor-waypoints-js"></script>
        <script src="{{ url('front/js/elementor-js/jquery-ui-core.min.js') }}" id="jquery-ui-core-js"></script>
        <script id="elementor-frontend-js-before">
var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close","a11yCarouselWrapperAriaLabel":"Carousel | Horizontal scrolling: Arrow Left & Right","a11yCarouselPrevSlideMessage":"Previous slide","a11yCarouselNextSlideMessage":"Next slide","a11yCarouselFirstSlideMessage":"This is the first slide","a11yCarouselLastSlideMessage":"This is the last slide","a11yCarouselPaginationBulletMessage":"Go to slide"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile Portrait","value":767,"default_value":767,"direction":"max","is_enabled":true},"mobile_extra":{"label":"Mobile Landscape","value":880,"default_value":880,"direction":"max","is_enabled":false},"tablet":{"label":"Tablet Portrait","value":1024,"default_value":1024,"direction":"max","is_enabled":true},"tablet_extra":{"label":"Tablet Landscape","value":1200,"default_value":1200,"direction":"max","is_enabled":false},"laptop":{"label":"Laptop","value":1366,"default_value":1366,"direction":"max","is_enabled":false},"widescreen":{"label":"Widescreen","value":2400,"default_value":2400,"direction":"min","is_enabled":false}}},"version":"3.18.2","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"e_optimized_assets_loading":true,"e_optimized_css_loading":true,"e_font_icon_svg":true,"additional_custom_breakpoints":true,"container":true,"e_swiper_latest":true,"container_grid":true,"theme_builder_v2":true,"hello-theme-header-footer":true,"editor_v2":true,"block_editor_assets_optimize":true,"landing-pages":true,"nested-elements":true,"e_image_loading_optimization":true,"e_global_styleguide":true,"page-transitions":true,"notes":true,"form-submissions":true,"e_scroll_snap":true},"urls":{"assets":"\/front/wp-content/plugins/elementor/assets\/"},"swiperClass":"swiper","settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description","hello_header_logo_type":"logo","hello_header_menu_layout":"horizontal","hello_footer_logo_type":"logo"},"post":{"id":15,"title":"Kapiton%20%E2%80%93%20Philippines","excerpt":"","featuredImage":false}};
        </script>
        <script src="{{ url('front/js/elementor-js/elementor-assets-js-frontend.min.js') }}" id="elementor-frontend-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-pro-assets-js-elements-handlers.min.js') }}" id="pro-elements-handlers-js"></script>
        <script src="{{ url('front/js/elementor-js/elementor-pro-assets-lib-sticky-jquery.sticky.min.js') }}" id="e-sticky-js"></script>
        <script src="{{ url('admin/js/custom-chart.js') }}"></script>
    
    </body>
</html>