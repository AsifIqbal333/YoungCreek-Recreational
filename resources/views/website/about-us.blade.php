@extends('layouts.website')

@php
    $title = 'About Us';
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
                        <h1 class="wow fadeInUp">We Are {{ config('app.name') }}</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            We create unique furniture that improves the
                            new ways in which people live, work and play. For more than 70 years, we've
                            collaborated with the world's best designers to create furniture renowned for
                            its modularity, functionality, and uncompromising quality.
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="img-wrap">
                        <img class="lazyload effect-paralax " src="{{ asset('images/safety.jpg') }}"
                            data-src="{{ asset('images/safety.jpg') }}" alt="">
                    </div>
                    <div class="main-content">
                        <div class="left">
                            <h3 class="mb_11 wow fadeInUp">Our Mission</h3>
                            <p class="text_secondary text-body-1 wow fadeInUp" data-wow-delay="0.1s">To create growth
                                opportunities through
                                education, community engagement, and innovative solutions. Our mission is to
                                uplift the lives of people in Odisha by driving positive social change,
                                enhancing access to resources, and fostering equitable development across the
                                region.</p>
                        </div>
                        <div class="right">
                            <h3 class="mb_11 wow fadeInUp">Our Vision</h3>
                            <p class="text_secondary text-body-1 wow fadeInUp" data-wow-delay="0.1s">To empower the people
                                of Odisha by promoting
                                sustainable development, preserving cultural heritage, and fostering innovation.
                                Our vision is to build a thriving community where economic growth and social
                                progress go hand in hand, ensuring a brighter future for all.</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-12">
                    <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2"
                        data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1"
                        data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-package"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Free & fast delivery</h5>
                                        <p>No extra costs, just the price you see.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-arrow-down-left"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">14-Day Returns</h5>
                                        <p>Risk-free shopping with easy returns.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-lifebuoy"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">24/7 Support</h5>
                                        <p>24/7 support, always here just for you</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-box-icon">
                                    <div class="icon">
                                        <i class="icon-sealpercent"></i>
                                    </div>
                                    <div class="content">
                                        <h5 class="title">Member Discounts</h5>
                                        <p>Special prices for our loyal customers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-pagination-iconbox sw-dots type-circle d-flex justify-content-center"></div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section><!-- /.about-us-main -->

    <!-- .about-us -->
    <section class="flat-spacing-2 about-us pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/shutterstock_144411928.jpg') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Why Choose {{ config('app.name') }}</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                {{ config('app.name') }} has been a leading commercial playground equipment
                                manufacturer for more than 25 years. We take pride in our ability to provide a safe
                                environment for all children to grow and nurture their natural sense of adventure through
                                play. When it comes to quality commercial outdoor playground manufacturers, Adventure
                                Playground Systems delivers on all levels. We achieve this by offering innovative products
                                at attractive prices, backed by excellent warranty and customer service. Whether you’re
                                looking for traditional swings and standalone slides, shade structures, splash pads or site
                                amenities, we can customize your outdoor recreational space to best fit the needs of your
                                organization.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">1. Play with Peace of Mind</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                As commercial play equipment manufacturers, we’re serious about safety. The design and
                                manufacturing process is overseen by our CPSI-certified team members to ensure all of our
                                equipment meets or exceeds standards created by the CPSC (<a
                                    href="https://www.cpsc.gov/">Consumer Product Safety Commission</a>), ADA (<a
                                    href="https://www.access-board.gov/">American with Disabilities Act</a>) and ASTM (<a
                                    href="https://www.astm.org/">American Society for Testing and Materials</a>). We strive
                                not only to create safe and innovative designs for our outdoor playgrounds, but to also
                                build quality play that are made to last. Our systems are manufactured using only the
                                highest quality materials as commercial grade &nbsp;steel posts, vinyl coated perforated
                                steel decking, and high-density polyethylene plastic. All of which provide maximum safety,
                                durability and corrosion resistance . Powder-coated and UV stabilized finishes ensure they
                                remain as colorful and vivid as the imaginations of the children that play on them.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/DSC_0408.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/shutterstock_3552149-e1537559022683.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">2. Made in the USA</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                {{ config('app.name') }} has been leading children’s play equipment manufacturers for more
                                than 25
                                years. Serving Texas and beyond — our commercial-grade outdoor recreational products are
                                known for their
                                quality, durability and innovation. We understand that purchasing a playground is a huge
                                decision. Our
                                user-friendly website was designed to offer our customers the convenience of selecting from
                                a variety of
                                fun and exciting commercial play structures, with the peace of mind that you are purchasing
                                quality
                                products made here in the USA! We offer a wide range of parks and recreation products—
                                including custom
                                solutions — so we’re sure to have the perfect pieces for your playground, park, school or
                                business.
                                {{ config('app.name') }}’s products are manufactured in Houston, Texas at our state of
                                the art
                                facilities that span over 2.3 acres.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">3. Attention to Detail and Design</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.4s">
                                We believe that every piece of playground equipment we create and install should be as
                                unique and one of
                                a kind as the children who enjoy them. That’s why all of our play systems and components
                                come fully
                                customizable and are offered in a variety of colors sure to please any palate. Our team
                                members are
                                passionate about creating fun and exciting play products while maintaining that quality,
                                compliance and
                                safety will always be our highest priorities. Need help making a decision? Allow our team of
                                Adventure
                                Play Experts to create design layouts, generate 3D renderings and suggest modifications to
                                accommodate
                                your every playground adventure need. Our friendly design team sincerely loves what they do,
                                and are
                                committed to creating smiles, and spreading happiness one park at a time.</p>
                            <p>
                                <a href="{{ route('contacts.index') }}" class="tf-btn btn-onsurface mt-3">Contact Us <i
                                        class="icon-arrow-up-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/3-1.png') }}" alt="img_box-about">
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
                            <h3 class="wow fadeInUp">4. One Stop Play Shop </h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.5s">
                                As a leading commercial playground equipment company our goal at Adventure
                                Playground Systems is to make
                                your next play project experience as easy as possible. We strive to be a turnkey,
                                one-stop shop resource
                                for all of your playground projects! To help facilitate all of our customer’s
                                outdoor recreational
                                needs, we are now offering a vastly extended line of park and playground products
                                from our
                                industry-leading manufacturing partners. We are committed to providing our customers
                                with the highest
                                quality products from other leading playground manufacturers we know and trust.
                                Should you need
                                additional information about any of our Manufacturing Partners or their product
                                lines, an Adventure Play
                                Expert is here to help. Whether you’re looking for dog park
                                equipment, composite play structures, splash pad
                                components, outdoor fitness equipment, site amenities or other park accessories, we
                                have it all.</p>
                            <p><a href="{{ route('products') }}" class="tf-btn btn-onsurface mt-3">View
                                    Products <i class="icon-arrow-up-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-4">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">5. Adventure Installation Experts</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.6s">
                                {{ config('app.name') }} offers complete playground installation services in our home state
                                of Texas.
                                We are one of only a few companies to offer turn-key manufacturing and installation services
                                on all
                                commercial playgrounds. This means we will handle everything from initial consultation,
                                playground
                                design and layout, product manufacturing, permitting and turn key installation with safety
                                surfacing.
                                All of our installations are inspected by one of our in-house certified playground safety
                                inspectors to
                                ensure that every playground we offer exceeds all required state and federal standards for
                                safety and
                                durability. We specialize in playground design and installation. We have the experience and
                                expertise to
                                create and install playground equipment that is unmatched within the playground industry.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/safety.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/shutterstock_321975329.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">6. Building Customer Relationships to Last</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.7s">
                                We start with a promise to uphold the very highest standards of quality and safety. We back
                                this promise
                                with comprehensive quality, excellent customer service and one of the best warranties on the
                                market. Our
                                extensive customer service program makes sure you’ll never have to worry if you encounter
                                challenges
                                while planning, installing and maintaining your playground products, or during safety
                                inspections at
                                your playground. When it comes time to purchase your next playground, we want you to rely on
                                the
                                friendly Play Experts at {{ config('app.name') }}s for all your sales, service and
                                installation
                                needs. Our friendly team of Adventure Play Experts are happy to offer their expert advice
                                and
                                suggestions to find the commercial play equipment that is right for you. We can guide you
                                through every
                                stage of your &nbsp;outdoor recreational project so you get the park or playground area
                                you’ve always
                                dreamed of.</p>
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
                        <h1 class="wow fadeInUp text-uppercase">CONTACT {{ config('app.name') }}</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.8s">
                            If you’re searching for quality outdoor playground equipment manufacturers,
                            or to learn more about one of the top children’s play equipment manufacturers in the United
                            States,
                            contact an Adventure Play Expert by calling us at <a href="tel:18889352112">1.888.935.2112</a>
                            or
                            filling out our online contact form.
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
