@extends('layouts.website')

@section('title', 'Products')
@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];
    @endphp
    <x-breadcrumbs :title="'Products'" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <section class="flat-spacing-2 about-us-main">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="heading-section text-center spacing-2">
                        <h1 class="wow fadeInUp">OUR PRODUCTS</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            At YoungCreek Recreational, LLC, we pride ourselves in providing a safe environment for all
                            children to
                            grow and nurture their natural sense of adventure. We achieve this by offering innovative
                            products at
                            attractive prices, backed by excellent warranty and customer service. That is why we are
                            committed to
                            providing our customers with the highest quality products from our manufacturing facility in
                            Houston,
                            Texas.
                        </p>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                            Additionally, we offer a wide range of playground and park products from our partnering
                            manufacturers to
                            meet your every need. We know and trust that each of our selected partners offer only the
                            highest
                            quality products and are also leaders in our industry. Our friendly team of Adventure play
                            experts
                            sincerely love what they do, and are committed to creating smiles and spreading happiness one
                            park at a
                            time.
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="swiper tf-sw-tablet" data-preview="1" data-space="15" data-screen="768">
                        <div class="swiper-wrapper tf-grid-layout-md wrap-box-location md-col-3">
                            @foreach (categories() as $item)
                                <div class="swiper-slide">
                                    <div class="location-item hover-img">
                                        <a href="{{ route('categories.show', $item['slug']) }}" class="img-style">
                                            <img class="lazyload" data-src="{{ $item['image'] }}" src="{{ $item['image'] }}"
                                                alt="{{ $item['title'] }}" />
                                        </a>
                                        <div class="content">
                                            <h5>{{ $item['title'] }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="sw-pagination-tb sw-dots d-block d-md-none type-circle d-flex justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
