<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main industries
        $mainIndustries = [
            [
                'name' => 'Technology',
                'is_active' => true,
            ],
            [
                'name' => 'Healthcare',
                'is_active' => true,
            ],
            [
                'name' => 'Finance',
                'is_active' => true,
            ],
            [
                'name' => 'Retail',
                'is_active' => true,
            ],
            [
                'name' => 'Manufacturing',
                'is_active' => true,
            ],
            [
                'name' => 'Software Development',
                'is_active' => true,
            ],
            [
                'name' => 'IT Services',
                'is_active' => true,
            ],
            [
                'name' => 'Hardware',
                'is_active' => true,
            ],
            [
                'name' => 'Pharmaceuticals',
                'is_active' => true,
            ],
            [
                'name' => 'Medical Devices',
                'is_active' => true,
            ],
            [
                'name' => 'Healthcare Services',
                'is_active' => true,
            ],
        ];

        foreach ($mainIndustries as $industryData) {
            Industry::create($industryData);
        }
    }
}
