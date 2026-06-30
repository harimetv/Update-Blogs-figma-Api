<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarriageProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'religion_id',
        'cast_id',
        'country_id',
        'city_id',
        'gotra_id',
        'person',
        'bio',
        'age',
        'manage_by',
        'manglik',
        'highest_degree',
        'occupation',
    ];

    // Relationships (optional – ensure related models exist)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function religion(): BelongsTo
    {
        return $this->belongsTo(Religion::class); // if you have a Religion model
    }

    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function gotra(): BelongsTo
    {
        return $this->belongsTo(Gotra::class);
    }
}

