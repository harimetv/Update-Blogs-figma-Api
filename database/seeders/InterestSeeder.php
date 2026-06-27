<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Interest;
class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $interests = [
            'Acting',
            'Print Shoot',
            'Ramp Shows',
            'Designer Shoots',
            'Western Wears',
            'Swim Suits',
            'Calender Shoots',
            'Music Albums',
            'Movie',
            'Webseries',
            'Bold Webseries',
            'TV Serial',
            'Ad',
            'Bikini Shoots',
            'Lingerie Shoots',
            'Full Body Paint Shoots',
            'Semi Nude Shoots',
            'Nude Shoots',
        ];

        foreach ($interests as $interest) {
            Interest::create([
                'name' => $interest,
                'status' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
