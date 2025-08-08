<table class="tinvwl-table-manage-list" style="margin-top: 30px;">
    <thead>
        <tr>
            {{-- <th class="product-cb">
                <input type="checkbox" class="global-cb input-checkbox" wire:model.live="selectAll">
            </th> --}}
            <th class="product-remove"></th>
            <th class="product-thumbnail">&nbsp;</th>
            <th class="product-name"><span class="tinvwl-full">Product Name</span><span
                    class="tinvwl-mobile">Product</span></th>
            <th class="product-price">Unit Price</th>
            <th class="product-date">Date Added</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($wishlists as $item)
            @php
                $productSlug = $item->product?->slug;
                $productImage = $item->product?->image;
            @endphp
            <tr class="wishlist_item">
                {{-- <td class="product-cb">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox" type="checkbox"
                        value="{{ $item->id }}" wire:model.live="selectedRows" />
                </td> --}}
                <td class="product-remove">
                    <button type="button" name="tinvwl-remove" wire:click="removeItem({{ $item->id }})"><i
                            class="ftinvwl ftinvwl-times"></i>
                    </button>
                </td>
                <td class="product-thumbnail">
                    <a href="{{ route('products.show', $productSlug) }}"><img width="430" height="332"
                            src="{{ $productImage }}"
                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""></a>
                </td>
                <td class="product-name">
                    <a href="{{ route('products.show', $productSlug) }}">{{ $item->product?->name }}
                    </a>
                </td>
                <td class="product-price">
                    <span class="woocommerce-Price-amount amount">Estimated Price Per Unit:
                        <bdi><span
                                class="woocommerce-Price-currencySymbol">$</span>{{ number_format($item->product?->price, 2) }}</bdi></span>
                </td>
                <td class="product-date">
                    <time class="entry-date"
                        datetime="2025-04-18 16:49:23">{{ $item->created_at->format('F j, Y') }}</time>
                </td>
            </tr>
        @endforeach

    </tbody>
    {{-- <tfoot>
        <tr>
            <td colspan="100">
                <div class="tinvwl-to-left look_in">
                    <div class="tinvwl-input-group tinvwl-no-full"><input type="hidden" name="lists_per_page"
                            value="10" id="tinvwl_lists_per_page">
                        <div class="selectric-wrapper selectric-tinvwl-break-input-filed selectric-form-control">
                            <div class="selectric-hide-select"><select name="product_actions"
                                    id="tinvwl_product_actions" class="tinvwl-break-input-filed form-control"
                                    tabindex="-1">
                                    <option value="" selected="selected">Actions
                                    </option>
                                    <option value="remove_selected">Remove</option>
                                </select></div>
                            <div class="selectric"><span class="label">Actions</span><b class="button">▾</b></div>
                            <div class="selectric-items" tabindex="-1">
                                <div class="selectric-scroll">
                                    <ul>
                                        <li data-index="0" class="selected">Actions
                                        </li>
                                        <li data-index="1" class="last">Remove</li>
                                    </ul>
                                </div>
                            </div><input class="selectric-input" tabindex="0">
                        </div><span class="tinvwl-input-group-btn"><button type="submit" class="button"
                                name="tinvwl-action-product_apply" value="product_apply" title="Apply Action">Apply
                                <span class="tinvwl-mobile">Action</span></button></span>
                    </div>
                </div>
                <div class="tinvwl-to-right look_in"></div> <input type="hidden" id="wishlist_nonce"
                    name="wishlist_nonce" value="e5663afbec"><input type="hidden" name="_wp_http_referer"
                    value="/wishlist/156018/">
            </td>
        </tr>
    </tfoot> --}}
</table>
