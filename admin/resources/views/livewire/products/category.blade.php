<div class="product-archive-container container">
    <x-alert />
    <div class="col-xxs-12 col-sm-4 col-md-3 woo-sidebar sidebar-top" wire:ignore>
        <h3 class="sidebar_sorting">Sort By:</h3>
        <span class="btn pointer" wire:click="sortBy('asc')">Price: Low - High</span><br />
        <span class="btn pointer" wire:click="sortBy('desc')">Price: High - Low</span><br />
        <span class="btn pointer" wire:click="sortBy('popularity')">Popularity</span><br />
        <div class="widget_text filter-title widget fx_filter_by">
            <div class="textwidget custom-html-widget">
                <h3>
                    Filter By:
                </h3>
            </div>
        </div>
        <div class="widget fx_filter_by">
            <h3>Capacity</h3>
            <ul class="woocommerce-widget-layered-nav-list">
                @foreach ($capacityFilters as $capacity => $count)
                    <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term pointer"
                        wire:click="filterBy('capacity','{{ $capacity }}')">
                        {{ $capacity }}
                        <span class="count">({{ $count }})</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="widget fx_filter_by">
            <h3>Price</h3>
            <ul class="woocommerce-widget-layered-nav-list">
                @foreach ($priceFilters as $range => $count)
                    <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term pointer"
                        wire:click="filterBy('price','{{ $range }}')">
                        {{ $range }}
                        <span class="count">({{ $count }})</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- <div class="widget fx_filter_by">
            <h3>Age Range</h3>
            <ul class="woocommerce-widget-layered-nav-list">
                @foreach ($ageRanges as $range => $count)
                    @if ($range)
                        <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term pointer"
                            wire:click="filterBy('age_group','{{ $range }}')">
                            {{ $range }}</span> <span class="count">({{ $count }})</span>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div> --}}
        <div class="widget fx_filter_by">
            <h3>Area Size</h3>
            <ul class="woocommerce-widget-layered-nav-list">
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term pointer">
                    <input type="text" id="width" placeholder="Width (Inches)"
                        style="height: 2.5rem; outline: none;" wire:model.live="width">
                </li>
                <li class="woocommerce-widget-layered-nav-list__item wc-layered-nav-term pointer">
                    <input type="text" id="length" placeholder="Length (Inches)"
                        style="height: 2.5rem; outline: none;" wire:model.live="length">
                </li>
            </ul>
        </div>
    </div>

    <div class="col-xxs-12 col-sm-8 col-md-push-1">
        <div class="term-description">
            <h2 class="title--border title-light-blue">Early Childhood Playground Equipment</h2>
            <p>Our Early Childhood Structures meet the licensing requirements and accreditation in early
                childhood programs like DFPS Texas Child Care Licensing and National Association for the
                Education of Young Children (NAEYC). By integrating best practices in meeting early
                childhood standards, these systems have been designed specifically for the littlest of
                Adventurers. The Early Childhood segment focuses on children 6 to 23 months old, that
                require safe environments that are both age appropriate and encourage them to explore their
                world. These products are designed to further enrich play in an indoor or outdoor learning
                environment. Each structure or independent play event focuses on building sensory,
                cognitive, social, communicative and physical skills in young children.</p>
        </div>
        <div class="woocommerce-notices-wrapper"></div>
        <ul class="products columns-2">
            @foreach ($products as $product)
                @php
                    $isEven = $loop->even ? true : false;
                @endphp
                <x-product :product="$product" :isEven="$isEven" />
            @endforeach


        </ul>
    </div>

</div>
