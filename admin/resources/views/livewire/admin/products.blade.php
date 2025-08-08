<div class="card-body">
    <div class="card-title">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <!--begin::Search-->
            <div class="form-group">
                <label class="w-semibold fs-6 mb-2">Search</label>
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" wire:model.live="search" class="form-control form-control-solid w-250px ps-13"
                        placeholder="{{ __('Search products') }}" />
                </div>
            </div>
            <!--end::Search-->

            <!-- Filter by type-->
            <div class="form-group">
                <label class="w-semibold fs-6 mb-2">Type</label>
                <select class="form-select form-select-solid text-capitalize" wire:model.live="type">
                    <option value="">{{ __('All') }}</option>
                    @foreach ($types as $item)
                        <option value="{{ $item }}" @selected($item == $type)>
                            {{ str_replace('-', ' ', $item) }}</option>
                    @endforeach

                </select>
            </div>

            <!-- Filter by category-->
            <div class="form-group">
                <label class="w-semibold fs-6 mb-2">Category</label>
                <select class="form-select form-select-solid text-capitalize" wire:model.live="category">
                    <option value="">{{ __('All') }}</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item }}" @selected($item == $category)>
                            {{ str_replace('-', ' ', $item) }}</option>
                    @endforeach

                </select>
            </div>

            <!-- Filter by sub category-->
            <div class="form-group">
                <label class="w-semibold fs-6 mb-2">Sub Category</label>
                <select class="form-select form-select-solid text-capitalize" wire:model.live="sub_category">
                    <option value="">{{ __('All') }}</option>
                    @foreach ($sub_categories as $item)
                        <option value="{{ $item }}" @selected($item == $sub_category)>
                            {{ str_replace('-', ' ', $item) }}</option>
                    @endforeach

                </select>
            </div>
        </div>

    </div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">#</th>
                    <th class="min-w-100px">{{ __('Image') }}</th>
                    <th class="min-w-100px">{{ __('ٰItem') }}</th>
                    <th class="min-w-100px">{{ __('Type') }}</th>
                    <th class="min-w-100px">{{ __('Category') }}</th>
                    <th class="min-w-100px">{{ __('Sub Category') }}</th>
                    <th class="min-w-125px">{{ __('Price') }}</th>
                    <th class="min-w-125px">{{ __('Feature') }}</th>
                    <th class="text-end min-w-100px">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
                @forelse ($products as $product)
                    @php
                        $image = $product->images->first();
                        $colour = random_colour();
                    @endphp
                    <tr>
                        <td>{{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}</td>
                        <td>
                            @if ($image)
                                <img src="{{ product_image($product->category, $product->image) }}"
                                    class="w-50px ms-n1" alt="{{ $product->name }}" />
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
                        <td>{{ $product->sub_category ?? '-' }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    wire:click="updateFeatured({{ $product->id }})" @checked($product->featured) />
                            </div>
                        </td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                {{-- <div class="menu-item px-3">
                                    <a href="{{ route('admin.products.show', $order) }}"
                                        class="menu-link px-3">{{ __('Show') }}</a>
                                </div> --}}
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                        class="menu-link px-3">{{ __('Edit') }}</a>
                                </div>
                                {{-- <div class="menu-item px-3">
                                    <span class="menu-link px-3"
                                        onclick="deleteRecord('user','{{ $user->id }}')">{{ __('Delete') }}</span>
                                    <form id="user-{{ $user->id }}" action="{{ route('users.destroy', $user) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div> --}}
                            </div>
                            <!--end::Menu-->
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">{{ __('No product found') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-5">
            {{ $products->links() }}
        </div>

    </div>
</div>
