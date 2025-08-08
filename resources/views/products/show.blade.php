@extends('layouts.website')

@push('styles')
    <link rel="stylesheet" href="{{ asset('theme/css/drift-basic.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/photoswipe.css') }}">
@endpush
@section('title', $product->name)
<style>
    .ck-content {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #212529;
        font-size: 1rem;
    }

    .ck-content p {
        margin-bottom: 1rem;
    }

    .ck-content h3 {
        font-size: 1.25rem;
        margin-top: 2rem;
        margin-bottom: 1rem;
        font-weight: 600;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 0.5rem;
    }

    .ck-content ul {
        margin-bottom: 1rem;
        list-style-type: disc !important;
        list-style-position: inside !important;
        padding-left: 1.5rem !important;
    }

    .ck-content ul li {
        line-height: 1.5;
    }

    .ck-content ul ul {
        list-style-type: circle !important;
        padding-left: 1.25rem !important;
        margin-top: 0.5rem;
    }

    .ck-content li {
        margin-bottom: 0.5rem;
    }

    .ck-content ol {
        list-style-type: decimal !important;
        list-style-position: inside !important;
        padding-left: 1.5rem !important;
        margin-bottom: 1rem;
    }

    .ck-content li {
        margin-bottom: 0.5rem;
        display: list-item !important;
    }

    .ck-content strong {
        font-weight: 600;
    }
</style>
@php
    $description =
        str($product->description)->wordCount() <= 160
            ? $product->description
            : str($product->description)->substr(0, 160);
@endphp
{{-- @dd($product->description_html) --}}
@section('seo')
    <meta name="description" content="{{ $description }}" />
    <link rel="canonical" href="{{ request()->url() }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $product->name }} | YoungCreek Recreational, LLC" />
    <meta property="og:description" content="{{ $description }}}}" />
    <meta property="og:url" content="{{ request()->url() }}" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta name="twitter:card" content="summary_large_image" />
@endsection

