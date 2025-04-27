<?php

namespace App\Livewire\Employer;

use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\Company;
use App\Models\JobType;
use Livewire\Component;
use App\Models\CityArea;
use App\Models\Industry;
use App\Models\SubIndustry;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

require_once app_path('Helpers/Flash.php');

class EmployerProfile extends Component
{
    use WithFileUploads;
    
    public $editing = false;

    public $company,$public_listings, $name, $image, $description, $industry, $sub_industry, $valuation, $city, $city_area, $address, $email, $contact, $website, $github, $linkedin, $company_size, $jobs_visibility;

    public $user, $user_name, $phone_number, $user_email, $password;

    public $sub_industries, $city_areas, $industry_id, $city_id;
    public $profile_img;
    public function mount(){
        $this->company = User::company_info();
        $this->user = User::findOrFail(Auth::id());
        $this->image = $this->company->image;
        $this->name = $this->company->name;
        $this->description = $this->company->description;
        $this->industry = $this->company->industry_id;
        $this->sub_industry = $this->company->sub_industry_id;
        $this->valuation = $this->company->valuation;
        $this->city = $this->company->city_id;
        $this->city_area = $this->company->city_area_id;
        $this->address = $this->company->address;
        $this->email = $this->company->email;
        $this->contact = $this->company->contact;
        $this->website = $this->company->website;
        $this->company_size = $this->company->company_size;
        $this->user_name = $this->user->name;
        $this->phone_number = $this->user->phone_number;
        $this->user_email = $this->user->email;
        $this->github = $this->user->github;
        $this->linkedin = $this->user->linkedin;
        $this->sub_industries = SubIndustry::where('industry_id', $this->company->industry_id)->get();
        $this->public_listings = $this->company->job_posts_visibility;

        $this->city_areas = CityArea::where('city_id', $this->company->city_id)->get();
    }

    public function updatedProfileImg(){

                $this->validate([
                    'profile_img' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048'
                ]);
        
            }

            public function resetImage(){
                        $this->reset(['profile_img']);
        }

        public function updateImage(){
   
                    $this->validate([
                        'profile_img' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048'
                    ]);
            
                    try{
                        DB::beginTransaction();
            
                    $img_name = $this->profile_img->getClientOriginalName();
            
                    $this->profile_img->storeAs('images/companies', $img_name, 'public');
            
                    $company = Company::findOrFail(Auth::user()->company_id());
                    $company->image = $img_name;
                    $company->save();
            
                    DB::commit();
            
                    $this->reset(['profile_img']);
            
                    flash('response', [
                        'status' => 'success',
                        'message' => 'Profile Image Updated'
                    ]);
            
                    }catch(Exception $error){
            
                        DB::rollBack();
            
                        flash('response', [
                            'status' => 'error',
                            'message' => 'An Error Ocurred'
                        ]);
            
                    }
                }

public function edit(){
    $this->editing = !$this->editing;
}


#[On('DescriptionUpdate')]
public function DescriptionUpdate($value){
    $this->description = $value;
}


public function updatedIndustry(){

    $this->sub_industries = SubIndustry::where('industry_id', $this->industry)->get();

}

public function updatedCity(){

    $this->city_areas = CityArea::where('city_id', $this->city)->get();

}

public function updateCompany(){
     
        $this->validate([
            'name' => 'required|min:3',
            'industry' => 'required|integer',
            'sub_industry' => 'required|integer',
            'company_size' => 'nullable',
            'valuation' => 'nullable',
            'city' => 'required|integer',
            'city_area' => 'required|integer',
            'address' => 'nullable',
            'email' => 'required|email',
            'contact' => 'required|numeric|regex:/^\+92[0-9]{10}$/',
            'github' => 'nullable|regex:~^(https?:\/\/)?(www\.)?github\.com\/[a-zA-Z0-9-]+(\/[a-zA-Z0-9._-]+)?\/?$~',
            'linkedin' => 'nullable|regex:~^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[a-zA-Z-]{3,100}\/?$~',
            'website' => 'nullable',
            'description' => 'required|min:10',
            'phone_number' => 'nullable|numeric|regex:/^\+92[0-9]{10}$/',
            'user_name' => 'required|min:3',
        ]);
        
        $company = Company::findOrFail(Auth::user()->company_id());
        $user = User::findOrFail(Auth::id());

        try{

        $company->name = $this->name;
        $company->email = $this->email;
        $company->contact = $this->contact;
        $company->industry_id = $this->industry;
        $company->sub_industry_id = $this->sub_industry;
        $company->company_size = $this->company_size;
        $company->valuation = $this->valuation;
        $company->city_id = $this->city;
        $company->city_area_id = $this->city_area;
        $company->address = $this->address;
        $company->website = $this->website;
        $company->description = $this->description;

        $user->name = $this->user_name;
        $user->phone_number = $this->phone_number;
        $user->github = $this->github;
        $user->linkedin = $this->linkedin;


        $company->save();
        $user->save();

        $this->mount();

        $this->editing = !$this->editing;

        flash('response', [
            'status' => 'success',
            'message' => 'Profile Updated'
        ]);

        }catch(Exception $error){
            
            flash('response', [
                'status' => 'error',
                'message' => 'An Error Occcured'
            ]);

        }
}

public function updatedJobsVisibility(){
    $company = Company::findOrFail(Auth::user()->company_id());

    try{
  if($this->jobs_visibility == true){
    $company->job_posts_visibility = 'visible';
    $company->save();
  }elseif($this->jobs_visibility == false){
    $company->job_posts_visibility = 'hidden';
    $company->save();
  }

  $this->mount();
  
  flash('response', [
    'status' => 'success',
    'message' => 'Job Posts Visibility Toggled'
]);
}catch(Exception $error){
    flash('response', [
        'status' => 'error',
        'message' => 'An Error Occured'
    ]);
}
}

public function updatedPassword(){
    $this->validate([
        'password' => 'required|min:8'
    ]);
    
}
public function updatePassword(){
    $data = $this->validate([
        'password' => 'required|min:8'
    ]);

    try{

    $user = User::findOrFail(Auth::id());

    $user->password = $data['password'];

    $user->save();

    $this->reset(['password']);

    flash('response', [
        'status' => 'success',
        'message' => 'Password Updated Successfully'
    ]);

}catch(Exception $error){
    flash('response', [
        'status' => 'error',
        'message' => 'An Error Occurred'
    ]);
}
}

public function deleteAccount(){

    try{

    DB::beginTransaction();

    User::destroy(Auth::id());

    DB::commit();

    $this->redirect(route('home'), navigate:true);

    flash('response', [
        'status' => 'info',
        'message' => 'Employer Account Deleted Successfully'
    ]);

    }catch(Exception $error){

        DB::rollBack();
        flash('response', [
            'status' => 'error',
            'message' => 'An Error Ocurred'
        ]);
    }
}

    public function render()
    {
      
        $industries = Industry::all();
        $job_types = JobType::all();
        $cities = City::all();
        
        return view('livewire.employer.employer-profile', [
            'industries' => $industries,
            'sub_industries' => $this->sub_industries,
            'job_types' => $job_types,
            'cities' => $cities,
            'city_areas' =>$this->city_areas
        ]);
    }
}
