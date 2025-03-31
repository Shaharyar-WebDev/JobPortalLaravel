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
                <input type="text" wire:model.live="search" placeholder="Search categories..." class="input input-bordered join-item w-full">
            </div>
        </div>
    </div>
</section>

<main class="container mx-auto px-4 py-8">
    <!-- Filters -->
    <form class="mb-12 flex flex-wrap justify-center items-center gap-4">
        <div class="flex gap-4 p-4 bg-base-200 rounded-box">
                   <!-- Sort By -->
              <div class="form-control">
                
                <select class="select select-bordered"><option>Sort By</option>
                    
                    <option>Most Popular</option>
                    <option>Job Openings</option>
                    <option>Alphabetical</option>
                </select>
            </div>
              <!-- Sort By -->
              <div class="form-control">
                
                <select class="select select-bordered">
                    <option selected="" disabled="">Size</option>
                    <option>Small (1 - 50)</option>
                    <option>Medium (51 - 500)</option>
                    <option>Large (500+)</option>
                </select>
            </div>
            <div class="form-control">
                <button class="btn btn-primary join-item">
                    Sort
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>
            </div>
            </form>

            <div class="w-100 text-center mb-8">
              <span class="text-2xl">{{count($industries)}} Industries Available</span>
          </div>


        <!-- Categories Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Category Card -->
                {{-- <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-body items-center text-center">
                      <div class="mb-4 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                      </div>
                      <h3 class="card-title mb-2">Software Development</h3>
                      <p class="text-base-content/70">320+ Jobs Available</p>
                    </div>
                  </div>

                  <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-body items-center text-center">
                      <div class="mb-4 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                      </div>
                      <h3 class="card-title mb-2">Software Development</h3>
                      <p class="text-base-content/70">320+ Jobs Available</p>
                    </div>
                  </div>

                  <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-body items-center text-center">
                      <div class="mb-4 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                      </div>
                      <h3 class="card-title mb-2">Software Development</h3>
                      <p class="text-base-content/70">320+ Jobs Available</p>
                    </div>
                  </div>
                  
                  <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-body items-center text-center">
                      <div class="mb-4 text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                      </div>
                      <h3 class="card-title mb-2">Software Development</h3>
                      <p class="text-base-content/70">320+ Jobs Available</p>
                    </div>
                  </div> --}}

                  @foreach ($industries as $industry)
                    
                  <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="card-body items-center text-center">
                      <div class="mb-4 text-primary">
                        @if(Str::contains($industry->icon, '<svg'))
                        {!!$industry->icon!!}
                        @endif
                      </div>
                      <h3 class="card-title mb-2">{{$industry->name}}</h3>
                      {{-- <p class="text-base-content/70">320+ Jobs Available</p> --}}
                    </div>
                  </div>

                  @endforeach

                <!-- Add more Category cards -->
            </div>
</main>

</div>