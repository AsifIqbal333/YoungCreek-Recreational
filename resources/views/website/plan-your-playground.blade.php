@extends('layouts.website')

@php
    $title = 'Plan Your Playground';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [['title' => 'Planning Tools', 'href' => 'javascript:void(0)']];
    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- .about-us-main -->
    <section class="flat-spacing-2 about-us-main pb-0">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="heading-section text-center spacing-2">
                        <h1 class="wow fadeInUp">Designing a Play Area: A Step-by-Step Guide</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Designing a park or playground expansion involves navigating a complex
                            landscape of regulations and best practices, including safety standards, accessibility
                            considerations, and inclusive design principles.
                        </p>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                            YoungCreek Recreational, LLCreations aims to simplify the organization of your
                            upcoming outdoor adventures.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.about-us-main -->

    <!-- .about-us -->
    <section class="flat-spacing-2 about-us pb-0">
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
                            <h3 class="wow fadeInUp">STEP 1: Set your aims</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                Envision your ideal outdoor space. Are you aiming to foster community connection?
                                Prioritizing health and
                                active lifestyles? Creating a welcoming environment for families? Perhaps a water-based play
                                area is
                                your vision? Or, do you seek to provide educational opportunities for children? Even a
                                dedicated space
                                for pets? We provide a diverse selection of park and playground products to meet your unique
                                outdoor
                                recreation goals.</p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                Understanding your desired outcomes for your outdoor area helps us tailor solutions, whether
                                you need
                                gathering spaces, aquatic features, or specific play structures. Recognizing that each
                                community,
                                organization, educational institution, and business has distinct requirements, we offer
                                customized and
                                creative outdoor recreation solutions.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">STEP 2: Identify Your Requirements</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                To begin your outdoor recreation area design, it's essential to define your project's
                                parameters.</p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.4s">
                                <em>&#8211; Think about the site's location.</em><br />
                                <em>&#8211; Estimate the anticipated number of simultaneous users.</em><br />
                                <em>&#8211; Determine the users' age groups and physical capabilities.</em><br />
                                <em>&#8211; Consider if a particular style, color palette, or thematic approach is
                                    desired.</em><br />
                                <em>&#8211; Decide if you need supplementary features like shaded areas, picnic tables, or
                                    seating.</em>
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.5s">
                                These considerations will help you select appropriate equipment capacity and age
                                suitability. Specifying
                                inclusivity needs, desired themes, and extra amenities will refine your product choices and
                                budget.
                                Resources on age-appropriate and inclusive play can provide further insight.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/SPLASH6.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/iStock-905819004.jpg') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">STEP 3: Determine Spending Parameters</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.6s">
                                Before making purchases, outline a financial plan. Securing funds for a playground project
                                can be
                                difficult. Tools exist to help with this process. A projected expense sheet can help
                                determine a
                                realistic financial target and demonstrate typical costs associated with different types of
                                outdoor play
                                areas. Remember to account for the price of play equipment, protective surfaces,
                                installation, and
                                ongoing care. If planning for them, include the costs of safety flooring, shade structures,
                                and site
                                features.</p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.7s">
                                Considering funding methods is essential in today's financial environment, even with
                                available capital.
                                Payment plans may be available.</p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.8s">
                                If you need assistance with budgeting, consult with experts. They can assist in estimating
                                necessary
                                expenditures and identify budget-conscious choices if financial resources are limited. They
                                can also
                                explore the option of phased development, allowing for gradual expansion of the playground
                                and payment
                                over time.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">STEP 4: Analyze the spatial dimensions</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.9s">
                                To design your ideal outdoor play area, begin by thoroughly assessing your available space.
                                Our planning
                                resources offer guidance on accurate measurement techniques. After gaining a clear
                                understanding of the
                                area's dimensions, collaborate with a YoungCreek Recreational, LLCreations specialist to
                                tailor your project to your
                                specific requirements. Accurately map the space, noting any terrain variations or surfaces
                                unsuitable
                                for post installation. Account for environmental factors, including climate and adjacent
                                surroundings
                                like traffic or structures. A comprehensive site analysis will enable the creation of a play
                                space that
                                complements the unique characteristics of your location.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/MANDALAY00008-1.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-1">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/SPLASH6.jpg') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">STEP 5: Create Your Ideal Outdoor Area</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.10s">
                                Having established your project objectives, playground specifications, budget, and location,
                                you're now
                                ready for the exciting design phase. During this stage, you'll select the play structures
                                and outdoor
                                recreational features that best suit your needs. Professionals are available to assist you
                                in choosing
                                appropriate equipment for your space. For a seamless experience from selection to
                                installation, consider
                                consulting experienced play area specialists. These experts can offer guidance and
                                recommendations to
                                help you find the ideal commercial play equipment. They can also support you throughout your
                                outdoor
                                recreation project, ensuring you achieve the park or playground you envision.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">STEP 6: Preparation and Construction</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.11s">
                                After finalizing your equipment choices for the playground, you'll need to consider how to
                                set up your
                                playground. Numerous installation methods are available.
                            </p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">APS Installations</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.12s">
                                Our team specializes in comprehensive playground setup, with each project undergoing
                                rigorous evaluation
                                by our trained safety experts. This guarantees that every play area we deliver meets or
                                surpasses all
                                applicable government safety and longevity guidelines.
                            </p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Directed Community Assembly</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.13s">
                                If your playground initiative benefits from robust local engagement and a group of
                                individuals eager to
                                contribute their time, a collaborative construction approach could be highly effective. This
                                method not
                                only helps manage expenses but also highlights the positive impact of recreational spaces.
                            </p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Expert Installation Providers</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.14s">
                                For projects located beyond our direct installation service range, we facilitate connections
                                with
                                qualified professionals. Leveraging our network with the International Playground
                                Contractors
                                Association (NPCAI), we can assist in identifying certified installers suitable for your
                                project needs.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/iStock-675796582.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/iStock-700310676-e1539114566278.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">STEP 7: Sustain the Fun, Throughout the Day</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.15s">
                                To maximize the lifespan of your outdoor recreational space, create a structured upkeep
                                strategy.
                                Following the installation of new play structures or the implementation of revised safety
                                protocols, a
                                thorough examination by a qualified playground safety professional is recommended.
                                Consistent usage,
                                environmental factors, and potential misuse can degrade equipment and surfacing materials.
                                Therefore,
                                scheduled inspections and maintenance are essential for ensuring the continued value and
                                safety of your
                                investment.</p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Risk Control</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.16s">
                                Consistent and planned maintenance of recreational play areas is a key strategy for
                                safeguarding
                                community members. This practice showcases a commitment to public safety, reduces the
                                likelihood of
                                accidents, and subsequently limits potential legal exposure.
                            </p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Preserve your capital</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.17s">
                                Expenditures on outdoor recreation equipment, protective ground coverings, sun shielding,
                                and overall
                                location enhancements represent substantial capital outlays for both businesses and local
                                governments.
                                Implementing a consistent upkeep plan is crucial to maximize the longevity and value of
                                these assets.
                            </p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Elevate recreational activities for kids</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.18s">
                                Well-kept play equipment significantly enhances a child's developmental experience. Your
                                contribution
                                matters!
                            </p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Regulate expenditures</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.19s">
                                We provide clients with comprehensive maintenance protocols and inspection checklists to
                                facilitate
                                effective upkeep strategies. Furthermore, our specialists at YoungCreek Recreational,
                                LLCreations offer personalized
                                training sessions to guarantee correct maintenance execution.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .about-us -->

    <!-- .about-us-main -->
    <section class="flat-spacing-2 about-us-main">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="heading-section text-center spacing-2">
                        <h1 class="wow fadeInUp text-uppercase">We'll assist you along the way</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.20s">
                            Our company has been a trusted name in designing and manufacturing
                            high-quality commercial playground equipment for over 12 years. Proudly serving Georgia and
                            surrounding areas, we specialize in durable, innovative play structures built to last. With a
                            diverse selection of pre-designed and customizable options, we can help you create the ideal
                            play
                            space for parks, schools, or recreational areas.
                        </p>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.21ss">
                            If you're ready to bring your playground vision to life, reach out to our
                            team today! Call us at <a href="tel:17069756673">1.706.975.6673</a> or complete our online
                            contact
                            form. Our experienced playground specialists are here to provide personalized recommendations
                            and
                            guide you through the entire process—ensuring you get the perfect play equipment for your needs.
                            Let
                            us help you build the park or playground you’ve always wanted!
                        </p>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{ route('contacts.index') }}" class="tf-btn btn-onsurface">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.about-us-main -->
@endsection
