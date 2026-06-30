<?php
// app/Models/FamilyMember.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMember extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'relation_type',
        'name',
        'age',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'age' => 'integer',
    ];

    // Optional: Define constants for relation types
    public const RELATION_TYPES = [
        'Father',
        'Mother',
        'Brother',
        'Sister',
        'Spouse',
        'Son',
        'Daughter',
        'Other',
    ];
}