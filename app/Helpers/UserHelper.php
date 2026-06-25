<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

if (! function_exists('generateSuggestionsUsername')) {
    /**
     * Generate a list of suggested usernames based on name/email
     *
     * @param string|null $name
     * @param string|null $email
     * @param int $count
     * @return array
     */
    function generateSuggestionsUsername($name = null, $email = null, $count = 20): array
    {
        $base = 'user';

        // Generate base from name or email
        if ($name) {
            $base = Str::slug(explode(' ', trim($name))[0]); // e.g. "John Doe" => "john"
        } elseif ($email) {
            $base = Str::slug(explode('@', trim($email))[0]); // e.g. "john.smith@gmail.com" => "john-smith"
        }

        $suggestions = [];
        $attempts    = 0;
        $maxAttempts = $count * 5;

        while (count($suggestions) < $count && $attempts < $maxAttempts) {
            // $suggested = $base . rand(100, 9999);

            // Add a random number to the end
            $random = (string) rand(100, 9999);

            // Ensure total length does not exceed 30 characters
            $trimmedBase = Str::limit($base, 30 - strlen($random), '');

            $suggested = $trimmedBase . $random;

            if (! User::where('username', $suggested)->exists() && ! in_array($suggested, $suggestions)) {
                $suggestions[] = $suggested;
            }

            $attempts++;
        }

        return $suggestions;
    }
}

if (! function_exists('fullName')) {
    function fullName($user = null, $limit = 20)
    {
        // If no user is passed, get the authenticated one
        if (empty($user)) {
            $user = Auth::user();
        }

        $name = $user->profile->full_name ?? '';
        // Shorten the name if it's too long
        return strlen($name) > $limit ? substr($name, 0, $limit) . '...' : $name;
    }
}

if (! function_exists('appDateFormat')) {
    function appDateFormat($date)
    {
        if (empty($date)) {
            return null;
        }

        return \Carbon\Carbon::parse($date)->format(config('app.date_format', 'Y-m-d'));
    }
}

if (! function_exists('appDateTimeFormat')) {
    function appDateTimeFormat($date)
    {
        if (empty($date)) {
            return null;
        }

        return \Carbon\Carbon::parse($date)->format(config('app.date_format', 'Y-m-d H:i'));
    }
}
