<div class="p-8">
    <!-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. -->
     <!-- Header Section -->
     
 <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 w-full">
        <div class="text-sm breadcrumbs mb-2">
            <ul>
                <li><a href="{{route('employer.dashboard')}}">Dashboard</a></li>
                <li class="text-primary">Manage Applications</li> 
            </ul>
            <h1 class="text-3xl font-bold">All Applications</h1>
        </div>
        <div class="flex items-center justify-between w-[100]">
            <button wire:click="resetFilter" class="btn btn-primary">Reset Filters <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>
              </button>
        </div>
</div>

<!-- Search & Filters -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="join md:col-span-2">
        <input type="text" placeholder="Search All Applicants..." class="input input-bordered join-item w-full" wire:model.live.debounce.500ms="search">
    </div>
    
    <div class="flex-1 w-full">
      
        <div class="relative">
          <select wire:model.live="industry" class="select select-bordered w-full select-md">
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
                    <option class="hidden">Select Job Type</option>
                    @forelse ($job_types as $job_type)
                    <option value="{{$job_type->id}}">{{$job_type->name}}</option>
                    @empty
                    <option class="hidden">No Job Types</option>
                    @endforelse
                  </select>
      
    </div>
</div>
</div>

<div class="divider"></div>
<!-- Applications Table -->
<div class="grid grid-cols-1 md:grid-cols-3">
    <div class="card col-span-1 md:col-span-3 bg-base-100 shadow-sm">
        <div class="card-body p-0">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>App. Id</th>
                            <th>Candidate</th>
                            <th>Job Title</th>
                            <th>Applied Date</th>
                            <th>Status</th>
                            <th>Resume/Cv</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($job_applications as $job)
                        <tr class="hover">
                            <td>
                                {{$job->id}}
                            </td>
                            <td>
                                <div class="flex flex-col 2xl:flex-row items-center gap-3">
                                        @if($job->user->image && Storage::disk('public')->exists('/images/users/'.$job->user->image))
                                        <img class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center object-cover" src="{{asset('storage')}}/images/users/{{$job->user->image}}">
                                        @else
                                        @php
                                            $initials = '';
                                            $name = explode(' ', $job->name);
                                            foreach($name as $initial){
                                                $initials.=substr($initial, 0,1);
                                            }

                                        @endphp
                                        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center ring ring-primary/20">
                                            <span class="text-sm font-semibold">{{$initials}}</span>
                                        </div>
                                        @endif
                                    <div>
                                        <div class="font-bold">{{$job->name}}</div>
                                        <div class="text-sm text-base-content/70">{{$job->email}}</div>
                                        <div class="text-sm text-base-content/70">{{$job->phone_number}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a class="text-primary hover:underline" wire:navigate href="{{route('job.view', [
                                'id'=>$job->job_post->id, 
                                'slug' => $job->job_post->slug])}}">
                                    {{$job->job_post->title}}
                                </a>
                            </td>
                            <td>{{$job->created_at}}</td>
                            <td>
                                <span class="badge h-auto
                                @if($job->status == 'pending')
                                badge-warning
                                @elseif ($job->status == 'approved')
                                badge-success
                                @elseif ($job->status == 'rejected')
                                badge-error
                                @endif
                                ">{{$job->status}}</span>
                            </td>
                            <td class="text-center">
                                <div class="tooltip" data-tip="Download">
                                    <a href="{{asset('storage/cv/users/'.$job->cv)}}"
                                        target="_blank">
                                <button class="btn btn-ghost btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
</svg>
                                </button>
                            </a>
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    @if($job->status == 'pending')
                                    <button wire:click="updateStatus({{$job->id}}, 'approved')" class="btn btn-success btn-sm">Approve</button>
                                    <button wire:click="updateStatus({{$job->id}}, 'rejected')"  class="btn btn-error btn-sm">Reject</button>
                                    @elseif ($job->status == 'approved')
                                    <button wire:click="updateStatus({{$job->id}}, 'rejected')"  class="btn btn-error btn-sm">Reject</button>
                                    <button wire:click="updateStatus({{$job->id}}, 'pending')" class="btn btn-warning btn-sm">Mark Pending</button>
                                    @elseif ($job->status == 'rejected')
                                    <button wire:click="updateStatus({{$job->id}}, 'approved')" class="btn btn-success btn-sm">Approve</button>
                                    <button wire:click="updateStatus({{$job->id}}, 'pending')" class="btn btn-warning btn-sm">Mark Pending</button>
                                    @endif
                                    <div class="tooltip" data-tip="Delete Application">
                                        <button onclick="deleteModal({{$job->id}})" class="btn btn-ghost btn-sm text-error" title="Delete Application">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>                                              
                                        </button>
                                      </div>
                                    
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>

              <!-- Resume Modal (not in use)-->
    {{-- <dialog id="resume_modal" class="modal">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">John Doe's Resume</h3>
            <div class="py-4">
                <!-- PDF Viewer Placeholder -->
                <div class="h-auto bg-base-200 rounded-box flex items-center justify-center">
                    <span class="text-base-content/50">PDF Preview</span>
                    <iframe width="100%" height="600px"></iframe>
                </div>
            </div>
            <div class="modal-action">
                <button class="btn" id="downloadBtn">Download</button>
                <form method="dialog">
                    <button class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog> --}}

    <!-- Open the modal using ID.showModal() method -->
<dialog id="deleteModal" class="modal modal-bottom md:modal-middle">
  <div class="modal-box">
    <p class="py-4">Are You Sure You Want To Delete This Application??</p>
    <div class="modal-action">
      <form method="dialog">
        <button class="btn btn-grey">Close</button>
        <button class="btn btn-error" id="confirm">Confirm</button>
      </form>
    </div>
  </div>
</dialog>
          
        </div>

        @if(count($job_applications) == 0)
          <!-- Empty State -->
        <div class="text-center py-16">
            <div class="max-w-md mx-auto mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
            </div>
            <h2 class="text-xl font-bold mb-4">No Applications Received</h2>
            <p class="text-base-content/70 mb-6">Posst your job posting to start receiving applications</p>
            <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
              </svg>
              Share Job Posting</button>
        </div>
        @endif
    </div>
</div>
<!-- Pagination -->
{{$job_applications->links('pagination::tailwind')}}

<div class="mt-3">
    <label for="per-page">Per Page:</label>
    <select class="select select-bordered" wire:model.live="perPage" id="per-page">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
        <option value="20">20</option>
    </select>
</div>

@includeIf('livewire.partials.alert')
</div>
@push('scripts')
    <script>
        deleteModal = (id) => {
            dltModal = document.querySelector("#deleteModal");
            dltModal.showModal();
            confirmDlt = dltModal.querySelector("#confirm");
            confirmDlt.onclick = ()=>{
                Livewire.dispatch('deleteApplication', { id : id });
            };
        }
        // const previewCv = (url) => {
        //     resumeModal = document.querySelector('#resume_modal');
        //     resumeModal.showModal();
        //     iframe = resumeModal.querySelector("iframe");
        //     downloadBtn = resumeModal.querySelector("#downloadBtn");
        //     downloadBtn.href = url;
        //     // alert(url);
        //     // console.log(iframe);
        //     iframe.src= url;
        // }
    </script>
@endpush
