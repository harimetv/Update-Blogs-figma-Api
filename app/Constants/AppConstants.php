<?php
namespace App\Constants;

class AppConstants
{
    // Device Types
    public const ANDROID = 'android';
    public const IOS     = 'ios';
    public const WEB     = 'web';

    public const VIP       = 'VIP';
    public const BLUE_TICK = 'BLUE_TICK';

    // Visibility Options
    public const VISIBILITY_PUBLIC  = 'public';
    public const VISIBILITY_PRIVATE = 'private';

    // Invitation status constants
    const STATUS_PENDING  = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';

    const ACTIVE   = true;
    const INACTIVE = false;

    // Return all device types
    public static function deviceTypes(): array
    {
        return [self::ANDROID, self::IOS, self::WEB];
    }

    // Return all user types
    public static function userTypes(): array
    {
        return [self::VIP];
    }

    // Return all visibility options
    public static function visibilityOptions(): array
    {
        return [self::VISIBILITY_PUBLIC, self::VISIBILITY_PRIVATE];
    }

    //Return all feature constants
    public static function features(): array
    {
        return [self::BLUE_TICK];
    }

    public static function all_status(): array
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_ACCEPTED,
            self::STATUS_REJECTED,
        ];
    }
}