<?php

use App\Constants\AppConstants;
use App\Constants\AppMediaConstant;
use App\Constants\GenderConstant;
use App\Constants\Language;
use App\Constants\PrivacyVisibility;
use App\Constants\RoleConstants;
use App\Models\User;
use Carbon\Carbon;
use Hidehalo\Nanoid\Client as Nanoid;
use Illuminate\Support\Str;

if (! function_exists('get_all_roles')) {
    function get_all_roles(): array
    {
        return RoleConstants::allRoles();
    }
}

if (! function_exists('is_role')) {
    function is_role($role): bool
    {
        return in_array($role, RoleConstants::allRoles());
    }
}

if (! function_exists('is_super_admin')) {
    function is_super_admin(): string
    {
        return RoleConstants::SUPER_ADMIN;
    }
}

if (! function_exists('is_admin')) {
    function is_admin(): string
    {
        return RoleConstants::ADMIN;
    }
}

if (! function_exists('is_manager')) {
    function is_manager(): string
    {
        return RoleConstants::MANAGER;
    }
}

if (! function_exists('is_user')) {
    function is_user(): string
    {
        return RoleConstants::USER;
    }
}

if (! function_exists('device_types')) {
    function device_types(): array
    {
        return AppConstants::deviceTypes();
    }
}

if (! function_exists('generateRandomString')) {
    /**
     * Generate a random string of characters
     *
     * @param int $length Length of the random string
     * @return string Random string
     */
    function generateRandomString($length = 10)
    {
        // Define the characters to use
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        // Generate the random string
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return strtoupper($randomString);
    }
}

if (! function_exists('generateAccountNumber')) {
    function generateAccountNumber()
    {
        do {
                                              // Get the current date in DDMMYYYY format (e.g., 28112024)
            $datePart = now()->format('dmY'); // Example: "28112024"

                                                                                        // Generate a random 8-digit number
            $randomNumber = str_pad(mt_rand(10000000, 99999999), 8, '0', STR_PAD_LEFT); // Ensure 8 digits

            // Combine date part and random number
            $accountNumber = $datePart . $randomNumber;

            // Check if the account number already exists in the `users` table
            $exists = User::where('account_number', $accountNumber)->exists();
        } while ($exists);

        return $accountNumber;
    }
}

if (! function_exists('generateSlug')) {
    function generateSlug()
    {
        $args = func_get_args();
        $args = array_filter($args, function ($value) {
            return ! empty($value);
        });

        if (empty($args)) {
            return Str::slug('default-slug');
        }
        $slugString = implode('-', $args);
        return Str::slug($slugString);
    }
}

if (! function_exists('timeAgo')) {
    function timeAgo(Carbon $date)
    {
        $now  = Carbon::now();
        $diff = $now->diff($date);

        if ($diff->y) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        }
        if ($diff->m) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        }
        if ($diff->d) {
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        }
        if ($diff->h) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        }
        if ($diff->i) {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        }
        if ($diff->s) {
            return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
        }

        return 'just now';
    }
}

if (! function_exists('formatDate')) {
    function formatDate(Carbon $date)
    {
        return $date->format("d M Y, h:i A");
    }
}

if (! function_exists('checkUserName')) {
    function checkUserName($username)
    {
        return User::where('username', $username)->exists();
    }
}

