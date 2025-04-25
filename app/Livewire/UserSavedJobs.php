<?php

namespace App\Livewire;

use App\Models\JobPost;
use Livewire\Component;
use App\Models\UserSavedJob;
use Illuminate\Support\Facades\Auth;

class UserSavedJobs extends Component
{
    public $search;

    public function saveJob($id){
       Auth::user()->saved_jobs()->attach($id);
    }

    public function removeJob($id){
        Auth::user()->saved_jobs()->detach($id);
     }

     public function resetSearch(){
        $this->reset(['search']);
     }

    public function render()
    {
        $query = Auth::user()->saved_jobs();

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

        $saved_jobs = $query->paginate(5);

        return view('livewire.user-saved-jobs', [
            'jobs'=>$saved_jobs
        ]);
    }
}
