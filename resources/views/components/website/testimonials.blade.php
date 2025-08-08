 @php
     $reviews = [
         [
             'name' => 'Sarah Mendez',
             'designation' => 'Business Manager',
             'review' =>
                 'The quality of the swings and slides is top-notch. My kids love playing outside now more than ever!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Jason Taylor',
             'designation' => 'Business Manager',
             'review' => 'Fast delivery and sturdy products. Very happy with the overall experience.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Emily Novak',
             'designation' => 'Business Manager',
             'review' =>
                 'Ordered a full playset for our daycare—safe, colorful, and perfectly designed for kids of all ages.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'David Kaur',
             'designation' => 'Business Manager',
             'review' => 'Simple to assemble and extremely durable. A great investment!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Melissa Chan',
             'designation' => 'Business Manager',
             'review' => 'Beautiful designs and vibrant colors. The playground looks fantastic in our backyard.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Ali Khan',
             'designation' => 'Business Manager',
             'review' => 'Kids don’t want to come back inside anymore. Great build quality!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Rebecca Liu',
             'designation' => 'Business Manager',
             'review' => 'Helpful team, easy ordering process, and very safe equipment. Highly recommend.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Zainab Shah',
             'designation' => 'Business Manager',
             'review' => 'Built a small play zone at our restaurant—parents love it, and it keeps kids happy!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Tom Riley',
             'designation' => 'Business Manager',
             'review' => 'Weather-resistant and strong. No rust even after a year. Impressive!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Priya Mehta',
             'designation' => 'Business Manager',
             'review' => 'We installed a climbing set at our preschool. Sturdy and safe for little ones.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Martin Castillo',
             'designation' => 'Business Manager',
             'review' => 'Affordable and reliable! My backyard finally feels complete.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Fatima Noor',
             'designation' => 'Business Manager',
             'review' => 'The monkey bars were a huge hit with our twins. Will definitely buy more soon.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Jacob D’Souza',
             'designation' => 'Business Manager',
             'review' => 'Customer service was responsive and helpful throughout. Great experience!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Ayesha Raza',
             'designation' => 'Business Manager',
             'review' => 'Strong materials, smooth finish, and easy to maintain. Just what we needed.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Daniel White',
             'designation' => 'Business Manager',
             'review' => 'Quality exceeded my expectations. Everything feels super safe.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Lena Griggs',
             'designation' => 'Business Manager',
             'review' => 'Colorful, safe, and very engaging for children. Worth every penny!',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Mohammed Faisal',
             'designation' => 'Business Manager',
             'review' => 'Installation was quick and the team guided us well. Highly satisfied.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Claire Nguyen',
             'designation' => 'Business Manager',
             'review' => 'Bought for a school—kids adore it and parents are reassured by the safety.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Lucas Pereira',
             'designation' => 'Business Manager',
             'review' => 'From order to setup, everything went smoothly. Excellent service.',
             'date' => '23 July, 2023',
         ],
         [
             'name' => 'Nina Patel',
             'designation' => 'Business Manager',
             'review' => 'Perfect for toddlers. Compact, safe, and beautifully crafted.',
             'date' => '23 July, 2023',
         ],
     ];
 @endphp
 <section class="flat-spacing-2  section-testimonials">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="heading-section text-center">
                     <h3 class="wow fadeInUp">Customer Review</h3>
                     <p class="text-body-default text_secondary wow fadeInUp" data-wow-delay="0.1s">Our customers adore
                         our products, and we
                         constantly aim to delight them.</p>
                 </div>
                 <div class="swiper tf-sw-testimonial" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30"
                     data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1"
                     data-pagination-lg="1">
                     <div class="swiper-wrapper">
                         @foreach ($reviews as $item)
                             <div class="swiper-slide">
                                 <div class="testimonial-item hover-img style-2">
                                     <div class="content">
                                         <div class="box-product">
                                             <div class="product-img avt-62 round">
                                                 <img src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($item['name']) }}"
                                                     alt="avt">
                                             </div>
                                             <div class="box-price">
                                                 <p class="text-title  text-line-clamp-1"> <span
                                                         class="link">{{ $item['name'] }}</span></p>
                                                 <div class="text-button price">{{ $item['designation'] }}</div>
                                             </div>
                                         </div>
                                         <div class="content-top">
                                             <p class="text-secondary">"{{ $item['review'] }}"</p>

                                             <div class="border-top pt-4">
                                                 <div class="box-author align-items-center d-flex gap-6">
                                                     <div class="list-star-default">
                                                         <i class="icon icon-star"></i>
                                                         <i class="icon icon-star"></i>
                                                         <i class="icon icon-star"></i>
                                                         <i class="icon icon-star"></i>
                                                         <i class="icon icon-star"></i>
                                                     </div>
                                                     <div class="text-caption-2">{{ $item['date'] }}</div>
                                                 </div>

                                                 <div class="align-items-center d-flex gap-6"
                                                     style="margin-top: -10px !important;">
                                                     <svg class="icon" width="20" height="21"
                                                         viewBox="0 0 20 21" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                         <g clip-path="url(#clip0_15758_14563)">
                                                             <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549"
                                                                 stroke="#3DAB25" stroke-width="1.5"
                                                                 stroke-linecap="round" stroke-linejoin="round" />
                                                             <path
                                                                 d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z"
                                                                 stroke="#3DAB25" stroke-width="1.5"
                                                                 stroke-linecap="round" stroke-linejoin="round" />
                                                         </g>
                                                         <defs>
                                                             <clipPath>
                                                                 <rect width="20" height="20" fill="white"
                                                                     transform="translate(0 0.684082)" />
                                                             </clipPath>
                                                         </defs>
                                                     </svg>
                                                     <div class="text-caption-2 text_secondary">Verified purchase</div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         @endforeach

                     </div>
                     <div class="sw-pagination-testimonial sw-dots type-circle d-flex justify-content-center">
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
