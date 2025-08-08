<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShadeProperty extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'glide_elbow',
        'fabric_types',
        'min_shade_size',
        'max_shade_size',
        'shade_frame_warranty',
        'shade_fabric_warranty'
    ];


    /**
     * Get the product of image.
     */
    public function product(): BelongsTo
    {
        return $this->belongTo(Product::class);
    }
}
