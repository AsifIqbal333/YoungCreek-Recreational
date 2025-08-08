@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/rubber timber 2.jpg')],
        ['title' => '', 'path' => asset('images/rubber timber 3.jpg')],
        ['title' => '', 'path' => asset('images/rubber timber 4.jpg')],
        ['title' => '', 'path' => asset('images/rubber timber 1.jpg')],
    ];
    $colors = [
        ['title' => 'Terracotta', 'path' => asset('images/Terracotta-Rubber-Tiles.jpg')],
        ['title' => 'Green', 'path' => asset('images/Green-Rubber-Tiles.jpg')],
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
                        <h5 class="terms-of-use-title">Rubber Timber</h5>
                        <div class="terms-of-use-content">
                            <p>Rubber Border Timbers provide a long-lasting, flexible, and eco-friendly solution for
                                containing
                                playground surfacing materials. Made from 100% recycled rubber, these border timbers offer
                                superior
                                durability compared to traditional wood or plastic alternatives, resisting cracking,
                                splintering,
                                and weather-related damage. Designed to maintain the integrity of your play area, Rubber
                                timber
                                borders help keep loose-fill surfacing in place while enhancing overall playground safety.
                            </p>
                            <p>With a realistic wood-grain appearance, these border timbers blend seamlessly into natural
                                and
                                playground environments. Their flexibility allows for easy installation in both straight and
                                curved
                                layouts, making them ideal for various outdoor applications, including playgrounds,
                                landscaping, and
                                garden beds.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Eco-Friendly & Durable: Made from recycled rubber for long-lasting use.',
                            'Flexible Design: Can be installed in straight or curved configurations.',
                            'Low Maintenance: Resistant to weather, rot, and insect damage.',
                            'Safe for Playgrounds: Soft and impact-absorbing compared to traditional wood borders.',
                            'Easy Installation: Includes pre-drilled holes and spikes for secure placement.',
                        ];
                        $specifications = [
                            'Available in 4-foot, 6-foot and 8-foot lengths.',
                            'Standard height: 4 inches or 6 inches, with additional sizes available.',
                            'Realistic wood-grain texture for a natural look.',
                            'Comes with pre-drilled holes for quick and easy installation.',
                            'Includes long stakes for secure anchoring to maintain surfacing containment.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" :showSafteyText="true" />
                </div>
            </div>
        </div>
    </section>

    <x-image-slider :images="$colors" heading="COLOR OPTIONS FOR RUBBER TILES" class="pb-0" :rounded="true" />

    <x-website.safety-contact :category="$category" />

    <x-website.suggested-ada-ramp class="pt-0" />

@endsection
