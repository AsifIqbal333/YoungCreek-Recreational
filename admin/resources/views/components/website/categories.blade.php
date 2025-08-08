 @props(['categories'])

 <section class="flat-spacing-2">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="heading-section text-center">
                     <h3 class="wow fadeInUp">Shop By Categories</h3>
                     <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Fresh styles just in!
                         Elevate your look.</p>
                 </div>
                 <div class="style-2 has-boxshadow">
                     <div class="swiper tf-sw-products style-full slider-nav-sw" data-preview="4.4" data-tablet="1.5"
                         data-mobile="1.5" data-space-lg="30" data-space-md="20" data-space="15" data-loop="true"
                         data-center="true">
                         <div class="swiper-wrapper">
                             @foreach ($categories as $category)
                                 <div class="categories-item wow fadeInUp swiper-slide"
                                     data-wow-delay="{{ "0.$loop->iteration" }}s">
                                     <div class="icon">
                                         {{-- <i class="icon-frame-4"></i> --}}
                                         <img src="{{ $category['image'] }}" alt="{{ $category['title'] }}">
                                     </div>
                                     <div class="content">
                                         <h5 class="title"><a href="{{ route('categories.show', $category['slug']) }}"
                                                 class="link">{{ $category['title'] }}</a></h5>
                                         <p class="text-body-default text_secondary">{{ $category['products_count'] }}
                                             items</p>
                                     </div>
                                 </div>
                             @endforeach
                         </div>

                         <div class="wrap-pagination d-lg-none d-block">
                             <div class="container">
                                 <div class="row">
                                     <div class="col-12">
                                         <div
                                             class="sw-pagination-products sw-dots  type-circle d-flex justify-content-center">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="sw-button swiper-button-next nav-prev-products d_lg_none right-0"></div>
                         <div class="sw-button swiper-button-prev nav-next-products d_lg_none left-0"></div>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </section>
