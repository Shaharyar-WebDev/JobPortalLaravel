<?php

namespace App\Livewire\Cards;

use Livewire\Component;

class JobCard extends Component
{
    public $job;
    
    public function render()
    {
        return view('livewire.cards.job-card', ['job'=>$this->job]);
    }
}
