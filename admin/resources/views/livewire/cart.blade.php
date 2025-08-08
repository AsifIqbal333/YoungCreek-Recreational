   <section class="flat-spacing pb-0">
       <div class="container">
           <div class="row">
               <div class="col-12"><x-alert /></div>
               <div class="col-xl-8">
                   {{-- <div class="tf-cart-sold">
                            <div class="notification-sold bg-surface">
                                <img class="icon" src="images/logo/icon-fire.png" alt="img">
                                <div class="count-text">
                                    Your cart will expire in <div class="js-countdown time-count" data-timer="600"
                                        data-labels=":,:,:,"></div>
                                    minutes! Please checkout now before your items sell out!
                                </div>
                            </div>
                            <div class="notification-progress">
                                <div class="text">
                                    Buy <span class="text_primary">$70.00</span>
                                    more to get <span class=" text_primary">FREESHIPPING</span>
                                </div>
                                <div class="progress-cart">
                                    <div class="value" style="width: 0%;" data-progress="70">
                                        <span class="round"></span>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                   <div>
                       <table class="tf-table-page-cart">
                           <thead>
                               <tr>
                                   <th>Products</th>
                                   <th>Price</th>
                                   <th>Quantity</th>
                                   <th>Total Price</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
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
                                   @endphp
                                   <tr class="tf-cart-item file-delete">
                                       <td class="tf-cart-item_product">
                                           <a href="{{ $viewLink }}" class="img-box">
                                               <img src="{{ $item->product->image }}" alt="product">
                                           </a>
                                           <div class="cart-info">
                                               <a href="{{ $viewLink }}"
                                                   class="cart-title link">{{ $item->product->name ?? 'N/A' }}</a>
                                               <div class="variant text-caption-1 text-capitalize">
                                                   Color: {{ $item->color }}
                                               </div>
                                           </div>
                                       </td>
                                       <td data-cart-title="Price" class="tf-cart-item_price text-center">
                                           <div class="cart-price text-button price-on-sale">
                                               ${{ number_format($item->price) }}</div>
                                       </td>
                                       <td data-cart-title="Quantity" class="tf-cart-item_quantity">
                                           <div class="wg-quantity mx-md-auto">
                                               <span class="btn-quantity"
                                                   wire:click="removeQuantity({{ $item->id }})">-</span>
                                               <input type="text" class="quantity-product" name="number"
                                                   value="{{ $item->quantity }}" readonly>
                                               <span class="btn-quantity"
                                                   wire:click="addQuantity({{ $item->id }})">+</span>
                                           </div>
                                       </td>
                                       <td data-cart-title="Total" class="tf-cart-item_total text-center">
                                           <div class="cart-total text-button total-price">
                                               ${{ number_format($itemTotal) }}</div>
                                       </td>
                                       <td data-cart-title="Remove" class="remove-cart"
                                           wire:click="removeItem({{ $item->id }})">
                                           <span class="icon icon-close"></span>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                       {{-- <div class="ip-discount-code">
                           <input type="text" placeholder="Add voucher discount">
                           <button class="tf-btn btn-onsurface">
                               Apply Code
                           </button>
                       </div> --}}
                   </div>
               </div>
               <div class="col-xl-4">
                   <div class="fl-sidebar-cart">
                       <div class="box-order bg-surface">
                           <h5 class="title">Order Summary</h5>
                           <div class="subtotal text-button d-flex justify-content-between align-items-center">
                               <span>Subtotal</span>
                               <span class="total">${{ number_format($cartTotal, 2) }}</span>
                           </div>
                           <div class="discount text-button d-flex justify-content-between align-items-center">
                               <span>Discounts</span>
                               <span class="total">-$00.00</span>
                           </div>
                           {{-- <div class="ship">
                               <span class="text-button">Shipping</span>
                               <div class="flex-grow-1">
                                   <fieldset class="ship-item">
                                       <input type="radio" name="ship-check" class="tf-check-rounded" id="free"
                                           checked>
                                       <label for="free">
                                           <span>Free Shipping</span>
                                           <span class="price">$0.00</span>
                                       </label>
                                   </fieldset>
                                   <fieldset class="ship-item">
                                       <input type="radio" name="ship-check" class="tf-check-rounded" id="local">
                                       <label for="local">
                                           <span>Local:</span>
                                           <span class="price">$35.00</span>
                                       </label>
                                   </fieldset>
                                   <fieldset class="ship-item">
                                       <input type="radio" name="ship-check" class="tf-check-rounded" id="rate">
                                       <label for="rate">
                                           <span>Flat Rate:</span>
                                           <span class="price">$35.00</span>
                                       </label>
                                   </fieldset>
                               </div>
                           </div> --}}
                           <h5 class="total-order d-flex justify-content-between align-items-center">
                               <span>Total</span>
                               <span class="total">${{ number_format($cartTotal, 2) }}</span>
                           </h5>
                           <div class="box-progress-checkout">
                               <fieldset class="check-agree">
                                   <input type="checkbox" id="check-agree" class="tf-check-rounded">
                                   <label for="check-agree">
                                       I agree with the <a href="{{ route('terms-conditions') }}" class="link">terms
                                           and conditions</a>
                                   </label>
                               </fieldset>
                               <a id="checkoutBtn" href="{{ route('checkout.index') }}"
                                   class="tf-btn btn-onsurface pointer-event-none">Process To
                                   Checkout<i class="icon-arrow-up-right"></i></a>
                               <a href="{{ route('products') }}" class="text-button text-center link">Or continue
                                   shopping</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
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
