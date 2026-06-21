<?php

namespace App\Constants;

class PostConstants
{
    // 🔍 Types
    public const TYPES = ['original', 'repost'];

    // 👁️ Visibility
    public const VISIBILITY_OPTIONS = ['public', 'followers', 'private'];

    // 📸 Image Upload Rules
    public const MAX_IMAGE_COUNT = 5;
    public const MAX_IMAGE_SIZE_MB = 5; // MB
    public const ALLOWED_IMAGE_MIMES = ['jpeg', 'png', 'jpg', 'gif', 'webp'];

    // 🎥 Video Upload Rules
    public const MAX_VIDEO_COUNT = 2;
    public const MAX_VIDEO_SIZE_MB = 100; // MB
    public const ALLOWED_VIDEO_MIMES = ['video/mp4', 'video/quicktime'];
}
