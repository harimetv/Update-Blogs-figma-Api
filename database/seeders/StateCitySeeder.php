<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class StateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Importing City database...');
        // Ensure the country is created or fetched
        $country = Country::firstOrCreate(['name' => 'INDIA']);
        $cities = config('city-state-india');

        foreach ($cities as $key => $city_row) {
            if ($key % 100 == 0) {
                $this->command->info('Total Cities: ' . count($cities) . " / Imported: " . ($key + 1));
            }

            $cityName = $city_row['city_name'];
            $stateName = $city_row['city_state'];

            // Create or update the state
            $state = State::updateOrCreate(
                ['name' => $stateName, 'country_id' => $country->id]
            );

            // Create or update the city
            City::updateOrCreate(
                ['name' => $cityName, 'state_id' => $state->id], // Conditions to find the record
                ['country_id' => $country->id]// Values to update or create
            );
        }

        $this->command->info('Total Cities: ' . count($cities) . " / Imported: " . count($cities));
    }
}
