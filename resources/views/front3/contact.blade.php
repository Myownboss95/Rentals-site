@include('front.template.header')
<main>
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-3-5@m">
                    <h1 class="uk-margin-remove-bottom">{{ __('Contact Us') }}</h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-small-top">
                        {{ __('Do not hesitate to reach out. Just fill in the contact form here and we’ll be sure to reply as fast as possible.') }}
                    </p>
                </div>
                <div class="uk-width-1-1@m uk-margin-large-top">
                    <div
                        class="uk-grid uk-grid-large"
                        data-uk-grid
                    >
                        <div class="uk-width-1-3@m">
                            <h4 class="uk-margin-remove-bottom">{{ __('Visit our office') }}</h4>
                            <p class="uk-margin-small-top">Satrio Tower 16th Floor, Jl. Prof Dr Satrio Kuningan, Jakarta
                            </p>
                            <h4 class="uk-margin-medium-top uk-margin-remove-bottom">Message us</h4>
                            <p class="uk-margin-small-top">hello@company.com<br>(888)234-5686</p>
                            {{-- <div class="uk-margin-medium-top in-contact-socials">
                            <a href="#" class="fab fa-facebook-square fa-lg uk-margin-right"></a>
                            <a href="#" class="fab fa-twitter fa-lg uk-margin-right"></a>
                            <a href="#" class="fab fa-linkedin-in fa-lg uk-margin-right"></a>
                            <a href="#" class="fab fa-instagram fa-lg uk-margin-right"></a>
                            <a href="#" class="fab fa-pinterest fa-lg uk-margin-right"></a>
                        </div> --}}
                        </div>
                        <div class="uk-width-2-3@m">
                            <div class="uk-margin-medium-left in-margin-remove-left@s">
                                <form
                                    id="contact-form"
                                    class="uk-form uk-grid-small"
                                    data-uk-grid
                                >
                                    <div class="uk-width-1-2@s uk-inline">
                                        <span class="uk-form-icon fas fa-user fa-sm"></span>
                                        <input
                                            class="uk-input uk-border-rounded"
                                            id="name"
                                            name="name"
                                            type="text"
                                            placeholder="{{ __('Full Name') }}"
                                        >
                                    </div>
                                    <div class="uk-width-1-2@s uk-inline">
                                        <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                        <input
                                            class="uk-input uk-border-rounded"
                                            id="email"
                                            name="email"
                                            type="email"
                                            placeholder="{{ __('Email Address') }}"
                                        >
                                    </div>
                                    <div class="uk-width-1-1 uk-inline">
                                        <span class="uk-form-icon fas fa-pen fa-sm"></span>
                                        <input
                                            class="uk-input uk-border-rounded"
                                            id="subject"
                                            name="subject"
                                            type="text"
                                            placeholder="{{ __('Subject') }}"
                                        >
                                    </div>
                                    <div class="uk-width-1-1">
                                        <textarea
                                            class="uk-textarea uk-border-rounded"
                                            id="message"
                                            name="message"
                                            rows="6"
                                            placeholder="{{ __('Message') }}"
                                        ></textarea>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <button
                                            class="uk-button uk-button-primary uk-border-rounded uk-align-right"
                                            id="sendemail"
                                            type="submit"
                                            name="submit"
                                        >{{ __('Send Message') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('front.template.footer')
