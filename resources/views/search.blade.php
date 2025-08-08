@extends('layouts.website')

@php
    $title = 'Search Products';
@endphp
@section('title', $title)

@section('content')
    <!-- .page-title -->
    @php
        $breadcrumbs = [];

    @endphp
    <x-breadcrumbs :title="$title" :items="$breadcrumbs" />
    <!-- /.page-title -->

    <section class="flat-spacing">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading-section text-center">
                        <h3 class="wow fadeInUp">Search Products</h3>
                    </div>
                    @livewire('search-products', ['source' => 'page'])
                </div>
            </div>
        </div>
    </section>

@endsection
