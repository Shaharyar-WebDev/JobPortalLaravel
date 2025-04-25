
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
        <div class="mt-3">
            <a wire:navigate href="{{route('user.savedJobs')}}">
             <button class="btn btn-primary gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            View Saved Jobs
        </button>
        </a>
        <button wire:click="resetFilters" class="btn btn-primary gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>              
            Reset
        </button>
        </div>
       
    </div>

<!-- Search & Filters -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="join md:col-span-2">
            <input type="text" placeholder="Search applications..." class="input input-bordered join-item w-full" wire:model.live="search">
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
                            @forelse ($industries as $industry)
                                <option value="{{$industry->id}}">{{$industry->name}}</option>
                            @empty
                            <option class="hidden">No Industries Yet</option>
                            @endforelse
                          </select>
              
            </div>
    </div>
    <div class="flex-1 w-full">
          
        <div class="relative">
          <select wire:model.live="job_type" class="select select-bordered w-full select-md">
                        <option class="hidden">Select Job Type</option>
                        @forelse ($job_types as $job_type)
                        <option value="{{$job_type->id}}">{{$job_type->name}}</option>
                        @empty
                            
                        @endforelse
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
                            <th>Applied Date/ Time</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($jobs as $job)
                        <tr class="hover">
                            <td>
                                <a wire:navigate href="{{route('job.view', [
                                'id'=>$job->id, 'slug'=>$job->slug])}}" class="link link-primary">{{$job->title}}</a>
                                <div class="text-sm text-base-content/70 mt-1">{{$job->job_setting}} • {{$job->job_type->name}} •
                                Rs {{$job->min_salary}} - Rs {{$job->max_salary}}</div>
                            </td>
                            <td>{{$job->company->name}}</td>
                            <td>{{$job->pivot->created_at}}</td>
                            <td>
                                <span class="badge h-auto
                                @if($job->pivot->status == 'pending')
                                badge-warning
                                @elseif ($job->pivot->status == 'approved')
                                badge-success
                                @elseif ($job->pivot->status == 'rejected')
                                badge-error
                                @endif
                                ">{{$job->pivot->status}}</span>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <div class="tooltip" data-tip="View Details">
                                    <button onclick="detailModal({{$job->id}}, '{{$job->pivot->name}}', '{{$job->pivot->email}}', '{{$job->pivot->phone_number}}', '{{$job->pivot->cv}}', '{{$job->pivot->created_at}}')" class="btn btn-ghost btn-sm" title="View Application Details">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                    </div>
                                    <div onclick="deleteModal({{$job->id}})" class="tooltip" data-tip="Withdraw">
                                    <button class="btn btn-ghost btn-sm text-error" title="Withdraw Application">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($jobs) <= 0)
                 <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold mb-4">No Active Applications</h2>
                <p class="text-base-content/70 mb-6">Start your job search and apply to exciting opportunities</p>
                <a wire:navigate href="{{route('jobs')}}">
                <button class="btn btn-primary gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Browse Jobs
                </button>
            </a>
            </div>
            @endif
            </div>

           
        </div>
    </div>
    </div>
    <!-- Pagination -->
{{$jobs->links('pagination::tailwind')}}

<div class="mt-3">
    <label for="per-page">Per Page:</label>
    <select class="select select-bordered" wire:model.live="perPage" id="per-page">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
    </select>
</div>
    <!-- Delete Modal -->
<dialog id="delete_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
            <h3 class="font-bold text-lg">Withdraw Application</h3>
            <p class="py-4">Are you sure you want to Withdraw this Job Application??</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancel</button>
                    <button id="confirm" class="btn btn-error">Withdraw</button>
                </form>
            </div>
    </div>
</dialog>

  <!-- View Details Modal -->
  <dialog id="details_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box shadow-sm">
            <div class="card sticky top-4">
                <div class="card-body">
                    <h2 class="card-title mb-4">Application Details</h2>
                    <div class="space-y-4">
                         <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                            {{-- {{dd($name)}} --}}
                            <span class="text-base-content/70">Name:</span>
                            <input id="name" class="w-full font-medium bg-transparent cursor-text" value="" disabled="" readonly="" title=""> <!-- Added truncate and title -->
                        </div>
                        <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                            <span class="text-base-content/70">Email:</span>
                            <input id="email" class="w-full font-medium bg-transparent cursor-text" value="" disabled="" readonly="" title=""> <!-- Added truncate and title -->
                        </div>
                         <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                            <span class="text-base-content/70">Contact:</span>
                            <input id="contact" class="w-full font-medium bg-transparent cursor-text" value="" disabled="" readonly="" title=""> <!-- Added truncate and title -->
                        </div>
                        <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                            <span class="text-base-content/70">Resume:</span>
                            <input id="resume" class="w-full font-medium bg-transparent cursor-text" disabled="" readonly=""
                           value=""> <!-- Added truncate and title -->
                        </div>
                        <div class="flex gap-2 min-w-0"> <!-- Added min-w-0 for proper truncation -->
                            <span class="text-base-content/70">Applied Date:</span>
                            <input id="date" class="w-full font-medium bg-transparent cursor-text" disabled="" readonly=""
                           value=""> <!-- Added truncate and title -->
                        </div>
                    </div>
                    
                    <div class="divider"></div>
            
                    <div class="w-full">
                    <form method="dialog" class="float-right">
                        <button class="btn btn-otline btn-ghost">close</button>
                      </form>
                    </div>
                </div>
            </div>
            <div class="modal-action">
            </div>
    </div>
</dialog>
@includeIf('livewire.partials.alert')
</div>
@push('scripts')
    <script>
         deleteModal = (id) => {
            const deleteModal = document.querySelector('#delete_modal');
            deleteModal.showModal();
            const confirmBtn = deleteModal.querySelector('#confirm');
            confirmBtn.onclick =  (e)=>{
                Livewire.dispatch('deleteApplication', {id:id});
            };
        }

         detailModal = (id, name, email, contact, resume, date) => {
            const detailModal = document.querySelector('#details_modal');
            detailModal.showModal();
            detailModal.querySelector("#name").value = name;
            detailModal.querySelector("#email").value = email;
            detailModal.querySelector("#contact").value = contact;
            detailModal.querySelector("#resume").value = resume;
            detailModal.querySelector("#date").value = date;


        }
    </script>
@endpush