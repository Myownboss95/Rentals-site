<!doctype html>
<html lang="zxx" class="theme-light">
    
<!-- Mirrored from templates.envytheme.com/luvion/default/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Nov 2022 11:31:43 GMT -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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

        {{-- everything beloging to rev slider --}}
        <!-- LOAD JQUERY LIBRARY -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
			
			<!-- LOADING FONTS AND ICONS -->
			<link href="https://fonts.googleapis.com/css?family=Poppins:500%2C200%2C600%7CPlayfair+Display:italic%7CRoboto:400&display=swap" rel="stylesheet" property="stylesheet" media="all" type="text/css" >

			
			<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css')}}">
			<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/font-awesome/css/font-awesome.css')}}">
			
			<!-- REVOLUTION STYLE SHEETS -->
			<link rel="stylesheet" type="text/css" href="{{asset('front/css/rs6.css')}}">
             <script>
                window.RS_MODULES = window.RS_MODULES || {};
                window.RS_MODULES.modules = window.RS_MODULES.modules || {};
                window.RS_MODULES.waiting = window.RS_MODULES.waiting || [];
                window.RS_MODULES.defered = true;
                window.RS_MODULES.moduleWaiting = window.RS_MODULES.moduleWaiting || {};
                window.RS_MODULES.type = 'compiled';
            </script>
                




             <script src="{{asset('front/js/rbtools.min.js')}}"></script>
             <script src="{{asset('front/js/rs6.min.js')}}"></script>
             <script>function setREVStartSize(e){
                //window.requestAnimationFrame(function() {
                    window.RSIW = window.RSIW===undefined ? window.innerWidth : window.RSIW;
                    window.RSIH = window.RSIH===undefined ? window.innerHeight : window.RSIH;
                    try {
                        var pw = document.getElementById(e.c).parentNode.offsetWidth,
                            newh;
                        pw = pw===0 || isNaN(pw) ? window.RSIW : pw;
                        e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
                        e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
                        e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
                        e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
                        e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
                        e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
                        e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);
                        if(e.layout==="fullscreen" || e.l==="fullscreen")
                            newh = Math.max(e.mh,window.RSIH);
                        else{
                            e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
                            for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];
                            e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
                            e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
                            for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
                                                
                            var nl = new Array(e.rl.length),
                                ix = 0,
                                sl;
                            e.tabw = e.tabhide>=pw ? 0 : e.tabw;
                            e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
                            e.tabh = e.tabhide>=pw ? 0 : e.tabh;
                            e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;
                            for (var i in e.rl) nl[i] = e.rl[i]<window.RSIW ? 0 : e.rl[i];
                            sl = nl[0];
                            for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}
                            var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);
                            newh =  (e.gh[ix] * m) + (e.tabh + e.thumbh);
                        }
                        var el = document.getElementById(e.c);
                        if (el!==null && el) el.style.height = newh+"px";
                        el = document.getElementById(e.c+"_wrapper");
                        if (el!==null && el) {
                            el.style.height = newh+"px";
                            el.style.display = "block";
                        }
                    } catch(e){
                        console.log("Failure at Presize of Slider:" + e)
                    }
                //});
              };</script>
        {{-- end rev slider dependencies --}}
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
        <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
        <script src="{{ asset('front/js/meanmenu.js') }}"></script>
        <link rel="stylesheet" href="{{asset('front/css/meanmenu.css')}}">
           
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

                            <div class="others-options">
                                @if (Auth::check())
                                <a href="{{ route('login') }}" class="login-btn"><i class="bi bi-easel2-fill"></i> Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                                    @csrf
                                    <button class="btn btn-danger btn-xs p-2" title="Log Out" type="submit"><i class="bi bi-power"></i></button>
                                </form>
                                @else
                                <a href="{{ url('/login') }}" class="login-btn"><i class="flaticon-user"></i> Log In</a>
                                <a href="{{ url('/register') }}" class="login-btn"><i class="flaticon-user"></i> Register</a>
                                @endif
                            
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->







        {{-- REVOLUTION SLIDER MAIN CODE STARTS HERE --}}

        <p class="rs-p-wp-fix"></p>
	<rs-module-wrap id="rev_slider_6_1_wrapper" data-alias="real-estate-slider1" data-source="gallery"
		style="visibility:hidden;background:#333333;padding:0;">
		<rs-module id="rev_slider_6_1" class="rs-respect-topbar" style="" data-version="6.5.12">
			<rs-slides>
				<rs-slide style="position: absolute;" data-key="rs-27" data-title="Slide"
					data-thumb="{{asset('front/assets/alina-kacharho-86wR5GZJZdQ-unsplash-1-scaled-50x100.jpg')}}"
					data-anim="d:35;ms:2000;f:edges;" data-in="o:0;x:cyc(100%|-100%);m:true;row:8;"
					data-out="o:0;e:power3.in;" data-d3="f:cube;z:450;t:20;su:true;sc:#9e9e9e;">
					<img src="{{asset('front/assets/alina-kacharho-86wR5GZJZdQ-unsplash-1-scaled.jpg')}}" alt=""
						title="RENT JETTY IN NIGERIA" width="2560" height="1760" class="rev-slidebg tp-rs-img"
						data-parallax="8" data-panzoom="d:10000;ss:100%;se:120%;" data-no-retina>
					<!--						--><rs-zone id="rrzm_27" class="rev_row_zone_middle" style="z-index: 18;"><!--

								--><rs-row id="slider-6-slide-27-layer-1" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="r:80,50,50,20;l:80,50,50,20;" data-frame_0="o:1;"
							data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:1;"><!--
									--><rs-column id="slider-6-slide-27-layer-2" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:100%;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:2;width:100%;"><!--
										--><rs-layer id="slider-6-slide-27-layer-0" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:120,99,75,46;l:110,90,68,41;fw:500;"
									data-padding="r:20,17,13,8;b:10,8,6,4;l:20,17,13,8;" data-frame_0="o:1;"
									data-frame_0_words="d:5;y:122%;sX:1.3;sY:1.3;o:1;rZ:15deg;"
									data-frame_0_mask="u:t;y:0%;" data-frame_1="e:power4.inOut;sp:1500;"
									data-frame_1_words="e:power4.inOut;d:10;" data-frame_1_mask="u:t;"
									data-frame_999="o:1;e:power4.inOut;st:w;sp:500;sR:6750;"
									data-frame_999_words="d:5;y:-130%;sX:1.3;sY:1.3;o:1;rZ:-15deg;"
									data-frame_999_mask="u:t;" style="z-index:3;font-family:'Poppins';"><span
										style="font-weight:200;">Get Memorable</span><br />Boat Rides<br /><span
										style="font-family: Playfair Display;font-weight:400;font-style: italic;">&
										Cruises</span>
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--

								--><rs-row id="slider-6-slide-27-layer-9" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="t:100,100,50,30;r:100,50,50,25;l:100,50,50,25;"
							data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:4;"><!--
									--><rs-column id="slider-6-slide-27-layer-10" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:66.67%;" data-margin="r:50,50,0,0;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:5;width:100%;"><!--
										--><rs-layer id="slider-6-slide-27-layer-5" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:30,24,18,18;l:40,33,25,25;fw:200;" data-dim="w:100%;"
									data-disp="inline-block" data-margin="b:0,0,50,30;" data-frame_0="y:bottom;o:1;"
									data-frame_0_mask="u:t;" data-frame_1="e:power4.inOut;st:500;sp:2000;sR:500;"
									data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6500;"
									data-frame_999_mask="u:t;"
									style="z-index:6;font-family:'Poppins';display:inline-block;">For the best
									affordable rentals and leisure experience, signup on 232rentals.com
								</rs-layer><!--
									--></rs-column><!--

									--><rs-column id="slider-6-slide-27-layer-12" data-type="column" data-xy="xo:50px;yo:330px;" data-rsp_bd="off"
								data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;"
								style="z-index:7;width:100%;"><!--
										--><a id="slider-6-slide-27-layer-6" class="rs-layer rev-btn" href="{{route('shop.index')}}"
									target="_self" data-type="button" data-color="#000000" data-rsp_ch="on"
									data-text="w:normal;s:20,16,15,13;l:76,62,46,36;fw:600;"
									data-dim="minh:0px,none,none,none;" data-disp="inline-block"
									data-padding="r:50,41,31,19;l:50,41,31,19;"
									data-border="bos:solid;bow:2px,2px,2px,2px;bor:5px,5px,5px,5px;"
									data-frame_0="y:bottom;o:1;" data-frame_0_mask="u:t;"
									data-frame_1="e:power4.inOut;st:650;sp:2000;sR:650;" data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6350;"
									data-frame_999_mask="u:t;"
									data-frame_hover="c:#fff;bgc:rgba(255,255,255,0);boc:#fff;bor:5px,5px,5px,5px;bos:solid;bow:2px,2px,2px,2px;sp:200ms;e:power1.inOut;bri:120%;"
									style="z-index:8;background-color:#ffffff;font-family:'Poppins';display:inline-block;">See
									Available Offers
								</a><!--

										--><rs-layer id="slider-6-slide-27-layer-13" class="rs-noevents" data-type="text"
									data-bsh="c:rgba(0,0,0,0.5);v:5px,4px,3px,1px;b:20px,16px,12px,7px;"
									data-rsp_ch="on" data-text="w:normal;s:20,16,13,13;l:30,24,20,18;fw:600;a:center;"
									data-dim="w:30px,24px,20px,18px;" data-disp="inline-block"
									data-margin="t:-15,-12,-10,-9;l:-15,-12,-10,-9;"
									data-border="bor:30px,30px,30px,30px;"
									data-frame_0="y:50px,41px,31px,19px;sX:0;sY:0;"
									data-frame_1="e:back.out;st:2150;sp:500;sR:2150;"
									data-frame_999="sX:0.5;sY:0.5;o:0;st:w;sR:6350;"
									data-loop_999="sX:1.2;sY:1.2;sp:500;st:2600;e:sine.inOut;yys:t;yyf:t;"
									style="z-index:9;background-color:#ff0000;font-family:'Poppins';display:inline-block;">2
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--
							--></rs-zone><!--

							--><rs-layer id="slider-6-slide-27-layer-3" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="yo:-1px,0,0,0;" data-text="w:normal;s:100,82,62,38;l:100,82,62,38;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:16;font-family:'Playfair Display';text-transform:uppercase;font-style:italic;">a
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-27-layer-4" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="xo:100px,82px,62px,38px;"
						data-text="w:normal;s:100,82,62,38;l:100,82,62,38;fw:200;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:15;font-family:'Poppins';text-transform:uppercase;">B
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-27-layer-15" data-type="shape" data-rsp_ch="on"
						data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:100%;h:100%;" data-basealign="slide"
						data-frame_999="o:0;st:w;" style="z-index:14;background-color:rgba(0,0,0,0.49);">
					</rs-layer><!--
