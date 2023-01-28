<!doctype html>
<html lang="zxx" class="theme-light">
    
<!-- Mirrored from templates.envytheme.com/luvion/default/error-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 11:33:04 GMT -->
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

        <title>{{config('app.name')}} 404</title>

        <link rel="icon" type="image/png" href="assets/img/favicon.png">
    </head>

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Error Area -->
		<section class="error-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="error-content">
                            <img src="{{asset('front/img/404.png')}}" alt="error">
        
                            <h3>Page Not Found</h3>
                            <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                            
                            <a href="{{route('shop.index')}}" class="btn btn-primary">Go Shopping</a>
                            @if (Auth::check())
                            <h5>OR</h5>
                            <a href="{{route('user.index')}}" class="btn btn-secondary">Go To Dashboard</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- End Error Area -->

        <!-- Dark/Light Toggle -->
		<div class="dark-version">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div>

        

        <!-- Links of JS files -->
<script src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/meanmenu.js') }}"></script>
<script src="{{ asset('front/js/nice-select.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/js/appear.min.js') }}"></script>
<script src="{{ asset('front/js/odometer.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/js/parallax.min.js') }}"></script>
<script src="{{ asset('front/js/wow.min.js') }}"></script>
<script src="{{ asset('front/js/form-validator.min.js') }}"></script>
<script src="{{ asset('front/js/contact-form-script.js') }}"></script>
{{-- <script src="{{ asset('front/js/jquery.ajaxchimp.min.js') }}"></script> --}}
<script src="{{ asset('front/js/main.js') }}"></script>
    </body>

<!-- Mirrored from templates.envytheme.com/luvion/default/error-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 11:33:05 GMT -->
</html>