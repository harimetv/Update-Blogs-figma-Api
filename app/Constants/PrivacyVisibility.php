<?php
namespace App\Constants;

class PrivacyVisibility
{
    public const PUBLIC         = 'public';
    public const CONNECTIONS    = 'connections';
    public const CUSTOM_FRIENDS = 'custom_friends';
    public const ONLY_ME        = 'only_me';

    public static function options(): array
    {
        return [
            self::PUBLIC         => [
                'key'         => self::PUBLIC,
                'title'       => 'Public',
                'description' =>
                'Anyone on the platform can see this information, including people who are not connected with you.',
            ],
            self::CONNECTIONS    => [
                'key'         => self::CONNECTIONS,
                'title'       => 'My Connections',
                'description' =>
                'Only people who are connected with you can view this information.',
            ],
            self::CUSTOM_FRIENDS => [
                'key'         => self::CUSTOM_FRIENDS,
                'title'       => 'Custom Friends',
                'description' =>
                'Only selected people or groups chosen by you can see this information.',
            ],
            self::ONLY_ME        => [
                'key'         => self::ONLY_ME,
                'title'       => 'Only Me',
                'description' =>
                'This information is completely private and visible only to you.',
            ],
        ];
    }

    public static function get(string $key): ?array
    {
        return self::options()[$key] ?? null;
    }
}
