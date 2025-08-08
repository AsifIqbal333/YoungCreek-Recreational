@extends('layouts.website')

@php
    $title = 'Privacy Policy';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];
    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- main-content -->
    <div class="main-content">

        <!-- Terms of use -->
        <section class="flat-spacing">
            <div class="container">
                <div class="terms-of-use-wrap">
                    <div class="left">
                        <h6 class="btn-scroll-target active" data-scroll="privacy-policy">1. Privacy Policy </h6>
                        <h6 class="btn-scroll-target" data-scroll="collect-personal-info">2. Collection of your Personal
                            Information</h6>
                        <h6 class="btn-scroll-target" data-scroll="use-personal-info">3. Use of your Personal Information
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="sharing-with-third-parties">4. Sharing with Third Parties
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="tracking-user-behaviour">5. Tracking User Behavior</h6>
                        <h6 class="btn-scroll-target" data-scroll="auto-collect-info">6. Automatically Collected Information
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="links">7. Links</h6>
                        <h6 class="btn-scroll-target" data-scroll="security-of-data">8. Security of your Personal
                            Information</h6>
                        <h6 class="btn-scroll-target" data-scroll="ssl-protocol">9. SSL Protocol</h6>
                        <h6 class="btn-scroll-target" data-scroll="child-under-thirteen">10. Children Under Thirteen</h6>
                        <h6 class="btn-scroll-target" data-scroll="email-commonication">11. E-mail Communications</h6>
                        <h6 class="btn-scroll-target" data-scroll="external-data-storage">12. External Data Storage Sites
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="change-statement">13. Changes to this Statement</h6>
                        <h6 class="btn-scroll-target" data-scroll="contact-info">14. Contact Information</h6>
                    </div>
                    <div class="right">
                        <h4 class="heading">Terms of use</h4>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="privacy-policy">
                            <h5 class="terms-of-use-title">1. Privacy Policy</h5>
                            <div class="terms-of-use-content">
                                <p>Protecting your private information is our priority.The statement of
                                    privacy applies to YoungCreek Recreational, LLC and governs data collection and usage
                                    for
                                    the purposes of this privacy policy, unless otherwise noted. YoungCreek Recreational,
                                    LLC,
                                    Adventure Powder Coating, Adventure Shade Systems and </span><a
                                        href="https://www.youngcreekrec.com/"><span>youngcreekrec.com</span></a><span>. The
                                        YoungCreek Recreational, LLC website is an e-commerce site. By using the YoungCreek
                                        Recreational, LLC website you consent
                                        to the data practices described in this statement.</p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="collect-personal-info">
                            <h5 class="terms-of-use-title">2. Collection of your Personal Information</h5>
                            <div class="terms-of-use-content">
                                <p>In order to better provide you with products and services offered on
                                    our site, YoungCreek Recreational, LLC may collect personally identifiable information
                                    such as
                                    your:</p>
                                <ul>
                                    <li><span>First and Last name </span></li>
                                    <li><span>Mailing Address</span></li>
                                    <li><span>E-mail Address </span></li>
                                    <li><span>Phone Number</span></li>
                                    <li><span>Company Information</span></li>
                                </ul>
                                <p><span>If you purchase YoungCreek Recreational, LLC products and services,
                                        we collect customer information and payment details as well. This information is
                                        used to
                                        complete the purchase transaction.</span></p>
                                <p><span>We do not collect any personal information about you unless you
                                        voluntarily provide it to us.  However, you may be required to provide certain
                                        personal
                                        information to us when you elect to use certain products or services available on
                                        the site.
                                        These may include: </span></p>
                                <p><span>(a) registering for an account on our site</span></p>
                                <p><span>(b) signing up for special offers from selected third parties</span>
                                </p>
                                <p><span>(c) submitting a contact form</span></p>
                                <p><span>(d) submitting your credit card or other payment information when
                                        ordering and purchasing products and services on our site. </span></p>
                                <p><span>To which, we will use your information for,  but not limited to,
                                        communicating with you in relation to the services and/or products you have
                                        requested from us.
                                        We also may request additional personal or non-personal information from you in the
                                        future.
                                    </span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="use-personal-info">
                            <h5 class="terms-of-use-title">3. Use of your Personal Information</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC collects and uses your
                                        personal
                                        information to operate its website(s) and deliver the services you have requested.
                                    </span></p>
                                <p><span>YoungCreek Recreational, LLC may also use your personally
                                        identifiable information to inform you of other products or services available from
                                        Adventure
                                        Playground Systems and its affiliates upon your consent from data gathered while
                                        using
                                        websites.</span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="sharing-with-third-parties">
                            <h5 class="terms-of-use-title">4. Sharing with Third Parties</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC does not sell, rent or lease
                                        its
                                        customer list to third parties.</span></p>
                                <p><span>YoungCreek Recreational, LLC may share data with trusted
                                        partners to
                                        help perform statistical analysis, send you email or postal mail, provide customer
                                        support (ie.
                                        product warranty, maintenance, etc.) or arrange for deliveries. All such third
                                        parties are
                                        prohibited from using your personal information except to provide these services to
                                        Adventure
                                        Playground Systems and are required to maintain the confidentiality of your
                                        information. </span>
                                </p>
                                <p><span>YoungCreek Recreational, LLC may disclose your personal
                                        information,
                                        without notice, if required to do so by law or in the good faith belief that such
                                        action is
                                        necessary to; </span></p>
                                <p><span>(a) conform to the edicts of the law or comply with the
                                        legal process
                                        served to YoungCreek Recreational, LLC  </span></p>
                                <p><span>(b) protect and defend the rights or property of
                                        YoungCreek Recreational, LLC, Inc
                                    </span></p>
                                <p><span>(c) act under exigent circumstances to protect the
                                        personal safety of
                                        users of YoungCreek Recreational, LLC or the general public.</span></p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="tracking-user-behaviour">
                            <h5 class="terms-of-use-title">5. Tracking User Behavior</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC may keep track of the
                                        website and pages
                                        our users visit within YoungCreek Recreational, LLC in order to determine what
                                        products or
                                        services are most popular.  This data is used to deliver customized content and
                                        advertising
                                        within YoungCreek Recreational, LLC to customers whose behavior indicates that they
                                        are
                                        interested in a particular subject area. </span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="auto-collect-info">
                            <h5 class="terms-of-use-title">6. Automatically Collected Information</h5>
                            <div class="terms-of-use-content">
                                <p><span>Information about your computer hardware and software may
                                        be
                                        automatically collected by YoungCreek Recreational, LLC.  This information can
                                        include: your IP
                                        address, browser type, domain names, access times and referring website addresses.
                                        This
                                        information is used for the operation of the service, to maintain quality of the
                                        service, and to
                                        provide general statistics regarding use of the YoungCreek Recreational, LLC
                                        websites. </span>
                                </p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="links">
                            <h5 class="terms-of-use-title">7. Links</h5>
                            <div class="terms-of-use-content">
                                <p><span>This website contains links to other sites. Please be
                                        aware that we
                                        are not responsible for the content or privacy practices of such other sites. We
                                        encourage our
                                        users to be aware when they leave our site and to read the privacy statement of any
                                        other site
                                        that collects personally identifiable information. </span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="security-of-data">
                            <h5 class="terms-of-use-title">8. Security of your Personal Information</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC secures your personal
                                        information from
                                        unauthorized access, use, or disclosure.</span></p>
                                <p><span>YoungCreek Recreational, LLC uses the following method
                                        for this
                                        purpose:</span></p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="ssl-protocol">
                            <h5 class="terms-of-use-title">9. SSL Protocol</h5>
                            <div class="terms-of-use-content">
                                <p><span>When personal information (such as a credit card number)
                                        is
                                        transmitted to other websites, it is protected through the use of encryption, such
                                        as the Secure
                                        Sockets Layer(SSL) protocol.</span></p>
                                <p><span>We strive to take appropriate security measure to protect
                                        against
                                        unauthorized access to or alteration of your personal information. Unfortunately, no
                                        data
                                        transmission over the internet or any wireless network can be guaranteed to be 100%
                                        secure. As a
                                        result, while we strive to protect your personal information, you acknowledge that:
                                    </span></p>
                                <p><span>(a) there are security and privacy limitations inherent
                                        to the
                                        internet which are beyond our control</span></p>
                                <p><span>(b) security, integrity and privacy of any and all
                                        information and
                                        data exchanged between you and us through this site cannot be guaranteed</span></p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="child-under-thirteen">
                            <h5 class="terms-of-use-title">10. Children Under Thirteen</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC does not knowingly collect
                                        personally
                                        identifiable information from children under the age of thirteen. If you are under
                                        the age of
                                        thirteen, you must ask your parent or guardian for permission to use the website.
                                    </span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="email-commonication">
                            <h5 class="terms-of-use-title">11. E-mail Communications</h5>
                            <div class="terms-of-use-content">
                                <p><span>From time to time,YoungCreek Recreational, LLC may
                                        contact you via
                                        email for the purpose of providing announcements, promotional offers, alerts,
                                        confirmations,
                                        surveys and/or other general communication. </span></p>
                                <p><span>If you would like to stop receiving marketing or
                                        promotional
                                        communication via email from YoungCreek Recreational, LLC, you may opt out of such
                                        communication
                                        by clicking on the Unsubscribe button.</span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="external-data-storage">
                            <h5 class="terms-of-use-title">12. External Data Storage Sites</h5>
                            <div class="terms-of-use-content">
                                <p><span>We may store your personal information data on the
                                        servers provided
                                        by third party hosting vendors with whom we have contracted. No Credit Card data
                                        will be stored
                                        for future use.   </span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="change-statement">
                            <h5 class="terms-of-use-title">13. Changes to this Statement</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC reserves the right to
                                        change this
                                        privacy policy from time to time. We will notify you about significant changes in
                                        the way we
                                        treat personal information by sending a notice to the primary email address
                                        specified in your
                                        account, by placing a prominent notice on our site, and /or by updating any privacy
                                        information
                                        on this page. Your continued use of the site and/or services available through this
                                        site after
                                        such modifications will constitute your: </span></p>
                                <p><span>(a) acknowledgment of the modified privacy policy</span>
                                </p>
                                <p><span>(b) agreement to abide and be bound by that
                                        policy</span></p>
                            </div>
                        </div>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="contact-info">
                            <h5 class="terms-of-use-title">14. Contact Information</h5>
                            <div class="terms-of-use-content">
                                <p><span>YoungCreek Recreational, LLC welcomes your questions or
                                        comments
                                        regarding this statement of privacy. If you believe that YoungCreek Recreational,
                                        LLC has not
                                        adhered to this statement, please contact YoungCreek Recreational, LLC at: </span>
                                </p>
                                <p><strong>By Mail Delivery:</strong></p>
                                <p><span>YoungCreek Recreational, LLC Inc.</span></p>
                                <p><span>10845 Church Lane Houston,Texas 77043</span></p>
                                <p><strong>By Email Address:</strong></p>
                                <p><span>chris@youngcreekrec.com </span></p>
                                <p><strong>By Telephone number:</strong></p>
                                <p><span> Office: (713) 935-9684 </span></p>
                                <p><span> Toll Free: (888) 935-2112 </span></p>
                                <p><span>Effective as of October 03, 2018   </span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /Terms of use -->

    </div><!-- main-content -->

@endsection
