@extends('layouts.website')

@php
    $title = 'Address';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- main-content -->
    <div class="main-content">

        <div class="btn-sidebar-account">
            <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount">
                <i class="icon icon-squaresfour"></i>
            </button>
        </div>

        <section class="flat-spacing">
            <div class="container">
                <x-alert />
                <div class="my-account-wrap">
                    @include('partials.auth-sidebar')
                    <div class="my-account-content">
                        <div class="account-address">
                            <div class="text-center widget-inner-address">
                                <div class="list-account-address">
                                    <div class="account-address-item">
                                        <h6 class="mb_20">Billing Address</h6>
                                        <p>{{ $userInfo?->billing_company_name }}</p>
                                        <p>{{ $userInfo?->billing_first_name }} {{ $userInfo?->billing_last_name }}</p>
                                        <p>{{ $userInfo?->billing_address_1 }}</p>
                                        @if ($userInfo?->billing_address_2)
                                            <p>{{ $userInfo->billing_address_2 }}</p>
                                        @endif

                                        <p>{{ $userInfo?->billing_city }}</p>
                                        <p>{{ $userInfo?->billingCountry?->name }}</p>
                                        <p>{{ $userInfo?->billing_postcode }}</p>
                                        <p>{{ $userInfo?->billing_email }}</p>
                                        <p class="mb_10">{{ $userInfo?->billing_phone }}</p>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <button
                                                class="tf-btn radius-4 btn-onsurface justify-content-center btn-edit-address">
                                                Edit
                                            </button>
                                            <form action="{{ route('my-account.address.copy-billing') }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="tf-btn radius-4 btn-onsurface justify-content-center">
                                                    Copy Billing to Shipping Address
                                                </button>
                                            </form>

                                        </div>
                                        @php
                                            $billingFields = [
                                                'billing_first_name',
                                                'billing_last_name',
                                                'billing_phone',
                                                'billing_company_name',
                                                'billing_country_id',
                                                'billing_address_1',
                                                'billing_address_2',
                                                'billing_city',
                                                'billing_postcode',
                                                'billing_email',
                                            ];

                                            $hasBillingErrors = collect($billingFields)->some(
                                                fn($field) => $errors->has($field),
                                            );
                                        @endphp
                                        <form
                                            class="edit-form-address wd-form-address {{ $hasBillingErrors ? 'd-block' : '' }}"
                                            action="{{ route('my-account.address.billing') }}" method="post">
                                            @csrf
                                            <div class="title">Edit billing address</div>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_company_name') is-invalid @enderror"
                                                    type="text" placeholder="Company Name*" name="billing_company_name"
                                                    tabindex="2"
                                                    value="{{ old('billing_company_name', $userInfo?->billing_company_name) }}"
                                                    aria-required="true">
                                                @error('billing_company_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_first_name') is-invalid @enderror"
                                                    type="text" placeholder="First Name*" name="billing_first_name"
                                                    tabindex="2"
                                                    value="{{ old('billing_first_name', $userInfo?->billing_first_name) }}"
                                                    aria-required="true" required>
                                                @error('billing_first_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_last_name') is-invalid @enderror"
                                                    type="text" placeholder="Last Name*" name="billing_last_name"
                                                    tabindex="2"
                                                    value="{{ old('billing_last_name', $userInfo?->billing_last_name) }}"
                                                    aria-required="true" required>
                                                @error('billing_last_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_email') is-invalid @enderror" type="email"
                                                    placeholder="Email Address*" name="billing_email" tabindex="2"
                                                    value="{{ old('billing_email', $userInfo?->billing_email) }}"
                                                    aria-required="true" required="">
                                                @error('billing_email')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="mb_20">
                                                <input class="@error('billing_phone') is-invalid @enderror" type="tel"
                                                    placeholder="Phone*" name="billing_phone" tabindex="2"
                                                    value="{{ old('billing_phone', $userInfo?->billing_phone) }}"
                                                    aria-required="true" required="">
                                                @error('billing_phone')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_address_1') is-invalid @enderror"
                                                    type="text" placeholder="Address 1*" name="billing_address_1"
                                                    tabindex="2"
                                                    value="{{ old('billing_address_1', $userInfo?->billing_address_1) }}"
                                                    aria-required="true" required="">
                                                @error('billing_address_1')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_address_2') is-invalid @enderror"
                                                    type="text" placeholder="Address 2 (Optional)"
                                                    name="billing_address_2" tabindex="2"
                                                    value="{{ old('billing_address_2', $userInfo?->billing_address_2) }}"
                                                    aria-required="true" required="">
                                                @error('billing_address_2')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <div class="tf-select mb_20">
                                                <select class="text-title @error('billing_country_id') is-invalid @enderror"
                                                    name="billing_country_id">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" @selected(old('billing_country_id', $userInfo?->billing_country_id) == $country->id)>
                                                            {{ $country->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('billing_country_id')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_city') is-invalid @enderror" type="text"
                                                    placeholder="City*" name="billing_city" tabindex="2"
                                                    value="{{ old('billing_city', $userInfo?->billing_city) }}"
                                                    aria-required="true" required="">
                                                @error('billing_city')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('billing_postcode') is-invalid @enderror"
                                                    type="text" placeholder="Postcode*" name="billing_postcode"
                                                    tabindex="2"
                                                    value="{{ old('billing_postcode', $userInfo?->billing_postcode) }}"
                                                    aria-required="true" required="">
                                                @error('billing_postcode')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <div class="d-flex flex-column gap-20">
                                                <button type="submit" class="tf-btn w-full btn-onsurface radius-4">
                                                    Add address
                                                </button>
                                                <span class="tf-btn btn-onsurface w-full radius-4 btn-hide-edit-address">
                                                    Cancel
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="account-address-item">
                                        <h6 class="mb_20">Shipping Address</h6>
                                        <p>{{ $userInfo?->shipping_company_name }}</p>
                                        <p>{{ $userInfo?->shipping_first_name }} {{ $userInfo?->shipping_last_name }}</p>
                                        <p>{{ $userInfo?->shipping_address_1 }}</p>
                                        @if ($userInfo?->shipping_address_2)
                                            <p>{{ $userInfo->shipping_address_2 }}</p>
                                        @endif

                                        <p>{{ $userInfo?->shipping_city }}</p>
                                        <p>{{ $userInfo?->shippingCountry?->name }}</p>
                                        <p>{{ $userInfo?->shipping_postcode }}</p>

                                        <p>{{ $userInfo?->shipping_email }}</p>
                                        <p class="mb_10">{{ $userInfo?->shipping_phone }}</p>
                                        <div class="d-flex gap-10 justify-content-center">
                                            <button
                                                class="tf-btn radius-4 btn-onsurface justify-content-center btn-edit-address">
                                                Edit
                                            </button>
                                        </div>
                                        @php
                                            $shippingFields = [
                                                'shipping_first_name',
                                                'shipping_last_name',
                                                'shipping_phone',
                                                'shipping_company_name',
                                                'shipping_country_id',
                                                'shipping_address_1',
                                                'shipping_address_2',
                                                'shipping_city',
                                                'shipping_postcode',
                                                'shipping_email',
                                            ];

                                            $hasShippingErrors = collect($shippingFields)->some(
                                                fn($field) => $errors->has($field),
                                            );
                                        @endphp
                                        <form
                                            class="edit-form-address wd-form-address {{ $hasShippingErrors ? 'd-block' : '' }}"
                                            action="{{ route('my-account.address.shipping') }}" method="post">
                                            @csrf

                                            <div class="title">Edit shipping address</div>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_company_name') is-invalid @enderror"
                                                    type="text" placeholder="Company Name*"
                                                    name="shipping_company_name" tabindex="2"
                                                    value="{{ old('shipping_company_name', $userInfo?->shipping_company_name) }}"
                                                    aria-required="true">
                                                @error('shipping_company_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_first_name') is-invalid @enderror"
                                                    type="text" placeholder="First Name*" name="shipping_first_name"
                                                    tabindex="2"
                                                    value="{{ old('shipping_first_name', $userInfo?->shipping_first_name) }}"
                                                    aria-required="true" required>
                                                @error('shipping_first_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_last_name') is-invalid @enderror"
                                                    type="text" placeholder="Last Name*" name="shipping_last_name"
                                                    tabindex="2"
                                                    value="{{ old('shipping_last_name', $userInfo?->shipping_last_name) }}"
                                                    aria-required="true" required>
                                                @error('shipping_last_name')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_email') is-invalid @enderror"
                                                    type="email" placeholder="Email Address*" name="shipping_email"
                                                    tabindex="2"
                                                    value="{{ old('shipping_email', $userInfo?->shipping_email) }}"
                                                    aria-required="true" required="">
                                                @error('shipping_email')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>

                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_phone') is-invalid @enderror"
                                                    type="tel" placeholder="Phone*" name="shipping_phone"
                                                    tabindex="2"
                                                    value="{{ old('shipping_phone', $userInfo?->shipping_phone) }}"
                                                    aria-required="true" required="">
                                                @error('shipping_phone')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_address_1') is-invalid @enderror"
                                                    type="text" placeholder="Address 1*" name="shipping_address_1"
                                                    tabindex="2"
                                                    value="{{ old('shipping_address_1', $userInfo?->shipping_address_1) }}"
                                                    aria-required="true" required="">
                                                @error('shipping_address_1')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_address_2') is-invalid @enderror"
                                                    type="text" placeholder="Address 2 (Optional)"
                                                    name="shipping_address_2" tabindex="2"
                                                    value="{{ old('shipping_address_2', $userInfo?->shipping_address_2) }}"
                                                    aria-required="true" required="">
                                                @error('shipping_address_2')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <div class="tf-select mb_20">
                                                <select
                                                    class="text-title @error('shipping_country_id') is-invalid @enderror"
                                                    name="shipping_country_id">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}" @selected(old('shipping_country_id', $userInfo?->shipping_country_id) == $country->id)>
                                                            {{ $country->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('shipping_country_id')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_city') is-invalid @enderror"
                                                    type="text" placeholder="City*" name="shipping_city"
                                                    tabindex="2"
                                                    value="{{ old('shipping_city', $userInfo?->shipping_city) }}"
                                                    aria-required="true" required="">
                                                @error('shipping_city')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="mb_20">
                                                <input class="@error('shipping_postcode') is-invalid @enderror"
                                                    type="text" placeholder="Postcode*" name="shipping_postcode"
                                                    tabindex="2"
                                                    value="{{ old('shipping_postcode', $userInfo?->shipping_postcode) }}"
                                                    aria-required="true" required="">
                                                @error('shipping_postcode')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                            </fieldset>
                                            <div class="d-flex flex-column gap-20">
                                                <button type="submit" class="tf-btn btn-onsurface w-full radius-4">
                                                    Add address
                                                </button>
                                                <span class="tf-btn btn-onsurface radius-4 w-full btn-hide-edit-address">
                                                    Cancel
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
