@extends('layouts.account')

@section('title', 'Wishlist')

@section('content')
    <header class="masthead masthead--innerpage" id="masthead">
        <div class="container container-fluid">
            <div class="masthead-content">
                <h1 class="page-title">
                    Wishlist </h1>

                <div class="breadcrumbs" id="breadcrumbs"><span><span><a href="{{ url('/') }}">Homes</a></span> <span
                            class="separator">|</span>
                        <span class="breadcrumb_last" aria-current="page">Wishlist</span></span></div>
            </div>
        </div>
    </header>

    <section class="section section--highlight container container--fluid contact">
        <div class="row">
            <article class="page-article col-xxs-12">
                <x-alert />
                @if ($wishlist == 0)
                    <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                        <div class="tinv-header">
                            <h2>My Wishlist</h2>
                        </div>
                        <p class="cart-empty woocommerce-info">
                            Your Wishlist is currently empty. </p>

                        <p class="return-to-shop">
                            <a class="button wc-backward" href="{{ route('products') }}">Return To
                                Shop</a>
                        </p>
                    </div>
                @else
                    <div class="woocommerce">
                        @include('layouts.website.auth-navigation')

                        <div class="col-xxs-12 col-sm-8 col-md-push-1">
                            <div class="tinv-wishlist woocommerce tinv-wishlist-clear">
                                <div class="tinv-header">
                                    <h2>My Wishlist</h2>
                                </div>
                                <div class="custom-wishlist-content">
                                    To add a product to your cart, click on the blue product name, then select the "Add to
                                    Quote" button on that
                                    page.<br>
                                    To remove a product from your wishlist, click the "x" next to the product image.
                                </div>

                                @livewire('wishlists')

                                <div class="social-buttons">
                                    <span>Share on</span>
                                    <ul>
                                        <li><a href="https://api.whatsapp.com/send?text={{ urlencode(route('wish-list.index')) }}"
                                                class="social social-whatsapp dark" title="WhatsApp"><i
                                                    class="ftinvwl ftinvwl-whatsapp"></i></a></li>
                                        <li><a href="{{ route('wish-list.index') }}" class="social social-clipboard "
                                                title="Clipboard" onclick="copyToClipboard()"><i
                                                    class="ftinvwl ftinvwl-clipboard"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
            </article>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function copyToClipboard() {
            if (navigator.clipboard) {
                // Modern way with clipboard API
                navigator.clipboard.writeText("{{ route('wish-list.index') }}").then(() => {
                    console.log("Copied to clipboard successfully!");
                }).catch(err => {
                    console.error("Clipboard API failed, falling back...", err);
                });
            } else {
                console.error("navigator clipboard not avaialble.");

            }
        }
    </script>
@endpush
