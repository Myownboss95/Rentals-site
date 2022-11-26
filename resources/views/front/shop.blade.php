@include('front.template.header2')


<!-- Start Shop Area -->
<section class="blog-area ptb-70 pt-0" style="margin-top: 200px">
    <div class="container">
        <div class="section-title">
            <h2>Rentables</h2>
            <div class="bar"></div>
            <p>Check out our list and make your orders</p>
        </div>
<div class="row">
    <div class="col-md-9">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="blog-image">
                            <a href="{{ route('shop.show', $product->slug) }}">
                                <img src="{{ asset('storage/products/' . $product['image']) }}" class="img-fluid"
                                    alt="image">
                            </a>

                            <div class="date">
                                <i class="far fa-calendar-alt"></i> {{ format($product['rent_price']) }} per
                                {{ $product['max_rent_duration'] }} Days
                            </div>
                        </div>

                        <div class="blog-post-content">
                            <h3><a href="{{ route('shop.show', $product->slug) }}">{{ $product['name'] }}</a></h3>

                            <span>Category | <a href="#">{{ $product->category->name }}</a></span>

                            <p>@limitDetails($product['description'])</p>

                            <a href="{{ route('shop.show', $product->slug) }}" class="read-more-btn">Rent Now <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <aside class="widget-area" id="secondary">
                <section class="widget widget_search">
                    <form class="search-form">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search...">
                        </label>
                        <button type="submit"><i class="fas fa-search"></i></button>
                    </form>
                </section>
                <form class="ctp-banner-form">
                    <div class="form-header">
                        <span>Categories</span>
                        
                    </div>
                    <div class="form-content">
                       
                            
                                @if ($categories)
                                    @foreach ( $categories as $category )
                                        {{-- <li><a href="{{ route('shop.index', ['category' => $category->slug]) }}">{{$category->name}}</a></li>  --}}
                                 <a  class="categories" href="{{ route('shop.index', ['category' => $category->slug]) }}">
                                        <div class="features-box" style="padding:6px"> 
                                            {{-- <div class="icon">
                                                <i class="flaticon-settings"></i>
                                            </div> --}}
            
                                            <h5>{{$category->name}}</h5>
                                        </div>
                                    </a>
                                    @endforeach
                                    
                                    
                                @endif
                    </div>
                        
                </form>
                </aside>
            </div>
        </div>
        
    </div>
    </div>
        <div class="d-flex justify-content-center">
           {!! $products->links() !!}
        </div>
        
    </div>
</section>
<!-- End Shop Area -->

@include('front.template.footer')