@include('front.template.header')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="https://w3learnpoint.com/cdn/jquery-picZoomer.css">
<style>
    .picZoomer {
        position: relative;
        /*margin-left: 40px;
    padding: 15px;*/
    }

    .picZoomer-pic-wp {
        position: relative;
        overflow: hidden;
        text-align: center;
    }

    .picZoomer-pic-wp:hover .picZoomer-cursor {
        display: block;
    }

    .picZoomer-zoom-pic {
        position: absolute;
        top: 0;
        left: 0;
    }

    .picZoomer-pic {
        width: 100%;
        height: 100%;
    }

    .picZoomer-zoom-wp {
        display: none;
        position: absolute;
        z-index: 999;
        overflow: hidden;
        border: 1px solid #eee;
        height: 460px;
        margin-top: -19px;
    }

    .picZoomer-cursor {
        display: none;
        cursor: crosshair;
        width: 100px;
        height: 100px;
        position: absolute;
        top: 0;
        left: 0;
        border-radius: 50%;
        border: 1px solid #eee;
        background-color: rgba(0, 0, 0, .1);
    }

    .picZoomCursor-ico {
        width: 23px;
        height: 23px;
        position: absolute;
        top: 40px;
        left: 40px;
        background: url(images/zoom-ico.png) left top no-repeat;
    }

    .my_img {
        vertical-align: middle;
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto;
        height: 100%;
    }

    .piclist li {
        display: inline-block;
        width: 90px;
        height: 114px;
        border: 1px solid #eee;
    }

    .piclist li img {
        width: 97%;
        height: auto;
    }

    /* custom style */
    .picZoomer-pic-wp,
    .picZoomer-zoom-wp {
        border: 1px solid #eee;
    }



    .section-bg {
        /* background-color: #ffffff; */
    }

    section {
        padding: 60px 0;
    }

    .row-sm .col-md-6 {
        padding-left: 5px;
        padding-right: 5px;
    }

    /*===pic-Zoom===*/
    ._boxzoom .zoom-thumb {
        /* width: 90px; */
        display: inline;
        /* vertical-align: top; */
        margin-top: 0px;
    }

    ._boxzoom .zoom-thumb ul.piclist {
        padding-left: 0px;
        top: 0px;
    }

    ._boxzoom ._product-images {
        width: 80%;
        display: inline;
    }

    ._boxzoom ._product-images .picZoomer {
        width: 100%;
    }

    ._boxzoom ._product-images .picZoomer .picZoomer-pic-wp img {
        left: 0px;
    }

    ._boxzoom ._product-images .picZoomer img.my_img {
        width: 100%;
    }

    .piclist li img {
        height: 100px;
        object-fit: cover;
    }

    /*======products-details=====*/
    ._product-detail-content {
        background: #fff;
        padding: 15px;
        border: 1px solid lightgray;
    }

    ._product-detail-content p._p-name {
        /* color: black; */
        font-size: 20px;
        border-bottom: 1px solid lightgray;
        padding-bottom: 12px;
    }

    .p-list span {
        margin-right: 15px;
    }

    .p-list span.price {
        font-size: 25px;
        /* color: #318234; */
    }

    ._p-qty>span {
        /* color: black; */
        margin-right: 15px;
        font-weight: 500;
    }

    ._p-qty .value-button {
        display: inline-flex;
        border: 0px solid #ddd;
        margin: 0px;
        width: 30px;
        height: 35px;
        justify-content: center;
        align-items: center;
        background: #fd7f34;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: #fff;
    }

    ._p-qty .value-button {
        border: 0px solid #fe0000;
        height: 35px;
        font-size: 20px;
        font-weight: bold;
    }

    ._p-qty input#number {
        text-align: center;
        border: none;
        border-top: 1px solid #fe0000;
        border-bottom: 1px solid #fe0000;
        margin: 0px;
        width: 50px;
        height: 35px;
        font-size: 14px;
        box-sizing: border-box;
    }
    ._p-qty input#rent_duration {
        text-align: center;
        border: none;
        border-top: 1px solid #fe0000;
        border-bottom: 1px solid #fe0000;
        margin: 0px;
        width: 50px;
        height: 35px;
        font-size: 14px;
        box-sizing: border-box;
    }

    ._p-add-cart {
        margin-left: 0px;
        margin-bottom: 15px;
    }

    .p-list {
        margin-bottom: 10px;
    }

    ._p-features>span {
        display: block;
        font-size: 16px;
        /* color: #000; */
        font-weight: 500;
    }

    ._p-add-cart .buy-btn {
        background-color: #fd7f34;
        color: #fff;
    }

    ._p-add-cart .btn {
        text-transform: capitalize;
        padding: 6px 20px;
        /* width: 200px; */
        border-radius: 52px;
    }

    ._p-add-cart .btn {
        margin: 0px 8px;
    }

    /*=========Recent-post==========*/
    .title_bx h3.title {
        font-size: 22px;
        text-transform: capitalize;
        position: relative;
        /* color: #fd7f34; */
        font-weight: 700;
        line-height: 1.2em;
    }

    .title_bx h3.title:before {
        content: "";
        height: 2px;
        width: 20%;
        position: absolute;
        left: 0px;
        z-index: 1;
        top: 40px;
        background-color: #fd7f34;
    }

    .title_bx h3.title:after {
        content: "";
        height: 2px;
        width: 100%;
        position: absolute;
        left: 0px;
        top: 40px;
        background-color: #ffc107;
    }

    .common_wd .owl-nav .owl-prev,
    .common_wd .owl-nav .owl-next {
        background-color: #fd7f34 !important;
        display: block;
        height: 30px;
        width: 30px;
        text-align: center;
        border-radius: 0px !important;
    }

    .owl-nav .owl-next {
        right: -10px;
    }

    .owl-nav .owl-prev,
    .owl-nav .owl-next {
        top: 50%;
        position: absolute;
    }

    .common_wd .owl-nav .owl-prev i,
    .common_wd .owl-nav .owl-next i {
        /* color: #fff; */
        font-size: 14px !important;
        position: relative;
        top: -1px;
    }

    .common_wd .owl-nav {
        position: absolute;
        top: -21%;
        right: 4px;
        width: 65px;
    }

    .owl-nav .owl-prev i,
    .owl-nav .owl-next i {
        left: 0px;
    }

    ._p-qty .decrease_ {
        position: relative;
        right: -5px;
        top: 3px;
    }

    ._p-qty .increase_ {
        position: relative;
        top: 3px;
        left: -5px;
    }

    /*========box========*/
    .sq_box {
        padding-bottom: 5px;
        border-bottom: solid 2px #fd7f34;
        /* background-color: #fff; */
        text-align: center;
        padding: 15px 10px;
        margin-bottom: 20px;
        border-radius: 4px;
    }

    .item .sq_box span.wishlist {
        right: 5px !important;
    }

    .sq_box span.wishlist {
        position: absolute;
        top: 10px;
        right: 20px;
    }

    .sq_box span {
        font-size: 14px;
        font-weight: 600;
        margin: 0px 10px;
    }

    .sq_box span.wishlist i {
        /* color: #adb5bd; */
        font-size: 20px;
    }

    .sq_box h4 {
        font-size: 18px;
        text-align: center;
        font-weight: 500;
        /* color: #343a40; */
        margin-top: 10px;
        margin-bottom: 10px !important;
    }

    .sq_box .price-box {
        margin-bottom: 15px !important;
    }

    .sq_box .btn {
        border-radius: 50px;
        padding: 5px 13px;
        font-size: 15px;
        /* color: #fff; */
        background-color: #fd7f34;
        font-weight: 600;
    }

    .sq_box .price-box span.price {
        text-decoration: line-through;
        /* color: #6c757d; */
    }

    .sq_box span {
        font-size: 14px;
        font-weight: 600;
        margin: 0px 10px;
    }

    .sq_box .price-box span.offer-price {
        color: #28a745;
    }

    .sq_box img {
        object-fit: cover;
        height: 150px !important;
        margin-top: 20px;
    }

    .sq_box span.wishlist i:hover {
        color: #fd7f34;
    }