--> </rs-slide>
				<rs-slide style="position: absolute;" data-key="rs-23" data-title="Slide"
					data-thumb="{{asset('front/assets/emmanuel-ikwuegbu-BdZPID68yjM-unsplash-scaled-50x100.jpg" data-anim="ms:2000;')}}"
					data-in="o:0;" data-out="a:false;" data-d3="f:cube;d:vertical;z:400;c:#000000;su:true;sma:1;">
					<img src="{{asset('front/assets/emmanuel-ikwuegbu-BdZPID68yjM-unsplash-scaled.jpg')}}" alt=""
						title="emmanuel-ikwuegbu-BdZPID68yjM-unsplash" width="2560" height="1707"
						class="rev-slidebg tp-rs-img" data-parallax="8" data-panzoom="d:10000;ss:120%;se:100;"
						data-no-retina>
					<!--						--><rs-zone id="rrzm_23" class="rev_row_zone_middle" style="z-index: 18;"><!--

								--><rs-row id="slider-6-slide-23-layer-1" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="r:80,50,50,20;l:80,50,50,20;" data-frame_0="o:1;"
							data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:1;"><!--
									--><rs-column id="slider-6-slide-23-layer-2" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:100%;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:2;width:100%;"><!--
										--><rs-layer id="slider-6-slide-23-layer-0" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:113,93,70,43;l:103,85,64,39;fw:500;"
									data-padding="r:19,16,12,7;b:9,7,5,3;l:19,16,12,7;" data-frame_0="o:1;"
									data-frame_0_words="d:5;y:122%;sX:1.3;sY:1.3;o:1;rZ:15deg;"
									data-frame_0_mask="u:t;y:0%;" data-frame_1="e:power4.inOut;sp:1500;"
									data-frame_1_words="e:power4.inOut;d:10;" data-frame_1_mask="u:t;"
									data-frame_999="o:1;e:power4.inOut;st:w;sp:500;sR:6750;"
									data-frame_999_words="d:5;y:-130%;sX:1.3;sY:1.3;o:1;rZ:-15deg;"
									data-frame_999_mask="u:t;" style="z-index:3;font-family:'Poppins';"><span
										style="font-weight:200;">Get The Best</span><br />Service Apartments<br /><span
										style="font-family: Playfair Display;font-weight:400;font-style: italic;">Available</span>
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--

								--><rs-row id="slider-6-slide-23-layer-9" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="t:100,100,50,30;r:100,50,50,25;l:100,50,50,25;"
							data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:4;"><!--
									--><rs-column id="slider-6-slide-23-layer-10" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:66.67%;" data-margin="r:50,50,0,0;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:5;width:100%;"><!--
										--><rs-layer id="slider-6-slide-23-layer-5" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:30,24,18,18;l:40,33,25,25;fw:200;" data-dim="w:100%;"
									data-disp="inline-block" data-margin="b:0,0,50,30;" data-frame_0="y:bottom;o:1;"
									data-frame_0_mask="u:t;" data-frame_1="e:power4.inOut;st:500;sp:2000;sR:500;"
									data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6500;"
									data-frame_999_mask="u:t;"
									style="z-index:6;font-family:'Poppins';display:inline-block;">For the best
									affordable rentals and leisure experience, signup on 232rentals.com
								</rs-layer><!--
									--></rs-column><!--

									--><rs-column id="slider-6-slide-23-layer-12" data-type="column" data-xy="xo:50px;yo:330px;" data-rsp_bd="off"
								data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;"
								style="z-index:7;width:100%;"><!--
										--><a id="slider-6-slide-23-layer-6" class="rs-layer rev-btn" href="{{route('shop.index')}}"
									target="_self" data-type="button" data-color="#000000" data-rsp_ch="on"
									data-text="w:normal;s:20,16,15,13;l:76,62,46,36;fw:600;"
									data-dim="minh:0px,none,none,none;" data-disp="inline-block"
									data-padding="r:50,41,31,19;l:50,41,31,19;"
									data-border="bos:solid;bow:2px,2px,2px,2px;bor:5px,5px,5px,5px;"
									data-frame_0="y:bottom;o:1;" data-frame_0_mask="u:t;"
									data-frame_1="e:power4.inOut;st:650;sp:2000;sR:650;" data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6350;"
									data-frame_999_mask="u:t;"
									data-frame_hover="c:#fff;bgc:rgba(255,255,255,0);boc:#fff;bor:5px,5px,5px,5px;bos:solid;bow:2px,2px,2px,2px;sp:200ms;e:power1.inOut;bri:120%;"
									style="z-index:8;background-color:#ffffff;font-family:'Poppins';display:inline-block;">See
									Available Offers
								</a><!--

										--><rs-layer id="slider-6-slide-23-layer-13" class="rs-noevents" data-type="text"
									data-bsh="c:rgba(0,0,0,0.5);v:5px,4px,3px,1px;b:20px,16px,12px,7px;"
									data-rsp_ch="on" data-text="w:normal;s:20,16,13,13;l:30,24,20,18;fw:600;a:center;"
									data-dim="w:30px,24px,20px,18px;" data-disp="inline-block"
									data-margin="t:-15,-12,-10,-9;l:-15,-12,-10,-9;"
									data-border="bor:30px,30px,30px,30px;"
									data-frame_0="y:50px,41px,31px,19px;sX:0;sY:0;"
									data-frame_1="e:back.out;st:2150;sp:500;sR:2150;"
									data-frame_999="sX:0.5;sY:0.5;o:0;st:w;sR:6350;"
									data-loop_999="sX:1.2;sY:1.2;sp:500;st:2600;e:sine.inOut;yys:t;yyf:t;"
									style="z-index:9;background-color:#ff0000;font-family:'Poppins';display:inline-block;">5
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--
							--></rs-zone><!--

							--><rs-layer id="slider-6-slide-23-layer-3" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="yo:-1px,0,0,0;" data-text="w:normal;s:100,82,62,38;l:100,82,62,38;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:16;font-family:'Playfair Display';text-transform:uppercase;font-style:italic;">a
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-23-layer-4" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="xo:100px,82px,62px,38px;"
						data-text="w:normal;s:100,82,62,38;l:100,82,62,38;fw:200;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:15;font-family:'Poppins';text-transform:uppercase;">B
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-23-layer-7" data-type="shape" data-rsp_ch="on"
						data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:50%;h:100%;" data-basealign="slide"
						data-frame_999="o:0;e:power4.inOut;st:w;sp:1000;sR:8700;"
						style="z-index:14;background:linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 100%);">
					</rs-layer><!--
