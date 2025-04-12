<?php

namespace App\Livewire;

use App\Models\Company;
use App\Models\JobPost;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Helpers\MyFunc;

class CompanyProfile extends Component
{

    use WithPagination;

    public $id;

    public $slug;

    public function render()
    {

        $jobs = JobPost::with('company', 'job_type', 'job_educations', 'job_skills', 'city', 'city_area', 'experience')
        ->where('company_id', $this->id)
        ->latest()
        ->limit(4)
        ->get();

        $company = Company::with('industry','sub_industry', 'city', 'city_area')->withCount('job_posts')->findOrFail($this->id);

        if(MyFunc::Sexyslug($company->name, time:false) != $this->slug){
            abort(404);
        }

        return view('livewire.company-profile', [
            'company'=>$company,
            'jobs' => $jobs
        ]);
    }
}
