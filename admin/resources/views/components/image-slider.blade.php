@props(['images' => [], 'heading' => '', 'rounded' => false])

<section {{ $attributes->merge(['class' => 'flat-spacing']) }}>
    <div class="container">
        @if ($heading)
            <h4 class="heading text-center mb-4">{{ $heading }}</h4>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div dir="ltr" class="swiper tf-sw-latest" data-preview="4" data-tablet="3" data-mobile="2"
                    data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                    data-pagination-lg="1">
                    <div class="swiper-wrapper">
                        @foreach ($images as $image)
                            <div class="swiper-slide">
                                <a href="{{ $image['path'] }}" target="_blank" class="item">
                                    <img class="lazyload {{ $rounded ? 'rounded-full' : '' }}"
                                        style="min-height:200px !important; max-height: 200px !important;"
                                        data-src="{{ $image['path'] }}" src="{{ $image['path'] }}" alt="product image">
                                    @if ($image['title'])
                                        <p class="text-center mt-3" style="">{{ $image['title'] }}</p>
                                    @endif
                                </a>

                            </div>
                        @endforeach

                    </div>
                    <div class="sw-pagination-latest sw-dots type-circle justify-content-center"></div>
                </div>
            </div>
        </div>
    </div>
</section>
