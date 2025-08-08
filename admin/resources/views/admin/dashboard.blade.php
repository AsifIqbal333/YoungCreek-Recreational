@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.breadcrumbs', ['title' => 'Dashboard'])

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            {{-- Alert Messages --}}
            @include('admin.partials.alert')

            <div class="row g-5 g-xl-10 mb-8">
                <div class="col-md-6 col-lg-4 mb-md-5">
                    <div class="card card-flush">
                        <div class="card-body py-8 d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex align-items-center">
                                {{-- <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span> --}}
                                <span
                                    class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($data['totalProducts']) }}</span>
                            </div>
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Products</span>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-4 mb-md-5">
                    <div class="card card-flush">
                        <div class="card-body py-8 d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex align-items-center">
                                {{-- <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span> --}}
                                <span
                                    class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($data['totalOrders']) }}</span>
                            </div>
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Orders</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 mb-md-5">
                    <div class="card card-flush">
                        <div class="card-body py-8 d-flex flex-column justify-content-center align-items-center">
                            <div class="d-flex align-items-center">
                                {{-- <span class="fs-4 fw-semibold text-gray-400 me-1 align-self-start">$</span> --}}
                                <span
                                    class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ number_format($data['totalQuotes']) }}</span>
                            </div>
                            <span class="text-gray-400 pt-1 fw-semibold fs-6">Quotes Requests</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-8">
                <div class="card-header card-header-height d-flex align-items-center">
                    <h6 class="font-weight-bold text-primary mb-0 pb-0">{{ __('Latest Orders') }}</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">#</th>
                                    <th class="min-w-100px">{{ __('User') }}</th>
                                    <th class="min-w-100px">{{ __('Products') }}</th>
                                    <th class="min-w-125px">{{ __('Price') }}</th>
                                    <th class="min-w-125px">{{ __('Order Status') }}</th>
                                    <th class="min-w-125px">{{ __('Payment Status') }}</th>
                                    <th class="min-w-125px">{{ __('Order Date') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($data['orders'] as $order)
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">{{ __('No order found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="card shadow mb-8">
                <div class="card-header card-header-height d-flex align-items-center">
                    <h6 class="font-weight-bold text-primary mb-0 pb-0">{{ __('Latest Quote Requests') }}</h6>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">#</th>
                                    <th class="min-w-100px">{{ __('User') }}</th>
                                    <th class="min-w-100px">{{ __('Phone') }}</th>
                                    <th class="min-w-100px">{{ __('Organization') }}</th>
                                    <th class="min-w-125px">{{ __('Budget') }}</th>
                                    <th class="min-w-125px">{{ __('Category') }}</th>
                                    <th class="min-w-125px">{{ __('Border Length') }}</th>
                                    <th class="min-w-125px">{{ __('Date') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($data['quotes'] as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-flex align-items-center">
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                @php
                                                    $colour = random_colour();
                                                    $name = "{$item->first_name} {$item->last_name}";
                                                @endphp
                                                <div
                                                    class="symbol-label fs-3 bg-light-{{ $colour }} text-{{ $colour }}">
                                                    {{ name_alphabetic($name) }}</div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span
                                                    class="text-gray-800 text-hover-primary mb-1">{{ $name }}</span>
                                                <span>{{ $item->email }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->organization_name }}</td>
                                        <td>${{ number_format($item->budget, 2) }}</td>
                                        <td>{{ $item->category != '' ? $item->category : 'N/A' }}</td>
                                        <td>{{ $item->border_length ?? 'N/A' }}</td>
                                        <td>{{ $item->created_at->format('F j \, Y h:i A') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">{{ __('No request found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow mb-8">
                <div class="card-header card-header-height d-flex align-items-center">
                    <h6 class="font-weight-bold text-primary mb-0 pb-0">{{ __('Latest Products') }}</h6>
                </div>

                <div class="card-body">
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
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @forelse ($data['products'] as $product)
                                    @php
                                        $image = $product->images->first();
                                        $colour = random_colour();
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}
                                        </td>
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
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">{{ __('No product found') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
