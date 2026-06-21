<?php

use App\Constants\SocialLink;

if (!function_exists('social_links')) {
    function social_links(): array
    {
        return SocialLink::SOCIAL_MEDIA_OPTIONS;
    }
}

if (!function_exists('social_platform')) {
    function social_platform(string $platform): ?array
    {
        return social_links()[$platform] ?? null;
    }
}

if (!function_exists('social_platform_icon')) {
    function social_platform_icon(string $platform): string
    {
        return social_platform($platform)['icon'] ?? 'fas fa-globe';
    }
}

if (!function_exists('social_platform_name')) {
    function social_platform_name(string $platform): string
    {
        return social_platform($platform)['name'] ?? 'Unknown';
    }
}

if (!function_exists('social_privacy_options')) {
    function social_privacy_options(): array
    {
        return SocialLink::PRIVACY_OPTIONS;
    }
}

if (!function_exists('social_privacy_label')) {
    function social_privacy_label(string $privacy): string
    {
        return social_privacy_options()[$privacy] ?? 'Unknown';
    }
}
