<?php

namespace App\Livewire\Employer;

use Exception;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobType;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\JobApplication;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
require_once app_path('/Helpers/Flash.php');
class EmployerDashboard extends Component
{

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
    
    public function refresh(){
        $this->reset();
    }

    public function render()
    {

        $job_types = JobType::all(); 
        $jobs = JobPost::where('company_id', Auth::user()->company_id());
        $job_applications = JobApplication::with('job_post', 'user')->whereHas('job_post', function($query){
            $query->where('company_id', Auth::user()->company_id());
        });

        $statusCounts = DB::table('job_applications')
    ->select('status', DB::raw('COUNT(*) as count'))
    ->groupBy('status')
    ->get();

    $applications = DB::table('job_applications')
    ->join('job_posts', 'job_applications.job_post_id', '=', 'job_posts.id')
    ->where('job_posts.company_id', Auth::user()->company_id())
    ->whereYear('job_applications.created_at', date('Y'))
    ->select(
        DB::raw('COUNT(*) as count'),
        DB::raw('MONTHNAME(job_applications.created_at) as month_name')
    )
    ->groupBy(DB::raw('MONTHNAME(job_applications.created_at)'))
    ->pluck('count', 'month_name');

    // dd($statusCounts);

        return view('livewire.employer.employer-dashboard', [
            'job_types' => $job_types,
            'jobs' => $jobs,
            'job_applications' => $job_applications,
            'all_job_applications' => $job_applications->orderBy('created_at', 'DESC')->limit(5)->get(),
            'applications' => $applications,
            'statusCounts' => $statusCounts

        ]);
    }
}
