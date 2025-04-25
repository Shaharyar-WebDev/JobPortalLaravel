<?php

namespace App\Livewire;

use App\Helpers\Otp;
use App\Models\City;
use App\Models\User;
use App\Mail\OtpMail;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\WithFileUploads;
use App\Helpers\MyFunc;
use App\Helpers\Flash;
require_once app_path('Helpers/Flash.php');

use Exception;

class UserSignup extends Component
{

    use WithFileUploads;
    public $step = 1;

    public  $allowed_ext = ['pdf', 'docx', 'doc'];
    public $user;

    public $total_steps = 5;
    #[Validate]
    public $email, $name, $password, $confirm_password, $otp = ['', '', '', '', '', ''];

    public $phone_number, $gender, $github, $linkedin, $image;

    public $cv;

    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function register()
    {

        $validated_data = $this->validate();
        try{

        $otp = Otp::send($this->email, 'mail.otp-mail');
        session(['otp'=>$otp]);

        if($otp){
            $this->step = 2;
            flash('response', ['status' => 'success', 'message' => 'Otp Has Been sent Successfully!']);
        }

        }catch(Exception $e){
            flash('response', ['status' => 'error', 'message' => 'Failed To Send Otp!']);
        }

    }

    public function save()
    {

        $validated_data = $this->validate();

        $this->user = User::create($validated_data);

        $this->user->markEmailAsVerified();

        return true;
    }

    public function createProfile()
    {
        if($this->image){
            $this->validate([
                'image' => 'mimes:jpg,jpeg,png|max:2096'
            ]);
        }

        $this->validate([
            'phone_number' => 'required|numeric|regex:/^\+92[0-9]{10}$/',
            'gender' => 'required',
            'github' => 'nullable|regex:~^(https?:\/\/)?(www\.)?github\.com\/[a-zA-Z0-9-]{1,39}\/?$~',
            'linkedin' => 'nullable|regex:~^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[a-zA-Z-]{3,100}\/?$~'
        ]);

        $this->user->phone_number = $this->phone_number;
        $this->user->gender = $this->gender;
        $this->user->github = $this->github;
        $this->user->linkedin = $this->linkedin;
        if ($this->user->save()) {
            if($this->image){
                $image_name = time().'_'.$this->image->getClientOriginalName();
                $this->user->image = $image_name;
                if($this->image->storeAs('images/users', $image_name,'public') && $this->user->save()){
                    $this->step = 4;
                    MyFunc::flash('response', ['status' => 'success', 'message' => 'Profile Updated']);
                    return true;
                } else {
                    $this->step = 4;
                    flash('response', ['status'=>'error','message'=>'Failed To Upload Image']);
                }
            }
            $this->step = 4;
            flash('response', ['status' => 'success', 'message' => 'Profile Updated']);
        } else {
            flash('response', ['status'=>'error','message'=>'Failed To Update Profile']);
        }
    }


    public function skip()
    {
        
        $this->step++;

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

    public function updatedImage(){
        $this->validate([
            'image' => 'mimes:jpg,jpeg,png|max:2096'
        ]);
    }
    public function updatedOtp($values, $index)
    {

        $otpInput = implode('', $this->otp);
        if (strlen($otpInput) == 6) {
            if ($otpInput == session('otp')) {
                session()->forget('otp');
                if ($this->save()) {
                    $this->step = 3;
                    flash('response', ['status'=>'success', 
                    'message' => 'Account Created'] );
                } else {
                    flash('response', [
                        'status' => 'error',
                        'message' => 'An Error Occurred'
                    ]);
                };
            } else {
                $this->addError('otp', 'Invalid OTP');
            }
        }
    }

    public function updatedCv()
    {

        $this->validate([
            'cv' => 'max:5120|mimes:pdf,docx,doc'
        ]);

    
    }

    public function uploadCv()
    {

        $this->validate([
            'cv' => 'max:5120|mimes:pdf,docx,doc'
        ]);

        $ext = $this->cv->getClientOriginalExtension();

            $cv_name = $this->cv->getClientOriginalName();

            $this->user->cv = $cv_name;
            
            if($this->user->save() && $this->cv->storeAs('cv/users',$cv_name, 'public')){

                $this->step++;

            }else{
                flash('response', ['status' => 'error', 'message' => 'An Error Occured while Creating Account , Please Try Again Later']);
            };

    }
    
    public function render()
    {
        if($this->step == 5){

            Auth::login($this->user);

            if(session()->has('redirect_to')){
                $this->redirect(session()->pull('redirect_to'), navigate:true);
            }
 
        }

        $cv = $this->cv;

        return view('livewire.user-signup', ['step' => $this->step, 'cv' => $cv]);
    }
}
