<footer>
    <!-- footer content begin -->
    <div class="uk-section">
        <hr class="uk-margin-large">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-middle">
                <div class="uk-width-2-3@m uk-text-small">
                    <ul class="uk-subnav uk-subnav-divider uk-visible@s" data-uk-margin>
                        <li><a href="/faqs">{{__('FAQs')}}</a></li>
                        <li><a href="/contact-us">{{__('Contact Us')}}</a></li>
                        <li><a href="/register">{{__('Sign up')}}</a></li>
                        <li><a href="/login">{{__('Log in')}}</a></li>
                    </ul>
                    <p class="copyright-text">©{{ now()->year }} {{ config('app.name') }}. All Rights Reserved.</p>
                </div>
                <div class="uk-width-1-3@m uk-flex uk-flex-right uk-visible@m">
                    <span class="uk-margin-right"><img src="{{asset('front/img/in-lazy.gif')}}" data-src="{{asset('front/img/in-footer-mastercard.svg')}}" alt="footer-payment" width="34" height="21" data-uk-img></span>
                    <span><img src="{{asset('front/img/in-lazy.gif')}}" data-src="{{asset('front/img/in-footer-visa.svg')}}" alt="footer-payment" width="50" height="16" data-uk-img></span>
                </div>
            </div>
        </div>
    </div>
    <!-- footer content end -->
    <!-- totop begin -->
    <div class="uk-visible@m">
        <a href="#" class="in-totop fas fa-chevron-up" data-uk-scroll></a>
    </div>
    <!-- totop end -->
</footer>
<!-- javascript -->
<script src="{{asset('front/js/vendors/uikit.min.js')}}"></script>
<script src="{{asset('front/js/vendors/utilities.min.js')}}"></script>
<script src="{{asset('front/js/vendors/trading-widget.min.js')}}"></script>
<script src="{{asset('front/js/vendors/market-plugin.min.js')}}"></script>
<script src="{{asset('front/js/vendors/particles.min.js')}}"></script>
<script src="{{asset('front/js/config-particles.js')}}"></script>
<script src="{{asset('front/js/config-theme.js')}}"></script>
<x-live-chat />
</body>
