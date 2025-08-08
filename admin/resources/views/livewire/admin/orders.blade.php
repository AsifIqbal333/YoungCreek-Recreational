<div class="card-body">
    <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            <input type="text" wire:model.live="search" class="form-control form-control-solid w-250px ps-13"
                placeholder="{{ __('Search order') }}" />
        </div>
        <!--end::Search-->
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
            <thead>
                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">#</th>
                    <th class="min-w-100px">{{ __('User') }}</th>
                    {{-- <th class="min-w-100px">{{ __('Billing Phone') }}</th> --}}
                    <th class="min-w-100px">{{ __('Products') }}</th>
                    <th class="min-w-125px">{{ __('Price') }}</th>
                    <th class="min-w-125px">{{ __('Order Status') }}</th>
                    <th class="min-w-125px">{{ __('Payment Status') }}</th>
                    <th class="min-w-125px">{{ __('Order Date') }}</th>
                    <th class="text-end min-w-100px">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 fw-semibold">
                @forelse ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="d-flex align-items-center">
                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                <a href="{{ route('admin.users.show', $order->user) }}">
                                    @php
                                        $colour = random_colour();
                                    @endphp
                                    <div
                                        class="symbol-label fs-3 bg-light-{{ $colour }} text-{{ $colour }}">
                                        {{ name_alphabetic($order->user?->name) }}</div>
                                </a>
                            </div>
                            <div class="d-flex flex-column">
                                <a href="{{ route('admin.users.show', $order->user) }}"
                                    class="text-gray-800 text-hover-primary mb-1">{{ $order->user?->name }}</a>
                                <span>{{ $order->user?->email }}</span>
                            </div>
                        </td>
                        {{-- <td>{{ $order->billing_phone }}</td> --}}
                        <td>{{ $order->products_count }}</td>
                        <td>${{ number_format($order->price, 2) }}</td>
                        <td>
                            @php
                                $orderCompleted = $order->status === 'completed';
                            @endphp
                            <div
                                class="badge {{ $orderCompleted ? 'badge-success' : 'badge-secondary' }} fw-bold text-capitalize">
                                {{ $order->status }}
                            </div>
                        </td>
                        <td>
                            @php
                                $paymentCompleted = $order->transaction?->status === 'completed';
                            @endphp
                            <div
                                class="badge {{ $paymentCompleted ? 'badge-success' : 'badge-secondary' }} fw-bold text-capitalize">
                                {{ $paymentCompleted ? __('Yes') : __('No') }}
                            </div>
                        </td>
                        <td>{{ $order->created_at->format('F j \, Y h:i A') }}</td>
                        <td class="text-end">
                            <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <a href="{{ route('admin.orders.show', $order) }}"
                                        class="menu-link px-3">{{ __('Show') }}</a>
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
                        <td colspan="8">{{ __('No order found') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-5">
            {{ $orders->links() }}
        </div>

    </div>
</div>
