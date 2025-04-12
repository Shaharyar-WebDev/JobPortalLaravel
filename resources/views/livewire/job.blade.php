<div>
    <main class="container mx-auto px-8 py-8">
        <!-- Breadcrumbs -->
        {{-- <pre>

            {{print_r($job->job_skills->toArray())}}

        </pre> --}}
        <div class="text-sm breadcrumbs mb-8">
            <ul>
                <li><a wire:navigate href="{{route('home')}}">Home</a></li>
                <li><a wire:navigate href="{{route('jobs')}}">Jobs</a></li>
                <li><a wire:navigate
                        href="{{route('jobs', ['industry' => $job->industry->id])}}">{{$job->industry->name}}</a></li>
                <li class="text-primary">{{$job->title}}</li>
            </ul>
        </div>

        <div class="flex flex-col md:flex-row lg:flex-row gap-8">
            <!-- Main Content -->
            <div class="flex-1">
                <!-- Job Header -->
                <div class="card bg-base-200 px-6 py-4 mb-8">
                    <div class="flex justify-between items-start">
                        <!-- Left Content -->
                        <div class="flex-1 gap-2">
                            <!-- Job Title -->
                            <div class="w-full flex-col md:flex-row flex justify-between gap-2 items-start mb-4">
                                <h1 class="text-2xl font-bold mb-2">{{$job->title}}</h1>
                                 <!-- Urgency Badge -->
                        @if($job->urgently_hiring == 1)
                        <span class="badge badge-error h-auto md:gap-1 md:mt-1 md:ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Urgently Hiring
                        </span>
                    @endif
                            </div>

                            <!-- Company Info -->
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-12 h-12 rounded-box bg-primary/10 flex items-center justify-center">
                                    <span class="text-lg font-bold text-primary">TL</span>
                                </div>
                                <div>
                                    <h2 class="font-semibold text-lg">
                                        <a class="hover:underline" wire:navigate href="">{{$job->company->name}}</a>
                                    </h2>
                                    <div class="text-sm text-base-content/70"><a class="hover:underline" wire:navigate
                                            href="{{route('jobs', ['industry' => $job->industry->id])}}">{{$job->company->industry->name}}</a>
                                        • {{$job->company->company_size}} Employees</div>
                                </div>
                            </div>

                            <!-- Job Specifics -->
                            <div class="flex flex-wrap gap-3">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                      </svg>
                                    <a class="hover:underline" wire:navigate href="{{route('jobs', ['city' => $job->city->id])}}">{{$job->city->name}}</a>, <a class="hover:underline" wire:navigate href="{{route('jobs', ['city_area' => $job->city_area->id])}}">{{$job->city_area->name}}</a>,
                                    {{$job->address}}
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>

                <!-- Job Details -->
                <div class="space-y-8">
                    <!-- Overview -->
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title mb-4">Job Overview</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Job Setting -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0H5m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Job Setting</div>
                                        <div class="font-medium">{{ucfirst($job->job_setting)}}</div>
                                    </div>
                                </div>
                    
                                <!-- Location Details -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Location</div>
                                        <div class="space-y-1">
                                            <div class="font-medium">{{$job->city->name}}</div>
                                            <div class="text-sm">{{$job->city_area->name}}</div>
                                            <div class="text-sm text-base-content/70">{{$job->address}}</div>
                                        </div>
                                    </div>
                                </div>
                    
                                <!-- Industry & Sub-Industry -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Industry</div>
                                        <div class="font-medium">{{$job->industry->name}}</div>
                                        <div class="text-sm text-base-content/70">{{$job->sub_industry->name}}</div>
                                    </div>
                                </div>
                    
                                <!-- Job Type -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Job Type</div>
                                        <div class="font-medium">{{ucfirst($job->job_type->name)}}</div>
                                    </div>
                                </div>
                     <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                          </svg>                                          
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Salary Range</div>
                                        <div class="font-medium">Rs {{$job->min_salary}} - Rs {{$job->max_salary}}</div>
                                    </div>
                                </div>
                    
                                <!-- Application Deadline -->
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Apply Before</div>
                                        <div class="font-medium">{{$job->apply_before}}</div>
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Experience & Education -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Experience Required</div>
                                        <div class="font-medium">{{$job->experience->name}}</div>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        
                                        <div class="text-sm text-base-content/70 mb-1">Required Skills</div>
                                        <div class="flex flex-wrap gap-2">
                                        
                                            @foreach ($job->job_skills as $skill)
                                            <span class="badge badge-outline">{{$skill->name}}</span>
                                            @endforeach
                                        
                                            @if($job->custom_skills)
                                                @foreach($job->custom_skills as $custom_skill)
                                                <span class="badge badge-outline">{{$custom_skill}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                        </div>
                                </div>
                    
                                <div class="flex items-start gap-4">
                                    <div class="text-primary pt-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zM12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-base-content/70 mb-1">Education</div>
                                        <div class="flex flex-wrap gap-2">
                                            @foreach ($job->job_educations as $education)
                                            <span class="badge badge-outline">{{$education->name}}</span>
                                            @endforeach
                                        
                                            @if($job->custom_educations)
                                                @foreach($job->custom_educations as $custom_education)
                                                <span class="badge badge-outline">{{$custom_education}}</span>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Job Description -->
                    <div class="space-y-6 px-4 py-4 md:px-8 md:py-8 bg-base-200 card">
                       {!!$job->description!!}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-96">
                <div class="space-y-6">
                    <!-- Apply Box -->
                    <div class="card bg-base-200 shadow-sm">
                        <div class="card-body">
                            <a wire:navigate href="{{route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug])}}">
                            <button class="btn btn-primary btn-block">Apply Now</button>
                            <div class="flex justify-center gap-4 mt-4">
                                <button class="btn btn-ghost btn-sm gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                                        </path>
                                    </svg>
                                    Share
                                </button>
                                </a>
                                <button class="btn btn-ghost btn-sm gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Related Jobs -->
                    <div class="shadow-sm">
                        <h2 class="card-title mb-4">Related Jobs</h2>
                        <div class="space-y-4 h-[80vh] max-h-auto overflow-y-scroll">
                            <!-- Related Job 1 -->
                            @foreach ($related_jobs as $related_job)
                            <div class="card bg-base-200 shadow-md hover:shadow-xl transition-shadow duration-300 group">
                              <div class="card-body">
                                <div class="flex items-start justify-between mb-4">
                                  <div class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
                                    @if($related_job->company->image && Storage::disk('public')->exists('/images/'.$related_job->company->image))
                                    <img src="{{asset('storage/images/'.$related_job->company->image)}}" alt="">
                                    @else
                                    <div class="text-primary font-bold">
                                     @php
                                      $cname = '';
                                     foreach(explode(' ', $related_job->company->name) as $name){
                                      $cname.= ucfirst(substr($name,0,1 ));
                                     }
                                     @endphp
                                     {{$cname}}
                                    </div>
                                    @endif
                                  </div>
                                  <div class="flex items-center gap-2">
                                <!-- "New" Badge for urgency -->
                                @if ($related_job->created_at->gt(now()->subDays(7)))
                                <span class="badge badge-primary badge-sm">New</span>
                                @endif
                                
                                @if($related_job->urgently_hiring == 1)
                                <span class="badge badge-error badge-sm h-auto">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                      stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                  </svg>
                                  Urgently Hiring
                              </span>
                                @endif
                                <!-- Favorite Button -->
                                <button class="btn btn-ghost btn-sm">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                  </svg>
                                </button>
                              </div>
                                </div>
                                
                                <h3 class="transition hover:underline card-title mb-2 md:min-h-[60px] lg:min-h-[auto]">
                                  <a wire:navigate href="{{route('job.view', ['id' => $related_job->id, 'slug' => $related_job->slug])}}">
                                    {{Str::limit($related_job->title, 30, '.....')}}
                                  </a>
                                  </h3>
                                <div class="text-sm text-base-content/70 mb-4">
                                  <p><a class="hover:underline" wire:navigate href="{{route('companies')}}">{{$related_job->company->name}}</a> • {{ $related_job->city_area->name }}, {{ $related_job->city->name }}</p>
                                  <p class="flex items-center gap-2 font-bold mt-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                    </svg>
                                     Rs {{number_format($related_job->min_salary)}} - Rs {{number_format($related_job->max_salary)}}</p>
                                </div>        
                                <div class="flex flex-wrap gap-2 mb-6">
                                  <span class="badge badge-outline">{{$related_job->job_type->name}}</span>
                                  <span class="badge badge-outline">{{ucfirst($related_job->job_setting)}}</span>
                                  @php
                                    $diff = round($related_job->created_at->diffInDays(now()));
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
                                <a wire:navigate href="{{route('home')}}">
                                <div class="card-actions">
                                  <button class="btn btn-primary btn-block">
                                    Apply Now
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                  </button>
                                </div>
                              </a>
                              </div>
                            </div>           
                            @endforeach                         
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>