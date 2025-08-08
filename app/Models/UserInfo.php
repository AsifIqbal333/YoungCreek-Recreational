<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['user_id', 'billing_first_name', 'billing_last_name', 'billing_phone', 'billing_company_name', 'billing_country_id', 'billing_address_1', 'billing_address_2', 'billing_city', 'billing_state_id', 'billing_postcode', 'billing_email', 'shipping_first_name', 'shipping_last_name', 'shipping_phone', 'shipping_company_name', 'shipping_country_id', 'shipping_address_1', 'shipping_address_2', 'shipping_city', 'shipping_state_id', 'shipping_postcode', 'shipping_email'];

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
