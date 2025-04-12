<?php

namespace Database\Seeders;

use App\Models\CompanyLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $company_locations = collect([
        //     [   
        //        'company_id' => 1, 
        //        'city_id' => 1,
        //        'city_area_id' => 3,
        //        'address' => 'Boulveyars, Dfnce',
        //        'branch_name' => 'Main Branch'
        //     ],
        //     [   
        //         'company_id' => 1, 
        //         'city_id' => 1,
        //         'city_area_id' => 2,
        //         'address' => '2Boulveyars, KRNGI',
        //         'branch_name' => 'Branch 2'
        //      ],
        //     [   
        //         'company_id' => 2, 
        //         'city_id' => 2,
        //         'city_area_id' => 4,
        //         'address' => 'Rwnd, LHR',
        //         'branch_name' => 'Main Branch'
        //     ],
        //     [   
        //         'company_id' => 2, 
        //         'city_id' => 2,
        //         'city_area_id' => 4,
        //         'address' => 'Rwnd, LHR',
        //         'branch_name' => 'Branch 2'
        //     ],
        //     [   
        //         'company_id' => 3, 
        //         'city_id' => 3,
        //         'city_area_id' => 6,
        //         'address' => 'Faisal RD',
        //         'branch_name' => 'Main Branch'
        //     ],
        //     [   
        //         'company_id' => 3, 
        //         'city_id' => 3,
        //         'city_area_id' => 6,
        //         'address' => 'Faisal 2RD',
        //         'branch_name' => 'Branch 3'
        //     ]
        // ]);
        // $company_locations->each(function($company_location){
        //     CompanyLocation::create($company_location);
        // });
    }
}
