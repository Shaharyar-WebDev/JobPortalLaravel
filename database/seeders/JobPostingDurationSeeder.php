<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobPostingDuration;

class JobPostingDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $postings = collect([
            ['duration' => 7],
            ['duration' => 15],
            ['duration' => 30]
        ]);

        $postings->each(function($posting){
            JobPostingDuration::create($posting);
        });


    }
}
