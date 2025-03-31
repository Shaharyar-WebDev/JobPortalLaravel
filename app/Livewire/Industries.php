<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Industry;

class Industries extends Component
{

    public $search="";

    public function render()
    {
        $industries = Industry::where('name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.industries', [
            'industries' => $industries
        ]);

    }
}
