<?php

namespace Database\Seeders;

use App\Models\Complexion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComplexionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $complexions = ['Dark', 'Wheatish Brown', 'Wheatish', 'Fair', 'Very Fair'];

        foreach ($complexions as $complexion) {
            Complexion::create(['name' => $complexion]);
        }
    }
}
