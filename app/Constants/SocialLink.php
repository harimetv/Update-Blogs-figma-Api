<?php

namespace App\Constants;

class SocialLink
{
    // 🌍 Social Media Platforms with Icons
    public const SOCIAL_MEDIA_OPTIONS = [
        'instagram'  => ['name' => 'Instagram',  'icon' => 'fab fa-instagram'],
        'threads'    => ['name' => 'Threads',    'icon' => 'fab fa-threads'],
        'x'          => ['name' => 'X (Twitter)', 'icon' => 'fab fa-x-twitter'],
        'snapchat'   => ['name' => 'Snapchat',   'icon' => 'fab fa-snapchat'],
        'youtube'    => ['name' => 'YouTube',    'icon' => 'fab fa-youtube'],
        'tiktok'     => ['name' => 'TikTok',     'icon' => 'fab fa-tiktok'],
        'twitch'     => ['name' => 'Twitch',     'icon' => 'fab fa-twitch'],
        'whatsapp'   => ['name' => 'WhatsApp',   'icon' => 'fab fa-whatsapp'],
        'line'       => ['name' => 'LINE',       'icon' => 'fab fa-line'],
        'linkedin'   => ['name' => 'LinkedIn',   'icon' => 'fab fa-linkedin'],
        'facebook'   => ['name' => 'Facebook',   'icon' => 'fab fa-facebook'],
        'telegram'   => ['name' => 'Telegram',   'icon' => 'fab fa-telegram'],
        'discord'    => ['name' => 'Discord',    'icon' => 'fab fa-discord'],
        'pinterest'  => ['name' => 'Pinterest',  'icon' => 'fab fa-pinterest'],
        'reddit'     => ['name' => 'Reddit',     'icon' => 'fab fa-reddit'],
        'quora'      => ['name' => 'Quora',      'icon' => 'fab fa-quora'],
        'medium'     => ['name' => 'Medium',     'icon' => 'fab fa-medium'],
        'github'     => ['name' => 'GitHub',     'icon' => 'fab fa-github'],
        'gitlab'     => ['name' => 'GitLab',     'icon' => 'fab fa-gitlab'],
        'dribbble'   => ['name' => 'Dribbble',   'icon' => 'fab fa-dribbble'],
        'behance'    => ['name' => 'Behance',    'icon' => 'fab fa-behance'],
        'vk'         => ['name' => 'VK',         'icon' => 'fab fa-vk'],
        'weibo'      => ['name' => 'Weibo',      'icon' => 'fab fa-weibo'],
    ];

    public const PRIVACY_OPTIONS = [
        'public'  => 'Public',
        'private' => 'Private',
        'friends' => 'Friends',
        'custom'  => 'Custom',
    ];
}
