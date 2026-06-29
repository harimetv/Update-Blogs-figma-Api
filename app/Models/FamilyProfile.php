<?php
// app/Models/FamilyProfile.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FamilyProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'person',
        'bio',
        'father_occupation',
        'mother_occupation',
        'brothers',
        'sisters',
        'family_type',
        'family_status',
        'family_income',
        'family_values',
        'living_with_parents',
    ];

    protected $casts = [
        'brothers' => 'integer',
        'sisters' => 'integer',
    ];

    // Relationships
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class);
    }

    // Enums (optional)
    public const VISIBILITIES = ['public', 'private', 'onlyme'];
    public const FAMILY_TYPES = ['joint', 'nuclear', 'others'];
    public const FAMILY_STATUSES = ['middle_class', 'upper_middle_class', 'rich_migrant'];
    public const FAMILY_VALUES = ['moderate', 'conservative', 'liberal', 'orthodox'];
    public const LIVING_WITH_PARENTS = ['yes', 'no', 'not_applicable'];
}