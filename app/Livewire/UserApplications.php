<?php

namespace App\Livewire;

use App\Models\JobType;
use Livewire\Component;
use App\Models\Industry;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
require_once app_path('Helpers/Flash.php');
class UserApplications extends Component
{

    public $search;
    public $industry;
    public $job_type;

    use WithPagination;

    #[On('deleteApplication')]
    public function deleteApplication($id){
        Auth::user()->applications()->detach($id);
        flash('response', ['status'=>'success', 'message'=>'Application Withdrawed Successfully']);
    }

    public $perPage = 5;

    public function resetFilters(){
        $this->reset();
    }
    public function render()
    {

        $query = Auth::user()->applications();
        $industries = Industry::all();
        $job_types = JobType::all();

        if ($this->search) {
            $query->where(function($query){
                $query->where('title', 'like', '%' . trim($this->search) . '%')
                ->orWhere('address', 'like', '%' . trim($this->search) . '%')
                ->orWhereHas('company.industry', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orwhereHas('company', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('industry', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('sub_industry', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('city_area', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('city', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhere('job_setting', 'like', '%' . trim($this->search) . '%')
                ->orWhereHas('job_type', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('experience', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('job_educations', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('job_skills', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereJsonContains('custom_skills', $this->search)
                ->orWhereJsonContains('custom_educations', $this->search);
            });
        }

        if($this->industry){
            $query->where('industry_id', $this->industry);
        }

        if($this->job_type){
            $query->where('job_type_id', $this->job_type);
        }

        // dd($query->get());


       $jobs = $query->paginate($this->perPage);
        return view('livewire.user-applications', [
            'jobs' => $jobs,
            'industries' => $industries,
            'job_types' => $job_types
        ]);
    }
}
