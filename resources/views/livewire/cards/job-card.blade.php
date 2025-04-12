@props(['job'])
<div class="card bg-base-200 shadow-md hover:shadow-xl transition-shadow duration-300 group">
    <div class="card-body">
    <div class="flex items-start justify-between mb-4">
      <div class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
      @if($job->company->image && Storage::disk('public')->exists('/images/' . $job->company->image))
      <img src="{{asset('storage/images/' . $job->company->image)}}" alt="">
      @else
      <div class="text-primary font-bold">
       @php
$cname = '';
foreach (explode(' ', $job->company->name) as $name) {
$cname .= ucfirst(substr($name, 0, 1));
}
       @endphp
       {{$cname}}
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
    <!-- Favorite Button -->
    {{-- @if($job) --}}
      <div class="tooltip" data-tip="Remove From Saved">
        <button class="btn btn-ghost btn-sm text-error">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                              </svg>
                          </button>
      </div>
      {{-- @else --}}
    <div class="tooltip" data-tip="Save Job">
      <button class="btn btn-ghost btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
        </svg>
      </button>
    </div>
    {{-- @endif --}}
    </div>
    </div>

    <h3 class="transition hover:underline card-title mb-2 md:min-h-[60px] lg:min-h-[auto]">
      <a wire:navigate href="{{route('job.view', ['id' => $job->id, 'slug' => $job->slug])}}">
      {{Str::limit($job->title, 30, '.....')}}
      </a>
      </h3>
    <div class="text-sm text-base-content/70 mb-4">
      <p><a class="hover:underline" wire:navigate href="{{route('companies')}}">{{$job->company->name}}</a> • {{ $job->city_area->name }}, {{ $job->city->name }}</p>
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


  