<?php
namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Throwable;

class CountryStateCitySeeder extends Seeder
{
    public function run(): void
    {
        DB::disableQueryLog();
        ini_set('memory_limit', '1024M');

        $this->command->info('🌍 Importing countries, states & cities...');

        try {
            // ----------------------------
            // 1️⃣ Load JSON (arrays only)
            // ----------------------------
            $countries = json_decode(File::get(config_path('countries.json')), true);
            $statesRaw = json_decode(File::get(config_path('states.json')), true);
            $citiesRaw = json_decode(File::get(config_path('cities.json')), true);

            // ----------------------------
            // 2️⃣ Build INDEX MAPS (ONCE)
            // ----------------------------
            $statesByCountry = [];
            foreach ($statesRaw as $state) {
                $statesByCountry[$state['country_id']][] = $state;
            }
            unset($statesRaw);

            $citiesByState = [];
            foreach ($citiesRaw as $city) {
                $citiesByState[$city['state_id']][] = $city;
            }
            unset($citiesRaw);

            gc_collect_cycles();

            // ----------------------------
            // 3️⃣ Process countries
            // ----------------------------
            foreach (array_chunk($countries, 5) as $chunkIndex => $countryChunk) {
                $this->command->info("🚀 Country chunk #" . ($chunkIndex + 1));

                foreach ($countryChunk as $country) {
                    try {
                        $this->command->info("🟢 {$country['name']}");

                        $timeZone = $country['timezones'][0]['zoneName'] ?? 'Asia/Kolkata';

                        // COUNTRY
                        $countryModel = Country::updateOrCreate(
                            ['name' => $country['name']],
                            [
                                'iso'             => $country['iso3'] ?? null,
                                'phonecode'       => $country['phonecode'] ?? null,
                                'capital'         => $country['capital'] ?? null,
                                'currency'        => $country['currency'] ?? null,
                                'currency_name'   => $country['currency_name'] ?? null,
                                'currency_symbol' => $country['currency_symbol'] ?? null,
                                'nationality'     => $country['nationality'] ?? null,
                                'latitude'        => $country['latitude'] ?? null,
                                'longitude'       => $country['longitude'] ?? null,
                                'emoji'           => $country['emoji'] ?? null,
                                'time_zone'       => $timeZone,
                            ]
                        );

                        // STATES (DIRECT ACCESS)
                        $states = $statesByCountry[$country['id']] ?? [];

                        foreach ($states as $state) {
                            $stateModel = State::updateOrCreate(
                                [
                                    'name'       => $state['name'],
                                    'country_id' => $countryModel->id,
                                ],
                                [
                                    'state_code' => $state['state_code'] ?? null,
                                    'latitude'   => $state['latitude'] ?? null,
                                    'longitude'  => $state['longitude'] ?? null,
                                ]
                            );

                            // CITIES (DIRECT ACCESS)
                            $cities = $citiesByState[$state['id']] ?? [];

                            foreach (array_chunk($cities, 500) as $cityChunk) {
                                foreach ($cityChunk as $city) {
                                    City::updateOrCreate(
                                        [
                                            'name'     => $city['name'],
                                            'state_id' => $stateModel->id,
                                        ],
                                        [
                                            'latitude'  => $city['latitude'] ?? null,
                                            'longitude' => $city['longitude'] ?? null,
                                        ]
                                    );
                                }
                            }
                        }

                    } catch (Throwable $e) {
                        Log::error('Country Import Failed', [
                            'country' => $country['name'] ?? 'unknown',
                            'message' => $e->getMessage(),
                        ]);
                        $this->command->error("❌ {$country['name']} failed");
                    }
                }
            }

            $this->command->info('✅ Import completed successfully');

        } catch (Throwable $e) {
            Log::critical('Seeder Fatal Error', [
                'message' => $e->getMessage(),
            ]);

            $this->command->error('❌ Seeder crashed. Check logs.');
        }
    }
}
