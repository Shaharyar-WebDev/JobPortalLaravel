<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Skill;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobType;
use Livewire\Component;
use App\Models\CityArea;
use App\Models\Industry;
use App\Models\Education;
use App\Models\SubIndustry;
use Livewire\Attributes\On;
use App\Models\JobEducation;
use Livewire\WithPagination;
use App\Models\JobExperience;

class Jobs extends Component
{
    use WithPagination;
    public $search;
    public $industry;

    public $company;
    protected $queryString = [
        'industry' => ['except' => ''],
        'company' => ['except' => ''],
        'search' => ['except' => ''],
        'city' => ['except' => ''],
        'city_area' => ['except'=>'']
    ];
    public $city;
    public $city_area;
    public $job_setting;
    public $sub_industry;
    public $sort;
    public $experience;

    public $job_type;

    public $salary_above;

    public $salary_below;


    public array $job_educations = [];

    public array $customEducations = [];

    public array $custom_skills = [];

    public array $job_skills = [];

    #[On('SkillsUpdated')]
    public function updateSkills($values)
    {
        $this->job_skills = $values;
    }

    #[On('customEducationsUpdated')]
    public function updateCustomEducations($values)
    {
        $this->customEducations = $values;
    }

    #[On('customSkillsUpdated')]
    public function updateCustomSkills($values)
    {
        $this->custom_skills = $values;
    }

    public function updating($name, $value)
    {
        $this->resetPage();
    }
    public function resetFilters()
    {

        $this->reset(['search', 'industry', 'sub_industry', 'city', 'city_area', 'job_setting', 'sort', 'job_type', 'experience', 'job_educations', 'customEducations', 'custom_skills', 'job_skills', 'salary_above', 'salary_below', 'company']);
    }
    public function render()
    {



        $industries = Industry::all();
        $cities = City::all();
        $query = JobPost::with('company', 'job_type', 'job_educations', 'job_skills', 'city', 'city_area', 'experience');
        $city_areas = CityArea::all();
        $sub_industries = SubIndustry::all();
        $job_experiences = JobExperience::all();
        $job_types = JobType::all();
        $educations = Education::all();
        $skills = Skill::all();

        if ($this->city) {
            $query->where('city_id', $this->city);
            $city_areas = CityArea::where('city_id', $this->city)->get();
        }

        if ($this->city_area) {
            $query->where('city_area_id', $this->city_area);
        }

        if ($this->industry) {
            $query->whereHas('industry', function ($query) {
                $query->where('id', $this->industry);
            });
            $sub_industries = SubIndustry::where('industry_id', $this->industry)->get();
        }

        if ($this->sub_industry) {
            $query->whereHas('sub_industry', function ($query) {
                $query->where('id', $this->sub_industry);
            });
        }

        if ($this->job_setting) {
            $query->where('job_setting', $this->job_setting);
        }

        if ($this->experience) {
            $query->whereHas('experience', function ($query) {
                $query->where('id', $this->experience);
            });
        }

        if ($this->job_type) {
            $query->whereHas('job_type', function ($query) {
                $query->where('id', $this->job_type);
            });
        }

        if ($this->company) {
            $query->whereHas('company', function ($query) {
                $query->where('id', $this->company);
            });
        }

        if (!empty($this->job_educations)) {
            $query->whereHas('job_educations', function ($query) {
                $query->whereIn('educations_id', $this->job_educations);
            });
        }

        if (!empty($this->job_skills)) {
            $query->whereHas('job_skills', function ($query) {
                $query->whereIn('skill_id', $this->job_skills);
            });
        }


        if (!empty($this->customEducations)) {
            $query->whereJsonContains('custom_educations', $this->customEducations);
        }



        if (!empty($this->custom_skills)) {
            $query->whereJsonContains('custom_skills', $this->custom_skills);
        }


        if ($this->salary_above) {
            $query->where('min_salary', '>', $this->salary_above)->orWhere('max_salary', '>', $this->salary_above);
        }

        if ($this->salary_below) {
            $query->where('min_salary', '<', $this->salary_below)->orWhere('max_salary', '<', $this->salary_below);
        }

        if ($this->search) {
            $query->where(function($query){
                $query->where('title', 'like', '%' . trim($this->search) . '%')
                ->orWhere('address', 'like', '%' . trim($this->search) . '%')
                ->orWhereHas('company.industry', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orwhereHas('company', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('industry', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('sub_industry', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('city_area', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('city', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhere('job_setting', 'like', '%' . trim($this->search) . '%')
                ->orWhereHas('job_type', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('experience', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('job_educations', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereHas('job_skills', function ($query) {
                    $query->where('name', 'like', '%' . trim($this->search) . '%');
                })
                ->orWhereJsonContains('custom_skills', $this->search)
                ->orWhereJsonContains('custom_educations', $this->search);
            });
        }

        if ($this->sort) {
            if ($this->sort == 1) {
                $query->orderByDesc('created_at');
            }
            if ($this->sort == 2) {
                $query->orderBy('title', 'asc');
            }
        }

        // $jobs = JobPost::with(['company','job_type','city','city_area'])->get();
        $jobs = $query->paginate(5);

        return view(
            'livewire.jobs',
            [
                'jobs' => $jobs,
                'industries' => $industries,
                'cities' => $cities,
                'city_areas' => $city_areas,
                'sub_industries' => $sub_industries,
                'job_experiences' => $job_experiences,
                'job_types' => $job_types,
                'educations' => $educations,
                'skills' => $skills
            ]
        );
    }
}
