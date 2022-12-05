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
        <style type="text/css">
        .categories:hover{
            color: white;
        }
        </style>
        <link rel="icon" type="image/png" href="{{asset('front/favicon.png')}}">
    </head>

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
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="{{url('/')}}">
                            <img src="{{asset('front/img/logo.png')}}" alt="logo">
                            <img src="{{asset('front/img/black-logo.png')}}" alt="logo">
                        </a>

                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item"><a href="{{url('/')}}" class="nav-link active">Home <i class="fas fa-chevron-down"></i></a>
                                   
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

                               

                                <li class="nav-item"><a href="contact.html" class="nav-link">Contact Us</a></li>
                            </ul>

                         
                            <a href="{{ url('/login') }}" class="login-btn"><i class="flaticon-user"></i> Log In</a>
                            <a href="{{ url('/register') }}" class="login-btn"><i class="flaticon-user"></i> Register</a></div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>



        <!-- End Navbar Area -->

        