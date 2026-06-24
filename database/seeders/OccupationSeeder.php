<?php

namespace Database\Seeders;

use App\Models\Occupation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OccupationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $occupations = [
            'Civil', 'Government','Public Sector', 'Defence', 'Private', 
            'Agriculture', 'Business', 'Self Employed', 'Student', 'Not working'
        ];
        foreach ($occupations as $occupation) {
            Occupation::create(['name' => $occupation]);
        }
    }
}
