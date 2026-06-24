<?php

namespace App\Constants;

class GenderConstant
{
    public const MALE = 'male';
    public const FEMALE = 'female';
    public const OTHER = 'other';

    public static function list(): array
    {
        return [
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::OTHER => 'Other',
        ];
    }
}
