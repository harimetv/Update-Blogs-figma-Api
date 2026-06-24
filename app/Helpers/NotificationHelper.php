<?php

use App\Constants\SocialLink;

if (!function_exists('social_links')) {
    function social_links(): array
    {
        return SocialLink::SOCIAL_MEDIA_OPTIONS;
    }
}