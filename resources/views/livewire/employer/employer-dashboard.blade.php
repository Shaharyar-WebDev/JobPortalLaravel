<div>
    <!-- Knowing others is intelligence; knowing yourself is true wisdom. -->
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <div class="text-sm breadcrumbs mb-2">
                    <ul>
                        <li><a>Dashboard</a></li> 
                        <li class="text-primary">Overview</li>
                    </ul>
                </div>
                <h1 class="text-3xl font-bold">Employer Dashboard</h1>
            </div>
            <div>
                <a wire:navigate href="{{route('employer.jobs-add')}}">
                <button class="btn btn-primary mt-4 md:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Post New Job
                </button>
            </a>
                <button wire:navigate href="{{route('employer.dashboard')}}" onclick="refresh()" class="btn btn-primary mt-4 md:mt-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                      </svg>                      
                    Refresh
                </button>
            </div>
        </div>
    
        <!-- Quick Insights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Active Jobs</div>
                    <div class="stat-value text-primary">{{$jobs->count()}}</div>
                    <div class="stat-desc" data-count="{{number_format($jobs->count())}}" id="counter-job-posts">{{$jobs->where('urgently_hiring', 1)->count()}} urgently hiring</div>
                </div>
            </div>
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Applications</div>
                    <div class="stat-value text-secondary">{{$job_applications->count()}}</div>
                    <div class="stat-desc">{{$job_applications->whereDate('created_at', \Illuminate\Support\Carbon::today()->toDateString())->count()}} Today</div>
                </div>
            </div>
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-title">Accepted</div>
                    <div class="stat-value text-success">{{$job_applications->where('status', 'approved')->count()}}</div>
                </div>
            </div>
        </div>
    
        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column -->
            <div class="col-span-3 space-y-8">
                <!-- Active Jobs Table -->
                <div class="overflow-x-scroll bg-base-100 shadow-sm mb-8 w-full">
            <div class="">
                <h2 class="mb-4">Recent Applicants</h2>
                <div class="">
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
                            @foreach ($all_job_applications as $job)
                            <tr class="hover">
                                <td>
                                    {{$job->id}}
                                </td>
                                <td>
                                    <div class="flex flex-col xl:flex-row items-center gap-3">
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
            </div>
        </div>
    
                <!-- Analytics Section -->
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Hiring Analytics</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Applications Chart -->
                            <div>
                                <h3 class="font-bold mb-2">Applications Overview</h3>
                                <canvas id="lineChart" class="h-48 bg-base-200 rounded-box flex items-center justify-center">
                                    <span class="text-base-content/50">Line Chart Placeholder</span>
                                </canvas>
                            </div>
                            <!-- Status Distribution -->
                            <div>
                                <h3 class="font-bold mb-2">Application Status</h3>
                                <canvas id="pieChart" class="h-48 bg-base-200 rounded-box flex items-center justify-center">
                                    <span class="text-base-content/50">Pie Chart Placeholder</span>
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Right Column -->
            {{-- <div class="space-y-8">
                <!-- Quick Actions -->
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Quick Actions</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <button class="btn btn-outline h-auto py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                </svg>
                                View Applicants
                            </button>
                            <button class="btn btn-outline h-auto py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                </svg>
                                Downl. Reports
                            </button>
                        </div>
                    </div>
                </div>
    
                <!-- Recent Activities -->
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Recent Activities</h2>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="avatar">
                                    <div class="w-12 rounded-full bg-primary/10">
                                        <span>JD</span>
                                    </div>
                                </div>
                                <div>
                                    <p class="font-bold">John Doe applied</p>
                                    <p class="text-sm">Frontend Developer • 2h ago</p>
                                    <span class="badge badge-info">New</span>
                                </div>
                            </div>
                            <!-- More activities -->
                        </div>
                    </div>
                </div>
    
                <!-- Top Locations -->
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Applicant Locations</h2>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span>New York, USA</span>
                                <span class="text-primary">245</span>
                            </div>
                            <div class="flex justify-between">
                                <span>London, UK</span>
                                <span class="text-primary">189</span>
                            </div>
                            <!-- More locations -->
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>

        @includeIf('livewire.partials.alert')
    </div>
</div>
@php
    // Default statuses with count 0
    $statuses = ['pending' => 0, 'approved' => 0, 'rejected' => 0];

    foreach ($statusCounts as $row) {
        $statuses[$row->status] = $row->count;
    }

    $statusLabels = array_keys($statuses);  // ['pending', 'approved', 'rejected']
    $statusData = array_values($statuses);  // [10, 5, 3]
@endphp
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
</script>
<script type="text/javascript">
  
   initChart = () => { 
    
    var labels =  {{ Js::from($applications->keys()) }};
    var users =  {{ Js::from($applications->values()) }};

    const data = {
      labels: labels,
      datasets: [{
        label: 'Applications by Month',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: users,
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {}
    };

    try{

if (window.myChart instanceof Chart) {
  window.myChart.destroy();
}

window.myChart = new Chart(
  document.getElementById('lineChart'),
  config
);

    }catch(error){
        console.warn(error);
    }
    
  }

  initPieChart = () => {

    const statusLabels = @json($statusLabels); // ['pending', 'approved', 'rejected']
    const statusData = @json($statusData);     // [10, 5, 3]

    const data = {
  labels: statusLabels,
  datasets: [{
    label: 'Count',
    data: statusData,
    backgroundColor: [
      '#fbbd23',
      '#36d399',
      '#f87272'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};

try{

if (window.pieChart instanceof Chart) {
  window.pieChart.destroy();
}

window.pieChart = new Chart(
  document.getElementById('pieChart'),
  config
);

    }catch(error){
        console.warn(error);
    }

  }

  refresh = () => {
    initChart();
    initPieChart();
  }



  document.addEventListener('livewire:navigated', initChart);
  document.addEventListener('livewire:navigated', initPieChart);
  

</script>
@endpush
