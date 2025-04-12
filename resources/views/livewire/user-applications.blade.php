
<!-- Success is as dangerous as failure. -->
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <div>
            <div class="text-sm breadcrumbs mb-2">
                <ul>
                    <li><a>Dashboard</a></li> 
                    <li class="text-primary">My Applications</li>
                </ul>
            </div>
            <h1 class="text-3xl font-bold">My Job Applications</h1>
        </div>
        <button class="btn btn-primary mt-4 md:mt-0 gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Search New Jobs
        </button>
    </div>

    <!-- Search & Filters -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="join md:col-span-2">
            <input type="text" placeholder="Search applications..." class="input input-bordered join-item w-full">
            <button class="btn btn-primary join-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </button>
        </div>
        
        <div class="flex-1 w-full">
          
            <div class="relative">
              <select wire:model.live="industry" class="select select-bordered w-full select-md">
                            <option class="hidden">Select Industry</option>
                            <!--[if BLOCK]><![endif]-->                                          <option value="1">Software Development</option>
                                                                      <option value="2">Marketing</option>
                                                                      <option value="3">Finance</option>
                                                                      <option value="4">Design</option>
                            <!--[if ENDBLOCK]><![endif]-->
                          </select>
              
            </div>
    </div>
    <div class="flex-1 w-full">
          
        <div class="relative">
          <select wire:model.live="industry" class="select select-bordered w-full select-md">
                        <option class="hidden">Select Industry</option>
                        <!--[if BLOCK]><![endif]-->                                          <option value="1">Software Development</option>
                                                                  <option value="2">Marketing</option>
                                                                  <option value="3">Finance</option>
                                                                  <option value="4">Design</option>
                        <!--[if ENDBLOCK]><![endif]-->
                      </select>
          
        </div>
</div>
    </div>

    <div class="divider"></div>
    <!-- Applications Table -->
    <div class="grid grid-cols-1 md:grid-cols-3">
    <div class="card bg-base-100 shadow-sm md:col-span-3">
        <div class="card-body p-0">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Job Title</th>
                            <th>Company</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                            <th>Updates</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Application 1 -->
                        <tr class="hover">
                            <td>
                                <a class="link link-primary">Senior Frontend Developer</a>
                                <div class="text-sm text-base-content/70 mt-1">Remote • Full Time</div>
                            </td>
                            <td>Tech Leaders Inc.</td>
                            <td>2024-03-15</td>
                            <td>
                                <span class="badge h-auto badge-info">In Review</span>
                            </td>
                            <td>
                                <span class="badge h-auto badge-success badge-sm">New message</span>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <button class="btn btn-ghost btn-sm" title="View Application">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    <button class="btn btn-ghost btn-sm text-error" title="Withdraw Application">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold mb-4">No Active Applications</h2>
                <p class="text-base-content/70 mb-6">Start your job search and apply to exciting opportunities</p>
                <button class="btn btn-primary gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Browse Jobs
                </button>
            </div>
        </div>
    </div>
    </div>
    <!-- Pagination -->

</div>