@extends('layouts.website')

@php
    $title = 'About Our Product';
@endphp
@section('title', $title)

@push('styles')
    <style>
        .recycled-benefits-wrapper {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            font-family: Arial, sans-serif;
        }

        .recycled-benefits-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
            background-color: #4CAF50;
            color: white;
            font-family: Arial, sans-serif;
        }

        .benefits-heading {
            text-align: start;
            font-size: 1.8rem;
            margin-bottom: 3rem;
            font-weight: 600;
        }

        .benefits-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .benefit-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 200px;
            text-align: center;
            gap: 0px !important;
        }

        .benefit-icon {
            background-color: #000;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 1rem;
        }

        .icon-image {
            width: 60px;
            height: 60px;
            filter: invert(1);
        }

        .benefit-title {
            font-size: 1rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        .benefit-description {
            font-size: 0.9rem;
            line-height: 1.4;
        }

        /* Responsive adjustments */
        @media (max-width: 1024px) {
            .benefit-item {
                width: 180px;
            }

            .benefit-icon {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 768px) {
            .benefits-heading {
                font-size: 1.4rem;
            }

            .benefits-grid {
                gap: 1.5rem;
            }

            .benefit-item {
                width: 160px;
            }

            .benefit-icon {
                width: 90px;
                height: 90px;
            }

            .icon-image {
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 576px) {
            .benefits-grid {
                flex-direction: column;
                align-items: center;
            }

            .benefit-item {
                width: 100%;
                max-width: 280px;
                margin-bottom: 2rem;
            }
        }
    </style>

    <style>
        /* Reset for our component only */
        .recycling-wrapper * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .recycling-wrapper {
            width: 100%;
            background-color: #4A4A4A;
            font-family: 'Arial', sans-serif;
        }

        .recycling-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .recycling-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .recycling-steps {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        .step-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            width: 100%;
            max-width: 350px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .step-image-container {
            /* position: relative;
                                                                                                                                                                                                                                        width: 90%;
                                                                                                                                                                                                                                        margin: 0 auto;
                                                                                                                                                                                                                                        aspect-ratio: 1; */
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
            position: relative;
        }

        .step-image {
            /* width: 100%;
                                                                                                                                                                                                                                    height: 100%;
                                                                                                                                                                                                                                    object-fit: cover;
                                                                                                                                                                                                                                    border-radius: 50%;
                                                                                                                                                                                                                                    border: 4px solid #4CAF50;
                                                                                                                                                                                                                                    transition: transform 0.3s ease; */
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .circle-container {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
            position: relative;
        }

        .circle-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .step-card:hover .step-image {
            transform: scale(1.05);
        }

        .flex-center {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .step-number {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #fff;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .step-description {
            color: #fff;
            text-align: center;
            font-size: 1rem;
            line-height: 1.6;
            /* margin-top: 1.5rem; */
            padding: 0 0.5rem;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .recycling-steps {
                flex-direction: column;
                align-items: center;
            }

            .step-card {
                max-width: 100%;
            }

            .step-image-container {
                width: 80%;
                max-width: 250px;
            }

            .circle-container {
                width: 150px;
                height: 150px;
            }

            .recycling-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .recycling-title {
                font-size: 1.8rem;
            }

            .step-description {
                font-size: 0.9rem;
            }

            .step-image-container {
                width: 90%;
            }

            .circle-container {
                width: 130px;
                height: 130px;
            }
        }
    </style>
@endpush

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [['title' => 'Our Company', 'href' => 'javascript:void(0)']];
    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <section class="flat-spacing-2 about-us-main pb-0">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="heading-section text-center spacing-2">
                        <h1 class="wow fadeInUp">Our Reycled Products</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Not All Recycled Materials Are the Same!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing-2 about-us pb-0 pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/Design-playground.png') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">The Difference Is Clear</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                When it comes to recycled materials, not all options are equal. Playtopia stands out as a
                                leader in sustainable play, setting new standards rather than following the industry norm.
                                Here’s what makes our materials truly exceptional:
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                ✅ <strong>Verified Sustainability</strong> – Our Tangent lumber is <strong>Green Circle
                                    Certified</strong>, ensuring
                                third-party verification of recycled content.
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                ✅ <strong>Proven Strength</strong> – Structural integrity is tested and verified per
                                <strong>ASTM
                                    D6109-05 and D6117-97</strong> standards.
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.4s">
                                ✅ Built for Durability – Our specially formulated core allows for <strong>expansion in
                                    extreme</strong> weather, preventing cracking and warping.
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.5s">
                                And that’s just the beginning—see below for more reasons why our material is the best in the
                                industry!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recycled-benefits-wrapper my-5">
        <div class="recycled-benefits-container">
            <h3 class="benefits-heading">What are the benefits of purchasing recycled products?</h3>
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <img src="https://i.imgur.com/placeholder.png" alt="Spray can icon" class="icon-image">
                    </div>
                    <h3 class="benefit-title">Pest-Resistant</h3>
                    <p class="benefit-description">This product is specifically designed to prevent infestations from
                        borer
                        insects such as termites and beetles.</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <img src="https://i.imgur.com/placeholder.png" alt="Rain cloud icon" class="icon-image">
                    </div>
                    <h3 class="benefit-title">Durable in Any Climate</h3>
                    <p class="benefit-description">Whether in typical conditions or harsh coastal environments, it
                        resists
                        erosion, chipping, and splintering.</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <img src="https://i.imgur.com/placeholder.png" alt="Bug icon" class="icon-image">
                    </div>
                    <h3 class="benefit-title">Graffiti Resistant</h3>
                    <p class="benefit-description">Easily remove paint and marks with effective solvents and some
                        effort.
                        Plus, repair chips and gouges using heat for a seamless finish!</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <img src="https://i.imgur.com/placeholder.png" alt="Sun icon" class="icon-image">
                    </div>
                    <h3 class="benefit-title">Color Retention</h3>
                    <p class="benefit-description">The product's color is embedded within its core, ensuring
                        long-lasting
                        vibrancy without fading over time.</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">
                        <img src="https://i.imgur.com/placeholder.png" alt="Impact icon" class="icon-image">
                    </div>
                    <h3 class="benefit-title">Gentler Impact</h3>
                    <p class="benefit-description">Our material is more flexible than steel, providing a gentler impact
                        during play and ensuring a safer experience for your children.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing-2 about-us-main pb-0 pt-0">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-9">
                    <div class="heading-section text-center spacing-2">
                        <h3 class="wow fadeInUp">Will NEVER require sanding, staining, or painting—completely resistant to
                            mold, fungus, and rot. Plus, it will NEVER rust!</h3>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Our material offers a significant advantage over steel by maintaining a lower temperature in
                            direct sunlight.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recycling-wrapper">
        <div class="recycling-container">
            <h1 class="recycling-title">Our Recycling Process</h1>

            <div class="recycling-steps">
                <div class="step-card">
                    <div class="circle-container mb-2">
                        <img src="{{ asset('images/Design-playground.png') }}" alt="Bales of plastic containers">
                    </div>
                    <div class="flex-center mb-2">
                        <span class="step-number">1</span>
                    </div>

                    <p class="step-description">Stacks of plastic containers await storage on the floor</p>
                </div>

                <div class="step-card">
                    <div class="circle-container mb-2">
                        <img src="{{ asset('images/SPLASH6.jpg') }}" alt="Bales of plastic containers">
                    </div>
                    <div class="flex-center mb-2">
                        <span class="step-number">2</span>
                    </div>

                    <p class="step-description">The delivered bales are processed by being transferred to conveyor belts,
                        where a manual sorting process eliminates all materials except milk jugs.</p>
                </div>

                <div class="step-card">
                    <div class="circle-container mb-2">
                        <img src="{{ asset('images/iStock-905819004.jpg') }}" alt="Bales of plastic containers">
                    </div>
                    <div class="flex-center mb-2">
                        <span class="step-number">3</span>
                    </div>

                    <p class="step-description">The plastic containers undergo a grinding process, transforming them into
                        plastic flakes.</p>
                </div>

                <div class="step-card">
                    <div class="circle-container mb-2">
                        <img src="{{ asset('images/MANDALAY00008-1.jpg') }}" alt="Bales of plastic containers">
                    </div>
                    <div class="flex-center mb-2">
                        <span class="step-number">4</span>
                    </div>

                    <p class="step-description">The ground plastic flake is thoroughly cleansed through washing.</p>
                </div>

                <div class="step-card">
                    <div class="circle-container mb-2">
                        <img src="{{ asset('images/iStock-675796582.jpg') }}" alt="Bales of plastic containers">
                    </div>
                    <div class="flex-center mb-2">
                        <span class="step-number">5</span>
                    </div>

                    <p class="step-description">The washed plastic flakes are processed via extrusion, yielding plastic
                        pellets.</p>
                </div>

                <div class="step-card">
                    <div class="circle-container mb-2">
                        <img src="{{ asset('images/iStock-700310676-e1539114566278.jpg') }}"
                            alt="Bales of plastic containers">
                    </div>
                    <div class="flex-center mb-2">
                        <span class="step-number">6</span>
                    </div>

                    <p class="step-description">Plastic pellets become recycled lumber, building your new playground.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing-2 about-us-main pb-0">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="heading-section text-center spacing-2">
                        <h2 class="wow fadeInUp text-uppercase">WE'LL ASSIST YOU ALONG THE WAY</h2>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Our company has been a trusted name in designing and manufacturing
                            high-quality commercial playground equipment for over 12 years. Proudly serving Georgia and
                            surrounding areas, we specialize in durable, innovative play structures built to last. With a
                            diverse selection of pre-designed and customizable options, we can help you create the ideal
                            play
                            space for parks, schools, or recreational areas.
                        </p>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            If you're ready to bring your playground vision to life, reach out to
                            our team today! Call us at <a href="tel:17069756673">1.706.975.6673</a> or complete our online
                            contact form. Our experienced playground specialists are here to provide personalized
                            recommendations and guide you through the entire process—ensuring you get the perfect play
                            equipment for your needs. Let us help you build the park or playground you’ve always wanted!
                        </p>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{ route('contacts.index') }}" class="tf-btn btn-onsurface">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
