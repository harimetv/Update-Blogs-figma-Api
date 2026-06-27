<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\WorkExperience;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
class CareerDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'headline',
        'career_objective',
        'media',
        'skill_name',
        'skill_percentage',
        'person',
    ];

    /**
     * Get the user that owns the career detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include public careers.
     */
    public function scopePublic($query)
    {
        return $query->where('person', 'public');
    }

    /**
     * Scope a query to only include private careers.
     */
    public function scopePrivate($query)
    {
        return $query->where('person', 'private');
    }

    /**
     * Scope a query to only include "only me" careers.
     */
    public function scopeOnlyMe($query)
    {
        return $query->where('person', 'onlyme');
    }

    public function media(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset(Storage::url($value)) : null,
        );
    }
}
