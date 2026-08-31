<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post_titles extends Model
{
    protected $fillable = [
        'title',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
