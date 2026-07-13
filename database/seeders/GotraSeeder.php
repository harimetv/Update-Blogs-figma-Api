<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GotraSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('gotras')->insert([
            ['name' => 'Kashyap', 'code' => 'KAS', 'description' => 'Descendant of sage Kashyap'],
            ['name' => 'Bharadwaj', 'code' => 'BHA', 'description' => 'Descendant of sage Bharadwaj'],
            ['name' => 'Gautam', 'code' => 'GAU', 'description' => 'Descendant of sage Gautam'],
            ['name' => 'Atri', 'code' => 'ATR', 'description' => 'Descendant of sage Atri'],
            ['name' => 'Vashishtha', 'code' => 'VAS', 'description' => 'Descendant of sage Vashishtha'],
            ['name' => 'Vishwamitra', 'code' => 'VIS', 'description' => 'Descendant of sage Vishwamitra'],
            ['name' => 'Jamadagni', 'code' => 'JAM', 'description' => 'Descendant of sage Jamadagni'],
            ['name' => 'Agastya', 'code' => 'AGA', 'description' => 'Descendant of sage Agastya'],
            ['name' => 'Kaushik', 'code' => 'KAU', 'description' => 'Descendant of sage Kaushik'],
            ['name' => 'Parashar', 'code' => 'PAR', 'description' => 'Descendant of sage Parashar'],
            ['name' => 'Shandilya', 'code' => 'SHA', 'description' => 'Descendant of sage Shandilya'],
            ['name' => 'Vatsa', 'code' => 'VAT', 'description' => 'Descendant of sage Vatsa'],
        ]);
    }
}
