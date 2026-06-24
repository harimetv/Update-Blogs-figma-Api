<?php

namespace App\Constants;

class ImageProvider
{
    const LOCAL = 'local';
    const S3 = 's3';
    const CLOUDINARY = 'cloudinary';
    const IMAGEKIT = 'imagekit';

    public static function all(): array
    {
        return [
            self::LOCAL => 'Local',
            self::S3 => 'S3',
            self::CLOUDINARY => 'Cloudinary',
            self::IMAGEKIT => 'ImageKit',
        ];
    }

    public static function keys(): array
    {
        return array_keys(self::all());
    }
}
