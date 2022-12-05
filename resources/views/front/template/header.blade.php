<!doctype html>
<html lang="zxx" class="theme-light">
    
<!-- Mirrored from templates.envytheme.com/luvion/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 11:31:43 GMT -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/magnific-popup.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/slick.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/meanmenu.css')}}">
		<link rel="stylesheet" href="{{asset('front/css/odometer.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/dark-style.css')}}">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" type="image/png" href="{{asset('front/favicon.png')}}">
    </head>

    <body>
        <div id="app">
            

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="luvion-responsive-nav">
                <div class="container">
                    <div class="luvion-responsive-menu">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{asset('front/img/logo.png')}}" alt="logo">
                                <img src="{{asset('front/img/black-logo.png')}}" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="luvion-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-dark">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('front/img/logo.png')}}" alt="logo">
                            <img src="{{asset('front/img/black-logo.png')}}" alt="logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="#" class="nav-link active">Home </a>
                                    {{-- <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="index.html" class="nav-link">Banking & Payment Processing</a></li>

                                        <li class="nav-item"><a href="index-2.html" class="nav-link active">Loan Providers</a></li>

                                        <li class="nav-item"><a href="index-3.html" class="nav-link">Digital Banking</a></li>

                                        <li class="nav-item"><a href="index-4.html" class="nav-link">Financial Service Provider</a></li>

                                        <li class="nav-item"><a href="index-5.html" class="nav-link">Bankers & Entrepreneurs</a></li>

                                        <li class="nav-item"><a href="index-6.html" class="nav-link">Social Finance Agency</a></li>

                                        <li class="nav-item"><a href="index-7.html" class="nav-link">Currency Transfer Provider</a></li>
                                    </ul> --}}
                                </li>

                                <li class="nav-item"><a href="{{ url('/shop') }}" class="nav-link">Rent Now</a></li>

                                <li class="nav-item"><a href="#" class="nav-link">Categories <i class="fas fa-chevron-down"></i></a>
                                    <ul class="dropdown-menu">
                                        @if ($categories)
                                        @foreach ($categories as $category)
                                        <li class="nav-item"><a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="nav-link">
                                           {{ $category->name }}</a></li>     
                                        @endforeach    
                                        @endif
                                        
                                       
                                     </ul>
                                </li>

                                <li class="nav-item"><a href="#" class="nav-link">Pages <i class="fas fa-chevron-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a href="#" class="nav-link">About Us</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="about.html" class="nav-link">About Style One</a></li>

                                                <li class="nav-item"><a href="about-two.html" class="nav-link">About Style Two</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item"><a href="#" class="nav-link">Features</a>
                                            <ul class="dropdown-menu">
                                                <li class="nav-item"><a href="features-1.html" class="nav-link">Features Style One</a></li>
        
                                                <li class="nav-item"><a href="features-2.html" class="nav-link">Features Style Two</a></li>
                                            </ul>
                                        </li>

                                        <li class="nav-item"><a href="team.html" class="nav-link">Team</a></li>

                                        

                                        <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>

                                        <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>

                                        <li class="nav-item"><a href="error-404.html" class="nav-link">404 Error</a></li>

                                        <li class="nav-item"><a href="faq.html" class="nav-link">FAQ</a></li>

                                        <li class="nav-item"><a href="how-it-works.html" class="nav-link">How It Works</a></li>

                                        <li class="nav-item"><a href="personal.html" class="nav-link">Personal</a></li>

                                        <li class="nav-item"><a href="business.html" class="nav-link">Business</a></li>

                                        <li class="nav-item"><a href="contact-two.html" class="nav-link">Contact Style Two</a></li>
                                    </ul>
                                </li>

                              

                                <li class="nav-item"><a href="contact.html" class="nav-link">Contact Us</a></li>
                            </ul>

                            <div class="others-options">
                                <a href="{{ url('/login') }}" class="login-btn"><i class="flaticon-user"></i> Log In</a>
                                <a href="{{ url('/register') }}" class="login-btn"><i class="flaticon-user"></i> Register</a>
                            
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->