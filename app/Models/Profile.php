<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'dob',
        'headline',
        'about',
        'image',
        'banner',
    ];
    protected $appends = ['full_name'];

    /**
     * Relationship with User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define an accessor for the 'full_name' attribute
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    /**
     * Profile Image Accessor with default
     */
    public function getImageAttribute($value)
    {
        $default = asset('assets/images/profiles/default-image.png');
        if (! $value) {
            return $default;
        }
        $image = getImageUrl($value);
        return $image;
    }

    /**
     * Banner Image Accessor with default
     */
    public function getBannerAttribute($value)
    {
        $default = asset('assets/images/profiles/default-image.png');
        if (! $value) {
            return $default;
        }
        $image = getImageUrl($value);
        return $image;
    }
}
