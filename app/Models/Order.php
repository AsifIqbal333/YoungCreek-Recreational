<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uuid', 'number', 'tracking_number', 'user_id', 'price', 'comments', 'billing_first_name', 'billing_last_name', 'billing_phone', 'billing_company_name', 'billing_country_id', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state_id', 'billing_postcode', 'shipping_first_name', 'shipping_last_name', 'shipping_phone', 'shipping_company_name', 'shipping_country_id', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state_id', 'shipping_postcode'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    /**
     * Get the user of order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the products of order.
     */
    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }

    /**
     * Get the transaction of order.
     */
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }

    /**
     * get billing country.
     */
    public function billingCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'billing_country_id');
    }

    /**
     * get shipping country.
     */
    public function shippingCountry(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'shipping_country_id');
    }
}
