<?php

namespace Database\Seeders;

use App\Models\GlobalSetting;
use Illuminate\Database\Seeder;

class GlobalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        GlobalSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'My Application',
                'logo' => '/images/logo.png',
                'banner' => '/images/banner.jpg',
                'email' => 'info@example.com',
                'email2' => 'support@example.com',
                'number' => '1234567890',
                'number2' => '0987654321',
                'address' => '123 Main Street, City, Country',
                'facebook_link' => 'https://facebook.com/myapp',
                'twitter_link' => 'https://twitter.com/myapp',
                'instagram_link' => 'https://instagram.com/myapp',
                'linkedin_link' => 'https://linkedin.com/company/myapp',
                'youtube_link' => 'https://youtube.com/myapp',
                'pinterest_link' => 'https://pinterest.com/myapp',
                'tiktok_link' => 'https://tiktok.com/@myapp',
                'meta_title' => 'Welcome to My Application',
                'meta_description' => 'This is a great app for social networking and more.',
                'meta_keywords' => 'social, networking, myapp',
                'favicon' => '/images/favicon.ico',
                'terms_and_conditions' => '/terms-and-conditions',
                'privacy_policy' => '/privacy-policy',
            ]
        );
    }
}
