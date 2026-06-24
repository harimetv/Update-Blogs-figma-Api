<?php

namespace App\Constants;

class MarriageStatus
{
    public const SINGLE = 'Single';
    public const MARRIED = 'Married';
    public const DIVORCED = 'Divorced';
    public const WIDOWED = 'Widowed';
    public const SEPARATED = 'Separated';
    public const ENGAGED = 'Engaged';
    public const IN_RELATIONSHIP = 'In a Relationship';
    public const ANNULLED = 'Annulled';
    public const DOMESTIC_PARTNERSHIP = 'Domestic Partnership';
    public const COMPLICATED = 'Complicated';
    public const CUSTOM = 'Custom';

    // List of all statuses
    public const STATUSES = [
        self::SINGLE,
        self::MARRIED,
        self::DIVORCED,
        self::WIDOWED,
        self::SEPARATED,
        self::ENGAGED,
        self::IN_RELATIONSHIP,
        self::ANNULLED,
        self::DOMESTIC_PARTNERSHIP,
        self::COMPLICATED,
        self::CUSTOM
    ];
}