@section('content')
    <!-- .tf-breadcrumb -->
    <div class="tf-breadcrumb">
        <div class="container">
            <div class="tf-breadcrumb-wrap">
                <div class="tf-breadcrumb-list">
                    <a href="{{ route('homepage') }}" class="text text-caption-1">Home</a>
                    <i class="icon icon-right"></i>
                    <a href="{{ route('products') }}" class="text text-caption-1">Products</a>
                    <i class="icon icon-right"></i>
                    <a href="{{ route('categories.show', $product->type) }}"
                        class="text text-caption-1">{{ $category['title'] }}</a>
                    <i class="icon icon-right"></i>
                    <a href="{{ route('products.index', ['type' => $product->type, 'category' => $product->category]) }}"
                        class="text text-caption-1">{{ $categoryItem['title'] }}</a>
                    <i class="icon icon-right"></i>
                    <span class="text_secondary2 text-caption-1">{{ $product->name }}</span>
                </div>
            </div>
        </div>
    </div><!-- /.tf-breadcrumb -->

    @php
        $hasImages = $product->images->count() > 0;
        $firstImage = $hasImages ? product_image($product->category, $product->images->first()?->image) : null;
        $originalPrice = $product->price;
        $discountPercentage = discount_percentage();
        $upPrice = $originalPrice + $originalPrice * ($discountPercentage / 100); // 10% higher
        $viewLink = route('products.show', ['type' => $product->type, 'slug' => $product->slug]);
    @endphp

    <!-- Section product -->
    <section class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="tf-product-media-wrap sticky-top thumbs-bottom">
                        <div class="thumbs-slider gap-17">
                            <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom"
                                data-direction="horizontal">
                                <div class="swiper-wrapper stagger-wrap">
                                    @if ($hasImages)
                                        @foreach ($product->images as $item)
                                            @php
                                                $image = product_image($product->category, $item->image, 615);
                                                $srcset = image_srcset($product->category, $item->image);
                                                $color = 'Custom';
                                            @endphp
                                            <div class="swiper-slide stagger-item" data-color="{{ $color }}">
                                                <div class="item">
                                                    <img class="lazyload" data-src="{{ $image }}"
                                                        src="{{ $image }}" srcset="{{ $srcset }}"
                                                        alt="product image">
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide stagger-item" data-color="Custom">
                                            <div class="item">
                                                <img class="lazyload"
                                                    data-src="{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    src="{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    alt="product image">
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                <div class="swiper-wrapper">
                                    @if ($hasImages)
                                        @foreach ($product->images as $item)
                                            @php
                                                $image = product_image($product->category, $item->image, 615);
                                                $srcset = image_srcset($product->category, $item->image);
                                                $color = 'Custom';
                                            @endphp
                                            <div class="swiper-slide" data-color="{{ $color }}">
                                                <a href="{{ $image }}" target="_blank" class="item"
                                                    data-pswp-width="600px" data-pswp-height="600px">
                                                    <img class="tf-image-zoom lazyload" data-zoom="{{ $image }}"
                                                        data-src="{{ $image }}" src="{{ $image }}"
                                                        alt="product image" srcset="{{ $srcset }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="swiper-slide" data-color="Custom">
                                            <a href="{{ asset('theme/images/shop/product-1.jpg') }}" target="_blank"
                                                class="item" data-pswp-width="600px" data-pswp-height="600px">
                                                <img class="tf-image-zoom lazyload"
                                                    data-zoom=""{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    data-src=""{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    src=""{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    alt="product image">
                                            </a>
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="sticky-top">
                        <div class="tf-product-info-wrap position-relative">
                            <div class="tf-zoom-main"></div>
                            <div class="tf-product-info-list other-image-zoom">
                                <div class="tf-product-info-heading">
                                    <div class="tf-product-info-name">
                                        <h3 class="name">{{ $product->name }}</h3>
                                        <div class="sub">
                                            <div class="tf-product-tag text-caption-1">
                                                Best Seller
                                            </div>
                                            <div class="tf-product-info-rate">
                                                <div class="list-star-default">
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                </div>
                                                <div class="text text-caption-1">(134 reviews)</div>
                                            </div>
                                            <div class="tf-product-info-sold">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.7076 9.80077L7.95759 19.1758C7.86487 19.2747 7.74247 19.3408 7.60888 19.3641C7.47528 19.3874 7.33773 19.3666 7.21699 19.3049C7.09625 19.2432 6.99886 19.1438 6.93953 19.0219C6.88019 18.8999 6.86213 18.762 6.88806 18.6289L8.03338 12.9L3.53103 11.2094C3.43434 11.1732 3.34811 11.1136 3.28005 11.036C3.21199 10.9584 3.16422 10.8651 3.14101 10.7645C3.11779 10.6639 3.11986 10.5591 3.14702 10.4595C3.17418 10.3599 3.22559 10.2686 3.29666 10.1937L12.0467 0.818744C12.1394 0.719788 12.2618 0.653675 12.3954 0.630383C12.529 0.60709 12.6665 0.627882 12.7873 0.68962C12.908 0.751359 13.0054 0.850694 13.0647 0.972636C13.1241 1.09458 13.1421 1.23251 13.1162 1.36562L11.9677 7.10077L16.4701 8.78906C16.5661 8.82547 16.6516 8.88496 16.7191 8.96228C16.7867 9.0396 16.8341 9.13236 16.8573 9.23237C16.8805 9.33237 16.8786 9.43655 16.852 9.53569C16.8253 9.63482 16.7747 9.72587 16.7045 9.80077H16.7076Z"
                                                        fill="#DC9056" />
                                                </svg>

                                                <div class="text text-caption-1">18 sold in last 32 hours</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-info-desc">
                                        <div class="tf-product-info-price">
                                            <h5 class="price-on-sale">${{ $originalPrice }}</h5>
                                            <div class="compare-at-price">${{ $upPrice }}</div>
                                            <div class="badges-on-sale text-btn-uppercase">-{{ $discountPercentage }}%
                                            </div>
                                        </div>
                                        <p>{!! $description !!}</p>
                                        <div class="tf-product-info-liveview">
                                            <i class="icon icon-eye"></i>
                                            <p class="text-caption-1">
                                                <span class="liveview-count">{{ fake()->numberBetween(20, 50) }}</span>
                                                people are viewing this right now
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('add-to-cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                                    <div class="tf-product-info-choose-option gap-19">
                                        <div class="variant-picker-item">
                                            <div class="variant-picker-label mb_12">
                                                Colors:<span
                                                    class="text-title variant-picker-label-value value-currentColor">Custom</span>
                                            </div>
                                            <div class="variant-picker-values">
                                                <input id="values-custom" type="radio" name="color" value="custom"
                                                    checked>
                                                <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                                    for="values-custom" data-value="Custom" data-color="Custom">
                                                    <span class="btn-checkbox bg-secondary"></span>
                                                    <span class="tooltip">Custom</span>
                                                </label>
                                                <input id="values-primary" type="radio" name="color"
                                                    value="primary">
                                                <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                                    data-price="{{ $originalPrice }}" for="values-primary"
                                                    data-value="Primary" data-color="Primary">
                                                    <span class="btn-checkbox bg-primary"></span>
                                                    <span class="tooltip">Primary</span>
                                                </label>
                                                <input id="values-natural" type="radio" name="color"
                                                    value="natural">
                                                <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                                    data-price="{{ $originalPrice }}" for="values-natural"
                                                    data-value="Natural" data-color="Natural">
                                                    <span class="btn-checkbox bg-success"></span>
                                                    <span class="tooltip">Natural</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="tf-product-info-quantity">
                                            <div class="title mb_12">Quantity:</div>
                                            <div class="wg-quantity">
                                                <span class="btn-quantity btn-decrease">-</span>
                                                <input class="quantity-product" type="text" name="quantity"
                                                    value="1">
                                                <span class="btn-quantity btn-increase">+</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="tf-product-info-by-btn mb_12">
                                                <button type="submit"
                                                    class="tf-btn btn-onsurface flex-grow-1  show-shopping-cart">
                                                    <span>Add to cart</span>
                                                    {{-- <span>Add to cart -&nbsp;</span>
                                                    <span class="tf-qty-price total-price">${{ $originalPrice }}</span> --}}
                                                </button>
                                                <x-add-to-wishlist :productId="$product->id"
                                                    class="hover-tooltip text-caption-2" />
                                            </div>
                                            {{-- <a href="#" class="tf-btn btn-primary w-full">Buy it now</a> --}}
                                        </div>

                                        <div class="tf-product-info-help gap-12">
                                            <div class="wrap">
                                                <div class="dropdown dropdown-store-location">
                                                    <div class="dropdown-title dropdown-backdrop"
                                                        data-bs-toggle="dropdown" aria-haspopup="true">
                                                        <div class="tf-product-info-view link">
                                                            <span>View Store Information</span>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <div class="dropdown-content">
                                                            <div class="dropdown-content-heading">
                                                                <h5>Store Location</h5>
                                                                <i class="icon icon-close"></i>
                                                            </div>
                                                            <div class="line-bt"></div>
                                                            <div>
                                                                <h6>Fashion GearO</h6>
                                                                <p>Pickup available. Usually ready in 24 hours</p>
                                                            </div>
                                                            <div>
                                                                <p>766 Rosalinda Forges Suite 044,</p>
                                                                <p>Gracielahaven, Oregon</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tf-product-info-time">
                                                <div class="icon">
                                                    <i class="icon-time"></i>
                                                </div>
                                                <p class="text-caption-1">Estimated Delivery:&nbsp;&nbsp;<span>12-26
                                                        days</span> (International), <span>3-6 days</span> (United
                                                    States)
                                                </p>
                                            </div>
                                            <div class="tf-product-info-return">
                                                <div class="icon">
                                                    <i class="icon-arrowclockwise"></i>
                                                </div>
                                                <p class="text-caption-1">Return within <span>45 days</span> of
                                                    purchase.
                                                    Duties &amp; taxes are non-refundable.</p>
                                            </div>
                                            <div class="tf-product-info-extra-link">
                                                <a href="#delivery_return" data-bs-toggle="modal"
                                                    class="tf-product-extra-icon">
                                                    <div class="icon">
                                                        <i class="icon-shipping"></i>
                                                    </div>
                                                    <p class="text-caption-1">Delivery &amp; Return</p>
                                                </a>
                                                <a href="{{ route('contacts.index') }}" data-bs-toggle="modal"
                                                    class="tf-product-extra-icon">
                                                    <div class="icon">
                                                        <i class="icon-question"></i>
                                                    </div>
                                                    <p class="text-caption-1">Ask A Question</p>
                                                </a>
                                                <a href="#share_social" data-bs-toggle="modal"
                                                    class="tf-product-extra-icon">
                                                    <div class="icon">
                                                        <i class="icon-share"></i>
                                                    </div>
                                                    <p class="text-caption-1">Share</p>
                                                </a>
                                            </div>
                                        </div>
                                        <ul class="tf-product-info-sku">
                                            <li>
                                                <p class="text-caption-1">SKU:</p>
                                                <p class="text-caption-1 text-1">{{ $product->sku }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Quick Ship Item:</p>
                                                <p class="text-caption-1 text-1">{{ $product->quick_ship_item }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Lead Times:</p>
                                                <p class="text-caption-1 text-1">{{ $product->lead_time }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Age Group:</p>
                                                <p class="text-caption-1 text-1">{{ $product->age_group }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Safety Area:</p>
                                                <p class="text-caption-1 text-1">{{ $product->length }}&#039; x
                                                    {{ $product->width }}&#039;</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Play Capacity:</p>
                                                <p class="text-caption-1 text-1">{{ $product->capacity }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Playground Series:</p>
                                                <p class="text-caption-1 text-1">{{ $product->playground_series }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Recycled Content:</p>
                                                <p class="text-caption-1 text-1">{{ $product->recycled_content }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Materials:</p>
                                                <p class="text-caption-1 text-1">{{ $product->materials }}</p>
                                            </li>
                                            <li>
                                                <p class="text-caption-1">Dimensions:</p>
                                                <p class="text-caption-1 text-1">{{ $product->dimensions ?? '-' }}</p>
                                            </li>
                                        </ul>
                                        <div class="tf-product-info-guranteed">
                                            <div class="text-title">
                                                Guranteed safe checkout:
                                            </div>
                                            @include('partials.payment-methods')
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="tf-sticky-btn-atc">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form class="form-sticky-atc">
                            <div class="tf-sticky-atc-product">
                                <div class="image">
                                    <img class="lazyload"
                                        data-src="{{ $hasImages ? $firstImage : asset('theme/images/shop/product-1.jpg') }}"
                                        alt="product image"
                                        src="{{ $hasImages ? $firstImage : asset('theme/images/shop/product-1.jpg') }}">
                                </div>
                                <div class="content">
                                    <div class="text-title">
                                        {{ $product->name }}
                                    </div>
                                    <div class="text-title">${{ $originalPrice }}</div>
                                </div>
                            </div>
                            <form action="{{ route('add-to-cart') }}" method="post">
                                @csrf
                                <div class="tf-sticky-atc-infos">
                                    <div class="tf-sticky-atc-size d-flex gap-12 align-items-center">
                                        <div class="tf-sticky-atc-infos-title text-title">Color:</div>
                                        <div class="tf-dropdown-sort style-2" data-bs-toggle="dropdown">
                                            <div class="btn-select">
                                                <span class="text-sort-value font-2">Custom</span>
                                                <span class="icon icon-down"></span>
                                            </div>
                                            <div class="dropdown-menu">
                                                <div class="select-item">
                                                    <span class="text-value-item">Custom</span>
                                                </div>
                                                <div class="select-item">
                                                    <span class="text-value-item">Primary</span>
                                                </div>
                                                <div class="select-item active">
                                                    <span class="text-value-item">Natural</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-sticky-atc-quantity d-flex gap-12 align-items-center">
                                        <div class="tf-sticky-atc-infos-title text-title">Quantity:</div>
                                        <div class="wg-quantity style-1">
                                            <span class="btn-quantity minus-btn">-</span>
                                            <input type="text" name="quantity" value="1">
                                            <span class="btn-quantity plus-btn">+</span>
                                        </div>
                                    </div>
                                    <div class="tf-sticky-atc-btns">
                                        <a class="tf-btn btn-onsurface w-100 radius-4 btn-add-to-cart"><span
                                                class="text text-btn-uppercase">Add To Cart</span></a>
                                    </div>
                                </div>
                            </form>

                        </form>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- /Section product -->

    <section class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="widget-tabs style-1">
                        <ul class="widget-menu-tab">
                            <li class="item-title active">
                                <span class="inner">Description</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Customer Reviews</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Shipping & Returns</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Return Policies</span>
                            </li>
                        </ul>
                        <div class="widget-content-tab">
                            <div class="widget-content-inner active">
                                <div class="tab-description">
                                    <div>
                                        <h6 class="mb_12">Product Features</h6>
                                        <div class="ck-content">
                                            {!! $product->description_html !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-inner">
                                <div class="tab-reviews  write-cancel-review-wrap">
                                    <div class="tab-reviews-heading">
                                        <div class="top">
                                            <div class="text-center">
                                                <div class="number text-display">4.9</div>
                                                <div class="list-star">
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                    <i class="icon icon-star"></i>
                                                </div>
                                                <p>(168 Ratings)</p>
                                            </div>
                                            <div class="rating-score">
                                                <div class="item">
                                                    <div class="number-1 text-caption-1">5</div>
                                                    <i class="icon icon-star"></i>
                                                    <div class="line-bg">
                                                        <div style="width: 94.67%;"></div>
                                                    </div>
                                                    <div class="number-2 text-caption-1">59</div>
                                                </div>
                                                <div class="item">
                                                    <div class="number-1 text-caption-1">4</div>
                                                    <i class="icon icon-star"></i>
                                                    <div class="line-bg">
                                                        <div style="width: 60%;"></div>
                                                    </div>
                                                    <div class="number-2 text-caption-1">46</div>
                                                </div>
                                                <div class="item">
                                                    <div class="number-1 text-caption-1">3</div>
                                                    <i class="icon icon-star"></i>
                                                    <div class="line-bg">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <div class="number-2 text-caption-1">0</div>
                                                </div>
                                                <div class="item">
                                                    <div class="number-1 text-caption-1">2</div>
                                                    <i class="icon icon-star"></i>
                                                    <div class="line-bg">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <div class="number-2 text-caption-1">0</div>
                                                </div>
                                                <div class="item">
                                                    <div class="number-1 text-caption-1">1</div>
                                                    <i class="icon icon-star"></i>
                                                    <div class="line-bg">
                                                        <div style="width: 0%;"></div>
                                                    </div>
                                                    <div class="number-2 text-caption-1">0</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="tf-btn btn-white has-border radius-4 btn-comment-review btn-cancel-review">
                                                Cancel Review</div>
                                            <div
                                                class="tf-btn btn-white has-border radius-4 btn-comment-review btn-write-review">
                                                Write a review</div>
                                        </div>
                                    </div>
                                    <div class="reply-comment style-1 cancel-review-wrap">
                                        <div
                                            class="d-flex mb_24 gap-20 align-items-center justify-content-between flex-wrap">
                                            <h4 class="">03 Comments</h4>
                                            <div class="d-flex align-items-center gap-12">
                                                <div class="text-caption-1">Sort by:</div>
                                                <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                                                    <div class="btn-select">
                                                        <span class="text-sort-value">Most Recent</span>
                                                        <span class="icon icon-down"></span>
                                                    </div>
                                                    <div class="dropdown-menu">
                                                        <div class="select-item active">
                                                            <span class="text-value-item">Most Recent</span>
                                                        </div>
                                                        <div class="select-item">
                                                            <span class="text-value-item">Oldest</span>
                                                        </div>
                                                        <div class="select-item">
                                                            <span class="text-value-item">Most Popular</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reply-comment-wrap">
                                            <div class="reply-comment-item">
                                                <div class="user">
                                                    <div class="image">
                                                        <img src="images/avatar/user-default.jpg" alt="">
                                                    </div>
                                                    <div>
                                                        <h6>
                                                            <a href="#" class="link">Superb quality apparel that
                                                                exceeds expectations</a>
                                                        </h6>
                                                        <div class="day text-secondary-2 text-caption-1">1 days ago
                                                            &nbsp;&nbsp;&nbsp;-</div>
                                                    </div>
                                                </div>
                                                <p class="text-secondary">Great theme - we were looking for a theme
                                                    with lots of built in features and flexibility and this was
                                                    perfect. We expected to need to employ a developer to add a few
                                                    finishing touches. But we actually managed to do everything
                                                    ourselves. We did have one small query and the support given was
                                                    swift and helpful.</p>
                                            </div>
                                            <div class="reply-comment-item type-reply">
                                                <div class="user">
                                                    <div class="image">
                                                        <img src="images/avatar/admin-default.jpg" alt="">
                                                    </div>
                                                    <div>
                                                        <h6>
                                                            <a href="#" class="link">Reply from GearO</a>
                                                        </h6>
                                                        <div class="day text-secondary-2 text-caption-1">1 days ago
                                                            &nbsp;&nbsp;&nbsp;-</div>
                                                    </div>
                                                </div>
                                                <p class="text-secondary">We love to hear it! Part of what we love
                                                    most about GearO is how much it empowers store owners like
                                                    yourself to build a beautiful website without having to hire a
                                                    developer :) Thank you for this fantastic review!</p>
                                            </div>
                                            <div class="reply-comment-item">
                                                <div class="user">
                                                    <div class="image">
                                                        <img src="images/avatar/user-default.jpg" alt="">
                                                    </div>
                                                    <div>
                                                        <h6>
                                                            <a href="#" class="link">Superb quality apparel that
                                                                exceeds expectations</a>
                                                        </h6>
                                                        <div class="day text-secondary-2 text-caption-1">1 days ago
                                                            &nbsp;&nbsp;&nbsp;-</div>
                                                    </div>
                                                </div>
                                                <p class="text-secondary">Great theme - we were looking for a theme
                                                    with lots of built in features and flexibility and this was
                                                    perfect. We expected to need to employ a developer to add a few
                                                    finishing touches. But we actually managed to do everything
                                                    ourselves. We did have one small query and the support given was
                                                    swift and helpful.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="form-write-review write-review-wrap">
                                        <div class="heading">
                                            <h4>Write a review:</h4>
                                            <div class="list-rating-check">
                                                <input type="radio" id="star5" name="rate" value="5">
                                                <label for="star5" title="text"></label>
                                                <input type="radio" id="star4" name="rate" value="4">
                                                <label for="star4" title="text"></label>
                                                <input type="radio" id="star3" name="rate" value="3">
                                                <label for="star3" title="text"></label>
                                                <input type="radio" id="star2" name="rate" value="2">
                                                <label for="star2" title="text"></label>
                                                <input type="radio" id="star1" name="rate" value="1">
                                                <label for="star1" title="text"></label>
                                            </div>
                                        </div>
                                        <div class="mb_32">
                                            <div class="mb_8">Review Title</div>
                                            <fieldset class="mb_20">
                                                <input class="" type="text"
                                                    placeholder="Give your review a title" name="text" tabindex="2"
                                                    value="" aria-required="true" required="">
                                            </fieldset>
                                            <div class="mb_8">Review</div>
                                            <fieldset class="d-flex mb_20">
                                                <textarea class="" rows="4" placeholder="Write your comment here" tabindex="2" aria-required="true"
                                                    required=""></textarea>
                                            </fieldset>
                                            <div class="cols mb_20">
                                                <fieldset class="">
                                                    <input class="" type="text" placeholder="You Name (Public)"
                                                        name="text" tabindex="2" value=""
                                                        aria-required="true" required="">
                                                </fieldset>
                                                <fieldset class="">
                                                    <input class="" type="email"
                                                        placeholder="Your email (private)" name="email" tabindex="2"
                                                        value="" aria-required="true" required="">
                                                </fieldset>
                                            </div>
                                            <div class="d-flex align-items-center check-save gap-12">
                                                <input type="checkbox" name="availability" class="tf-check"
                                                    id="check1">
                                                <label class="text-secondary text-caption-1" for="check1">Save my
                                                    name, email, and website in this browser for the next time I
                                                    comment.</label>
                                            </div>
                                        </div>
                                        <div class="button-submit">
                                            <button class="tf-btn btn-onsurface radius-4" type="submit">Submit
                                                Reviews</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget-content-inner">
                                <div class="tab-shipping">
                                    <div class="w-100">
                                        <h6 class="text-btn-uppercase mb_12">We've got your back</h6>
                                        <p class="mb_12">One delivery fee to most locations (check our Orders &
                                            Delivery page)</p>
                                        <p class="">Free returns within 14 days (excludes final sale and
                                            made-to-order items, face masks and certain products containing
                                            hazardous or flammable materials, such as fragrances and aerosols)</p>
                                    </div>
                                    <div class="w-100">
                                        <h6 class="text-btn-uppercase mb_12">Import duties information</h6>
                                        <p>Let us handle the legwork. Delivery duties are included in the item price
                                            when shipping to all EU countries (excluding the Canary Islands), plus
                                            The United Kingdom, USA, Canada, China Mainland, Australia, New Zealand,
                                            Puerto Rico, Switzerland, Singapore, Republic Of Korea, Kuwait, Mexico,
                                            Qatar, India, Norway, Saudi Arabia, Taiwan Region, Thailand, U.A.E.,
                                            Japan, Brazil, Isle of Man, San Marino, Colombia, Chile, Argentina,
                                            Egypt, Lebanon, Hong Kong SAR, Bahrain and Turkey. All import duties are
                                            included in your order – the price you see is the price you pay.</p>
                                    </div>
                                    <div class="w-100">
                                        <h6 class="text-btn-uppercase mb_12">Estimated delivery</h6>
                                        <p class="mb_6 font-2">Express: May 10 - May 17</p>
                                        <p class="font-2">Sending from USA</p>
                                    </div>
                                    <div class="w-100">
                                        <h6 class="text-btn-uppercase mb_12">Need more information?</h6>
                                        <div>
                                            <a href="#"
                                                class="link text-secondary text-decoration-underline mb_6">Orders
                                                & delivery</a>
                                        </div>
                                        <div>
                                            <a href="#"
                                                class="link text-secondary text-decoration-underline mb_6">Returns
                                                & refunds</a>
                                        </div>
                                        <div>
                                            <a href="#" class="link text-secondary text-decoration-underline">Duties
                                                & taxes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content-inner">
                                <div class="tab-policies">
                                    <h6 class=" mb_12">Return Policies</h6>
                                    <p class="mb_12 text_secondary">At GearO, we stand behind the quality of our
                                        products. If you're not completely satisfied with your purchase, we offer
                                        hassle-free returns within 30 days of delivery.</p>
                                    <h6 class=" mb_12">Easy Exchanges or Refunds</h6>
                                    <ul class="list-text type-disc mb_12 gap-6">
                                        <li class="text_secondary">Exchange your item for a different size, color,
                                            or style, or receive a full refund.</li>
                                        <li class="text_secondary">All returned items must be unworn, in their
                                            original packaging, and with tags attached.</li>
                                    </ul>
                                    <h6 class=" mb_12">Simple Process</h6>
                                    <ul class="list-text type-number">
                                        <li class="text_secondary">Initiate your return online or contact our
                                            customer service team for assistance.</li>
                                        <li class="text_secondary">Pack your item securely and include the original
                                            packing slip.</li>
                                        <li class="text_secondary">Ship your return back to us using our prepaid
                                            shipping label.</li>
                                        <li class="text_secondary">Once received, your refund will be processed
                                            promptly.</li>
                                    </ul>
                                    <p class="text_secondary">For any questions or concerns regarding returns, don't
                                        hesitate to reach out to our dedicated customer service team. Your
                                        satisfaction is our priority.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    {{-- <section class="flat-spacing-7">
        <div class="container flat-animate-tab">
            <ul class="tab-product justify-content-center wow fadeInUp" data-wow-delay="0s" role="tablist">
                <li class="nav-tab-item" role="presentation">
                    <a href="#relatedProducts" class="active h4" data-bs-toggle="tab">Related Products</a>
                </li>
                <li class="nav-tab-item" role="presentation">
                    <a href="#recentlyViewed" class="h4" data-bs-toggle="tab">Recently Viewed</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="relatedProducts" role="tabpanel">
                    <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                        data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                        data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            @foreach ($suggestedProducts as $product)
                                <div class="swiper-slide">
                                    <div class="card-product style-1">
                                        <div class="card-product-wrapper">
                                            <a href="product-detail.html" class="image-wrap">
                                                <img class="lazyload img-product"
                                                    data-src="{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    src="{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    alt="image-product">
                                                <img class="lazyload img-hover"
                                                    data-src="{{ asset('theme/images/shop/product-1.1.jpg') }}"
                                                    src="{{ asset('theme/images/shop/product-1.1.jpg') }}"
                                                    alt="image-product">
                                            </a>
                                            <div class="list-product-btn">
                                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                    <span class="icon icon-heart"></span>
                                                    <span class="tooltip">Wishlist</span>
                                                </a>
                                                <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                                    class="box-icon compare ">
                                                    <span class="icon icon-compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview tf-btn-loading">
                                                    <span class="icon icon-eye"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </div>
                                            <div class="list-btn-main">
                                                <a href="#shoppingCart" data-bs-toggle="modal"
                                                    class="btn-main-product">Add
                                                    To
                                                    cart</a>
                                            </div>
                                        </div>
                                        <div class="card-product-info ">
                                            <a href="product-detail.html" class="title link line-clamp-1">Ergonomic
                                                Chair Pro</a>
                                            <div class="price text-body-default "><span
                                                    class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                            <ul class="list-color-product">
                                                <li class="list-color-item color-swatch active">
                                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                                    <span class="swatch-value bg-light-blue"></span>
                                                    <img class="lazyload" data-src="images/shop/product-1.2.jpg"
                                                        src="images/shop/product-1.2.jpg" alt="image-product">
                                                </li>
                                                <li class="list-color-item color-swatch">
                                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                                    <span class="swatch-value bg-light-blue-2"></span>
                                                    <img class="lazyload" data-src="images/shop/product-1.3.jpg"
                                                        src="images/shop/product-1.3.jpg" alt="image-product">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>
                <div class="tab-pane" id="recentlyViewed" role="tabpanel">
                    <div dir="ltr" class="swiper tf-sw-recent" data-preview="4" data-tablet="3" data-mobile="2"
                        data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                        data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            @foreach ($featuresProducts as $product)
                                <div class="swiper-slide">
                                    <div class="card-product style-1">
                                        <div class="card-product-wrapper">
                                            <a href="product-detail.html" class="image-wrap">
                                                <img class="lazyload img-product"
                                                    data-src="{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    src="{{ asset('theme/images/shop/product-1.jpg') }}"
                                                    alt="image-product">
                                                <img class="lazyload img-hover"
                                                    data-src="{{ asset('theme/images/shop/product-1.1.jpg') }}"
                                                    src="{{ asset('theme/images/shop/product-1.1.jpg') }}"
                                                    alt="image-product">
                                            </a>
                                            <div class="list-product-btn">
                                                <a href="javascript:void(0);" class="box-icon wishlist btn-icon-action">
                                                    <span class="icon icon-heart"></span>
                                                    <span class="tooltip">Wishlist</span>
                                                </a>
                                                <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                                    class="box-icon compare ">
                                                    <span class="icon icon-compare"></span>
                                                    <span class="tooltip">Compare</span>
                                                </a>
                                                <a href="#quickView" data-bs-toggle="modal"
                                                    class="box-icon quickview tf-btn-loading">
                                                    <span class="icon icon-eye"></span>
                                                    <span class="tooltip">Quick View</span>
                                                </a>
                                            </div>
                                            <div class="list-btn-main">
                                                <a href="#shoppingCart" data-bs-toggle="modal"
                                                    class="btn-main-product">Add
                                                    To
                                                    cart</a>
                                            </div>
                                        </div>
                                        <div class="card-product-info ">
                                            <a href="product-detail.html" class="title link line-clamp-1">Ergonomic
                                                Chair Pro</a>
                                            <div class="price text-body-default "><span
                                                    class="text-caption-1 old-price">$98.00</span>$79.99</div>
                                            <ul class="list-color-product">
                                                <li class="list-color-item color-swatch active">
                                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                                    <span class="swatch-value bg-light-blue"></span>
                                                    <img class="lazyload" data-src="images/shop/product-1.2.jpg"
                                                        src="images/shop/product-1.2.jpg" alt="image-product">
                                                </li>
                                                <li class="list-color-item color-swatch">
                                                    <span class="d-none text-capitalize color-filter">Light Blue</span>
                                                    <span class="swatch-value bg-light-blue-2"></span>
                                                    <img class="lazyload" data-src="images/shop/product-1.3.jpg"
                                                        src="images/shop/product-1.3.jpg" alt="image-product">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- /Related Products -->

@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('theme/js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/count-down.js') }}"></script>
    <script type="module" src="{{ asset('theme/js/model-viewer.min.js') }}"></script>
    <script type="module" src="{{ asset('theme/js/zoom.js') }}"></script>
    <script type="module" src="{{ asset('theme/js/drift.min.js') }}"></script>
@endpush
