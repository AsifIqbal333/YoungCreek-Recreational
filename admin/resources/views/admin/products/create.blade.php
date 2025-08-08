@extends('admin.layouts.app')

@section('title', __('Add Product'))

@section('content')
    @include('admin.partials.breadcrumbs', [
        'title' => 'Add Product',
        'btn_text' => __('Back'),
        'btn_link' => route('admin.products.index'),
    ])

    @php
        $status = [
            [
                'label' => 'Active',
                'value' => 'active',
            ],
            [
                'label' => 'Draft',
                'value' => 'draft',
            ],
            [
                'label' => 'InActive',
                'value' => 'inactive',
            ],
        ];
        $quickShips = ['Yes', 'No'];
    @endphp

    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            {{-- Alert Messages --}}
            @include('admin.partials.alert')

            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
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
                                        <label class="required form-label">Product Name</label>
                                        <input type="text" name="name"
                                            class="form-control mb-2 @error('name') is-invalid @enderror"
                                            placeholder="Product name" value="{{ old('name') }}" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <div class="text-muted fs-7">A product name is required and recommended to be
                                            unique.
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label">Description</label>
                                        <textarea id="product_description" name="description"
                                            class="min-h-200px mb-2 @error('description') is-invalid @enderror">
                                        {{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set a description to the product for better visibility.
                                        </div>
                                    </div>
                                    <div>
                                        <label class="form-label">SEO Description</label>
                                        <textarea name="seo_description" class="min-h-200px mb-2 @error('seo_description') is-invalid @enderror">
                                        {{ old('seo_description') }}</textarea>
                                        @error('seo_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set a description to the product for search engines to
                                            better understand the product. Max 160 characters.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Media-->
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title d-flex flex-column">
                                        <h2>Media</h2>
                                        <div class="text-muted fs-7 pt-1">Set the product media gallery.</div>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-2">
                                        {{-- <div class="dropzone" id="kt_ecommerce_add_product_media">
                                            <div class="dz-message needsclick">
                                                <i class="ki-duotone ki-file-up text-primary fs-3x">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to
                                                        upload.</h3>
                                                    <span class="fs-7 fw-semibold text-gray-400">Upload up to 10
                                                        files</span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        @livewire('admin.product-images', ['product' => null])
                                    </div>
                                </div>
                            </div>
                            <!--end::Media-->

                            <!--Product details -->
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Product Details</h2>
                                    </div>
                                </div>

                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Type</label>
                                        <select class="form-select mb-2 text-capitalize @error('type') is-invalid @enderror"
                                            name="type" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select product type">
                                            <option></option>
                                            @foreach ($types as $item)
                                                <option value="{{ $item }}" @selected($item == old('type'))>
                                                    {{ ucwords(str_replace('-', ' ', $item)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product type.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Category</label>
                                        <select
                                            class="form-select mb-2 text-capitalize @error('price') is-invalid @enderror"
                                            name="category" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select product category">
                                            <option></option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item }}" @selected($item == old('category'))>
                                                    {{ ucwords(str_replace('-', ' ', $item)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product category.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class=" form-label">Sub Category</label>
                                        <select
                                            class="form-select mb-2 text-capitalize @error('sub_category') is-invalid @enderror"
                                            name="sub_category" data-control="select2">
                                            {{-- <option></option> --}}
                                            <option value="">None</option>
                                            @foreach ($sub_categories as $item)
                                                <option value="{{ $item }}" @selected($item == old('sub_category'))>
                                                    {{ ucwords(str_replace('-', ' ', $item)) }}</option>
                                            @endforeach
                                        </select>
                                        @error('sub_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product sub category if applicable.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">SKU</label>
                                        <input type="text" name="sku"
                                            class="form-control mb-2 @error('sku') is-invalid @enderror"
                                            placeholder="SKU Number" value="{{ old('sku') }}" />
                                        @error('sku')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Enter the product SKU.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Base Price</label>
                                        <input type="text" name="price"
                                            class="form-control mb-2 @error('price') is-invalid @enderror"
                                            placeholder="Product price" value="{{ old('price') }}" />
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product price.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Lead Time</label>
                                        <input type="text" name="lead_time"
                                            class="form-control mb-2 @error('lead_time') is-invalid @enderror"
                                            placeholder="Product lead time" value="{{ old('lead_time') }}" />
                                        @error('lead_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product lead time.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Age Group</label>
                                        <select class="form-select mb-2 @error('age_group') is-invalid @enderror"
                                            name="age_group" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select age group">
                                            <option></option>
                                            @foreach ($age_groups as $group)
                                                <option value="{{ $group }}" @selected($group == old('age_group'))>
                                                    {{ $group }}</option>
                                            @endforeach
                                        </select>
                                        @error('age_group')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product age group</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Length</label>
                                        <input type="text" name="length"
                                            class="form-control mb-2 @error('length') is-invalid @enderror"
                                            placeholder="Length" value="{{ old('length') }}" />
                                        @error('length')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product length.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Width</label>
                                        <input type="text" name="width"
                                            class="form-control mb-2 @error('width') is-invalid @enderror"
                                            placeholder="Width" value="{{ old('width') }}" />
                                        @error('width')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product width.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Minimum Capacity</label>
                                        <input type="text" name="min_capacity"
                                            class="form-control mb-2 @error('min_capacity') is-invalid @enderror"
                                            placeholder="Minimum Capacity" value="{{ old('min_capacity') }}" />
                                        @error('min_capacity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product min capacity.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Maximum Capacity</label>
                                        <input type="text" name="max_capacity"
                                            class="form-control mb-2 @error('max_capacity') is-invalid @enderror"
                                            placeholder="Maximum Capacity" value="{{ old('max_capacity') }}" />
                                        @error('max_capacity')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product max capacity.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Playground Series</label>
                                        <input type="text" name="playground_series"
                                            class="form-control mb-2 @error('playground_series') is-invalid @enderror"
                                            placeholder="Playground Series" value="{{ old('playground_series') }}" />
                                        @error('playground_series')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product playground series.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Recycled Content</label>
                                        <input type="text" name="recycled_content"
                                            class="form-control mb-2 @error('recycled_content') is-invalid @enderror"
                                            placeholder="Recycled Content" value="{{ old('recycled_content') }}" />
                                        @error('recycled_content')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product recycled content.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Materials</label>
                                        <input type="text" name="materials"
                                            class="form-control mb-2 @error('materials') is-invalid @enderror"
                                            placeholder="Materials" value="{{ old('materials') }}" />
                                        @error('materials')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product materials.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Dimensions</label>
                                        <input type="text" name="dimensions"
                                            class="form-control mb-2 @error('dimensions') is-invalid @enderror"
                                            placeholder="Dimensions" value="{{ old('dimensions') }}" />
                                        @error('dimensions')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product dimensions.</div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Quick Ship</label>
                                        <select class="form-select mb-2 @error('quick_ship_item') is-invalid @enderror"
                                            name="quick_ship_item" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option">
                                            <option></option>
                                            @foreach ($quickShips as $item)
                                                <option value="{{ $item }}" @selected($item == old('quick_ship_item'))>
                                                    {{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('quick_ship_item')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the wether the product can ship quickly or not.
                                        </div>
                                    </div>

                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Status</label>
                                        <select
                                            class="form-select mb-2 text-capitalize @error('status') is-invalid @enderror"
                                            name="status" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option">
                                            <option></option>
                                            @foreach ($status as $item)
                                                <option value="{{ $item['value'] }}" @selected($item['value'] == old('status'))>
                                                    {{ $item['label'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="text-muted fs-7">Set the product status.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Product details-->
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-7">
                    <a href="{{ route('admin.products.index') }}" id="kt_ecommerce_add_product_cancel"
                        class="btn btn-light me-5">Cancel</a>
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

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#product_description'), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle',
                    'ImageToolbar', 'ImageUpload', 'MediaEmbed', 'Table'
                ],
            });
    </script>
@endpush
