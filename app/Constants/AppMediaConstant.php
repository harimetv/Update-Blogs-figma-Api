<?php
namespace App\Constants;

class AppMediaConstant
{
    // GLOBAL MEDIA LIMITS

    // 📸 Image Upload
    public const MAX_IMAGE_COUNT   = 5;
    public const MAX_IMAGE_SIZE_MB = 10;
    public const MAX_FILE_COUNT    = 5;

    // Documents
    public const ALLOWED_DOCUMENT_MIMES = [
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'txt',
    ];

    public const MAX_DOCUMENT_SIZE_MB = 10;

    public const ALLOWED_IMAGE_MIMES = [
        'jpg',
        'jpeg',
        'png',
        'gif',
        'webp',
        'bmp',
        'svg',
    ];

    const MAX_CONTENT_LENGTH = 500;
    const MAX_CAPTION_LENGTH = 255;

    public const MAX_SHORT_TEXT  = 100;  // names, titles, small fields
    public const MAX_MEDIUM_TEXT = 255;  // captions, addresses, general inputs
    public const MAX_LONG_TEXT   = 500;  // posts, content, descriptions
    public const MAX_BIO_TEXT    = 2000; // bio/about sections

    // 🎥 Video Upload
    public const MAX_VIDEO_COUNT     = 2;
    public const MAX_VIDEO_SIZE_MB   = 100;
    public const ALLOWED_VIDEO_MIMES = [
        'video/mp4',
        'video/quicktime',
        'video/x-msvideo',  // avi
        'video/x-matroska', // mkv
        'video/webm',
        'video/mpeg',
    ];

    // 🎵 Audio Upload
    public const MAX_AUDIO_COUNT     = 5;
    public const MAX_AUDIO_SIZE_MB   = 10;
    public const ALLOWED_AUDIO_MIMES = [
        'audio/mpeg', // mp3
        'audio/wav',
        'audio/ogg',
        'audio/mp4',   // m4a
        'audio/x-aac', // aac
        'audio/flac',
    ];

    // 📄 Document Upload
    public const MAX_DOC_COUNT     = 10;
    public const MAX_DOC_SIZE_MB   = 5;
    public const ALLOWED_DOC_MIMES = [
        'application/pdf',
        'application/msword',                                                      // doc
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // docx
        'application/vnd.ms-excel',                                                // xls
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',       // xlsx
        'text/plain',                                                              // txt
        'text/csv',                                                                // csv
        'application/zip',
        'application/x-zip-compressed',
    ];

    // HELPERS — Convert MB → KB

    public static function imageSizeKB(): int
    {
        return self::MAX_IMAGE_SIZE_MB * 1024; // MB → kb
    }
    public static function maxImageSizeBytes(): int
    {
        return self::MAX_IMAGE_SIZE_MB * 1024 * 1024; // MB → bytes
    }

    public static function videoSizeKB(): int
    {
        return self::MAX_VIDEO_SIZE_MB * 1024;
    }

    public static function audioSizeKB(): int
    {
        return self::MAX_AUDIO_SIZE_MB * 1024;
    }

    public static function documentSizeKB(): int
    {
        return self::MAX_DOC_SIZE_MB * 1024;
    }

    public static function shortText(): int
    {
        return self::MAX_SHORT_TEXT;
    }

    public static function mediumText(): int
    {
        return self::MAX_MEDIUM_TEXT;
    }

    public static function longText(): int
    {
        return self::MAX_LONG_TEXT;
    }

    public static function bioText(): int
    {
        return self::MAX_BIO_TEXT;
    }
}
