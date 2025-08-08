<?php

function menues()
{
    return [
        [
            'title' => 'Products',
            'items' => [
                [
                    "title" => "Commercial Play Equipment",
                    'type' => 'commercial-play-equipment',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'School Age Playgrounds (5-12 years)',
                            'category' => 'school-age-playgrounds-5-12-years',
                            'image' => asset('images/5-12_year.jpeg'),
                        ],
                        [
                            'title' => 'Preschool Playgrounds (2-5 years)',
                            'category' => 'pre-school-playgrounds-2-5-years',
                            'image' => asset('images/2-5_year.jpeg'),
                        ],
                        [
                            'title' => 'Toddler Playgrounds (6-23 months)',
                            'category' => 'toddler-playgrounds-6-23-months',
                            'image' => asset('images/toddler.jpeg'),
                        ],
                    ],
                ],
                [
                    "title" => "Independent Play",
                    'type' => 'independent-play',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'Outdoor Classroom',
                            'category' => 'outdoor-classroom',
                            'image' => asset('images/Outdoor-Classroom.jpg'),
                        ],
                        [
                            'title' => 'Dramatic & Imaginative Play',
                            'category' => 'dramatic-imaginative-play',
                            'image' => asset('images/Dramatic_Imaginative.jpg'),
                        ],
                        [
                            'title' => 'Sensory Tables & More',
                            'category' => 'sensory-tables',
                            'image' => asset('images/Sensory_Tables.jpg'),
                        ],
                        [
                            'title' => 'Infant Playsets & Play Essentials',
                            'category' => 'infant-playgrounds',
                            'image' => asset('images/Infant_Playsets.jpg'),
                        ],
                        [
                            'title' => 'Climbing Balance & Physical Play',
                            'category' => 'climbing-physical-play',
                            'image' => asset('images/Climbing_Balance.png'),
                        ],
                        // [
                        //     'title' => 'Swing Sets',
                        //     'category' => 'swing-sets',
                        //     'image' => asset('images/SWBN3-430x287%402x.png'),
                        // ],
                        [
                            'title' => 'Bouncers & Spring Riders',
                            'category' => 'bouncers-spring-riders',
                            'image' => asset('images/Bouncers_Spring.png'),
                        ],
                        [
                            'title' => 'Merry-Go-Rounds & Playground Spinners',
                            'category' => 'merry-go-rounds-spinners',
                            'image' => asset('images/Merry_Rounds.jpg'),
                        ],
                        [
                            // No category found
                            'title' => 'Outdoor Musical Instruments',
                            'category' => 'outdoor-musical-instruments',
                            'image' => asset('images/melody-product-type-946190.jpg'),
                        ],

                        [
                            'title' => 'Free Standing Slides',
                            'category' => 'free-standing-playground-slides',
                            'image' => asset('images/6-high-sectional-spiral-playground-slide-product-type-770798.jpg'),
                        ],
                        [
                            'title' => 'Apex Ascent Climbers',
                            'category' => 'apex-ascent-climbers',
                            'image' => asset('images/boulder-climber-with-slide-product-type-741779.jpg'),
                        ],
                        [
                            'title' => 'Orbital Ring Climbers',
                            'category' => 'orbital-ring-climbers',
                            'image' => asset('images/orbital-ring-serpent-climber-product-type-784125.jpg'),
                        ],
                        [
                            'title' => 'Nature Rocks Climbers',
                            'category' => 'nature-rocks-boulders-climbers',
                            'image' => asset('images/exploring-nature-10-outdoor-classroom-ideas-for-curious-minds-371194.jpg'),
                        ],
                        [
                            'title' => 'Climbing Nets',
                            'category' => 'climbing-nets',
                            'image' => asset('images/combination-manhole-rope-climber-with-side-nets-product-type-908935.jpg'),
                        ],
                    ],
                ],
                [
                    "title" => "Swings Sets",
                    'type' => 'swing-sets',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'Single Post Swing Sets',
                            'category' => 'single-post-swing-sets',
                            'image' => asset('images/SWG1-430x287.png'),
                        ],
                        [
                            'title' => 'Arch Post Swing Sets',
                            'category' => 'arch-post-swing-sets',
                            'image' => asset('images/SWAP1-430x287.png'),
                        ],
                        [
                            'title' => 'Tire Swing Sets',
                            'category' => 'tire-swing-sets',
                            'image' => asset('images/SWGT1-430x286.jpg'),
                        ],
                        [
                            'title' => 'Cantilever Swing Sets',
                            'category' => 'cantilever-swing-sets',
                            'image' => asset('images/TSWING1-430x288.jpg'),
                        ],
                        // [
                        //     'title' => 'Swing Sets With Shade',
                        //     'category' => 'swing-sets-with-shade',
                        //     'image' => asset('images/fd92797045e7fa0387d2eb42442318ab0c4055dabeda3eed4d0285c14ab43c05.jpeg'),
                        // ],
                        [
                            'title' => 'Swing Seats & Accessories',
                            'category' => 'swing-seats-accessories',
                            'image' => asset('images/552e32e20992fb7fbe273a21e89df08a87737244f72450262ca8b77f8b696206.jpeg'),
                        ],
                    ],
                ],
                [
                    "title" => "Shade & Shelter",
                    'type' => 'shade-shelter',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'Hip Shades',
                            'category' => 'hip-shades',
                            'image' => asset('images/hip-shades.jpeg'),
                        ],
                        [
                            'title' => 'Umbrella Shades',
                            'category' => 'umbrella-shades',
                            'image' => asset('images/Umbrella-Shades.jpeg'),
                        ],
                        [
                            'title' => 'Cantilever Shades',
                            'category' => 'cantilever-shades',
                            'image' => asset('images/Cantilever-Shades.jpeg'),
                        ],
                        [
                            'title' => 'Sail Shades',
                            'category' => 'sail-shades',
                            'image' => asset('images/Sail-Shades.jpeg'),
                        ],
                    ],
                ],
                [
                    "title" => "Site Amenities",
                    'type' => 'site-amenities',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'Picnic Tables',
                            'category' => 'picnic-tables',
                            'image' => asset('images/Picnic-Tables.jpg'),
                        ],
                        [
                            'title' => 'Trash Receptacles',
                            'category' => 'trash-receptacles',
                            'image' => asset('images/trash receptacle 1.jpg'),
                        ],
                        [
                            'title' => 'Benches',
                            'category' => 'benches',
                            'image' => asset('images/Benches.jpg'),
                        ],
                    ],
                ],
                [
                    "title" => "Safety Surfacing & Edging",
                    'type' => 'safety-surfacing-edging',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'Engineered Wood Fiber',
                            'category' => 'engineered-wood-fiber',
                            'image' => asset('images/Engineered wood fiber1.jpg'),
                        ],
                        [
                            'title' => 'EPDM Pour in Place Rubber',
                            'category' => 'epdm-pour-in-place-rubber',
                            'image' => asset('images/EPDM Poured-in-Place Rubber Surfacing 1.jpg'),
                        ],
                        [
                            'title' => 'Loose Fill Rubber Mulch',
                            'category' => 'loose-fill-rubber-mulch',
                            'image' => asset('images/rubber mulch1.jpg'),
                        ],
                        [
                            'title' => 'Synthetic Grass Turf',
                            'category' => 'synthetic-grass-turf',
                            'image' => asset('images/synthetic grass 1.jpg'),
                        ],
                        [
                            'title' => 'APS Plastic Playground Borders',
                            'category' => 'aps-plastic-playground-borders',
                            'image' => asset('images/plastic playground 1.jpg'),
                        ],
                        [
                            'title' => 'APS Plastic ADA Ramp',
                            'category' => 'aps-plastic-ada-ramp',
                            'image' => asset('images/ada plastic ramp.jpg'),
                        ],
                        [
                            'title' => 'Rubber Timber',
                            'category' => 'rubber-timber',
                            'image' => asset('images/rubber timber 1.jpg'),
                        ],
                        [
                            'title' => 'Swing Mat',
                            'category' => 'swing-mat',
                            'image' => asset('images/swing mat 1.jpg'),
                        ],
                        [
                            'title' => 'Rubber Pavers',
                            'category' => 'rubber-pavers',
                            'image' => asset('images/rubber paver 1.jpg'),
                        ],
                    ],
                ],
                [
                    "title" => "Dog Parks",
                    'type' => 'dog-parks',
                    'category' => '',
                    'items' => [
                        // [
                        //     'title' => 'Independent Pup Products',
                        //     'category' => 'independent-pup-products',
                        //     'image' => asset('images/UDOGKIT01FRONT-430x242-1.png'),
                        // ],
                        // [
                        //     'title' => 'Dog Park Site Amenities',
                        //     'category' => 'dog-park-site-smenities',
                        //     'image' => asset('images/UDOG320FRONT-1-430x287-2.png'),
                        // ],
                        [
                            'title' => 'Dog Course Kits',
                            'category' => 'dog-course-kits',
                            // 'image' => asset('images/dog-course.jpeg'),
                            'image' => asset('images/UDOG491FRONT-430x287-1.png'),
                        ],
                    ],
                ],
                [
                    "title" => "Accessories & Replacement Parts",
                    'type' => 'accessories-replacement-parts',
                    'category' => '',
                    'items' => [
                        [
                            'title' => 'Swing Belts & Chains',
                            'category' => 'swing-belts-chains',
                            'image' => asset('images/Swing-Belts.jpeg'),
                        ],
                        [
                            'title' => 'Toddler Bucket Seats',
                            'category' => 'toddler-bucket-seats',
                            'image' => asset('images/toddler-bucket.jpeg'),
                        ],
                    ],
                ],
            ]
        ],
        [
            'title' => 'Our Company',
            'items' => [
                [
                    'title' => 'About Us',
                    'href' => route('about-us'),
                ],
                [
                    'title' => 'About Our Product',
                    'href' => route('about-our-product'),
                ],
                [
                    'title' => 'Why Play Matters',
                    'href' => route('why-play-matters'),
                ],
                [
                    'title' => 'Who We Serve',
                    'href' => route('who-we-serve'),
                ],
                [
                    'title' => 'Installation Services',
                    'href' => route('playground-installation'),
                ],
                [
                    'title' => 'Certifications & Partnerships',
                    'href' => route('certifications-partnerships'),
                ],
            ],
        ],
        [
            'title' => 'Planning Tools',
            'items' => [
                [
                    "title" => "Plan Your Playground",
                    'href' => route('plan-your-playground'),
                    'items' => [
                        [
                            'title' => 'Playground Planning Checklist',
                            'href' => '#', // link to page
                            'image' => asset('images/5-12_year.jpeg'),
                        ],
                        [
                            'title' => 'Budget Breakdown',
                            'href' => '#', // link to page
                            'image' => asset('images/2-5_year.jpeg'),
                        ],
                        // add more as want
                    ],
                ],
                [
                    "title" => "Safety Tools",
                    'href' => route('playground-maintenance-inspection'),
                    'items' => [
                        [
                            'title' => 'Safety Standards',
                            'href' => '#', // link to page
                            'image' => asset('images/5-12_year.jpeg'),
                        ],
                        // add more as want
                    ],
                ],
                [
                    "title" => "Apply For Financing",
                    'href' => asset('docs/Playground_Equipment_Financing_DS.pdf'),
                    'items' => [
                        [
                            'title' => 'Playground Planning Checklist',
                            'href' => '#', // link to page
                            'image' => asset('images/5-12_year.jpeg'),
                        ],
                        // add more as want
                    ],
                ],
                // [
                //     'title' => 'Plan Your Playground',
                //     'href' => route('plan-your-playground'),
                // ],
                // [
                //     'title' => 'Safety Tools',
                //     'href' => route('playground-maintenance-inspection'),
                // ],
                // [
                //     'title' => 'Apply For Financing',
                //     'href' => asset('docs/Playground_Equipment_Financing_DS.pdf'),
                // ],
            ],
        ],
        [
            'title' => 'Galleries',
            'items' => [
                [
                    'title' => 'Photos',
                    'href' => "javascript:vod(0)",
                ],
                [
                    'title' => 'Videos',
                    'href' => "javascript:vod(0)",
                ],
                [
                    'title' => 'Catalogs',
                    'href' => "javascript:vod(0)",
                ],
                [
                    'title' => 'Projects',
                    'href' => "javascript:vod(0)",
                ],
            ],
        ],
    ];
}

