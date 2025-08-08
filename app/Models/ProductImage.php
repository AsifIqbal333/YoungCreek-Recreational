<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'image'];

    // protected function amount(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => asset($value),
    //         // set: fn($value) => $value * 100,
    //     );
    // }


    /**
     * Get the product of image.
     */
    public function product(): BelongsTo
    {
        return $this->belongTo(Product::class);
    }
}
