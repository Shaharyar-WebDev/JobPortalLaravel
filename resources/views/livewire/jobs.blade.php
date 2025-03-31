<main class="container mx-auto px-4 py-8">
    <!-- Search and Filters Section -->
    <div class="flex flex-col md:flex-row gap-6 mb-8 bg-base-200 rounded-box p-4">
        <!-- Search Bar -->
        <div class="flex-1">
                                <form class="flex flex-col md:flex-row gap-4 items-center w-full">
                  <!-- Job Title Input -->
                  <div class="flex-1 w-full">
                    <!-- <label class="label" for="job-title">
                      <span class="label-text">What</span>
                    </label> -->
                    <div class="relative">
                      <input type="text" id="job-title" name="job-title" placeholder="Job title or keywords" class="input input-bordered input-md w-full pr-12" required="">
                      <span class="absolute right-4 top-1/2 transform -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                      </span>
                    </div>
                  </div>
              
                  <!-- Location Input -->
                  <div class="flex-1 w-full">
                    <!-- <label class="label" for="location">
                      <span class="label-text">Where</span>
                    </label> -->
                    <div class="relative">
                      <input type="text" id="location" name="location" placeholder="Location" class="input input-bordered input-md w-full pr-12" required="">
                      <span class="absolute right-4 top-1/2 transform -translate-y-1/2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                      </span>
                    </div>
                  </div>
            
                  <!-- Category Select -->
                  <div class="flex-1 w-full">
            
                    <div class="relative">
                      <select name="category" class="select input-bordered w-full select-md">
                                    <option disabled="" selected="">Pick a Category</option>
                                    <option>It</option>
                                    <option>Construction</option>
                                    <option>Web</option>
                                  </select>
                      
                    </div>
                  </div>
              
                          <!-- Company Select -->
                          <div class="flex-1 w-full">
            
                            <div class="relative">
                              <select name="Company" class="select input-bordered w-full select-md">
                                            <option disabled="" selected="">Pick a Company</option>
                                            <option>Nedo</option>
                                            <option>MMC</option>
                                            <option>FACADES</option>
                                          </select>
                              
                            </div>
                          </div>

                  <!-- Search Button -->
                  <div class="w-full md:w-auto">
                    <button type="submit" class="btn btn-primary btn-md w-full md:w-40 flex justify-center items-center gap-2">
                      Search
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                      </svg>
                    </button>
                  </div>
                </form>
        </div>

        <!-- Sort Dropdown -->
        <div class="md:w-48">
            <select class="select select-bordered w-full">
                <option disabled="" selected="">Sort by</option>
                <option>Newest</option>
                <option>Salary High</option>
                <option>Salary Low</option>
                <option>Location</option>
            </select>
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-8">
        <!-- Filters Sidebar -->
        <div class="md:w-64 space-y-6">
            <div class="card bg-base-200 shadow-sm">
                <div class="card-body">
                    <h3 class="font-bold mb-4">Filters</h3>
                    
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Job Type</span>
                        </label>
                        <div class="space-y-2">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="checkbox checkbox-sm">
                                <span class="text-sm">Full-time</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="checkbox checkbox-sm">
                                <span class="text-sm">Part-time</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="checkbox checkbox-sm">
                                <span class="text-sm">Remote</span>
                            </label>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Salary Range</span>
                        </label>
                        <input type="range" min="0" max="100000" class="range range-primary range-xs" oninput="this.nextElementSibling.nextElementSibling.value =`$`+this.value">
                        <div class="flex justify-between text-xs px-2">
                            <span>$0</span>
                            <span>$100k+</span>
                        </div>
                        <output>$63652</output>
                    </div>

                    <div class="divider"></div>

                    <!-- <div class="form-control">
                        <label class="label">
                            <span class="label-text">Location</span>
                        </label>
                        <input type="text" placeholder="Enter location" 
                               class="input input-bordered input-sm">
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="flex-1">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Job Card 1 -->
                <!-- <div class="card bg-base-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="card-body">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-box bg-primary/10 flex items-center justify-center">
                                    <span class="text-primary font-bold">TL</span>
                                </div>
                                <div>
                                    <h2 class="card-title hover:text-primary cursor-pointer">
                                        Senior Frontend Developer
                                    </h2>
                                    <div class="text-sm text-base-content/70 mt-1">
                                        <p>Tech Leaders Inc. • New York, NY</p>
                                        <p class="mt-1">$90k - $120k • Full-time</p>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-ghost btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="card-actions mt-4">
                            <button class="btn btn-primary btn-md w-full">
                                Apply Now
                            </button>
                        </div>
                    </div>
                </div> -->

                <!-- Job Card Redesigned -->
                <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300 group">
                    <div class="card-body">
                      <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-box bg-primary/10 flex items-center justify-center">
                          <div class="text-primary font-bold">TL</div>
                        </div>
                        <div class="flex items-center gap-2">
                      <!-- "New" Badge for urgency -->
                      <span class="badge badge-primary badge-sm">New</span>
                      <!-- Favorite Button -->
                      <button class="btn btn-ghost btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                      </button>
                    </div>
                      </div>
                      
                      <h3 class="card-title mb-2">Senior Frontend Developer</h3>
                      <div class="text-sm text-base-content/70 mb-4">
                        <p>Tech Leaders Inc.</p>
                        <p>Remote • $90k - $120k</p>
                      </div>
                      
                      <div class="flex flex-wrap gap-2 mb-6">
                        <span class="badge badge-outline">Full-time</span>
                        <span class="badge badge-outline">Remote</span>
                        <span class="badge badge-outline">React</span>
                      </div>
                      
                      <div class="card-actions">
                        <button class="btn btn-primary btn-block">
                          Apply Now
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                  
                <!-- Add more job cards following the same structure -->
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-8">
                <div class="join">
                    <button class="join-item btn btn-sm">«</button>
                    <button class="join-item btn btn-sm btn-active">1</button>
                    <button class="join-item btn btn-sm">2</button>
                    <button class="join-item btn btn-sm">3</button>
                    <button class="join-item btn btn-sm">»</button>
                </div>
            </div>
        </div>
    </div>
</main>