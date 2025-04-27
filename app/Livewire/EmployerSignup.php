<?php

namespace App\Livewire;

use Exception;
use Carbon\Carbon;
use App\Helpers\Otp;
use App\Models\City;
use App\Models\User;
use App\Helpers\MyFunc;
use App\Models\Company;
use Livewire\Component;
use App\Models\CityArea;
use App\Models\Industry;
use App\Models\SubIndustry;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\WithFileUploads;
require_once app_path('Helpers\Flash.php');
class EmployerSignup extends Component
{

    use WithFileUploads;
    public $step = 1;

    public $total_steps = 5;

    public $user;

    public $company;

    public $industry_id, $sub_industry_id,
    $city_id, $city_area_id, $address ,$company_size, $website, $description, $image, $contact, $valuation;

    #[Validate]
    public $name, $email, $password, $confirm_password;

    // #[Validate('required|numeric|regex:/^\+92[0-9]{10}$/')]
    public $phone_number;

    // #[Validate('required')]
    public $gender;

    public $github;

    public $linkedin;

    public $otp = ['','','','','',''];

    public function rules(){
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function skip(){
        $this->step++;
    }

    public function register(){

        $validated_user = $this->validate();

        try{

            $otp = Otp::send($this->email, 'mail.employer-otp-mail');

            if($otp){
                session(['otp'=>$otp]);
                $this->step++; 
                flash('response', ['status'=>'success', 
                'message'=> 'OTP has been Sent'] );
            }

        }catch(Exception $error){
            flash('response', ['status' => 'error', 'message' => 'Failed To Send Otp!']);

            return false;
        }

    }

    public function resendOtp()
    {

        $validated_data = $this->validate();
        try{

        $otp = Otp::send($this->email, 'mail.otp-mail');
        session(['otp'=>$otp]);

        if($otp){
            $this->step = 2;
            flash('response', ['status' => 'success', 'message' => 'Otp Has Been Resent Successfully!']);
        }

        }catch(Exception $e){
            flash('response', ['status' => 'error', 'message' => 'Failed To Send Otp!']);
        }
    }

    public function updatedOtp(){
        $user_otp = trim(implode('',$this->otp));
        if(strlen($user_otp) == 6){
            if($user_otp == session('otp')){
                $this->saveUser();
               $this->step++;
               flash('response', ['status'=>'success', 
               'message'=> 'Employer Account Created!'] );
            }else{
                $this->addError('otp', 'Invalid OTP');
            }
        }
       
    }

    public function saveUser(){
        $validated_user = $this->validate();
        $this->user = User::create($validated_user);
        $this->user->role = "employer";
        $this->user->markEmailAsVerified();
        if(!$this->user->save()){
            flash('response', ['status'=>'error', 
               'message'=> 'Error Saving User']);
            flash('response', ['status'=>'error', 
               'message'=> 'Error Saving User'] );
        }
    }

    public function createProfile(){
 
        $this->validate([
            'phone_number' => 'required|numeric|regex:/^\+92[0-9]{10}$/',
        ]);

        // $this->user = User::find(1);

        $this->user->phone_number = $this->phone_number;
        $this->user->gender = $this->gender;
        $this->user->github = $this->github;
        $this->user->linkedin = $this->linkedin;

        if($this->user->save()){
            $this->step++;
            flash('response', ['status'=>'success', 
            'message'=> 'Profile Updated'] );
        }else{
        flash('response', ['status'=>'error', 
            'message'=> 'Error Updating Profile'] );
        }
    }

    public function updatedImage(){

        $this->validate([
            'image' => 'mimes:jpeg,jpg,png|max:2048',
        ]);
    }

    public function saveCompanyProfile(){
        if($this->image){
            $this->validate([
                'image' => 'mimes:jpeg,jpg,png|max:2048',
            ]);
        }
        $data = $this->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'industry_id' => 'required',
            'sub_industry_id' => 'required',
            'city_id' => 'required',
            'city_area_id' => 'required',
            'address' => 'required',
            'contact' => 'required|numeric|regex:/^\+92[0-9]{10}$/',
            'company_size' => 'required',
            'description' => 'required|min:10'
        ]);

        try{

        $company = new Company;
        
        $company_id = $company::insertGetId([
            'user_id' => $this->user->id,
            'name' => $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'industry_id' => $this->industry_id,
            'sub_industry_id' => $this->sub_industry_id,
            'city_id' => $this->city_id,
            'city_area_id' => $this->city_area_id,
            'company_size' => $this->company_size,
            'valuation' => $this->valuation,
            'address' => $this->address,
            'website' => $this->website,
            'description' => $this->description,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->company = Company::findOrFail($company_id);

        if($this->image && !empty($this->image)){
            $this->company->image = $this->image->getClientOriginalName();
            if($this->image->storeAs('images/companies', $this->company->image, 'public') && $this->company->save()){
                return $this->step++;
            };
        }

        $this->step++;
        Auth::login($this->user);

        flash('response', ['status'=>'success', 
        'message'=> 'Employer Login Successfull'] );
    }catch(Exception $error){
        flash('response', ['status'=>'error', 
        'message'=> 'An Error Occurred while creating company profile'] );
    }
    }

    public function render()
    {
        $sub_industries = null;
        $city_areas = null;

        if($this->industry_id){
            $sub_industries = SubIndustry::where('industry_Id', $this->industry_id)->get();

            // dd($sub_industries);
        }
        if($this->city_id){

            $city_areas = CityArea::where('city_id', $this->city_id)->get();

            // dd($city_areas);
        }

        $cities = City::all();
        $industries = Industry::all();
       

        return view('livewire.employer-signup', 
    compact('cities', 'industries', 'city_areas','sub_industries'), );
    }
}
