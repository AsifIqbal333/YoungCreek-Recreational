<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'iso2_code', 'country_id'];

    /**
     * get country of state.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
