<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sports = [
            'Cricket', 'Football', 'Volleyball', 'Bowling', 'Chess', 'Jogging', 'Yoga', 'Martial Arts', 
            'Hockey', 'Walking', 'Swimming / Water Sports', 'Rugby', 'Baseball', 'Badminton', 
            'Table-tennis', 'Squash', 'Tennis', 'Basketball', 'Golf', 'Weight training', 'Aerobics', 
            'Card Game', 'Scrabble', 'Carrom', 'Billiards / Snooker / Pool'
        ];

        foreach ($sports as $sport) {
            \App\Models\Sport::create(['name' => $sport]);
        }
    }
}
