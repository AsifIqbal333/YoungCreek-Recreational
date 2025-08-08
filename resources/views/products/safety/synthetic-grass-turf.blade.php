@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/synthetic grass 2.jpg')],
        ['title' => '', 'path' => asset('images/synthetic grass 3.jpg')],
        ['title' => '', 'path' => asset('images/synthetic grass 1.jpg')],
    ];

    $colors = [
        ['title' => 'Diamond Pro Fescue', 'path' => asset('images/Copy-of-Diamond-Pro-Fescue.jpg')],
        ['title' => 'Everlast Pet Turf', 'path' => asset('images/Copy-of-Everlast-Pet-Turf-2016.jpg')],
        ['title' => 'Everglade Fescue Pro', 'path' => asset('images/Copy-of-Everglade-Fescue-Pro-2016.jpg')],
        ['title' => 'Everglade Fescue', 'path' => asset('images/Copy-of-Everglade-Fescue-2016-1000x1000.jpg')],
    ];
@endphp

@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [
            ['title' => 'Products', 'href' => route('products')],
            ['title' => $productCategory['title'], 'href' => route('categories.show', $productCategory['slug'])],
        ];
    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <x-image-slider :images="$images" />

    <section class="flat-spacing pt-0 pb-0">
        <div class="container">
            <div class="terms-of-use-wrap">
                <div class="right">
                    <div class="terms-of-use-item item-scroll-target">
                        <h5 class="terms-of-use-title">Synthetic Grass TURF</h5>
                        <div class="terms-of-use-content">
                            Synthetic Grass TURF
                        </div>
                    </div>
                    @php
                        $items = [
                            'Creates a clean, safe, and allergen-free play environment.',
                            'Stays cooler than many other playground surfacing materials.',
                            'Natural grass-like appearance and feel.',
                            'Requires minimal upkeep—no watering or mowing needed.',
                        ];
                        $specifications = [
                            'Installed by certified professionals to ensure safety and durability.',
                            'Constructed with multiple layers, including a shock-absorbing foam cushion and a compacted rock sub-base.',
                            'Available in different face weights and pile heights to suit project needs.',
                            'Two types of infill options to enhance durability and comfort.',
                            'ASTM F1292 compliant for various fall height protection requirements.',
                            'Periodic raking recommended to evenly distribute infill and maintain blade integrity.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" />
                </div>
            </div>
        </div>
    </section>

    <x-image-slider :images="$colors" heading="SYNTHETIC GRASS COLOR OPTIONS" class="pb-0" :rounded="true" />

    <x-website.safety-contact />

@endsection
