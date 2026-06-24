<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $currencies = [
            [
                'code' => 'INR',
                'name' => 'Indian Rupee',
                'symbol' => '₹',
                'rate' => 1.0,
                'country_name' => 'India',
                'iso_code' => 'IN',
                'status' => 1,
                'icon' => 'icons/inr.png'
            ],
            [
                'code' => 'USD',
                'name' => 'US Dollar',
                'symbol' => '$',
                'rate' => 83.0,
                'country_name' => 'United States',
                'iso_code' => 'US',
                'status' => 1,
                'icon' => 'icons/usd.png'
            ],
            [
                'code' => 'EUR',
                'name' => 'Euro',
                'symbol' => '€',
                'rate' => 90.0,
                'country_name' => 'European Union',
                'iso_code' => 'EU',
                'status' => 1,
                'icon' => 'icons/eur.png'
            ],
            [
                'code' => 'GBP',
                'name' => 'British Pound',
                'symbol' => '£',
                'rate' => 105.0,
                'country_name' => 'United Kingdom',
                'iso_code' => 'GB',
                'status' => 1,
                'icon' => 'icons/gbp.png'
            ],
            [
                'code' => 'JPY',
                'name' => 'Japanese Yen',
                'symbol' => '¥',
                'rate' => 0.56,
                'country_name' => 'Japan',
                'iso_code' => 'JP',
                'status' => 1,
                'icon' => 'icons/jpy.png'
            ],
            [
                'code' => 'CNY',
                'name' => 'Chinese Yuan',
                'symbol' => '¥',
                'rate' => 11.4,
                'country_name' => 'China',
                'iso_code' => 'CN',
                'status' => 1,
                'icon' => 'icons/cny.png'
            ],
            [
                'code' => 'AUD',
                'name' => 'Australian Dollar',
                'symbol' => 'A$',
                'rate' => 54.0,
                'country_name' => 'Australia',
                'iso_code' => 'AU',
                'status' => 1,
                'icon' => 'icons/aud.png'
            ],
            [
                'code' => 'CAD',
                'name' => 'Canadian Dollar',
                'symbol' => 'C$',
                'rate' => 61.0,
                'country_name' => 'Canada',
                'iso_code' => 'CA',
                'status' => 1,
                'icon' => 'icons/cad.png'
            ],
            [
                'code' => 'ZAR',
                'name' => 'South African Rand',
                'symbol' => 'R',
                'rate' => 4.4,
                'country_name' => 'South Africa',
                'iso_code' => 'ZA',
                'status' => 1,
                'icon' => 'icons/zar.png'
            ],
            [
                'code' => 'THB',
                'name' => 'Thai Baht',
                'symbol' => '฿',
                'rate' => 2.4,
                'country_name' => 'Thailand',
                'iso_code' => 'TH',
                'status' => 1,
                'icon' => 'icons/thb.png'
            ]
        ];

        foreach ($currencies as $currency) {
            Currency::updateOrCreate(['code' => $currency['code']], $currency);
        }
    }
}
