<?php

namespace Database\Seeders;

use App\Models\Cuisine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CuisineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cuisines = [
            'Fast-food', 'Arabic', 'Moghlai', 'Italian', 'Thai', 'Sushi', 'Mexican', 'Lebanese', 
            'Latin American', 'Spanish', 'South Indian', 'Punjabi', 'Gujarati', 'Rajasthani', 
            'Bengali', 'Konkan', 'Chinese', 'Continental'
        ];

        foreach ($cuisines as $cuisine) {
            Cuisine::create(['name' => $cuisine]);
        }
    }
}
