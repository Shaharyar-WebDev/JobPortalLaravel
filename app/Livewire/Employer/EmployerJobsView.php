<?php

namespace App\Livewire\Employer;

use Exception;
use App\Models\User;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobType;
use Livewire\Component;
use App\Models\Industry;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
require_once app_path('Helpers/Flash.php');

class EmployerJobsView extends Component
{
    use WithPagination;

    public $perPage = 5;

    public $search;
    public $industry_id;
    public $job_type;

    public $delete_id;
    
    public function resetFilters(){
        $this->reset();
    }

#[On('deleteJob')]
    public function deleteJob($id){
        try{
            DB::beginTransaction();
            
        JobPost::destroy($id);

        DB::commit();
        flash('response', ['status'=>'success', 'message'=>'Deleted Successfully']);
        }catch(Exception $error){
            DB::rollBack();
            flash('response', ['status'=>'error', 'message'=>'An Error Occured']);
        }
    }

    public function render()
    {
        $industries = Industry::all();
        $job_types = JobType::all();

        $company = Company::where('user_id', Auth::id())->first();
        $query = JobPost::with('job_type', 'city', 'city_area', 'industry','job_application')->where('company_id', $company->id);

        if($this->search){
            $query->where('title', 'like', '%'.trim($this->search).'%');
        }

        
        if($this->industry_id){
            $query->where('industry_id', 'like', '%'.$this->industry_id.'%');
        }


        
        if($this->job_type){
            $query->where('job_type_id', 'like', '%'.$this->job_type.'%');
        }


       $jobs = $query->paginate($this->perPage);

    return view('livewire.employer.employer-jobs-view', [
            'jobs' => $jobs,
            'industries' => $industries,
            'job_types' => $job_types,
        ]);
    }
}
