<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationSkill extends Model
{
    use HasFactory;

    protected $table = 'education_skills';

    protected $fillable = [
        'skill_id',
        'education_detail_id',
        'percentage',
    ];

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function educationDetail(): BelongsTo
    {
        return $this->belongsTo(EducationDetail::class);
    }
}
