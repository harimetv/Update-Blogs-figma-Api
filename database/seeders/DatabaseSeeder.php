<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            // RoleSeeder::class,
            // PermissionSeeder::class,
            // RolePermissionSeeder::class,
            CategorySeeder::class,
            // UserSeeder::class,
            SkillCategorySeeder::class,
            IndustrySeeder::class,
            StudySeeder::class,
            SocialMediaCategorySeeder::class,
            // StateCitySeeder::class,
            // CountryStateCitySeeder::class,
            // MailTemplatesSeeder::class,
            // PaymentGatewaysSeeder::class,
            // PlanSeeder::class,
            // CurrencySeeder::class,
            ComfortableSeeder::class,
            HobbySeeder::class,
            LanguageSeeder::class,
            // ReactionSeeder::class,
            // NotificationTypeSeeder::class,
            // PostSeeder::class,
        ]);
    }
}
