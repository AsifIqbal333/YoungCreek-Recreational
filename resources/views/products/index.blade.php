@extends('layouts.website')

@section('title', $categoryItem['title'])
@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [
            ['title' => 'Products', 'href' => route('products')],
            ['title' => $category['title'], 'href' => route('categories.show', $category['slug'])],
        ];
    @endphp
    <x-breadcrumbs :title="$categoryItem['title']" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- Section product -->
    <section class="flat-spacing">
        <div class="container">
            <div class="tf-shop-control">
                <div class="tf-control-filter">
                    <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="filterShop" class="tf-btn-filter"><span
                            class="icon icon-filter"></span><span class="text">Filters</span></a>
                </div>
                <ul class="tf-control-layout">
                    {{-- <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                        <div class="item">
                            <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                <rect x="7.5" y="3.5" width="12" height="5" rx="2.5" stroke="#181818" />
                                <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                <rect x="7.5" y="11.5" width="12" height="5" rx="2.5" stroke="#181818" />
                            </svg>
                        </div>
                    </li> --}}
                    <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                        <div class="item">
                            <svg class="icon" width="30" height="20" viewBox="0 0 30 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="27" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                                <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                                <circle cx="27" cy="14" r="2.5" stroke="#181818" />
                            </svg>
                        </div>
                    </li>

                    <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                        <div class="item">
                            <svg class="icon" width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                                <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                            </svg>
                        </div>
                    </li>

                    <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                        <div class="item">
                            <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="6" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="14" cy="6" r="2.5" stroke="#181818" />
                                <circle cx="6" cy="14" r="2.5" stroke="#181818" />
                                <circle cx="14" cy="14" r="2.5" stroke="#181818" />
                            </svg>
                        </div>
                    </li>


                </ul>
                <div class="tf-control-sorting">
                    <p class="d-none d-lg-block text-caption-1">Sort by:</p>
                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                        <div class="btn-select">
                            <span class="text-sort-value">Best Selling</span>
                            <span class="icon icon-down"></span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="select-item" data-sort-value="best-selling">
                                <span class="text-value-item">Best selling</span>
                            </div>
                            <div class="select-item" data-sort-value="a-z">
                                <span class="text-value-item">Alphabetically, A-Z</span>
                            </div>
                            <div class="select-item" data-sort-value="z-a">
                                <span class="text-value-item">Alphabetically, Z-A</span>
                            </div>
                            <div class="select-item" data-sort-value="price-low-high">
                                <span class="text-value-item">Price, low to high</span>
                            </div>
                            <div class="select-item" data-sort-value="price-high-low">
                                <span class="text-value-item">Price, high to low</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper-control-shop">
                <div class="meta-filter-shop">
                    <div id="product-count-grid" class="count-text"></div>
                    <div id="product-count-list" class="count-text"></div>
                    <div id="applied-filters"></div>
                    <button id="remove-all" class="remove-all-filters text-btn-uppercase" style="display: none;">REMOVE
                        ALL <i class="icon icon-close"></i></button>
                </div>
                <div class="tf-list-layout wrapper-shop" id="listLayout">
                    @foreach ($products as $product)
                        @php
                            $firstImage = product_image($product->category, $product->images->first()->image);
                            $secondImage = product_image(
                                $product->category,
                                $product->images->skip(1)->first()?->image,
                            );
                            $originalPrice = $product->price;
                            $upPrice = $originalPrice + $originalPrice * (discount_percentage() / 100); // 10% higher
                            $viewLink = route('products.show', ['type' => $product->type, 'slug' => $product->slug]);
                        @endphp
                        <div class="card-product style-list" data-min-capacity="{{ $product->min_capacity }}"
                            data-max-capacity="{{ $product->max_capacity }}" data-width="{{ $product->width }}"
                            data-length="{{ $product->length }}">
                            <div class="card-product-wrapper">
                                <a href="{{ $viewLink }}" class="image-wrap">
                                    <img class="lazyload img-product" data-src="{{ $firstImage }}"
                                        src="{{ $firstImage }}" alt="image-product"
                                        srcset="{{ image_srcset($product->category, $firstImage) }}">
                                    <img class="lazyload img-hover" data-src="{{ $secondImage ?? $firstImage }}"
                                        src="{{ $secondImage ?? $firstImage }}" alt="image-product"
                                        srcset="{{ image_srcset($product->category, $secondImage ?? $firstImage) }}">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ $viewLink }}" class="text-title title link">{{ $product->name }}</a>
                                <div class="price text-button">
                                    <span class="old-price">${{ number_format($upPrice, 2) }}</span>
                                    <span class="current-price">${{ number_format($originalPrice, 2) }}</span>
                                    <span class="on-sale-item">-{{ discount_percentage() }}%</span>
                                </div>
                                <p class="description text_secondary text-body-default">{{ $product->description }}</p>
                                <div class="variant-wrap-list">
                                    <div class="list-product-btn">
                                        <a href="{{ $viewLink }}" data-bs-toggle="modal"
                                            class="btn-main-product">Add To
                                            cart</a>
                                        <x-add-to-wishlist :productId="$product->id" />
                                        {{-- <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                            class="box-icon compare">
                                            <span class="icon icon-compare"></span>
                                            <span class="tooltip">Compare</span>
                                        </a> --}}
                                        <a href="#quickView{{ $product->id }}" data-bs-toggle="modal"
                                            class="box-icon quickview tf-btn-loading">
                                            <span class="icon icon-eye"></span>
                                            <span class="tooltip">Quick View</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <!-- pagination -->
                    {{-- <ul class="wg-pagination">
                        <li><a href="#" class="pagination-item text-button">1</a></li>
                        <li class="active">
                            <div class="pagination-item text-button">2</div>
                        </li>
                        <li><a href="#" class="pagination-item text-button">3</a></li>
                        <li><a href="#" class="pagination-item text-button"><i class="icon-right"></i></a></li>
                    </ul> --}}
                </div>
                <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
                    @foreach ($products as $product)
                        <x-product-grid :product="$product" />
                    @endforeach

                    <!-- pagination -->
                    {{-- <ul class="wg-pagination justify-content-center">
                        <li><a href="#" class="pagination-item text-button">1</a></li>
                        <li class="active">
                            <div class="pagination-item text-button">2</div>
                        </li>
                        <li><a href="#" class="pagination-item text-button">3</a></li>
                        <li><a href="#" class="pagination-item text-button"><i class="icon-right"></i></a></li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- /Section product -->

    @foreach ($products as $product)
        <x-models.quick-view :product="$product" />
    @endforeach

    <!-- Filters -->
    <div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
        <div class="canvas-wrapper">
            <div class="canvas-header">
                <h5><span class="icon icon-filter"></span>Filters</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
            <div class="canvas-body">
                <div class="widget-facet facet-categories">
                    <h6 class="facet-title">Kids Capacity</h6>
                    <ul class="facet-content">
                        @foreach ($capacityFilters as $item)
                            <li><span class="link capacity cursor-pointer"
                                    data-capacity="{{ $item['key'] }}">{{ $item['title'] }} <span
                                        class="count-cate">({{ $item['value'] }})</span></span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget-facet facet-price">
                    <h6 class="facet-title">Price</h6>
                    <div class="price-val-range" id="price-value-range" data-min="{{ $products->min('price') }}"
                        data-max="{{ $products->max('price') }}"></div>
                    <div class="box-price-product">
                        <div class="box-price-item">
                            <span class="title-price">Min price</span>
                            <div class="price-val" id="price-min-value" data-currency="$"></div>
                        </div>
                        <div class="box-price-item">
                            <span class="title-price">Max price</span>
                            <div class="price-val" id="price-max-value" data-currency="$"></div>
                        </div>
                    </div>
                </div>

                <div class="widget-facet facet-price">
                    <h6 class="facet-title">Width</h6>
                    <div class="price-val-range" id="width-value-range" data-min="{{ $products->min('width') }}"
                        data-max="{{ $products->max('width') }}"></div>
                    <div class="box-price-product">
                        <div class="box-price-item">
                            <span class="title-price">Min width</span>
                            <div class="price-val" id="width-min-value" data-currency="Inches"></div>
                        </div>
                        <div class="box-price-item">
                            <span class="title-price">Max width</span>
                            <div class="price-val" id="width-max-value" data-currency="Inches"></div>
                        </div>
                    </div>
                </div>

                <div class="widget-facet facet-price">
                    <h6 class="facet-title">Length</h6>
                    <div class="price-val-range" id="length-value-range" data-min="{{ $products->min('length') }}"
                        data-max="{{ $products->max('length') }}"></div>
                    <div class="box-price-product">
                        <div class="box-price-item">
                            <span class="title-price">Min length</span>
                            <div class="price-val" id="length-min-value" data-currency="Inches"></div>
                        </div>
                        <div class="box-price-item">
                            <span class="title-price">Max length</span>
                            <div class="price-val" id="length-max-value" data-currency="Inches"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-bottom">
                <button id="reset-filter" class="tf-btn btn-border btn-reset">Clear All Filters</button>
            </div>
        </div>
    </div>
    <!-- /Filter -->
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('theme/js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/shop.js') }}"></script>
@endpush
