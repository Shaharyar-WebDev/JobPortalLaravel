<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cities = collect([
            [
                'name' => 'Karachi'
            ],
            [
                'name' => 'Lahore'
            ],
            [
                'name' => 'Islamabad'
            ]
        ]);

        $cities->each(function($city){
            City::create($city);
        });
    }
}
