 <section {{ $attributes->merge(['class' => 'flat-spacing']) }}>
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <h4 class="mb_40 wow fadeInUp">You may be interested in…
                 </h4>
                 <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                     data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                     data-pagination-lg="1">
                     <div class="swiper-wrapper">
                         @php
                             $firstImage = asset('images/ada plastic ramp2.jpg');
                             $secondImage = asset('images/ada plastic ramp3.jpg');
                             $viewLink = route('products.index', [
                                 'type' => 'safety-surfacing-edging',
                                 'category' => 'aps-plastic-ada-ramp',
                             ]);
                         @endphp
                         <div class="swiper-slide">
                             <div class="card-product style-1 wow fadeInUp" data-wow-delay="0.1s">
                                 <div class="card-product-wrapper">
                                     <a href="{{ $viewLink }}" class="image-wrap">
                                         <img class="lazyload img-product"
                                             data-src="{{ $firstImage ?? asset('theme/images/shop/product-1.jpg') }}"
                                             src="{{ $firstImage ?? asset('theme/images/shop/product-1.jpg') }}"
                                             alt="image-product">
                                         <img class="lazyload img-hover"
                                             data-src="{{ $secondImage ?? asset('theme/images/shop/product-1.1.jpg') }}"
                                             src="{{ $secondImage ?? asset('theme/images/shop/product-1.1.jpg') }}"
                                             alt="image-product">
                                     </a>
                                     <div class="list-btn-main">
                                         <a href="{{ $viewLink }}" class="btn-main-product">Add To cart</a>
                                     </div>
                                 </div>
                                 <div class="card-product-info ">
                                     <a href="{{ $viewLink }}" class="title link line-clamp-1 text-uppercase">aps
                                         plastic ada
                                         ramp</a>
                                 </div>
                             </div>
                         </div>

                     </div>
                     <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                 </div>
             </div>
         </div>
     </div>
 </section>
