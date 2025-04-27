<?php

namespace App\Livewire;

use Exception;
use App\Models\City;
use App\Models\Company;
use App\Models\JobPost;
use Livewire\Component;
use App\Models\Industry;
use App\Models\UserSavedJob;
use Illuminate\Support\Facades\Auth;
require_once app_path('/Helpers/Flash.php');
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

        $cities = City::all();
        
        $industries = Industry::with('job_posts')
        ->withCount(['companies','sub_industries','job_posts'])
            ->orderBy('job_posts_count', 'desc')
            ->limit(4)
            ->get();

        $companies = Company::with('industry', 'sub_industry', 'city', 'city_area')
            ->withCount('job_posts')
            ->orderBy('job_posts_count', 'desc')
            ->limit(4)
            ->get();

        $jobs = JobPost::with('company', 'job_type', 'job_educations', 'job_skills', 'city', 'city_area', 'experience')->whereHas('company' ,function($query){
            $query->where('job_posts_visibility', '!=','hidden');
        })->
        where(function($query){
            $query->where('created_at', '>=', now()->subDays(7))
            ->orWhere('urgently_hiring', 1);
        })->
        limit(4)
        ->get();

        return view('livewire.home', [
            'cities' => $cities,
            'industries' => $industries,
            'companies' => $companies,
            'jobs' => $jobs,
            'jobs_count' => JobPost::all()->count()
        ]);
    }
}
