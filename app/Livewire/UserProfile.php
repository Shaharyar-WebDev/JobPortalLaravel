<?php

namespace App\Livewire;

use Exception;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\ExceptionIdle;
require_once app_path('/Helpers/Flash.php');
class UserProfile extends Component
{

    use WithFileUploads;

    public $name, $phone_number, $email, $gender, $github, $linkedin, $profile_img, $cv, $resume, $password;

    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone_number = Auth::user()->phone_number;
        $this->gender = Auth::user()->gender;
        $this->github = Auth::user()->github;
        $this->linkedin = Auth::user()->linkedin;
        $this->cv = Auth::user()->cv;
    }

    public function updateProfile(){
        $this->validate([
            'name' => 'required|min:3',
            'phone_number' => 'nullable|numeric|regex:/^\+92[0-9]{10}$/',
            'gender' => 'nullable',
            'github' => 'nullable|regex:~^(https?:\/\/)?(www\.)?github\.com\/[a-zA-Z0-9-]{1,39}\/?$~',
            'linkedin' => 'nullable|regex:~^(https?:\/\/)?(www\.)?linkedin\.com\/in\/[a-zA-Z-]{3,100}\/?$~'
        ]);

        try{

        $user = User::findOrFail(Auth::id());
        
        $user->name = $this->name;
        $user->phone_number = $this->phone_number;
        $user->gender = $this->gender;
        $user->github = $this->github;
        $user->linkedin = $this->linkedin;

        $user->save();

        flash('response', [
            'status' => 'success',
            'message' => 'Profile Updated'
        ]);
    }catch(Exception $error){
        flash('response', [
            'status' => 'error',
            'message' => 'An Error Ocurred'
        ]);
    }
    }    

    public function resetImage(){
        $this->reset(['profile_img']);
        $errors = [];
    }

    public function updatedProfileImg(){

        $this->validate([
            'profile_img' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

    }
    public function updateImage(){
   
        $this->validate([
            'profile_img' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        try{
            DB::beginTransaction();

        $img_name = $this->profile_img->getClientOriginalName();

        $this->profile_img->storeAs('images/users', $img_name, 'public');

        $user = User::findOrFail(Auth::id());
        $user->image = $img_name;
        $user->save();

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

    public function updatedResume(){
        $this->validate([
            'resume' => 'nullable|mimes:pdf,doc,docx|max:5096'
        ]);
    }

    public function updateResume(){
    
        $this->validate([
            'resume' => 'nullable|mimes:pdf,doc,docx|max:5096'
        ]);
        try{

            DB::beginTransaction();

        $user = User::findOrFail(Auth::id());

        $resume_name = $this->resume->getClientOriginalName();
        $this->resume->storeAs('cv/users', $resume_name, 'public');
        $user->cv = $resume_name;
        $user->save();

        DB::commit();

        $this->cv = $resume_name;

        flash('response', [
            'status' => 'success',
            'message' => 'CV Updated'
        ]);

        }catch(Exception $error){

            DB::rollBack();

         $this->mount();

        flash('response', [
            'status' => 'error',
           'message' => 'An Error Ocurred'
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

    public function deleteCv(){
        try{

            DB::beginTransaction();

            $user = User::findOrFail(Auth::id());
            $user->cv = null;
            $user->save();

            DB::commit();

            $this->cv = null;
    
            flash('response', [
                'status' => 'success',
               'message' => 'Resume Deleted Successfully'
            ]);

        }catch(Exception $error){

            flash('response', [
                'status' => 'error',
               'message' => 'An Error Ocurred'
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
            'message' => 'Account Deleted Successfully'
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
        return view('livewire.user-profile');
    }
}
