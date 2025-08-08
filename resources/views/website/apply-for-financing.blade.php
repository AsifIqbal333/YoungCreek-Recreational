@extends('layouts.website')

@section('title', 'Apply For Financing')

@section('content')
    {{-- @dd(storage_path('app/public/Playground_Equipment_Financing_DS.pdf')) --}}
    <header class="woocommerce-products-header masthead masthead--innerpage" id="masthead">
        <h1 class="woocommerce-products-header__title page-title">Apply For Financing
        </h1>

        <div class="breadcrumbs" id="breadcrumbs"><a href="{{ route('homepage') }}">Home</a> | <span>Planning Tools |
                Apply For Financing</span></div>
    </header>

    <x-website.trusted-sources />

    <section class="section section--highlight">
        <div class="container container-fluid">
            <div class="page-content row">

                <article class="page-article col-xxs-12 col-sm-8 col-sm-push-2">
                    <h2 class="title--border title-green">Apply For Financing</h2>

                    <div id="powder_coating-content" class="fx_contact_tab_contents">
                        <p><iframe style="height: 500px; width: 99%; border: none;" frameborder="0"
                                src="{{ asset('docs/Playground_Equipment_Financing_DS.pdf') }}"></iframe>
                        </p>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <x-website.feature-industries />

@endsection
