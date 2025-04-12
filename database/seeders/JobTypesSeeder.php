<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $job_types = collect($jobTypes = [
            ['name' => 'Full Time'],
            ['name' => 'Part Time'],
            ['name' => 'Contract'],
            ['name' => 'Internship'],
            ['name' => 'Freelance'],
            ['name' => 'Temporary'],
            ['name' => 'Volunteer'],
            ['name' => 'Apprenticeship']
        ]);

        $job_types->each(function($type){
            JobType::create($type);
        });
    }
}
