/* --------------------------------------------------------------------------
 * File        : config-theme.js
 * Author      : indonez
 * Author URI  : http://www.indonez.com
 *
 * Indonez Copyright 2020 All Rights Reserved.
 * --------------------------------------------------------------------------
 * javascript handle initialization
    1. Slideshow
    2. Counter
    3. Mobile nav button
    4. Modal iframe
    5. Tradingview widget
 * -------------------------------------------------------------------------- */

'use strict';

const HomepageApp = {
    //----------- 1. Slideshow -----------
    theme_slideshow: function() {
        UIkit.slideshow('.in-slideshow', {
            autoplay: true,
            autoplayInterval: 8000,
            pauseOnHover: false,
            animation: 'slide',
            minHeight: 440,
            maxHeight: 580
        });
    },
    //---------- 2. Counter -----------
    theme_counter: function() {
        const counter = new counterUp({
            selector: '.count',
            start: 0,
            duration: 3200,
            intvalues: true,
            interval: 50
        });
        counter.start();
    },
    //---------- 3. Mobile nav button -----------
    theme_mobilenav: function() {
        mobileNav({
            addonButtons: true,
            buttons: [{
                name: 'Log in', // button name
                url: '/login', // button url
                type: 'primary', // button type (default, primary, secondary, danger, text)
                icon: 'sign-in-alt' // button icon, you can use all icons from here : https://fontawesome.com/icons?d=gallery&s=solid&m=free
            }]
        });
    },
    //---------- 4. Modal iframe -----------
    theme_video: function() {
        modalIframe({
            videos: [{
                id: 'video-1', // video id (should not be the same as the next video)
                url: 'https://www.youtube.com/embed/F3QpgXBtDeo' // video embed url
            }]
        });
    },
    //---------- 5. Tradingview widget -----------
    theme_tradingview: function() {
        if (window.tradingWidget)
            tradingWidget({
                widget: [{
                        type: "market-overview",
                        theme: "light",
                        symbol: [ // array of instruments symbol based on Tradingview
                            {
                                s: "FX:EURUSD"
                            },
                            {
                                s: "FX:GBPUSD"
                            },
                            {
                                s: "FX:USDJPY"
                            },
                            {
                                s: "FX:USDCHF"
                            },
                            {
                                s: "FX:AUDUSD"
                            },
                            {
                                s: "FX:USDCAD"
                            }
                        ]
                    },
                    {
                        type: "symbol-overview",
                        theme: "dark",
                        symbol: "GOOGL" // symbol based on Tradingview
                    }
                ]
            });
    },
    theme_init: function() {
        HomepageApp.theme_slideshow();
        HomepageApp.theme_counter();
        HomepageApp.theme_mobilenav();
        HomepageApp.theme_video();
        HomepageApp.theme_tradingview();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    HomepageApp.theme_init();
});
