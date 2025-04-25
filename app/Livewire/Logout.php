<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{

    public function boot(){
        Auth::logout();
        $this->redirect(route('home'), navigate:true);
    }
    public function render()
    {
        return view('livewire.logout');
    }
}
