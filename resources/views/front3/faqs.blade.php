@include('front.template.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="row">
        <div class="col-md-6 p-5" style="padding:30px;padding-top:3px;">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      {{__('How do I register and Start?')}}
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{__('The entire registration process is very easy: Just press the "register" button on the home page of the website. Once registered, you can log in to your dashboard.')}}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     {{__('Do you have limits for any amount?')}}
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{__('You can withdraw up to 95% of your total earned profits.')}}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     {{__('How soon will my deposit be added to my account?')}}
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{__("Your account will be updated instantly as you deposit. For Bitcoin deposits you should send actual amount to shown Bitcoin wallet, and your deposit will be added after confirmations ,it can take from 10 minutes up to 1 hour.")}}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                       {{__('Can I invest several deposits at once?')}}
                      </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        {{__('Yes, you can make a deposit from your account balance. Simply log into your member account, click "Deposit", select Payment System and enter amount. Then click on "Make Deposit" button.')}}
                      </div>
                    </div>
                  </div>
              </div>
        </div>
        <div class="col-md-6 p-5" style="padding:30px;padding-top:3px;">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      {{__("How to Withdraw Money?")}}
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{__('You need to go to your dashboard then click "Request withdrawal". Then select balance, and select your processor and then click "REQUEST". Our system will send money Within 24 Hours after request.')}}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        {{__("What's the minimum withdrawal amount?")}}
                    </button>
                  </h2>
                  <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{__("Your minimum withdraw amount depends on your earnings.")}}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingSeven">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    {{__("What payment processors can be used to fund a wallet?")}}
                    </button>
                  </h2>
                  <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{__('You can fund your wallet using Crypto currencies or Bank Transfer.')}}
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingEight">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        {{__("How long will my withdraw get to me?")}}
                      </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        {{__('Withdraws will be in your wallets or bank account in less than 2 hours.')}}
                      </div>
                    </div>
                  </div>
              </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@include('front.template.footer')
