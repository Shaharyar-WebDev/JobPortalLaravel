<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Company;
use App\Models\CityArea;
use Livewire\Component;
use App\Models\Industry;
use Livewire\WithPagination;

class Companies extends Component
{
    use WithPagination;
    public $search; 
    public $industry;

    public $city;

    public $city_area;

    public $company_size;

    public $sort;

    public function resetFilters(){

        $this->reset(['search','industry','city','city_area','company_size','sort']);

    }
    public function render()
    {
        $industries = Industry::all();
        $cities = City::all();
        $query = Company::with('industry', 'city', 'city_area');
        $city_areas = null;

        if($this->search){
        $query->where('name','like', '%'.trim($this->search).'%')->orWhereHas('industry', function($query){
            $query->where('name','like', '%'.trim($this->search).'%');
        })->orWhereHas('city_area', function($query){
            $query->where('name', 'like', '%'.trim($this->search).'%');
        })->orWhereHas('city', function($query){
            $query->where('name', 'like', '%'.trim($this->search).'%');
        });
        }

        if($this->city){
            $query->where('city_id',$this->city);
            $city_areas = CityArea::where('city_id', $this->city)->get();
        }

        if($this->industry){
        $query->where('industry_id',$this->industry);
        }

        if($this->city_area){
            $query->where('city_area_id', $this->city_area);
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

        $companies = $query->paginate(5);
        return view('livewire.companies', [
            'companies' => $companies,
            'industries' => $industries,
            'cities' => $cities,
            'city_areas' => $city_areas
        ]);
        
    }
}
