<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'iso2_code', 'iso3_code', 'calling_code', 'capital', 'currency'];


    /**
     * get all states of country.
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
}
