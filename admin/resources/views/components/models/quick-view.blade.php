@props(['product'])

@php
    $originalPrice = $product->price;
    $discountPercentage = discount_percentage();
    $upPrice = $originalPrice + $originalPrice * ($discountPercentage / 100); // 10% higher
@endphp
<div class="modal fullRight fade modal-quick-view" id="quickView{{ $product->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="tf-quick-view-image">
                <div class="wrap-quick-view wrapper-scroll-quickview">
                    @foreach ($product->images as $item)
                        @php
                            $image = product_image($product->category, $item->image);
                            $srcset = image_srcset($product->category, $item->image);
                        @endphp
                        <div class="quickView-item item-scroll-quickview"
                            data-scroll-quickview="{{ fake()->randomElement(['Custom', 'Primary', 'Natural']) }}">
                            <img class="lazyload" data-src="{{ $image }}" src="{{ $image }}" alt="product"
                                srcset="{{ $srcset }}">
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="wrap">
                <div class="header">
                    <h5 class="title">Quick View</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="tf-product-info-list">
                    <div class="tf-product-info-heading">
                        <div class="tf-product-info-name">
                            <h3 class="name">{{ $product->name }}</h3>
                            <div class="sub">
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
                                <div class="compare-at-price">${{ number_format($upPrice, 2) }}</div>
                                <div class="badges-on-sale text-btn-uppercase">-{{ $discountPercentage }}%
                                </div>
                            </div>
                            <p>{{ $product->description }}</p>
                            <div class="tf-product-info-liveview">
                                <i class="icon icon-eye"></i>
                                <p class="text-caption-1">
                                    <span class="liveview-count">{{ fake()->numberBetween(10, 50) }}</span>
                                    people are viewing this right now
                                </p>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('add-to-cart') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <div class="tf-product-info-choose-option">
                            <div class="variant-picker-item">
                                <div class="variant-picker-label mb_12">
                                    Colors:<span
                                        class="text-title variant-picker-label-value value-currentColor">Custom</span>
                                </div>
                                <div class="variant-picker-values">
                                    <input id="values-custom" type="radio" name="color" value="custom" checked>
                                    <label class="hover-tooltip tooltip-bot radius-60 color-btn" for="values-custom"
                                        data-value="Custom" data-color="Custom">
                                        <span class="btn-checkbox bg-secondary"></span>
                                        <span class="tooltip">Custom</span>
                                    </label>
                                    <input id="values-primary" type="radio" name="color" value="primary">
                                    <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                        data-price="{{ $originalPrice }}" for="values-primary" data-value="Primary"
                                        data-color="Primary">
                                        <span class="btn-checkbox bg-primary"></span>
                                        <span class="tooltip">Primary</span>
                                    </label>
                                    <input id="values-natural" type="radio" name="color" value="natural">
                                    <label class="hover-tooltip tooltip-bot radius-60 color-btn"
                                        data-price="{{ $originalPrice }}" for="values-natural" data-value="Natural"
                                        data-color="Natural">
                                        <span class="btn-checkbox bg-success"></span>
                                        <span class="tooltip">Natural</span>
                                    </label>
                                </div>
                            </div>
                            <div class="tf-product-info-quantity">
                                <div class="title mb_12">Quantity:</div>
                                <div class="wg-quantity">
                                    <span class="btn-quantity btn-decrease">-</span>
                                    <input class="quantity-product" type="text" name="quantity" value="1">
                                    <span class="btn-quantity btn-increase">+</span>
                                </div>
                            </div>
                            <div>
                                <div class="tf-product-info-by-btn mb_10">
                                    <button type="submit"
                                        class="tf-btn btn-onsurface flex-grow-1  show-shopping-cart">
                                        <span>Add to cart</span>
                                        {{-- <span>Add to cart -&nbsp;</span>
                                    <span class="tf-qty-price total-price">${{ $originalPrice }}</span> --}}
                                    </button>
                                </div>
                                <a href="{{ route('products.show', ['type' => $product->type, 'slug' => $product->slug]) }}"
                                    class="tf-btn btn-primary w-full">Buy it now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
