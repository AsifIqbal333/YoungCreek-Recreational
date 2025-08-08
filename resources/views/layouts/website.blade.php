<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @yield('seo')

    <!-- font -->
    <link rel="stylesheet" href="{{ asset('theme/fonts/fonts.css') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('theme/fonts/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/css/styles.css') }}" />

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">

    @stack('styles')
    <style>
        .error {
            color: red;
        }

        .is-invalid {
            border-color: red !important;
        }

        .rounded-full {
            border-radius: 50% !important;
        }

        .search-items {
            display: flex;
            flex-direction: column;
            gap: 32px;
        }

        .bg-lightgray {
            background-color: lightgray !important;
        }

        .image-wrap {
            background-color: lightgray !important;
        }

        .overflow-x-auto::-webkit-scrollbar {
            height: 5px !important;
        }

        .testimonial-item .box-product {
            border-top: none !important;
            padding-top: 0px !important;
            padding-bottom: 20px;
        }

        .pointer-event-none {
            pointer-events: none;
            opacity: 0.5
        }

        .bg-light-primary {
            background-color: #478cd1 !important;
        }

        .bg-light-natural {
            background-color: #47d18c !important;
        }

        .right-0 {
            right: 0 !important;
        }

        .left-0 {
            left: 0 !important;
        }

        .sw-button {
            background-color: #181818 !important;
        }

        .sw-button::before {
            color: #ffffff !important;
        }

        .tf-social-icon.type-2 {
            gap: 15px !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>

<body class="preload-wrapper">

    <button id="scroll-top">
        <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_15741_24194)">
                <path
                    d="M3 11.9175L12 2.91748L21 11.9175H16.5V20.1675C16.5 20.3664 16.421 20.5572 16.2803 20.6978C16.1397 20.8385 15.9489 20.9175 15.75 20.9175H8.25C8.05109 20.9175 7.86032 20.8385 7.71967 20.6978C7.57902 20.5572 7.5 20.3664 7.5 20.1675V11.9175H3Z"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </g>
            <defs>
                <clipPath id="clip0_15741_24194">
                    <rect width="24" height="24" fill="white" transform="translate(0 0.66748)" />
                </clipPath>
            </defs>
        </svg>
    </button>

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->

    <div id="wrapper">
        <!-- topbar -->
        @include('partials.topbar')
        <!-- /topbar -->

        <!-- header -->
        @include('partials.header')
        <!-- /header -->

        @yield('content')

        <!-- .footer -->
        @include('partials.footer')
        <!-- /.footer -->

        <!-- toolbar-bottom -->
        <div class="tf-toolbar-bottom">
            <div class="toolbar-item">
                <a href="shop-default.html">
                    <div class="toolbar-icon">
                        <span class="icon icon-squaresfour"></span>
                    </div>
                    <div class="toolbar-label">Shop</div>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="#shopCategories" data-bs-toggle="offcanvas" aria-controls="shopCategories">
                    <div class="toolbar-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                            viewBox="0 0 256 256">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                            </path>
                        </svg>
                    </div>
                    <div class="toolbar-label">Categories</div>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="#search" data-bs-toggle="modal">
                    <div class="toolbar-icon">
                        <span class="icon icon-search"></span>
                    </div>
                    <div class="toolbar-label">Search</div>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="wish-list.html">
                    <div class="toolbar-icon">
                        <span class="icon icon-heart"></span>
                    </div>
                    <div class="toolbar-label">Wishlist</div>
                </a>
            </div>
            <div class="toolbar-item">
                <a href="#shoppingCart" data-bs-toggle="modal">
                    <div class="toolbar-icon">
                        <span class="icon icon-cart"></span>
                    </div>
                    <div class="toolbar-label">Cart</div>
                </a>
            </div>
        </div>
        <!-- /toolbar-bottom -->
    </div>

    <!-- mobile menu -->
    @include('partials.mobile-menu')
    <!-- /mobile menu -->

    <!-- Categories -->
    {{-- <div class="offcanvas offcanvas-start canvas-filter canvas-categories" id="shopCategories">
        <div class="canvas-wrapper">
            <div class="canvas-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                    viewBox="0 0 256 256">
                    <path
                        d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                    </path>
                </svg>
                <h5>Categories</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
            <div class="canvas-body">
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forChair"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="forChair">
                        <img class="avt" src="images/shop/product-1.jpg" alt="avt">
                        <span class="title">Chair</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forChair" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/shop/product-1.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Saddle Chair</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/shop/product-1.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Ergonomic Chair</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forDesk"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="forDesk">
                        <img class="avt" src="images/shop/popup-slidebar-item-2.jpg" alt="avt">
                        <span class="title">Desk</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forDesk" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/shop/popup-slidebar-item-2.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Office Desk</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/shop/popup-slidebar-item-2.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Standing Desk</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forPhone"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="forPhone">
                        <img class="avt" src="images/shop/product-5.jpg" alt="avt">
                        <span class="title">Phone</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forPhone" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/shop/product-5.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Charging Pad</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/shop/product-5.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Charging Stand</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wd-facet-categories">
                    <div role="dialog" class="facet-title collapsed" data-bs-target="#forLamp"
                        data-bs-toggle="collapse" aria-expanded="true" aria-controls="forLamp">
                        <img class="avt" src="images/gallery/gallery-3.jpg" alt="avt">
                        <span class="title">Lamp</span>
                        <span class="icon icon-down"></span>
                    </div>
                    <div id="forLamp" class="collapse">
                        <ul class="facet-body">
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/gallery/gallery-3.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Reflection Lamp</span></a>
                            </li>
                            <li>
                                <a href="shop-default.html" class="item link"><img class="avt"
                                        src="images/gallery/gallery-3.jpg" alt="avt"><span
                                        class="title-sub text-caption-1 text-secondary">Shore Lamp</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Categories -->

    <x-models.search />
    <x-models.shopping-cart />

    <form class="hidden" id="logout" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('theme/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/lazysize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/multiple-modal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/simpleParallaxVanilla.umd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/main.js') }}"></script>

    <script>
        $(function() {
            $('.get-on-hover').on('mouseenter', function() {
                const imageSrc = $(this).data('image');
                const imageAlt = $(this).data('title');

                $('#productImage')
                    .attr('src', imageSrc)
                    .attr('alt', imageAlt)
                    .data('src', imageSrc);
            });
            $('.get-on-hover').on('mouseleave', function() {
                const imageSrc = "{{ asset('theme/images/banner/collections-1.jpg') }}";
                const imageAlt = "banner-cls";

                $('#productImage')
                    .attr('src', imageSrc)
                    .attr('alt', imageAlt)
                    .data('src', imageSrc);
            });

            function setImagesHeight() {
                const imagesWrap = document.querySelectorAll('.image-wrap');
                imagesWrap.forEach(img => {
                    const width = img.offsetWidth;
                    img.style.height = width + 'px';
                });
            }

            window.addEventListener('load', setImagesHeight);
            window.addEventListener('resize', setImagesHeight);
        });


        async function addToCart(productId, openModal = true, color = "Custom") {
            let dataColor = color;
            if (dataColor !== 'Custom') {
                const ulElement = document.getElementById(`productColor${productId}`);
                const activeLi = ulElement.querySelector("li.active");
                dataColor = activeLi ? activeLi.getAttribute("data-color") : 'Custom';
            }

            $.ajax({
                url: '{{ route('add-to-cart') }}',
                method: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "product_id": productId,
                    "color": dataColor,
                    "quantity": 1,
                },
                success: function(response) {
                    if (response.success) {
                        if (openModal) {
                            refreshCart();
                            $('#shoppingCart').modal('show');
                        } else {
                            return true;
                        }
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON?.errors;
                    let message = xhr.responseJSON?.message || 'Something went wrong';

                    if (errors) {
                        message = Object.values(errors).join('<br>');
                    }

                    alert(message);
                }
            });
        }

        async function addDealToCart(productIds) {
            $('#cartBtn').prop('disabled', true);
            for (const productId of JSON.parse(productIds)) {
                await addToCart(productId, false);
            }

            $('#cartBtn').prop('disabled', false);
            refreshCart();
            $('#shoppingCart').modal('show');
        }

        function refreshCart() {
            Livewire.dispatch('refresh-cart');
        }
    </script>
    @stack('scripts')
    <x-tawk-chat />
</body>

</html>
