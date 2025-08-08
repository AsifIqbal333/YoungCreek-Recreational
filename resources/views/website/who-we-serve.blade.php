@extends('layouts.website')

@php
    $title = 'Who We Serve';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [['title' => 'Our Company', 'href' => 'javascript:void(0)']];
    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- .about-us-main -->
    <section class="flat-spacing-2 about-us-main pb-0">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="heading-section text-center spacing-2">
                        <h1 class="wow fadeInUp">Who We Serve</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            If you're searching for commercial playground equipment for any setting, from public parks
                            to private businesses, we offer creative play area solutions. We know that selecting the
                            right playground is a significant undertaking. Our experienced professionals are ready
                            to help you navigate the process, delivering a park or play space that perfectly matches
                            your site.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.about-us-main -->

    <!-- .about-us -->
    <section class="flat-spacing-2 about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/31PLAY.png') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Locating Durable Commercial Playgrounds</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                We build long-lasting, imaginative play areas for commercial settings. With over 20 years of
                                experience,
                                we've become a trusted provider of high-quality outdoor play systems throughout Texas and
                                surrounding
                                areas. Our dedication to safety and innovation is reflected in every structure we create. We
                                use only
                                top-tier materials, such as strong steel posts, perforated steel platforms with a vinyl
                                coating, and
                                durable, high-density plastics, to guarantee maximum safety and resistance to corrosion. Our
                                finishes,
                                treated for UV protection and powder-coated, ensure lasting color. In addition, we
                                specialize in
                                creating custom playground designs. We are equipped to develop personalized solutions to
                                meet your
                                organization's unique requirements, ensuring projects stay within budget and are delivered
                                promptly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Locating Durable Industrial Playgrounds</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                Every organization and community has distinct requirements for outdoor
                                recreation. We dedicate ourselves to crafting creative solutions for diverse markets,
                                acknowledging
                                that no two play areas are identical. We believe in providing only the highest quality
                                recreational
                                products, whatever your project entails. Our experienced consultants are prepared to assist
                                you in
                                discovering the ideal solution. Our broad selection encompasses dog park necessities,
                                advanced play
                                systems, water feature elements, outdoor fitness tools, and park enhancements. We provide
                                complete
                                solutions, from shade structures to safety surfacing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/Measureopt.png') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/IMG_1702.jpg') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">The Importance of Quality and Support</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                We at YoungCreek Recreational, LLCreations strive to simplify the process of designing your
                                ideal play area. Our commitment rests on maintaining top-tier quality and safety benchmarks.
                                We
                                reinforce this commitment with thorough quality controls, dedicated customer support, and a
                                leading
                                warranty. We provide extensive support to ensure a smooth experience during the planning,
                                installation,
                                and upkeep of your play equipment.</p>
                            <p style="text-align: left;">For your next playground purchase, consider our knowledgeable team.
                                We offer
                                expert guidance to help you select the appropriate commercial play structures. We can assist
                                you
                                throughout your outdoor recreation project, helping you achieve your desired park or
                                playground design.
                                Reach out to us to discuss your project requirements.</p>
                            <p>
                                <a href="{{ route('contacts.index') }}" class="tf-btn btn-onsurface mt-3">Contact Us <i
                                        class="icon-arrow-up-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .about-us -->
@endsection
