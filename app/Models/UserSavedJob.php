<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSavedJob extends Model
{
    protected $fillable = [
        'user_id', 'job_post_id'
    ];

    public function job_posts()
{
    return $this->belongsTo(JobPost::class, 'job_post_id');
}

}
