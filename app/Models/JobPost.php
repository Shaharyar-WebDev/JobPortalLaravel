<?php

namespace App\Models;

use App\Models\City;
use App\Models\Skill;
use App\Models\Company;
use App\Models\JobType;
use App\Models\CityArea;
use App\Models\Education;
use App\Models\JobExperience;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    //
    protected $guarded = [];
    
    protected $casts = [
        'custom_educations' => 'array',
        'custom_skills' => 'array'
    ];

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    } 

    public function industry(){
        return $this->belongsTo(Industry::class, 'industry_id');
    }
    public function sub_industry(){
        return $this->belongsTo(SubIndustry::class, 'sub_industry_id');
    }

    public function job_type(){
        return $this->belongsTo(JobType::class, 'job_type_id');
    }
    public function job_educations(){
        return $this->belongsToMany(Education::class, 'job_educations','job_post_id','educations_id');
    }

public function job_skills(){
        return $this->belongsToMany(Skill::class,'job_skills', 'job_post_id', 'skill_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function city_area(){
        return $this->belongsTo(CityArea::class, 'city_area_id');
    }
    
    public function experience(){
        return $this->belongsTo(JobExperience::class, 'job_experience_id');
    }

}
