@extends('admin.layouts.app')

@section('title', __('Deal'))

@section('content')
    @include('admin.partials.breadcrumbs', ['title' => 'Deal'])

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            {{-- Alert Messages --}}
            @include('admin.partials.alert')

            <form method="POST" action="{{ route('admin.deals.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="tab-content">
                    <div class="tab-pane fade show active" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Deal Name</label>
                                        <input type="text" name="name"
                                            class="form-control mb-2 @error('name') is-invalid @enderror"
                                            placeholder="Deal name" value="{{ old('name', $deal?->name) }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set a name to the deal for better visibility.
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="description"
                                            class="form-control mb-2 @error('description') is-invalid @enderror"
                                            placeholder="Deal description"
                                            value="{{ old('description', $deal?->description) }}" />
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set a description to the deal for better visibility.
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Deal Image</label>
                                        <input type="file" name="image"
                                            class="form-control mb-2 @error('image') is-invalid @enderror"
                                            value="{{ old('image') }}" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        @if ($deal)
                                            <span class="py-2">Leave the field empty if want old image.</span>
                                        @endif

                                        <div class="text-muted fs-7">Recommended image size is 945x1140px.</div>

                                        @if ($deal?->image)
                                            <div class="mt-2">
                                                <img src="{{ asset($deal->image) }}" alt="deal image" class="img-thumbnail"
                                                    style="width: 25%;" />

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--Media-->
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title d-flex flex-column">
                                        <h2>Products</h2>
                                        <div class="text-muted fs-7 pt-1">Set the products to deal. You should add minimum
                                            of 2 products and maximum of 3 products.</div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-2">
                                        @livewire('deal-products', ['products' => $deal?->products])
                                        @error('product_ids')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end::Media-->
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-7">
                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                        <span class="indicator-label">Save Changes</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
