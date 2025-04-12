<main class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-3xl font-bold mb-4 md:mb-0">Saved Jobs</h1>
        <div class="join">
            <input type="text" placeholder="Search saved jobs..." class="input input-bordered join-item w-64">
            <button class="btn btn-primary join-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Saved Jobs Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Job Card -->
        <div class="card bg-base-100 shadow-sm hover:shadow-md transition-shadow">
            <div class="card bg-base-200 shadow-md hover:shadow-xl transition-shadow duration-300 group">
                <div class="card-body">
                <div class="flex items-start justify-between mb-4">
                  <div class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
                      <div class="text-primary font-bold">
                                          NS
                  </div>

                  </div>
                  <div class="flex items-center gap-2">

                                         <div class="flex flex-col gap-2">
                      <span class="badge badge-error badge-sm h-auto animate-pulse">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                                Urgently Hiring
                              </span>
                  </div>

                <!-- "New" Badge for urgency -->

                <!-- Favorite Button -->
                <div class="tooltip" data-tip="Remove From Saved">
                  <button class="btn btn-ghost btn-sm text-error">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                </div>
                </div>
                </div>

                <h3 class="transition hover:underline card-title mb-2 md:min-h-[60px] lg:min-h-[auto]">
                  <a wire:navigate="" href="http://127.0.0.1:8000/jobs/2/front-end-react-developer-islamabad-novatech-solutions-1744153334">
                  FRONT-END REACT DEVELOPER
                  </a>
                  </h3>
                <div class="text-sm text-base-content/70 mb-4">
                  <p><a class="hover:underline" wire:navigate="" href="http://127.0.0.1:8000/companies">NovaTech Solutions</a> • Gulshan, Islamabad</p>
                  <p class="flex items-center gap-2 font-bold mt-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"></path>
                  </svg>
                   Rs 40,000 - Rs 80,000</p>
                </div>

                <div class="flex flex-wrap gap-2 mb-6">
                  <span class="badge badge-outline">Part Time</span>
                  <span class="badge badge-outline">Remote</span>
                      <span class="badge badge-outline text-xs">
                  8 days ago
                   </span>

                  </div>
                <a wire:navigate="" href="http://127.0.0.1:8000/jobs/2/front-end-react-developer-islamabad-novatech-solutions-1744153334/apply">
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
        </div>

        <!-- Add more job cards -->
    </div>

<!-- Empty State -->
    <div class="text-center py-16 hidden">
        <div class="max-w-md mx-auto mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 10l3 3 7-7 3 3-7 7-3-3-7 7"></path>
            </svg>
        </div>
        <h2 class="text-xl font-bold mb-4">No Saved Jobs Found</h2>
        <p class="text-base-content/70 mb-6">Save jobs you're interested in to review them later</p>
        <button class="btn btn-primary">Browse Jobs</button>
    </div>
</main>