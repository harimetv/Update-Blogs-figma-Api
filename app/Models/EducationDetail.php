<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;
class EducationDetail extends Model
{
    use HasFactory;

    protected $table = 'education_details';

    protected $fillable = [
        'user_id',
        'school_name',
        'college_name',
        'study_id',
        'start_date',
        'end_date',
        'media',
        'city_id',
        'grade',
        'description',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function study(): BelongsTo
    {
        return $this->belongsTo(Study::class);
    }

   public function media(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (!$value) {
                    return null;
                }
                return asset(Storage::url($value));
            }
        );
    }


    public function skills(): HasMany
    {
        return $this->hasMany(EducationDetailSkill::class,'education_detail_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
