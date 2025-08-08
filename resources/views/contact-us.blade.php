@extends('layouts.website')

@php
    $title = 'Contact Us';
    $category = request()->get('category');
    $requiredBorder = border_required($category);
    $productsOfInterest = [
        'Commercial Playgrounds',
        'Shade & Shelter',
        'Site Amenities',
        'Early Childhood',
        'Dog Park',
        'Outdoor Fitness',
        'Safety Surfacing',
        'Independent Play',
    ];
    $organizationtypes = [
        'Parks & Recreation',
        'Preschools & Daycares',
        'Public & Private Schools',
        'Churches & Faith Centers',
        'Attractions & Hospitality Venues',
        'Healthcare Facilities',
        'Multifamily Properties',
        'Landscape Architects',
        'Municipalities',
        'HOA',
        'Other',
    ];
@endphp
@section('title', $title)
@push('styles')
    <style>
        select {
            font-family: "Marcellus", sans-serif;
            border: 2px solid var(--line);
            outline: 0;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            font-size: 16px;
            line-height: 26px;
            padding: 11px 16px;
            width: 100%;
            background: var(--White);
            color: var(--Secondary);
            font-weight: 400;
            border-radius: 8px;
        }
    </style>
@endpush

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];
    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <section class="flat-spacing">
        <div class="container">
            <div class="contact-us-content">
                <x-alert />
                <div class="row">
                    <div class="col-lg-4 mb-lg-30">
                        <h4 class="mb_30 wow fadeInUp">{{ config('app.name') }}</h4>
                        <div class="mb_28">
                            <h6 class="mb_8">Address:</h6>
                            <p class="text-body-default">10845 Church Lane, Houston, TX 77043, USA</p>
                        </div>
                        <div class="mb_28">
                            <h6 class="mb_8">Phone:</h6>
                            <a href="tel:+18889352112" class="text-body-default">+1 888 935 2112</a>
                        </div>
                        <div class="mb_28">
                            <h6 class="mb_8">Email:</h6>
                            <p class="text-body-default">example@example.com</p>
                        </div>
                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <h4 class="mb_7 wow fadeInUp">Get In Touch</h4>
                        <p class="text_secondary mb_24 wow fadeInUp" data-wow-delay="0.1s">Questions for YoungCreek
                            Recreational, LLC? One of our friendly APS team members will get back to you as soon as
                            possible.
                        </p>
                        <form id="form" action="{{ route('contacts.store') }}" method='POST'
                            class="form-leave-comment" onsubmit="return validateMultipleOf4()">
                            @csrf
                            <div class="wrap">
                                <div class="cols">
                                    <fieldset class="">
                                        <input class="@error('first_name') is-invalid @enderror" type="text"
                                            placeholder="First Name*" name="first_name" id="first_name" tabindex="2"
                                            value="{{ old('first_name') }}" aria-required="true" required="">
                                        @error('first_name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="">
                                        <input class="@error('last_name') is-invalid @enderror" type="text"
                                            placeholder="Last Name*" name="last_name" id="last_name" tabindex="2"
                                            value="{{ old('last_name') }}" aria-required="true" required="">
                                        @error('last_name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="cols">
                                    <fieldset class="">
                                        <input class="@error('email') is-invalid @enderror" type="email"
                                            placeholder="Email Address*" name="email" id="email" tabindex="2"
                                            value="{{ old('email') }}" aria-required="true" required="">
                                        @error('email')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="">
                                        <input class="@error('phone_number') is-invalid @enderror" type="text"
                                            placeholder="Phone Number*" name="phone_number" id="phone_number" tabindex="2"
                                            value="{{ old('phone_number') }}" aria-required="true" required="">
                                        @error('phone_number')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>

                                <div class="cols">
                                    <fieldset class="">
                                        <h6 class="mb_7 text-title">Product Lines of Interest</h6>
                                        @foreach ($productsOfInterest as $item)
                                            <div class="tf-cart-checkbox mb-2">
                                                <div class="tf-checkbox-wrapp">
                                                    <input class="" type="checkbox"
                                                        id="{{ str($item)->slug()->value }}" name="product_interest[]"
                                                        value="{{ $item }}" @checked(in_array($item, old('product_interest') ?? []))>
                                                    <div>
                                                        <i class="icon-check"></i>
                                                    </div>
                                                </div>
                                                <label for="{{ str($item)->slug()->value }}">{{ $item }}</label>
                                            </div>
                                        @endforeach

                                    </fieldset>
                                </div>

                                <div class="cols">
                                    <fieldset class="">
                                        <input class="@error('organization_name') is-invalid @enderror" type="text"
                                            placeholder="Organization Name*" name="organization_name" id="organization_name"
                                            tabindex="2" value="{{ old('organization_name') }}" aria-required="true"
                                            required="">
                                        @error('organization_name')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="">
                                        {{-- tf-select tf-product-bundle-variant --}}
                                        <div class="">
                                            <select class="@error('organization_type') is-invalid @enderror"
                                                name="organization_type" required>
                                                <option value="">Organization Type*</option>
                                                @foreach ($organizationtypes as $type)
                                                    <option value="{{ $type }}" @selected(old('organization_type') === $type)>
                                                        {{ $type }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        @error('organization_type')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>

                                <div class="cols">
                                    @if ($requiredBorder)
                                        <fieldset class="">
                                            <input class="@error('border_length') is-invalid @enderror" type="number"
                                                placeholder="Border Length*" name="border_length" id="border_length"
                                                tabindex="2" value="{{ old('border_length') }}" aria-required="true">
                                            <span class="text-muted">Multiple of 4 as each border is 4 feets long.</span>
                                            <p id="borderError" class="error"></p>
                                            @error('border_length')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </fieldset>
                                    @endif

                                    <fieldset class="">
                                        <input class="@error('budget') is-invalid @enderror" type="text"
                                            placeholder="Budget*" name="budget" id="budget" tabindex="2"
                                            value="{{ old('budget') }}" aria-required="true" required="">
                                        @error('budget')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </fieldset>
                                </div>

                                <fieldset class="">
                                    <textarea class="@error('message') is-invalid @enderror" name="message" id="message" rows="4"
                                        placeholder="Your Message*" tabindex="2" aria-required="true" required="">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <fieldset>
                                    <div class="tf-cart-checkbox">
                                        <div class="tf-checkbox-wrapp">
                                            <input class="" type="checkbox" id="out-of-mailing-list"
                                                name="out_of_mailing_list" @checked(old('out_of_mailing_list') === 'on')>
                                            <div>
                                                <i class="icon-check"></i>
                                            </div>
                                        </div>
                                        <label for="out-of-mailing-list">Opt Out Of Our Mailing List
                                        </label>
                                    </div>
                                </fieldset>

                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}">
                                </div>
                            </div>



                            <div class="button-submit send-wrap">
                                <button class="tf-btn btn-onsurface" type="submit">
                                    Send Message <i class="icon-arrow-up-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- map -->
    <div class="wrap-map">
        <div id="map-contact" class="map-contact h590" data-map-zoom="16" data-map-scroll="true"></div>
    </div>
    <!-- /map -->

@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuSiPhoDaOJ7aqtJVtQhYhLzwwJ7rQlmA"></script>
    <script type="text/javascript" src="{{ asset('theme/js/map-contact.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/marker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/infobox.min.js') }}"></script>
    <script>
        function validateMultipleOf4() {
            if ("{{ !$requiredBorder }}") return true;
            const input = document.getElementById('border').value;
            const errorSpan = document.getElementById('borderError');

            if (input % 4 !== 0) {
                errorSpan.textContent = "Border length must be a multiple of 4.";
                return false;
            }

            errorSpan.textContent = "";
            return true;
        }
    </script>
@endpush
