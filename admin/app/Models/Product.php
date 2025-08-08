<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $slug = (string) Str::slug($model->name);
            if (static::whereSlug($slug)->exists()) {
                $original = $slug;
                $count = 2;
                while (static::whereSlug($slug)->exists()) {

                    $slug = "{$original}-" . $count++;
                }
            }

            $model->slug = $slug;
        });
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'slug', 'type', 'category', 'sub_category', 'name', 'sku', 'lead_time', 'age_group', 'length', 'width', 'min_capacity', 'max_capacity', 'playground_series', 'recycled_content', 'materials', 'description', 'description_html', 'quick_ship_item', 'dimensions', 'price', 'status', 'featured'];

    protected $append = ['image'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'featured' => 'boolean',
            'created_at' => 'datetime',
        ];
    }

    public function getCapacityAttribute()
    {
        return $this->min_capacity ? $this->min_capacity . "-" . $this->max_capacity . " Kids" : "N/A";
    }

    public function getImageAttribute()
    {
        $item = $this->images()->first();
        return $item ? product_image($this->category, $item->image) : null;
    }

    /**
     * Get the products order.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Get the images of product.
     */
    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Get the shade property of shade product.
     */
    public function shade(): HasOne
    {
        return $this->hasOne(ShadeProperty::class);
    }
}
