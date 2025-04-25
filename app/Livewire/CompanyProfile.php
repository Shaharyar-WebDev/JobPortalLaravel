<?php

namespace App\Livewire;

use Exception;
use App\Helpers\MyFunc;
use App\Models\Company;
use App\Models\JobPost;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\UserSavedJob;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
require_once app_path('/Helpers/Flash.php');

class CompanyProfile extends Component
{

    use WithPagination;

    public $id;

    public $slug;

    
    public function saveJob($id){

        if(Auth::check()){
        try{
            $count = UserSavedJob::where('user_id', Auth::id())->where('job_post_id', $id)->get();

            if(count($count) > 0){
                flash('response', ['status'=>'info','message'=>'Already Saved']);
            }else{

                
                Auth::user()->saved_jobs()->attach($id);
                    flash('response', ['status'=>'success','message'=>'Saved Successfully']);

            }

        
        }catch(Exception $error){
            flash('response', ['status'=>'error','message'=>'An Error Occured']);
        }
    }else{
        flash('response', ['status'=>'info','message'=>'You Need To Log In To Save Jobs']);
    }

    
    }

    public function urlStore($id){
        $job = JobPost::find($id);
        session()->put('redirect_to',route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug]));
        // dd($id, session('redirect_to'));
    }

    public function removeJob($id){
        try{
       
        Auth::user()->saved_jobs()->detach($id);

            flash('response', ['status'=>'success','message'=>'Removed']);
     

    }catch(Exception $error){
        flash('response', ['status'=>'error','message'=>'Error Removing']);
    }

    }
    

    public function render()
    {

        $jobs = JobPost::with('company', 'job_type', 'job_educations', 'job_skills', 'city', 'city_area', 'experience')
        ->whereHas('company' ,function($query){
            $query->where('job_posts_visibility', '!=','hidden');
        })
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
