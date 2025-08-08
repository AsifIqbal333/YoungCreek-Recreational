@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/rubber mulch2.jpg')],
        ['title' => '', 'path' => asset('images/rubber mulch3.jpg')],
        ['title' => '', 'path' => asset('images/rubber mulch1.jpg')],
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
                        <h5 class="terms-of-use-title">Loose Fill Rubber Mulch</h5>
                        <div class="terms-of-use-content">
                            <p>Loose fill rubber mulch, often referred to as "rubber nuggets," is made entirely from
                                recycled
                                shredded rubber. This surfacing material is ADA-compliant and offers exceptional impact
                                absorption,
                                making it one of the safest loose-fill options available. Due to its superior shock
                                absorption
                                properties, only about half the depth is required compared to materials like engineered wood
                                mulch
                                to achieve the same level of fall protection.</p>
                            <p>Although the initial investment may be higher, rubber mulch can be more cost-effective over
                                time than
                                engineered wood fiber since it does not break down or require frequent replenishment.
                                Additionally,
                                it keeps play areas cleaner and free from splinters, as it does not produce dust, rot, or
                                absorb
                                water.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Provides one of the highest levels of impact protectio.',
                            'Soft and splinter-free for added comfort and safety.',
                            'Does not decompose, reducing maintenance needs.',
                            'Non-toxic, clean, and environmentally safe without leaching into
                                groundwater.',
                        ];
                        $specifications = [
                            'Composed of 100% recycled tire rubber.',
                            'Metal-free, with less than 0.01% residual metal content.',
                            'Standard playground installations typically require a nine-inch
                                depth of loose fill rubber.',
                            'Available in 50 lb bags, 1,000 lb bulk bags, or one-ton super sacks.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" :showSafteyText="true" />
                </div>
            </div>
        </div>
    </section>

    <x-website.safety-contact />

@endsection
