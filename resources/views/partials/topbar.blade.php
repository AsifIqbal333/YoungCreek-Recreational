<div class="tf-topbar">
    <div class="container-full">
        <div class="row">
            {{-- <div class="col-xl-4">
                <div class="topbar-left d-none d-xl-flex">
                    <a href="about.html" class="text_white text-caption-1 link">About</a>
                    <a href="contact.html" class="text_white text-caption-1 link">Contact</a>
                    <a href="store-list.html" class="text_white text-caption-1 link">Location</a>
                </div>
            </div> --}}
            <div class="col-xl-4">
                <div class="topbar-left d-none d-xl-flex">
                    <div class="tf-languages">
                        <select class="image-select center style-default color-white type-languages">
                            <option>English</option>
                            {{-- <option>Vietnam</option> --}}
                        </select>
                    </div>
                    <div class="tf-currencies">
                        <select class="image-select center style-default color-white type-currencies">
                            <option selected data-thumbnail="{{ asset('theme/images/country/us.svg') }}">USD</option>
                            {{-- <option data-thumbnail="{{ asset('theme/images/country/vn.svg') }}">VND</option> --}}
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="wrapper-slider-topbar">
                    <div class="swiper tf-sw-top_bar" data-preview="1" data-space="0" data-loop="true" data-speed="2000"
                        data-auto-play="true" data-delay="2000">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p class="text-caption-1 text_white">
                                    Free shipping on all orders over <span class="text_primary">$20.00</span>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <p class="text-caption-1 text_white">
                                    Free shipping on all orders over
                                    <span class="text_primary">$20.00</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-topbar nav-next-topbar"><span class="icon icon-left"></span></div>
                    <div class="navigation-topbar nav-prev-topbar"><span class="icon icon-right"></span></div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="topbar-right justify-content-end d-none d-xl-flex">
                    <a href="{{ route('about-us') }}" class="text_white text-caption-1 link">About</a>
                    <a href="{{ route('contacts.index') }}" class="text_white text-caption-1 link">Contact</a>
                    {{-- <a href="store-list.html" class="text_white text-caption-1 link">Location</a> --}}
                </div>
            </div>
        </div>
    </div>
</div>
