@extends('layouts.website')

@php
    $title = 'Certifications & Partnerships';
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
                        <h1 class="wow fadeInUp">Certifications</h1>
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
                        <img class="lazyload" src="{{ asset('images/green-circle.png') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Green Circle</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                Green Circle Certified provides third-party verification of sustainability claims. In the
                                context of
                                playgrounds, this certification assures that products and processes meet rigorous
                                environmental
                                standards. It validates claims related to recycled content, recyclable materials, and
                                reduced
                                environmental impact. Specifically, Green Circle certification can verify that playground
                                equipment
                                utilizes recycled materials, reduces waste, and minimizes harmful emissions. This helps
                                consumers
                                and organizations make informed choices when selecting playground equipment.</p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">Here at YoungCreek
                                Recreational, LLCreations, we are proud to be Green Circle Certified. This
                                certification
                                underlines our dedication to environmental responsibility. We strive to provide safe,
                                durable, and
                                sustainable playground solutions, ensuring that our products contribute positively to both
                                children's well-being and the planet's health.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">NATIONAL RECREATION AND PARK ASSOCIATION (NRPA)</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                It's important to clarify that while the National Recreation and Park Association (NRPA) is
                                heavily
                                involved in playground safety, particularly through its Certified Playground Safety
                                Inspector (CPSI)
                                program, the focus is primarily on safety, not a distinct "green" certification. The CPSI
                                program
                                ensures professionals can identify hazards and manage risks on playgrounds. That being said,
                                there
                                is a growing trend in the recreation industry to incorporate sustainable practices.</p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                The NRPA supports these practices. So to clarify. The NRPA provides the CPSI certification
                                that is a
                                safety certification. Our company YoungCreek Recreational, LLCreations, holds a green circle
                                certification that
                                demonstrates our commitment to sustainable and environmentally responsible practices in
                                playground
                                construction and equipment provision.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/NRPA.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/ipema__logo-e1538418968170-300x103.png') }}"
                            alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">INTERNATIONAL PLAY EQUIPMENT MANUFACTURERS ASSOCIATION (IPEMA)</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                To ensure safe recreational spaces, a program exists where independent testing verifies
                                playground
                                equipment compliance with established safety standards. Specifically, TÜV SÜD America Inc.
                                (TÜV), an
                                accredited laboratory, assesses manufacturer claims against ASTM F1487, "Standard Consumer
                                Safety
                                Performance Specification for Playground Equipment for Public Use," excluding sections
                                7.1.1, 10,
                                12.6.1, 13.2, and 13.3, and/or CAN/CSA Z614, "Children's Play spaces and Equipment,"
                                excluding
                                clauses 9.8, 10, and 11. When a manufacturer uses a particular logo in their materials, such
                                as
                                YoungCreek Recreational, LLC' catalog, it indicates that they have received written
                                confirmation
                                from the independent laboratory that their product(s) meet the requirements of the specified
                                standard(s). For verification of product validation, please refer to the IPEMA website (<a
                                    href="https://ipema.org/" target="_blank" rel="noopener noreferrer">www.ipema.org</a>)
                                to
                                confirm product validation.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">AMERICAN SOCIETY FOR TESTING AND MATERIALS (ASTM)</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.4s">
                                Public playground equipment safety is guided by established technical standards, such as
                                ASTM
                                F1487-17, which provides consumer safety performance specifications. Our products are
                                designed and
                                manufactured to comply with, or exceed, these safety criteria. For comprehensive
                                information, please
                                refer to: &#8211; <a href="https://www.astm.org/" target="_blank"
                                    rel="noopener noreferrer">https://www.astm.org/</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/ASTMLOGO-300x275.jpg') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-1">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/CPSCLOGO-150x150.jpg') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">U.S. CONSUMER PRODUCT SAFETY COMMISSION (U.S CPSC)</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.5s">
                                Standards for playground equipment, both for public and residential use, have been developed
                                and are
                                maintained by the U.S. Consumer Product Safety Commission (CPSC). These standards, detailed
                                in their
                                Public Playground Safety Handbook, have undergone several revisions since their initial 1981
                                publication, with updates occurring in 1991, 1994, 1997, 2008, and 2010. Our product line is
                                designed to comply with, or surpass, the safety benchmarks established by this governing
                                body. For
                                comprehensive details, please refer to the CPSC website at <a href="https://www.cpsc.gov/"
                                    target="_blank" rel="noopener noreferrer">www.cpsc.gov</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- .about-us -->

@endsection
