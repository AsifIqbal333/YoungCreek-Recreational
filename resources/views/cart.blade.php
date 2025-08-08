@extends('layouts.website')

@php
    $title = 'Shopping Cart';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    @if ($cartItems == 0)
        <div class="container d-flex align-items-center justify-content-center py-5">
            <div class="row">
                <article class="page-article col-xxs-12 col-sm-8 col-sm-push-2">
                    <x-alert />
                    <div class="woocommerce text-center">
                        <h3 class="cart-empty">Your cart is currently empty!</h3>

                        <img class="img-responsive push-bottom empty-cart-img" src="{{ asset('images/empty-cart2.jpg') }}">

                        <div class="d-flex align-items-center gap-10">
                            <a class="tf-btn btn-onsurface" href="{{ route('products') }}">Return To Shop</a>
                            <a class="tf-btn btn-primary" href="{{ route('wish-list.index') }}">View Your Wishlist</a>
                        </div>

                    </div>
                </article>

            </div>
        </div>
    @else
        <!-- section-cart -->
        <livewire:cart />
        <!-- section-cart -->

        <!-- Related Products -->
        <x-feature-products :products="$featuresProducts" />
        <!-- /Related Products -->
    @endif

@endsection
