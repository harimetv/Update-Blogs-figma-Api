<?php

namespace App\Models;

use App\Models\PostType;
use App\Models\Post_titles;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
     protected $fillable = [
        'post_type_id',
        'post_title_id',
        'post_description',
        'media',
    ];

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function postTitle()
    {
        return $this->belongsTo(Post_titles::class);
    }
}
