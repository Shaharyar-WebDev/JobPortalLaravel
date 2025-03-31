<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\CitySeeder;
use App\Models\JobPostingDuration;
use Database\Seeders\CompanySeeder;
use Database\Seeders\CityAreaSeeder;
use Database\Seeders\IndustrySeeder;
use Database\Seeders\JobPostingDurationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CitySeeder::class,
            CityAreaSeeder::class,
            IndustrySeeder::class,
            JobPostingDurationSeeder::class,
            CompanySeeder::class,
        ]);
    }
}
