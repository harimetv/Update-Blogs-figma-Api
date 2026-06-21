<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    // Define which fields can be mass‑assigned
    protected $fillable = [
        'title',
        'description',
    ];

    // Example relationship: a study belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