if (! function_exists('generateRandomNumber')) {
    function generateRandomNumber($number = 6)
    {
        // Define the characters to use for OTP generation
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $otp        = '';
        // Loop to generate a 6-character OTP
        for ($i = 0; $i < $number; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $otp;
    }
}

if (! function_exists('generateRandomOTP')) {
    function generateRandomOTP($number = 6)
    {
        $characters = '0123456789';
        $otp        = '';
        for ($i = 0; $i < $number; $i++) {
            $otp .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $otp;
    }
}

if (! function_exists('isActiveRoute')) {
    function isActiveRoute($routeName, $output = "active")
    {
        return request()->routeIs($routeName) ? $output : '';
    }
}

if (! function_exists('areActiveRoutes')) {
    function areActiveRoutes(array $routeNames, $output = "active")
    {
        foreach ($routeNames as $routeName) {
            if (request()->routeIs($routeName)) {
                return $output;
            }
        }
        return '';
    }
}

if (! function_exists('isValidEmail')) {
    /**
     * Validate an email by checking format, DNS, and existence.
     *
     * @param string $email
     * @return bool|string
     */
    function isValidEmail(string $email)
    {
        // Step 1: Validate email format
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }

        // Step 2: Extract domain from email
        $domain = substr(strrchr($email, "@"), 1);

        // Step 3: Check if domain has MX or A records (DNS verification)
        if (! checkdnsrr($domain, "MX") && ! checkdnsrr($domain, "A")) {
            return "Invalid domain or no email server found.";
        }
        return true; // Email is valid
    }
}

if (! function_exists('languages')) {
    function languages(): array
    {
        return Language::LANGUAGES;
    }
}

if (! function_exists('genders')) {
    function genders(): array
    {
        return GenderConstant::list();
    }
}

if (! function_exists('make_slug')) {
    function make_slug($title = null): string
    {
        // Fallback for empty title (image-only post, etc.)
        if (! $title || trim($title) === '') {
            $title = 'post';
        }

        // Convert to slug
        $slug = Str::slug($title);

        // Keep slug short (SEO friendly)
        $slug = Str::limit($slug, 20, '');

        // Generate short unique id
        $nanoid = new Nanoid();
        $unique = $nanoid->generateId(10);

        return "{$slug}-{$unique}";
    }
}

//Return public visibility option
if (! function_exists('is_public')) {
    function is_public(): string
    {
        return AppConstants::VISIBILITY_PUBLIC;
    }
}

//Return private visibility option
if (! function_exists('is_private')) {
    function is_private(): string
    {
        return AppConstants::VISIBILITY_PRIVATE;
    }
}

//Return all visibility options
if (! function_exists('visibilities')) {
    function visibilities(): array
    {
        return AppConstants::visibilityOptions();
    }
}

if (! function_exists('privacy_options')) {
    function privacy_options(): array
    {
        return array_values(PrivacyVisibility::options());
    }
}

if (! function_exists('getMediaType')) {
    function getMediaType($file): string
    {
        $mime = $file->getMimeType();

        return match (true) {

            // ✅ Image
            in_array($mime, AppMediaConstant::ALLOWED_IMAGE_MIMES) => 'image',

            // ✅ Video
            in_array($mime, AppMediaConstant::ALLOWED_VIDEO_MIMES) => 'video',

            // ✅ Audio
            in_array($mime, AppMediaConstant::ALLOWED_AUDIO_MIMES) => 'audio',

            // ✅ PDF (separate if needed)
            $mime === 'application/pdf'                            => 'pdf',

            // ✅ Text
            in_array($mime, ['text/plain', 'text/csv'])            => 'text',

            // document
            in_array($mime, AppMediaConstant::ALLOWED_DOC_MIMES)   => 'document',

            default                                                => 'unknown',
        };
    }
}

// Return pending status
if (! function_exists('is_pending')) {
    function is_pending(): string
    {
        return AppConstants::STATUS_PENDING;
    }
}

// Return accepted status
if (! function_exists('is_accepted')) {
    function is_accepted(): string
    {
        return AppConstants::STATUS_ACCEPTED;
    }
}

// Return rejected status
if (! function_exists('is_rejected')) {
    function is_rejected(): string
    {
        return AppConstants::STATUS_REJECTED;
    }
}

// Return rejected status
if (! function_exists('all_status')) {
    function all_status(): array
    {
        return AppConstants::all_status();
    }
}

// Return active admin flag
if (! function_exists('is_active')) {
    function is_active(): bool
    {
        return AppConstants::ACTIVE;
    }
}
