<?php

namespace App\Livewire;

use App\Models\JobPost;
use Livewire\Component;
use Livewire\WithFileUploads;

class Apply extends Component
{

    use WithFileUploads;

    public $id;

    public $slug;
    public $name;

    public $email;

    public $contact;

    public $resume;

    public function render()
    {

        function checkSlug($Modelclass, $id, $slug, $message = "Mismatch"){
            $object = $Modelclass::findorFail($id);

            if($slug != $object->slug){
                abort(404, $message);
            }else{
                
                return $object;
            };


        }

        $job = checkSlug(JobPost::class, $this->id, $this->slug, 'OWOW');
        
        
        
        return view('livewire.apply',[
            'name' => $this->name,
            'email' => $this->email,
            'contact' => $this->contact,
            'resume' => $this->resume,
            'job'=>$job
        ]);
    }
}
