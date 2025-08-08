<div>
    <input type="hidden" name="product_ids"
        value="{{ json_encode(collect($this->selectedProducts)->pluck('id')->toArray()) }}">

    <div class="mb-10 fv-row">
        <input type="text" class="form-control mb-2" placeholder="Search For Products" wire:model.live="search"
            @disabled(count($this->selectedProducts) == 3) />
        <div class="d-flex flex-column">
            @foreach ($products as $product)
                <li class="d-flex align-items-center py-2 cursor-pointer"
                    wire:click="addToSelected({{ $product->id }})">
                    <span class="bullet me-5"></span> {{ $product->name }}
                </li>
            @endforeach
        </div>
    </div>

    @include('admin.partials.alert')
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">#</th>
                    <th class="min-w-100px">Image</th>
                    <th class="min-w-100px">ٰItem</th>
                    <th class="min-w-100px">Type</th>
                    <th class="min-w-100px">Category</th>
                    <th class="min-w-125px">Price</th>
                    <th class="text-end min-w-100px"></th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
                @forelse ($selectedProducts as $product)
                    @php
                        $image = $product->images->first();
                        $colour = random_colour();
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($image)
                                <img src="{{ product_image($product->category, $product->image) }}" class="w-50px ms-n1"
                                    alt="{{ $product->name }}" />
                            @else
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <div
                                        class="symbol-label fs-3 bg-light-{{ $colour }} text-{{ $colour }}">
                                        {{ name_alphabetic($product->name) }}</div>
                                </div>
                            @endif

                        </td>
                        <td class="ps-0">
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6 text-start pe-0">{{ $product->name }}</a>
                            <span class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0">SKU:
                                {{ $product->sku }}</span>
                        </td>
                        <td>{{ $product->type }}</td>
                        <td>{{ $product->category }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td class="" wire:click="removeFromSelected({{ $product->id }})">
                            <span class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-x-circle text-danger" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    <path
                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">No product in the list</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</div>
