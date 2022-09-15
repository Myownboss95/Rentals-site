<!DOCTYPE html>
<html
    lang="zxx"
    dir="ltr"
>


<!-- Mirrored from www.indonez.com/html-demo/Wave/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 19:00:03 GMT -->
<!-- Added by HTTrack -->
<meta
    http-equiv="content-type"
    content="text/html;charset=UTF-8"
/><!-- /Added by HTTrack -->

<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta
        name="description"
        content="{{ config('app.name') }} Cryptocurrency, Forex Broker"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="theme-color"
        content="#313131"
    />
    <!-- Site Properties -->
    <title>{{ config('app.name') }}</title>
    <!-- Critical preload -->
    <link
        rel="preload"
        href="{{ asset('front2/js/vendors/uikit.min.js') }}"
        as="script"
    >
    {{-- <link rel="preload" href="{{asset('js/s')}}" as="script"> --}}
    <link
        rel="preload"
        href="{{ asset('front2/css/vendors/uikit.min.css') }}"
        as="style"
    >
    <link
        rel="preload"
        href="{{ asset('front2/css/style.css') }}"
        as="style"
    >
    <!-- Icon preload -->
    <link
        rel="preload"
        href="{{ asset('front2/fonts/fa-brands-400.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <link
        rel="preload"
        href="{{ asset('front2/fonts/fa-solid-900.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <!-- Font preload -->
    <link
        rel="preload"
        href="{{ asset('front2/fonts/rubik-v9-latin-500.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <link
        rel="preload"
        href="{{ asset('front2/fonts/rubik-v9-latin-300.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <link
        rel="preload"
        href="{{ asset('front2/fonts/rubik-v9-latin-regular.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <!-- Favicon and apple icon -->
    <link
        rel="shortcut icon"
        href="{{ asset('front2/favicon.ico') }}"
        type="image/x-icon"
    >
    <link
        rel="apple-touch-icon-precomposed"
        href="{{ asset('front2/apple-touch-icon.png') }}"
    >
    <!-- Stylesheet -->
    <link
        rel="stylesheet"
        href="{{ asset('front2/css/vendors/uikit.min.css') }}"
    >
    <link
        rel="stylesheet"
        href="{{ asset('front2/css/style.css') }}"
    >
</head>

<body>
    <!-- preloader begin -->
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- preloader end -->
    <header style="background-color: black">
        <!-- header content begin -->
        <div class="uk-section uk-padding-remove-vertical in-header-home ">
            <!-- module navigation begin -->
            <nav
                class="uk-navbar-container uk-navbar-transparent"
                data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade;"
            >
                <div
                    class="uk-container"
                    data-uk-navbar
                >
                    <div class="uk-navbar-left uk-width-auto">
                        <div class="uk-navbar-item">
                            <!-- module logo begin -->
                            <a
                                class="uk-logo"
                                href="/"
                            >
                                <img
                                    class="uk-margin-small-right in-offset-top-10"
                                    src="{{ asset('front2/img/in-lazy.gif') }}"
                                    data-src="{{ asset(config('app.logo')) }}"
                                    alt="wave"
                                    style="height:100px; width: auto;"
                                    data-uk-img
                                >
                            </a>
                            <!-- module logo begin -->
                        </div>
                    </div>
                    <div class="uk-navbar-right uk-width-expand uk-flex uk-flex-right">
                        <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="/">Home</a></li>
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/contact-us">Contact Us</a></li>

                            {{-- <li><a href="#">About Us<i class="fas fa-chevron-down"></i></a>
                                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                                    <div class="uk-navbar-dropdown-grid uk-child-width-1-2" data-uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li><a href="/about-us">About Me</a></li>
                                                <li><a href="/contact-us">Contact Us<i class="fas fa-external-link-square-alt fa-sm"></i></a></li>
                                                <li><a href="/terms-and-conditions">Terms & conditions<i class="fas fa-gavel fa-sm"></i></a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li><a class="uk-disabled" href="#">With our support, you’ll be better positioned to generate huge profits based on our tremendous trading experience in Forex and Crypto Trading.</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            {{-- <li><a href="/packages">Packages</a></li>
                            <li><a href="/testimonials">Testimonials</a></li> --}}
                            <li><a href="/faqs">FAQs</a></li>

                        </ul>
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <a
                                href="/login"
                                class="uk-button uk-button-text"
                            ><i class="fas fa-user-circle uk-margin-small-right"></i>Log in</a>
                            <a
                                href="/register"
                                class="uk-button uk-button-primary uk-button-small uk-border-pill"
                            >Sign up</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- module navigation end -->
