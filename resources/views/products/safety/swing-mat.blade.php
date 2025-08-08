@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/swing mat2.jpg')],
        ['title' => '', 'path' => asset('images/wing mat 3.jpg')],
        ['title' => '', 'path' => asset('images/swing mat 4.jpg')],
        ['title' => '', 'path' => asset('images/swing mat 1.jpg')],
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
                        <h5 class="terms-of-use-title">Swing Mat</h5>
                        <div class="terms-of-use-content">
                            <p>Swing Mat is designed to provide superior protection in high-traffic areas of playgrounds,
                                particularly under swings and slide exits where surfacing displacement is most common. Made
                                from
                                durable, heavy-duty recycled rubber, this mat helps prevent erosion of loose-fill surfacing
                                materials like wood chips, rubber mulch, or sand, ensuring a safer and more stable play area
                                for
                                children.</p>
                            <p>With its non-slip surface and impact-absorbing properties, this swing mat reduces wear and
                                tear on
                                playground surfacing while minimizing the risk of slips and falls. Its substantial weight
                                keeps it
                                securely in place, even under heavy use, making it a long-lasting and maintenance-free
                                addition to
                                any playground.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Protects Playground Surfacing: Prevents displacement of loose-fill materials under swings and slides.',
                            'Durable & Long-Lasting: Made from high-quality recycled rubber for extended use.',
                            'Non-Slip Surface: Provides traction to reduce slipping hazards.',
                            'Impact-Absorbing: Helps cushion falls and enhances playground safety.',
                            'Weather & UV Resistant: Designed to withstand outdoor elements without cracking or deteriorating.',
                        ];
                        $specifications = [
                            'Dimensions: 32 inches x 54 inches.',
                            'Thickness: Typically 1.5 to 2 inches for optimal protection.',
                            'Weight: Designed to stay in place without the need for additional anchoring.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" />
                </div>
            </div>
        </div>
    </section>

    <x-website.safety-contact />

    <x-website.suggested-ada-ramp class="pt-0" />

@endsection
