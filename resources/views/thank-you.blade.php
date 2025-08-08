@extends('layouts.website')
@php
    $title = 'Thank You!';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center p-5">
                        <!-- Main Heading -->
                        <h1 class="h2 mb-3">Thank You for Your Order!</h1>

                        <!-- Order Confirmation Message -->
                        <p class="lead text-muted mb-4">
                            Your order has been successfully placed and is being processed.
                        </p>

                        <!-- Order Details -->
                        <div class="bg-light rounded p-4 mb-4">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Order Number:</strong><br>
                                    <span class="text-primary">#{{ $order->number }}</span>
                                </div>
                                <div class="col-sm-6">
                                    <strong>Order Date:</strong><br>
                                    <span class="text-muted">{{ $order->created_at->format('F j, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Information Cards -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <div class="card border-0 bg-light h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-envelope text-primary mb-2"></i>
                                        <h6 class="card-title">Tracking Number</h6>
                                        <p class="card-text small text-muted">
                                            {{ $order->tracking_number }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="card border-0 bg-light h-100">
                                    <div class="card-body text-center">
                                        <i class="fas fa-truck text-primary mb-2"></i>
                                        <h6 class="card-title">Shipping Updates</h6>
                                        <p class="card-text small text-muted">
                                            You'll receive tracking information once your order ships.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-column flex-sm-row justify-content-center gap-10">
                            <a href="#" class="tf-btn btn-onsurface">
                                View Order Details
                            </a>
                            <a href="{{ route('products') }}" class="tf-btn btn-primary">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
