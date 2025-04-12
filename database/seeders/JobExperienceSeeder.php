<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobExperience;

class JobExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $job_experiences = collect([
            ['name' => 'No Experience'],
            ['name' => 'Less than 1 Year'],
            ['name' => '1-2 Years'],
            ['name' => '3-5 Years'],
            ['name' => '6-10 Years'],
            ['name' => 'More than 10 Years']
        ]);

        $job_experiences->each(function($experience){
            JobExperience::create($experience);
        });
        
    }
}
