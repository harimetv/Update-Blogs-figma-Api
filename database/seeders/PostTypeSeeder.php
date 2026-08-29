<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostType;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostType::insert([
            [
                'name' => 'Blog',
                'slug' => 'blog',
                'status' => true,
            ],
            [
                'name' => 'News',
                'slug' => 'news',
                'status' => true,
            ],
            [
                'name' => 'Reels',
                'slug' => 'reels',
                'status' => true,
            ],
            [
                'name' => 'Video',
                'slug' => 'video',
                'status' => true,
            ],
        ]);

    }
}
