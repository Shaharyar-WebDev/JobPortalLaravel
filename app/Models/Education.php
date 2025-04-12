<?php

namespace App\Models;

use App\Models\JobPost;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table = 'educations';

    public function job_post(){
    return $this->belongsToMany(JobPost::class, 'job_educations','educations_id','job_post_id');
    }
}
