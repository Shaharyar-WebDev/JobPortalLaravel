<?php

namespace Database\Seeders;

use App\Models\CityArea;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CityAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $areas = collect([
            [
                'city_id' => 1,
                'name' => 'Landhi'
            ],
            [
                'city_id' => 1,
                'name' => 'Malir'
            ],
            [
                'city_id' => 1,
                'name' => 'Defence'
            ],
            [
                'city_id' => 1,
                'name' => 'Gulshan'
            ],
            [
                'city_id' => 2,
                'name' => 'Centauras'
            ],
            [
                'city_id' => 2,
                'name' => 'Faisal RD'
            ],
            [
                'city_id' => 2,
                'name' => 'Lal Qila'
            ],
            [
                'city_id' => 2,
                'name' => 'Badshahi Mosque'
            ],
            [
                'city_id' => 3,
                'name' => 'Burger Rd'
            ],
            [
                'city_id' => 3,
                'name' => 'Astethic Road'
            ],
            [
                'city_id' => 3,
                'name' => 'Parliament'
            ],
            [
                'city_id' => 3,
                'name' => 'LaWhore'
            ]
        ]);

        $areas->each(function($city){
            CityArea::create($city);
        });
    }
}
