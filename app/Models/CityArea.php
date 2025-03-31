<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;
class CityArea extends Model
{
    //
    public function city_area(){

        return $this->belongsTo(City::class,'city_id');

    }
}
