<?php

namespace App\Livewire;

use App\Models\JobPost;
use Livewire\Component;

class Job extends Component
{
    public $id;

    public $slug;
    public function render()
    {

       
      
        $job = JobPost::with('company', 'job_type', 'job_educations', 'job_skills', 'city', 'city_area', 'experience')->findOrFail($this->id);

        if($this->slug != $job->slug){
            abort(404);
        }

        $related_jobs = JobPost::with(
            'company',
            'job_type',
            'job_educations',
            'job_skills',
            'city',
            'city_area',
            'experience'
        )->where('id', '!=', $this->id)
            ->where(function ($query) use ($job) {
                $query->where('industry_id', $job->industry_id)
                    ->orWhere('city_id', $job->city_id)
                    ->orWhere('job_type_id', $job->job_type_id)
                    ->orWhere('min_salary', '>=', $job->min_salary)
                    ->orWhere('job_setting', $job->job_setting)
                    ->orWhereHas('job_skills', function ($query) use ($job) {
                        $query->whereIn('skill_id', $job->job_skills->pluck('skill_id'));
                    });
            })->latest()->limit(5)->get();

        return view('livewire.job',[
            'job' => $job,
            'related_jobs' => $related_jobs
        ]);
    }
}
