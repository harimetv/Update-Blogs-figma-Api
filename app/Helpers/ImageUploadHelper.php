<?php

use App\Constants\AppMediaConstant;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use ImageKit\ImageKit;
use Illuminate\Support\Str;

if (!function_exists('image_providers')) {
    function image_providers(): array
    {
        return [
            'local'      => 'Local',
            's3'         => 'S3',
            'cloudinary' => 'Cloudinary',
            'imagekit'   => 'ImageKit',
        ];
    }
}

if (!function_exists('uploadImage')) {
    function uploadImage(UploadedFile $file, string $directory = 'default', string $provider = 'local')
    {
        Log::info("🔄 Uploading image to [{$provider}] in directory [{$directory}]");

        try {
            if (!$file->isValid()) {
                Log::error("❌ Invalid file upload.");
                return false;
            }

            // Max size
            if ($file->getSize() > AppMediaConstant::maxImageSizeBytes()) {
                $allowedMB = AppMediaConstant::MAX_IMAGE_SIZE_MB;
                Log::error("❌ File exceeds {$allowedMB}MB limit.");
                return false;
            }
            // Clean file name
            $filename     = time() . "-" . (string) Str::uuid() . '.' . $file->getClientOriginalExtension();
            $relativePath = "{$provider}/{$directory}/{$filename}";

            return match ($provider) {
                's3'         => uploadToS3($file, $relativePath),
                'cloudinary' => uploadToCloudinary($file, $directory, $filename),
                'imagekit'   => uploadToImageKit($file, $directory, $filename),
                default      => uploadToLocal($file, $relativePath),
            };
        } catch (\Throwable $e) {
            Log::error("❌ uploadImage failed: {$e->getMessage()}", [
                'provider'  => $provider,
                'filename'  => $file->getClientOriginalName(),
                'directory' => $directory,
            ]);
            return false;
        }
    }
}

// 🌐 Upload Handlers by Provider

function uploadToLocal(UploadedFile $file, string $relativePath): string|false
{
    try {
        Storage::disk('public')->put($relativePath, file_get_contents($file->getRealPath()));
        Log::info("Uploaded to local: {$relativePath}");
        // return asset("storage/{$relativePath}");
        // return getImageUrl($relativePath);
        return $relativePath;
    } catch (\Throwable $e) {
        Log::error("uploadToLocal failed: " . $e->getMessage());
        return false;
    }
}

function uploadToS3(UploadedFile $file, string $relativePath): string|false
{
    try {
        $path = Storage::disk('s3')->put($relativePath, file_get_contents($file->getRealPath()));
        Log::info("Uploaded to S3: {$relativePath}");
        return Storage::disk('s3')->url($relativePath);
    } catch (\Throwable $e) {
        Log::error("uploadToS3 failed: " . $e->getMessage());
        return false;
    }
}

function uploadToCloudinary(UploadedFile $file, string $directory, string $filename): string|false
{
    try {
        $upload = Cloudinary::upload($file->getRealPath(), [
            'folder' => "uploads/{$directory}",
            'public_id' => pathinfo($filename, PATHINFO_FILENAME),
        ]);
        $url = $upload->getSecurePath();
        Log::info("Uploaded to Cloudinary: {$url}");
        return $url;
    } catch (\Throwable $e) {
        Log::error("uploadToCloudinary failed: " . $e->getMessage());
        return false;
    }
}

function uploadToImageKit(UploadedFile $file, string $directory, string $filename)
{
    try {
        $imageKit = new ImageKit(
            config('services.imagekit.public_key'),
            config('services.imagekit.private_key'),
            config('services.imagekit.url_endpoint')
        );

        $response = $imageKit->upload([
            'file'     => fopen($file->getRealPath(), 'r'),
            'fileName' => $filename,
            'folder'   => "public/images/{$directory}",
        ]);

        // $url = $response->result->url ?? false;
        $url = $response->result->filePath ?? null;
        $result = $response->result;
        Log::info("Uploaded to ImageKit: {$url}");
        Log::info("uploadToImageKit", ['result' => $response->result]);
        return $result;
    } catch (\Throwable $e) {
        Log::error("uploadToImageKit failed: " . $e->getMessage());
        return false;
    }
}

