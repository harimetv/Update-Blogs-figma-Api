<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodyTypes = ['Heavy', 'Athletic', 'Average', 'Slim'];

        foreach ($bodyTypes as $type) {
            BodyType::create(['name' => $type]);
        }
    }
}
