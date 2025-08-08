<header id="header" class="header-default">
    <div class="main-header">
        <div class="container-full">
            <div class="row wrapper-header align-items-center">
                <div class="col-xl-5 d-none d-xl-block">
                    <nav class="box-navigation text-center">
                        <ul class="box-nav-ul justify-content-start">
                            @foreach (menues() as $menu)
                                @if ($menu['title'] === 'Products')
                                    <li class="menu-item">
                                        <a href="javascript:void(0)"
                                            class="item-link text-uppercase">{{ $menu['title'] }}<i
                                                class="icon icon-down"></i></a>
                                        <div class="sub-menu mega-menu mega-menu-1">
                                            <div class="container">
                                                <div class="row-demo-1">
                                                    <div class="mega-menu-list">
                                                        @foreach ($menu['items'] as $category)
                                                            <div class="mega-menu-item">
                                                                <div class="menu-heading text-title">
                                                                    {{ $category['title'] }}
                                                                </div>
                                                                <ul class="menu-list">
                                                                    @foreach ($category['items'] as $item)
                                                                        <li><a href="{{ route('products.index', ['type' => $category['type'], 'category' => $item['category']]) }}"
                                                                                class="menu-link-text text_secondary link get-on-hover"
                                                                                data-image="{{ $item['image'] }}"
                                                                                data-title="{{ $item['title'] }}">{{ $item['title'] }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endforeach

                                                        <div class="mega-menu-item">
                                                            <div class="collection-position hover-img style-4">
                                                                <a href="javascript:void(0)" class="img-style w-100">
                                                                    <img id="productImage" class="lazyload"
                                                                        data-src="{{ asset('theme/images/banner/collections-1.jpg') }}"
                                                                        src="{{ asset('theme/images/banner/collections-1.jpg') }}"
                                                                        alt="banner-cls">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li class="menu-item position-relative">
                                        <a href="javascript:void(0)"
                                            class="item-link text-uppercase">{{ $menu['title'] }}<i
                                                class="icon icon-down"></i></a>
                                        <div class="sub-menu submenu-default">
                                            <ul class="menu-list">
                                                @foreach ($menu['items'] as $item)
                                                    <li><a href="{{ $item['href'] }}"
                                                            class="menu-link-text">{{ $item['title'] }}</a></li>
                                                @endforeach

                                            </ul>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-md-4 col-2 d-xl-none">
                    <a href="#mobileMenu" class="mobile-menu" data-bs-toggle="offcanvas" aria-controls="mobileMenu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                            viewBox="0 0 256 256">
                            <path
                                d="M224,128a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,128ZM40,72H216a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16ZM216,184H40a8,8,0,0,0,0,16H216a8,8,0,0,0,0-16Z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="col-xl-2 col-md-4 col-8 text-center">
                    <a href="{{ route('homepage') }}" class="logo-header">
                        <img src="{{ asset('logo.png') }}" alt="logo" class="logo">
                    </a>
                </div>
                <div class="col-xl-5 col-md-4 col-2">
                    <ul class="nav-icon">
                        <li class="nav-search">
                            <a href="#search" data-bs-toggle="modal" class="nav-icon-item">
                                <span class="icon icon-search"></span>
                            </a>
                        </li>
                        <li class="nav-account">
                            <a href="{{ route('my-account.index') }}" class="nav-icon-item">
                                <span class="icon icon-user"></span>
                            </a>
                        </li>
                        <li class="nav-wishlist">
                            <a href="{{ route('wish-list.index') }}" class="nav-icon-item">
                                <span class="icon icon-heart"></span>
                            </a>
                        </li>
                        {{-- <li class="nav-cart"><a href="#shoppingCart" data-bs-toggle="modal" class="nav-icon-item"> --}}
                        @php
                            $cartItems = \App\Models\Cart::query()
                                ->with(['product'])
                                ->when(
                                    auth()->check(),
                                    fn($q) => $q
                                        ->where('session_id', session()->getId())
                                        ->orWhere('user_id', auth()->id()),
                                    fn($q) => $q->where('session_id', session()->getId()),
                                )
                                ->sum('quantity');
                        @endphp
                        <li class="nav-cart"><a href="{{ route('cart.index') }}" class="nav-icon-item">
                                <span class="icon icon-cart"></span>
                                <span class="count-box text-button-small">{{ $cartItems }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
