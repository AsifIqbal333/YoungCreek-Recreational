@extends('layouts.website')

@php
    $title = 'Playground Maintenance & Inspection';
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
                        <h1 class="wow fadeInUp">Playground Maintenance & Inspection</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            What is the significance of routinely evaluating and maintaining play areas?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.about-us-main -->

    <section class="flat-spacing pt-0">
        <div class="container">
            <div class="terms-of-use-wrap">
                <div class="right">
                    {{-- <h4 class="heading pb-1 mb-0">Advantages of YoungCreek Recreational, installation services</h4> --}}
                    <p class="pb-4">Over time, play areas and their surfaces experience deterioration from activity,
                        environmental
                        factors, and improper handling. To prevent this, regular evaluations are crucial. Maintaining these
                        spaces offers significant positive outcomes.</p>
                    <div class="terms-of-use-item item-scroll-target">
                        <h5 class="terms-of-use-title">Handle Risk</h5>
                        <div class="terms-of-use-content">
                            <p>Regular maintenance of play spaces offers dual advantages: it promotes a safer environment
                                for the
                                community and minimizes the likelihood of costly incidents. By prioritizing upkeep, a
                                community
                                demonstrates its dedication to user well-being, which can also translate to reduced
                                liability.</p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target">
                        <h5 class="terms-of-use-title">Preserve Your Capital</h5>
                        <div class="terms-of-use-content">
                            <p>Organizations and municipalities allocate significant funds to create play areas, ensure safe
                                surfaces, provide shade, and improve site aesthetics. To realize the full potential of these
                                investments and prolong their utility, consistent upkeep is crucial.</p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target">
                        <h5 class="terms-of-use-title">Optimizing Play for Kids</h5>
                        <div class="terms-of-use-content">
                            <p>When playground gear is out of order, children are denied the chance to engage in crucial
                                play
                                activities. This results in the irretrievable loss of collaborative learning and enjoyable
                                social
                                connections. The condition of the play area directly influences a child's ability to benefit
                                from
                                recreational activities. Your actions are impactful!</p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target">
                        <h5 class="terms-of-use-title">Strengthen Social Bonds</h5>
                        <div class="terms-of-use-content">
                            <p>The condition of a community's shared green spaces significantly impacts its overall appeal.
                                By
                                ensuring the upkeep of play areas, fitness equipment, dog parks, and other amenities,
                                residents
                                cultivate a positive environment and demonstrate their collective dedication to stewardship.
                            </p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target">
                        <h5 class="terms-of-use-title">Regulate Expenditures</h5>
                        <div class="terms-of-use-content">
                            <p>By performing routine, preventive maintenance at the right time, one can lower overall
                                costs
                                associated with repairs and replacements, and improve budget accuracy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- .about-us -->
    <section class="flat-spacing-2 about-us pt-0">
        <div class="container">
            <div class="heading-section text-center spacing-2">
                <h2 class="wow fadeInUp">Service Procedures and Schedule of Checks</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/Measureopt.png') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">How are playground safety checks conducted?<h3>
                                    <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                        Young Creek Installers prioritizes safety by including an initial
                                        safety check with every new play area installation, conducted during the final
                                        walk-through. We
                                        also equip our clients with comprehensive maintenance guides and provide the option
                                        for
                                        expert-led training to ensure your team is well-versed in proper upkeep. For
                                        existing
                                        playgrounds, a professional safety inspection can highlight any areas that fall
                                        short of current
                                        safety standards, allowing for the development of a systematic approach to address
                                        identified
                                        issues through removal, repair, or modification.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">How frequently do playgrounds need safety checks?</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                To establish an appropriate inspection schedule, several variables must be considered. These
                                encompass
                                the equipment's lifespan, usage intensity, and constituent materials. Additionally, external
                                influences
                                such as the typical user age, regional weather patterns, and potential for intentional
                                damage play a
                                crucial role. Irrespective of the unique characteristics of any play area, a combination of
                                less
                                frequent and more frequent inspections is essential for ongoing safety.</p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">Reduced-Interval Examination</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.4s">
                                Periodic, thorough evaluations are conducted on equipment and ground surfaces to identify
                                deterioration.
                                Typically occurring at intervals of three to six months, these assessments demand personnel
                                skilled in
                                mechanics or possessing comprehensive understanding of recreational apparatus and surface
                                safety
                                regulations. Any identified issues should be addressed promptly through preventative upkeep,
                                repairs, or
                                removal of compromised components.</p>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.5s">
                                For instance, if an assessment reveals significant deterioration of swing seats or chains,
                                those
                                components would require replacement. To see a sample assessment document and its associated
                                terminology, click here. If you need assistance determining the appropriate personnel for
                                this work,
                                YoungCreek Recreational, LLCreations can offer guidance.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/Safety2.png') }}" alt="img_box-about">
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/safety.jpg') }}" alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Regular Examinations</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.6s">
                                Routine, short-interval checks are essential for maintaining playground safety, addressing
                                issues that
                                arise from daily wear, environmental factors, or intentional damage. These inspections,
                                typically
                                conducted on a daily or weekly schedule, focus on aspects like the depth of loose-fill
                                materials,
                                cleanliness, and the removal of litter. Any identified problems should be addressed
                                according to
                                established organizational protocols, which may include recording the findings, temporarily
                                closing the
                                area, and/or implementing corrective actions. A sample inspection checklist and its
                                associated coding
                                system are available here.</p>
                        </div>
                        <div class="heading-section spacing-3">
                            <h5 class="wow fadeInUp">What are the necessary forms for
                                inspection?</h5>
                            <p class="text-body-2 text_secondary wow fadeInUp" data-wow-delay="0.7s">
                                Records of playground assessments, upkeep, and fixes are crucial for
                                planning continuous care, financial allocation, and workforce scheduling. These documents
                                also aid
                                in the planning of new park areas and future equipment additions. A complete resource
                                covering
                                playground assessment and upkeep is available for download. Customizing assessment
                                checklists to
                                align with your organization's unique site and policy demands is essential. Given the
                                diversity of
                                playground environments, these checklists should be viewed as initial tools, not exhaustive
                                guides
                                to all potential dangers or upkeep requirements. For a thorough evaluation of your site,
                                reach out
                                to YoungCreek Recreational, LLCreations.</p>
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
                        <h1 class="wow fadeInUp text-uppercase">Download our Maintenance Guide</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.8s">
                            YoungCreek Recreational, LLCreations offers a set of
                            playground planning aids, designed to support you through each phase of the project. Within
                            these resources, you'll discover insights into playground safety, covering areas such as
                            regulatory standards, inspection protocols, and maintenance best practices.
                        </p>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{ asset('docs/APS-Playground-Maintenance-Checklist.pdf') }}"
                                class="tf-btn btn-onsurface" target="_blank" rel="noopener"
                                download="APS-Playground-Maintenance-Checklist.pdf">Periodic Playground Maintenance
                                Checklist</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{ asset('docs/High-Frequency-Inspections.pdf') }}" class="tf-btn btn-onsurface"
                                target="_blank" rel="noopener" download="High-Frequency-Inspections.pdf">High-Frequency
                                Inspection Form</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-3">
                            <a href="{{ asset('docs/Inspection-Guide.pdf') }}" class="tf-btn btn-onsurface"
                                target="_blank" rel="noopener" download="Inspection-Guide.pdf">Low-Frequency Inspection
                                Form</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.about-us-main -->
@endsection
