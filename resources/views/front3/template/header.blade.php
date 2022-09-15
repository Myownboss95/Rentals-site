<!DOCTYPE html>
<html dir="ltr">

<head>
    <!-- Standard Meta -->
    <meta
        http-equiv="content-type"
        content="text/html;charset=UTF-8"
    />
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
        content="#FCB42D"
    />
    <!-- Site Properties -->
    <title>{{ config('app.name') }}</title>
    <!-- critical preload -->
    <link
        rel="preload"
        href="{{ asset('front/js/vendors/uikit.min.js') }}"
        as="script"
    >
    <link
        rel="preload"
        href="{{ asset('front/css/vendors/uikit.min.css') }}"
        as="style"
    >
    <link
        rel="preload"
        href="{{ asset('front/css/style.css') }}"
        as="style"
    >
    <!-- icon preload -->
    <link
        rel="preload"
        href="{{ asset('front/fonts/fa-brands-400.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <link
        rel="preload"
        href="{{ asset('front/fonts/fa-solid-900.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <!-- font preload -->
    <link
        rel="preload"
        href="{{ asset('front/fonts/archivo-v9-latin-regular.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <link
        rel="preload"
        href="{{ asset('front/fonts/archivo-v9-latin-300.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <link
        rel="preload"
        href="{{ asset('front/fonts/archivo-v9-latin-700.woff2') }}"
        as="font"
        type="font/woff2"
        crossorigin
    >
    <!-- Favicon and apple icon -->
    <link
        rel="shortcut icon"
        href="{{ asset('front/favicon.ico') }}"
        type="image/x-icon"
    >
    <link
        rel="{{ asset('front/apple-touch-icon-precomposed') }}"
        href="{{ asset('front/apple-touch-icon.png') }}"
    >
    <!-- css -->
    <link
        rel="stylesheet"
        href="{{ asset('front/css/vendors/uikit.min.css') }}"
    >
    <link
        rel="stylesheet"
        href="{{ asset('front/css/style.css') }}"
    >

    <script
        type="text/javascript"
        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
    ></script>

    <script type="text/javascript">
        window.googleTranslateElementInit = () => {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                // layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
        }
    </script>

    <style>
        body>div.skiptranslate{
            display: none;
            visibility: hidden;
            height: 0;
            width:0;
        }

        body {
            top: 0 !important;
        }
        ['id' = ':0.targetLanguage'] span {
            display: none;
        }
    </style>


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
        <div
            class="uk-section uk-padding-remove-vertical"
            style="background-color: black"
        >
            <nav
                class="uk-navbar-container uk-navbar-transparent"
                data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top;"
            >
                <div
                    class="uk-container"
                    data-uk-navbar
                >
                    <div class="uk-navbar-left">
                        <div class="uk-navbar-item">
                            <!-- logo begin -->
                            <a
                                class="uk-logo"
                                href="/"
                            >
                                <img
                                    src="{{ asset('front/img/in-lazy.gif') }}"
                                    data-src="{{ asset(config('app.logo')) }}"
                                    alt="logo"
                                    style="width:100px; height: auto;"
                                    data-uk-img
                                >
                            </a>
                            <!-- logo end -->
                            <!-- navigation begin -->
                            <ul class="uk-navbar-nav uk-visible@m">
                                <li><a href="/">{{ __('Home') }}</a></li>
                                <li><a href="/about-us">{{ __('About Us') }}</a></li>
                                <li><a href="/contact-us">{{ __('Contact Us') }}</a></li>
                                <li><a href="/faqs">{{ __('FAQs') }}</a></li>


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
                                {{-- <li><a href="/packages">Packages</a></li> --}}
                                {{-- <li><a href="/testimonials">Testimonials</a></li> --}}
                                {{-- <li><a href="/faqs">FAQs</a></li> --}}

                            </ul>
                            <!-- navigation end -->
                        </div>
                    </div>
                    <div class="uk-navbar-right">
                        <div style="margin-right: 75px" id="google_translate_element"></div>
                        {{-- <div style="margin-right: 75px">
                            <a href="javascript:void(0);">
                                <img
                                    src="{{ asset('storage/flags/' . $active_language['flag']) }}"
                                    style="width:16px; height: auto;"
                                />
                                {{ $active_language['name'] }}
                            </a>
                            <div class="uk-navbar-dropdown uk-navbar-dropdown-width-1/2">
                                <div
                                    class="uk-navbar-dropdown-grid uk-child-width-1"
                                    data-uk-grid
                                >
                                    <div>
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            @foreach ($languages as $language)
                                                <li>
                                                    <a href="{{ route('set-locale', $language['short_name']) }}">
                                                        <img
                                                            src="{{ asset('storage/flags/' . $language['flag']) }}"
                                                            style="width:16px; height: auto;"
                                                        />
                                                        {{ $language['name'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="uk-navbar-item uk-visible@m in-optional-nav">
                            <a
                                href="/login"
                                class="uk-button uk-button-text"
                            >{{ __('Log in') }}<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                            <a
                                href="/register"
                                class="uk-button uk-button-primary uk-border-rounded"
                            >{{ __('Sign up') }}<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- header content end -->
    </header>
    <main>
