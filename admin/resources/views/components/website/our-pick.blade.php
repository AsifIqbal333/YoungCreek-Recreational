@props(['products'])

<section class="flat-spacing-5  pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading-section text-center">
                    <h3 class="wow fadeInUp">Our Picks For You</h3>
                    <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Fresh styles just
                        in! Elevate your look.</p>
                </div>
                <div class="tf-grid-layout tf-col-2 lg-col-4 ">
                    @foreach ($products as $product)
                        @php
                            $delay = '0.' . $loop->index . 's';
                        @endphp
                        <x-product :product="$product" :delay="$delay" />
                        <x-models.quick-view :product="$product" />
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