if (!function_exists('removeImage')) {
    function removeImage(string $url, string $provider = 'local'): bool
    {
        try {
            switch ($provider) {
                case 's3':
                    $path = parse_url($url, PHP_URL_PATH);
                    return Storage::disk('s3')->delete(ltrim($path, '/'));

                case 'cloudinary':
                    $publicId = pathinfo(parse_url($url, PHP_URL_PATH)['path'] ?? '', PATHINFO_FILENAME);
                    $response = Cloudinary::destroy($publicId);
                    return $response->getResult()['result'] === 'ok';

                case 'imagekit':
                    $imageKit = new ImageKit(
                        config('services.imagekit.public_key'),
                        config('services.imagekit.private_key'),
                        config('services.imagekit.url_endpoint')
                    );
                    $files = $imageKit->listFiles([
                        "searchQuery" => "url=\"{$url}\""
                    ]);
                    // dd( $url, $files );
                    $fileId = $files->success[0]->fileId ?? null;
                    if (!$fileId) return false;
                    $response = $imageKit->deleteFile($fileId);
                    return $response->httpStatusCode === 204;

                case 'local':
                default:
                    $relative = str_replace(asset('storage/'), '', $url);
                    return Storage::disk('public')->delete($relative);
            }
        } catch (\Throwable $e) {
            Log::error("removeImage failed: " . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('resizeImage')) {
    function resizeImage(string $urlOrPublicId, int $width, int $height = null, string $provider = 'cloudinary'): string
    {
        try {
            if ($provider === 'cloudinary') {
                $transformation = ['width' => $width, 'crop' => 'scale'];
                if ($height) $transformation['height'] = $height;
                return Cloudinary::image($urlOrPublicId)->resize($transformation)->toUrl();
            }

            if ($provider === 'imagekit') {
                $transform = "tr=w-{$width}" . ($height ? ",h-{$height}" : '');
                return $urlOrPublicId . '?' . $transform;
            }

            return $urlOrPublicId; // For local and S3: return original
        } catch (\Throwable $e) {
            Log::error("resizeImage failed: " . $e->getMessage());
            return $urlOrPublicId;
        }
    }
}

if (!function_exists('updateImage')) {
    function updateImage(UploadedFile $file, ?string $oldUrl = null, string $directory = 'default', string $provider = 'local'): string|false
    {
        try {
            if ($oldUrl) removeImage($oldUrl, $provider);
            return uploadImage($file, $directory, $provider);
        } catch (\Throwable $e) {
            Log::error("updateImage failed: " . $e->getMessage());
            return false;
        }
    }
}

if (!function_exists('detectImageProvider')) {
    function detectImageProvider(string $path): string 
    {
        if (Str::contains($path, 'cloudinary/')) return 'cloudinary';
        if (Str::contains($path, 'imagekit/')) return 'imagekit';
        if (Str::contains($path, 's3/')) return 's3';
        return 'local';
    }
}

if (!function_exists('getImageUrl')) {
    /**
     * Get the full URL of an image based on its path and provider.
     *
     * @param string $path
     * @return string
     */
    function getImageUrl(string $path): string
    {
        $provider = detectImageProvider($path);
        // dd($provider, $path);
        return match ($provider) {
            's3' => Storage::disk('s3')->url($path),
            'cloudinary' => 'https://res.cloudinary.com/' . config('services.cloudinary.cloud_name') . '/image/upload/' . $path,
            'imagekit' => config('services.imagekit.url_endpoint') . '/' . $path,
            default => asset('storage/' . $path),
        };
    }
}
