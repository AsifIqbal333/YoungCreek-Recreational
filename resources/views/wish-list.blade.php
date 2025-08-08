@extends('layouts.website')

@php
    $title = 'Your Wishlist';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->


    @if ($products->count() > 0)
        <!-- section-wishlist -->
        <section class="flat-spacing pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-12"><x-alert /></div>
                    <div class="col-12">
                        <div class="tf-grid-layout tf-col-2 lg-col-4 ">
                            @foreach ($products as $product)
                                @php
                                    $firstImage = $product->images->first()
                                        ? product_image($product->category, $product->images->first()->image)
                                        : asset('theme/images/shop/product-4.jpg');
                                    $secondImage = $product->images->skip(1)->first()
                                        ? product_image($product->category, $product->images->skip(1)->first()->image)
                                        : asset('theme/images/shop/product-4.1.jpg');
                                    $originalPrice = $product->price;
                                    $upPrice = $originalPrice + $originalPrice * (discount_percentage() / 100); // 10% higher
                                    $viewLink = route('products.show', [
                                        'type' => $product->type,
                                        'slug' => $product->slug,
                                    ]);
                                @endphp

                                <div class="card-product style-1 wow fadeInUp" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        <a href="product-detail.html" class="image-wrap">
                                            <img class="lazyload img-product" data-src="{{ $firstImage }}"
                                                src="{{ $firstImage }}" alt="image-product"
                                                srcset="{{ image_srcset($product->category, $firstImage) }}">
                                            <img class="lazyload img-hover" data-src="{{ $secondImage }}"
                                                src="{{ $secondImage }}" alt="image-product"
                                                srcset="{{ image_srcset($product->category, $secondImage) }}">
                                        </a>
                                        <div class="on-sale-wrap"><span
                                                class="on-sale-item">-{{ discount_percentage() }}%</span>
                                        </div>
                                        <div class="list-product-btn">
                                            <form action="{{ route('wish-list.destroy', $product->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="box-icon wishlist btn-icon-action">
                                                    <span class="icon icon-close" style="font-size: 12px;"></span>
                                                    <span class="tooltip">Remove</span>
                                                </button>
                                            </form>

                                            <a href="#quickView{{ $product->id }}" data-bs-toggle="modal"
                                                aria-controls="quickView" class="box-icon quickview tf-btn-loading">
                                                <span class="icon icon-eye"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="{{ $viewLink }}" data-bs-toggle="modal"
                                                class="btn-main-product">Add To
                                                cart</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info ">
                                        <a href="product-detail.html"
                                            class=" text-title title link">{{ $product->name }}</a>
                                        <div class="price text-body-default"><span
                                                class="text-caption-1 old-price">${{ $upPrice }}</span>${{ $originalPrice }}
                                        </div>
                                    </div>
                                </div>
                                <x-models.quick-view :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section-wishlist -->
    @endif

    <!-- Related Products -->
    <x-feature-products :products="$featuresProducts" />

@endsection
