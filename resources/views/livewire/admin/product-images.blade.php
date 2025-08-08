<div>
    <div class="mb-4">
        <label class="form-label">Product Images</label>
        <p class="text-muted small mb-2">Upload multiple images for the product</p>

        <!-- Image upload area -->
        <div class="border-2 border-dashed rounded p-4 text-center" style="border-color: #dee2e6;">
            <div class="d-flex flex-column align-items-center">
                <svg class="mx-auto text-muted" width="48" height="48" stroke="currentColor" fill="none"
                    viewBox="0 0 48 48" aria-hidden="true">
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="d-flex small text-muted">
                    <label for="file-upload" class="cursor-pointer text-primary fw-medium">
                        <span>Upload images</span>
                        <input id="file-upload" name="uploaded_images[]" type="file" class="d-none"
                            wire:model="uploadedImages" multiple>
                    </label>
                    {{-- <p class="ps-1">or drag and drop</p> --}}
                </div>
                <p class="small text-muted">PNG, JPG, GIF</p>
            </div>
        </div>

        @error('uploadedImages.*')
            <span class="text-danger small">{{ $message }}</span>
        @enderror
    </div>

    <!-- Hidden fields for form submission -->
    @foreach ($existingImages as $index => $image)
        @if (!isset($image['marked_for_deletion']))
            <input type="hidden" name="existing_images[]" value="{{ $image['id'] }}">
        @else
            <input type="hidden" name="images_to_delete[]" value="{{ $image['id'] }}">
        @endif
    @endforeach

    <!-- Preview existing images -->
    @if ($isEditMode && count($existingImages) > 0)
        <div class="mb-4">
            <h4 class="h6">Existing Images</h4>
            <div class="row g-5">
                @foreach ($existingImages as $index => $image)
                    @if (!isset($image['marked_for_deletion']))
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 position-relative">
                            <img src="{{ $image['url'] }}" alt="Product image" class="img-thumbnail w-100"
                                style="height: 120px; object-fit: cover;">
                            <button type="button" wire:click="removeImage({{ $index }}, true)"
                                class="position-absolute top-0 end-0 bg-danger text-white rounded-circle border-0 d-flex align-items-center justify-content-center"
                                style="width: 24px; height: 24px; transform: translate(30%, -30%); opacity: 0; transition: opacity 0.2s;">
                                &times;
                            </button>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    <!-- Preview new images -->
    @if (count($tempImages) > 0)
        <div class="mb-4">
            <h4 class="h6">New Images</h4>
            <div class="row g-5">
                @foreach ($tempImages as $index => $image)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 position-relative">
                        <img src="{{ $image['temp_path'] }}" alt="Uploaded image" class="img-thumbnail w-100"
                            style="height: 120px; object-fit: cover;">
                        <button type="button" wire:click="removeImage({{ $index }})"
                            class="position-absolute top-0 end-0 bg-danger text-white rounded-circle border-0 d-flex align-items-center justify-content-center"
                            style="width: 24px; height: 24px; transform: translate(30%, -30%); opacity: 0; transition: opacity 0.2s;">
                            &times;
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="mt-5">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h4 class="h6">Images Path</h4>
            <span class="cursor-pointer" wire:click="addImage" title="Add New Image">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
            </span>

            </button>
        </div>
        @foreach ($uploadedImages as $item)
            <div class="d-flex align-items-center">
                <input type="text" name="uploaded_images[]" class="form-control mb-2" placeholder="Image path"
                    value="{{ $item }}">
                <button type="button" class="bg-danger text-white rounded-circle border-0"
                    style="width: 24px; height: 24px; transform: translate(30%, -30%);"
                    wire:click="deleteImage('{{ $item }}',{{ $loop->index }})"
                    wire:confirm="Are you sure you want to delete this image?">
                    &times;
                </button>
            </div>
        @endforeach
    </div>
</div>

@push('styles')
    <style>
        .position-relative:hover .position-absolute {
            opacity: 1 !important;
        }
    </style>
@endpush
