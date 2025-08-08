 @props(['products'])

 <section class="flat-spacing ">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <h4 class="mb_40 wow fadeInUp">You may be interested in…
                 </h4>
                 <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                     data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                     data-pagination-lg="1">
                     <div class="swiper-wrapper">
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
                                 $viewLink = route('products.show', [
                                     'type' => $product->type,
                                     'slug' => $product->slug,
                                 ]);
                             @endphp
                             <div class="swiper-slide">
                                 <div class="card-product style-1 wow fadeInUp" data-wow-delay="0.{{ $loop->index }}s">
                                     <div class="card-product-wrapper">
                                         <a href="{{ $viewLink }}" class="image-wrap">
                                             <img class="lazyload img-product" data-src="{{ $firstImage }}"
                                                 src="{{ $firstImage }}"
                                                 srcset="{{ image_srcset($product->category, $firstImage) }}"
                                                 alt="image-product">
                                             <img class="lazyload img-hover" data-src="{{ $secondImage }}"
                                                 src="{{ $secondImage }}"
                                                 srcset="{{ image_srcset($product->category, $secondImage) }}"
                                                 alt="image-product">
                                         </a>
                                         <div class="on-sale-wrap"><span
                                                 class="on-sale-item">-{{ discount_percentage() }}%</span>
                                         </div>
                                         <div class="list-product-btn">
                                             <x-add-to-wishlist :productId="$product->id" />
                                             <a href="#quickView{{ $product->id }}" data-bs-toggle="modal"
                                                 class="box-icon quickview tf-btn-loading">
                                                 <span class="icon icon-eye"></span>
                                                 <span class="tooltip">Quick View</span>
                                             </a>
                                         </div>
                                         <div class="list-btn-main">
                                             <span class="btn-main-product cursor-pointer"
                                                 onclick="addToCart('{{ $product->id }}')">Add To cart</span>
                                         </div>
                                     </div>
                                     <div class="card-product-info ">
                                         <a href="{{ $viewLink }}"
                                             class="title link line-clamp-1">{{ $product->name }}</a>
                                         <div class="price text-body-default "><span
                                                 class="text-caption-1 old-price">${{ $upPrice }}</span>${{ $originalPrice }}
                                         </div>
                                         <ul id="productColor{{ $product->id }}" class="list-color-product">
                                             <li class="list-color-item color-swatch active" data-color="Custom"
                                                 title="Custom">
                                                 <span class="d-none text-capitalize color-filter">Custom</span>
                                                 <span class="swatch-value bg-light-blue-2"></span>
                                             </li>
                                             <li class="list-color-item color-swatch" data-color="Primary"
                                                 title="Primary">
                                                 <span class="d-none text-capitalize color-filter">Primary</span>
                                                 <span class="swatch-value bg-light-primary"></span>
                                             </li>
                                             <li class="list-color-item color-swatch" data-color="Natural"
                                                 title="Natural">
                                                 <span class="d-none text-capitalize color-filter">Natural</span>
                                                 <span class="swatch-value bg-light-natural"></span>
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
         </div>
     </div>
 </section>

 @foreach ($products as $product)
     <x-models.quick-view :product="$product" />
 @endforeach
