{{-- @include("header") --}}
@include('front.template.header')


<div id="root">
    <main class="container">
        <header id="header">
            <div class="logo-wrapper"><a href="{{ url('/') }}" target="_blank"
                    rel="noopener noreferrer">
                    <img width="100" src="{{ asset('mainlogo1.png')}}" class="logo">
                      
                    </a></div>
            <div class="languages"><span class="bp3-popover-wrapper"><span class="bp3-popover-target">
                        <div class="">
                            <div id="google_translate_element"></div>
                            {{-- <span class="selected">English</span> --}}
                            <span icon="chevron-down" class="bp3-icon bp3-icon-chevron-down"><svg
                                    data-icon="chevron-down" width="18" height="18" viewBox="0 0 16 16">
                                    <desc>chevron-down</desc>
                                    <path
                                        d="M12 5c-.28 0-.53.11-.71.29L8 8.59l-3.29-3.3a1.003 1.003 0 00-1.42 1.42l4 4c.18.18.43.29.71.29s.53-.11.71-.29l4-4A1.003 1.003 0 0012 5z"
                                        fill-rule="evenodd"></path>
                                </svg></span>
                        </div>
                    </span></span></div>
        </header>
 
        <div id="heading" class="en">
            <div class="Typist ">
                <p>Earn<span class="highlight wipe-through">staking rewards</span></p>
            </div>
            <div class="Typist ">on CoinStaking.App with</div>
            <div class="text"> </div>
            <br>
            <a data-gtm-trigger="deposit-button-clicks" data-gtm-action="Deposit Now at Banner"
                href="{{ url('/register') }}" target="_blank" rel="noopener noreferrer"><button type="button"
                    class="bp3-button bp3-large bp3-intent-success"><span class="bp3-button-text">Register</span></button></a>
        </div>



        {{-- section --}}
        <div id="stake-program">
            <div class="bp3-divider divider"></div>
            <p class="description">Our soft-staking program allows you to easily generate rewards by simply holding your
                digital tokens on Coinstaking.app. Staking rewards can be as high as 100%* per Month for supported Digital
                Tokens.
                Please read the<a href="/#faqs">FAQs</a> for details.</p>
            <div class="bp3-divider divider divider-margin"></div>
            <h2 class="calculate">Calculate your potential rewards</h2>
            <ul class="selects calculate-selects">
                <div class="bp3-form-group select">
                    <label class="bp3-label">
                        <span class="select-label">I want to stake</span>
                        <span class="bp3-text-muted"></span>
                    </label>
                    <div class="bp3-form-content">
                        <div class="bp3-popover-wrapper bp3-fill">
                            <div class="bp3-popover-target">
                                <div class="">

                                    <div class="bp3-input-group bp3-large">
                                        <select class="bp3-input" style="padding-right: 52px;" onchange="changeSym()"
                                            id="currency">

                                            <option style="border: 2px solid white" value="" selected>Select Coin
                                            </option>
                                            @foreach ($payment_methods as $payment_method)
                                                <option value="{{ $payment_method['name'] }}"
                                                    data-coinsymbol="{{ $payment_method['symbol'] }}"
                                                    data-roi="{{ $payment_method['roi'] }}">
                                                    {{ $payment_method['name'] }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bp3-form-group select"><label class="bp3-label"><span class="select-label">Amount</span>
                        <span class="bp3-text-muted"></span></label>
                    <div class="bp3-form-content">
                        <div class="bp3-input-group bp3-large">
                            <input type="text" id="inputPrice" placeholder="Amount Here" maxlength="11"
                                class="bp3-input" style="padding-right: 139px;" oninput="computePrice()">

                            <span class="bp3-input-action"><span class="select-amount" id="price">0.00
                                    USD</span></span>
                        </div>
                        <div class="token-unit" style="left: 125px;" id="symbol"></div>
                    </div>
                </div>
            </ul>
            <ul class="rewards-block-wrapper">
                <li class="rewards-block">
                    <div class="flex">
                        <p>Daily Rewards*</p>
                        <p class="amount">0.00 USD</p>
                    </div>
                    <span class="atom">0.00 </span> <span class="coin">TRX</span>
                </li>
                <li class="rewards-block">
                    <div class="flex">
                        <p>Weekly Rewards*</p>
                        <p class="amount">0.00 USD</p>
                    </div>
                    <span class="atom">0.00 </span> <span class="coin">TRX</span>
                </li>
                <li class="rewards-block">
                    <div class="flex">
                        <p>Monthly Rewards*</p>
                        <p class="amount">0.00 USD</p>
                    </div>
                    <span class="atom">0.00 </span> <span class="coin">TRX</span>
                </li>
                <li class="rewards-block">
                    <div class="flex">
                        <p>Yearly Rewards*</p>
                        <p class="amount">0.00 USD</p>
                    </div>
                    <span class="atom">0.00 </span> <span class="coin">TRX</span>
                </li>
            </ul>
            <a data-gtm-trigger="deposit-button-clicks" data-gtm-action="Deposit Now at Calculator"
                href="{{ url('/login') }}" target="_blank" rel="noopener noreferrer"><button type="button"
                    class="bp3-button bp3-large bp3-intent-success"><span class="bp3-button-text">Login</span></button></a>
        </div>

        <div id="deposit">
            <div class="title-wrapper">
                <h2 class="title">No hassle, just deposit</h2>
            </div>
            <ul class="steps">
                <li class="step">
                    <h3 class="step-number">1</h3>
                    <h4 class="step-tip">Pick a digital token to stake</h4>
                    <p class="step-description">Browse our list of staking supported digital tokens below and pick
                        which ones
                        best suit you.</p>
                </li>
                <li class="step active">
                    <h3 class="step-number">2</h3>
                    <h4 class="step-tip">Deposit to CoinStaking.App</h4>
                    <p class="step-description">Simply deposit your chosen digital tokens to your CoinStaking.App account to
                        begin
                        staking.**</p>
                </li>
                <li class="step">
                    <h3 class="step-number">3</h3>
                    <h4 class="step-tip">Earn weekly rewards</h4>
                    <p class="step-description">Watch your account grow as CoinStaking.App automatically deposits your staking
                        rewards
                        into your account on a weekly basis.</p>
                </li>
            </ul>
        </div>


        <div id="digital-tokens">
            <h2 class="title">Supported Digital Tokens</h2>
            <ul class="earnings-list">

                @foreach ($payment_methods as $payment_method)
                    <li class="block-wrapper">
                        <div class="block-content">
                            <div class="coin-logo-wrapper">
                                <img src="{{ asset('storage/payment_methods/' . $payment_method['svg']) }}"
                                    alt="tag" width="50" height="50">
                            </div>
                            <h3 class="coin-title" style="text-transform: capitalize;">{{ $payment_method['name'] }}
                            </h3>
                            <div class="coin-text">
                                <p>Estimated daily staking rewards*

                                </p>
                                <p><span>Up to {{ $payment_method['roi'] }}%</span></p>
                            </div>
                        </div>
                        <div class="block-footer"><a data-gtm-trigger="deposit-button-clicks"
                                data-gtm-action="Deposit Solana" href="{{ url('/register') }}" target="_blank"
                                rel="noopener noreferrer"><button type="button"
                                    class="bp3-button bp3-large bp3-outlined deposit-btn"><span
                                        class="bp3-button-text">Deposit</span></button></a></div>
                    </li>
                @endforeach

            </ul>
            <div class="tip">
                <p>* Refer your friends with your refferal link and get rewarded 10% of their first staking.</p>
                <p>** Stake above 20,000 USD on any selected staking coin and receive a bonus of 1,500 USDT.</p>
                <p>***Staking reward are paid into your account daily and can be withdraw or re-stake.</p>
				<p>****Staking reward are not compounding.</p>
            </div>
        </div>


        <div id="faqs">
            <h2 class="title">Frequently Asked Questions</h2>
            <ul>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle1()">What is Coinstaking.app?</h5>
                    <div class="answer-wrapper1" >
                        <div class="answer" id="answer-wrapper1">
                            <p>Coinstaking.app is the platform for retail and institutional investors that allows to receive passive income by investing in stakable cryptocurrency.
                        </div>
                    </div>
                    <script>
                        var x = document.getElementById("answer-wrapper1");
                          x.style.display = "none";
                        function toggle1() {
                        //   console.log(x.style.display)
                          if (x.style.display === "none") {
                            x.style.display = "inline";
                          } else if(x.style.display === "inline") {
                            x.style.display = "none";
                          }
                        }
                        </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle2()">Is there a minimum/maximum digital token holdings
                        requirement to
                        start staking?</h5>
                    <div class="answer-wrapper2">
                        <div class="answer" id="answer-wrapper2">
                            <p>There is no minimum to begin staking with us. However, to avoid unnecessary stress on our system, we do set a minimum amount of staking rewards before you become eligible to receive a staking reward. That threshold is generally set at a number of tokens that is valued at around $50

                            </p>
                        </div>
                    </div>
                    <script>
                        var y = document.getElementById("answer-wrapper2");
                          y.style.display = "none";
                        function toggle2() {
                        //   console.log(y.innerHTML)
                          if (y.style.display === "none") {
                            y.style.display = "inline";
                          } else if(y.style.display === "inline") {
                            y.style.display = "none";
                          }
                        }
                        </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle3()">Do I have to pay fees to use this service?</h5>
                    <div class="answer-wrapper3">
                        <div class="answer" id="answer-wrapper3">
                            <p>No. We keep a small portion of the staking rewards we collect and deposit the rest into the accounts of our users. In some cases, our staking service provider also retains a portion of rewards collected by the digital tokens we stake.
                            </p> </div>
                    </div>
                    <script>
                        var xx = document.getElementById("answer-wrapper3");
                          xx.style.display = "none";
                        function toggle3() {
                        //   console.log(xx.innerHTML)
                          if (xx.style.display === "none") {
                            xx.style.display = "inline";
                          } else if(xx.style.display === "inline") {
                            xx.style.display = "none";
                          }
                        }
                        </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle4()">Is it safe and how does Coinstaking.app stake my digital tokens?
                    </h5>
                    <div class="answer-wrapper4">
                        <div class="answer" id="answer-wrapper4">
                            <p>Yes, the staked digital tokens never leave our cold wallets. To further minimize risk (e.g., from slashing and to ensure we can accommodate withdrawals) we only stake a portion of the digital tokens we hold. Every digital token has its own way of implementing the staking mechanic, but the process usually begins with us using our cold wallet funds in order to delegate votes to a chosen validator node. Staking provides a layer of governance to its network participants which helps to make the network more secure and for that, network participants are rewarded.
                            </p>
                        </div>
                    </div>

                    <script>
                        var yy = document.getElementById("answer-wrapper4");
                          yy.style.display = "none";
                        function toggle4() {
                        //   console.log(xx.innerHTML)
                          if (yy.style.display === "none") {
                            yy.style.display = "inline";
                          } else if(yy.style.display === "inline") {
                            yy.style.display = "none";
                          }
                        }
                        </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle5()">So I just leave my digital tokens in my Coinstaking.app account and they earn rewards?</h5>
                    <div class="answer-wrapper5">
                        <div class="answer" id="answer-wrapper5">
                            <p>Yes, if your tokens are NOT Ethereum. Every week, we’ll distribute the staking rewards we
                                collect to
                                users who held the staked digital tokens in their Coinstaking.app account. You don’t have to do
                                anything in
                                particular.</p>
                        </div>
                    </div>
                    <script>
                        var z = document.getElementById("answer-wrapper5");
                          z.style.display = "none";
                        function toggle5() {
                        //   console.log(xx.innerHTML)
                          if (z.style.display === "none") {
                            z.style.display = "inline";
                          } else if(z.style.display === "inline") {
                            z.style.display = "none";
                          }
                        }
                        </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle6()">Who makes the governance decisions with my tokens?</h5>
                    <div class="answer-wrapper6">
                        <div class="answer" id="answer-wrapper6">
                            <p>For chains that implement governance mechanisms into their protocol,
                                Staking Lord will not
                                actively take part in any governance events using your tokens other than delegating to a
                                trusted node of
                                our choosing. Where we have partnered with a staking service provider, we will generally
                                allow that
                                service provider to make decisions regarding governance without our input.
                            </p>
                        </div>
                        </div>

                        <script>
                            var zz = document.getElementById("answer-wrapper6");
                              zz.style.display = "none";
                            function toggle6() {
                            //   console.log(xx.innerHTML)
                              if (zz.style.display === "none") {
                                zz.style.display = "inline";
                              } else if(zz.style.display === "inline") {
                                zz.style.display = "none";
                              }
                            }
                            </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle7()">Do I need to do anything after deposit?</h5>
                    <div class="answer-wrapper7">
                        <div class="answer" id="answer-wrapper7" >
                           <p>
                            You don’t need to make any additional actions. Your coins will be automatically and instantly included in a staking pool. Just sit back and enjoy dividends!
                           </p>
                        </div>
                    </div>
                    <script>
                        var zza = document.getElementById("answer-wrapper7");
                          zza.style.display = "none";
                        function toggle7() {
                        //   console.log(xx.innerHTML)
                          if (zza.style.display === "none") {
                            zza.style.display = "inline";
                          } else if(zza.style.display === "inline") {
                            zza.style.display = "none";
                          }
                        }
                        </script>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question" onclick="toggle8()">How frequently will I receive staking rewards?</h5>
                    <div class="answer-wrapper8">
                        <div class="answer" id="answer-wrapper8">
                            <p>Staking rewards are paid out daily. Staking rewards are distributed based on the number of tokens being held at that time.

                                Please note that staking rewards are calculated and distributed to Staking Room by the token network.</p>
                        </div>
                    </div>

                    <script>
                        var apa = document.getElementById("answer-wrapper8");
                          apa.style.display = "none";
                        function toggle8() {
                        //   console.log(xx.innerHTML)
                          if (apa.style.display === "none") {
                            apa.style.display = "inline";
                          } else if(apa.style.display === "inline") {
                            apa.style.display = "none";
                          }
                        }
                        </script>
                </li>
            </ul>
        </div>

        <script>
            var typing = new Typed(".text", {
                strings: ["", "Chainlink",
                    "Cosmos",
                    "XRP",
                    "CARDANO",
                    "Polkadot",
                    "Solana",
                    "Dogecoin",
                    "Shiba Inu",
                    "Uni Swap",
                    "Avalanche",
                    "Tron",
                    "Stellar",
                    "Algorand",
                    "Tezos",
                    "USDT",
                    "USDC"
                ],
                typeSpeed: 100,
                backSpeed: 40,
                loop: true,
            });
            window.onload = (event) => {
                document.getElementById('inputPrice').value = '';
                document.getElementById('currency').value = '';
            };

            const changeSym = () => {

                var symbol = document.getElementById('currency').value;
                var symbol1 = document.getElementById('currency');
                // var coin = symbol1.getAttribute('data-coinsymbol');
                var roiCheck = symbol1.options[symbol1.selectedIndex].getAttribute('data-roi');
                // console.log(roiCheck)
                window._roiCheck = roiCheck;
                var check = symbol1.options[symbol1.selectedIndex].getAttribute('data-coinsymbol');
                var check1 = document.querySelectorAll('.coin')
                check1.forEach(element => {
                    element.innerHTML = check;
                });

                document.getElementById('symbol').innerHTML = symbol;
                if (symbol != '') {
                    try {
                        fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${symbol}&vs_currencies=usd`).then(
                            (res) => {
                                if (!res.ok) throw new Error(`the HTTP error is ${res.status}`);
                                return res.json()
                            }
                        ).then(
                            data => {
                                window._data = data[symbol.toLowerCase()]['usd'];
                                document.getElementById('price').innerHTML = data[symbol.toLowerCase()]['usd'] + 'USD';

                            }
                        )
                    } catch (error) {

                    }
                }
            }

            var amounts = document.querySelectorAll('.amount');
            var atom = document.querySelectorAll('.atom');


            const computePrice = () => {
                data = window._data;
                roiCheck = Number(window._roiCheck);


                const inputPrice = document.getElementById('inputPrice').value;
                if (data != '') {
                    var result = inputPrice * data;
                    var mainPrice = result.toFixed(2) + ' USD';
                    document.getElementById('price').innerHTML = mainPrice;
                    let percentageR = (roiCheck / 100);

                    // console.log(result)
                    amounts.forEach((element, index) => {
                        if (index == 0) {
                            element.innerHTML = ((percentageR * 1 * result) + result).toFixed(2) + ' USD';
                        }
                        if (index == 1) {
                            element.innerHTML = ((percentageR * 7 * result) + result).toFixed(2) + ' USD';
                        }
                        if (index == 2) {
                            element.innerHTML = ((percentageR * 30 * result) + result).toFixed(2) + ' USD';
                        }
                        if (index == 3) {
                            element.innerHTML = ((percentageR * 365 * result) + result).toFixed(2) + ' USD';
                        }

                    });
                    let realPrice = Number(inputPrice);

                    atom.forEach((element, index) => {
                        if (index == 0) {
                            element.innerHTML = ((percentageR * 1 * realPrice) + realPrice).toFixed(2);
                        }
                        if (index == 1) {
                            element.innerHTML = ((percentageR * 7 * realPrice) + realPrice).toFixed(2);
                        }
                        if (index == 2) {
                            element.innerHTML = ((percentageR * 30 * realPrice) + realPrice).toFixed(2);
                        }
                        if (index == 3) {
                            element.innerHTML = ((percentageR * 365 * realPrice) + realPrice).toFixed(2);
                        }

                    });
                } else {
                    document.getElementById('price').innerHTML = '0 USD';
                }

            }
        </script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                        pageLanguage: 'en'
                    },
                    'google_translate_element'
                );
            }
        </script>

        
        @include('front.template.footer')
