<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'person',
        'first_name',
        'last_name',
        'username',
        'email',
        'gender',
        'dob',
        'headline',
        'bio',        // renamed from 'about'
        'image',
        'banner',
        'phone'
    ];

    protected $appends = ['full_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getImageAttribute($value)
    {
        $default = asset('assets/images/profiles/default-image.png');
        if (!$value) {
            return $default;
        }
        return getImageUrl($value);
    }

    public function getBannerAttribute($value)
    {
        $default = asset('assets/images/profiles/default-image.png');
        if (!$value) {
            return $default;
        }
        return getImageUrl($value);
    }
}
