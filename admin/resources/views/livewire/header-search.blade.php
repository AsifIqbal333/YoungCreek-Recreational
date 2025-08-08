<div>
    <form role="search" method="get" class="search-form" action="{{ route('search') }}">
        <label>
            <span class="screen-reader-text">Search for:</span>
            <input type="search" class="search-field" placeholder="Search ..." value="" name="q"
                title="Search for:" wire:model.live.debounce="search">
        </label>
        <button type="submit" class="search-submit" value=""><span class="icon-search"></span></button>
    </form>

    <div class="search-results" style="margin-top: 10px;">
        <div class="grid-container">
            <div class="grid-item">
                @if ($suggestions->count() > 0)
                    <h6 class="search-product-heading">Suggestions</h6>
                @endif
                <div class="search-suggestions">
                    @foreach ($suggestions as $suggestion => $item)
                        @php
                            $word = implode(' ', array_slice(explode(' ', $suggestion), 0, 2));
                        @endphp
                        <a href="{{ route('search', ['q' => $word]) }}">{{ $word }}</a>
                    @endforeach
                </div>
            </div>
            <div class="grid-item">
                @if ($products->count() > 0)
                    <h6 class="search-product-heading">Products</h6>
                @endif

                <div class="search-products">
                    @foreach ($products as $product)
                        <a href="{{ route('products.show', $product->slug) }}" class="search-product">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            <p class="text-white">{{ $product->name }}</p>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
