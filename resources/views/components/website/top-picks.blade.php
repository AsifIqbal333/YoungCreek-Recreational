 @props(['products'])

 <section class="flat-spacing-5">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="heading-section text-center">
                     <h3 class="wow fadeInUp">Top Picks You’ll Love</h3>
                     <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Fresh styles just
                         in! Elevate your look.</p>
                 </div>
             </div>
         </div>
     </div>
     <div class="swiper tf-sw-products style-full slider-nav-sw" data-preview="4.4" data-tablet="1.5" data-mobile="1.5"
         data-space-lg="30" data-space-md="20" data-space="15" data-loop="true" data-center="true">
         <div class="swiper-wrapper">
             @foreach ($products as $product)
                 @php
                     $firstImage = product_image($product->category, $product->images->first()->image);
                     $secondImage = product_image($product->category, $product->images->skip(1)->first()->image);
                     $originalPrice = $product->price;
                     $upPrice = $originalPrice + $originalPrice * (discount_percentage() / 100); // 10% higher
                     $viewLink = route('products.show', ['type' => $product->type, 'slug' => $product->slug]);
                 @endphp
                 <div class="swiper-slide">
                     <div class="card-product style-1">
                         <div class="card-product-wrapper">
                             <a href="{{ $viewLink }}" class="image-wrap">
                                 <img class="lazyload img-product" data-src="{{ $firstImage }}"
                                     src="{{ $firstImage }}" alt="image-product"
                                     srcset="{{ image_srcset($product->category, $firstImage) }}">
                                 <img class="lazyload img-hover" data-src="{{ $secondImage }}"
                                     src="{{ $secondImage }}" alt="image-product"
                                     srcset="{{ image_srcset($product->category, $secondImage) }}">
                             </a>
                             <div class="on-sale-wrap"><span class="on-sale-item">-{{ discount_percentage() }}%</span>
                             </div>
                             <div class="list-product-btn">
                                 <x-add-to-wishlist :productId="$product->id" />
                                 {{-- <a href="#compare" data-bs-toggle="modal" aria-controls="compare"
                                        class="box-icon compare ">
                                        <span class="icon icon-compare"></span>
                                        <span class="tooltip">Compare</span>
                                    </a> --}}
                                 <a href="#quickView{{ $product->id }}" data-bs-toggle="modal"
                                     class="box-icon quickview tf-btn-loading">
                                     <span class="icon icon-eye"></span>
                                     <span class="tooltip">Quick View</span>
                                 </a>
                             </div>
                             <div class="list-btn-main">
                                 <span class="btn-main-product cursor-pointer"
                                     onclick="addToCart('{{ $product->id }}')">Add To
                                     cart</span>
                             </div>
                         </div>
                         <div class="card-product-info ">
                             <a href="{{ $viewLink }}" class="text-title  link">{{ $product->name }}</a>
                             <div class="price text-body-default "><span
                                     class="text-caption-1 old-price">${{ number_format($upPrice, 2) }}</span>${{ number_format($originalPrice, 2) }}
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
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
         <div class="wrap-pagination d-lg-none d-block">
             <div class="container">
                 <div class="row">
                     <div class="col-12">
                         <div class="sw-pagination-products sw-dots  type-circle d-flex justify-content-center">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="sw-button swiper-button-next nav-prev-products d_lg_none right-0"></div>
         <div class="sw-button swiper-button-prev nav-next-products d_lg_none left-0"></div>
     </div>

     @foreach ($products as $product)
         <x-models.quick-view :product="$product" />
     @endforeach
 </section>
