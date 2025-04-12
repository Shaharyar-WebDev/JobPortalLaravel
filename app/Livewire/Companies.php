<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\CityArea;
use Livewire\Component;
use App\Models\Industry;
use App\Models\SubIndustry;
use Livewire\WithPagination;

class Companies extends Component
{
    use WithPagination;
    public $search; 
    public $industry;

    public $city;

    public $city_area;

    public $company_size;

    public $sub_industry;

    public $sort;

    public function updating($name, $value)
{
    $this->resetPage();
}
    public function resetFilters(){

        $this->reset(['search','industry','sub_industry','city','city_area','company_size','sort']);

    }
    public function render()
    {
        $industries = Industry::all();
        $cities = City::all();
        $query = Company::with('industry','sub_industry', 'city', 'city_area')->withCount('job_posts');
        $city_areas = CityArea::all();
        $sub_industries = SubIndustry::all();

        if($this->city){
            $query->where('city_id',$this->city);
            $city_areas = CityArea::where('city_id', $this->city)->get();
        }

        if($this->industry){
        $query->where('industry_id',$this->industry);
        $sub_industries = SubIndustry::where('industry_id', $this->industry)->get();
        }

        if($this->city_area){
            $query->where('city_area_id', $this->city_area);
        }

        if($this->sub_industry){
            $query->where('sub_industry_id',$this->sub_industry);
           
        }

        if($this->company_size){
            $query->where('company_size', $this->company_size);
        }

        if($this->sort){
            if($this->sort == 1){
                $query->orderByDesc('created_at');
            }
            if($this->sort == 2){
                $query->orderBy('name', 'asc');
            }
        }

        if($this->search){
            $query->where('name','like', '%'.trim($this->search).'%')
            ->orWhere('address','like','%'.trim($this->search).'%')
            ->orWhereHas('industry', function($query){
                $query->where('name','like', '%'.trim($this->search).'%');
            })
            ->orWhereHas('city_area', function($query){
                $query->where('name', 'like', '%'.trim($this->search).'%');
            })
            ->orWhereHas('city', function($query){
                $query->where('name', 'like', '%'.trim($this->search).'%');
            })
            ->orWhereHas('industry', function ($query){
                $query->where('name', 'like', '%'.trim($this->search).'%');
            })
            ->orwhereHas('sub_industry', function($query){
                $query->where('name','like','%'.trim($this->search).'%');
            });
            }
    
        $num_of_comp = count($query->get());    
        $companies = $query->paginate(1);
        return view('livewire.companies', [
            'companies' => $companies,
            'num_of_comp' => $num_of_comp,
            'industries' => $industries,
            'cities' => $cities,
            'city_areas' => $city_areas,
            'sub_industries' => $sub_industries
        ]);
        
    }
}
