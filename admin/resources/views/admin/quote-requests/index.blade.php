@extends('admin.layouts.app')

@section('content')
    @include('admin.partials.breadcrumbs', ['title' => 'Quote Requests'])

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            {{-- Alert Messages --}}
            @include('admin.partials.alert')

            <div class="card shadow mb-4">
                <div class="card-header card-header-height d-flex align-items-center">
                    <h6 class="font-weight-bold text-primary mb-0 pb-0">{{ __('Quote Requests') }}</h6>
                </div>

                @livewire('admin.quote-requests')
            </div>
        </div>
    </div>
@endsection
