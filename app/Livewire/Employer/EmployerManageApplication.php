<?php

namespace App\Livewire\Employer;

use Exception;
use App\Models\JobPost;
use App\Models\JobType;
use Livewire\Component;
use App\Models\Industry;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

require_once app_path('/Helpers/Flash.php');
class EmployerManageApplication extends Component
{

    use WithPagination;
    public $perPage = 5;

    public $industry, $job_type, $search;

public function resetFilter(){
        $this->reset();
    }

    public function updateStatus($id, $action){
        if(!in_array($action, ['pending', 'approved', 'rejected'])){
            flash('response', [
                'status'=>'error',
                'message' => 'Invalid Action'
            ]);
        }else{
        try{
        $job_application = JobApplication::findOrFail($id);
        $job_application->status = $action;
        $job_application->save();
        flash('response', [
                'status'=>'success',
                'message' => 'Status Updated Successfully'
            ]);
        }catch(Exception $error){
            flash('response', [
                'status'=>'error',
                'message' => 'An Error Occured'
            ]);
        }
    }
    }

    #[On('deleteApplication')]
    public function deleteApplication($id){
        try{
          
            DB::beginTransaction();

            JobApplication::destroy($id);

            DB::commit();

            flash('response', [
                    'status'=>'success',
                    'message' => 'Deleted Successfully'
                ]);
            }catch(Exception $error){
                DB::rollBack();
                flash('response', [
                    'status'=>'error',
                    'message' => 'An Error Occured'
                ]);
            }
    }

    public function render()
    {

        $industries = Industry::all();
        $job_types = JobType::all();
        $query = JobApplication::with('job_post', 'user')->whereHas('job_post', function($query){
            $query->where('company_id', Auth::user()->company_id());
        });

        if($this->industry){
            $query->Where(function($query){
                $query->orWhereHas('job_post', function($query){
                    $query->where('industry_id', $this->industry);
                });
            });
        }

       if($this->search){
        $query->where(function($query){
            $query->Where('name','like',trim('%'.trim($this->search).'%'))
            ->orWhere('email','like',trim('%'.trim($this->search).'%'))
            ->orWhere('status','like',trim('%'.trim($this->search).'%'))
            ->orWhere('phone_number','like',trim('%'.trim($this->search).'%'))
            ->orWhereHas('job_post',
            function($query){
                $query->where('title', 'like',trim('%'.trim($this->search).'%'));
            });
        });
       }

       
       if($this->job_type){
        $query->where(function($query){
            $query->orWhereHas('job_post', function($query){
                $query->where('job_type_id', $this->job_type);
            });
        });
    }

    // dd($this->search, $query->first());
    
    $job_applications = $query->paginate($this->perPage);

        return view('livewire.employer.employer-manage-application', [
            'job_applications' => $job_applications,
            'industries' => $industries,
            'job_types'=> $job_types
        ]);
    }
}
