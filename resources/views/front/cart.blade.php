@include('front.template.header')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>

<section class="blog-area ptb-70 pt-0" style="margin-top: 200px">
    <div class="container">
        <div class="section-title">

            <h2>Cart</h2>
        </div>
        <div class="bar"></div>
        <div class="row">
            <div class="col-md-7 card p-5 offset-md-1 rounded shadow-sm ">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="p-2 px-3 text-uppercase">Product</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Price</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Quantity</div>
                                </th>
                                <th scope="col" class="border-0 bg-light">
                                    <div class="py-2 text-uppercase">Rent Duration</div>
                                </th>
                                @if (Auth::check())
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @if (count($cart) > 0)
                                @foreach ($cart as $item)
                                    @php
                                        $qty = $item['quantity'] ?? 1;
                                        $rent_duration = $item['rent_duration'] ?? 1;
                                        $cart_category = $item['category'] ?? 'test';
                                        $total += $item['rent_price'] * $qty * $rent_duration;
                                    @endphp
                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="{{ asset('storage/products/' . $item['image']) }}"
                                                    alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0">
                                                        <a href="{{ route('shop.show', $item['slug']) }}"
                                                            class="text-dark d-inline-block align-middle">
                                                            {{ $item['name'] }}
                                                        </a>
                                                    </h5><span
                                                        class="text-muted font-weight-normal font-italic d-block">Category:
                                                        {{ $cart_category }}</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle">
                                            <strong>{{ format($item['rent_price']) }}</strong>
                                        </td>
                                        <td class="border-0 align-middle"><input type="number" min="1"
                                                value="{{ $item['quantity'] }}" data-id="{{ $item['product_id'] }}"
                                                class="cart-quantity form-control">
                                        </td>
                                        <td class="border-0 align-middle"><strong>{{ $item['rent_duration'] }}
                                                Days</strong>
                                        </td>
                                        <td class="border-0 align-middle"><a href="#" class="text-dark"></a>

                                            @if (Auth::check())
                                                <button class="btn btn-dark remove-from-cart" tabindex="0"
                                                    type="button" data-slug="{{ $item['slug'] }}"
                                                    data-quantity="{{ $qty }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Product in Cart, <a href="{{ route('shop.index') }}"
                                            class="btn btn-outline-info mx-2">Back to Shop</a>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>





                </div>
            </div>
            <div class="col-lg-3 card p-5 rounded shadow-sm">

                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>

                <div class="p-4">

                    <br>
                    <ul class="list-unstyled mb-4">
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order
                                Subtotal </strong><strong>{{ format($total) }}</strong></li>
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                class="text-muted">Total</strong>
                            <h5 class="font-weight-bold">{{ format($total) }}</h5>
                        </li>
                    </ul>

                </div>
                @if (count($cart) > 0)

                    @if (!Auth::check())
                        <p class="text-center">
                            You need to Register to Rent Items
                        </p> 
                        <a href="{{ route('register') }}" class="btn btn-dark rounded-pill py-2 btn-block">Create An
                            Account</a>
                            <p class="text-center">Or if you have an account,</p>
                        <a href="{{ route('login') }}" class="btn btn-link">Login Here</a>
                    @else
                        <div id="showPaymentOptions">

                        </div>
                        <p class="font-italic">Select Payment Method</p>
                        <select id="payment_option" class="form-select mb-3">
                            <option value="">Select</option>
                            <option value="paystack">Paystack</option>
                            <option value="account">Account Funds</option>
                        </select>
                        <br>

                        <form action="{{ route('user.payment') }}" method="POST">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $total }}">
                            <button class="btn btn-dark rounded-pill py-2 btn-block d-none" id="paystack">Proceed with
                                Paystack</button>
                        </form>

                        <br>

                        <div id="account" class=" d-none py-3">
                            @if (!Auth::check())
                                You need to login to use account funds
                            @else
                                @if ($total > $userMainBalance)
                                    <small class="text-danger">
                                        Your Balance is {{ format($userMainBalance) }} and you need
                                        <br>{{ format($total - $userMainBalance) }} to complete this transaction
                                    </small>
                                @endif
                            @endif
                            <form action="{{ route('user.account.payment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="amount" value="{{ $total }}">
                                <button class="btn btn-dark rounded-pill py-2 btn-block d-none" id="proceed">Purchase
                                    with
                                    Account Funds</button>
                            </form>

                            <a href="{{ route('user.deposits.create') }}" id="topup"
                                class="btn btn-dark rounded-pill py-3 btn-block d-none">Top Up Account</a>
                        </div>
                    @endif
                @endif
            </div>

        </div>
    </div>
    <script>
        let paystack = document.getElementById('paystack');
        let account = document.getElementById('account');
        let proceed = document.getElementById('proceed');
        let topup = document.getElementById('topup');
        document.getElementById('payment_option').onchange = e => {
            if (e.target.value == 'paystack') {
                showPaystack();
            } else if (e.target.value == 'account') {
                showAccount();
            } else {
                resetOption();
            }
        }

        function showPaystack() {
            paystack.classList.remove('d-none');
            account.classList.add('d-none')
        }

        function showProceed() {

            proceed.classList.remove('d-none');
            topup.classList.add('d-none')
        }

        function showTopUp() {
            topup.classList.remove('d-none');
            proceed.classList.add('d-none')
        }

        function showAccount() {
            if ({{ $total }} > {{ $userMainBalance }}) {
                showTopUp()
            } else {
                showProceed()
            }
            account.classList.remove('d-none');
            paystack.classList.add('d-none')
        }

        function resetOption() {
            account.classList.add('d-none');
            paystack.classList.add('d-none')
        }
    </script>
    {{-- @php
        Session::flush('cart');
    @endphp --}}
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Listen for changes to the cart quantity inputs
    $('.cart-quantity').on('change', function() {
        const itemId = $(this).data('id');
        const quantity = $(this).val();
        $.ajax({
            url: 'update-cart',
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": itemId,
                quantity
            },
            success: function() {
                location.reload();
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
</script>
@include('front.template.footerP')
