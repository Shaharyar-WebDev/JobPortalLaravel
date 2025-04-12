<?php

namespace App\Models;

use App\Models\JobPost;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function job_posts(){

        return $this->belongsToMany(JobPost::class, 'job_skills', 'skill_id', 'job_post_id');

    }
}
