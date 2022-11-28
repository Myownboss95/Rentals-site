@include('front.template.header')
<section class="blog-area ptb-70 pt-0" style="margin-top: 200px">
    <div class="container">
        <div class="section-title">

            <h2>Cart</h2>
        </div>
        <div class="bar"></div>
        <div class="row">
            <div class="col-md-6 offset-md-3">
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
                                    <div class="py-2 text-uppercase">Remove</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            @foreach ($cart as $item)
                                <?php
                                $qty = $item['qty'] ?? 1;
                                $cart_category = $item['category'] ?? 'test';
                                $total += $item['rent_price'] * $qty;
                                ?>
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
                                    <td class="border-0 align-middle"><a href="#" class="text-dark"><i
                                                class="fa fa-trash"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>





                </div>
            </div>

        </div>
    </div>
    @php
        // SessionCache::flush('cart');
    @endphp
</section>

@include('front.template.footer')
