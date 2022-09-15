<!DOCTYPE html>
<html lang="zxx" dir="ltr">


<!-- Mirrored from www.indonez.com/html-demo/Wave/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Aug 2022 19:01:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="description" content="{{config('app.name')}} Cryptocurrency, Forex Broker">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#313131" />
    <!-- Site Properties -->
    <title>{{ config('app.name') }}</title>
    <!-- Critical preload -->
    <link rel="preload" href="{{asset('front/js/vendors/uikit.min.js')}}" as="script">
    {{-- <link rel="preload" href="{{asset('js/s')}}" as="script"> --}}
    <link rel="preload" href="{{asset('front/css/vendors/uikit.min.css')}}" as="style">
    <link rel="preload" href="{{asset('front/css/style.css')}}" as="style">
    <!-- Icon preload -->
    <link rel="preload" href="{{asset('front/fonts/fa-brands-400.woff2')}}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{asset('front/fonts/fa-solid-900.woff2')}}" as="font" type="font/woff2" crossorigin>
    <!-- Font preload -->
    <link rel="preload" href="{{asset('front/fonts/rubik-v9-latin-500.woff2')}}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{asset('front/fonts/rubik-v9-latin-300.woff2')}}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{asset('front/fonts/rubik-v9-latin-regular.woff2')}}" as="font" type="font/woff2" crossorigin>
    <!-- Favicon and apple icon -->
    <link rel="shortcut icon" href="{{asset('front/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" href="{{asset('front/apple-touch-icon.png')}}">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{asset('front/css/vendors/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
</head>

<body>
    <!-- preloader begin -->
    <div class="in-loader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- preloader end -->
    <header>
        <!-- header content begin -->
        <div class="uk-section uk-padding-remove-vertical">
            <nav class="uk-navbar-container" data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top;">
                <div class="uk-container" data-uk-navbar>
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item">
                            <!-- logo begin -->
                            <a class="uk-logo" href="/">
                                <img src="{{asset('front/img/in-lazy.gif')}}" data-src="{{asset(config('app.logo'))}}" alt="logo" width="146" height="39" data-uk-img>
                            </a>
                            <!-- logo end -->
                            <!-- navigation begin -->
                            <ul class="uk-navbar-nav uk-visible@m">
                            <li><a href="/">Home</a></li>


                            <li><a href="#">About Us<i class="fas fa-chevron-down"></i></a>
                                <div class="uk-navbar-dropdown uk-navbar-dropdown-width-2">
                                    <div class="uk-navbar-dropdown-grid uk-child-width-1-2" data-uk-grid>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li><a href="/about-us">About Us</a></li>
                                                <li><a href="/contact-us">Contact Us<i class="fas fa-external-link-square-alt fa-sm"></i></a></li>
                                                {{-- <li><a href="/terms-and-conditions">Terms & conditions<i class="fas fa-gavel fa-sm"></i></a></li> --}}
                                            </ul>
                                        </div>
                                        <div>
                                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                                <li><a class="uk-disabled" href="#">With our support, you’ll be better positioned to generate huge profits based on our tremendous trading experience in Forex and Crypto Trading.</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            {{-- <li><a href="/packages">Packages</a></li>
                            <li><a href="/testimonials">Testimonials</a></li> --}}
                            <li><a href="/faqs">FAQs</a></li>

                        </ul>
                        </div>
                        <div class="uk-navbar-right">
                            <div class="uk-navbar-item uk-visible@m in-optional-nav">
                                <a href="/login" class="uk-button uk-button-text"><i class="fas fa-user-circle uk-margin-small-right"></i>Log in</a>
                                <a href="/register" class="uk-button uk-button-primary uk-button-small uk-border-pill">Sign up</a>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
            <!-- module navigation end -->
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1" style="margin-top: 35px;">
                        <div class="uk-card uk-card-secondary uk-card-small uk-card-body uk-border-rounded">
                            <div class="uk-grid uk-text-small" data-uk-grid>
                                <div class="uk-width-3-4@m uk-visible@m">
                                    <p>Trading involves substantial risk and may result in the loss of your invested/greater that your invested capital, respectively.</p>
                                </div>
                                <div class="uk-width-expand@m uk-text-center uk-text-right@m">
                                    <a class="uk-margin-right" href="#"><i class="fas fa-comment-alt uk-margin-small-right"></i>Live Chat</a>
                                    <a href="#"><i class="fas fa-phone-alt uk-margin-small-right uk-margin-small-left"></i>1-800-123-4567</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- module breadcrumb begin -->
                    <div class="uk-width-1-1 in-breadcrumb" style="margin-top: 20px;">
                        <ul class="uk-breadcrumb uk-text-uppercase">
                            <li style="color: black"><a href="/">Home</a></li>
                        </ul>
                    </div>
                    <!-- module breadcrumb end -->
                </div>
            </div>
        </div>
        <!-- header content end -->
    </header>
