<?php

namespace Database\Seeders;

use App\Models\AnnualIncome;
use Illuminate\Database\Seeder;

class AnnualIncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $annualIncomes = [
            'No Income', 'Rs 0-1Lakh', '2-3L', '4-6L', '7-11L',
            '12-18L', '20-26L', '27-36L', '40-60L', '65-1Cr.', '1Cr & Above',
        ];

        foreach ($annualIncomes as $income) {
            AnnualIncome::create(['name' => $income]);
        }
    }
}
