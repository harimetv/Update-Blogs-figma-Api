<?php

namespace Database\Seeders;

use App\Models\SocialMediaCategory;
use Illuminate\Database\Seeder;

class SocialMediaCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialMedia = [
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'youtube' => 'YouTube',
            'linkedin' => 'LinkedIn',
            'whatsapp' => 'WhatsApp',
            'telegram' => 'Telegram',
            'snapchat' => 'SnapChat',
            'pinterest' => 'Pinterest',
            'tiktok' => 'TikTok',
            'reddit' => 'Reddit',
            'discord' => 'Discord',
            'twitch' => 'Twitch',
            'wechat' => 'WeChat',
            'signal' => 'Signal',
            'threads' => 'Threads',
        ];

        foreach ($socialMedia as $slug => $name) {
            SocialMediaCategory::updateOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'status' => true,   // Default active
                    'image' => null,    // Aap chahe toh yahan 'social-media/'.$slug.'.png' bhi daal sakte ho
                ]
            );
        }

        $this->command->info('Social Media Categories seeded/updated successfully!');
    }
}
