<?php

namespace App\Livewire\Admin;

use App\Models\ProductImage;
use Livewire\Component;
use Livewire\WithFileUploads;
class ProductImages extends Component
{
    use WithFileUploads;

    public $productId = null;
    public $uploadedImages = [];
    public $ImagesPath = [];
    public $existingImages = [];
    public $tempImages = [];
    public $isEditMode = false;

    public function mount($product = null)
    {
        $this->isEditMode = !is_null($product);

        if ($this->isEditMode) {
            $this->productId = $product->id;
            $this->existingImages = $product->images->map(function ($image) use ($product) {
                return [
                    'id' => $image->id,
                    'path' => $image->image,
                    'url' => product_image($product?->category, $image->image)

                ];
            })->toArray();

            $this->uploadedImages = collect($this->existingImages)->map(fn($item) => $item['path'])->toArray();
            // dd($uploadedImages);
        }
    }

    public function updatedUploadedImages()
    {
        $this->validate([
            'uploadedImages.*' => 'image|max:2048', // 2MB Max
        ]);

        foreach ($this->uploadedImages as $image) {
            $this->tempImages[] = [
                'temp_path' => $image->temporaryUrl(),
                'file' => $image,
                'is_new' => true
            ];
        }

        $this->uploadedImages = [];
    }

    public function removeImage($index, $isExisting = false)
    {
        if ($isExisting) {
            // Mark existing image for deletion
            $this->existingImages[$index]['marked_for_deletion'] = true;
        } else {
            // Remove temp image
            unset($this->tempImages[$index]);
            $this->tempImages = array_values($this->tempImages);
        }
    }

    public function addImage()
    {
        $this->uploadedImages[] = '';
    }

    // this will delete iameg from database
    public function deleteImage($path, $index)
    {
        unset($this->uploadedImages[$index]);
        $this->uploadedImages = array_values($this->uploadedImages);

        ProductImage::where('image', $path)?->delete();
    }

    public function getImagesForSubmission()
    {
        return [
            'images_to_keep' => array_filter($this->existingImages, function ($image) {
                return !isset($image['marked_for_deletion']);
            }),
            'images_to_upload' => $this->tempImages,
            'images_to_delete' => array_filter($this->existingImages, function ($image) {
                return isset($image['marked_for_deletion']);
            })
        ];
    }

    public function render()
    {
        return view('livewire.admin.product-images');
    }
}
