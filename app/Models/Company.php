<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Industry;
use App\Models\City;
use App\Models\CityArea;

class Company extends Model
{

    protected $fillable = [
        'name'
    ];
    //
    public function industry(){

        return $this->belongsTo(Industry::class, 'industry_id');

    }
    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function city_area(){
        return $this->belongsTo(CityArea::class, 'city_area_id');
    }

    public function sub_industry(){
        return $this->belongsTo(SubIndustry::class, 'sub_industry_id');
    }

    public function job_posts(){
        return $this->hasMany(JobPost::class);
    }

}
