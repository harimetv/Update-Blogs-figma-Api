<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

  protected $table = 'blogs';

     protected $fillable = [
        'title',
        'description',
        'author_name',
        'category_id',
        'meta_title',
        'meta_description',
        'slug',
        'publish_date',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(
            PostCategory::class,
            'category_id'
        );
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }
}
