<?php

namespace Database\Seeders;

use App\Models\EmploymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employmentTypes = ['FULL TIME', 'PART TIME', 'SELF EMPLOYED', 'FREELANCE', 'CONTRACT', 'INTERNSHIP', 'VOLUNTEER'];

        foreach ($employmentTypes as $type) {
            EmploymentType::create(['name' => $type]);
        }
    }
}
