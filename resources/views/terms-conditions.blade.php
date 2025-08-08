@extends('layouts.website')

@php
    $title = 'Terms & Conditions';
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
                        <h6 class="btn-scroll-target active" data-scroll="accept-payment-form">1. Accepted Payment Forms</h6>
                        <h6 class="btn-scroll-target" data-scroll="invoice-terms">2. Invoice Terms</h6>
                        <h6 class="btn-scroll-target" data-scroll="pay-credit-card">3. Pay by Credit Card
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="pay-by-check">4. Pay by Check</h6>
                        <h6 class="btn-scroll-target" data-scroll="pay-wire-transfer">5. Pay by Wire Transfer</h6>
                        <h6 class="btn-scroll-target" data-scroll="financing">6. Financing</h6>
                        <h6 class="btn-scroll-target" data-scroll="taxes-fees">7. Taxes and Fees</h6>
                        <h6 class="btn-scroll-target" data-scroll="returns">8. Returns</h6>
                        <h6 class="btn-scroll-target" data-scroll="cancellations">9. Cancellations</h6>
                        <h6 class="btn-scroll-target" data-scroll="shipping-receiving-storage">10. Shipping, Receiving and
                            Storage</h6>
                        <h6 class="btn-scroll-target" data-scroll="backorders">11. Backorders</h6>
                        <h6 class="btn-scroll-target" data-scroll="freight">12. Freight</h6>
                        <h6 class="btn-scroll-target" data-scroll="delivery-uploading">13. Delivery & Unloading</h6>
                        <h6 class="btn-scroll-target" data-scroll="damaged-shipments">14. Damaged Shipments</h6>
                        <h6 class="btn-scroll-target" data-scroll="addiotional-freight">15. Additional Freight Services</h6>
                        <h6 class="btn-scroll-target" data-scroll="storage-security">16. Storage & Security</h6>
                        <h6 class="btn-scroll-target" data-scroll="missing-parts">17. Missing Parts & Replacement Parts</h6>
                        <h6 class="btn-scroll-target" data-scroll="shipping-outside-usa">18. Shipping Outside of the United
                            States</h6>
                        <h6 class="btn-scroll-target" data-scroll="permitting">19. Permitting</h6>
                        <h6 class="btn-scroll-target" data-scroll="assembly">20. Assembly</h6>
                        <h6 class="btn-scroll-target" data-scroll="customer-installed-order">21. Customer Installed Order
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="turnkey-installation">22. Turnkey Installation</h6>
                        <h6 class="btn-scroll-target" data-scroll="schedule">23. Schedule</h6>
                        <h6 class="btn-scroll-target" data-scroll="site-preparation">24. SITE PREPARATION</h6>
                        <h6 class="btn-scroll-target" data-scroll="damage-owner-property">25. Damage to Owner’s Property
                        </h6>
                        <h6 class="btn-scroll-target" data-scroll="clean-up">26. Clean Up</h6>
                        <h6 class="btn-scroll-target" data-scroll="change-order">27. Change Orders</h6>
                        <h6 class="btn-scroll-target" data-scroll="insurance">28. Insurance</h6>
                        <h6 class="btn-scroll-target" data-scroll="warranties">29. Warranties</h6>
                    </div>
                    <div class="right">
                        <h4 class="heading">{{ $title }}</h4>
                        <div class="terms-of-use-item item-scroll-target" data-scroll="accept-payment-form">
                            <h5 class="terms-of-use-title">1. Accepted Payment Forms</h5>
                            <div class="terms-of-use-content">
                                <p>We make placing an order with YoungCreek Recreational, LLC easy! Orders can be placed via
                                    our secure
                                    payment portal, telephone, fax, email, or by mailing a signed quote. We accept Visa,
                                    MasterCard,
                                    American Express, cash, check/money orders and wire transfers. We also accept purchase
                                    orders from
                                    government entities such as; public schools, county, state or federal agencies,
                                    municipalities,
                                    universities and military. All orders are officially placed upon receipt of payment or
                                    deposit.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="invoice-terms">
                            <h5 class="terms-of-use-title">2. Invoice Terms</h5>
                            <div class="terms-of-use-content">
                                <p>Orders over $5000 USD are eligible for invoiced payment terms. A deposit of 52% percent
                                    is due to
                                    YoungCreek Recreational, LLC upon the signing of the proposed contract (quote) as
                                    consideration of down payment on the Invoice total. The remaining balance is due prior
                                    to shipping
                                    or upon completion of installed work unless other specified terms are agreed to within
                                    the legal
                                    terms of a Project Contract.</p>
                                <p>A service charge of 1.5% per month will be assessed on the outstanding past due balance
                                    over 30 days
                                    from the completion date.</p>
                                <p>Ownership Title for all equipment is reserved by YoungCreek Recreational, LLC until
                                    payment in
                                    full is received. The right to enter the property and repossess said equipment is hereby
                                    granted to
                                    YoungCreek Recreational, LLC if payment is not rendered in accordance with the terms
                                    above.
                                    All payments made prior to repossession under this contract shall be forfeited to
                                    Adventure
                                    Playground Systems, Inc. as the cost incurred to procure, provide and recover the
                                    equipment.
                                    Repossession of product does not waive any damages or costs due as awarded by the
                                    courts.</p>
                                <p>All collections or litigation concerning this contract shall be governed by the laws of
                                    the State of
                                    Texas, with the venue in Harris County. If the contract is placed with an attorney for
                                    suit or
                                    collection through probate, bankruptcy or other legal proceedings, the customer agrees
                                    to pay all
                                    expenses and reasonable attorney fees incurred.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="pay-credit-card">
                            <h5 class="terms-of-use-title">3. Pay by Credit Card</h5>
                            <div class="terms-of-use-content">
                                <p>All major credit cards are accepted, including American Express, MasterCard, and Visa.
                                    Payments made
                                    to YoungCreek Recreational, LLC by credit card will incur a processing fee of 2.5%
                                    percent of
                                    the transaction amount paid. Other forms of payment options are available without a
                                    processing fee
                                    by check, cash, cashier’s check, money order or bank wire transfer.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="pay-by-check">
                            <h5 class="terms-of-use-title">4. Pay by Check</h5>
                            <div class="terms-of-use-content">
                                <p>If you wish to pay by check, just let one of our Play Experts know. They’ll be happy to
                                    email or fax
                                    your quote. When you are ready to proceed, please mail a check along with the signed
                                    quote to:</p>
                                <p>YoungCreek Recreational, LLC<br />
                                    10845 Church Lane,<br />
                                    Houston, TX. 77043</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="pay-wire-transfer">
                            <h5 class="terms-of-use-title">5. Pay by Wire Transfer</h5>
                            <div class="terms-of-use-content">
                                <p>Payment by wire transfer is accepted from all parties. Call a Play Expert for wire
                                    transfer
                                    information after you&#8217;ve received and accepted your quote.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="financing">
                            <h5 class="terms-of-use-title">6. Financing</h5>
                            <div class="terms-of-use-content">
                                <p>We understand that purchasing a playground and park equipment can be costly! We suggest
                                    several
                                    financing options that can be found in our <a href="#">Funding section</a>.
                                    Adventure
                                    Playground
                                    Systems often works with Navitas Financing (a third party entity). More information can
                                    be found on
                                    our Financing Page. All financing is subject to approval. If you plan on financing a
                                    purchase, you
                                    can use the online credit application or call Navitas at (877)628-4827 ext. 550 to
                                    discuss all of
                                    your options. We will work with customer approved financing vendors as well.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="taxes-fees">
                            <h5 class="terms-of-use-title">7. Taxes and Fees</h5>
                            <div class="terms-of-use-content">
                                <p>Texas state law requires that we collect 8.25% in sales tax on orders shipped within
                                    Texas. If your
                                    organization provides/holds a valid tax exemption certificate, please include it when
                                    returning your
                                    signed quote contract. YoungCreek Recreational, LLC will collect tax in concurrence with
                                    the state
                                    of purchase.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="returns">
                            <h5 class="terms-of-use-title">8. Returns</h5>
                            <div class="terms-of-use-content">
                                <p>No returns of merchandise will be accepted unless previously authorized in writing by
                                    Adventure
                                    Playground Systems, Inc. All approved returns are subject to a restocking fee of 25%
                                    plus freight
                                    charges incurred for return to original shipment origination.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="cancellations">
                            <h5 class="terms-of-use-title">9. Cancellations</h5>
                            <div class="terms-of-use-content">
                                <p>Your order may be canceled for any reason prior to processing (procurement and/or
                                    manufacturing
                                    started). Orders are normally processed within 24 hours after receipt of payment. Orders
                                    must be
                                    canceled via phone by calling 1.706.975.6673 and reiterated via email with a valid
                                    confirmation from
                                    an APS team member. An order is not considered canceled until a cancellation number is
                                    given.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="shipping-receiving-storage">
                            <h5 class="terms-of-use-title">10. Shipping, Receiving and Storage</h5>
                            <div class="terms-of-use-content">
                                <p>In order to deliver the most cost-effective option for our clients, YoungCreek
                                    Recreational, LLC
                                    seeks and engages the lowest cost freight and/or delivery options available. Most orders
                                    ship via
                                    common carrier freight trucking companies, UPS Ground, or Fedex., depending upon order
                                    size, weight
                                    and delivery address. We are not able to deliver to PO Box or APO/FPO addresses.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="backorders">
                            <h5 class="terms-of-use-title">11. Backorders</h5>
                            <div class="terms-of-use-content">
                                <p>YoungCreek Recreational, LLC is not responsible for back ordered items sourced through
                                    alternative
                                    manufacturers, which is beyond our control. We will make every effort to inform you of
                                    any items
                                    that are currently not in stock. Backorder dates may change without notice. If
                                    applicable, it is
                                    customers responsibility to cancel any back ordered item.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="freight">
                            <h5 class="terms-of-use-title">12. Freight</h5>
                            <div class="terms-of-use-content">
                                <p>All sales requiring freight delivery will be FOB (freight on board/free onboard), which
                                    means that
                                    ownership of goods transfers to the purchaser once the goods are loaded on the truck for
                                    delivery.
                                </p>
                                <p>The freight carrier, not YoungCreek Recreational, LLC, is liable for any damage to the
                                    equipment which occurs during shipping.</p>
                                <p>If your order requires delivery via common carrier, your delivery site must be able to
                                    accommodate a
                                    large delivery truck (including delivery by trucks pulling trailers up to 53&#8242; in
                                    length).
                                    Please check your site for low hanging wires and clearance restrictions directly in
                                    front of the
                                    delivery address. These may create obstacles that could affect delivery. In addition, a
                                    lift gate,
                                    and or forklift may be required for offloading and are the customer&#8217;s
                                    responsibility.</p>
                                <p>YoungCreek Recreational, LLC is not responsible for inaccurate or undeliverable
                                    addresses.<br />
                                    Products usually arrive 3-7 days from the date of departure from our facility. Customer
                                    is
                                    responsible for an additional redelivery fee if the delivery truck arrives, but the
                                    customer/agent
                                    is not present or able to accept delivery.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="delivery-uploading">
                            <h5 class="terms-of-use-title">13. Delivery & Unloading</h5>
                            <div class="terms-of-use-content">
                                <p>If installation services are purchased with your order, an YoungCreek Recreational, LLC
                                    installer
                                    will unload the delivered merchandise. If the installation is not purchased, unloading
                                    of equipment
                                    and inspection of incoming goods at the time of delivery is the customer&#8217;s
                                    responsibility.
                                    Most freight deliveries require personnel and/or a forklift for the safe unloading of
                                    goods. The
                                    driver will not assist in unloading the delivered merchandise. Please notify Adventure
                                    Playground
                                    Systems prior to delivery if special conditions need to be addressed, additional charges
                                    may apply.
                                </p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="damaged-shipments">
                            <h5 class="terms-of-use-title">14. Damaged Shipments</h5>
                            <div class="terms-of-use-content">
                                <p>Please note any shortages or damage on the bill of lading as soon as you okay to receive
                                    the
                                    delivery. In the event of damage, we will be happy to assist you with filing a freight
                                    claim to
                                    receive a replacement product.</p>
                                <p>Damage found after the shipment is unpacked (concealed damage) must be reported to an
                                    Adventure Play
                                    Expert within 48 hours of delivery. Please closely inspect your shipment! Most freight
                                    companies
                                    allow 72 hours from receipt to report concealed damage. <span
                                        style="text-decoration: underline;">DIGITAL PHOTOS MUST BE TAKEN</span>. If you
                                    discover damage
                                    of any kind, <span style="text-decoration: underline;">DO NOT DESTROY ANY </span><span
                                        style="text-decoration: underline;">ORIGINAL SHIPPING CARTONS</span>. If the
                                    condition of
                                    delivered freight before unloading indicates possible damage (damage to
                                    carton/pallet/crate), take
                                    pictures before unloading cartons.</p>
                                <p>YoungCreek Recreational, LLC will not replace items unless they are found to be
                                    defective, but this
                                    obligation is subject to limitations. YoungCreek Recreational, LLC will not be liable
                                    for
                                    incidental, indirect, special or consequential damages. In no event will we be liable
                                    for damages
                                    beyond the invoiced price. We do not offer discounts or refunds for late deliveries.
                                    Generally, the
                                    products we offer ship in the specified time frame. However, bad weather and other
                                    uncontrollable
                                    circumstances or acts of god may slow your delivery. We strive to provide you the most
                                    updated
                                    information regarding the shipment of your goods via email or the phone contact
                                    information you
                                    provided in your customer contact information.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="addiotional-freight">
                            <h5 class="terms-of-use-title">15. Additional Freight Services</h5>
                            <div class="terms-of-use-content">
                                <p>Additional services such as two-person delivery, liftgate service, or inside delivery are
                                    not
                                    included in the quoted shipping price unless specifically listed. In most cases, such
                                    services are
                                    not necessary if adequate personnel are available to assist in unloading.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="storage-security">
                            <h5 class="terms-of-use-title">16. Storage & Security</h5>
                            <div class="terms-of-use-content">
                                <p>Unless specifically listed on the signed quote, any on-site storage of playground
                                    equipment, whether
                                    installed or not, is the sole responsibility of the customer. After-hours site security
                                    is also the
                                    sole responsibility of the customer. Installation personnel may install an orange safety
                                    barrier or
                                    caution tape around the affected work area, but no fencing or erosion control will be
                                    installed
                                    unless specifically requested and detailed on the signed quote.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="missing-parts">
                            <h5 class="terms-of-use-title">17. Missing Parts & Replacement Parts</h5>
                            <div class="terms-of-use-content">
                                <p>A complete inventory of received and missing parts must be made against the packing list
                                    within 48
                                    hours of delivery. In the event that a discrepancy exists, please notify us immediately.
                                    Adventure
                                    Playground Systems will not replace missing parts reported more than 48 hours after the
                                    arrival of
                                    goods.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="shipping-outside-usa">
                            <h5 class="terms-of-use-title">18. Shipping Outside of the United States</h5>
                            <div class="terms-of-use-content">
                                <p>Broker fees, import fees, government duties and taxes are required to receive shipments
                                    and are the
                                    customer&#8217;s responsibility. Additional shipping costs may apply to orders outside
                                    of North
                                    America. We will always notify you of any change to the shipping amount required and
                                    await your
                                    approval before proceeding with order processing and shipment.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="permitting">
                            <h5 class="terms-of-use-title">19. Permitting</h5>
                            <div class="terms-of-use-content">
                                <p>Building permits required by local or state authorities and municipalities are not
                                    included and are
                                    the responsibility of the owner of the property unless specified and quoted as a
                                    separate line item
                                    in the quote. If YoungCreek Recreational, LLC is to handle required permitting, please
                                    provide
                                    our office with necessary drawings and site documentation as requested per the project
                                    details (ie.
                                    legal site plans, survey plats, deed restrictions, etc).</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="assembly">
                            <h5 class="terms-of-use-title">20. Assembly</h5>
                            <div class="terms-of-use-content">
                                <p>Unless noted on the quote, products are delivered unassembled. All products are shipped
                                    with detailed
                                    installation and assembly instructions.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="customer-installed-order">
                            <h5 class="terms-of-use-title">21. Customer Installed Order</h5>
                            <div class="terms-of-use-content">
                                <p>If customer assembles/installs equipment on their own, it is expected the customer will
                                    hire or
                                    engage qualified resources according to manufacturer instructions, and in compliance
                                    with standards
                                    established by the Consumer Product Safety Commission (CPSC) and the American Society
                                    for Testing
                                    and Materials (ASTM). YoungCreek Recreational, LLC suggests contacting the National
                                    Playground
                                    Contractors Association to find qualified Installers. Installation and assembly
                                    performed by the
                                    customer or third party entity may affect warranty if instructions are not followed as
                                    outlined.</p>
                                <p>If you have questions concerning installation or assembly, please <a
                                        href="{{ route('contacts.index') }}">contact one of our Play Experts</a> for
                                    assistance.
                                    Installation
                                    services may be purchased at a later date; however, the installation will be subject to
                                    installer
                                    availability for scheduling.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="turnkey-installation">
                            <h5 class="terms-of-use-title">22. Turnkey Installation</h5>
                            <div class="terms-of-use-content">
                                <p>Installation services include all labor and equipment required to complete the project.
                                    Installation
                                    charges are quoted based on a worksite that is accessible by truck, with no fencing,
                                    tree,
                                    landscaping or utility obstacles and level ground surface area (+/- 1-2% max slope). Any
                                    site work
                                    not expressly detailed in this proposal is excluded. Additional installation charges
                                    will incur for
                                    longer distances to a worksite, unlevel groundwork sites, removal of utilities,
                                    landscaping,
                                    existing equipment and/or abnormal substrates, (ie. rock, asphalt, landfill, etc.)</p>
                                <p>YoungCreek Recreational, LLC fully warrants the merchandise on this proposal to the
                                    manufacturer&#8217;s published standards as to material, workmanship, and installation.
                                    See Warranty
                                    section and/or attached drawings for specific layouts, warranty terms and
                                    specifications.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="schedule">
                            <h5 class="terms-of-use-title">23. Schedule</h5>
                            <div class="terms-of-use-content">
                                <p>Barring uncontrollable interference (weather, permits, site prep, shipping delays, etc.),
                                    installation should commence and be completed according to a previously established
                                    construction
                                    schedule.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="site-preparation">
                            <h5 class="terms-of-use-title">24. Site Preparation</h5>
                            <div class="terms-of-use-content">
                                <p>Customer will ensure the site is available and prepared for installation to begin on the
                                    date listed
                                    in the established construction schedule. Any delays or extensions to the project
                                    schedule resulting
                                    from conditions under the control of the customer may result in additional charges.</p>
                                <p>YoungCreek Recreational, LLC is not liable for damages to underground utilities and/or
                                    irrigation systems during installation. It is the customer&#8217;s responsibility to
                                    locate all
                                    underground utilities unless it is specified and quoted as a separate line item in the
                                    proposal.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="damage-owner-property">
                            <h5 class="terms-of-use-title">25. Damage to Owner’s Property</h5>
                            <div class="terms-of-use-content">
                                <p>In carrying out the installation, YoungCreek Recreational, LLC shall take necessary
                                    precautions to
                                    protect the Owner&#8217;s Property from damage caused by its operations. Adventure
                                    Playground
                                    Systems shall repair and/or replace to Owner&#8217;s satisfaction all damage deemed
                                    unnecessary to
                                    normal construction wear and tear at no expense to customer or Owner.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="clean-up">
                            <h5 class="terms-of-use-title">26. Clean Up</h5>
                            <div class="terms-of-use-content">
                                <p>YoungCreek Recreational, LLC shall on a daily basis keep the premises free from
                                    accumulations of
                                    waste material, debris or rubbish caused by its employees or work. We shall remove all
                                    waste
                                    material, debris, excess dirt and tools prior to completion.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="change-order">
                            <h5 class="terms-of-use-title">27. Change Orders</h5>
                            <div class="terms-of-use-content">
                                <p>Changes to the design, color selection, or overall equipment order are not permitted once
                                    the order
                                    has been placed, unless previously authorized in writing by YoungCreek Recreational, LLC
                                </p>
                                <p>No alterations, additions or deletions shall be made or performed except pursuant to a
                                    written change
                                    order signed by the customer and YoungCreek Recreational, LLC. If applicable additional
                                    charges will
                                    apply. YoungCreek Recreational, LLC shall not be entitled to make a claim for additional
                                    charges
                                    unless the customer has given prior written consent.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="insurance">
                            <h5 class="terms-of-use-title">28. Insurance</h5>
                            <div class="terms-of-use-content">
                                <p>Price quoted includes YoungCreek Recreational, LLC standard insurance coverage. Any
                                    charges by
                                    YoungCreek Recreational, LLC insurance carrier or agents for adding General Contractor
                                    or
                                    Owner as additional insured, waivers of subrogation or changes to standard coverage
                                    shall be added
                                    to contract invoice charges. No performance bond or payment bond shall be provided by
                                    Adventure
                                    Playground Systems, Inc. unless specified and quoted as a separate line item in the
                                    proposal.</p>
                            </div>
                        </div>

                        <div class="terms-of-use-item item-scroll-target" data-scroll="warranties">
                            <h5 class="terms-of-use-title">29. Warranties</h5>
                            <div class="terms-of-use-content">
                                <p>Warranty packets are mailed to the customer after final payment is received. Please see
                                    individual
                                    product warranties for further details.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /Terms of use -->

    </div><!-- main-content -->

@endsection
