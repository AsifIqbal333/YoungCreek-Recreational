@extends('layouts.website')
@php
    $title = ucwords(str_replace('-', ' ', $subCategory ?? $category));
    $productCategory = collect(categories())->where('slug', $type)->first();

    $images = [
        ['title' => '', 'path' => asset('images/ada plastic ramp2.jpg')],
        ['title' => '', 'path' => asset('images/ada plastic ramp3.jpg')],
        ['title' => '', 'path' => asset('images/ada plastic ramp4.jpg')],
        ['title' => '', 'path' => asset('images/ada plastic ramp.jpg')],
    ];

    $colors = [
        ['title' => 'Alabastor', 'path' => asset('images/Copy-of-Alabaster-.png')],
        ['title' => 'Arctic White', 'path' => asset('images/Copy-of-Arctic-White.png')],
        ['title' => 'Ash', 'path' => asset('images/Copy-of-Ash.png')],
        ['title' => 'Burnt Amber', 'path' => asset('images/Copy-of-Burnt-Amber.png')],
        ['title' => 'Desert Tan', 'path' => asset('images/Copy-of-Copy-of-Desert-Tan.png')],
        ['title' => 'Crystal Blue', 'path' => asset('images/Copy-of-Crystal-Blue.png')],
        ['title' => 'Granite', 'path' => asset('images/Copy-of-Granite.png')],
        ['title' => 'Jade Breeze', 'path' => asset('images/Copy-of-Jade-Breeze.png')],
        ['title' => 'Liquid Turquoise', 'path' => asset('images/Copy-of-Liquid-Turquoise.png')],
        ['title' => 'Midnight', 'path' => asset('images/Copy-of-Midnight.png')],
        ['title' => 'Morning Sky', 'path' => asset('images/Copy-of-Morning-Sky.png')],
        ['title' => 'Nullarbor', 'path' => asset('images/Copy-of-Nullarbor.png')],
        ['title' => 'Purple', 'path' => asset('images/Copy-of-Purple.png')],
        ['title' => 'Silky Oak', 'path' => asset('images/Copy-of-Silky-Oak.png')],
        ['title' => 'Sunrise', 'path' => asset('images/Copy-of-Sunrise.png')],
        ['title' => 'Sunset Fire', 'path' => asset('images/Copy-of-Sunset-Fire.png')],
        ['title' => 'Vermillion', 'path' => asset('images/Copy-of-Vermillion.png')],
        ['title' => 'Viridian', 'path' => asset('images/Copy-of-Viridian.png')],
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
                        <h5 class="terms-of-use-title">Plastic ADA Ramps</h5>
                        <div class="terms-of-use-content">
                            <p>Wheelchair-accessible ramp systems are among the most versatile and universally compatible
                                options
                                available for playgrounds today.</p>
                            <p>Installed over a recycled foam cushion layer, artificial turf offers exceptional impact
                                absorption,
                                helping to reduce the risk of injuries from falls. The padding system is engineered to meet
                                safety
                                standards set by the American Society for Testing and Materials (ASTM) and can provide
                                protection
                                for fall heights ranging from six to over eight feet. Additionally, our specialized
                                antimicrobial
                                and temperature-reducing infill helps maintain a comfortable surface temperature while
                                keeping the
                                turf fresh and hygienic.</p>
                            <p>Designed to be installed independently of playground borders, APS full and half ramps create
                                a
                                smooth, ADA-compliant entry point for wheelchair users and individuals with mobility
                                challenges.
                                Each ADA ramp system includes two 4-inch and two 6-inch filler ends, along with all
                                necessary spikes
                                for secure installation. The APS-ADA Full Ramp consists of two connected halves, while the
                                APS-ADA
                                Half Ramp and APS-ADA Sidewalk Mount Ramp feature a single half to provide seamless access
                                to the
                                play area.</p>
                        </div>
                    </div>
                    @php
                        $items = [
                            'Universal Accessibility: Provides a smooth, ADA-compliant entry for wheelchair users and individuals with mobility challenges.',
                            'Independent Installation: Designed to mount separately from playground borders, allowing flexible placement.',
                            'Durable & Long-Lasting: Made from high-quality materials that withstand heavy use and outdoor conditions.',
                            'Easy Integration: Works with various playground surfacing materials, including rubber mulch, engineered wood fiber, and synthetic turf.',
                            'Low Maintenance: Resistant to weather damage, cracking, and fading for long-term reliability.',
                            'Secure Installation: Includes all necessary components to ensure a stable and safe entry point into the playground.',
                        ];
                        $specifications = [
                            'APS-ADA Full Ramp: Includes two connected halves for a wider access point.',
                            'APS-ADA Half Ramp: Features a single half to create an entry where space is limited.',
                            'APS-ADA Sidewalk Mount Ramp: Designed for seamless transition from sidewalks into the play area.',
                        ];
                        $components = [
                            'Includes (2) 4-inch and (2) 6-inch filler ends for a smooth transition.',
                            'Comes with all necessary spikes for secure anchoring.',
                            'Material: Heavy-duty, weather-resistant construction for long-term outdoor use.',
                            'Compliance: Meets ADA accessibility requirements for inclusive playground design.',
                        ];
                    @endphp
                    <x-safety-item heading="Advantages" :items="$items" />
                    <x-safety-item heading="Key Specifications" :items="$specifications" />
                    <x-safety-item heading="Installation Components" :items="$components" showSafteyText="true"
                        safteyText="These ramps provide a safe and inclusive play environment, ensuring all children can enjoy playgrounds without barriers." />
                </div>
            </div>
        </div>
    </section>

    <x-image-slider :images="$colors" heading="Polysoft Color Options" class="pb-0" :rounded="true" />

    <x-website.safety-contact />

@endsection