function categories()
{
    // $products = menues()[0]['items'];
    // $categories = [];
    // foreach ($products as $product) {
    //     $item['title'] = $product['title'];
    //     $item['slug'] = str($product['title'])->slug()->value;

    //     $categories[] = $item;
    // }
    // return $categories;
    return [
        [
            "title" => "Commercial Play Equipment",
            'slug' => 'commercial-play-equipment',
            'image' => asset('theme/images/categories/commercial-play-equipment.jpg'),
            'items' => [
                [
                    'title' => 'School Age Playgrounds (5-12 years)',
                    'category' => 'school-age-playgrounds-5-12-years',
                    'image' => asset('images/5-12_year.jpeg'),
                ],
                [
                    'title' => 'Preschool Playgrounds (2-5 years)',
                    'category' => 'pre-school-playgrounds-2-5-years',
                    'image' => asset('images/2-5_year.jpeg'),
                ],
                [
                    'title' => 'Toddler Playgrounds (6-23 months)',
                    'category' => 'toddler-playgrounds-6-23-months',
                    'image' => asset('images/toddler.jpeg'),
                ],
            ],
        ],
        [
            "title" => "Independent Play",
            'slug' => 'independent-play',
            'image' => asset('theme/images/categories/independent-play.jpg'),
            'items' => [
                [
                    'title' => 'Outdoor Classroom',
                    'category' => 'outdoor-classroom',
                    'image' => asset('images/Outdoor-Classroom.jpg'),
                ],
                [
                    'title' => 'Dramatic & Imaginative Play',
                    'category' => 'dramatic-imaginative-play',
                    'image' => asset('images/Dramatic_Imaginative.jpg'),
                ],
                [
                    'title' => 'Sensory Tables & More',
                    'category' => 'sensory-tables',
                    'image' => asset('images/Sensory_Tables.jpg'),
                ],
                [
                    'title' => 'Infant Playsets & Play Essentials',
                    'category' => 'infant-playgrounds',
                    'image' => asset('images/Infant_Playsets.jpg'),
                ],
                [
                    'title' => 'Climbing Balance & Physical Play',
                    'category' => 'climbing-physical-play',
                    'image' => asset('images/Climbing_Balance.png'),
                ],
                [
                    'title' => 'Bouncers & Spring Riders',
                    'category' => 'bouncers-spring-riders',
                    'image' => asset('images/Bouncers_Spring.png'),
                ],
                [
                    'title' => 'Merry-Go-Rounds & Playground Spinners',
                    'category' => 'merry-go-rounds-spinners',
                    'image' => asset('images/Merry_Rounds.jpg'),
                ],
                [
                    // No category found
                    'title' => 'Outdoor Musical Instruments',
                    'category' => 'outdoor-musical-instruments',
                    'image' => asset('images/melody-product-type-946190.jpg'),
                ],

                [
                    'title' => 'Free Standing Slides',
                    'category' => 'free-standing-playground-slides',
                    'image' => asset('images/6-high-sectional-spiral-playground-slide-product-type-770798.jpg'),
                ],
                [
                    'title' => 'Apex Ascent Climbers',
                    'category' => 'apex-ascent-climbers',
                    'image' => asset('images/boulder-climber-with-slide-product-type-741779.jpg'),
                ],
                [
                    'title' => 'Orbital Ring Climbers',
                    'category' => 'orbital-ring-climbers',
                    'image' => asset('images/orbital-ring-serpent-climber-product-type-784125.jpg'),
                ],
                [
                    'title' => 'Nature Rocks Climbers',
                    'category' => 'nature-rocks-boulders-climbers',
                    'image' => asset('images/exploring-nature-10-outdoor-classroom-ideas-for-curious-minds-371194.jpg'),
                ],
                [
                    'title' => 'Climbing Nets',
                    'category' => 'climbing-nets',
                    'image' => asset('images/combination-manhole-rope-climber-with-side-nets-product-type-908935.jpg'),
                ],
            ],
        ],
        [
            "title" => "Swings Sets",
            'slug' => 'swing-sets',
            'image' => asset('theme/images/categories/swing-sets.jpg'),
            'items' => [
                [
                    'title' => 'Single Post Swing Sets',
                    'category' => 'single-post-swing-sets',
                    'image' => asset('images/SWG1-430x287.png'),
                ],
                [
                    'title' => 'Arch Post Swing Sets',
                    'category' => 'arch-post-swing-sets',
                    'image' => asset('images/SWAP1-430x287.png'),
                ],
                [
                    'title' => 'Tire Swing Sets',
                    'category' => 'tire-swing-sets',
                    'image' => asset('images/SWGT1-430x286.jpg'),
                ],
                [
                    'title' => 'Cantilever Swing Sets',
                    'category' => 'cantilever-swing-sets',
                    'image' => asset('images/TSWING1-430x288.jpg'),
                ],
                // [
                //     'title' => 'Swing Sets With Shade',
                //     'category' => 'swing-sets-with-shade',
                //     'image' => asset('images/fd92797045e7fa0387d2eb42442318ab0c4055dabeda3eed4d0285c14ab43c05.jpeg'),
                // ],
                [
                    'title' => 'Swing Seats & Accessories',
                    'category' => 'swing-seats-accessories',
                    'image' => asset('images/552e32e20992fb7fbe273a21e89df08a87737244f72450262ca8b77f8b696206.jpeg'),
                ],
            ],
        ],
        [
            "title" => "Shade & Shelter",
            'slug' => 'shade-shelter',
            'image' => asset('theme/images/categories/shade-shelter.png'),
            'items' => [
                [
                    'title' => 'Hip Shades',
                    'category' => 'hip-shades',
                    'image' => asset('images/hip-shades.jpeg'),
                ],
                [
                    'title' => 'Umbrella Shades',
                    'category' => 'umbrella-shades',
                    'image' => asset('images/Umbrella-Shades.jpeg'),
                ],
                [
                    'title' => 'Cantilever Shades',
                    'category' => 'cantilever-shades',
                    'image' => asset('images/Cantilever-Shades.jpeg'),
                ],
                [
                    'title' => 'Sail Shades',
                    'category' => 'sail-shades',
                    'image' => asset('images/Sail-Shades.jpeg'),
                ],
            ],
        ],
        [
            "title" => "Site Amenities",
            'slug' => 'site-amenities',
            'image' => asset('theme/images/categories/site-amenities.jpg'),
            'items' => [
                [
                    'title' => 'Picnic Tables',
                    'category' => 'picnic-tables',
                    'image' => asset('images/Picnic-Tables.jpg'),
                ],
                [
                    'title' => 'Trash Receptacles',
                    'category' => 'trash-receptacles',
                    'image' => asset('images/trash receptacle 1.jpg'),
                ],
                [
                    'title' => 'Benches',
                    'category' => 'benches',
                    'image' => asset('images/Benches.jpg'),
                ],
            ],
        ],
        [
            "title" => "Dog Parks",
            'slug' => 'dog-parks',
            'image' => asset('theme/images/categories/dog-parks.jpg'),
            'items' => [
                // [
                //     'title' => 'Independent Pup Products',
                //     'category' => 'independent-pup-products',
                //     'image' => asset('images/UDOGKIT01FRONT-430x242-1.png'),
                // ],
                // [
                //     'title' => 'Dog Park Site Amenities',
                //     'category' => 'dog-park-site-smenities',
                //     'image' => asset('images/UDOG320FRONT-1-430x287-2.png'),
                // ],
                [
                    'title' => 'Dog Course Kits',
                    'category' => 'dog-course-kits',
                    // 'image' => asset('images/dog-course.jpeg'),
                    'image' => asset('images/UDOG491FRONT-430x287-1.png'),
                ],
            ],
        ],
        [
            "title" => "Accessories & Replacement Parts",
            'slug' => 'accessories-replacement-parts',
            'image' => asset('theme/images/categories/accessories-replacement-parts.jpg'),
            'items' => [
                [
                    'title' => 'Swing Belts & Chains',
                    'category' => 'swing-belts-chains',
                    'image' => asset('images/Swing-Belts.jpeg'),
                ],
                [
                    'title' => 'Toddler Bucket Seats',
                    'category' => 'toddler-bucket-seats',
                    'image' => asset('images/toddler-bucket.jpeg'),
                ],
            ],
        ],
        [
            "title" => "Safety Surfacing & Edging",
            'slug' => 'safety-surfacing-edging',
            'image' => asset('theme/images/categories/safety-surfacing-edging.jpg'),
            'product' => (object) [
                'id' => 'engineered-wood-fiber',
                'name' => 'Engineered Wood Fiber',
                'slug' => 'engineered-wood-fiber',
                'type' => 'safety-surfacing-edging',
                'category' => 'safety-surfacing-edging',
                'sub_category' => null,
                'price' => 0,
                'image' => asset('images/Engineered wood fiber1.jpg'),
            ],
            'products_count' => 9,
            'items' => [
                [
                    'title' => 'Engineered Wood Fiber',
                    'category' => 'engineered-wood-fiber',
                    'image' => asset('images/Engineered wood fiber1.jpg'),
                ],
                [
                    'title' => 'EPDM Pour in Place Rubber',
                    'category' => 'epdm-pour-in-place-rubber',
                    'image' => asset('images/EPDM Poured-in-Place Rubber Surfacing 1.jpg'),
                ],
                [
                    'title' => 'Loose Fill Rubber Mulch',
                    'category' => 'loose-fill-rubber-mulch',
                    'image' => asset('images/rubber mulch1.jpg'),
                ],
                [
                    'title' => 'Synthetic Grass Turf',
                    'category' => 'synthetic-grass-turf',
                    'image' => asset('images/synthetic grass 1.jpg'),
                ],
                [
                    'title' => 'APS Plastic Playground Borders',
                    'category' => 'aps-plastic-playground-borders',
                    'image' => asset('images/plastic playground 1.jpg'),
                ],
                [
                    'title' => 'APS Plastic ADA Ramp',
                    'category' => 'aps-plastic-ada-ramp',
                    'image' => asset('images/ada plastic ramp.jpg'),
                ],
                [
                    'title' => 'Rubber Timber',
                    'category' => 'rubber-timber',
                    'image' => asset('images/rubber timber 1.jpg'),
                ],
                [
                    'title' => 'Swing Mat',
                    'category' => 'swing-mat',
                    'image' => asset('images/swing mat 1.jpg'),
                ],
                [
                    'title' => 'Rubber Pavers',
                    'category' => 'rubber-pavers',
                    'image' => asset('images/rubber paver 1.jpg'),
                ],
            ],
        ],
    ];
}


