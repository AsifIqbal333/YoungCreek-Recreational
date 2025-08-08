@props(['product'])

@php
    $firstImage = product_image($product->category, $product->images->first()?->image);
    $secondImage = product_image($product->category, $product->images->skip(1)->first()?->image);
    $originalPrice = $product->price;
    $upPrice = $originalPrice + $originalPrice * (discount_percentage() / 100); // 10% higher
    $viewLink = route('products.show', ['type' => $product->type, 'slug' => $product->slug]);
@endphp

<div class="card-product style-1 grid" data-min-capacity="{{ $product->min_capacity }}"
    data-max-capacity="{{ $product->max_capacity }}" data-width="{{ $product->width }}"
    data-length="{{ $product->length }}">
    <div class="card-product-wrapper">
        <a href="{{ $viewLink }}" class="image-wrap">
            <img class="lazyload img-product" data-src="{{ $firstImage }}" src="{{ $firstImage }}" alt="image-product"
                srcset="{{ image_srcset($product->category, $firstImage) }}">
            <img class="lazyload img-hover" data-src="{{ $secondImage ?? $firstImage }}"
                src="{{ $secondImage ?? $firstImage }}" alt="image-product"
                srcset="{{ image_srcset($product->category, $secondImage ?? $firstImage) }}">
        </a>
        <div class="on-sale-wrap"><span class="on-sale-item">-{{ discount_percentage() }}%</span>
        </div>
        <div class="list-product-btn">
            <x-add-to-wishlist :productId="$product->id" />
            {{-- <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
            <a href="#quickView{{ $product->id }}" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                <span class="icon icon-eye"></span>
                <span class="tooltip">Quick View</span>
            </a>
        </div>
        <div class="list-btn-main">
            <span class="btn-main-product cursor-pointer" onclick="addToCart('{{ $product->id }}')">Add To
                cart</span>
        </div>
    </div>
    <div class="card-product-info ">
        <a href="{{ $viewLink }}" class="title link">{{ $product->name }}</a>
        <div class="price text-body-default ">
            <span class="text-caption-1 old-price">${{ number_format($upPrice, 2) }}</span>
            <span class="current-price">${{ number_format($originalPrice, 2) }}</span>
        </div>
        <ul id="productColor{{ $product->id }}" class="list-color-product">
            <li class="list-color-item color-swatch active" data-color="Custom" title="Custom">
                <span class="d-none text-capitalize color-filter">Custom</span>
                <span class="swatch-value bg-light-blue-2"></span>
            </li>
            <li class="list-color-item color-swatch" data-color="Primary" title="Primary">
                <span class="d-none text-capitalize color-filter">Primary</span>
                <span class="swatch-value bg-light-primary"></span>
            </li>
            <li class="list-color-item color-swatch" data-color="Natural" title="Natural">
                <span class="d-none text-capitalize color-filter">Natural</span>
                <span class="swatch-value bg-light-natural"></span>
            </li>
        </ul>
        {{-- <p>{{ $product->capacity }}</p> --}}
        {{-- <p>Width: {{ $product->width }}, Length: {{ $product->length }}</p> --}}
    </div>
</div>
