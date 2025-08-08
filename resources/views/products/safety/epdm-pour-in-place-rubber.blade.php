@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/EPDM Poured-in-Place Rubber Surfacing2.jpg')],
        ['title' => '', 'path' => asset('images/EPDM Poured-in-Place Rubber Surfacing3.jpg')],
        ['title' => '', 'path' => asset('images/EPDM Poured-in-Place Rubber Surfacing4.jpg')],
        ['title' => '', 'path' => asset('images/EPDM Poured-in-Place Rubber Surfacing 1.jpg')],
    ];
    $colors = [
        ['title' => 'Black', 'path' => asset('images/black-1.png')],
        ['title' => 'Blue', 'path' => asset('images/blue.png')],
        ['title' => 'Brown', 'path' => asset('images/brown-1.png')],
        ['title' => 'Green', 'path' => asset('images/green-1.png')],
        ['title' => 'Light Beige', 'path' => asset('images/light-beige-1.png')],
        ['title' => 'Light Gray', 'path' => asset('images/light-gray-1.png')],
        ['title' => 'Orange', 'path' => asset('images/orange-1.png')],
        ['title' => 'Purple', 'path' => asset('images/purple-1.png')],
        ['title' => 'Red', 'path' => asset('images/red-1.png')],
        ['title' => 'White', 'path' => asset('images/white-1.png')],
        ['title' => 'Yellow', 'path' => asset('images/yellow-1.png')],
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
                        <h5 class="terms-of-use-title">EPDM Poured-in-Place Rubber Surfacing</h5>
                        <div class="terms-of-use-content">
                            <p>EPDM poured-in-place rubber is a widely used safety surfacing solution that offers several
                                advantages
                                over traditional options like mulch. This material provides extensive design flexibility, as
                                it
                                comes in a broad range of colors, allowing for the creation of customized patterns, themed
                                graphics,
                                and unique artistic designs.</p>
                            <p>This surfacing system consists of two layers. The installation process begins with a
                                cushioned base
                                layer made of low-density rubber to provide impact absorption. The top layer consists of
                                EPDM-colored granules mixed with a polyurethane binder, which is then poured and shaped
                                on-site.
                                EPDM surfacing can be customized to different thicknesses, ensuring appropriate shock
                                absorption for
                                various fall heights while meeting CPSC safety standards. Additionally, this seamless rubber
                                surface
                                is highly adaptable to different spaces, forming a continuous layer without edges or joints.
                                Its
                                smooth finish makes it an excellent choice for accessible and ADA-compliant playgrounds.</p>
                            <p>While the initial installation cost of poured-in-place rubber is relatively high, it offers
                                long-term
                                savings due to its minimal maintenance requirements. With proper care, this durable surface
                                can last
                                15 to 20 years, providing a safe and enjoyable play area for children.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'One of the top ADA-compliant playground surfacing options.',
                            'Available in various colors and customizable designs.',
                            'Low maintenance and long lifespan.',
                            'Eco-friendly, incorporating recycled materials.',
                        ];
                        $specifications = [
                            'Requires installation over a stable concrete or compacted
                                stone base.',
                            'Composed of two layers applied on-site for a seamless finish.',
                            'Thickness can be adjusted to meet required impact safety standards.',
                            'Installation must be carried out by trained professionals to ensure compliance with safety
                                guidelines.',
                            'To maintain vibrancy and protect against UV exposure, a surface coating is recommended every
                                two years.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" :showSafteyText="true" />
                </div>
            </div>
        </div>
    </section>

    <x-image-slider :images="$colors" heading="COLOR OPTIONS FOR EPDM POUR IN PLACE RUBBER" class="pb-0"
        :rounded="true" />

    <x-website.safety-contact />

@endsection
