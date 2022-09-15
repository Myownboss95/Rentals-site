@include('front.template.header')
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-width-3-5@m">
                    <h1 class="uk-margin-small-bottom">{{__('Putting our clients first')}} <span class="in-highlight">{{__('since 2001')}}</span></h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-remove-top">
                        {{__('For more than 30 years, we’ve been empowering clients by helping them take control of their financial lives.')}}
                    </p>
                </div>
            </div>
            <div class="uk-grid uk-grid-large uk-child-width-1-3@m uk-margin-medium-top" data-uk-grid>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <i class="fas fa-leaf fa-lg in-icon-wrap primary-color"></i>
                    </div>
                    <div>
                        <h3>{{__('Philosophy')}}</h3>
                        <p>
                            {{__('Profiitrend empowers every trader to master the arts of Forex Trading and Crypto Trading, and Robot Trading.')}}
                        </p>
                    </div>
                </div>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <i class="fas fa-hourglass-end fa-lg in-icon-wrap primary-color"></i>
                    </div>
                    <div>
                        <h3>{{__('History')}}</h3>
                        <p>{{__("We've had a rich history of providing the best ROI and Customer Care Support in this industry")}}</p>
                    </div>
                </div>
                <div class="uk-flex uk-flex-left">
                    <div class="uk-margin-right">
                        <i class="fas fa-flag fa-lg in-icon-wrap primary-color"></i>
                    </div>
                    <div>
                        <h3>{{__('Culture')}}</h3>
                        <p>{{__('At Binotomo, we implement world best practices in our dealings')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section content end -->
<!-- section content begin -->
<div class="uk-section in-offset-top-40 in-offset-bottom-20">
    <div class="uk-container">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <div class="uk-card uk-card-default uk-border-rounded uk-background-center uk-background-contain uk-background-image@m" style="background-image: url(img/in-team-background-1.png);" data-uk-parallax="bgy: -100">
                    <div class="uk-card-body">
                        <div class="uk-grid uk-flex uk-flex-center">
                            <div class="uk-width-3-4@m uk-text-center">
                                <h2>{{__("Trust the Professionals")}}</h2>
                                <p>{{__("We are a group of passionate, independent thinkers who never stop exploring new ways to improve trading for the self-directed investor")}}.</p>
                            </div>
                        </div>
                        <div class="uk-grid uk-child-width-1-2@m uk-margin-medium-top" data-uk-grid>
                            <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img class="uk-align-center " src="{{asset('front/img/in-team-1.png')}}" alt="image-team" width="300">
                                </div>
                                <div>
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">{{__('Chief Executive Officer')}}</p>
                                    <h4 class="uk-margin-small-top">Cynthia Dixon</h4>
                                    {{-- <p>Nostrum exercitationem ullam corporis suscipit labor samnisi ute aliquid fugiat.</p> --}}
                                    <div>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-facebook-f uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-twitter uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img class="uk-align-center " src="{{asset('front/img/in-team-2.png')}}" alt="image-team" width="300">
                                </div>
                                <div>
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">{{__('Executive Assistant')}}</p>
                                    <h4 class="uk-margin-small-top">Arthur Parker</h4>
                                    {{-- <p>Nostrum exercitationem ullam corporis suscipit labor samnisi ute aliquid fugiat.</p> --}}
                                    <div>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-facebook-f uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-twitter uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img class="uk-align-center " src="{{asset('front/img/in-team-3.png')}}" alt="image-team" width="300">
                                </div>
                                <div>
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">Marketing Specialist</p>
                                    <h4 class="uk-margin-small-top">Evelyn Mason</h4>
                                    <p>Nostrum exercitationem ullam corporis suscipit labor samnisi ute aliquid fugiat.</p>
                                    <div>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-facebook-f uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-twitter uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-flex uk-flex-left">
                                <div class="uk-margin-right">
                                    <img class="uk-align-center " src="{{asset('front/img/in-team-4.png')}}" alt="image-team" width="300">
                                </div>
                                <div>
                                    <p class="uk-text-small uk-text-muted uk-text-uppercase uk-margin-remove-bottom">Human Resources</p>
                                    <h4 class="uk-margin-small-top">Bryan Greene</h4>
                                    <p>Nostrum exercitationem ullam corporis suscipit labor samnisi ute aliquid fugiat.</p>
                                    <div>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-facebook-f uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-twitter uk-margin-small-right"></i></a>
                                        <a class="uk-link-muted" href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- section content end -->
<!-- section content begin -->
<div class="uk-section">
    <div class="uk-container">
        <div class="uk-grid uk-flex uk-flex-center">
            <div class="uk-width-3-4@m">
                <div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
                    <div class="uk-width-1-2@m">
                        <h4 class="uk-text-muted">{{__('Number speaks')}}</h4>
                        <h1 class="uk-margin-medium-bottom">{{__('We always ready')}}<br>{{__('for a')}} <span class="in-highlight">{{__('challenge.')}}</span></h1>
                        <a href="/register" class="uk-button uk-button-primary uk-border-rounded">{{__('Get Started')}}<i class="fas fa-chevron-circle-right fa-xs uk-margin-small-left"></i></a>
                    </div>
                    <div class="uk-width-1-2@m">
                        <div class="uk-margin-large" data-uk-grid>
                            <div class="uk-width-1-3@m">
                                <h1 class="uk-text-primary uk-text-right@m">
                                    <span class="count" data-counter-end="500">0</span>
                                </h1>
                                <hr class="uk-divider-small uk-text-right@m">
                            </div>
                            <div class="uk-width-expand@m">
                                <h4>+ {{__('Million Trades Placed')}}</h4>
                                <p>{{__('trading 24Hours a day,7 Days a week')}}</p>
                            </div>
                        </div>
                        <div class="uk-margin-large" data-uk-grid>
                            <div class="uk-width-1-3@m">
                                <h1 class="uk-text-primary uk-text-right@m">
                                    <span class="count" data-counter-end="5000">0</span>
                                </h1>
                                <hr class="uk-divider-small uk-text-right@m">
                            </div>
                            <div class="uk-width-expand@m">
                                <h4>{{__('Active Clients Registered')}}</h4>
                                <p>{{__('Clients Rewarded')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@include('front.template.footer')
