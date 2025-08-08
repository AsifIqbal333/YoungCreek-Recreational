@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/Engineered wood fiber2.jpg')],
        ['title' => '', 'path' => asset('images/Engineered wood fiber 3.jpg')],
        ['title' => '', 'path' => asset('images/Engineered wood fiber1.jpg')],
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
                        <h5 class="terms-of-use-title">Engineered Wood Fiber Specifications</h5>
                        <div class="terms-of-use-content">
                            <p>Engineered Wood Fiber (EWF) is widely recognized as a practical and cost-effective solution
                                for
                                playground surfaces, accounting for the majority of installations due to its affordability,
                                natural
                                aesthetics, and excellent shock absorption capabilities. This ADA-compliant material, often
                                referred
                                to by various names in the industry, consists of natural wood fibers specially processed to
                                adhere
                                to playground safety and performance standards. Regular maintenance is essential to ensure
                                that the
                                engineered wood fiber remains compliant with ADA standards, involving routine raking and
                                periodic
                                replenishment due to compression and natural degradation over time.</p>
                            <p>Selecting the appropriate playground surfacing can be challenging, given the variety of
                                available
                                options. Our knowledgeable team is ready to provide professional recommendations tailored
                                specifically to your project's needs. Additionally, we supply a full range of accessory
                                products
                                such as compatible drainage solutions, geotextile fabrics, wear mats, containment borders,
                                and
                                accessible ramps. YoungCreek Recreational, LLC is committed to offering an extensive array
                                of
                                safety-compliant surfacing solutions, suitable for all budgets and playground applications,
                                ensuring
                                safe and enjoyable environments for everyone.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Economical with minimal upfront installation expenses.',
                            'Visually appealing natural aesthetic.',
                            'ADA compliant when installed and maintained correctly.',
                            'Straightforward installation suitable for volunteers or limited maintenance teams.',
                        ];
                        $specifications = [
                            'Specifically processed to fulfill playground safety standards.',
                            'Periodic replenishment necessary to preserve the appropriate surface depth for fall protection.',
                            'Consistent maintenance required, particularly in areas experiencing frequent use.',
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
