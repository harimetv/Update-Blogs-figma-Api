<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    public function run(): void
    {
        // 1. Array define karo
        $studies = [
            [
                'title' => 'Introduction to Laravel',
                'description' => 'A beginner study on Laravel framework basics.',
            ],
            [
                'title' => 'Database Optimization',
                'description' => 'Exploring indexing and query performance.',
            ],
            [
                'title' => 'User Experience Research',
                'description' => 'Gathering feedback on the new UI design.',
            ],
            [
                'title' => 'Advanced PHP Techniques',
                'description' => 'Deep dive into PHP 8 features.',
            ],
        ];

        // 2. Loop karke updateOrCreate use karo
        foreach ($studies as $studyData) {
            Study::updateOrCreate(
                // Pehla array: condition (kis basis pe check karna hai)
                ['title' => $studyData['title']],
                // Dusra array: update/create karne ke liye data
                ['description' => $studyData['description']]
            );
        }

        // (Optional) Success message
        $this->command->info('Studies seeded successfully!');
    }
}
