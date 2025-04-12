<div>
  <div class="drawer">
    <div></div>
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
      <!-- Page content here -->
      <label for="my-drawer" class=" md:hidden w-full fixed text-center bottom-0 z-[99] btn btn-primary drawer-button">More Filters</label>
    </div>
    <div class="drawer-side z-[99]">
      <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay h-full"></label>
      <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
        <div class="w-64 space-y-6">
          <div class="card bg-base-200 shadow-sm">
              <div class="card-body">
                <button type="button" wire:click="resetFilters" class="md:mt-5 btn btn-primary btn-md w-full md:auto mb-2  min-w-40 flex justify-center items-center gap-2">
                  Reset Filters
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                  </svg>
                  
                </button>

                <div class="divider"></div>

                  <div class="form-control">
                    <label class="label mb-2">
                        <span class="label-text">Experience Level</span>
                    </label>
                        <select class="select select-bordered" wire:model.live="experience">
                          <option class="hidden">Select Experience Level</option>
                          @foreach($job_experiences as $experience)
                          <option value="{{$experience->id}}">{{$experience->name}}</option>
                          @endforeach
                        </select>
                    
                </div>

                <div class="divider"></div>

                <div class="form-control">
                  <label class="label mb-2">
                      <span class="label-text">Job Type</span>
                  </label>
                      <select class="select select-bordered" wire:model.live="job_type">
                        <option class="hidden">Select Job Type</option>
                        @foreach($job_types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                      </select>
                  
              </div>

              <div class="divider"></div>

              @php
$companies = App\Models\Company::all(); 
            @endphp
            <div class="form-control" wire:ignore>
              <label class="label mb-2">
                <span class="label-text">Company</span>
            </label>
              <select id="company" wire:model.live="company" class="select w-full select-bordered">
                  @foreach ($companies as $company)
                      <option value="{{ $company->id }}">{{ $company->name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="divider"></div>

              <div class="form-control">
                <label class="label mb-2">
                    <span class="label-text">Education</span>
                </label>
                @foreach ($educations as $education)
                <label class="flex items-center gap-2 mb-2">
                  <input type="checkbox" wire:model.live="job_educations" value="{{$education->id}}" class="checkbox checkbox-sm">
                  <span class="text-sm">{{$education->name}}</span>
              </label>
                @endforeach   
            </div>

            <div class="divider"></div>

            <div class="form-control" wire:ignore>
              <label class="label mb-2">
                  <span class="label-text">Skills</span>
              </label>
              <select multiple id="job_skills">
                 @foreach ($skills as $skill)
                 <option value="{{$skill->id}}">{{$skill->name}}</option>
                 @endforeach   
               </select>
            </label>
          </div>
     
                @php
$customEducationOptions = \App\Models\JobPost::pluck('custom_educations')
  ->filter()
  ->flatten()
  ->unique()
  ->values();
              @endphp
              
            <div class="divider"></div>

                <div class="form-control" wire:ignore>
                  <label class="label mb-2">
                    <span class="label-text">Custom Education</span>
                </label>
                  <select id="custom-educations" multiple class="select w-full select-bordered">
                      @foreach ($customEducationOptions as $option)
                          <option value="{{ $option }}">{{ $option }}</option>
                      @endforeach
                  </select>
              </div>
  
                  <div class="divider"></div>

                  @php
$custom_skills = \App\Models\JobPost::pluck('custom_skills')->flatten()->filter()->unique()->values();
                  @endphp
                  <div class="form-control" wire:ignore>
                    <label class="label mb-2">
                      <span class="label-text">Custom Skills</span>
                  </label>
                    <select multiple  id="custom_skills">
                      @foreach ($custom_skills as $skill)
                      <option value="{{$skill}}">{{$skill}}</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-control" wire:ignore>
                      <label class="label">
                          <span class="label-text">Salary Range</span>
                      </label>
                      <div>
                        <label class="label">
                          <span class="label-text">Salary Above</span>
                      </label>
                      <input wire:model.live="salary_above" type="range" min="0" max="100000" class="range range-primary range-xs" oninput="this.nextElementSibling.nextElementSibling.value =`$`+this.value">
                      <div class="flex justify-between text-xs px-2">
                          <span>$0</span>
                          <span>$100k+</span>
                      </div>
                      <output></output>
                      </div>
                      <div>
                        <label class="label">
                          <span class="label-text">Salary Below</span>
                      </label>
                      <input wire:model.live="salary_below" type="range" min="0" max="100000" class="range range-primary range-xs" oninput="this.nextElementSibling.nextElementSibling.value =`$`+this.value">
                      <div class="flex justify-between text-xs px-2">
                          <span>$0</span>
                          <span>$100k+</span>
                      </div>
                      <output></output>
                      </div>
                  </div>

                  <div class="divider"></div>
              </div>
          </div>
      </div>
      </ul>
    </div>
  </div>
<section class="bg-base-200 py-16">
  <div class="z-0 pointer-events-none absolute top-0 right-0 opacity-10 -translate-y-1/3">
      <svg viewBox="0 0 200 200" class="w-[600px] h-[600px]" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M46.9,-49.3C59.6,-36.1,67.3,-18,66.6,-0.7C65.9,16.6,56.8,33.2,44.1,44.3C31.4,55.3,15.7,60.9,-1.7,62.6C-19.1,64.3,-38.2,62.2,-50.4,51.2C-62.6,40.2,-67.8,20.1,-66.9,0.7C-66.1,-18.7,-59.3,-37.3,-47.1,-50.5C-34.9,-63.7,-17.4,-71.3,0.7,-71.9C18.8,-72.6,37.6,-66.2,46.9,-49.3Z" transform="translate(100 100)"></path>
      </svg>
    </div>
    <div class="absolute  z-0 pointer-events-none  inset-0 opacity-10">
      <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/3 opacity-100">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor" d="M44.8,-65.2C56.1,-56.5,61.3,-40.7,67.7,-25.2C74.1,-9.7,81.7,5.5,80.1,19.3C78.5,33.1,67.8,45.4,55.1,53.9C42.4,62.4,27.7,67.1,12.6,69.9C-2.5,72.7,-18,73.6,-30.1,67.7C-42.2,61.8,-50.9,49,-58.9,36.1C-66.9,23.1,-74.3,10.1,-75.9,-4.3C-77.5,-18.7,-73.4,-37.3,-63.5,-49.6C-53.7,-61.8,-38.1,-67.6,-23.4,-74.8C-8.7,-82,5.1,-90.5,19.9,-89.4C34.7,-88.4,50.4,-77.7,59.1,-63.8C67.8,-49.9,69.5,-32.7,71.7,-16.7C73.9,-0.7,76.6,14.1,72.3,25.5C68,36.9,56.7,44.9,45.9,54.2C35.1,63.5,24.7,74.1,11.8,78.8C-1.1,83.5,-16.6,82.3,-28.4,75.3C-40.2,68.3,-48.4,55.5,-57.7,43.3C-67,31.1,-77.4,19.5,-80.4,6.2C-83.5,-7.2,-79.1,-22.3,-70.7,-33.2C-62.3,-44.1,-49.8,-50.8,-37.4,-58.8C-25,-66.8,-12.5,-76.2,1.8,-79.3C16.2,-82.5,32.4,-79.5,44.8,-65.2Z" transform="translate(100 100)"></path>
        </svg>
      </div>
    </div>
  <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6">Discover Top Jobs</h1>
      <div class="max-w-3xl mx-auto">
          <div class="join w-full">
              <input type="text" wire:model.live="search" placeholder="Search Job Title Or Kewywords..." class="input select-bordered join-item w-full">
          </div>
      </div>
  </div>
</section>

<pre>
  {{-- {{print_r($jobs->toArray())}} --}}
</pre>

<main class="container mx-auto px-4 py-8">
    <!-- Search and Filters Section -->
    <div class="flex flex-col md:flex-row gap-6 mb-8 bg-base-200 rounded-box p-4">
      <!-- Search Bar -->
      <div class="flex-1">
                              <form class="flex flex-col md:flex-row gap-4 items-center w-full">
              {{-- location fieldset --}}
            <fieldset class="flex-1 w-full flex flex-col md:flex-row md:w-auto gap-1 border-2 border-base-300 rounded-lg pb-2 pl-2 pr-2">
              <legend class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                Location
              </legend>
              {{-- city input --}}
              <div class="flex-1 w-full">
                <!-- city input -->
            
                <div class="relative">
            
            
                  <select id="citySelect" wire:model.live="city" class="select select-bordered w-full select-md">
                    <option class="hidden">Select City</option>
                    @foreach ($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
          @endforeach
                  </select>
            
                </div>
              </div>
            
              {{-- city area input --}}
              <div class="flex-1 w-full">
            
                <div class="relative">
                  <select wire:model.live="city_area" class="select select-bordered w-full select-md">
        <option class="hidden">Select City Area</option>
        @foreach ($city_areas as $area)
      <option value="{{$area->id}}">{{$area->name}}</option>
    @endforeach
                  </select>
            
                </div>
              </div>
            
            </fieldset>

            {{-- industry fieldset --}}
            <fieldset class="flex-1 w-full flex flex-col md:flex-row md:w-auto gap-1 border-2 border-base-300 rounded-lg pb-2 pl-2 pr-2">
              <legend class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                </svg>
                Industry
              </legend>
          {{-- industry input --}}
                <div class="flex-1 w-full">
          
                          <div class="relative">
                            <select wire:model.live="industry" class="select select-bordered w-full select-md">
                                          <option class="hidden">Select Industry</option>
                                          @foreach ($industries as $industry)
                                          <option value="{{$industry->id}}">{{$industry->name}}</option>
                                          @endforeach
                                        </select>
                            
                          </div>
                  </div>

                  <div class="flex-1 w-full">
          
                    <div class="relative">
                      <select wire:model.live="sub_industry" class="select select-bordered w-full select-md">
                                    <option class="hidden">Select Sub Industry</option>
                                    @foreach ($sub_industries as $sub_industry)
                                    <option value="{{$sub_industry->id}}">{{$sub_industry->name}}</option>
                                    @endforeach
                                  </select>
                      
                    </div>
            </div>
            
            </fieldset>

            {{-- Sort fieldset --}}
            <fieldset class="flex-1 w-full flex flex-col md:flex-row md:w-auto gap-1 border-2 border-base-300 rounded-lg pb-2 pl-2 pr-2">
              <legend class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Sort By
              </legend>

                        {{-- Company Size Filter --}}
                        <div class="flex-1 w-full">
          
                          <div class="relative">
                            <select wire:model.live="job_setting" class="select select-bordered w-full select-md">
                                          <option class="hidden">Job Setting</option>
                                          <option value="onsite">Onsite</option>
                                          <option value="remote">Remote</option>
                                          <option value="hybrid">Hybrid</option>
                                        </select>
                            
                          </div>
                        </div>

                               <!-- Order By -->
                <div class="flex-1 w-full">
          
                  <div class="relative">
                    <select wire:model.live="sort" class="select select-bordered w-full select-md">
                                  <option class="hidden">Order By</option>
                                  <option value="1">Date</option>
                                  <option value="2">Alphabetical</option>
                                  {{-- <option value="3">Job Openings</option> --}}
                                </select>
                    
                  </div>
                </div>

            </fieldset>

                <!-- Reset Button -->
                <div class="w-full md:w-auto">
                  <button type="button" wire:click="resetFilters" class="md:mt-5 btn btn-primary btn-md w-full md:auto  min-w-40 flex justify-center items-center gap-2">
                    Reset Filters
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    
                  </button>
                </div>
              </form>
      </div>        
  </div>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="hidden md:!block md:w-64 space-y-6">
            <div class="card bg-base-200 shadow-sm">
                <div class="card-body">
                    {{-- <h3 class="font-bold mb-4">Filters</h3> --}}
                    
                    <div class="form-control">
                      <label class="label mb-2">
                          <span class="label-text">Experience Level</span>
                      </label>
                          <select class="select select-bordered" wire:model.live="experience">
                            <option class="hidden">Select Experience Level</option>
                            @foreach($job_experiences as $experience)
                            <option value="{{$experience->id}}">{{$experience->name}}</option>
                            @endforeach
                          </select>
                      
                  </div>

                  <div class="divider"></div>

                  <div class="form-control">
                    <label class="label mb-2">
                        <span class="label-text">Job Type</span>
                    </label>
                        <select class="select select-bordered" wire:model.live="job_type">
                          <option class="hidden">Select Job Type</option>
                          @foreach($job_types as $type)
                          <option value="{{$type->id}}">{{$type->name}}</option>
                          @endforeach
                        </select>
                    
                </div>

                <div class="divider"></div>
                <div class="form-control" wire:ignore>
                  <label class="label mb-2">
                    <span class="label-text">Company</span>
                </label>
                  <select id="company" wire:model.live="company" class="select w-full select-bordered">
                      @foreach ($companies as $company)
                          <option value="{{ $company->id }}">{{ $company->name }}</option>
                      @endforeach
                  </select>
              </div>

              <div class="divider"></div>

                <div class="form-control">
                  <label class="label mb-2">
                      <span class="label-text">Education</span>
                  </label>
                  @foreach ($educations as $education)
                  <label class="flex items-center gap-2 mb-2">
                    <input type="checkbox" wire:model.live="job_educations" value="{{$education->id}}" class="checkbox checkbox-sm">
                    <span class="text-sm">{{$education->name}}</span>
                </label>
                  @endforeach   
              </div>

              <div class="divider"></div>

              <div class="form-control" wire:ignore>
                <label class="label mb-2">
                    <span class="label-text">Skills</span>
                </label>
                <select multiple id="job_skills">
                   @foreach ($skills as $skill)
                   <option value="{{$skill->id}}">{{$skill->name}}</option>
                   @endforeach   
                 </select>
              </label>
            </div>

              <div class="divider"></div>

                  <div class="form-control" wire:ignore>
                    <label class="label mb-2">
                      <span class="label-text">Custom Education</span>
                  </label>
                    <select id="custom-educations" multiple class="select w-full select-bordered">
                        @foreach ($customEducationOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </select>
                </div>
    
                    <div class="divider"></div>
                    
                    <div class="form-control" wire:ignore>
                      <label class="label mb-2">
                        <span class="label-text">Custom Skills</span>
                    </label>
                      <select multiple  id="custom_skills">
                        @foreach ($custom_skills as $skill)
                        <option value="{{$skill}}">{{$skill}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-control" wire:ignore>
                        <label class="label">
                            <span class="label-text">Salary Range</span>
                        </label>
                        <div>
                          <label class="label">
                            <span class="label-text">Salary Above</span>
                        </label>
                        <input wire:model.live="salary_above" type="range" min="0" max="100000" class="range range-primary range-xs" oninput="this.nextElementSibling.nextElementSibling.value =`$`+this.value">
                        <div class="flex justify-between text-xs px-2">
                            <span>$0</span>
                            <span>$100k+</span>
                        </div>
                        <output></output>
                        </div>
                        <div>
                          <label class="label">
                            <span class="label-text">Salary Below</span>
                        </label>
                        <input wire:model.live="salary_below" type="range" min="0" max="100000" class="range range-primary range-xs" oninput="this.nextElementSibling.nextElementSibling.value =`$`+this.value">
                        <div class="flex justify-between text-xs px-2">
                            <span>$0</span>
                            <span>$100k+</span>
                        </div>
                        <output></output>
                        </div>
                    </div>

                    <div class="divider"></div>
                </div>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="flex-1">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <!-- Job Card Redesigned -->

                @foreach ($jobs as $job)   
                <div class="card bg-base-200 shadow-md hover:shadow-xl transition-shadow duration-300 group">
                  <div class="card-body">
                  <div class="flex items-start justify-between mb-4">
                    <div class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
                    @if($job->company->image && Storage::disk('public')->exists('/images/' . $job->company->image))
                    <img src="{{asset('storage/images/' . $job->company->image)}}" alt="">
                    @else
                    <div class="text-primary font-bold">
                     @php
              $cname = '';
              foreach (explode(' ', $job->company->name) as $name) {
              $cname .= ucfirst(substr($name, 0, 1));
              }
                     @endphp
                     {{$cname}}
                    </div>
                    @endif
                    </div>
                    <div class="flex items-center gap-2">
              
                      @if($job->urgently_hiring == 1)
                      <div class="flex flex-col gap-2">
                        <span class="badge badge-error badge-sm h-auto animate-pulse">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                  </svg>
                                  Urgently Hiring
                                </span>
                    </div>
                  <!-- "New" Badge for urgency -->
                  @elseif ($job->created_at->gt(now()->subDays(7)))
              <span class="badge badge-primary badge-sm">New</span>
              @endif
                  <!-- Favorite Button -->
                  {{-- @if($job) --}}
                    <div class="tooltip" data-tip="Remove From Saved">
                      <button class="btn btn-ghost btn-sm text-error">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                    </div>
                    {{-- @else --}}
                  <div class="tooltip" data-tip="Save Job">
                    <button class="btn btn-ghost btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                      </svg>
                    </button>
                  </div>
                  {{-- @endif --}}
                  </div>
                  </div>
              
                  <h3 class="transition hover:underline card-title mb-2 md:min-h-[60px] lg:min-h-[auto]">
                    <a wire:navigate href="{{route('job.view', ['id' => $job->id, 'slug' => $job->slug])}}">
                    {{Str::limit($job->title, 30, '.....')}}
                    </a>
                    </h3>
                  <div class="text-sm text-base-content/70 mb-4">
                    <p><a class="hover:underline" wire:navigate href="{{route('companies')}}">{{$job->company->name}}</a> • {{ $job->city_area->name }}, {{ $job->city->name }}</p>
                    <p class="flex items-center gap-2 font-bold mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                     Rs {{number_format($job->min_salary)}} - Rs {{number_format($job->max_salary)}}</p>
                  </div>
              
                  <div class="flex flex-wrap gap-2 mb-6">
                    <span class="badge badge-outline">{{$job->job_type->name}}</span>
                    <span class="badge badge-outline">{{ucfirst($job->job_setting)}}</span>
                    @php
              $diff = round($job->created_at->diffInDays(now()));
                    @endphp
                    @if ($diff == 0)
                     <span class="badge badge-outline text-xs">
                    Today
                     </span>
                     @else
                     <span class="badge badge-outline text-xs">
                    {{$diff}} {{Str::plural('day', $diff)}} ago
                     </span>
                    @endif
                    </div>
                  <a wire:navigate href="{{route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug])}}">
                  <div class="card-actions">
                    <button class="btn btn-primary flex gap-4 w-full">
                    Apply Now
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>                    
                    </button>
                  </div>
                  </a>
                  </div>
                </div>
              

        @endforeach
            </div>

            <!-- Pagination -->
            {{$jobs->links('pagination::tailwind')}}
        </div>
    </div>
</main>
</div>

@push('scripts')
<script type="module" src="/js/jobs.js"></script>  
@endpush