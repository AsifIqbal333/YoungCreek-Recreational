<div class="search-items">
    <form class="form-search">
        <fieldset class="text">
            <input type="search" placeholder="Search..." wire:model.live.debounce="search" class="text-black">
        </fieldset>
        {{-- <button class="" type="submit">
                    <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z"
                            stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </button> --}}
    </form>
    @if ($suggestions->count() > 0)
        <div>
            <h5 class="mb_16">Suggestions</h5>
            <ul class="list-tags">
                @foreach ($suggestions as $suggestion => $item)
                    @php
                        $word = implode(' ', array_slice(explode(' ', $suggestion), 0, 2));
                    @endphp
                    <li>
                        <a href="{{ route('search', ['q' => $word]) }}" class="radius-60 link">{{ $word }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        @if ($search)
            <h6 class="mb_16">{{ $products_count }} results found for “{{ $search }}”</h6>
        @endif

        <div class="tf-grid-layout tf-col-2 lg-col-3 xl-col-4">
            @foreach ($products as $product)
                @php
                    $firstImage = $product->images->first()
                        ? product_image($product->category, $product->images->first()->image)
                        : asset('theme/images/shop/product-1.jpg');
                    $secondImage = $product->images->skip(1)->first()
                        ? product_image($product->category, $product->images->skip(1)->first()->image)
                        : asset('theme/images/shop/product-1.1.jpg');
                    $originalPrice = $product->price;
                    $upPrice = $originalPrice + $originalPrice * (discount_percentage() / 100); // 10% higher
                    $viewLink = route('products.show', ['type' => $product->type, 'slug' => $product->slug]);
                @endphp
                <div class="card-product style-1 fl-item">
                    <div class="card-product-wrapper">
                        <a href="{{ $viewLink }}" class="image-wrap">
                            <img class="lazyload img-product" data-src="{{ $firstImage }}" src="{{ $firstImage }}"
                                alt="image-product" srcset="{{ image_srcset($product->category, $firstImage) }}">
                            <img class="lazyload img-hover" data-src="{{ $secondImage }}" src="{{ $secondImage }}"
                                alt="image-product" srcset="{{ image_srcset($product->category, $secondImage) }}">
                        </a>
                        <div class="on-sale-wrap"><span class="on-sale-item">-{{ discount_percentage() }}%</span>
                        </div>
                        <div class="list-product-btn">
                            <x-add-to-wishlist :productId="$product->id" />
                            {{-- <a href="#quickView" data-bs-toggle="modal" class="box-icon quickview tf-btn-loading">
                                <span class="icon icon-eye"></span>
                                <span class="tooltip">Quick View</span>
                            </a> --}}
                        </div>
                        <div class="list-btn-main">
                            <a href="{{ $viewLink }}" class="btn-main-product">Add To cart</a>
                        </div>
                    </div>
                    <div class="card-product-info ">
                        <a href="{{ $viewLink }}" class="title link">{{ $product->name }}</a>
                        <div class="price text-body-default "><span
                                class="text-caption-1 old-price">${{ number_format($upPrice, 2) }}</span>${{ number_format($originalPrice, 2) }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Load Item -->
    @if (!$isAll && $products_count > 12)
        <div class="wd-load view-more-button text-center">
            <a href="{{ route('search', ['q' => $search, 'type' => 'all']) }}"
                class="tf-loading btn-loadmore tf-btn btn-reset"><span class="text text-btn text-btn-uppercase">Load
                    more</span></a>
        </div>
    @endif
</div>
