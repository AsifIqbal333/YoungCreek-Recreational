@extends('layouts.website')

@php
    $title = 'Why Play Matters';
@endphp
@section('title', $title)

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
                        <h1 class="wow fadeInUp">Why Play Matters</h1>
                        <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                            Play is essential for the cognitive,
                            physical, and social development of young children. Engaging in outdoor activities nurtures
                            their natural curiosity and enthusiasm for exploration, fostering holistic growth. When provided
                            with an environment that stimulates imagination and creative thinking, children can develop
                            their full potential.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing pb-0 pt-0">
        <div class="container">
            <div class="terms-of-use-wrap">
                <div class="right">
                    <h4 class="heading">Our future is shaped by the power of play</h4>
                    <div class="terms-of-use-item item-scroll-target">
                        <div class="terms-of-use-content">
                            <p>Over the past generation, outdoor
                                playtime among children in the United States has declined by 71%. Research indicates that
                                children now spend an average of only four to seven minutes per day in unstructured outdoor
                                play. In contrast, the Centers for Disease Control and Prevention (CDC) recommends at least
                                60 minutes of daily physical activity for <a
                                    href="https://www.cdc.gov/physicalactivity/basics/children/index.htm" target="_blank"
                                    rel="noopener">Children</a> while the <a
                                    href="https://www.aap.org/en-us/advocacy-and-policy/aap-health-initiatives/HALF-Implementation-Guide/Age-Specific-Content/Pages/Toddler-Physical-Activity.aspx?nfstatus=401&amp;nftoken=00000000-0000-0000-0000-000000000000&amp;nfstatusdescription=ERROR:+No+local+token"
                                    target="_blank" rel="noopener">American Academy of Pediatrics</a> (AAP) suggests
                                that children aged 2 to 5 may require two or more hours of physical activity per
                                day.</p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target">
                        <div class="terms-of-use-content">
                            <p> The increasing prevalence of
                                digital technology has significantly altered children's play habits, replacing traditional,
                                self-directed outdoor activities with screen-based entertainment. This shift has contributed
                                to rising rates of childhood obesity and mental health concerns, including depression.
                                According to the CDC, the percentage of overweight youth has more than tripled since
                                1980.</p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target">
                        <div class="terms-of-use-content">
                            <p>To address these challenges, it is crucial to promote higher levels of physical activity
                                while
                                significantly reducing screen time. Outdoor play serves as a fundamental component of
                                children's
                                physical development. As adults, we have a responsibility to emphasize the value of play and
                                encourage active , setting a strong foundation for future generations to grow up both
                                physically and mentally healthy.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing">
        <div class="container">
            <div class="terms-of-use-wrap">
                <div class="right">
                    <h4 class="heading">Play by Hours</h4>
                    <div class="terms-of-use-item item-scroll-target" data-scroll="limitations">
                        <h5 class="terms-of-use-title">3-8 hours</h5>
                        <div class="terms-of-use-content">
                            <p>According to the market research firm Childwise, the average American child currently spends
                                a significant amount of time in front of digital screens.</p>
                        </div>
                    </div>
                    <div class="terms-of-use-item item-scroll-target" data-scroll="revisions-and-errata">
                        <h5 class="terms-of-use-title">81%</h5>
                        <div class="terms-of-use-content">
                            <p>The proportion of educators reporting positive behavioral changes in students following
                                recess.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing-2 about-us pt-0">
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
                            <h3 class="wow fadeInUp">The Advantages of Play</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.1s">
                                Laughter, movement, and exploration—these are the hallmarks of a vibrant playground. While
                                playgrounds are often associated with carefree fun, they play a crucial role in childhood
                                development. Dr. Kenneth Ginsburg of the American Academy of Pediatrics (AAP), speaking
                                before a
                                federal subcommittee, emphasized the profound impact of outdoor play on children’s growth:
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                “Play in an outdoor, natural environment allows children to explore both their world and
                                their
                                own minds… places virtually no bounds on the imagination and engages all of the senses. For
                                all
                                children, this setting allows for the full blossoming of creativity, curiosity, and the
                                associated
                                developmental advances.”
                            </p>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                Our partner organization, IPEMA, a leading authority in playground industry research and
                                development, has highlighted the significant role of play in fostering a child’s highest
                                level of
                                development. Studies confirm that unstructured outdoor play provides numerous benefits,
                                enhancing
                                physical, emotional, social, and cognitive skills essential for well-rounded growth.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Emotional Growth</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                Outdoor play fosters the development of essential emotional skills in children, enhancing
                                their
                                self-confidence and self-esteem through activities such as risk assessment, conflict
                                resolution, and
                                imaginative play. Engaging in unstructured play allows children to explore different
                                emotions and
                                outcomes through creative and pretend scenarios. Research by Andrea Faber Taylor from the
                                University
                                of Illinois, published in the Journal of Attention Disorders (2009), indicates that children
                                with
                                Attention-Deficit Hyperactivity Disorder (ADHD) demonstrate improved concentration after
                                outdoor
                                play. Additionally, a comprehensive report by the National Wildlife Federation, Whole Child:
                                Developing Mind, Body, and Spirit through Outdoor Play, highlights that time spent in nature
                                can
                                help reduce stress in children.</p>
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
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/SMILECLIMBER2-e1537559806531.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Physical Growth</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.2s">
                                Engaging in play offers significant physical benefits, enhancing a child's reflex
                                development,
                                movement control, and both fine and gross motor skills. It also promotes flexibility,
                                balance, and
                                overall physical fitness. Play is essential for key developmental milestones such as
                                crawling,
                                walking, running, and jumping, each of which contributes to a child's health and well-being.
                                Even a
                                seemingly simple activity like self-propelled swinging provides a comprehensive full-body
                                workout
                                while improving coordination, time sequencing, and balance.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Cognitive Development</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                Play helps children develop language and reasoning skills, encourages critical thinking and
                                problem-solving. It also helps their ability to focus and control their behavior. Kaplan’s
                                (1995)
                                Attention Restoration Theory (ART), explains the cognitive benefits nature provides. The
                                theory
                                suggests that nature has the capacity to renew attention after exerting mental energy such
                                as;
                                feeling tired after studying, working tirelessly on a work project or an assessment. Experts
                                from
                                neuroscientists to child development researchers agree that play is essential for brain
                                development.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/shutterstock_3552149-e1537559022683.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="img-style ">
                        <img class="lazyload" src="{{ asset('images/shutterstock_356147375-e1539886806616.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- box-about --}}
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">Social Development</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.3s">
                                Outdoor play areas often serve as an early setting for children to engage in social
                                interactions.
                                Developing social skills is a crucial aspect of a child's growth, shaping their ability to
                                communicate, cooperate, and build relationships. The experiences gained in these
                                environments
                                contribute to the foundation of well-adjusted and socially adept individuals.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row align-items-center mt-5">
                <div class="col-lg-6">
                    <div class="">
                        <div class="heading-section spacing-3">
                            <h3 class="wow fadeInUp">In her work <em>The Importance of Outdoor Play for Young Children’s
                                    Healthy Development</em>Authored by Gabriela Bento:</h3>
                            <p class="text-body-1 text_secondary wow fadeInUp" data-wow-delay="0.4s">
                                “Highlights how outdoor environments provide unique opportunities for both children and
                                adults to
                                express different aspects of their personalities that may not typically emerge indoors.
                                Building on
                                the research of Maynard, Waters, and Clement, she emphasizes that outdoor play fosters a
                                deeper
                                understanding of children, enabling more effective educational interventions. Additionally,
                                it has
                                been observed that outdoor play reduces conflicts and encourages greater cooperation among
                                children”
                            </p>
                            <p>
                                <a href="{{ route('contacts.index') }}" class="tf-btn btn-onsurface mt-3">Contact Us <i
                                        class="icon-arrow-up-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img-style">
                        <img class="lazyload" src="{{ asset('images/0042216-R2-050-23A-1-e1537803664635.jpg') }}"
                            alt="img_box-about">
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
