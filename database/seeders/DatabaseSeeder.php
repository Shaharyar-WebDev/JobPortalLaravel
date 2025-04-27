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
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $users = collect([
            [
                'name' => 'Shaharyar',
                'email' => 'ahmedshaharyar00@gmail.com',
                'password' => '12345678',
                'role' => 'employer',
                // 'city_id' => 1
            ],
            [
                'name' => 'Amir',
                'email' => 'meeramirali99@gmail.com',
                'password' => '12345678',
                'role' => 'employer',
                // 'city_id' => 2

            ],
            [
                'name' => 'Sharjeel',
                'email' => 'shaharyar.devworks@gmail.com',
                'password' => '12345678',
                'role' => 'employer',
                // 'city_id' => 3

            ],
        ]);
        
        // DB::table('users')->truncate();

        // $users->each(function($user){

        //     User::factory()->create($user);
        // });
      

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