--> </rs-slide>
				<rs-slide style="position: absolute;" data-key="rs-24" data-title="Slide"
					data-thumb="{{asset('front/assets/home_2214-50x100.jpeg')}}" data-anim="ms:1500;f:nodelay;o:outin;"
					data-in="o:0;x:(15%);y:(-10%);r:20;sx:0.7;sy:0.7;e:power2.out;"
					data-out="x:cyc((60%)|(130%));y:cyc(-90%|170%);r:cyc((-30)|(60));sx:1.3;sy:1.2;row:2;">
					<img src="{{asset('front/assets/home_2214.jpeg')}}" alt="" title="home_2214.jpeg" width="1920" height="1080"
						class="rev-slidebg tp-rs-img" data-parallax="8" data-no-retina>
					<rs-bgvideo data-video="w:100%;h:100%;nse:false;l:true;ptimer:false;vfc:true;"
						data-mp4="{{asset('front/assets/alina-kacharho-86wR5GZJZdQ-unsplash-1-scaled.jpg')}}"></rs-bgvideo>
					<!--						--><rs-zone id="rrzm_24" class="rev_row_zone_middle" style="z-index: 18;"><!--

								--><rs-row id="slider-6-slide-24-layer-1" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="r:80,50,50,20;l:80,50,50,20;" data-frame_0="o:1;"
							data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:1;"><!--
									--><rs-column id="slider-6-slide-24-layer-2" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:100%;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:2;width:100%;"><!--
										--><rs-layer id="slider-6-slide-24-layer-0" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:120,99,75,46;l:110,90,68,41;fw:500;"
									data-padding="r:20,17,13,8;b:10,8,6,4;l:20,17,13,8;" data-frame_0="o:1;"
									data-frame_0_words="d:5;y:122%;sX:1.3;sY:1.3;o:1;rZ:15deg;"
									data-frame_0_mask="u:t;y:0%;" data-frame_1="e:power4.inOut;sp:1500;"
									data-frame_1_words="e:power4.inOut;d:10;" data-frame_1_mask="u:t;"
									data-frame_999="o:1;e:power4.inOut;st:w;sp:500;sR:6750;"
									data-frame_999_words="d:5;y:-130%;sX:1.3;sY:1.3;o:1;rZ:-15deg;"
									data-frame_999_mask="u:t;" style="z-index:3;font-family:'Poppins';"><span
										style="font-weight:200;">Rent Classy</span><br />Furniture<br /><span
										style="font-family: Playfair Display;font-weight:400;font-style: italic;">In a
										Minute</span>
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--

								--><rs-row id="slider-6-slide-24-layer-9" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="t:100,100,50,30;r:100,50,50,25;l:100,50,50,25;"
							data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:4;"><!--
									--><rs-column id="slider-6-slide-24-layer-10" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:66.67%;" data-margin="r:50,50,0,0;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:5;width:100%;"><!--
										--><rs-layer id="slider-6-slide-24-layer-5" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:30,24,18,18;l:40,33,25,25;fw:200;" data-dim="w:100%;"
									data-disp="inline-block" data-margin="b:0,0,50,30;" data-frame_0="y:bottom;o:1;"
									data-frame_0_mask="u:t;" data-frame_1="e:power4.inOut;st:500;sp:2000;sR:500;"
									data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6500;"
									data-frame_999_mask="u:t;"
									style="z-index:6;font-family:'Poppins';display:inline-block;">For the best
									affordable rentals and leisure experience, signup on 232rentals.com
								</rs-layer><!--
									--></rs-column><!--

									--><rs-column id="slider-6-slide-24-layer-12" data-type="column" data-xy="xo:50px;yo:330px;" data-rsp_bd="off"
								data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;"
								style="z-index:7;width:100%;"><!--
										--><a id="slider-6-slide-24-layer-6" class="rs-layer rev-btn" href="{{route('shop.index')}}"
									target="_self" data-type="button" data-color="#000000" data-rsp_ch="on"
									data-text="w:normal;s:20,16,15,13;l:76,62,46,36;fw:600;"
									data-dim="minh:0px,none,none,none;" data-disp="inline-block"
									data-padding="r:50,41,31,19;l:50,41,31,19;"
									data-border="bos:solid;bow:2px,2px,2px,2px;bor:5px,5px,5px,5px;"
									data-frame_0="y:bottom;o:1;" data-frame_0_mask="u:t;"
									data-frame_1="e:power4.inOut;st:650;sp:2000;sR:650;" data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6350;"
									data-frame_999_mask="u:t;"
									data-frame_hover="c:#fff;bgc:rgba(255,255,255,0);boc:#fff;bor:5px,5px,5px,5px;bos:solid;bow:2px,2px,2px,2px;sp:200ms;e:power1.inOut;bri:120%;"
									style="z-index:8;background-color:#ffffff;font-family:'Poppins';display:inline-block;">See
									Available Offers
								</a><!--

										--><rs-layer id="slider-6-slide-24-layer-13" class="rs-noevents" data-type="text"
									data-bsh="c:rgba(0,0,0,0.5);v:5px,4px,3px,1px;b:20px,16px,12px,7px;"
									data-rsp_ch="on" data-text="w:normal;s:20,16,13,13;l:30,24,20,18;fw:600;a:center;"
									data-dim="w:30px,24px,20px,18px;" data-disp="inline-block"
									data-margin="t:-15,-12,-10,-9;l:-15,-12,-10,-9;"
									data-border="bor:30px,30px,30px,30px;"
									data-frame_0="y:50px,41px,31px,19px;sX:0;sY:0;"
									data-frame_1="e:back.out;st:2150;sp:500;sR:2150;"
									data-frame_999="sX:0.5;sY:0.5;o:0;st:w;sR:6350;"
									data-loop_999="sX:1.2;sY:1.2;sp:500;st:2600;e:sine.inOut;yys:t;yyf:t;"
									style="z-index:9;background-color:#ff0000;font-family:'Poppins';display:inline-block;">9
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--
							--></rs-zone><!--

							--><rs-layer id="slider-6-slide-24-layer-3" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="yo:-1px,0,0,0;" data-text="w:normal;s:100,82,62,38;l:100,82,62,38;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:16;font-family:'Playfair Display';text-transform:uppercase;font-style:italic;">a
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-24-layer-4" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="xo:100px,82px,62px,38px;"
						data-text="w:normal;s:100,82,62,38;l:100,82,62,38;fw:200;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:15;font-family:'Poppins';text-transform:uppercase;">B
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-24-layer-7" data-type="shape" data-rsp_ch="on"
						data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:50%;h:100%;" data-basealign="slide"
						data-frame_999="o:0;e:power4.inOut;st:w;sp:1000;sR:8700;"
						style="z-index:14;background:linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 100%);">
					</rs-layer><!--
