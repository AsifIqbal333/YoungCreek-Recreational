@extends('layouts.website')

@section('title', 'Playground Equipment Manufacturers')

@section('content')

    <!-- .silideshow  -->
    <x-website.hero-section :categories="$categories" />
    <!-- /.silideshow  -->

    <!-- .categories -->
    <x-website.categories :categories="$categories" />
    <!-- /.categories -->

    <!-- .collection  -->
    <section class="flat-spacing-2 pt-0">
        <div class="container">
            <div class="swiper tf-sw-mobile" data-screen="767" data-preview="1" data-space="15">
                <div class="swiper-wrapper grid-cls-v2">
                    @php
                        $item = $categories[0];
                    @endphp
                    <div class="swiper-slide item1">
                        <div class="collection-position style-2">
                            <a href="{{ route('categories.show', $item['slug']) }}" class="img-style ">
                                <img class="lazyload effect-paralax" data-src="{{ $item['image'] }}"
                                    src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            </a>
                            <div class="content cls-content">
                                <div class="cls-heading">
                                    <h3 class="text_white wow fadeInUp" data-wow-delay="0s">{{ $item['title'] }}</h3>
                                    {{-- <p class="text_white wow fadeInUp" data-wow-delay="0.1s">Reserved for special  occasions</p> --}}
                                </div>
                                <a href="{{ route('categories.show', $item['slug']) }}"
                                    class="tf-btn btn-white  wow fadeInUp" data-wow-delay="0.2s">Explore Collection <i
                                        class="icon-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>

                    @php
                        $item = $categories[1];
                    @endphp
                    <div class="swiper-slide item2">
                        <div class="collection-position style-2 spacing-1">
                            <a href="{{ route('categories.show', $item['slug']) }}" class="img-style ">
                                <img class="lazyload effect-paralax" data-src="{{ $item['image'] }}"
                                    src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            </a>
                            <div class="content cls-content">
                                <div class="cls-heading">
                                    <h4 class="text_white wow fadeInUp" data-wow-delay="0s">{{ $item['title'] }}</h4>
                                    {{-- <p class="text_white wow fadeInUp" data-wow-delay="0.1s">Modern office lighting</p> --}}
                                </div>
                                <a href="{{ route('categories.show', $item['slug']) }}"
                                    class="btn-line btn-line-white wow fadeInUp" data-wow-delay="0.2s"><span>
                                        Shop Now
                                    </span></a>
                            </div>
                        </div>
                    </div>

                    @php
                        $item = $categories[2];
                    @endphp
                    <div class="swiper-slide item3">
                        <div class="collection-position style-2 spacing-1">
                            <a href="{{ route('categories.show', $item['slug']) }}" class="img-style ">
                                <img class="lazyload effect-paralax" data-src="{{ $item['image'] }}"
                                    src="{{ $item['image'] }}" alt="{{ $item['title'] }}">
                            </a>
                            <div class="content cls-content">
                                <div class="cls-heading">
                                    <h4 class="text_white wow fadeInUp" data-wow-delay="0s">{{ $item['title'] }}</h4>
                                    {{-- <p class="text_white wow fadeInUp" data-wow-delay="0.1s">Stylish office decor</p> --}}
                                </div>
                                <a href="{{ route('categories.show', $item['slug']) }}"
                                    class="btn-line btn-line-white wow fadeInUp" data-wow-delay="0.2s">
                                    <span>
                                        Discover Products
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sw-pagination-mb sw-dots type-circle justify-content-center d-md-none d-flex"></div>
            </div>
        </div>
    </section> <!-- /.collection  -->

    <!-- .our-pick -->
    <x-website.our-pick :products="$ourPicks" />
    <!-- /.our-pick -->

    <!-- .collection -->
    <section>
        <div class="flat-img-with-text-5">
            @php
                $item = $categories[3];
            @endphp
            <div class="collection-position hover-img style-6">
                <div class="img-style ">
                    <img class="lazyload effect-paralax" data-src="{{ $item['image'] }}" src="{{ $item['image'] }}"
                        alt="banner-cls">
                </div>
                <div class="content cls-content w-full">
                    <div class="cls-heading gap-8 mb_22">
                        <h3 class=""> <a href="{{ route('categories.show', $item['slug']) }}"
                                class="link text_white wow fadeInUp"> {{ $item['title'] }}</a></h3>
                        <p class="text_white text-body-default wow fadeInUp" data-wow-delay="0.1s">Reserved for long work
                            hours.</p>
                    </div>
                    <a href="{{ route('categories.show', $item['slug']) }}" class="tf-btn btn-white  mx-auto">Explore
                        Collection <i class="icon-arrow-up-right"></i></a>
                </div>
            </div>

            @php
                $item = $categories[4];
            @endphp
            <div class="collection-position hover-img style-6">
                <div class="img-style ">
                    <img class="lazyload effect-paralax" data-src="{{ $item['image'] }}" src="{{ $item['image'] }}"
                        alt="banner-cls">
                </div>
                <div class="content cls-content w-full">
                    <div class="cls-heading gap-8 mb_22">
                        <h3 class=""> <a href="{{ route('categories.show', $item['slug']) }}"
                                class="link text_white wow fadeInUp">{{ $item['title'] }}</a></h3>
                        {{-- <p class="text_white text-body-default wow fadeInUp" data-wow-delay="0.1s">Reserved for long work
                            hours.</p> --}}
                    </div>
                    <a href="{{ route('categories.show', $item['slug']) }}" class="tf-btn btn-white  mx-auto"><span>View
                            All Products</span><i class="icon-arrow-up-right"></i></a>
                </div>
            </div>
        </div>
    </section> <!-- .collection -->

    <!-- .top-picks -->
    <x-website.top-picks :products="$topPicks" />
    <!-- /.top-picks -->

    <!-- /.lookbook -->
    @if ($deal)
        <x-website.lookbook :deal="$deal" />
    @endif
    <!-- /.lookbook -->

    <!-- /.benefit -->
    <x-website.benefits />
    <!-- /.benefit -->

    <!-- .testimonials -->
    <x-website.testimonials />
    <!-- .testimonials -->

    <!-- News Insight -->
    {{-- <x-website.news-insight /> --}}
    <!-- /.News Insight -->

    <!-- .instagram -->
    {{-- <section class="flat-spacing-2 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section text-center">
                        <h3 class="wow fadeInUp">Shop Instagram</h3>
                        <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Elevate your
                            wardrobe with fresh finds today!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper tf-sw-shop-gallery md-px-15" data-preview="5.7" data-tablet="3" data-mobile="2"
            data-space-lg="20" data-space-md="15" data-space="15" data-pagination="2" data-pagination-md="3"
            data-pagination-lg="1" data-centered="true" data-loop="true">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="gallery-item hover-overlay hover-img">
                        <div class="img-style">
                            <img class="lazyload img-hover" data-src="{{ asset('theme/images/gallery/gallery-1.jpg') }}"
                                src="{{ asset('theme/images/gallery/gallery-1.jpg') }}" alt="image-gallery">
                        </div>
                        <a href="product-detail.html" class="box-icon hover-tooltip"><span class="icon icon-eye"></span>
                            <span class="tooltip">View Product</span></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery-item hover-overlay hover-img">
                        <div class="img-style">
                            <img class="lazyload img-hover" data-src="{{ asset('theme/images/gallery/gallery-2.jpg') }}"
                                src="{{ asset('theme/images/gallery/gallery-2.jpg') }}" alt="image-gallery">
                        </div>
                        <a href="product-detail.html" class="box-icon hover-tooltip"><span class="icon icon-eye"></span>
                            <span class="tooltip">View Product</span></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery-item hover-overlay hover-img">
                        <div class="img-style">
                            <img class="lazyload img-hover" data-src="{{ asset('theme/images/gallery/gallery-3.jpg') }}"
                                src="{{ asset('theme/images/gallery/gallery-3.jpg') }}" alt="image-gallery">
                        </div>
                        <a href="product-detail.html" class="box-icon hover-tooltip"><span class="icon icon-eye"></span>
                            <span class="tooltip">View Product</span></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery-item hover-overlay hover-img">
                        <div class="img-style">
                            <img class="lazyload img-hover" data-src="{{ asset('theme/images/gallery/gallery-4.jpg') }}"
                                src="{{ asset('theme/images/gallery/gallery-4.jpg') }}" alt="image-gallery">
                        </div>
                        <a href="product-detail.html" class="box-icon hover-tooltip"><span class="icon icon-eye"></span>
                            <span class="tooltip">View Product</span></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery-item hover-overlay hover-img">
                        <div class="img-style">
                            <img class="lazyload img-hover" data-src="{{ asset('theme/images/gallery/gallery-5.jpg') }}"
                                src="{{ asset('theme/images/gallery/gallery-5.jpg') }}" alt="image-gallery">
                        </div>
                        <a href="product-detail.html" class="box-icon hover-tooltip"><span class="icon icon-eye"></span>
                            <span class="tooltip">View Product</span></a>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="gallery-item hover-overlay hover-img">
                        <div class="img-style">
                            <img class="lazyload img-hover" data-src="{{ asset('theme/images/gallery/gallery-6.jpg') }}"
                                src="{{ asset('theme/images/gallery/gallery-6.jpg') }}" alt="image-gallery">
                        </div>
                        <a href="product-detail.html" class="box-icon hover-tooltip"><span
                                class="icon icon-eye"></span> <span class="tooltip">View Product</span></a>
                    </div>
                </div>
            </div>
            <div class="sw-pagination-gallery sw-dots d-lg-none d-flex type-circle justify-content-center"></div>
        </div>
    </section> --}}
    <!-- /.instagram -->

@endsection
