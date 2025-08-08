@props(['categories'])

<div class="tf-slideshow style-2 slider-effect-fade slider-home2">
    <div dir="ltr" class="swiper slider-home2-thumbs">
        <div class="swiper-wrapper">
            @foreach ($categories as $category)
                <div class="swiper-slide">
                    {{-- <div class="thumbs-item">
                        <div class="image">
                            <img class="lazyload" data-src="{{ $category['product']->image }}"
                                src="{{ $category['product']->image }}" alt="{{ $category['product']->name }}">
                        </div>
                        <div class="content">
                            <a href="{{ route('products.show', ['type' => $category['product']->type, 'slug' => $category['product']->slug]) }}"
                                class="text-title title text_white">{{ $category['product']->name }}</a>
                            <div class="text-button text_white">${{ number_format($category['product']->price) }}</div>
                        </div>
                    </div> --}}
                </div>
            @endforeach

        </div>
    </div>
    <div dir="ltr" class="swiper slider-home2-main slider-effect-fade">
        <div class="swiper-wrapper">
            @foreach ($categories as $category)
                @php
                    // if ($category['title'] == 'Commercial Play Equipment') {
                    //     $title = 'Commercial Play <br> Equipment';
                    // } elseif ($category['title'] == 'Accessories & Replacement Parts') {
                    //     $title = 'Accessories & <br> Replacement Parts';
                    // } elseif ($category['title'] == 'Safety Surfacing & Edging') {
                    //     $title = 'Safety Surfacing <br> & Edging';
                    // } else {
                    //     $title = $category['title'];
                    // }

                    $words = explode(' ', $category['title']);
                    $first = $words[0];
                    $rest = implode(' ', array_slice($words, 1));
                @endphp
                <div class="swiper-slide">
                    <div class="wrap-slider">
                        <div class="img-style">
                            <img class="lazyload" data-src="{{ $category['image'] }}" src="{{ $category['image'] }}"
                                alt="banner-cls">
                        </div>
                        <div class="box-content">
                            <div class="box-title">
                                <div class="text-white text-display fade-item fade-1">{{ $category['title'] }}</div>
                                {{-- <div class="text-white text-display fade-item fade-1">{{ $first }} <br>
                                    {{ $rest }}
                                </div> --}}
                                {{-- <p class="text-body-1 text_white fade-item fade-item-2">Boost comfort and
                                        productivity with ergonomic seating.</p> --}}
                            </div>
                            <div class="fade-item fade-item-3">
                                <a href="{{ route('categories.show', $category['slug']) }}"
                                    class="tf-btn btn-white mx-auto ">Explore
                                    Collection <i class="icon-arrow-up-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="wrap-navigation">
        <div class="sw-button swiper-button-prev line-default slider-home2-prev"></div>
        <div class="sw-button swiper-button-next line-default slider-home2-next"></div>
    </div> --}}
    <div class="sw-dots slider-home2-pagination type-circle no-border justify-content-center"></div>
</div>
