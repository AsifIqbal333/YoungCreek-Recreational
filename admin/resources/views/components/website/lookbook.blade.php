@props(['deal', 'cartTotal' => 0])

<section class="flat-spacing-2 pt-0">
    <div class="container">
        <div class="row flat-with-text-lookbook wrap-lookbook-hover align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="banner-img">
                    <img class="lazyload" data-src="{{ asset($deal->image) }}" src="{{ asset($deal->image) }}"
                        alt="banner">
                    {{-- @foreach ($deal->products as $item)
                        @php
                            $iteration = $loop->iteration;
                            $image = $item->product->images->first()
                                ? $item->product->image
                                : asset('theme/images/gallery/lookbook-3.jpg');
                            $viewLink = route('products.show', [
                                'type' => $item->product->type,
                                'slug' => $item->product->slug,
                            ]);
                        @endphp
                        <div class="tf-pin-btn pin-{{ $iteration }} bundle-pin-item swiper-button"
                            data-slide="{{ $loop->index }}" id="pin{{ $iteration }}">
                            <span>{{ $iteration }}</span>

                            <div class="loobook-product-wrap">
                                <div class="loobook-product">
                                    <div class="img-style">
                                        <img src="{{ $image }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <div class="info">
                                            <a href="{{ $viewLink }}"
                                                class="text-title text-line-clamp-1 link">{{ $item->product->name }}</a>
                                            <div class="price text-button">${{ number_format($item->product->price) }}
                                            </div>
                                        </div>
                                        <a href="#shoppingCart" data-bs-toggle="modal" class="btn-lookbook btn-line">Add
                                            to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}
                    {{-- <div class="tf-pin-btn pin-1 bundle-pin-item swiper-button" data-slide="0" id="pin1">
                        <span>1</span>

                        <div class="loobook-product-wrap">
                            <div class="loobook-product">
                                <div class="img-style">
                                    <img src="{{ asset('theme/images/gallery/lookbook-3.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <a href="product-detail.html" class="text-title text-line-clamp-1 link">Double
                                            Standing Desk</a>
                                        <div class="price text-button">$69.99</div>
                                    </div>
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-lookbook btn-line">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-pin-btn pin-2 bundle-pin-item swiper-button" data-slide="1" id="pin2">
                        <span>2</span>

                        <div class="loobook-product-wrap">
                            <div class="loobook-product">
                                <div class="img-style">
                                    <img src="{{ asset('theme/images/gallery/lookbook-1.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <a href="product-detail.html"
                                            class="text-title text-line-clamp-1 link">Ergonomic Headrest</a>
                                        <div class="price text-button">$69.99</div>
                                    </div>
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-lookbook btn-line">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-pin-btn pin-3 bundle-pin-item swiper-button" data-slide="2" id="pin3">
                        <span>3</span>

                        <div class="loobook-product-wrap">
                            <div class="loobook-product">
                                <div class="img-style">
                                    <img src="{{ asset('theme/images/gallery/lookbook-2.jpg') }}" alt="img">
                                </div>
                                <div class="content">
                                    <div class="info">
                                        <a href="product-detail.html" class="text-title text-line-clamp-1 link">Double
                                            Standing Desk</a>
                                        <div class="price text-button">$69.99</div>
                                    </div>
                                    <a href="#shoppingCart" data-bs-toggle="modal" class="btn-lookbook btn-line">Add
                                        to cart</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="lookbook-content">
                    <div class="box-title">
                        <h3 class="title wow fadeInUp">{{ $deal->name }}</h3>
                        <p class="sub-desc text-secondary  wow fadeInUp" data-wow-delay="0.1s">{{ $deal->description }}
                        </p>
                    </div>
                    <div class="wrap-cart-item bundle-hover-wrap mb_40">
                        @foreach ($deal->products as $item)
                            @php
                                $iteration = $loop->iteration;
                                $image = $item->product->images->first()
                                    ? $item->product->image
                                    : asset('theme/images/shop/cart-item-1.jpg');
                                $product = $item->product->name;
                                $cartTotal += $item->product->price;
                            @endphp

                            <div class="cart-item bundle-hover-item pin">
                                <h6 class="number">
                                    {{ $iteration }}
                                </h6>
                                <div class="image-cart">
                                    <img src="{{ $image }}" alt="{{ $product }}">
                                </div>
                                <div class="info">
                                    <h6 class="name">
                                        <a href="product-detail.html" class="link">
                                            {{ $product }}
                                        </a>
                                    </h6>
                                    <h6 class="price">
                                        ${{ number_format($item->product->price) }}
                                    </h6>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="cart-item bundle-hover-item pin1">
                            <h6 class="number">
                                1
                            </h6>
                            <div class="image-cart">
                                <img src="{{ asset('theme/images/shop/cart-item-1.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <h6 class="name">
                                    <a href="product-detail.html" class="link">
                                        Ergonomic Chair Pro
                                    </a>
                                </h6>
                                <h6 class="price">
                                    $33.00
                                </h6>
                            </div>
                        </div>
                        <div class="cart-item bundle-hover-item pin2">
                            <h6 class="number">
                                2
                            </h6>
                            <div class="image-cart">
                                <img src="{{ asset('theme/images/shop/cart-item-2.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <h6 class="name">
                                    <a href="product-detail.html" class="link">
                                        Laptop Stand Office
                                    </a>
                                </h6>
                                <h6 class="price">
                                    $33.00
                                </h6>
                            </div>
                        </div>
                        <div class="cart-item bundle-hover-item pin3">
                            <h6 class="number">
                                3
                            </h6>
                            <div class="image-cart">
                                <img src="{{ asset('theme/images/shop/cart-item-3.jpg') }}" alt="">
                            </div>
                            <div class="info">
                                <h6 class="name">
                                    <a href="product-detail.html" class="link">
                                        Open Box Laptop Stand
                                    </a>
                                </h6>
                                <h6 class="price">
                                    $33.00
                                </h6>
                            </div>
                        </div> --}}
                    </div>
                    @php
                        $productIds = json_encode($item->pluck('product_id')->toArray());
                    @endphp
                    <div class="total-lb">
                        <button id="cartBtn" class="tf-btn btn-onsurface"
                            onclick="addDealToCart('{{ $productIds }}')">
                            <span>Add Set To Cart</span>
                            <div class="discount">
                                @php
                                    $upPrice = (discount_percentage() / 100) * $cartTotal + $cartTotal;
                                @endphp
                                <span class="text-button-small">${{ number_format($upPrice, 2) }}</span>
                                <span class="text-body-default">{{ number_format($cartTotal, 2) }}</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
