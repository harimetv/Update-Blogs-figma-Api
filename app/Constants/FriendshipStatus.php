<?php
namespace App\Constants;

class FriendshipStatus
{
    public const PENDING  = 'pending';
    public const ACCEPTED = 'accepted';
    public const REJECTED = 'rejected';

    /**
     * Get all available friendship statuses.
     */
    public static function all(): array
    {
        return [
            self::PENDING,
            self::ACCEPTED,
            self::REJECTED,
        ];
    }

    /**
     * Check if the given status is valid.
     */
    public static function isValid(string $status): bool
    {
        return in_array($status, self::all(), true);
    }
}
