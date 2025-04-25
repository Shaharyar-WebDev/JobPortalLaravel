<?php

namespace App\Livewire\Employer;

use App\Models\City;
use App\Models\Skill;
use App\Helpers\MyFunc;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobType;
use Livewire\Component;
use App\Models\CityArea;
use App\Models\Industry;
use App\Models\Education;
use App\Models\SubIndustry;
use Livewire\Attributes\On;
use App\Models\JobExperience;
use App\Models\JobCustomSkill;
use Exception;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
require_once app_path('Helpers/Flash.php');

class EmployerJobsAdd extends Component
{

    public $job_title, $job_type_id, $job_setting, $city_id, $city_area_id, $address, $min_salary, $max_salary, $industry_id, $sub_industry_id, $description,$experience_id, $apply_before, $urgently_hiring;
    public array $selected_skills = [];

    public array  $selected_educations = [];

    public array $custom_skills = [];

    public array $custom_educations = [];

    #[On('SelectedSkills')]
    public function Skills($values){
        $this->selected_skills = $values;
    }

    #[on('CustomSkills')]
    public function CustomSkills($values){
        $this->custom_skills = $values;
    }

    #[on('SelectedEducations')]
    public function SelectedEducations($values){
        $this->selected_educations = $values;
    }

    #[on('CustomEducations')]
    public function CustomEducations($values){
        $this->custom_educations = $values;
    }

    #[on('DescriptionUpdate')]
    public function DescriptionUpdate($value){
        $this->description = $value;
    }

    public function saveJob(){

        $this->validate([
            'job_title' => 'required|string|min:3|max:255',
            'job_type_id' => 'required|integer',
            'job_setting' => 'required|string',
            'city_id' => 'required|integer|exists:cities,id',
            'city_area_id' => 'required|nullable|integer|exists:city_areas,id',
            'address' => 'required|string|max:255',
            'description' => 'required',
            'min_salary' => '|required|numeric|min:0',
            'max_salary' => '|required|numeric|gte:min_salary',
            'industry_id' => 'required|integer|exists:industries,id',
            'sub_industry_id' => 'required|nullable|integer|exists:sub_industries,id',
            'experience_id' => 'required|integer',
            'apply_before' => 'required|date|after:today',
        ]);
        try{
        DB::beginTransaction();


        $company = Company::where('user_id',  Auth::id())->first();
        // dd($this);
        $job = JobPost::create([
            'company_id' =>  $company->id,
            'title' => $this->job_title,
            'slug' => MyFunc::sexySlug([$this->job_title, $company->name ]),
            'description' => $this->description,
            'city_id' => $this->city_id,
            'city_area_id' => $this->city_area_id,
            'address' => $this->address,
            'job_setting' => $this->job_setting,
            'industry_id' => $this->industry_id,
            'sub_industry_id' => $this->sub_industry_id,
            'job_type_id' => $this->job_type_id,
            'job_experience_id' => $this->experience_id,
            'min_salary' => $this->min_salary,
            'max_salary' => $this->max_salary,
            'apply_before' => $this->apply_before,
            'urgently_hiring' => $this->urgently_hiring
        ]);

        if($this->selected_skills){
          $job->job_skills()->sync($this->selected_skills);
        }
        if($this->selected_educations){
            // dd($this->selected_educations);
            $job->job_educations()->sync($this->selected_educations);
          }
        if($this->custom_skills){
          $job->custom_skills = $this->custom_skills;
        }
        if($this->custom_educations){
            $job->custom_educations = $this->custom_educations;
        }

        $job->save();

        DB::commit();

        $this->redirect(route('employer.jobs-add'), navigate:true);        
        flash('response', [
            'status' => 'success',
            'message' => 'Job Posted Successfully'
        ]);
        $this->reset();
    }catch(Exception $error){
        DB::rollBack();
        flash('response', [
            'status' => 'error',
            'message' => 'An Error Occured While Posting Job', 
        ]);
    }

    }

    public function UpdatedCityId(){
$this->reset(['city_area_id']);
    }

    public function  UpdatedIndustryId(){
        $this->reset(['sub_industry_id']);
    }

    public function ResetRequirements(){
        $this->reset(['selected_educations', 'custom_educations', 'custom_skills', 'selected_skills']);
    }
    public function render()
    {

        $city_areas = null;
        $sub_industries = null;
        
        if($this->city_id){
            $city_areas = CityArea::where('city_id', $this->city_id)->get();
        }

        if($this->industry_id){
            $sub_industries = SubIndustry::where('industry_id', $this->industry_id)->get(); 
        }

        $job_types = JobType::all();
        $cities = City::all();
        $industries = Industry::all();
        $experiences = JobExperience::all();
        $educations = Education::all();
        $skills = Skill::all();

        return view('livewire.employer.employer-jobs-add', [
            'job_types' => $job_types,
            'cities' => $cities,
            'city_areas' => $city_areas,
            'industries' => $industries,
            'sub_industries' => $sub_industries,
            'experiences' => $experiences,
            'educations' => $educations,
            'skills' => $skills,
        ]);
    }
}