</style>
<div style="margin-top:60px; margin-bottom:60px;">&nbsp;</div>
<section id="services" class="container section-bg p-5 m-5">
    <div class="container-fluid">
        <div id="alertCart"></div>

        <div class="row row-sm">
            <div class="col-md-6 _boxzoom">

                <div class="_product-images">
                    <div class="picZoomer">
                        <img class="my_img" src="{{ asset('storage/products/' . $product['image']) }}" alt="">
                    </div>
                </div>
                <div class="zoom-thumb">
                    <ul class="piclist">
                        @if ($images)
                            @foreach ($images as $pic)
                                <li><img src="{{ asset('storage/products/' . $pic) }}" alt=""></li>
                            @endforeach
                        @endif
                        {{-- end --}}
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="_product-detail-content">
                    <p class="_p-name"> {{ $product->name }} </p>
                    <small class="light-text">{{ $product->details }}</small>
                    <span class="badge badge-success" style="font-size: 1em">{{ $stockLevel }}</span>
                    <div class="_p-price-box">
                        <div class="p-list">
                            {{-- <span> M.R.P. : <i class="fa fa-inr"></i> <del> 1399 </del> </span> --}}
                            <span class="price"> {{ format($product->rent_price) }}</span>
                        </div>
                        <div class="_p-add-cart">
                            <div class="_p-qty">
                                <span>Add Quantity</span>
                                <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                                <input type="number" name="quantity" id="number" value="1" />
                                <div class="value-button increase_" id="" value="Increase Value">+</div>
                            </div>
                        </div>
                        <div class="_p-add-cart">
                            <div class="_p-qty">
                                <span>Add Number of Days</span>
                                <div class="value-button decrease_R" id="" value="Decrease Value">-</div>
                                <input type="number" name="rent_duration" id="rent_duration" value="1" />
                                <div class="value-button increase_R" id="" value="Increase Value">+</div>
                            </div>
                        </div>
                        <div class="_p-features">
                            <span> Description About this product:- </span>
                            <p class="light-text">{!! $product->description !!}</p>

                        </div>
                        {{-- <form action="{{route('add.to.cart')}}" method="post" accept-charset="utf-8">
                            @csrf
                            <ul class="spe_ul"></ul>
                            <div class="_p-qty-and-cart">
                                <div class="_p-add-cart">
                                    <button class="btn-theme btn buy-btn" tabindex="0">
                                        <i class="fa fa-shopping-cart"></i> Rent Now
                                    </button>
                                    @php
                                        checkSaleStatus($product->sales_status);
                                    @endphp
                                    <input type="hidden" name="id" value="13" />
                                    <input type="hidden" name="quantity" value="2" />
                                    <input type="hidden" name="rent_duration" value="2" />
                                    <button class="btn-theme btn btn-success add-to-cart" tabindex="0" type="submit" >
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button> --}}
                                    {{-- <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> --}}
                                    
                                {{-- </div>
                            </div>
                        </form> --}}
                        <form action="" method="post" accept-charset="utf-8">
                            
                            <ul class="spe_ul"></ul>
                            <div class="_p-qty-and-cart">
                                <div class="_p-add-cart">
                                    <button class="btn-theme btn buy-btn" tabindex="0">
                                        <i class="fa fa-shopping-cart"></i> Rent Now
                                    </button>
                                    @php
                                        checkSaleStatus($product->sales_status);
                                    @endphp
                                    <button class="btn-theme btn btn-success add-to-cart" tabindex="0" type="button"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        data-price="{{ $product->rent_price }}"
                                        data-slug="{{ $product->slug }}"
                                        data-image="{{$product->image}}"
                                        data-category="{{ $product->category->name }}"
                                        
                                        >
                                        <i class="fa fa-shopping-cart"></i> Add to Cart
                                    </button>
                                    {{-- <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> --}}
                                    <input type="hidden" name="pid" value="18" />
                                    <input type="hidden" name="price" value="850" />
                                    <input type="hidden" name="url" value="" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- @php
        Session::flush('cart');
    @endphp --}}
