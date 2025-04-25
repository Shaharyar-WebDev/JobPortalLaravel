<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Industry;
use Livewire\WithPagination;

class Industries extends Component
{

    use WithPagination;
    public $search="";

    public $sort;

    public function updating($name, $value)
    {
        $this->resetPage();
    }
    public function resetFilters()
    {
        $this->reset(['search', 'sort']);
    }

    public function render()
    {
        $query =  Industry::with('companies','sub_industries', 'job_posts');

        $query->where('name', 'like', '%'.$this->search.'%')->withCount(['companies','sub_industries','job_posts']);

        if($this->sort == 1){
            $query->orderBy('job_posts_count', 'desc');
        }
        if($this->sort == 2){
            $query->orderBy('companies_count', 'desc');
        }
        if($this->sort == 3){
            $query->orderBy('sub_industries_count', 'desc');
        }

        $industries = $query->paginate(8);

        return view('livewire.industries', [
            'industries' => $industries
        ]);

    }
}