--> </rs-slide>
				<rs-slide style="position: absolute;" data-key="rs-25" data-title="Slide"
					data-thumb="{{asset('front/assets/freestocks-_3Q3tsJ01nc-unsplash-50x100.jpg')}}" data-anim="d:35;ms:2000;f:edges;"
					data-in="o:0;x:cyc(100%|-100%);m:true;row:8;" data-out="o:0;e:power3.in;"
					data-d3="f:cube;z:450;t:20;su:true;sc:#9e9e9e;">
					<img src="{{asset('front/assets/freestocks-_3Q3tsJ01nc-unsplash.jpg')}}" alt="" title="freestocks-_3Q3tsJ01nc-unsplash"
						width="1920" height="1280" class="rev-slidebg tp-rs-img" data-parallax="8"
						data-panzoom="d:10000;ss:100%;se:120%;" data-no-retina>
					<!--						--><rs-zone id="rrzm_25" class="rev_row_zone_middle" style="z-index: 18;"><!--

								--><rs-row id="slider-6-slide-25-layer-1" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="r:80,50,50,20;l:80,50,50,20;" data-frame_0="o:1;"
							data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:1;"><!--
									--><rs-column id="slider-6-slide-25-layer-2" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:100%;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:2;width:100%;"><!--
										--><rs-layer id="slider-6-slide-25-layer-0" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:120,99,75,46;l:110,90,68,41;fw:500;"
									data-padding="r:20,17,13,8;b:10,8,6,4;l:20,17,13,8;" data-frame_0="o:1;"
									data-frame_0_words="d:5;y:122%;sX:1.3;sY:1.3;o:1;rZ:15deg;"
									data-frame_0_mask="u:t;y:0%;" data-frame_1="e:power4.inOut;sp:1500;"
									data-frame_1_words="e:power4.inOut;d:10;" data-frame_1_mask="u:t;"
									data-frame_999="o:1;e:power4.inOut;st:w;sp:500;sR:6750;"
									data-frame_999_words="d:5;y:-130%;sX:1.3;sY:1.3;o:1;rZ:-15deg;"
									data-frame_999_mask="u:t;" style="z-index:3;font-family:'Poppins';"><span
										style="font-weight:200;">Rent Stunning</span><br />Clothing<br /><span
										style="font-family: Playfair Display;font-weight:400;font-style: italic;">&
										Accesories</span>
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--

								--><rs-row id="slider-6-slide-25-layer-9" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="t:100,100,50,30;r:100,50,50,25;l:100,50,50,25;"
							data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:4;"><!--
									--><rs-column id="slider-6-slide-25-layer-10" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:66.67%;" data-margin="r:50,50,0,0;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:5;width:100%;"><!--
										--><rs-layer id="slider-6-slide-25-layer-5" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:30,24,18,18;l:40,33,25,25;fw:200;" data-dim="w:100%;"
									data-disp="inline-block" data-margin="b:0,0,50,30;" data-frame_0="y:bottom;o:1;"
									data-frame_0_mask="u:t;" data-frame_1="e:power4.inOut;st:500;sp:2000;sR:500;"
									data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6500;"
									data-frame_999_mask="u:t;"
									style="z-index:6;font-family:'Poppins';display:inline-block;">For the best
									affordable rentals and leisure experience, signup on 232rentals.com
								</rs-layer><!--
									--></rs-column><!--

									--><rs-column id="slider-6-slide-25-layer-12" data-type="column" data-xy="xo:50px;yo:330px;" data-rsp_bd="off"
								data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;"
								style="z-index:7;width:100%;"><!--
										--><a id="slider-6-slide-25-layer-6" class="rs-layer rev-btn" href="{{route('shop.index')}}"
									target="_self" data-type="button" data-color="#000000" data-rsp_ch="on"
									data-text="w:normal;s:20,16,15,13;l:76,62,46,36;fw:600;"
									data-dim="minh:0px,none,none,none;" data-disp="inline-block"
									data-padding="r:50,41,31,19;l:50,41,31,19;"
									data-border="bos:solid;bow:2px,2px,2px,2px;bor:5px,5px,5px,5px;"
									data-frame_0="y:bottom;o:1;" data-frame_0_mask="u:t;"
									data-frame_1="e:power4.inOut;st:650;sp:2000;sR:650;" data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6350;"
									data-frame_999_mask="u:t;"
									data-frame_hover="c:#fff;bgc:rgba(255,255,255,0);boc:#fff;bor:5px,5px,5px,5px;bos:solid;bow:2px,2px,2px,2px;sp:200ms;e:power1.inOut;bri:120%;"
									style="z-index:8;background-color:#ffffff;font-family:'Poppins';display:inline-block;">See
									Available Offers
								</a><!--

										--><rs-layer id="slider-6-slide-25-layer-13" class="rs-noevents" data-type="text"
									data-bsh="c:rgba(0,0,0,0.5);v:5px,4px,3px,1px;b:20px,16px,12px,7px;"
									data-rsp_ch="on" data-text="w:normal;s:20,16,13,13;l:30,24,20,18;fw:600;a:center;"
									data-dim="w:30px,24px,20px,18px;" data-disp="inline-block"
									data-margin="t:-15,-12,-10,-9;l:-15,-12,-10,-9;"
									data-border="bor:30px,30px,30px,30px;"
									data-frame_0="y:50px,41px,31px,19px;sX:0;sY:0;"
									data-frame_1="e:back.out;st:2150;sp:500;sR:2150;"
									data-frame_999="sX:0.5;sY:0.5;o:0;st:w;sR:6350;"
									data-loop_999="sX:1.2;sY:1.2;sp:500;st:2600;e:sine.inOut;yys:t;yyf:t;"
									style="z-index:9;background-color:#ff0000;font-family:'Poppins';display:inline-block;">2
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--
							--></rs-zone><!--

							--><rs-layer id="slider-6-slide-25-layer-3" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="yo:-1px,0,0,0;" data-text="w:normal;s:100,82,62,38;l:100,82,62,38;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:16;font-family:'Playfair Display';text-transform:uppercase;font-style:italic;">a
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-25-layer-4" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="xo:100px,82px,62px,38px;"
						data-text="w:normal;s:100,82,62,38;l:100,82,62,38;fw:200;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:15;font-family:'Poppins';text-transform:uppercase;">B
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-25-layer-7" data-type="shape" data-rsp_ch="on"
						data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:50%;h:100%;" data-basealign="slide"
						data-frame_999="o:0;e:power4.inOut;st:w;sp:1000;sR:8700;"
						style="z-index:14;background:linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 100%);">
					</rs-layer><!--
