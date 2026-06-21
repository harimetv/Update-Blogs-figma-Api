<?php

namespace Database\Seeders;

use App\Models\Comfortable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComfortableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comfortableItems = [
            'Kiss',
            'Smooch',
            'Love making',
            'Indian wear',
            'Western',
            'Shorts',
            'Bikini',
            'Bold Scenes',
            'Bed Scenes',
            'Topless',
            'Nude',
            'Compro or Adjustment',
            'Able to work indoor & outdoor',
        ];

        foreach ($comfortableItems as $item) {
            Comfortable::create([
                'name' => $item,
            ]);
        }
    }
}
