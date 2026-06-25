<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\WorkExperience;
class CareerDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'headline',
        'career_description',
        'work_experience_id',
        'media',
        'skills',
        'rating',
        'person',
    ];

    protected $appends = ['work_experiences'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'work_experience_id' => 'array',
        'rating' => 'decimal:2',
    ];

    /**
     * Get the user that owns the career detail.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getWorkExperiencesAttribute()
    {
        if (empty($this->work_experience_id)) {
            return collect();
        }

        return WorkExperience::whereIn('id', $this->work_experience_id)->get();
    }

    /**
     * Get the skill associated with the career.
     */
    // public function skill(): BelongsTo
    // {
    //     return $this->belongsTo(Skill::class, 'skills_id');
    // }

    /**
     * Scope a query to only include public careers.
     */
    public function scopePublic($query)
    {
        return $query->where('person', 'public');
    }

    /**
     * Scope a query to only include private careers.
     */
    public function scopePrivate($query)
    {
        return $query->where('person', 'private');
    }

    /**
     * Scope a query to only include "only me" careers.
     */
    public function scopeOnlyMe($query)
    {
        return $query->where('person', 'onlyme');
    }
}
