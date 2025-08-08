@extends('layouts.website')

@php
    $title = 'My Account';
@endphp
@section('title', 'My Account')

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <!-- main-content -->
    <div class="main-content">

        <div class="btn-sidebar-account">
            <button data-bs-toggle="offcanvas" data-bs-target="#mbAccount">
                <i class="icon icon-squaresfour"></i>
            </button>
        </div>

        <!-- my-account -->
        <section class="flat-spacing">
            <div class="container">
                <x-alert />
                <div class="my-account-wrap">
                    @include('partials.auth-sidebar')
                    <div class="my-account-content">
                        <div class="account-order-details">
                            <div class="wd-form-order">
                                @php
                                    $orderImage = asset('theme/images/shop/product-1.jpg');
                                    foreach ($order->products as $item) {
                                        if ($item->product->image) {
                                            $orderImage = $item->product->image;
                                            break;
                                        }
                                    }
                                @endphp
                                <div class="order-head">
                                    <figure class="img-product">
                                        <img src="{{ $orderImage }}" alt="product">
                                    </figure>
                                    <div class="content">
                                        <div class="badge text-capitalize">{{ $order->status }}</div>
                                        <h6 class="mt-8 fw-5">Order #{{ $order->number }}</h6>
                                    </div>
                                </div>
                                <div class="tf-grid-layout md-col-2 gap-15">
                                    <div class="item">
                                        <div class="text-2 text_secondary">Tracking Number</div>
                                        <div class="text-2 mt_4 ">{{ $order->tracking_number }}</div>
                                    </div>
                                    <div class="item">
                                        <div class="text-2 text_secondary">Total</div>
                                        <div class="text-2 mt_4 ">${{ number_format($order->price, 2) }}</div>
                                    </div>
                                    <div class="item">
                                        <div class="text-2 text_secondary">Start Time</div>
                                        <div class="text-2 mt_4 ">{{ $order->created_at->format('d F Y, H:i:s') }}</div>
                                    </div>
                                    <div class="item">
                                        <div class="text-2 text_secondary">Address</div>
                                        <div class="text-2 mt_4 ">{{ $order->shipping_address_1 }}
                                            {{ $order->billing_address_2 && ", $order->billing_address_2" }},
                                            {{ $order->shipping_city }}, {{ $order->shippingCountry?->name }}</div>
                                    </div>
                                </div>
                                <div class="widget-tabs style-2 widget-order-tab">
                                    <ul class="widget-menu-tab">
                                        <li class="item-title active">
                                            <span class="inner text-body-default">Order History</span>
                                        </li>
                                        <li class="item-title">
                                            <span class="inner text-body-default">Items Details</span>
                                        </li>
                                        <li class="item-title">
                                            <span class="inner text-body-default">Courier</span>
                                        </li>
                                        <li class="item-title">
                                            <span class="inner text-body-default">Receiver</span>
                                        </li>
                                    </ul>
                                    <div class="widget-content-tab">
                                        <div class="widget-content-inner active">
                                            <div class="widget-timeline">
                                                <ul class="timeline">
                                                    <li>
                                                        <div class="timeline-badge success"></div>
                                                        <div class="timeline-box">
                                                            <a class="timeline-panel" href="javascript:void(0);">
                                                                <div class="text-2 fw-6">Product Shipped</div>
                                                                <span>10/07/2025 4:30pm</span>
                                                            </a>
                                                            <p>
                                                                <strong>Courier Service : </strong>
                                                                FedEx World Service Center
                                                            </p>
                                                            <p>
                                                                <strong>Estimated Delivery Date : </strong>
                                                                12/07/2025
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="timeline-badge success"></div>
                                                        <div class="timeline-box">
                                                            <a class="timeline-panel" href="javascript:void(0);">
                                                                <div class="text-2 fw-6">Product Shipped</div>
                                                                <span>10/07/2025 4:30pm</span>
                                                            </a>
                                                            <p>
                                                                <strong>Tracking Number : </strong>
                                                                2307-3215-6759
                                                            </p>
                                                            <p>
                                                                <strong>Warehouse : </strong>
                                                                T-Shirt 10b
                                                            </p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="timeline-badge"></div>
                                                        <div class="timeline-box">
                                                            <a class="timeline-panel" href="javascript:void(0);">
                                                                <div class="text-2 fw-6">Product Packaging</div>
                                                                <span>12/07/2025 4:34pm</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="timeline-badge"></div>
                                                        <div class="timeline-box">
                                                            <a class="timeline-panel" href="javascript:void(0);">
                                                                <div class="text-2 fw-6">Order Placed</div>
                                                                <span>{{ $order->created_at->format('d/m/Y h:ia') }}</span>
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="widget-content-inner">
                                            @foreach ($order->products as $item)
                                                @php
                                                    $image =
                                                        $item->product?->image ??
                                                        asset('theme/images/shop/product-1.jpg');
                                                @endphp

                                                <div class="order-head">
                                                    <figure class="img-product">
                                                        <img src="{{ $image }}" alt="product">
                                                    </figure>
                                                    <div class="content">
                                                        <div class="text-2 ">{{ $item->product?->name }}</div>
                                                        <div class="mt_4">
                                                            <span class="">Price :</span>
                                                            {{ $item->quantity }} x
                                                            ${{ number_format($item->product_price, 2) }} =
                                                            ${{ number_format($item->price, 2) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <ul>
                                                <li class="d-flex justify-content-between text-2">
                                                    <span>Total Price</span>
                                                    <span class="">${{ number_format($order->price, 2) }}</span>
                                                </li>
                                                <li class="d-flex justify-content-between text-2 mt_4 pb_8 line-bt">
                                                    <span>Total Discounts</span>
                                                    <span class="">$0</span>
                                                </li>
                                                <li class="d-flex justify-content-between text-2 mt_8">
                                                    <span>Order Total</span>
                                                    <span class="">${{ number_format($order->price, 2) }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="widget-content-inner">
                                            <p>Our courier service is dedicated to providing fast, reliable, and secure
                                                delivery solutions tailored to meet your needs. Whether you're sending
                                                documents, parcels, or larger shipments, our team ensures that your items
                                                are handled with the utmost care and delivered on time. With a commitment to
                                                customer satisfaction, real-time tracking, and a wide network of routes, we
                                                make it easy for you to send and receive packages both locally and
                                                internationally. Choose our service for a seamless and efficient delivery
                                                experience.</p>
                                        </div>
                                        <div class="widget-content-inner">
                                            <p class="text-2 text-success">Thank you Your order has been received</p>
                                            <ul class="mt_20">
                                                <li>
                                                    Order Number : <span class="fw-7">#17493</span>
                                                </li>
                                                <li>
                                                    Date : <span class="fw-7">17/07/2025, 02:34pm</span>
                                                </li>
                                                <li>
                                                    Total : <span class="fw-7">$18.95</span>
                                                </li>
                                                <li>
                                                    Payment Methods : <span class="fw-7">Cash on Delivery</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /my-account -->

    </div><!-- main-content -->

@endsection
