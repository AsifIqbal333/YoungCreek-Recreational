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

                        <div class="account-orders">
                            <div class="wrap-account-order">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="fw-6">Order</th>
                                            <th class="fw-6">Date</th>
                                            <th class="fw-6">Status</th>
                                            <th class="fw-6">Total</th>
                                            <th class="fw-6">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr class="tf-order-item">
                                                <td>#{{ $order->number ? $order->number : $order->id }}</td>
                                                <td>{{ $order->created_at->format('F j, Y') }}</td>
                                                <td class="text-capitalize">{{ $order->status }}</td>
                                                </td>
                                                <td>${{ number_format($order->price, 2) }}</td>
                                                <td>
                                                    <a href="{{ route('my-account.orders.show', $order->uuid ? $order->uuid : $order->id) }}"
                                                        class="tf-btn btn-onsurface radius-4">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="tf-order-item">
                                                <td colspan="5">You have no order with us yet.</td>

                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /my-account -->

    </div><!-- main-content -->

@endsection
