<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $educations = collect([
            ['name' => 'No Formal Education'],
            ['name' => 'High School Diploma'],
            ['name' => 'Associate Degree'],
            ['name' => 'Bachelor’s Degree'],
            ['name' => 'Master’s Degree'],
            ['name' => 'Doctorate (PhD)'],
            ['name' => 'Professional Certification']
        ]);

        $educations->each(function($education){
            Education::create($education);
        });

    }
}
