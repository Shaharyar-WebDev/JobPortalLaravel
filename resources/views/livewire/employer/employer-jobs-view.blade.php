<div class="p-8">
    <!--The Master doesn't talk, he acts.-->
 <!-- Header Section -->
 <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
    <div>
        <div class="text-sm breadcrumbs mb-2">
            <ul>
                <li><a wire:navigate href="{{route('employer.dashboard')}}">Dashboard</a></li>
                <li><a wire:navigate  href="{{route('employer.jobs-view')}}">Jobs</a></li> 
                <li class="text-primary">View Jobs</li>
            </ul>
        </div>
        <h1 class="text-3xl font-bold">All Jobs</h1>
    </div>
    <a wire:navigate href="{{route('employer.jobs-add')}}" class="btn btn-primary mt-4 md:mt-0 gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>          
        Post a Job
    </a>
</div>

<!-- Search & Filters -->
<div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
    <div class="join md:col-span-2">
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search Posted Jobs..." class="input input-bordered join-item w-full">
        <button class="btn btn-primary join-item">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </button>
    </div>
    
    <div class="flex-1 w-full">
      
        <div class="relative">
          <select wire:model.live="industry_id" class="select select-bordered w-full select-md">
            <option class="hidden">Select Industry</option>
                        @forelse ($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                        @empty
                        <option class="hidden">No Industries</option>                      
                        @endforelse
            </select>
          
        </div>
</div>
<div class="flex-1 w-full">
      
    <div class="relative">
      <select wire:model.live="job_type" class="select select-bordered w-full select-md">
                    <option class="hidden">Job Type</option>
                    @forelse ($job_types as $job_type)
                    <option value="{{$job_type->id}}">{{$job_type->name}}</option>
                @empty
                <option class="hidden">No Job Types</option>                      
                @endforelse
                  </select>
      
    </div>
</div>
<div class="flex-1 w-full">
      
    <div class="relative">
        <button wire:click="resetFilters" class="btn-block flex gap-2 btn btn-primary mt-4 md:mt-0 gap-2 h-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>                       
           Reset Filters
        </button>
      
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
                        <td>Job Id</td>
                        <th>Job Title</th>
                        <th>Location</th>
                        <td>Applications</td>
                        <th>Post Date</th>
                        <th>Apply Before</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($jobs as $job)
                    <tr class="hover">
                        <td>{{$job->id}}</td>
                        <td>
                            <a wire:navigate href="{{route('job.view', ['id' => $job->id, 'slug' => $job->slug])}}" class="link link-primary">{{$job->title}}</a>
                            <div class="text-sm text-base-content/70 mt-1">{{$job->job_type->name}} • {{$job->job_setting}} • {{$job->industry->name}}</div>
                        </td>
                        <td>{{$job->city->name}}, {{$job->city_area->name}}, {{$job->address}}</td>
                        <td>1</td>
                        <td>{{$job->created_at}}</td>
                        <td>{{$job->apply_before}}</td>
                        <td>{{count($job->job_application)}}</td>
                        <td>
                            <div class="flex gap-2">
                                <div class="tooltip" data-tip="View">
                                <a wire:navigate href="{{route('job.view', ['id' => $job->id, 'slug' => $job->slug])}}" class="btn btn-ghost btn-sm" title="View Job">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="tooltip" data-tip="Delete">
                                <button id="deleteBtn" onclick="deleteModal({{$job->id}})" class="btn btn-ghost btn-sm text-error" title="Delete Job">
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
              <h2 class="text-xl font-bold mb-4">No Job Postings</h2>
              <p class="text-base-content/70 mb-6">Create a job posting to attract top talent</p>
              <a wire:navigate href="{{route('employer.jobs-add')}}" class="btn btn-primary mt-4 md:mt-0 gap-2">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>          
                  Post a Job
              </a>
                </div>
                @endif
               
      
        </div>

    </div>
</div>
</div>
<div class="mt-4">
    <!-- Pagination -->
    {{$jobs->links('pagination::tailwind')}}

</div>
<div>
    <label for="perPage">Per Page:</label>

    <select wire:model.live="perPage" class="select select-bordered">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option> 
    </select>
</div>

<!-- Delete Modal -->
<dialog id="delete_modal" class="modal modal-bottom md:modal-center">
    <div class="modal-box">
            <h3 class="font-bold text-lg">Delete Job Post</h3>
            <p class="py-4">Are you sure you want to delete this Job Post</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancel</button>
                    <button id="confirm" class="btn btn-error">Delete</button>
                </form>
            </div>
    </div>
</dialog>
@include('livewire.partials.alert')
</div>
@push('scripts')
<script>

        function deleteModal(id){
        const delete_modal = document.querySelector('#delete_modal');
        delete_modal.showModal();
        const btn = delete_modal.querySelector('#confirm');
        btn.addEventListener('click', function(e){
            console.log('dispatch');
            Livewire.dispatch('deleteJob', {id:id});
        });
}

 document.addEventListener('DOMContentLoaded', function(){

 function deleteModal(id){
        const delete_modal = document.querySelector('#delete_modal');
        delete_modal.showModal();
        const btn = delete_modal.querySelector('#confirm');
        // const delete_input = document.querySelector('#delete_input');
        // delete_input.value = id;
        btn.addEventListener('click', function(e){
            console.log('dispatch');
            Livewire.dispatch('deleteJob', {id:id});
        });
}

})
</script>
<script type="module" src="/js/employer/employer-jobs-view.js"></script>
@endpush