--> </rs-slide>
				<rs-slide style="position: absolute;" data-key="rs-28" data-title="Slide"
					data-thumb="{{asset('front/assets/patrick-dozkVhDyvhQ-unsplash-50x100.jpg')}}" data-anim="d:35;ms:2000;f:edges;"
					data-in="o:0;x:cyc(100%|-100%);m:true;row:8;" data-out="o:0;e:power3.in;"
					data-d3="f:cube;z:450;t:20;su:true;sc:#9e9e9e;">
					<img src="{{asset('front/assets/patrick-dozkVhDyvhQ-unsplash.jpg')}}" alt="" title="patrick-dozkVhDyvhQ-unsplash"
						width="1920" height="1280" class="rev-slidebg tp-rs-img" data-parallax="8"
						data-panzoom="d:10000;ss:100%;se:120%;" data-no-retina>
					<!--						--><rs-zone id="rrzm_28" class="rev_row_zone_middle" style="z-index: 18;"><!--

								--><rs-row id="slider-6-slide-28-layer-1" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="r:80,50,50,20;l:80,50,50,20;" data-frame_0="o:1;"
							data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:1;"><!--
									--><rs-column id="slider-6-slide-28-layer-2" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:100%;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1250;sR:8700;sA:9000;" style="z-index:2;width:100%;"><!--
										--><rs-layer id="slider-6-slide-28-layer-0" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:120,99,75,46;l:110,90,68,41;fw:500;"
									data-padding="r:20,17,13,8;b:10,8,6,4;l:20,17,13,8;" data-frame_0="o:1;"
									data-frame_0_words="d:5;y:122%;sX:1.3;sY:1.3;o:1;rZ:15deg;"
									data-frame_0_mask="u:t;y:0%;" data-frame_1="e:power4.inOut;sp:1500;"
									data-frame_1_words="e:power4.inOut;d:10;" data-frame_1_mask="u:t;"
									data-frame_999="o:1;e:power4.inOut;st:w;sp:500;sR:6750;"
									data-frame_999_words="d:5;y:-130%;sX:1.3;sY:1.3;o:1;rZ:-15deg;"
									data-frame_999_mask="u:t;" style="z-index:3;font-family:'Poppins';"><span
										style="font-weight:200;">Rent Affordable</span><br />Equipment<br /><span
										style="font-family: Playfair Display;font-weight:400;font-style: italic;">&
										Accesories</span>
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--

								--><rs-row id="slider-6-slide-28-layer-9" data-type="row" data-xy="xo:50px;yo:50px;" data-basealign="slide"
							data-rsp_bd="off" data-margin="t:100,100,50,30;r:100,50,50,25;l:100,50,50,25;"
							data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:4;"><!--
									--><rs-column id="slider-6-slide-28-layer-10" data-type="column" data-xy="xo:50px;yo:50px;" data-rsp_bd="off"
								data-column="w:66.67%;" data-margin="r:50,50,0,0;" data-frame_0="o:1;"
								data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;" style="z-index:5;width:100%;"><!--
										--><rs-layer id="slider-6-slide-28-layer-5" data-type="text" data-rsp_ch="on"
									data-text="w:normal;s:30,24,18,18;l:40,33,25,25;fw:200;" data-dim="w:100%;"
									data-disp="inline-block" data-margin="b:0,0,50,30;" data-frame_0="y:bottom;o:1;"
									data-frame_0_mask="u:t;" data-frame_1="e:power4.inOut;st:500;sp:2000;sR:500;"
									data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6500;"
									data-frame_999_mask="u:t;"
									style="z-index:6;font-family:'Poppins';display:inline-block;">For the best
									affordable rentals and leisure experience, signup on 232rentals.com
								</rs-layer><!--
									--></rs-column><!--

									--><rs-column id="slider-6-slide-28-layer-12" data-type="column" data-xy="xo:50px;yo:330px;" data-rsp_bd="off"
								data-frame_0="o:1;" data-frame_999="o:1;st:w;sp:1000;sR:8700;sA:9000;"
								style="z-index:7;width:100%;"><!--
										--><a id="slider-6-slide-28-layer-6" class="rs-layer rev-btn" href="{{route('shop.index')}}"
									target="_self" data-type="button" data-color="#000000" data-rsp_ch="on"
									data-text="w:normal;s:20,16,15,13;l:76,62,46,36;fw:600;"
									data-dim="minh:0px,none,none,none;" data-disp="inline-block"
									data-padding="r:50,41,31,19;l:50,41,31,19;"
									data-border="bos:solid;bow:2px,2px,2px,2px;bor:5px,5px,5px,5px;"
									data-frame_0="y:bottom;o:1;" data-frame_0_mask="u:t;"
									data-frame_1="e:power4.inOut;st:650;sp:2000;sR:650;" data-frame_1_mask="u:t;"
									data-frame_999="y:-100%;o:1;e:power4.inOut;st:w;sp:500;sR:6350;"
									data-frame_999_mask="u:t;"
									data-frame_hover="c:#fff;bgc:rgba(255,255,255,0);boc:#fff;bor:5px,5px,5px,5px;bos:solid;bow:2px,2px,2px,2px;sp:200ms;e:power1.inOut;bri:120%;"
									style="z-index:8;background-color:#ffffff;font-family:'Poppins';display:inline-block;">See
									Available Offers
								</a><!--

										--><rs-layer id="slider-6-slide-28-layer-13" class="rs-noevents" data-type="text"
									data-bsh="c:rgba(0,0,0,0.5);v:5px,4px,3px,1px;b:20px,16px,12px,7px;"
									data-rsp_ch="on" data-text="w:normal;s:20,16,13,13;l:30,24,20,18;fw:600;a:center;"
									data-dim="w:30px,24px,20px,18px;" data-disp="inline-block"
									data-margin="t:-15,-12,-10,-9;l:-15,-12,-10,-9;"
									data-border="bor:30px,30px,30px,30px;"
									data-frame_0="y:50px,41px,31px,19px;sX:0;sY:0;"
									data-frame_1="e:back.out;st:2150;sp:500;sR:2150;"
									data-frame_999="sX:0.5;sY:0.5;o:0;st:w;sR:6350;"
									data-loop_999="sX:1.2;sY:1.2;sp:500;st:2600;e:sine.inOut;yys:t;yyf:t;"
									style="z-index:9;background-color:#ff0000;font-family:'Poppins';display:inline-block;">2
								</rs-layer><!--
									--></rs-column><!--
								--></rs-row><!--
							--></rs-zone><!--

							--><rs-layer id="slider-6-slide-28-layer-3" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="yo:-1px,0,0,0;" data-text="w:normal;s:100,82,62,38;l:100,82,62,38;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:16;font-family:'Playfair Display';text-transform:uppercase;font-style:italic;">a
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-28-layer-4" data-type="text" data-color="rgba(255, 255, 255, 0)"
						data-rsp_ch="on" data-xy="xo:100px,82px,62px,38px;"
						data-text="w:normal;s:100,82,62,38;l:100,82,62,38;fw:200;"
						data-dim="w:100px,auto,auto,auto;h:100px,82px,62px,38px;" data-padding="b:10,8,6,4;"
						data-frame_0="o:1;" data-frame_0_words="d:5;y:112%;o:1;rZ:15deg;" data-frame_0_mask="u:t;y:0%;"
						data-frame_1="e:power4.out;" data-frame_1_words="e:power4.out;d:15;" data-frame_1_mask="u:t;"
						data-frame_999="o:0;st:w;sR:8700;"
						style="z-index:15;font-family:'Poppins';text-transform:uppercase;">B
					</rs-layer><!--

							--><rs-layer id="slider-6-slide-28-layer-7" data-type="shape" data-rsp_ch="on"
						data-text="w:normal;s:20,16,12,7;l:0,20,15,9;" data-dim="w:50%;h:100%;" data-basealign="slide"
						data-frame_999="o:0;e:power4.inOut;st:w;sp:1000;sR:8700;"
						style="z-index:14;background:linear-gradient(90deg, rgba(0,0,0,0.5) 0%, rgba(0,0,0,0) 100%);">
					</rs-layer><!--
