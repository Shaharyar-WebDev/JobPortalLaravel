<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JobSkill;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CitySeeder;
use Database\Seeders\CompanySeeder;
use Database\Seeders\JobPostSeeder;
use Database\Seeders\CityAreaSeeder;
use Database\Seeders\IndustrySeeder;
use Database\Seeders\JobSkillSeeder;
use Database\Seeders\SubIndustrySeeder;
use Database\Seeders\JobEducationSeeder;
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
            SubIndustrySeeder::class,
            JobPostingDurationSeeder::class,
            CompanySeeder::class,
            EducationSeeder::class,
            JobTypesSeeder::class,
            JobExperienceSeeder::class,
            SkillSeeder::class,
            CompanyLocationSeeder::class,
            JobPostSeeder::class,
            JobEducationSeeder::class,
            JobSkillSeeder::class
        ]);
    }
}