<section class="sec">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 title_bx">
                <h3 class="title"> You might also like </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 list-slider mt-4">
                <div class="owl-carousel common_wd  owl-theme" id="recent_post">
                    @if ($mightLike)
                        @foreach ($mightLike as $mightLikes)
                            <div class="item">
                                <div class="sq_box shadow">
                                    <div class="pdis_img">
                                        {{-- <span class="wishlist">
                                <a alt="Add to Wish List" title="Add to Wish List" href="javascript:void(0);"> <i
                                        class="fa fa-heart"></i></a>
                            </span> --}}
                                        <a href="{{ route('shop.show', $mightLikes->slug) }}">
                                            <img src="{{ asset('storage/products/' . $mightLikes['image']) }}">
                                        </a>
                                    </div>
                                    <h4 class="mb-1"> <a href="{{ route('shop.show', $mightLikes->slug) }}">
                                            {{ $mightLikes['name'] }} </a> </h4>
                                    <div class="price-box mb-2">
                                        <h6 class="offer-price">Rent Price: {{ format($mightLikes['rent_price']) }}
                                        </h6>
                                        <h6>Sales Price</h6>
                                        <span class="price"> {{ format($mightLikes['sales_price']) }} </span>
                                        <span class="offer-price"> {{ format($mightLikes['discount_price']) }} </span>
                                    </div>
                                    <div class="btn-box text-center">
                                        <a class="btn btn-sm" href="javascript:void(0);"> <i
                                                class="fa fa-shopping-cart"></i>
                                            Add to Cart </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    @endif


                </div>
            </div>
        </div>
    </div>
</section>






@include('front.template.footerP')
