<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'visibility',
        'gender',
        'bust_chest',
        'hip',
        'eye_color',
        'hair_color',
        'body_type',
        'interestes_in',
        'comfortable_in',
        'languages',
        'phone_number',
        'bio',
        'managed_by',
    ];

    protected $casts = [
        'interestes_in' => 'array',
        'comfortable_in' => 'array',
        'languages' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
