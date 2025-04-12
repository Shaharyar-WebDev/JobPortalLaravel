<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\JobPost;
use Livewire\Component;
use App\Models\Industry;

class Home extends Component
{
    public $search;

    public $city;

    public $industry;

    public function goToJobs(){

        $this->redirect(route('jobs',[
            'search' => $this->search,
            'city' => $this->city,
            'industry' =>  $this->industry,
        ]), navigate:true);

    }
    public function render()
    {

        $cities = City::all();
        
        $industries = Industry::with('job_posts')
            ->withCount('job_posts')
            ->orderBy('job_posts_count', 'desc')
            ->limit(4)
            ->get();

        $companies = Company::with('industry', 'sub_industry', 'city', 'city_area')
            ->withCount('job_posts')
            ->orderBy('job_posts_count', 'desc')
            ->limit(4)
            ->get();

        $jobs = JobPost::with('company', 'job_type', 'job_educations', 'job_skills', 'city', 'city_area', 'experience')
            ->where('created_at', '>=', now()->subDays(7))
            ->orWhere('urgently_hiring', 1)
            ->limit(4)
            ->get();

        return view('livewire.home', [
            'cities' => $cities,
            'industries' => $industries,
            'companies' => $companies,
            'jobs' => $jobs,
        ]);
    }
}
