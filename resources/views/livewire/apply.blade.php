<div>
    <!-- The whole world belongs to you. -->
    <main class="container mx-auto px-4 py-8">
        <!-- Job Overview -->
        <div class="card bg-base-200 px-6 py-4 mb-8">
            <div class="flex justify-between items-start">
                <!-- Left Content -->
                <div class="flex-1 gap-2">
                    <!-- Job Title -->
                    <div class="w-full flex-col md:flex-row flex justify-between gap-2 items-start mb-4">
                        <h1 class="text-2xl font-bold mb-2">{{$job->title}}</h1>
                         <!-- Urgency Badge -->
                @if($job->urgently_hiring == 1)
                <span class="badge badge-error animate-pulse h-auto md:gap-1 md:mt-1 md:ml-4">
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
                        @if($job->company->image && Storage::disk('public')->exists('/images/companies/'.$job->company->image))
                        <img loading="lazy" src="{{asset('storage/images/companies/'.$job->company->image)}}" class="w-12 h-12 rounded-box bg-primary/10 flex items-center justify-center">
                        </img>
                        @else
                        <div class="w-12 h-12 rounded-box bg-primary/10 flex items-center justify-center">
                          <span class="font-bold text-primary">  
                           
                          @php
                          $name = explode(' ',$job->company->name);
                          $initials = '';
                          foreach($name as $initial){
                            $initials.= substr($initial, 0, 1);
                          }
                          @endphp
                         {{$initials}}
                          </span>
                        </div>
                      
                        @endif
                        <div>                  
                            <h2 class="font-semibold text-lg">
                                <a class="text-primary hover:underline" 
                                        wire:navigate href="{{route('company.view', [
                      'id'=>$job->company->id,'slug'=>App\Helpers\MyFunc::sexySlug($job->company->name, time : false)])}}">{{$job->company->name}}</a>
                            </h2>
                            <div class="text-sm text-base-content/70"><a class="hover:underline" wire:navigate
                                    href="{{route('jobs', ['industry' => $job->industry->id])}}">{{$job->company->industry->name}}</a>
                                • {{$job->company->company_size}} Employees</div>
                        </div>
                    </div>

                    <!-- Job Specifics -->
                    <div class="flex flex-col flex-wrap gap-3">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                              </svg>
                            <a class="hover:underline" wire:navigate href="{{route('jobs', ['city' => $job->city->id])}}">{{$job->city->name}}</a>, <a class="hover:underline" wire:navigate href="{{route('jobs', ['city_area' => $job->city_area->id])}}">{{$job->city_area->name}}</a>,
                            {{$job->address}}
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Application Deadline: 2024-03-31</span>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
        
    
        <!-- Application Form -->
        <form wire:submit="apply" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information -->
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Personal Information</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Full Name</span>
                                </label>
                                <input wire:model.live.debounce.500ms="name" type="text" class="input input-bordered" required="">
                                @error('name')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email Address</span>
                                </label>
                                <input wire:model.live.debounce.500ms="email" type="email"  value="{{Auth::user()->email}}"class="input input-bordered" required="">
                                @error('email')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Phone Number</span>
                                </label>
                                <input wire:model.live.debounce.500ms="contact" type="tel" {{Auth::user()->contact}} class="input input-bordered" required="">
                                @error('contact')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Resume Upload -->
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Resume/CV</h2>
                        <div class="form-control">
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col w-full h-auto2 border-4 border-dashed hover:border-primary cursor-pointer">
                                    <div class="flex flex-col items-center justify-center pt-7">
                                        @if($resume_name)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-12 w-12 text-primary">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                          </svg>  
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        @endif
                                        @if($resume_name)
                                        <p class="pt-1 text-sm break-words whitespace-normal text-center max-w-full">{{$resume_name}}
                                        </p>
                                        <p class="pt-1 text-sm">click to Change</p>
                                        @else
                                        <p class="pt-1 text-sm">click to upload</p>
                                    @endif
                                        <p class="text-xs text-base-content/70">PDF, DOC, DOCX (Max 5MB)</p>
                                    </div>
                                    {{-- @endif --}}
                                    <input type="file" wire:model.live.debounce.500ms="resume" class="opacity-0" accept=".pdf,.doc,.docx">
                                    @error('resume_name')
                                    <span class="text-center text-error mb-2 break-words whitespace-normal  max-w-full">
                                        {{$message}}
                                    </span>
                                    @enderror
                                    @error('resume')
                                    <span class="text-center text-error mb-2">
                                        {{$message}}
                                    </span>
                                @enderror
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
    
                {{-- <!-- Cover Letter -->
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Cover Letter</h2>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Letter to Employer (Optional)</span>
                            </label>
                            <textarea wire:model="cover_letter" class="textarea textarea-bordered h-32" placeholder="Explain why you're a good fit..."></textarea>
                        </div>
                        @error('cover_letter')
                            {{$message}}
                        @enderror
                    </div>
                </div> --}}
    
                {{-- <!-- Additional Questions -->
                <div class="card bg-base-200 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Additional Questions</h2>
                        <div class="space-y-4">
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Why do you want to work at Tech Leaders Inc.?</span>
                                </label>
                                <textarea class="textarea textarea-bordered h-24" required=""></textarea>
                            </div>
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Expected Salary ($)</span>
                                </label>
                                <input type="number" class="input input-bordered" placeholder="Enter amount...">
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
    
            <!-- Right Column -->
            <div class="space-y-6">
                <!-- Application Summary -->
                <div class="card bg-base-200 shadow-sm sticky top-4">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Application Summary</h2>
                        <div class="space-y-4">
                             <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                                {{-- {{dd($name)}} --}}
                                <span class="text-base-content/70">Name:</span>
                                <input class="w-full font-medium bg-transparent cursor-text" value="{{$full_name}}" disabled="" readonly="" title="{{$full_name}}"> <!-- Added truncate and title -->
                            </div>
                            <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                                <span class="text-base-content/70">Email:</span>
                                <input class="w-full font-medium bg-transparent cursor-text" value="{{$email}}" disabled="" readonly="" title="{{$email}}"> <!-- Added truncate and title -->
                            </div>
                             <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                                <span class="text-base-content/70">Contact:</span>
                                <input class="w-full font-medium bg-transparent cursor-text" value="{{$contact}}" disabled="" readonly="" title="{{$contact}}"> <!-- Added truncate and title -->
                            </div>
                            <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                                <span class="text-base-content/70">Resume:</span>
                                <input class="w-full font-medium bg-transparent cursor-text" disabled="" readonly=""
                                @if($resume_name)value="{{$resume_name}}" title="{{$contact}}@endif"> <!-- Added truncate and title -->
                            </div>
                        </div>
                        
                        <div class="divider"></div>
                        
                        <div class="form-control">
                            <label class="label cursor-pointer justify-start gap-2">
                                <input type="checkbox" class="checkbox checkbox-primary checkbox-sm" required="">
                                <span class="label-text">I agree to the <a href="#" class="link link-primary">Terms &amp; Conditions</a></span>
                            </label>
                        </div>
                
                        <button class="btn btn-primary btn-block mt-4" type="submit">
                            <span wire:loading.class="loading loading-spinner">
                                Submit Application
                            </span>
                        </button>
                
                    </div>
                </div>
            </div>
        </form>
    </main>
    @includeIf('livewire.partials.alert')
</div>

@push('scripts')
<script type="module" src="/js/apply.js"></script>
@endpush