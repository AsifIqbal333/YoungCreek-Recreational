@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/plastic playground 1.jpg')],
        ['title' => '', 'path' => asset('images/Liverpool-NSW-Australia-1-1.jpg')],
        ['title' => '', 'path' => asset('images/versitexaquaticcentre-7.jpg')],
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
                        <h5 class="terms-of-use-title">APS Plastic Playground Borders</h5>
                        <div class="terms-of-use-content">
                            <p>Do your playground borders help you monitor surfacing levels and indicate when more material
                                is
                                needed? Ours do!</p>
                            <p>Designed as a long-term alternative to traditional wood timbers, our playground borders
                                provide a
                                permanent, maintenance-free solution to keeping safety surfacing in place. Backed by a
                                10-year
                                limited warranty, they ensure your playground remains safe and well-maintained for years to
                                come.
                            </p>
                            <p>We offer a complete range of accessories for our 8-inch and 12-inch playground borders. Our
                                1-foot
                                border kit is ideal for framing play zones in areas where space is limited and a section
                                shorter
                                than 4 feet is required. Each kit includes:</p>
                            <ul>
                                <li>Two 1-foot border sections</li>
                                <li>Two 6-inch filler ends</li>
                                <li>Two 12-inch, 100-spike components</li>
                            </ul>
                            <p>For added flexibility, our 4-inch and 6-inch filler ends help create a seamless finish when a
                                connecting border is not present. The 4-inch filler ends are designed for 8-inch playground
                                borders,
                                while the 6-inch filler ends are compatible with 12-inch high borders. Both options are
                                available in
                                boxes of six.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Our unique surfacing guide acts as a built-in ruler, allowing you to easily monitor
                                surfacing depth and ensure compliance with safety standards. At a glance, you can determine
                                whether more material is needed to maintain a safe play environment.',
                            'Additionally, the snap-in-spike system allows each border and spike to ship as a single
                                unit, reducing the risk of lost parts and making installation faster and more efficient.',
                        ];
                        $specifications = [
                            'Each border measures 52 inches in length, 4 inches in width, and comes in either 8-inch or
                                12-inch height options .',
                            'When installed, each border provides 4 feet of linear coverage.',
                            'Features an innovative surfacing guide to help maintain appropriate safety surfacing levels.',
                            'Patented snap-in-spike system simplifies installation and ensures all components arrive
                                intact Durable and weather-resistant for long-term performance.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" />
                </div>
            </div>
        </div>
    </section>

    <x-website.safety-contact :category="$category" />

@endsection
