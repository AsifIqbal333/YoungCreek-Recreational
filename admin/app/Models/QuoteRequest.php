<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'product_interest', 'message', 'organization_name', 'organization_type', 'budget', 'category', 'border_length'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'product_interest' => 'array',
            'created_at' => 'datetime',
        ];
    }
}
