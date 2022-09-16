{{-- @include("header") --}}
@include('front.template.header')

<div id="root">
    <main class="container">
        <header id="header">
            <div class="logo-wrapper"><a href="https://www.bitfinex.com?locale=en" target="_blank"
                    rel="noopener noreferrer">
                    <svg width="210" height="25" viewBox="0 0 165 20" fill="none" class="logo">
                        <path fill="#fff"
                            d="M141.437 19.662a.2.2 0 01-.144.338h-4.386a.198.198 0 01-.145-.063l-5.83-6.166-5.894 6.167a.198.198 0 01-.144.062h-4.387a.2.2 0 01-.144-.338l8.036-8.421-7.764-8.183a.2.2 0 01.145-.338h4.387c.055 0 .108.023.146.063l5.576 5.928 5.598-5.928a.202.202 0 01.146-.063h4.387a.2.2 0 01.145.338l-7.764 8.183 8.036 8.42zM99.856 20a.278.278 0 01-.278-.278V2.998c0-.153.125-.277.278-.277h16.571c.153 0 .277.124.277.277V5.39a.277.277 0 01-.277.277h-12.83v3.851h7.692c.153 0 .278.125.278.278v2.392a.278.278 0 01-.278.277h-7.692v4.287h12.997c.153 0 .278.124.278.277v2.693a.278.278 0 01-.278.278H99.856zM70.514 20a.278.278 0 01-.277-.278V2.998c0-.153.124-.277.277-.277h3.463c.154 0 .278.124.278.277v16.724a.278.278 0 01-.278.278h-3.463zM50.813 20a.278.278 0 01-.277-.278V2.998c0-.153.124-.277.277-.277h16.37c.153 0 .277.124.277.277v2.459a.278.278 0 01-.277.277H54.554v4.555h6.989c.153 0 .278.124.278.277v2.593a.278.278 0 01-.278.277h-6.989v6.286a.278.278 0 01-.278.278h-3.463zM40.067 5.801v13.921a.278.278 0 01-.277.278h-3.463a.278.278 0 01-.278-.278V5.802h-7.381a.278.278 0 01-.278-.278V2.998c0-.153.124-.277.278-.277h18.814c.153 0 .277.124.277.277v2.526a.278.278 0 01-.277.277h-7.415zM21.873 20a.278.278 0 01-.277-.278V2.998c0-.153.124-.277.277-.277h3.463c.154 0 .278.124.278.277v16.724a.278.278 0 01-.278.278h-3.463z">
                        </path>
                        <path fill="#fff" fill-rule="evenodd" clip-rule="evenodd"
                            d="M0 2.998c0-.153.124-.277.278-.277h14.798a3.609 3.609 0 013.608 3.609v1.153a3.609 3.609 0 01-3.609 3.61h.135a3.61 3.61 0 013.61 3.608v1.69A3.609 3.609 0 0115.21 20H.278A.278.278 0 010 19.722V2.998zm3.949 2.536h9.353c.92 0 1.666.746 1.666 1.666v.787c0 .92-.746 1.665-1.666 1.665H3.949V5.534zm0 6.963h9.453c.92 0 1.666.746 1.666 1.666v1.057c0 .92-.746 1.665-1.666 1.665H3.95v-4.388z">
                        </path>
                        <path fill="#fff"
                            d="M77.031 19.722V2.998c0-.153.124-.277.278-.277h2.363c.068 0 .133.024.184.07l13.33 11.798V2.999c0-.154.124-.278.277-.278h3.062c.153 0 .277.124.277.277v16.724a.278.278 0 01-.277.278h-2.363a.278.278 0 01-.184-.07L80.648 8.1v11.622a.278.278 0 01-.278.278H77.31a.278.278 0 01-.278-.278z">
                        </path>
                        <path fill="#03CA9B"
                            d="M144.777 13.042c-.175-2.832 1.015-5.98 3.464-8.429 5.326-5.326 16.418-4.58 16.481-4.575-.03.044-8.139 11.8-17.748 12.9-.742.085-1.476.119-2.197.104z">
                        </path>
                        <path fill="#03CA9B"
                            d="M145.902 16.662c.275.438.599.847.974 1.222 3.288 3.288 9.23 2.677 13.271-1.364 5.342-5.342 4.575-16.482 4.575-16.482-.029.066-5.842 13.095-15.08 15.937-1.254.386-2.511.61-3.74.687z">
                        </path>
                    </svg></a></div>
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
            <div class="Typist ">on Bitfinex with</div>
            <div class="text"> </div>
            <br>
            <a data-gtm-trigger="deposit-button-clicks" data-gtm-action="Deposit Now at Banner"
                href="{{ url('/login') }}" target="_blank" rel="noopener noreferrer"><button type="button"
                    class="bp3-button bp3-large bp3-intent-success"><span class="bp3-button-text">Deposit
                        Now</span></button></a>
        </div>



        {{-- section --}}
        <div id="stake-program">
            <div class="bp3-divider divider"></div>
            <p class="description">Our soft-staking program allows you to easily generate rewards by simply holding your
                digital tokens on Bitfinex. Staking rewards can be as high as 10%* per year for supported Digital
                Tokens.
                Please read the <a href="/#faqs">FAQs</a> for details.</p>
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
                    class="bp3-button bp3-large bp3-intent-success"><span class="bp3-button-text">Deposit
                        Now</span></button></a>
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
                    <h4 class="step-tip">Deposit to Bitfinex</h4>
                    <p class="step-description">Simply deposit your chosen digital tokens to your Bitfinex account to
                        begin
                        staking.**</p>
                </li>
                <li class="step">
                    <h3 class="step-number">3</h3>
                    <h4 class="step-tip">Earn weekly rewards</h4>
                    <p class="step-description">Watch your account grow as Bitfinex automatically deposits your staking
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
                                <p>Estimated annual staking rewards*

                                </p>
                                <p><span>Up to {{ $payment_method['roi'] }}%</span></p>
                            </div>
                        </div>
                        <div class="block-footer"><a data-gtm-trigger="deposit-button-clicks"
                                data-gtm-action="Deposit Solana" href="https://staking.test/register" target="_blank"
                                rel="noopener noreferrer"><button type="button"
                                    class="bp3-button bp3-large bp3-outlined deposit-btn"><span
                                        class="bp3-button-text">Deposit</span></button></a></div>
                    </li>
                @endforeach

            </ul>
            <div class="tip">
                <p>* This is the estimated annual staking reward for staked tokens.&nbsp;For ETH staking, the estimated
                    annual
                    staking reward is based on rewards as of December 23, 2020, rewards will vary including based on the
                    Ethereum protocol. Actual annualized staking rewards may differ. Bitfinex makes no guarantees
                    regarding the
                    amount of any staking rewards.</p>
                <p>** To stake ETH2, you must opt in. Please see the FAQs for more details.</p>
            </div>
        </div>


        <div id="faqs">
            <h2 class="title">Frequently Asked Questions</h2>
            <ul>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">How frequently will I receive staking rewards?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">
                            <p>Staking rewards are paid out weekly. We will take a mid-week account balance snapshot and
                                distribute
                                the rewards based on the number of tokens being held at that time.</p>
                            <p>Please note that staking rewards are calculated and distributed to Bitfinex by the token
                                network.
                                There is not any fixed rewards distribution timeline and policy that determine who
                                receives the
                                rewards. Therefore, Bitfinex does not guarantee that you will receive staking rewards
                                every week or
                                consistently.</p>
                        </div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">Is there a minimum/maximum digital token holdings
                        requirement to
                        start staking?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">There is no minimum to begin staking with us. However, to avoid unnecessary
                            stress on
                            our system, we do set a minimum amount of staking rewards before you become eligible to
                            receive a
                            staking reward. That threshold is generally set at a number of tokens that is valued at
                            around US$0.50
                            (the "Minimum Reward") per token per week. If, based on the number of tokens you have
                            staked, the amount
                            of the staking reward is less than the Minimum Reward you will not receive a staking reward.
                        </div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">Do I have to pay fees to use this service?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">No. We keep a small portion of the staking rewards we collect and deposit
                            the rest
                            into the accounts of our users. In some cases, our staking service provider also retains a
                            portion of
                            rewards collected by the digital tokens we stake. </div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">Is it safe and how does Bitfinex stake my digital tokens?
                    </h5>
                    <div class="answer-wrapper">
                        <div class="answer">Yes, the staked digital tokens never leave our cold wallets. To further
                            minimize risk
                            (e.g., from slashing and to ensure we can accommodate withdrawals) we only stake a portion
                            of the
                            digital tokens we hold. Every digital token has its own way of implementing the staking
                            mechanic, but
                            the process usually begins with us using our cold wallet funds in order to delegate votes to
                            a chosen
                            validator node. Staking provides a layer of governance to its network participants which
                            helps to make
                            the network more secure and for that, network participants are rewarded.</div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">So I just leave my digital tokens in my Bitfinex account
                        and they
                        earn rewards?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">
                            <p>Yes, if your tokens are NOT Ethereum. Every week, we’ll distribute the staking rewards we
                                collect to
                                users who held the staked digital tokens in their Bitfinex account. You don’t have to do
                                anything in
                                particular.</p>
                            <p>If you want to stake Ethereum, you’d need to convert your ETH into ETH2 first. Visit our
                                <a href="https://support.bitfinex.com/hc/en-us/articles/900004888823-Ethereum-2-0-Staking"
                                    target="_blank">Knowledge Base</a> to learn how to start staking your Ethereum
                                holdings.
                            </p>
                        </div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">Who makes the governance decisions with my tokens?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">For chains that implement governance mechanisms into their protocol,
                            Bitfinex will not
                            actively take part in any governance events using your tokens other than delegating to a
                            trusted node of
                            our choosing. Where we have partnered with a staking service provider, we will generally
                            allow that
                            service provider to make decisions regarding governance without our input.</div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">Will I still be able to trade or withdraw my staked
                        tokens?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">
                            <p>It depends on the tokens you’re staking. For tokens other than Ethereum, you are able to
                                trade your
                                staked tokens. Although some staked tokens are “locked” for a period of time, depending
                                on the
                                protocol.</p>
                            <p>To accommodate withdrawals, we only stake a portion of the digital tokens we hold. In the
                                unlikely
                                event that withdrawals by other users exceed the “un-staked” portion of the tokens we
                                hold,
                                withdrawals may be delayed until the staked tokens are released. The duration of the
                                potential delay
                                would depend on the applicable protocol.</p>
                            <p>If you are staking Ethereum, you will not be able to withdraw your staked ETH because of
                                the way the
                                Ethereum protocol works. Once you choose to stake ETH, that decision is final and
                                irreversible. The
                                ETH you stake through Bitfinex’s staking service will be converted to an ETH2 balance in
                                your account
                                once they are successfully staked. Rewards earned on staked ETH will be reflected as a
                                balance of ETH2
                                Rewards in your account. ETH2 and ETH2 Rewards balances cannot be withdrawn but there
                                may be a market
                                for trading ETH2 or ETH2 Rewards on Bitfinex. Please refer to our token specific terms
                                for ETH2 and
                                ETH2 Rewards for more detailed information.</p>
                        </div>
                    </div>
                </li>
                <li class="faq collapsed">
                    <h5 role="presentation" class="question">How do I stake Ethereum (ETH2)?</h5>
                    <div class="answer-wrapper">
                        <div class="answer">
                            <p>In order to stake ETH2 you must opt in. ETH2 staking is highly experimental and risky.
                                Please ensure
                                you independently assess, understand and accept the related risks before deciding to
                                stake.</p>
                            <p>Please refer to our <a href="#" target="_blank">Knowledge Base</a> for detailed
                                information on how to stake ETH2.</p>
                        </div>
                    </div>
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
                    atom.forEach((element, index) => {
                        if (index == 0) {
                            element.innerHTML = (result / data).toFixed(2);
                        }
                        if (index == 1) {
                            element.innerHTML = ((result / data) * 7).toFixed(2);
                        }
                        if (index == 2) {
                            element.innerHTML = ((result / data) * 7 * 30).toFixed(2);
                        }
                        if (index == 3) {
                            element.innerHTML = ((result / data) * 7 * 30 * 12).toFixed(2);
                        }

                    });
                } else {
                    document.getElementById('price').innerHTML = '0 USD';
                }

            }
        </script>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                        pageLanguage: 'en'
                    },
                    'google_translate_element'
                );
            }
        </script>

        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?
            cb=googleTranslateElementInit"></script>
        @include('front.template.footer')
