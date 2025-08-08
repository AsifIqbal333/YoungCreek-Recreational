@extends('layouts.website')
@section('title', 'Categories')

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [
            ['title' => 'Products', 'href' => route('products')],
            // ['title' => $category['title'], 'href' => route('categories.show', $category['slug'])],
        ];

    @endphp
    <x-breadcrumbs :title="$category['title']" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- categories -->
    <section class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="swiper tf-sw-tablet" data-preview="1" data-space="15" data-screen="768">
                        <div class="swiper-wrapper tf-grid-layout-md wrap-box-location md-col-3">
                            @foreach ($category['items'] as $item)
                                <div class="swiper-slide">
                                    <div class="location-item hover-img">
                                        <a href="{{ route('products.index', ['type' => $category['slug'], 'category' => $item['category']]) }}"
                                            class="img-style">
                                            <img class="lazyload" data-src="{{ $item['image'] }}" src="{{ $item['image'] }}"
                                                alt="{{ $item['title'] }}" style="max-height: 200px;" />
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
    <!-- categories -->
@endsection
