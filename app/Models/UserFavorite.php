<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    protected $fillable = [
        'user_id',
        'visibility',
        'favorite_food',
        'favorite_books',
        'favorite_music',
        'favorite_sports',
        'favorite_movies',
        'favorite_tv_shows',
        'favorite_vacation_place',
        'favorite_actor_actress',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
