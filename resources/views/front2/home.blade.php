{{-- @include("header") --}}
@include('front2.template.header')


            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <div class="uk-card uk-card-secondary uk-card-small uk-card-body uk-border-rounded">
                            <div class="uk-grid uk-text-small" data-uk-grid>
                                <div class="uk-width-3-4@m uk-visible@m">
                                    <p>Our journey begins and ends with Artificial Intelligence – a concept that’s evolving at an exponential rate..</p>
                                </div>
                                <div class="uk-width-expand@m uk-text-center uk-text-right@m">
                                    {{-- <a class="uk-margin-right" href="#"><i class="fas fa-comment-alt uk-margin-small-right"></i>Live Chat</a> --}}
                                    <a href="#"><i class="fas fa-phone-alt uk-margin-small-right uk-margin-small-left"></i>{{$setting?->phone}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header content end -->
    </header>
    <main>
        <div class="uk-section uk-padding-remove-vertical">
            <div class="in-slideshow" data-uk-slideshow>
                <ul class="uk-slideshow-items uk-light">
                    <li>
                        <div class="uk-position-cover">
                            <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-slideshow-image-1.jpg')}}" alt="slideshow-image" data-uk-cover width="1920" height="700" data-uk-img>
                        </div>
                        <span></span>
                        <div class="uk-container">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-3-5@m">
                                    <div class="uk-overlay">
                                        <h1>Trade Shares and Forex with Financial Thinking</h1>
                                        <p class="uk-text-lead uk-visible@m">Access 40,000+ instruments – across asset classes – to trade, hedge and invest from a single account.</p>
                                        <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-visible@m"><i class="fas fa-scroll uk-margin-small-right"></i>Discover it now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-position-cover">
                            <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-slideshow-image-2.jpg')}}" alt="slideshow-image" data-uk-cover width="1920" height="700" data-uk-img>
                        </div>
                        <span></span>
                        <div class="uk-container">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-3-5@m">
                                    <div class="uk-overlay">
                                        <h1>Multi-regulated Global Forex and Shares Broker</h1>
                                        <p class="uk-text-lead uk-visible@m">A trusted destination for traders worldwide, Authorised by FCA, ASIC &amp; FSCA with multi-lingual support 24/5.</p>
                                        <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-visible@m"><i class="fas fa-scroll uk-margin-small-right"></i>Discover it now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-position-cover">
                            <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-slideshow-image-3.jpg')}}" alt="slideshow-image" data-uk-cover width="1920" height="700" data-uk-img>
                        </div>
                        <span></span>
                        <div class="uk-container">
                            <div class="uk-grid" data-uk-grid>
                                <div class="uk-width-3-5@m">
                                    <div class="uk-overlay">
                                        <h1>Award-winning Products and Trading platforms</h1>
                                        <p class="uk-text-lead uk-visible@m">Tap into the world's markets and explore endless trading opportunities with tight spreads and no commission.</p>
                                        <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-visible@m"><i class="fas fa-scroll uk-margin-small-right"></i>Discover it now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="uk-container uk-light">
                    <ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-center"></ul>
                </div>
            </div>
        </div> <!-- section content begin -->
        <div class="uk-section uk-section-primary uk-section-xsmall">
            <div class="uk-container in-wave-1">
                <div class="uk-grid uk-grid-divider uk-child-width-1-2@s uk-child-width-1-4@m in-margin-top@s in-margin-bottom@s" data-uk-grid>
                    <div>
                        <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                            <div class="uk-width-auto">
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-1.svg')}}" alt="wave-icon" width="48" height="48" data-uk-img>
                            </div>
                            <div class="uk-width-expand">
                                <p>Free<br>analysis tools</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                            <div class="uk-width-auto">
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-2.svg')}}" alt="wave-icon" width="48" height="48" data-uk-img>
                            </div>
                            <div class="uk-width-expand">
                                <p>Fast execution<br>0 commision</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                            <div class="uk-width-auto">
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-3.svg')}}" alt="wave-icon" width="48" height="48" data-uk-img>
                            </div>
                            <div class="uk-width-expand">
                                <p>Low minimum<br>deposit.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-grid uk-grid-small uk-flex uk-flex-middle">
                            <div class="uk-width-auto">
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-4.svg')}}" alt="wave-icon" width="48" height="48" data-uk-img>
                            </div>
                            <div class="uk-width-expand">
                                <p>Over 2,100<br>assets to trade</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-padding-large">
            <div class="uk-container in-wave-2">
                <div class="uk-grid">
                    <div class="uk-width-3-4@m">
                        <h1 class="uk-margin-remove-bottom">Industry-<span class="in-highlight">leading</span> Artificial Trading</h1>
                        <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom">Our journey begins and ends with Artificial Intelligence – a concept that’s evolving at an exponential rate.</p>
                    </div>
                </div>
                <div class="uk-grid-medium uk-grid-match" data-uk-grid>
                    <div class="uk-width-1-2@s uk-width-1-4@m">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-background-contain uk-background-bottom-center" style="background-image: url(img/in-wave-card-bg-1.png);">
                            <h5 class="uk-margin-remove">
                                <a href="#">FX <i class="fas fa-chevron-right fa-xs"></i></a>
                            </h5>
                            <p class="uk-margin-remove">Spread as low as</p>
                            <h1 class="uk-margin-top">0.2</h1>
                            <p class="uk-margin-remove-top uk-margin-bottom">pip</p>
                            <p>Trade 182 FX spot pairs and 140 forwards across majors, minors, exotics and metals.</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2@s uk-width-1-4@m">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-background-contain uk-background-bottom-center" style="background-image: url(img/in-wave-card-bg-2.png);">
                            <h5 class="uk-margin-remove">
                                <a href="#">CFDs <i class="fas fa-chevron-right fa-xs"></i></a>
                            </h5>
                            <p class="uk-margin-remove">Spread from</p>
                            <h1 class="uk-margin-top">0.4</h1>
                            <p class="uk-margin-remove-top uk-margin-bottom">on US500</p>
                            <p>Go long or short on 9,000+ instruments with tight spreads & low commissions.</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2@s uk-width-1-4@m">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-background-contain uk-background-bottom-center" style="background-image: url(img/in-wave-card-bg-3.png);">
                            <h5 class="uk-margin-remove">
                                <a href="#">Stocks <i class="fas fa-chevron-right fa-xs"></i></a>
                            </h5>
                            <p class="uk-margin-remove">Commissions from</p>
                            <h1 class="uk-margin-top">$3</h1>
                            <p class="uk-margin-remove-top uk-margin-bottom">on US stocks</p>
                            <p>Access 19,000+ stocks across core and emerging markets on 36 exchanges worldwide.</p>
                        </div>
                    </div>
                    <div class="uk-width-1-2@s uk-width-1-4@m">
                        <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-background-contain uk-background-bottom-center" style="background-image: url(img/in-wave-card-bg-4.png);">
                            <h5 class="uk-margin-remove">
                                <a href="#">Commodities <i class="fas fa-chevron-right fa-xs"></i></a>
                            </h5>
                            <p class="uk-margin-remove">Commission as low as</p>
                            <h1 class="uk-margin-top">$1.25</h1>
                            <p class="uk-margin-remove-top uk-margin-bottom">per lot</p>
                            <p>Trade a wide range of commodities as CFDs, futures, options, spot pairs, & more.</p>
                        </div>
                    </div>
                </div>
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-3-5@m">
                        <div class="uk-card uk-card-default uk-card-body uk-text-center uk-border-rounded uk-box-shadow-small in-wave-2-card">
                            <span class="uk-label uk-text-small uk-text-uppercase uk-border-pill uk-margin-small-right">Start trade</span>
                            Invest with Binotomo Today <a href="#">Join now!</a>
                        </div>
                        <div class="uk-grid-collapse uk-grid-divider uk-child-width-1-3@s uk-child-width-1-3@m uk-text-center uk-margin-top uk-margin-small-bottom" data-uk-grid>
                            <div>
                                <i class="fas fa-headset fa-lg uk-margin-small-right uk-text-primary"></i>
                                <p class="uk-margin-remove uk-text-small uk-text-uppercase">Award-winning support</p>
                            </div>
                            <div>
                                <i class="fas fa-university fa-lg uk-margin-small-right uk-text-primary"></i>
                                <p class="uk-margin-remove uk-text-small uk-text-uppercase">Regulated by the FCA,UK</p>
                            </div>
                            <div>
                                <i class="fas fa-history fa-lg uk-margin-small-right uk-text-primary"></i>
                                <p class="uk-margin-remove uk-text-small uk-text-uppercase">30 years experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-section-muted uk-padding-large in-wave-3 uk-background-contain uk-background-center" style="background-image: url(img/in-wave-background-1.png);" data-uk-parallax="bgy: -200">
            <div class="uk-container">
                <div class="uk-grid-large uk-flex uk-flex-middle" data-uk-grid>
                    <div class="uk-width-1-2@m">
                        <img class="uk-margin-bottom" src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-5.svg')}}" alt="wave-icon" width="64" height="64" data-uk-img>
                        <h1 class="uk-margin-remove">Market <span class="in-highlight">analysis</span> and<br>trade inspiration</h1>
                        <p> With our support, you’ll be better positioned to generate huge profits based on our tremendous trading experience in Forex and Crypto Trading. </p>
                        <div class="uk-grid-medium uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center uk-margin-medium-top" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                    <img class="uk-margin-remove-bottom" src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-6.svg')}}" alt="wave-icon" width="52" height="52" data-uk-img>
                                    <h5 class="uk-margin-small-top">Strategies &amp; Discussions</h5>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-border-rounded">
                                    <img class="uk-margin-remove-bottom" src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-icon-7.svg')}}" alt="wave-icon" width="52" height="52" data-uk-img>
                                    <h5 class="uk-margin-small-top">Forecasts &amp; Educations</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-2@m">
                        <div class="uk-inline uk-dark in-wave-video uk-margin-small-bottom">
                            <img class="uk-border-rounded uk-width-1-1" src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-image-1.jpg')}}" alt="wave-video" width="533" height="355" data-uk-img>
                            <div class="uk-position-center">
                                <a href="#modal-media-youtube" data-uk-toggle>
                                    <div class="in-play-button"></div>
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                            <div id="modal-media-youtube" class="uk-flex-top" data-uk-modal>
                                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical in-iframe">
                                    <button class="uk-modal-close-outside" type="button" data-uk-close></button>
                                </div>
                            </div>
                        </div>
                        <p class="uk-text-small uk-text-muted">Explore the markets at your own pace with short online courses. <span class="uk-label uk-text-small uk-border-pill">Sign up</span></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
        <!-- section content begin -->
        {{-- <div class="uk-section uk-padding-large">
            <div class="uk-container in-wave-4">
                <div class="uk-grid uk-flex uk-flex-center">
                    <div class="uk-width-1-1 uk-text-center">
                        <h1 class="uk-margin-medium-bottom"><span class="in-highlight">Complete</span> package for every traders</h1>
                    </div>
                    <div class="uk-width-3-4@m">
                        <div class="uk-grid-collapse  uk-child-width-1-2@m in-wave-pricing" data-uk-grid>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-medium">
                                    <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 200</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Classic account</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Benefit from industry-leading entry prices</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet">
                                        <li>One of the established industry leaders</li>
                                        <li>Three decades of trading know-how</li>
                                        <li>Award-winning customer service*</li>
                                        <li>Highly-regarded trader education*</li>
                                        <li>Advanced risk management</li>
                                        <li>Tax-free spread betting profits</li>
                                        <li>Low minimum deposit</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-default uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                                </div>
                            </div>
                            <div>
                                <div class="uk-card uk-card-default uk-card-body uk-box-shadow-large">
                                    <p class="uk-text-small uk-text-uppercase">Minimum funding<span class="uk-label uk-border-pill uk-text-small uk-margin-small-left">USD 500</span></p>
                                    <h2 class="uk-margin-top uk-margin-remove-bottom">Platinum account</h2>
                                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">Receive even tighter spreads and commissions</p>
                                    <hr>
                                    <ul class="uk-list uk-list-bullet">
                                        <li>Award-winning trading platform*</li>
                                        <li>Wide range of charting tools</li>
                                        <li>Fast, automated excecution</li>
                                        <li>Expert news & analysis</li>
                                        <li>Competitive spreads</li>
                                        <li>Advanced trading tools</li>
                                        <li>Tax-free spread betting profits</li>
                                    </ul>
                                    <a href="#" class="uk-button uk-button-primary uk-border-rounded uk-align-center">Open an account<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1">
                        <div class="uk-grid-medium uk-child-width-1-2@s uk-child-width-1-5@m uk-text-center uk-margin-large-top" data-uk-grid>
                            <div>
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-award.svg')}}" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best CFD Broker</h6>
                                <p class="uk-text-small uk-margin-remove-top">TradeON Summit 2020</p>
                            </div>
                            <div>
                                <img src="{{asset('front2img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-award.svg')}}" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Trading Experience</h6>
                                <p class="uk-text-small uk-margin-remove-top">Jordan Forex EXPO 2020</p>
                            </div>
                            <div>
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-award.svg')}}" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Execution Broker</h6>
                                <p class="uk-text-small uk-margin-remove-top">Forex EXPO Dubai 2020</p>
                            </div>
                            <div>
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-award.svg')}}" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Trading Platform</h6>
                                <p class="uk-text-small uk-margin-remove-top">London Summit 2020</p>
                            </div>
                            <div class="uk-visible@m">
                                <img src="{{asset('front2/img/in-lazy.gif')}}" data-src="{{asset('front2/img/in-wave-award.svg')}}" alt="wave-award" width="71" height="58" data-uk-img>
                                <h6 class="uk-margin-small-top uk-margin-remove-bottom">Best Broker Asia</h6>
                                <p class="uk-text-small uk-margin-remove-top">iFX EXPO 2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- section content end -->
        <!-- section content begin -->
        <div class="uk-section uk-section-default uk-padding-remove-vertical in-wave-5 in-offset-bottom-40">
            <div class="uk-container">
                <div class="uk-grid">
                    <div class="uk-width-1-1 uk-background-contain uk-background-center-right uk-background-image@m" style="background-image: url({{asset('front2/img/in-wave-mockup-1.png')}});">
                        <h1 class="uk-margin-remove-bottom">Start <span class="uk-text-primary">trading</span></h1>
                        <p class="uk-text-lead">on <span class="uk-text-primary">wave</span> mobile app.</p>
                        <p class="uk-margin-small-bottom">Available on multiple platform</p>
                        <a href="#" class="uk-button uk-button-secondary uk-border-rounded in-button-app">
                            <i class="fab fa-google-play fa-2x"></i>
                            <span class="wrapper">Download from<span>Play Store</span></span>
                        </a>
                        <a href="#" class="uk-button uk-button-secondary uk-border-rounded in-button-app uk-margin-small-left in-margin-remove-left@s">
                            <i class="fab fa-apple fa-2x"></i>
                            <span class="wrapper">Download from<span>App Store</span></span>
                        </a>
                        <a href="#" class="uk-button uk-button-secondary uk-border-rounded uk-visible@m in-button-app uk-margin-small-left">
                            <i class="fab fa-windows fa-2x"></i>
                            <span class="wrapper">Download from<span>Microsoft Store</span></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="in-price-list">
                <div class="uk-container">
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <div data-uk-slider="autoplay: true; autoplay-interval: 5000">
                                <ul class="uk-slider-items uk-child-width-1-3@s uk-child-width-1-5@m uk-text-small uk-text-center" data-uk-grid>
                                    <li>
                                        XAUUSD <span class="uk-label uk-label-success uk-border-pill uk-margin-small-left"><i class="fas fa-caret-up"></i> 1478.81 &nbsp;(+0.28%)</span>
                                    </li>
                                    <li>
                                        GBPUSD <span class="uk-label uk-label-danger uk-border-pill uk-margin-small-left"><i class="fas fa-caret-down"></i> 1.3191 &nbsp;(-1.07%)</span>
                                    </li>
                                    <li>
                                        EURUSD <span class="uk-label uk-label-danger uk-border-pill uk-margin-small-left"><i class="fas fa-caret-down"></i> 1.1159 &nbsp;(-0.11%)</span>
                                    </li>
                                    <li>
                                        USDJPY <span class="uk-label uk-label-success uk-border-pill uk-margin-small-left"><i class="fas fa-caret-up"></i> 109.59 &nbsp;(+0.05%)</span>
                                    </li>
                                    <li>
                                        USDCAD <span class="uk-label uk-label-success uk-border-pill uk-margin-small-left"><i class="fas fa-caret-up"></i> 1.3172 &nbsp;(+0.18%)</span>
                                    </li>
                                    <li>
                                        USDCHF <span class="uk-label uk-label-success uk-border-pill uk-margin-small-left"><i class="fas fa-caret-up"></i> 0.9776 &nbsp;(+0.06%)</span>
                                    </li>
                                    <li>
                                        AUDUSD <span class="uk-label uk-label-danger uk-border-pill uk-margin-small-left"><i class="fas fa-caret-down"></i> 0.67064 &nbsp;(-0.08%)</span>
                                    </li>
                                    <li>
                                        GBPJPY <span class="uk-label uk-label-success uk-border-pill uk-margin-small-left"><i class="fas fa-caret-up"></i> 141.91 &nbsp;(+0.12%)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- section content end -->
    </main>
@include("front2.template.footer")
