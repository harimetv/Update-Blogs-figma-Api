<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'user_id',
        'select_person',
        'banner_image',
        'profile_image',
        'first_name',
        'last_name',
        'email',
        'phone',
        'username',
        'dob',
        'gender',
        'bio',
        'headline',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function socialLinks(): HasMany
    {
        return $this->hasMany(UserSocialMediaLink::class, 'user_id', 'user_id');
    }
}
