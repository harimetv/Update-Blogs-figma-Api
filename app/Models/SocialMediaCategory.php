<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialMediaCategory extends Model
{
    protected $fillable = ['slug', 'name', 'status', 'image'];

    // Optionally casts for status
    protected $casts = ['status' => 'boolean'];
}
