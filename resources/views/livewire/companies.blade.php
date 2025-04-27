<div>
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
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Discover Top Companies</h1>
        <div class="max-w-3xl mx-auto">
            <div class="join w-full">
                <input type="text" wire:model.live.debounce.200ms="search" placeholder="Search companies..." class="input select-bordered join-item w-full">
            </div>
        </div>
    </div>
</section>

<main class="container mx-auto px-4 py-8">

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
              
              
                    <select id="citySelect" wire:model.live.debounce.200ms="city" class="select select-bordered w-full select-md">
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
                    <select wire:model.live.debounce.200ms="city_area" class="select select-bordered w-full select-md">
                      @if (!$city_areas)
              <option class="hidden">Please Select City</option>
            @else
          <option class="hidden">Select City Area</option>
          @foreach ($city_areas as $area)
        <option value="{{$area->id}}">{{$area->name}}</option>
      @endforeach
        @endif
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
                              <select wire:model.live.debounce.200ms="industry" class="select select-bordered w-full select-md">
                                            <option class="hidden">Select Industry</option>
                                            @foreach ($industries as $industry)
                                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                                            @endforeach
                                          </select>
                              
                            </div>
                    </div>

                    <div class="flex-1 w-full">
            
                      <div class="relative">
                        <select wire:model.live.debounce.200ms="sub_industry" class="select select-bordered w-full select-md">
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
                              <select wire:model.live.debounce.200ms="company_size" class="select select-bordered w-full select-md">
                                            <option class="hidden">Company Size</option>
                                            <option value="1-50">Small (1 - 50)</option>
                                            <option value="51-500">Medium (51 - 500) </option>
                                            <option value="500+">Large (500+)</option>
                                          </select>
                              
                            </div>
                          </div>

                                 <!-- Order By -->
                  <div class="flex-1 w-full">
            
                    <div class="relative">
                      <select wire:model.live.debounce.200ms="sort" class="select select-bordered w-full select-md">
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
  
    <div class="w-100 text-center mt-12 mb-8">
        <span class="text-2xl">{{$num_of_comp}} Companies Available</span>
    </div>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Company Card -->
                @foreach ($companies as $company)
                <div class="card bg-base-200 shadow-md hover:shadow-xl  transition-shadow duration-300 group">
                    <div class="card-body items-center text-center">
                      <!-- Company Logo -->
                      @if($company->image && Storage::disk('public')->exists('/images/companies/'.$company->image))
                      <img loading="lazy" src="{{asset('storage/images/companies/'.$company->image)}}" class="w-20 h-20 rounded-2xl bg-primary/10 mb-6 flex items-center justify-center">
                      </img>
                      @else
                      <div class="w-20 h-20 rounded-2xl bg-primary/10 mb-6 flex items-center justify-center">
                        <span class="text-2xl font-bold text-primary">  
                        @php
                        $name = explode(' ',$company->name);
                        $initials = '';
                        foreach($name as $initial){
                          $initials.= substr($initial, 0, 1);
                        }
                        @endphp
                       {{$initials}}
                        </span>
                      </div>
                    
                      @endif
                      
                      <h3 class="card-title mb-2"><a class="hover:underline" wire:navigate href="{{route('company.view', [
                      'id'=>$company->id,'slug'=>App\Helpers\MyFunc::sexySlug($company->name, time : false)])}}">{{$company->name}}</a></h3>
                      <p class="text-sm text-base-content/70 mb-4">{{$company->industry->name}}</p>

                      <p class="text-sm text-base-content/70 mb-4 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                      </svg>
                      {{$company->city->name}} ,{{$company->city_area->name}}</p>

                      <p class="text-sm text-base-content/70 mb-4">Company Size: {{$company->company_size}} employees</p>
                      
                      <div class="badge badge-primary badge-lg mb-4">
                        {{$company->job_posts_count}} {{Str::plural('Job', $company->job_posts_count)}} Available
                      </div>
                      
                      <a wire:navigate href="{{route('jobs', ['company'=>$company->id])}}">
                      <button class="btn btn-outline btn-primary btn-sm gap-2">
                        View Jobs
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                      </button>
                    </a>
                    </div>
                  </div>
                @endforeach

                @if(count($companies) == 0)
    <!-- Empty State -->
    <div class="col-span-4 w-full flex justify-center items-center">
      <div class="text-center py-16">
    <div class="max-w-md mx-auto mb-8">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-24 w-24 mx-auto text-base-content/20">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
      </svg>
    </div>
    <h2 class="text-xl font-bold mb-4">No Companies</h2>
    <p class="text-base-content/70 mb-6">Please Check Back Later</p>
    <a wire:navigate href="{{route('employer.jobs-add')}}" class="btn btn-primary mt-4 md:mt-0 gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>          
        Post a Job
    </a>
      </div>
    </div>
                @endif

            </div>

            {{$companies->links('pagination::tailwind')}}
  
</main>

</div>