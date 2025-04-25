<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function company(){

        return $this->belongsTo(Company::class, 'company_id');
    }

    public function saved_jobs(){
        return $this->belongsToMany(JobPost::class, 'user_saved_jobs', 'user_id', 'job_post_id');
    }

    public function applications(){
        return $this->belongsToMany(JobPost::class, 'job_applications', 'user_id', 'job_post_id')->withTimestamps()->withPivot([
            'status', 'name', 'email', 'phone_number', 'cv'
        ]);
    }

    public static function hasAppliedTo($job_post_id){
        return JobApplication::where('user_id', Auth::user()->id)->where('job_post_id', $job_post_id)->exists();
    }

    public function company_id(){
        $company = Company::where('user_id', Auth::id())->first();
        return $company->id;
    }

    public static function company_info(){
        $company = Company::where('user_id', Auth::id())->first();
        return $company;
    }

    public static function isRole($role){
        return optional(Auth::user())->role === $role;
    }

       public function job_post()
{
    return $this->belongsTo(JobPost::class, 'job_post_id');
}


}
