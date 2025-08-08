{{-- wire:poll.500ms --}}
<div class="modal-content" wire:poll>
    <div class="tf-minicart-recommendations">
        <h6 class="title">You May Also Like</h6>
        <div class="wrap-recommendations">
            <div class="list-cart">
                @foreach ($featureProducts as $product)
                    @php
                        $firstImage = $product->images->first()
                            ? product_image($product->category, $product->images->first()->image)
                            : asset('theme/images/shop/product-1.jpg');
                        $originalPrice = $product->price;
                        $viewLink = route('products.show', [
                            'type' => $product->type,
                            'slug' => $product->slug,
                        ]);
                    @endphp
                    <div class="list-cart-item">
                        <div class="image">
                            <img class="lazyload" data-src="{{ $firstImage }}" src="{{ $firstImage }}"
                                alt="feature image">
                        </div>
                        <div class="content">
                            <div class="name">
                                <a class="link text-line-clamp-1" href="{{ $viewLink }}">{{ $product->name }}</a>
                            </div>
                            <div class="cart-item-bot">
                                <div class="text-button price">${{ number_format($originalPrice, 2) }}</div>
                                <a class="link text-button" href="{{ $viewLink }}">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-grow-1 h-100">

        <div class="header">
            <h5 class="title">Shopping Cart</h5>
            <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
        </div>
        {{-- <div class="mx-2"><x-alert /></div> --}}
        <div class="wrap">
            {{-- <div class="tf-mini-cart-threshold">
                         <div class="tf-progress-bar">
                             <div class="value" style="width: 0%;" data-progress="75">
                                 <i class="icon icon-shipping"></i>
                             </div>
                         </div>
                         <div class="text-caption-1">
                             Congratulations! You've got free shipping!
                         </div>
                     </div> --}}
            <div class="tf-mini-cart-wrap">
                <div class="tf-mini-cart-main">
                    <div class="tf-mini-cart-sroll">
                        <div class="tf-mini-cart-items">
                            @php
                                $cartTotal = 0;
                            @endphp
                            @foreach ($carts as $item)
                                @php
                                    $viewLink = route('products.show', [
                                        'type' => $item->product->type,
                                        'slug' => $item->product->slug,
                                    ]);
                                    $itemTotal = $item->price * $item->quantity;
                                    $cartTotal += $itemTotal;
                                    $productImage = $item->product->image;
                                    $productName = $item->product->name;
                                @endphp
                                <div class="tf-mini-cart-item file-delete">
                                    <div class="tf-mini-cart-image">
                                        <img class="lazyload" data-src="{{ $productImage }}" src="{{ $productImage }}"
                                            alt="{{ $productName }}">
                                    </div>
                                    <div class="tf-mini-cart-info flex-grow-1">
                                        <div class="content">
                                            <div class="left">
                                                <div class="text-title"><a href="{{ $viewLink }}"
                                                        class="link line-clamp-1">{{ $productName }}</a>
                                                </div>
                                                <div class="text-secondary-2">Color: {{ $item->color }}</div>
                                                <div class="wg-quantity">
                                                    <span class="btn-quantity btn-decrease"
                                                        wire:click="removeQuantity({{ $item->id }})">-</span>
                                                    <input type="text" class="quantity-product" name="number"
                                                        value="{{ $item->quantity }}" readonly>
                                                    <span class="btn-quantity btn-increase"
                                                        wire:click="addQuantity({{ $item->id }})">+</span>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="text-button tf-btn-remove"
                                                    wire:click="removeItem({{ $item->id }})">Remove</div>
                                                <div class="text-button">{{ $item->quantity }} X
                                                    ${{ number_format($item->price, 2) }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="tf-mini-cart-bottom">
                    <div class="tf-mini-cart-bottom-wrap">
                        <div class="tf-cart-totals-discounts">
                            <h5>Subtotal</h5>
                            <h5 class="tf-totals-total-value">${{ number_format($cartTotal, 2) }}</h5>
                        </div>
                        <div class="tf-cart-checkbox">
                            <div class="tf-checkbox-wrapp">
                                <input class="" type="checkbox" id="check-agree" name="agree_checkbox">
                                <div>
                                    <i class="icon-check"></i>
                                </div>
                            </div>
                            <label for="check-agree">
                                I agree with
                                <a href="{{ route('terms-conditions') }}" class="link" title="Terms of Service">Terms
                                    & Conditions</a>
                            </label>
                        </div>
                        <div class="tf-mini-cart-view-checkout">
                            <a href="{{ route('cart.index') }}" class="tf-btn w-100 btn-white has-border">View
                                cart</a>
                            <a id="checkoutBtn" href="{{ route('checkout.index') }}"
                                class="tf-btn w-100 btn-onsurface pointer-event-none">Check Out</a>
                        </div>
                        <div class="text-center">
                            <a class="link btn-line" href="{{ route('products') }}">Or continue
                                shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@script
    <script>
        $('#check-agree').on('change', function() {
            if ($(this).is(":checked")) {
                $('#checkoutBtn').removeClass('pointer-event-none');
            } else {
                $('#checkoutBtn').addClass('pointer-event-none');
            }
        })
    </script>
@endscript
