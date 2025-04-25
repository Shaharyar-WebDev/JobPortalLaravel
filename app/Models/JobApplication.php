<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    //
    protected $fillable = [
        'user_id',
        'job_post_id',
        'name',
        'email',
        'cv',
        'phone_number'
    ];

    public function job_post(){
        return $this->belongsTo(JobPost::class, 'job_post_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
