<main class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h1 class="text-3xl font-bold mb-4 md:mb-0">Saved Jobs</h1>
        <div class="join">
            <input type="text" placeholder="Search saved jobs..." class="input input-bordered join-item w-64" wire:model.live.debounce.500ms="search">
            <button wire:click="resetSearch" class="btn btn-primary join-item">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>              
            </button>
        </div>
    </div>

    <!-- Saved Jobs Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Job Cards -->
        @if(count($jobs) > 0)
        @foreach ($jobs as $job)   
        <!-- Job Card Redesigned -->
          <div class="card bg-base-200 shadow-md hover:shadow-xl transition-shadow duration-300 group">
            <div class="card-body">
            <div class="flex items-start justify-between mb-4">
              <div class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
              @if($job->company->image && Storage::disk('public')->exists('/images/companies/' . $job->company->image))
              <img class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center" src="{{asset('storage/images/companies/' . $job->company->image)}}" alt="">
              @else
              <div class="text-primary font-bold">
               @php
        $cname = '';
        foreach (explode(' ', $job->company->name) as $name) {
        $cname .= ucfirst(substr($name, 0, 1));
        }
               @endphp
               {{$cname}}
               {{$job->company->image}}
              </div>
              @endif
              </div>
              <div class="flex items-center gap-2">
        
                @if($job->urgently_hiring == 1)
                <div class="flex flex-col gap-2">
                  <span class="badge badge-error badge-sm h-auto animate-pulse">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            Urgently Hiring
                          </span>
              </div>
            <!-- "New" Badge for urgency -->
            @elseif ($job->created_at->gt(now()->subDays(7)))
        <span class="badge badge-primary badge-sm">New</span>
        @endif
           
            @if(count(App\Models\UserSavedJob::where('user_id', Auth::id())->where('job_post_id', $job->id)->get()) <= 0)
             <!-- Save Button -->
            <div class="tooltip" data-tip="Save Job">
              <button wire:click="saveJob({{$job->id}})" class="btn btn-ghost btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                </svg>
              </button>
            </div>
            @else
<!-- Favorite Button -->
<div class="tooltip" data-tip="Remove From Saved">
<button wire:click="removeJob({{$job->id}})" class="btn btn-ghost btn-sm text-error">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
              </button>
</div>
            @endif
            </div>
            </div>
        
            <h3 class="transition hover:underline card-title mb-2 md:min-h-[60px] lg:min-h-[auto]">
              <a wire:navigate href="{{route('job.view', ['id' => $job->id, 'slug' => $job->slug])}}" title="{{$job->title}}">
              {{Str::limit($job->title, 30, '.....')}}
              </a>
              </h3>
            <div class="text-sm text-base-content/70 mb-4">
              <p><a class="hover:underline" wire:navigate href="{{route('company.view', [
                'id'=>$job->company->id,'slug'=>App\Helpers\MyFunc::sexySlug($job->company->name, time : false)])}}">{{$job->company->name}}</a> • {{ $job->city_area->name }}, {{ $job->city->name }}</p>
              <p class="flex items-center gap-2 font-bold mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
              </svg>
               Rs {{number_format($job->min_salary)}} - Rs {{number_format($job->max_salary)}}</p>
            </div>
        
            <div class="flex flex-wrap gap-2 mb-6">
              <span class="badge badge-outline">{{$job->job_type->name}}</span>
              <span class="badge badge-outline">{{ucfirst($job->job_setting)}}</span>
              @php
        $diff = round($job->created_at->diffInDays(now()));
              @endphp
              @if ($diff == 0)
               <span class="badge badge-outline text-xs">
              Today
               </span>
               @else
               <span class="badge badge-outline text-xs">
              {{$diff}} {{Str::plural('day', $diff)}} ago
               </span>
              @endif
              </div>
            <a wire:navigate href="{{route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug])}}">
            <div class="card-actions">
              <button class="btn btn-primary flex gap-4 w-full">
              Apply Now
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
              </svg>                    
              </button>
            </div>
            </a>
            </div>
          </div>
        

          @endforeach
        @else
       <!-- Empty State -->
    <div class="text-center py-16 col-span-3">
      <div class="max-w-md mx-auto mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-24 w-24 mx-auto text-base-content/20">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
        </svg>
      </div>
      <h2 class="text-xl font-bold mb-4">No Saved Jobs Found</h2>
      <p class="text-base-content/70 mb-6">Save jobs you're interested in to review them later</p>
      <a wire:navigate href="{{route('jobs')}}" class="btn btn-primary">Browse Jobs</a>
  </div>
        @endif  
    </div>
    @includeIf('livewire.partials.alert')
</main>