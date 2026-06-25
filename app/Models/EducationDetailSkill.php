<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDetailSkill extends Model
{
    protected $table = 'education_detail_skills';

    protected $fillable = [
        'education_detail_id',
        'skill',
        'percentage',
    ];

    public function educationDetail(): BelongsTo
    {
        return $this->belongsTo(EducationDetail::class);
    }
}
