<?php

namespace App\Livewire;

use Exception;
use App\Helpers\MyFunc;
use App\Models\JobPost;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
require_once app_path('Helpers/Flash.php');

class Apply extends Component
{

    use WithFileUploads;

    public $id;

    public $slug;
    public $name;

    public $email;

    public $contact;

    public $resume;

    public $resume_name;

    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->contact = Auth::user()->phone_number;

        if(Auth::user()->cv){

            $this->resume_name = Auth::user()->cv;

        }

    }

public function updatedResume(){
    $this->resume_name = $this->resume->getClientOriginalName();

    $this->validate([
        'resume' => 'required|mimes:pdf,docx,doc|max:5096'
    ]);

}

  public function apply(){

    if(Auth::check()){
        
    if(User::hasAppliedTo($this->id)){
            
        $this->redirectIntended(route('home'), navigate:true);
        flash('response', ['status'=>'info', 'message' => 'Already Applied']);

    }else{;

        if($this->resume){
            $this->validate([
                'resume' => 'required|mimes:pdf,docx,doc|max:5096'
            ]);
            
            $this->resume_name = $this->resume->getClientOriginalName();
            $this->resume->storeAs('cv/users', $this->resume_name, 'public');
        }

    $this->validate([
        'name' => 'required|min:3',
        'email' => 'required|email',
        'contact' => 'required|numeric|regex:/^\+92[0-9]{10}$/',
        'resume_name' => 'required',
    ]);

    

    try{

    JobApplication::create([
        'user_id' => Auth::user()->id,
        'job_post_id' => $this->id,
        'name' => $this->name,
        'email' => $this->email,
        'phone_number' => $this->contact,
        'cv' => $this->resume_name
    ]);

    $this->redirect(route('home'), navigate:true);

    flash('response', ['status'=>'success', 'message'=>'<h3 class="font-bold">Application Submitted!</h3>
        <div class="text-xs">We have received your application. Our team will review it and get back to you soon.</div>']);

}catch(Exception $error){
    flash('response', ['status'=>'error', 'message'=>'An Error Occured While Submitting Application']);
}
    }
}else{
    $this->redirectIntended(route('home'), navigate:true);
    flash('response', ['status'=>'info', 'message' => 'Please Login First']);
};
  }

    public function render()
    {

        if(User::isRole('employer')){
            $this->redirectIntended(route('home'), navigate:true);
            flash('response', ['status'=>'info', 'message' => 'Employers Cannot Apply']);
        }

        if(Auth::check()){
        if(User:: hasAppliedTo($this->id)){
            
            $this->redirectIntended(route('home'), navigate:true);
            flash('response', ['status'=>'info', 'message' => 'Already Applied']);
        };
    }else{
        $this->redirectIntended(route('home'), navigate:true);
        flash('response', ['status'=>'info', 'message' => 'Please Login First']);
    };

        $job = MyFunc::checkSlug(JobPost::class, $this->id, $this->slug, 404);
        
        return view('livewire.apply',[
            'full_name' => $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'resume' => $this->resume_name,
            'job'=>$job
        ]);
    }
}
