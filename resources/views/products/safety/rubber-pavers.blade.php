@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/rubber paver 2.jpg')],
        ['title' => '', 'path' => asset('images/rubber paver 3.jpg')],
        ['title' => '', 'path' => asset('images/rubber paver 4.jpg')],
        ['title' => '', 'path' => asset('images/rubber paver 1.jpg')],
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
                        <h5 class="terms-of-use-title">Rubber Pavers</h5>
                        <div class="terms-of-use-content">
                            <p>Rubber pavers provide a safe, durable, and eco-friendly surfacing solution designed to
                                enhance play
                                areas while minimizing the risk of injuries. Made from recycled rubber, these pavers offer
                                excellent
                                shock absorption, reducing impact from falls and ensuring compliance with safety standards.
                                Unlike
                                traditional concrete or asphalt, rubber pavers provide a softer, non-slip surface that
                                remains
                                comfortable underfoot in all weather conditions.</p>
                            <p>These interlocking pavers are easy to install and require minimal maintenance, making them an
                                excellent choice for playgrounds, walkways, and recreational spaces. Available in various
                                colors and
                                thicknesses, they offer both aesthetic appeal and functional performance. With superior
                                drainage
                                capabilities, rubber pavers help prevent puddles and maintain a safe, dry surface even after
                                rain.
                            </p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Shock-Absorbing & Safe: Reduces impact from falls, meeting ASTM safety standards.',
                            'Slip-Resistant Surface: Provides excellent traction, even in wet conditions.',
                            'Eco-Friendly & Sustainable: Made from recycled rubber for an environmentally responsible choice.',
                            'Low Maintenance: Resistant to weather, cracking, and fading.',
                            'Quick & Easy Installation: Interlocking design allows for seamless placement and customization.',
                        ];
                        $specifications = [
                            'Available in various thicknesses to meet different fall height requirements.',
                            'Standard sizes: 24” x 24” and 24” x 48” options available.',
                            'Offered in multiple colors to complement any playground design.',
                            'Designed for both indoor and outdoor applications.',
                            'Built-in drainage channels to prevent water accumulation.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" />
                </div>
            </div>
        </div>
    </section>

    <x-website.safety-contact />

@endsection
