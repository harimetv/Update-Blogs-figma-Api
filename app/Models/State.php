<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $fillable = [
        'country_id',
        'name',
        'code',          // optional, e.g. 'MH' for Maharashtra
    ];

    /**
     * Get the country that this state belongs to.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the cities for this state.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}