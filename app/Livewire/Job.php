<?php

namespace App\Livewire;

use Exception;
use App\Models\JobPost;
use Livewire\Component;
use App\Models\UserSavedJob;
use Illuminate\Support\Facades\Auth;
require_once app_path('/Helpers/Flash.php');

class Job extends Component
{
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
    public function removeJob($id){
        try{
       
        Auth::user()->saved_jobs()->detach($id);

            flash('response', ['status'=>'success','message'=>'Removed']);
     

    }catch(Exception $error){
        flash('response', ['status'=>'error','message'=>'Error Removing']);
    }

    }
    
    public function urlStore($id){
        $job = JobPost::find($id);
        session()->put('redirect_to',route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug]));
        // dd($id, session('redirect_to'));
    }

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
        )
        ->whereHas('company' ,function($query){
            $query->where('job_posts_visibility', '!=','hidden');
        })
        ->where('id', '!=', $this->id)
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
