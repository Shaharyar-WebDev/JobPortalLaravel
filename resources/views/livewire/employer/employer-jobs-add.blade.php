<div class="md:p-4">
    <!-- Care about people's approval and you will be their prisoner. -->
    <!-- Dashboard Main -->
    <div class="text-sm breadcrumbs mb-2">
        <ul>
            <li><a wire:navigate href="http://127.0.0.1:8000/employer/dashboard">Dashboard</a></li>
            <li><a wire:navigate href="http://127.0.0.1:8000/employer/dashboard/jobs/view">Jobs</a></li> 
            <li class="text-primary">Add Job</li>
        </ul>
    </div>
    <h1 class="text-3xl font-bold p-4">Post a New Job</h1>
    <form form wire:submit="saveJob" class="grid grid-cols-1 xl:grid-cols-2 gap-8">
        <!-- Left Column - Form -->
        <div class="space-y-4">
            <!-- Job Details Card -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-6">Job Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Job Title*</span>
                            </label>
                            <input type="text" wire:model.live.debounce.500ms="job_title" class="input input-bordered"
                                placeholder="Senior Frontend Developer">
                            @error('job_title')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Job Setting*</span>
                            </label>
                            <select wire:model.live.debounce.500ms="job_setting" class="select select-bordered">
                                <option class="hidden">Select Job Setting</option>
                                <option value="onsite">Onsite</option>
                                <option value="remote">Remote</option>
                                <option value="hybrid">Hybrid</option>
                            </select>
                            @error('job_setting')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Job Type*</span>
                            </label>
                            <select wire:model.live.debounce.500ms="job_type_id" class="select select-bordered">
                                Select Job Type
                                @forelse ($job_types as $job_type)
                                    <option value="{{$job_type->id}}">{{$job_type->name}}</option>
                                @empty
                                    <option disabled>No job Types</option>
                                @endforelse
                            </select>
                            @error('job_type')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">City*</span>
                            </label>
                            <select wire:model.live.debounce.500ms="city_id" class="select select-bordered">
                                <option class="hidden">Select City</option>
                                @forelse ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @empty
                                    <option disabled>No Cities</option>
                                @endforelse
                            </select>
                            @error('city_id')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">City Area*</span>
                            </label>
                            <select wire:model.live.debounce.500ms="city_area_id" class="select select-bordered">
                                @if($city_areas)
                                    <option class="hidden">Select City Area</option>
                                    @foreach ($city_areas as $city_area)
                                        <option value="{{$city_area->id}}">{{$city_area->name}}</option>
                                    @endforeach
                                @else
                                    <option class="hidden">
                                        Select City First
                                    </option>
                                @endif
                            </select>
                            @error('city_area_id')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Address*</span>
                            </label>
                            <input wire:model.live.debounce.500ms="address" type="text" class="input input-bordered"
                                placeholder="Enter Address">
                            @error('address')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Salary Range ($)</span>
                            </label>
                            <input wire:model.live.debounce.500ms="min_salary" class="input input-bordered"
                                placeholder="Min" name="salary_min" id="salary_min" type="number" min="1">
                            @error('min_salary')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Salary Range ($)</span>
                            </label>
                            <input wire:model.live.debounce.500ms="max_salary" type="number" id="salary_max"
                                name="salary_max" placeholder="Max" class="input input-bordered" min="1">
                            @error('max_salary')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control md:col-span-2">
                            <label class="label">
                                <span class="label-text"> Industry*</span>
                            </label>
                            <select wire:model.live.debounce.500ms="industry_id" class="select select-bordered" id="">
                                <option class="hidden">Select Industry</option>
                                @forelse ($industries as $industry)
                                    <option value="{{$industry->id}}">{{$industry->name}}</option>
                                @empty
                                    <option disabled>No Industry</option>
                                @endforelse
                            </select>
                            @error('industry_id')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control md:col-span-2">
                            <label class="label">
                                <span class="label-text">Job Sub Industry*</span>
                            </label>
                            <select class="select select-bordered" wire:model.live.debounce.500ms="sub_industry_id">
                                @if ($sub_industries)
                                    @forelse ($sub_industries as $sub_industry)
                                        <option value="{{$sub_industry->id}}">{{$sub_industry->name}}</option>
                                    @empty
                                        <option disabled>No Cities</option>
                                    @endforelse
                                @else
                                    <option class="hidden">Select Industry First</option>
                                @endif
                            </select>
                            @error('sub_industry_id')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control md:col-span-2">
                            <label class="label">
                                <span class="label-text">Job Description*</span>
                            </label>
                            <div class="h-auto border rounded-box p-4 resize-y" wire:ignore>
                                <!-- Rich Text Editor Placeholder -->
                                @php

                                    $initial_value = '';
                                @endphp
                                <input type="hidden" wire:model.live.debounce.500ms="description" id="my_input"
                                    value="{{$initial_value}}">
                                <trix-toolbar id="my_toolbar"></trix-toolbar>
                                <div class="more-stuff-inbetween"></div>
                                <trix-editor toolbar="my_toolbar" class="trix-editor" input="my_input"></trix-editor>
                            </div>
                            @error('description')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- Requirements Card -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <h2 class="card-title mb-6">Requirements</h2>
                        <button class="btn btn-primary" type="button" wire:click="ResetRequirements" id="resetRequirements">Reset Requirements</button>
                    </div>
                    <div class="space-y-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Experience Level*</span>
                            </label>
                            <select wire:model.live.debounce.500ms="experience_id" class="select select-bordered">
                                <option class="hidden">Select Experience</option>
                                @forelse ($experiences as $experience)
                                    <option value="{{$experience->id}}">{{$experience->name}}</option>
                                @empty
                                    <option disabled>No Experience Found</option>
                                @endforelse
                            </select>
                            @error('experience_id')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control w-full" wire:ignore>
                            <label class="label">
                                <span class="label-text">Required Skills</span>
                            </label>
                            <select id="skills" class="select select-bordered w-full" multiple>
                                @forelse ($skills as $skill)
                                    <option value="{{$skill->id}}">{{$skill->name}}</option>
                                @empty
                                    <option class="hidden">No Skill Found</option>
                                @endforelse
                            </select>
                            @error('selected_skills')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control" wire:ignore>
                            <label class="label">
                                <span class="label-text">Select Custom Skills*</span>
                            </label>
                            <input type="text" id="custom_skills" wire:model.live="custom_skills">
                            @error('custom_skills')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                        <div class="form-control w-full" wire:ignore>
                            <label class="label">
                                <span class="label-text">Required Education</span>
                            </label>
                            <select id="educations" multiple class="select select-bordered w-full">
                                @forelse ($educations as $education)
                                    <option value="{{$education->id}}">{{$education->name}}</option>
                                @empty
                                    <option disabled>No Education Found</option>
                                @endforelse
                            </select>
                            @error('selected_educations')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control" wire:ignore>
                            <label class="label">
                                <span class="label-text">Select Custom Educations*</span>
                            </label>
                            <input type="text" id="custon_educations" placeholder="Add skill">
                            @error('custom_educations')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Application Deadline*</span>
                            </label>
                            <input type="date" wire:model.live.debounce.500ms="apply_before"
                                class="input input-bordered">
                            @error('apply_before')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Urgent Hiring</span>
                            </label>
                            <input type="checkbox" wire:model.live.debounce.500ms="urgently_hiring"
                                class="toggle toggle-info" />
                            @error('urgently_hiring')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column - Preview -->
        @php
            $company = App\Models\Company::where('user_id', Auth::user()->id)->first()
        @endphp
        <div class="card bg-base-100 shadow-sm h-fit sticky top-4">
            <div class="card-body">
                <h2 class="card-title mb-4">Live Preview</h2>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 bg-base-200 p-4 rounded-box">
                        <div
                            class="w-16 h-16 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
                            @if($company->image && Storage::disk('public')->exists('/images/' . $company->image))
                                <img src="{{asset('storage/images/' . $company->image)}}" alt="">
                            @else
                                                        <div class="text-primary font-bold">
                                                            @php
                                                                $cname = '';
                                                                foreach (explode(' ', $company->name) as $name) {
                                                                    $cname .= ucfirst(substr($name, 0, 1));
                                                                }
                                                             @endphp
                                                            {{$cname}}
                                                        </div>
                            @endif
                        </div>
                        <div>
                            @if(isset($job_title) && !empty($job_title))
                            <h3 class="text-xl font-bold">{{$job_title}}</h3>
                            @else
                            <h3 class="text-xl font-bold">Job Title</h3>
                            @endif
                            <p class="text-primary">{{$company->name}}</p>
                        </div>
                    </div>
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Job Overview</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Job Setting -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Job Setting</div>
                                        @isset($job_setting)
                                        <div class="font-medium">{{ucfirst($job_setting)}}</div>
                                        @else
                                        <div class="font-medium">---</div>
                                        @endisset
                                    </div>
                                </div>

                                <!-- Location Details -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Location</div>
                                        <div class="space-y-1">
                                            @php
                                                $city = App\Models\City::where('id', $city_id)->first();

                                                $city_area = App\Models\CityArea::where('id', $city_area_id)->first();
                                            @endphp
                                            <div class="font-medium">
                                                @isset($city->name)
                                                    {{$city->name}}
                                                @else
                                                ---
                                                @endisset
                                            </div>
                                            <div class="text-sm">
                                                @isset($city_area->name)
                                                {{$city_area->name}}
                                                @else
                                                ---
                                                @endisset
                                            </div>
                                            <div class="text-sm text-base-content/70">
                                                @isset($address)
                                                @empty($address)
                                                    ---
                                                @else
                                                {{$address}}
                                                @endempty
                                                @else
                                                ---
                                                @endisset</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Industry & Sub-Industry -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Industry</div>
                                        @php
                                            $industry = App\Models\Industry::where('id', $industry_id)->first();

                                            $sub_industry = App\Models\SubIndustry::where('id', $sub_industry_id)->first();
                                        @endphp
                                        <div class="font-medium">
                                            @isset($industry_id)
                                                {{$industry->name}}
                                            @else
                                            ---
                                            @endisset
                                        </div>
                                        <div class="text-sm text-base-content/70">
                                            @isset($sub_industry_id)
                                                {{$sub_industry->name}}
                                            @else
                                            ---
                                            @endisset
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Type -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        @php
                                            $job_type = App\Models\JobType::where('id', $job_type_id)->first();
                                        @endphp
                                        <div class="text-sm text-base-content/70 mb-1">Job Type</div>
                                        <div class="font-medium">
                                            @isset($job_type_id)
                                                {{$job_type->name}}
                                            @else
                                            ---
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Salary Range</div>
                                        <div class="font-medium">Rs 
                                            {{$min_salary}} - Rs {{$max_salary}}</div>
                                    </div>
                                </div>

                                <!-- Application Deadline -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Apply Before</div>
                                        <div class="font-medium">
                                            @isset($apply_before)
                                                @empty($apply_before)
                                                    ---- -- --
                                                @else
                                                {{$apply_before}}
                                                @endempty
                                                @else
                                                ---- -- --
                                            @endisset</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Experience & Education -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        @php
                                            $job_experience = App\Models\JobExperience::where('id', $experience_id)->first();
                                        @endphp
                                        <div class="text-sm text-base-content/70 mb-1">Experience Required</div>
                                        <div class="font-medium">
                                            @isset($experience_id)
                                                {{$job_experience->name}}
                                                @else
                                                ---
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>

                                        <div class="text-sm text-base-content/70 mb-1">Required Skills</div>
                                        <div class="flex flex-wrap gap-2">
                                            @php
                                                $job_skills = App\Models\Skill::whereIn('id', $selected_skills)->get();
                                            @endphp
                                            @isset($selected_skills)
                                            @foreach ($job_skills as $job_skill)
                                            <span class="badge h-auto badge-outline">{{$job_skill->name}}</span>
                                            @endforeach
                                            @else
                                            @endisset
                                            @foreach ($custom_skills as $custom_skill)
                                            <span class="badge h-auto badge-outline">{{$custom_skill}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zM12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Education</div>
                                        <div class="flex flex-wrap gap-2">
                                            @php
                                            $job_educations = App\Models\Education::whereIn('id', $selected_educations)->get();
                                        @endphp
                                        @isset($selected_educations)
                                            @foreach ($job_educations as $education)
                                            <span class="badge badge-outline h-auto ">  {{$education->name}}</span>
                                            @endforeach
                                        @endisset
                                        @foreach ($custom_educations as $custom_education)
                                        <span class="badge badge-outline h-auto">   {{$custom_education}}
                                        </span>
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="bg-base-200 p-4 rounded-box">
                        <h4 class="font-bold">Job Description</h4>
                        <p class="text-base-content/70">
                            @if ($description)
                                {!!$description!!}
                            @else
                            [Job description preview will appear here]
                            @endif
                        </p>
                    </div>
                    <div class="divider"></div>
                    <div class="flex gap-4">
                        <button class="btn btn-primary flex-1">Publish Job</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Empty State -->
    <div class="text-center py-16 hidden">
        <div class="max-w-md mx-auto mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-base-content/20" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                </path>
            </svg>
        </div>
        <h2 class="text-xl font-bold mb-4">No Job Listings Yet</h2>
        <p class="text-base-content/70 mb-6">Create your first job posting to start attracting candidates</p>
        <button class="btn btn-primary">Create Job Posting</button>
    </div>
    @includeIf('livewire.partials.alert')
    @push('scripts')
        <script type="module">
            document.addEventListener("trix-file-accept", function (event) {
                event.preventDefault();
            });
        </script>
        <script type="module" src="/js/employer/employer-jobs-add.js"></script>
    @endpush
</div>