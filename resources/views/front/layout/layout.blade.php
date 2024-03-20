<!DOCTYPE html>
<html class="no-js" lang="en-US">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



        {{-- X-CSRF-TOKEN: https://laravel.com/docs/9.x/csrf#csrf-x-csrf-token --}} 
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="profile" href="https://gmpg.org/xfn/11">


        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="max-image-preview:large">


        {{-- Static And Dynamic SEO (HTML meta tags): Check the HTML <meta> tags and <title> tag in front/layout/layout.blade.php. Check index() method in Front/IndexController.php, listing() method in Front/ProductsController.php, detail() method in Front/ProductsController.php and cart() method in Front/ProductsController.php     --}}
        @if (!empty($meta_description))
            <meta name="description" content="{{ $meta_description }}">
        @endif

        @if (!empty($meta_keywords))
            <meta name="keywords" content="{{ $meta_keywords }}">
        @endif

        <title>

            {{-- Static And Dynamic SEO (HTML meta tags): Check the HTML <meta> tags and <title> tag in front/layout/layout.blade.php. Check index() method in Front/IndexController.php, listing() method in Front/ProductsController.php, detail() method in Front/ProductsController.php and cart() method in Front/ProductsController.php     --}}
            @if (!empty($meta_title))
                {{ $meta_title }}
            @else
                Kapiton &#8211; Philippines
            @endif
            
        </title>

        <link
            rel="alternate"
            type="application/rss+xml"
            title="Kapiton &raquo; Feed"
            href="https://kapiton.seikodesigns.com/feed/"
        >
        <link
            rel="alternate"
            type="application/rss+xml"
            title="Kapiton &raquo; Comments Feed"
            href="https://kapiton.seikodesigns.com/comments/feed/"
        >

        <script>
window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/14.0.0\/svg\/","svgExt":".svg","source":{"concatemoji":"./wp-includes\/js\/wp-emoji-release.min.js?ver=6.4.2"}};
/*! This file is auto-generated */
!function(i,n){var o,s,e;function c(e){try{var t={supportTests:e,timestamp:(new Date).valueOf()};sessionStorage.setItem(o,JSON.stringify(t))}catch(e){}}function p(e,t,n){e.clearRect(0,0,e.canvas.width,e.canvas.height),e.fillText(t,0,0);var t=new Uint32Array(e.getImageData(0,0,e.canvas.width,e.canvas.height).data),r=(e.clearRect(0,0,e.canvas.width,e.canvas.height),e.fillText(n,0,0),new Uint32Array(e.getImageData(0,0,e.canvas.width,e.canvas.height).data));return t.every(function(e,t){return e===r[t]})}function u(e,t,n){switch(t){case"flag":return n(e,"\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f","\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f")?!1:!n(e,"\ud83c\uddfa\ud83c\uddf3","\ud83c\uddfa\u200b\ud83c\uddf3")&&!n(e,"\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f","\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");case"emoji":return!n(e,"\ud83e\udef1\ud83c\udffb\u200d\ud83e\udef2\ud83c\udfff","\ud83e\udef1\ud83c\udffb\u200b\ud83e\udef2\ud83c\udfff")}return!1}function f(e,t,n){var r="undefined"!=typeof WorkerGlobalScope&&self instanceof WorkerGlobalScope?new OffscreenCanvas(300,150):i.createElement("canvas"),a=r.getContext("2d",{willReadFrequently:!0}),o=(a.textBaseline="top",a.font="600 32px Arial",{});return e.forEach(function(e){o[e]=t(a,e,n)}),o}function t(e){var t=i.createElement("script");t.src=e,t.defer=!0,i.head.appendChild(t)}"undefined"!=typeof Promise&&(o="wpEmojiSettingsSupports",s=["flag","emoji"],n.supports={everything:!0,everythingExceptFlag:!0},e=new Promise(function(e){i.addEventListener("DOMContentLoaded",e,{once:!0})}),new Promise(function(t){var n=function(){try{var e=JSON.parse(sessionStorage.getItem(o));if("object"==typeof e&&"number"==typeof e.timestamp&&(new Date).valueOf()<e.timestamp+604800&&"object"==typeof e.supportTests)return e.supportTests}catch(e){}return null}();if(!n){if("undefined"!=typeof Worker&&"undefined"!=typeof OffscreenCanvas&&"undefined"!=typeof URL&&URL.createObjectURL&&"undefined"!=typeof Blob)try{var e="postMessage("+f.toString()+"("+[JSON.stringify(s),u.toString(),p.toString()].join(",")+"));",r=new Blob([e],{type:"text/javascript"}),a=new Worker(URL.createObjectURL(r),{name:"wpTestEmojiSupports"});return void(a.onmessage=function(e){c(n=e.data),a.terminate(),t(n)})}catch(e){}c(n=f(s,u,p))}t(n)}).then(function(e){for(var t in e)n.supports[t]=e[t],n.supports.everything=n.supports.everything&&n.supports[t],"flag"!==t&&(n.supports.everythingExceptFlag=n.supports.everythingExceptFlag&&n.supports[t]);n.supports.everythingExceptFlag=n.supports.everythingExceptFlag&&!n.supports.flag,n.DOMReady=!1,n.readyCallback=function(){n.DOMReady=!0}}).then(function(){return e}).then(function(){var e;n.supports.everything||(n.readyCallback(),(e=n.source||{}).concatemoji?t(e.concatemoji):e.wpemoji&&e.twemoji&&(t(e.twemoji),t(e.wpemoji)))}))}((window,document),window._wpemojiSettings);
        </script>

        <!-- Standard Favicon -->
        <link href="{{ asset('favicon.ico') }}" rel="shortcut icon">
        <!-- Base Google Font for Web-app -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
        <!-- Google Fonts for Banners only -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">
        <!-- Font Awesome 5 -->
        <link rel="stylesheet" href="{{ url('front/css/fontawesome.min.css') }}">
        <!-- Ion-Icons 4 -->
        <link rel="stylesheet" href="{{ url('front/css/ionicons.min.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ url('front/css/animate.min.css') }}">
        <!-- Owl-Carousel -->
        <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}">
        <!-- Jquery-Ui-Range-Slider -->
        <link rel="stylesheet" href="{{ url('front/css/jquery-ui-range-slider.min.css') }}">
        <!-- Utility -->
        <link rel="stylesheet" href="{{ url('front/css/utility.css') }}">
        <!-- Main -->
        <link rel="stylesheet" href="{{ url('front/css/bundle.css') }}">

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

        @php
            $currentRoute = request()->route()->getName();

            $css_headers = [
                'forgot_password' => [
                    'id' => 'elementor-post-644-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-644.css'
                ],
                'user_register' => [
                    'id' => 'elementor-post-656-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-656.css'
                ],
                'login' => [
                    'id' => 'elementor-post-611-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-611.css'
                ],
                'product_detail.show' => [
                    'id' => 'elementor-post-491-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-491.css'
                ],
                'home' => [
                    'id' => 'elementor-post-15-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-15.css'
                ],
                '0' => [
                    'id' => 'elementor-post-34-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-34.css'
                ],
                '1' => [
                    'id' => 'elementor-post-444-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-444.css'
                ],
                'shop_category' => [
                    'id' => 'elementor-post-682-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-682.css'
                ],
                'listing' => [
                    'id' => 'elementor-post-682-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-682.css'
                ],
                'search.listing' => [
                    'id' => 'elementor-post-682-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-682.css'
                ],
                'vendor.show.collection' => [
                    'id' => 'elementor-post-682-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-682.css'
                ],
                'front.user.account' => [
                    'id' => 'elementor-post-743-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-743.css'
                ],
                'front.user.orders' => [
                    'id' => 'elementor-post-843-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-843.css'
                ],
                'front.user.security' => [
                    'id' => 'elementor-post-884-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-884.css'
                ],
                'front.user.cart' => [
                    'id' => 'elementor-post-896-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-896.css'
                ],
                'front.user.checkout' => [
                    'id' => 'elementor-post-992-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-992.css',
                    'javascript_src' => 'front/js/custom-checkout.js',
                ],
                'front.vendor.account.create' => [
                    'id' => 'elementor-post-1070-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-1070.css',
                    'javascript_src' => 'front/js/custom-vendor-registration.js',
                ],
                'user.chats.show' => [
                    'id' => 'elementor-post-1086-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-1086.css'
                ],
                'user.delivery_address_list.show' => [
                    'id' => 'elementor-post-1628-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-1628.css',
                    'javascript_src' => 'front/js/custom-user-account.js'
                ],
                'front.user.about-us' => [
                    'id' => 'elementor-post-1656-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-1656.css'
                ],
                'front.user.management' => [
                    'id' => 'elementor-post-1709-css',
                    'href' => 'front/css/elementor-css/elementor-css-post-1709.css'
                ],
             
           
            ];

        @endphp
        @foreach ($css_headers as $css_header_name => $css_header)
            @if ($currentRoute == $css_header_name || is_numeric($css_header_name))
            <link
                rel="stylesheet"
                id="{{$css_header['id']}}"
                href="{{ url($css_header['href']) }}"
                media="all"
            >
            @endif
        @endforeach
        <link
            rel="stylesheet"
            id="google-fonts-1-css"
            href="https://fonts.googleapis.com/css?family=Lexend%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=swap&#038;ver=6.4.2"
            media="all"
        >
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <script>
            /* <![CDATA[ */
            var rcewpp = {
                "ajax_url":"https://kapiton.seikodesigns.com/wp-admin/admin-ajax.php",
                "nonce": "b1e27b8502",
                "home_url": "https://kapiton.seikodesigns.com/",
                "settings_icon": 'https://kapiton.seikodesigns.com/wp-content/plugins/export-wp-page-to-static-html/admin/images/settings.png',
                "settings_hover_icon": 'https://kapiton.seikodesigns.com/wp-content/plugins/export-wp-page-to-static-html/admin/images/settings_hover.png'
            };
            /* ]]\> */
        </script>

        {{-- Elementor JavaScript --}}
        <script src="{{ url('front/js/elementor-js/jquery-jquery.min.js') }}" id="jquery-core-js"></script>
        <script src="{{ url('front/js/elementor-js/jquery-jquery-migrate.min.js') }}" id="jquery-migrate-js"></script>
        <link rel="https://api.w.org/" href="https://kapiton.seikodesigns.com/wp-json/">
        <link rel="alternate" type="application/json" href="https://kapiton.seikodesigns.com/wp-json/wp/v2/pages/15">
        <link
            rel="EditURI"
            type="application/rsd+xml"
            title="RSD"
            href="https://kapiton.seikodesigns.com/xmlrpc.php?rsd"
        >
        <meta name="generator" content="WordPress 6.4.2">
        <link rel="canonical" href="https://kapiton.seikodesigns.com/">
        <link rel="shortlink" href="https://kapiton.seikodesigns.com/">
        <link rel="alternate" type="application/json+oembed" href="https://kapiton.seikodesigns.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fkapiton.seikodesigns.com%2F">
        <link rel="alternate" type="text/xml+oembed" href="https://kapiton.seikodesigns.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fkapiton.seikodesigns.com%2F&#038;format=xml">
        <meta name="generator" content="Elementor 3.18.2; features: e_dom_optimization, e_optimized_assets_loading, e_optimized_css_loading, e_font_icon_svg, additional_custom_breakpoints, block_editor_assets_optimize, e_image_loading_optimization; settings: css_print_method-external, google_font-enabled, font_display-swap">
        <link rel="icon" href="{{ asset('front/iamges/main-logo/2023-12-Green-DS-NB-2-1.png') }}" sizes="32x32">
        <link rel="icon" href="{{ asset('front/iamges/main-logo/2023-12-Green-DS-NB-2-1.png') }}" sizes="192x192">
        <link rel="apple-touch-icon" href="{{ asset('front/iamges/main-logo/2023-12-Green-DS-NB-2-1.png') }}">
        <meta name="msapplication-TileImage" content="https://kapiton.seikodesigns.com/wp-content/uploads/2023/12/Frame-4.png">



        {{-- EasyZoom plugin for zooming product images upon hover --}}
        {{-- My EasyZoom (jQuery image zoom plugin): https://i-like-robots.github.io/EasyZoom/ --}}
        <link rel="stylesheet" href="{{ url('front/css/easyzoom.css') }}">



        {{-- My Preloader/Loader/Loading Page/Preloading Screen --}} 
        <link rel="stylesheet" href="{{ url('front/css/custom.css') }}">

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-W02N3JGNCH"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-W02N3JGNCH');
        </script>

    </head>
    <body class="home page-template-default page page-id-15 wp-custom-logo elementor-default elementor-kit-6 elementor-page elementor-page-15">
        <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

        {{-- My Preloader/Loader/Loading Page/Preloading Screen --}} 
        <div class="loader">
            <img src="{{ asset('front/images/loaders/loader.gif') }}" alt="loading..." />
        </div>



        <!-- app -->
        <div id="app">

            {{-- Header partial --}}
            @include('front.layout.header')


            {{-- Middle Content (varies from a page to another) --}}
            <main id="content" class="site-main post-611 page type-page status-publish hentry">
                <div class="page-content">
                    @yield('content')
                </div>
            </main>


            {{-- Footer partial --}}
            @include('front.layout.footer')


            {{-- Modal Popup partial --}}
            @include('front.layout.modals')

        </div>
        <!-- app /- -->
        <!--[if lte IE 9]>
        <div class="app-issue">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>You are using an outdated browser.</h1>
                    <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
                </div>
            </div>
        </div>
        <style> #app {
            display: none;
            } 
        </style>
        <![endif]-->
        <!-- NoScript -->
        <noscript>
            <div class="app-issue">
                <div class="vertical-center">
                    <div class="text-center">
                        <h1>JavaScript is disabled in your browser.</h1>
                        <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
            <style>
                #app {
                display: none;
                }
            </style>
        </noscript>
        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga = function() {
                ga.q.push(arguments)
            };
            ga.q = [];
            ga.l = +new Date;
            ga('create', 'UA-XXXXX-Y', 'auto');
            ga('send', 'pageview')
        </script>
        <!-- <script src="https://www.google-analytics.com/analytics.js" async defer></script> -->
        <!-- Modernizr-JS -->
        <script type="text/javascript" src="{{ url('front/js/vendor/modernizr-custom.min.js') }}"></script>
        <!-- NProgress -->
        <script type="text/javascript" src="{{ url('front/js/nprogress.min.js') }}"></script>
        <!-- jQuery -->
        <script type="text/javascript" src="{{ url('front/js/jquery.min.js') }}"></script>
        <!-- Bootstrap JS -->
        <script type="text/javascript" src="{{ url('front/js/bootstrap.min.js') }}"></script>
        <!-- Popper -->
        <script type="text/javascript" src="{{ url('front/js/popper.min.js') }}"></script>
        <!-- ScrollUp -->
        <script type="text/javascript" src="{{ url('front/js/jquery.scrollUp.min.js') }}"></script>
        <!-- Elevate Zoom -->
        <script type="text/javascript" src="{{ url('front/js/jquery.elevatezoom.min.js') }}"></script>
        <!-- jquery-ui-range-slider -->
        <script type="text/javascript" src="{{ url('front/js/jquery-ui.range-slider.min.js') }}"></script>
        <!-- jQuery Slim-Scroll -->
        <script type="text/javascript" src="{{ url('front/js/jquery.slimscroll.min.js') }}"></script>
        <!-- jQuery Resize-Select -->
        <script type="text/javascript" src="{{ url('front/js/jquery.resize-select.min.js') }}"></script>
        <!-- jQuery Custom Mega Menu -->
        <script type="text/javascript" src="{{ url('front/js/jquery.custom-megamenu.min.js') }}"></script>
        <!-- jQuery Countdown -->
        <script type="text/javascript" src="{{ url('front/js/jquery.custom-countdown.min.js') }}"></script>
        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ url('front/js/owl.carousel.min.js') }}"></script>
        <!-- Main -->
        <script type="text/javascript" src="{{ url('front/js/app.js') }}"></script>



        <!-- Our front/js/custom.js file --> 
        <script type="text/javascript" src="{{ url('front/js/custom.js') . '?date=' . date('m-d-Y h:m:s') }}"></script>
        @foreach ($css_headers as $css_header_name => $css_header)
            @if ($currentRoute == $css_header_name && isset($css_header['javascript_src']))
                <script type="text/javascript" src="{{ url($css_header['javascript_src']) . '?date=' . date('m-d-Y h:m:s') }}"></script>
            @endif
        @endforeach



        {{-- EasyZoom plugin for zooming product images upon hover --}}
        {{-- My EasyZoom (jQuery image zoom plugin): https://i-like-robots.github.io/EasyZoom/ --}}
        <script type="text/javascript" src="{{ url('front/js/easyzoom.js') }}"></script>
        <script>
            // Instantiate EasyZoom instances
            var $easyzoom = $('.easyzoom').easyZoom();
    
            // Setup thumbnails example
            var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');
    
            $('.thumbnails').on('click', 'a', function(e) {
                var $this = $(this);
    
                e.preventDefault();
    
                // Use EasyZoom's `swap` method
                api1.swap($this.data('standard'), $this.attr('href'));
            });
    
            // Setup toggles example
            var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');
    
            $('.toggle').on('click', function() {
                var $this = $(this);
    
                if ($this.data("active") === true) {
                    $this.text("Switch on").data("active", false);
                    api2.teardown();
                } else {
                    $this.text("Switch off").data("active", true);
                    api2._init();
                }
            });
        </script>



        {{-- To enable us to write PHP code within JavaScript code (to operate the Dynamic Filters dynamically (the second way)) --}} 
        {{-- @include('front.layout.scripts') --}} {{-- scripts.blade.php --}}


        
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


    
    
        @if ($currentRoute == "front.user.management" )
            <div
                data-elementor-type="popup"
                data-elementor-id="1720"
                class="elementor elementor-1720 elementor-location-popup"
                data-elementor-settings="{&quot;entrance_animation&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;exit_animation&quot;:&quot;fadeInUp&quot;,&quot;exit_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;triggers&quot;:[],&quot;timing&quot;:[]}"
                data-elementor-post-type="elementor_library">
                <div
                    class="elementor-element elementor-element-14f7b94 e-flex e-con-boxed e-con e-parent"
                    data-id="14f7b94"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    data-core-v316-plus="true"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-b2dc1b8 elementor-widget elementor-widget-image"
                            data-id="b2dc1b8"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    width="182"
                                    height="181"
                                    src="{{ asset('front/images/about/2024-03-Mask-group-2.png') }}"
                                    class="attachment-large size-large wp-image-1713"
                                    alt=""
                                    srcset="{{ asset('front/images/about/2024-03-Mask-group-2.png') }} 182w, {{ asset('front/images/about/2024-03-Mask-group-2.png') }} 150w"
                                    sizes="(max-width: 182px) 100vw, 182px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-1d9dfda elementor-widget elementor-widget-heading"
                            data-id="1d9dfda"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">KENNETH AROLD L. TAN</h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-be1dd41 elementor-widget elementor-widget-text-editor"
                            data-id="be1dd41"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Chief Executive Officer</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-0e8d82f elementor-widget elementor-widget-text-editor"
                            data-id="0e8d82f"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi. Duis libero massa, dignissim sed eros et, tincidunt cursus lorem. Morbi non dolor quis libero sollicitudin volutpat non a massa. Nunc tellus lectus, pulvinar dapibus vehicula vel, feugiat sodales nunc. Curabitur quis velit ac turpis egestas ultricies.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi.</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-82a7add elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                            data-id="82a7add"
                            data-element_type="widget"
                            data-widget_type="social-icons.default"
                        >
                            <div class="elementor-widget-container">
                                <div class="elementor-social-icons-wrapper elementor-grid">
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-9f7555f" href="#" target="_blank">
                                            <span class="elementor-screen-only">Linkedin</span>
                                            <svg class="e-font-icon-svg e-fab-linkedin" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3f155aa" href="#" target="_blank">
                                            <span class="elementor-screen-only">Facebook</span>
                                            <svg class="e-font-icon-svg e-fab-facebook" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-5e7345c" href="#" target="_blank">
                                            <span class="elementor-screen-only">Instagram</span>
                                            <svg class="e-font-icon-svg e-fab-instagram" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                data-elementor-type="popup"
                data-elementor-id="1731"
                class="elementor elementor-1731 elementor-location-popup"
                data-elementor-settings="{&quot;entrance_animation&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;exit_animation&quot;:&quot;fadeInUp&quot;,&quot;exit_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;triggers&quot;:[],&quot;timing&quot;:[]}"
                data-elementor-post-type="elementor_library">
                <div
                    class="elementor-element elementor-element-20c7b6ce e-flex e-con-boxed e-con e-parent"
                    data-id="20c7b6ce"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    data-core-v316-plus="true"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-f494392 elementor-widget elementor-widget-image"
                            data-id="f494392"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    width="182"
                                    height="182"
                                    src="{{ asset('front/images/about/2024-03-Mask-group.png') }}"
                                    class="attachment-large size-large wp-image-1715"
                                    alt=""
                                    srcset="{{ asset('front/images/about/2024-03-Mask-group.png') }} 182w, {{ asset('front/images/about/2024-03-Mask-group.png') }} 150w"
                                    sizes="(max-width: 182px) 100vw, 182px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-743faaf4 elementor-widget elementor-widget-heading"
                            data-id="743faaf4"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">ETHAN JAMAL S. LIDASAN</h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-64caed41 elementor-widget elementor-widget-text-editor"
                            data-id="64caed41"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Chief Marketing Officer</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-6680136d elementor-widget elementor-widget-text-editor"
                            data-id="6680136d"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi. Duis libero massa, dignissim sed eros et, tincidunt cursus lorem. Morbi non dolor quis libero sollicitudin volutpat non a massa. Nunc tellus lectus, pulvinar dapibus vehicula vel, feugiat sodales nunc. Curabitur quis velit ac turpis egestas ultricies.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi.</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-2ca13d41 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                            data-id="2ca13d41"
                            data-element_type="widget"
                            data-widget_type="social-icons.default"
                        >
                            <div class="elementor-widget-container">
                                <div class="elementor-social-icons-wrapper elementor-grid">
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-9f7555f" href="#" target="_blank">
                                            <span class="elementor-screen-only">Linkedin</span>
                                            <svg class="e-font-icon-svg e-fab-linkedin" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3f155aa" href="#" target="_blank">
                                            <span class="elementor-screen-only">Facebook</span>
                                            <svg class="e-font-icon-svg e-fab-facebook" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-5e7345c" href="#" target="_blank">
                                            <span class="elementor-screen-only">Instagram</span>
                                            <svg class="e-font-icon-svg e-fab-instagram" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                data-elementor-type="popup"
                data-elementor-id="1734"
                class="elementor elementor-1734 elementor-location-popup"
                data-elementor-settings="{&quot;entrance_animation&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;exit_animation&quot;:&quot;fadeInUp&quot;,&quot;exit_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;triggers&quot;:[],&quot;timing&quot;:[]}"
                data-elementor-post-type="elementor_library">
                <div
                    class="elementor-element elementor-element-66c93aa1 e-flex e-con-boxed e-con e-parent"
                    data-id="66c93aa1"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    data-core-v316-plus="true"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-26ca2757 elementor-widget elementor-widget-image"
                            data-id="26ca2757"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    width="182"
                                    height="181"
                                    src="{{ asset('front/images/about/2024-03-Mask-group-1.png') }}"
                                    class="attachment-large size-large wp-image-1714"
                                    alt=""
                                    srcset="{{ asset('front/images/about/2024-03-Mask-group-1.png') }} 182w, {{ asset('front/images/about/2024-03-Mask-group-1.png') }} 150w"
                                    sizes="(max-width: 182px) 100vw, 182px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-df37854 elementor-widget elementor-widget-heading"
                            data-id="df37854"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">VON MILES M. GACUTAN</h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-38624d5 elementor-widget elementor-widget-text-editor"
                            data-id="38624d5"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Chief Technology Officer</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-88a7295 elementor-widget elementor-widget-text-editor"
                            data-id="88a7295"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi. Duis libero massa, dignissim sed eros et, tincidunt cursus lorem. Morbi non dolor quis libero sollicitudin volutpat non a massa. Nunc tellus lectus, pulvinar dapibus vehicula vel, feugiat sodales nunc. Curabitur quis velit ac turpis egestas ultricies.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi.</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-5f21b63a elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                            data-id="5f21b63a"
                            data-element_type="widget"
                            data-widget_type="social-icons.default"
                        >
                            <div class="elementor-widget-container">
                                <div class="elementor-social-icons-wrapper elementor-grid">
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-9f7555f" href="#" target="_blank">
                                            <span class="elementor-screen-only">Linkedin</span>
                                            <svg class="e-font-icon-svg e-fab-linkedin" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3f155aa" href="#" target="_blank">
                                            <span class="elementor-screen-only">Facebook</span>
                                            <svg class="e-font-icon-svg e-fab-facebook" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-5e7345c" href="#" target="_blank">
                                            <span class="elementor-screen-only">Instagram</span>
                                            <svg class="e-font-icon-svg e-fab-instagram" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                data-elementor-type="popup"
                data-elementor-id="1737"
                class="elementor elementor-1737 elementor-location-popup"
                data-elementor-settings="{&quot;entrance_animation&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;exit_animation&quot;:&quot;fadeInUp&quot;,&quot;exit_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;triggers&quot;:[],&quot;timing&quot;:[]}"
                data-elementor-post-type="elementor_library">
                <div
                    class="elementor-element elementor-element-4a01d184 e-flex e-con-boxed e-con e-parent"
                    data-id="4a01d184"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    data-core-v316-plus="true"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-5334c12a elementor-widget elementor-widget-image"
                            data-id="5334c12a"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    width="176"
                                    height="176"
                                    src="{{ asset('front/images/about/2024-03-Mask-group-3.png') }}"
                                    class="attachment-large size-large wp-image-1712"
                                    alt=""
                                    srcset="{{ asset('front/images/about/2024-03-Mask-group-3.png') }} 176w, {{ asset('front/images/about/2024-03-Mask-group-3.png') }} 150w"
                                    sizes="(max-width: 176px) 100vw, 176px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-7a16fa4b elementor-widget elementor-widget-heading"
                            data-id="7a16fa4b"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">MARKUS F. MERCADO</h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-a977d6b elementor-widget elementor-widget-text-editor"
                            data-id="a977d6b"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>VP Sales &amp; Business Development</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-3767a572 elementor-widget elementor-widget-text-editor"
                            data-id="3767a572"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi. Duis libero massa, dignissim sed eros et, tincidunt cursus lorem. Morbi non dolor quis libero sollicitudin volutpat non a massa. Nunc tellus lectus, pulvinar dapibus vehicula vel, feugiat sodales nunc. Curabitur quis velit ac turpis egestas ultricies.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi.</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-55e39bb9 elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                            data-id="55e39bb9"
                            data-element_type="widget"
                            data-widget_type="social-icons.default"
                        >
                            <div class="elementor-widget-container">
                                <div class="elementor-social-icons-wrapper elementor-grid">
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-9f7555f" href="#" target="_blank">
                                            <span class="elementor-screen-only">Linkedin</span>
                                            <svg class="e-font-icon-svg e-fab-linkedin" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3f155aa" href="#" target="_blank">
                                            <span class="elementor-screen-only">Facebook</span>
                                            <svg class="e-font-icon-svg e-fab-facebook" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-5e7345c" href="#" target="_blank">
                                            <span class="elementor-screen-only">Instagram</span>
                                            <svg class="e-font-icon-svg e-fab-instagram" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                data-elementor-type="popup"
                data-elementor-id="1740"
                class="elementor elementor-1740 elementor-location-popup"
                data-elementor-settings="{&quot;entrance_animation&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;exit_animation&quot;:&quot;fadeInUp&quot;,&quot;exit_animation_mobile&quot;:&quot;fadeInUp&quot;,&quot;entrance_animation_duration&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1.2,&quot;sizes&quot;:[]},&quot;a11y_navigation&quot;:&quot;yes&quot;,&quot;triggers&quot;:[],&quot;timing&quot;:[]}"
                data-elementor-post-type="elementor_library">
                <div
                    class="elementor-element elementor-element-19eeb3c1 e-flex e-con-boxed e-con e-parent"
                    data-id="19eeb3c1"
                    data-element_type="container"
                    data-settings="{&quot;container_type&quot;:&quot;flex&quot;,&quot;content_width&quot;:&quot;boxed&quot;}"
                    data-core-v316-plus="true"
                >
                    <div class="e-con-inner">
                        <div
                            class="elementor-element elementor-element-fee8854 elementor-widget elementor-widget-image"
                            data-id="fee8854"
                            data-element_type="widget"
                            data-widget_type="image.default"
                        >
                            <div class="elementor-widget-container">
                                <img
                                    loading="lazy"
                                    width="182"
                                    height="181"
                                    src="{{ asset('front/images/about/2024-03-Mask-group-4.png') }}"
                                    class="attachment-large size-large wp-image-1711"
                                    alt=""
                                    srcset="{{ asset('front/images/about/2024-03-Mask-group-4.png') }} 182w, {{ asset('front/images/about/2024-03-Mask-group-4.png') }} 150w"
                                    sizes="(max-width: 182px) 100vw, 182px"
                                >
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-4d705b6a elementor-widget elementor-widget-heading"
                            data-id="4d705b6a"
                            data-element_type="widget"
                            data-widget_type="heading.default"
                        >
                            <div class="elementor-widget-container">
                                <h5 class="elementor-heading-title elementor-size-default">ROD RUF IMEL I. BASILIO</h5>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-3aeae3f elementor-widget elementor-widget-text-editor"
                            data-id="3aeae3f"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Chief Operations Officer</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-135f5945 elementor-widget elementor-widget-text-editor"
                            data-id="135f5945"
                            data-element_type="widget"
                            data-widget_type="text-editor.default"
                        >
                            <div class="elementor-widget-container">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi. Duis libero massa, dignissim sed eros et, tincidunt cursus lorem. Morbi non dolor quis libero sollicitudin volutpat non a massa. Nunc tellus lectus, pulvinar dapibus vehicula vel, feugiat sodales nunc. Curabitur quis velit ac turpis egestas ultricies.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut quam iaculis, mattis elit nec, consectetur mi.</p>
                            </div>
                        </div>
                        <div
                            class="elementor-element elementor-element-5a5c3d8c elementor-shape-rounded elementor-grid-0 e-grid-align-center elementor-widget elementor-widget-social-icons"
                            data-id="5a5c3d8c"
                            data-element_type="widget"
                            data-widget_type="social-icons.default"
                        >
                            <div class="elementor-widget-container">
                                <div class="elementor-social-icons-wrapper elementor-grid">
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-9f7555f" href="#" target="_blank">
                                            <span class="elementor-screen-only">Linkedin</span>
                                            <svg class="e-font-icon-svg e-fab-linkedin" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-3f155aa" href="#" target="_blank">
                                            <span class="elementor-screen-only">Facebook</span>
                                            <svg class="e-font-icon-svg e-fab-facebook" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                    <span class="elementor-grid-item">
                                        <a class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-5e7345c" href="#" target="_blank">
                                            <span class="elementor-screen-only">Instagram</span>
                                            <svg class="e-font-icon-svg e-fab-instagram" viewbox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                            </svg>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
      

    </body>
</html>