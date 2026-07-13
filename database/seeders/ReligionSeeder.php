<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->insert([
            ['name' => 'Hindu', 'code' => 'HIN', 'description' => 'Hinduism'],
            ['name' => 'Muslim', 'code' => 'MUS', 'description' => 'Islam'],
            ['name' => 'Christian', 'code' => 'CHR', 'description' => 'Christianity'],
            ['name' => 'Sikh', 'code' => 'SIK', 'description' => 'Sikhism'],
            ['name' => 'Buddhist', 'code' => 'BUD', 'description' => 'Buddhism'],
            ['name' => 'Jain', 'code' => 'JAI', 'description' => 'Jainism'],
        ]);
    }
}
