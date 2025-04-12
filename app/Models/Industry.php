<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\SubIndustry;
use App\Models\JobPost;
class Industry extends Model
{
    //
    public function companies(){
        return $this->hasMany(Company::class);
    }
    public function sub_industries(){
        return $this->hasMany(SubIndustry::class);
    }

    public function job_posts(){
        return $this->hasMany(JobPost::class);
    }
}
