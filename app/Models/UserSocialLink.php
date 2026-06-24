<?php

// app/Models/UserSocialLink.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSocialLink extends Model
{
    use HasFactory;

    protected $table = 'user_social_links';

    protected $fillable = [
        'user_id',
        'plateform_type_id',
        'plateform_link',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function plateformType(): BelongsTo
    {
        return $this->belongsTo(SocialMediaCategory::class, 'plateform_type_id', 'id');
    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'user_id', 'user_id');
    }
}
