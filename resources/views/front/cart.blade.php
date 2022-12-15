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
                            @foreach ($cart as $item)
                                @php
                                $qty = $item['quantity'] ?? 1;
                                $cart_category = $item['category'] ?? 'test';
                                $total += $item['rent_price'] * $qty;
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
                                                    </a></h5><span
                                                    class="text-muted font-weight-normal font-italic d-block">Category:
                                                    {{ $cart_category }}</span>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="border-0 align-middle"><strong>{{ format($item['rent_price']) }}</strong>
                                    </td>
                                    <td class="border-0 align-middle"><strong>{{ $qty }}</strong></td>
                                    <td class="border-0 align-middle"><strong>{{ $item['rent_duration'] }}</strong>
                                    </td>
                                    <td class="border-0 align-middle"><a href="#" class="text-dark"></a>
                                            
                                        @if (Auth::check())
                                        <button class="btn btn-dark remove-from-cart" tabindex="0" type="button"
                                        data-slug="{{ $item['slug'] }}"
                                        data-quantity="{{ $qty }}">
                                        <i
                                        class="fa fa-trash"></i>
                                    </button>
                                        @endif        
                                        

                                            </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>





                </div>
            </div>
            <div class="col-lg-3 card p-5 rounded shadow-sm">
                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                <div class="p-4">
                  <p class="font-italic mb-4">Select Payment Method</p>
                  <ul class="list-unstyled mb-4">
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>{{ format($total)}}</strong></li>
                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                      <h5 class="font-weight-bold">{{ format($total)}}</h5>
                    </li>
                  </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>
                </div>
              </div>

        </div>
    </div>
    {{-- @php
        Session::flush('cart');
    @endphp --}}
</section>

@include('front.template.footerP')
