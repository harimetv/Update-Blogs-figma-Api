<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comfortable extends Model
{
    use HasFactory;

    use HasFactory;

    // protected $table = 'comfortables';

    protected $fillable = [
        'name',
        'status',
    ];
}
