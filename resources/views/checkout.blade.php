@extends('layouts.website')

@push('styles')
    <style>
        .pointer-event-none {
            pointer-events: none;
            opacity: 0.5
        }
    </style>
@endpush
@php
    $title = 'Checkout';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="flat-spacing tf-page-checkout">
                        <div class="wrap">
                            {{-- <div class="title-login">
                                <p>Already have an account?</p>
                                <a href="{{ route('login') }}" class="text-button link">Login Here</a>
                            </div> --}}
                            @guest
                                <form class="login-box" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="grid-2">
                                        <input type="text" placeholder="Your Email" name="email"
                                            value="{{ old('email') }}">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <button class="tf-btn btn-onsurface" type="submit">
                                        Login<i class="icon-arrow-up-right"></i>
                                    </button>
                                </form>
                            @endguest
                        </div>
                        <div class="wrap">
                            <x-alert />
                            <h5 class="title">Basic Information</h5>
                            <form class="info-box" action="{{ route('checkout.store') }}" method="post">
                                @csrf

                                <div class="grid-2">
                                    <input type="text" placeholder="First Name*" name="billing_first_name"
                                        value="{{ old('billing_first_name', $userInfo?->billing_first_name) }}" required>
                                    <input type="text" placeholder="Last Name*" name="billing_last_name"
                                        id="billing_last_name"
                                        value="{{ old('billing_last_name', $userInfo?->billing_last_name) }}" required>
                                </div>
                                <div class="grid-2">
                                    <input type="email" placeholder="Email Address*" name="email"
                                        value="{{ old('email', auth()->user()?->email) }}" required>
                                    <input type="tel" name="billing_phone" id="billing_phone"
                                        placeholder="Phone Number*"
                                        value="{{ old('billing_phone', $userInfo?->billing_phone) }}" required>
                                </div>
                                @guest
                                    <div class="grid-1">
                                        <input type="password" placeholder="Password*" name="password">
                                    </div>
                                @endguest

                                <h5 class="title mb-0 pb-0">Billing Information</h5>
                                <div class="grid-1">
                                    <input type="text" name="billing_company_name" id="billing_company"
                                        placeholder="Company Name"
                                        value="{{ old('billing_company_name', $userInfo?->billing_company_name) }}"
                                        required>
                                </div>
                                <div class="tf-select">
                                    <select class="text-title" name="billing_country_id" required>
                                        <option selected value="">
                                            Choose Country/Region</option>
                                        @foreach ($countries as $item)
                                            <option value="{{ $item->id }}" @selected(old('billing_country_id', $userInfo?->billing_country_id) == $item->id)>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid-2">
                                    <input type="text" name="billing_address_1" id="billing_address_1"
                                        placeholder="House number and street..."
                                        value="{{ old('billing_address_1', $userInfo?->billing_address_1) }}" required>
                                    <input type="text" name="billing_address_2" id="billing_address_2"
                                        placeholder="Apartment, suite, unit, etc. (optional)" autocomplete="address-line2"
                                        value="{{ old('billing_address_2', $userInfo?->billing_address_2) }}">
                                </div>
                                <div class="grid-2">
                                    <input type="text" name="billing_city" id="billing_city" placeholder="Town / City"
                                        value="{{ old('billing_city', $userInfo?->billing_city) }}" required>
                                    <input type="text" name="billing_postcode" id="billing_postcode"
                                        placeholder="Postcode / ZIP"
                                        value="{{ old('billing_postcode', $userInfo?->billing_postcode) }}" required>
                                </div>

                                <fieldset class="d-flex align-items-center gap-10">
                                    <input type="checkbox" id="ship-to-different-address-checkbox"
                                        name="ship_to_different_address" value="1" @checked(old('ship_to_different_address') === '1')>
                                    <label for="ship-to-different-address-checkbox">
                                        Ship to a different address? </a>
                                    </label>
                                </fieldset>

                                <div id="shippingInfo"
                                    class="info-box {{ old('ship_to_different_address') !== '1' ? 'd-none' : '' }}">
                                    <h5 class="title mb-0 pb-0">Shipping Information</h5>
                                    <div class="grid-2">
                                        <input type="text" placeholder="First Name*" name="shipping_first_name"
                                            value="{{ old('shipping_first_name', $userInfo?->shipping_first_name) }}">
                                        <input type="text" placeholder="Last Name*" name="shipping_last_name"
                                            id="shipping_last_name"
                                            value="{{ old('shipping_last_name', $userInfo?->shipping_last_name) }}">
                                    </div>
                                    <div class="grid-1">
                                        <input type="text" name="shipping_company_name" id="shipping_company"
                                            placeholder="Company Name"
                                            value="{{ old('shipping_company_name', $userInfo?->shipping_company_name) }}">
                                    </div>
                                    <div class="tf-select">
                                        <select class="text-title" name="shipping_country_id">
                                            <option selected value="">
                                                Choose Country/Region</option>
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->id }}" @selected(old('shipping_country_id', $userInfo?->shipping_country_id) == $item->id)>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="grid-2">
                                        <input type="text" name="shipping_address_1" id="shipping_address_1"
                                            placeholder="House number and street..."
                                            value="{{ old('shipping_address_1', $userInfo?->shipping_address_1) }}">
                                        <input type="text" name="shipping_address_2" id="shipping_address_2"
                                            placeholder="Apartment, suite, unit, etc. (optional)"
                                            autocomplete="address-line2"
                                            value="{{ old('shipping_address_2', $userInfo?->shipping_address_2) }}">
                                    </div>
                                    <div class="grid-2">
                                        <input type="text" name="shipping_city" id="shipping_city"
                                            placeholder="Town / City"
                                            value="{{ old('shipping_city', $userInfo?->shipping_city) }}">
                                        <input type="text" name="shipping_postcode" id="shipping_postcode"
                                            placeholder="Postcode / ZIP"
                                            value="{{ old('shipping_postcode', $userInfo?->shipping_postcode) }}">
                                    </div>
                                </div>

                                <div class="grid-1">
                                    <label for="order_comments">Please specify a best time to reach
                                        you
                                        as well as any notes about your order, e.g. special notes for delivery*</label>
                                    <textarea id="order_comments" name="order_comments" placeholder="I'm free at 2pm each day at 555-555-5555" required>{{ old('order_comments') }}</textarea>
                                </div>

                                <div class="grid-1">
                                    <strong class="">Material Surcharge and Shipping and Handling </strong>
                                    <p class="">Surcharge is based on current market pricing and will not apply if
                                        not
                                        incurred by {{ config('app.name') }}. Surcharge may be increased, reduced or
                                        eliminated based on market conditions. Shipping and handling may be applied to your
                                        quote.</p>
                                </div>


                                <button type="submit" class="tf-btn btn-onsurface w-full mt-3">Payment<i
                                        class="icon-arrow-up-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1">
                    <div class="line-separation"></div>
                </div>
                <div class="col-xl-5">
                    <div class="flat-spacing flat-sidebar-checkout">
                        <div class="sidebar-checkout-content">
                            <h5 class="title">Shopping Cart</h5>
                            <div class="list-product">
                                @php
                                    $cartTotal = 0;
                                @endphp
                                @foreach ($cartItems as $item)
                                    @php
                                        $viewLink = route('products.show', [
                                            'type' => $item->product->type,
                                            'slug' => $item->product->slug,
                                        ]);
                                        $itemTotal = $item->price * $item->quantity;
                                        $cartTotal += $itemTotal;
                                    @endphp
                                    <div class="item-product">
                                        <a href="{{ $viewLink }}" class="img-product">
                                            <img src="{{ $item->product->image }}" alt="img-product">
                                        </a>
                                        <div class="content-box">
                                            <div class="info">
                                                <a href="{{ $viewLink }}"
                                                    class="name-product link text-title">{{ $item->product->name ?? 'N/A' }}</a>
                                                <div class="variant text-caption-1 text-capitalize">
                                                    {{ $item->color }}
                                                </div>
                                            </div>
                                            <div class="total-price text-button">
                                                <span class="count">{{ $item->quantity }}</span>
                                                X<span class="price">${{ number_format($item->price, 2) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            {{-- <div class="sec-discount">
                                <div class="ip-discount-code">
                                    <input type="text" placeholder="Add voucher discount">
                                    <button class="tf-btn  btn-onsurface">
                                        Apply Code
                                    </button>
                                </div>
                                <p class="text-body-default">Discount code is only used for orders with a total
                                    value of products over
                                    $500.00</p>
                            </div> --}}
                            <div class="sec-total-price">
                                <div class="top">
                                    <div class="item d-flex align-items-center justify-content-between text-button">
                                        <span>Shipping</span>
                                        <span>Free</span>
                                    </div>
                                    <div class="item d-flex align-items-center justify-content-between text-button">
                                        <span>Discounts</span>
                                        <span>-$00.00</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <h5 class="d-flex justify-content-between">
                                        <span>Total</span>
                                        <span class="total-price-checkout">${{ number_format($cartTotal, 2) }}</span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        $('#ship-to-different-address-checkbox').on('change', function() {
            if ($(this).is(":checked")) {
                $('#shippingInfo').removeClass('d-none');
            } else {
                $('#shippingInfo').addClass('d-none');
            }
        })
    </script>
@endpush
