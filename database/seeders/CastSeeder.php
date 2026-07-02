<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CastSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('casts')->insert([
            ['name' => 'Brahmin', 'code' => 'BRA', 'description' => 'Priestly class'],
            ['name' => 'Kshatriya', 'code' => 'KSH', 'description' => 'Warrior class'],
            ['name' => 'Vaishya', 'code' => 'VAI', 'description' => 'Merchant class'],
            ['name' => 'Shudra', 'code' => 'SHU', 'description' => 'Labour class'],
            ['name' => 'Yadav', 'code' => 'YAD', 'description' => 'Yaduvanshi community'],
            ['name' => 'Jat', 'code' => 'JAT', 'description' => 'Agricultural community'],
            ['name' => 'Gurjar', 'code' => 'GUR', 'description' => 'Gurjar community'],
            ['name' => 'Scheduled Caste', 'code' => 'SC', 'description' => 'Scheduled Caste'],
            ['name' => 'Scheduled Tribe', 'code' => 'ST', 'description' => 'Scheduled Tribe'],
            ['name' => 'Other Backward Class', 'code' => 'OBC', 'description' => 'OBC category'],
        ]);
    }
}