--> </rs-slide>
			</rs-slides>
		</rs-module>
		<script>

		</script>
		<script>
			if (typeof revslider_showDoubleJqueryError === "undefined") { function revslider_showDoubleJqueryError(sliderID) { console.log("You have some jquery.js library include that comes after the Slider Revolution files js inclusion."); console.log("To fix this, you can:"); console.log("1. Set 'Module General Options' -> 'Advanced' -> 'jQuery & OutPut Filters' -> 'Put JS to Body' to on"); console.log("2. Find the double jQuery.js inclusion and remove it"); return "Double Included jQuery Library"; } }
		</script>
	</rs-module-wrap>
	<!-- END REVOLUTION SLIDER -->

	<script>
		var tpj = jQuery;
		if (window.RS_MODULES === undefined) window.RS_MODULES = {};
		if (RS_MODULES.modules === undefined) RS_MODULES.modules = {};
		RS_MODULES.modules["revslider61"] = {
			once: RS_MODULES.modules["revslider61"] !== undefined ? RS_MODULES.modules["revslider61"].once : undefined, init: function () {
				window.revapi6 = window.revapi6 === undefined || window.revapi6 === null || window.revapi6.length === 0 ? document.getElementById("rev_slider_6_1") : window.revapi6;
				if (window.revapi6 === null || window.revapi6 === undefined || window.revapi6.length == 0) { window.revapi6initTry = window.revapi6initTry === undefined ? 0 : window.revapi6initTry + 1; if (window.revapi6initTry < 20) requestAnimationFrame(function () { RS_MODULES.modules["revslider61"].init() }); return; }
				window.revapi6 = jQuery(window.revapi6);
				if (window.revapi6.revolution == undefined) { revslider_showDoubleJqueryError("rev_slider_6_1"); return; }
				revapi6.revolutionInit({
					revapi: "revapi6",
					DPR: "dpr",
					sliderLayout: "fullscreen",
					visibilityLevels: "1240,1024,778,480",
					gridwidth: "1240,1024,778,480",
					gridheight: "900,768,960,720",
					spinner: "spinner7",
					perspective: 600,
					perspectiveType: "global",
					editorheight: "900,768,960,720",
					responsiveLevels: "1240,1024,778,480",
					fullScreenOffsetContainer: "#masthead",
					progressBar: {
						color: "#ffffff",
						style: "vertical",
						size: "3px",
						x: "5px",
						reset: "animate"
					},
					navigation: {
						wheelCallDelay: 1000,
						onHoverStop: false,
						bullets: {
							enable: true,
							tmp: "",
							style: "light-bars",
							v_offset: 35
						}
					},
					parallax: {
						levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 30],
						type: "scroll",
						origo: "slidercenter",
						speed: 0
					},
					viewPort: {
						global: false,
						globalDist: "-200px",
						enable: false
					},
					fallbacks: {
						allowHTML5AutoPlayOnAndroid: true
					},
				});

			}
		} // End of RevInitScript
		if (window.RS_MODULES.checkMinimal !== undefined) { window.RS_MODULES.checkMinimal(); };
	</script>



	<style>
		.light-bars .tp-bullet {}

		.light-bars .tp-bullet:before {
			content: " ";
			position: absolute;
			width: 100%;
			height: 100%;
			background: transparent;
			padding: 10px;
			margin-left: -10px;
			margin-top: -10px;
			box-sizing: content-box
		}

		.light-bars .tp-bullet {
			width: 60px;
			height: 3px;
			position: absolute;
			background: #aaa;
			background: rgba(255, 255, 255, 0.5);
			cursor: pointer;
			box-sizing: content-box
		}

		.light-bars .tp-bullet.rs-touchhover,
		.light-bars .tp-bullet.selected {
			background: rgba(255, 255, 255, 1)
		}

		.light-bars .tp-bullet-image {}

		.light-bars .tp-bullet-title {}
	</style>
        {{-- REVOLUTION SLDER MAIN CODE ENDS HERE --}}

        @yield('content')


        <!-- Start Footer Area -->
{{-- @include('front.template.scripts') --}}
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <div class="logo">
                        <a href="{{ url('/') }}" class="black-logo"><img src="{{ asset('front/img/black-logo.png') }}"
                                alt="logo"></a>
                        <a href="{{ url('/') }}" class="white-logo"><img src="{{ asset('front/img/logo.png') }}"
                                alt="logo"></a>
                        <p>Quis ipsum suspendisse ultrices gravida commodo. Risus commodo veliliee vel viverra maecenas
                            accumsan lacus vel facilisis.</p>
                    </div>

                    <ul class="social-links">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Company</h3>

                    <ul class="list">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="features-2.html">Services</a></li>
                        <li><a href="features-1.html">Features</a></li>
                        <li><a href="pricing.html">Our Pricing</a></li>
                        <li><a href="blog-1.html">Latest News</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Support</h3>

                    <ul class="list">
                        <li><a href="faq.html">FAQ's</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Community</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-md-6">
                <div class="single-footer-widget">
                    <h3>Address</h3>

                    <ul class="footer-contact-info">
                        <li><span>Location:</span> 27 Division St, New York, NY 10002, USA</li>
                        <li><span>Email:</span> <a
                                href="https://templates.envytheme.com/cdn-cgi/l/email-protection#9bf3fef7f7f4dbf7eeedf2f4f5b5f8f4f6"><span
                                    class="__cf_email__"
                                    data-cfemail="422a272e2e2d022e37342b2d2c6c212d2f">[email&#160;protected]</span></a>
                        </li>
                        <li><span>Phone:</span> <a href="tel:+321984754">+ (321) 984 754</a></li>
                        <li><span>Fax:</span> <a href="tel:+12129876543">+1-212-9876543</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright-area">
            <p>Copyright
                <script>
                    document.write(new Date().getFullYear())
                </script> 232Rentals is proudly created by <a href="https://digitalcraft360.com/"
                    target="_blank"> Craft360 Digital Services</a>
            </p>
        </div>
    </div>

    <div class="map-image"><img src="assets/img/map.png" alt="map"></div>
</footer>
<!-- End Footer Area -->

<div class="go-top"><i class="fas fa-arrow-up"></i></div>

<!-- Dark/Light Toggle -->
<div class="dark-version">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>

</div>
<script>
  window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
  });
}, 2000);
</script>

<!-- Links of JS files -->
{{-- <script src="{{ asset('front/js/jquery.min.js') }}"></script> --}}
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



</html>
