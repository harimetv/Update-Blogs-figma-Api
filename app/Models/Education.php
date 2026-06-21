<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Education extends Model
{
    use HasFactory;
    protected $table = 'educations';
    protected $fillable = [
        'user_id',
        'visibility',
        'school_name',
        'college_name',
        'degree_type',
        'field_of_study',
        'start_date',
        'end_date',
        'grade',
        'description',
        'media',
        'skills',
        'city'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
