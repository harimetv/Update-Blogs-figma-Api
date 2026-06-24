<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLifestyle extends Model
{
    protected $fillable = [
        'user_id',
        'visibility',
        'languages',
        'hobbies',
        'diet',
        'drinking',
        'smoking',
        'own_house',
        'own_car',
        'food_cook',
    ];

    protected $casts = [
        'languages' => 'array',
        'hobbies' => 'array',
        'food_cook' => 'array',
        'own_house' => 'boolean',
        'own_car' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
