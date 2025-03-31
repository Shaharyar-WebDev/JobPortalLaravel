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
                'city_id' => 2,
                'name' => 'Raiwind'
            ],
            [
                'city_id' => 1,
                'name' => 'Gulshan'
            ],
            [
                'city_id' => 3,
                'name' => 'Faisal Road'
            ]
        ]);

        $areas->each(function($city){
            CityArea::create($city);
        });
    }
}
