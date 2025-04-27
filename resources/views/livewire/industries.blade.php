<div>
    <section class="bg-base-200 py-16">
    <div class="absolute z-0 pointer-events-none top-0 right-0 opacity-10 -translate-y-1/3">
        <svg viewBox="0 0 200 200" class="w-[600px] h-[600px]" xmlns="http://www.w3.org/2000/svg">
          <path fill="currentColor" d="M46.9,-49.3C59.6,-36.1,67.3,-18,66.6,-0.7C65.9,16.6,56.8,33.2,44.1,44.3C31.4,55.3,15.7,60.9,-1.7,62.6C-19.1,64.3,-38.2,62.2,-50.4,51.2C-62.6,40.2,-67.8,20.1,-66.9,0.7C-66.1,-18.7,-59.3,-37.3,-47.1,-50.5C-34.9,-63.7,-17.4,-71.3,0.7,-71.9C18.8,-72.6,37.6,-66.2,46.9,-49.3Z" transform="translate(100 100)"></path>
        </svg>
    </div>
    <div class="absolute z-0 pointer-events-none  inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/3 opacity-100">
          <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
            <path fill="currentColor" d="M44.8,-65.2C56.1,-56.5,61.3,-40.7,67.7,-25.2C74.1,-9.7,81.7,5.5,80.1,19.3C78.5,33.1,67.8,45.4,55.1,53.9C42.4,62.4,27.7,67.1,12.6,69.9C-2.5,72.7,-18,73.6,-30.1,67.7C-42.2,61.8,-50.9,49,-58.9,36.1C-66.9,23.1,-74.3,10.1,-75.9,-4.3C-77.5,-18.7,-73.4,-37.3,-63.5,-49.6C-53.7,-61.8,-38.1,-67.6,-23.4,-74.8C-8.7,-82,5.1,-90.5,19.9,-89.4C34.7,-88.4,50.4,-77.7,59.1,-63.8C67.8,-49.9,69.5,-32.7,71.7,-16.7C73.9,-0.7,76.6,14.1,72.3,25.5C68,36.9,56.7,44.9,45.9,54.2C35.1,63.5,24.7,74.1,11.8,78.8C-1.1,83.5,-16.6,82.3,-28.4,75.3C-40.2,68.3,-48.4,55.5,-57.7,43.3C-67,31.1,-77.4,19.5,-80.4,6.2C-83.5,-7.2,-79.1,-22.3,-70.7,-33.2C-62.3,-44.1,-49.8,-50.8,-37.4,-58.8C-25,-66.8,-12.5,-76.2,1.8,-79.3C16.2,-82.5,32.4,-79.5,44.8,-65.2Z" transform="translate(100 100)"></path>
          </svg>
        </div>
      </div>
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">Discover All Industries</h1>
        <div class="max-w-3xl mx-auto">
            <div class="join w-full">
                <input type="text" wire:model.live.debounce.200ms="search" placeholder="Search categories..." class="input input-bordered join-item w-full">
            </div>
        </div>
    </div>
</section>

<main class="container mx-auto px-4 py-8">
    <!-- Filters -->
    <div class="w-full mb-12 flex flex-wrap justify-center items-center gap-4">
        <div class="w-full md:w-auto flex gap-4 p-4 bg-base-200 rounded-box">
                   <!-- Sort By -->
            <fieldset class="flex-1 w-full flex flex-col md:flex-row md:w-auto gap-1 border-2 border-base-300 rounded-lg pb-2 pl-2 pr-2">
              <legend class="flex items-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Sort By
              </legend>
              <div class="form-control">
                
                <select wire:model.live.debounce.200ms="sort" class="select select-bordered md:w-[300px]">
                  <option class="hidden">Sort By</option>
                  <option value="1">Jobs</option>
                  <option value="2">Companies</option>
                  <option value="3">Sub Industries</option>
                </select>
              </div>

              <div class="form-control">
                <button type="button" wire:click="resetFilters" class="btn btn-primary join-item">
                  Reset Filters
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                </button>
              </div>
              
            </div>
          </fieldset>
            </div>

            <div class="w-100 text-center mb-8">
              <span class="text-2xl">{{count($industries)}} Industries Available</span>
          </div>


        <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Category Cards -->

                  @foreach ($industries as $industry)                    
                  <div class="group card bg-base-200 shadow-md hover:shadow-xl transition-shadow duration-300">
                    <div class="card-body items-center text-center">
                      <div class="mb-4 text-primary">
                        @if(Str::contains($industry->icon, '<svg'))
                        {!!$industry->icon!!}
                        @endif
                      </div>
                      <h3 class="card-title mb-2">{{$industry->name}}</h3>
                      <div class="flex flex-wrap justify-center items-center gap-2 text-md font-semibold text-base-content/70">
                        <span>{{$industry->job_posts_count}}+ Open {{Str::plural('Job', $industry->job_posts_count)}}</span>
                        <div class="w-1 h-1 rounded-full bg-base-content/30"></div>
                        <span>{{$industry->companies_count}}+  {{Str::plural('Company', $industry->companies_count)}}</span>
                        <div class="w-1 h-1 rounded-full bg-base-content/30"></div>
                        <span>{{$industry->sub_industries_count}} Sub-{{Str::plural('Industry', $industry->sub_industries_count)}}</span>
                      </div>
                      <div class="mt-3 group-hover:opacity-100 transition-opacity duration-300">
                        <a wire:navigate href="{{route('jobs',['industry'=>$industry->id])}}">
                        <button class="btn btn-link btn-xs text-primary p-0 hover:no-underline">
                          Explore Opportunities
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ml-1">
                            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
                          </svg>
                        </button>
                      </a>
                      </div>
                    </div>
                  </div>

                  @endforeach

                  @if(count($industries) == 0)
    <!-- Empty State -->
    <div class="col-span-4 w-full flex justify-center items-center">
      <div class="text-center py-16">
    <div class="max-w-md mx-auto mb-8">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-24 w-24 mx-auto text-base-content/20">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
      </svg>
    </div>
    <h2 class="text-xl font-bold mb-4">No Industries</h2>
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

                <!-- Add more Category cards -->
            </div>
            
            {{$industries->links('pagination::tailwind')}}
</main>

</div>