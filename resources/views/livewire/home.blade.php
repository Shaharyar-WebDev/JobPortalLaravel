<main class="mx-auto p-4">
    <!-- Page content goes here -->
     <!-- Hero Section -->
<section class="bg-base-100 relative overflow-hidden">
<div class="container mx-auto px-4 py-16 md:py-24">
  <div class="max-w-6xl mx-auto text-center relative z-10">
    <!-- Heading -->
    <h1 class="text-4xl md:text-6xl font-bold mb-6">
      Find Your 
      <span class="text-primary">Dream Job</span> 
      Today!
    </h1>
    
    <!-- Subheading -->
    <p class="text-lg md:text-xl text-base-content/70 mb-8 max-w-2xl mx-auto">
      Join thousands of companies and candidates already using JobPortal. 
      Explore over 50,000 opportunities across various industries.
    </p>

   <!-- Search Form -->
   <div class="bg-base-200 rounded-box p-4 shadow-lg mb-8">
    <form wire:submit.prevent="goToJobs" class="flex flex-col md:flex-row gap-4 items-center w-full">
      <!-- Job Title Input -->
      <div class="flex-1 w-full">
        <div class="relative">
          <input type="text" id="job-title" wire:model="search" placeholder="Job title or keywords" class="input input-bordered input-lg w-full pr-12" required="">
          <span class="absolute right-4 top-1/2 transform -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </span>
        </div>
      </div>
    
      <!-- Location Select -->
      <div class="flex-1 w-full">
        <div class="relative">
          <select id="location" wire:model="city" class="select input-bordered w-full select-lg pr-12" required="">
            <option class="hidden">Select a City</option>
            @foreach ($cities as $city)
              <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
          </select>
          <span class="absolute right-8 top-1/2 transform -translate-y-1/2">
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
          <select wire:model="industry" class="select input-bordered w-full select-lg">
            <option class="hidden">Pick a Industry</option>
            @foreach ($industries as $industry)
              <option value="{{$industry->id}}">{{$industry->name}}</option>
            @endforeach
          </select>
    <span class="absolute right-8 top-1/2 transform -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"></path>
    </svg>
    
          </span>
        </div>
      </div>
    
      <!-- Search Button -->
      <div class="w-full md:w-auto">
        {{-- <a wire:submit="{{route('jobs')}}"> --}}
        <button type="submit" class="btn btn-primary btn-lg w-full md:w-40 h-16 flex justify-center items-center gap-2">
          Search
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </button>
      {{-- </a> --}}
      </div>
    </form>
    </div>

    <!-- Recruiter CTA -->
    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
      <p class="text-base-content/70">Looking to hire?</p>
      <button class="btn btn-outline btn-secondary gap-2">
        Post a Job
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
      </button>
    </div>
  </div>

  <!-- Decorative Background Elements -->
  <div class="absolute top-0 right-0 opacity-10 -translate-y-1/3">
    <svg viewBox="0 0 200 200" class="w-[600px] h-[600px]" xmlns="http://www.w3.org/2000/svg">
      <path fill="currentColor" d="M46.9,-49.3C59.6,-36.1,67.3,-18,66.6,-0.7C65.9,16.6,56.8,33.2,44.1,44.3C31.4,55.3,15.7,60.9,-1.7,62.6C-19.1,64.3,-38.2,62.2,-50.4,51.2C-62.6,40.2,-67.8,20.1,-66.9,0.7C-66.1,-18.7,-59.3,-37.3,-47.1,-50.5C-34.9,-63.7,-17.4,-71.3,0.7,-71.9C18.8,-72.6,37.6,-66.2,46.9,-49.3Z" transform="translate(100 100)"></path>
    </svg>
  </div>
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/3 opacity-100">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M44.8,-65.2C56.1,-56.5,61.3,-40.7,67.7,-25.2C74.1,-9.7,81.7,5.5,80.1,19.3C78.5,33.1,67.8,45.4,55.1,53.9C42.4,62.4,27.7,67.1,12.6,69.9C-2.5,72.7,-18,73.6,-30.1,67.7C-42.2,61.8,-50.9,49,-58.9,36.1C-66.9,23.1,-74.3,10.1,-75.9,-4.3C-77.5,-18.7,-73.4,-37.3,-63.5,-49.6C-53.7,-61.8,-38.1,-67.6,-23.4,-74.8C-8.7,-82,5.1,-90.5,19.9,-89.4C34.7,-88.4,50.4,-77.7,59.1,-63.8C67.8,-49.9,69.5,-32.7,71.7,-16.7C73.9,-0.7,76.6,14.1,72.3,25.5C68,36.9,56.7,44.9,45.9,54.2C35.1,63.5,24.7,74.1,11.8,78.8C-1.1,83.5,-16.6,82.3,-28.4,75.3C-40.2,68.3,-48.4,55.5,-57.7,43.3C-67,31.1,-77.4,19.5,-80.4,6.2C-83.5,-7.2,-79.1,-22.3,-70.7,-33.2C-62.3,-44.1,-49.8,-50.8,-37.4,-58.8C-25,-66.8,-12.5,-76.2,1.8,-79.3C16.2,-82.5,32.4,-79.5,44.8,-65.2Z" transform="translate(100 100)"></path>
      </svg>
    </div>
    <div class="absolute bottom-0 right-0 w-96 h-96 translate-x-1/2 translate-y-1/3">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M42.1,-63.9C55.6,-54.7,68.2,-44.5,74.5,-31.6C80.8,-18.7,80.7,-3.1,76.8,10.7C72.9,24.6,65.2,36.5,55.6,46.1C46,55.7,34.5,62.9,21.4,67.3C8.3,71.7,-6.4,73.3,-20.7,70.5C-35,67.7,-49,60.5,-59.5,49.9C-70,39.3,-77.1,25.3,-78.9,10.7C-80.6,-3.8,-77.1,-18.9,-69.2,-30.7C-61.3,-42.5,-49.1,-51.1,-36.3,-60.4C-23.5,-69.7,-10.2,-79.8,2.3,-83.4C14.8,-87.1,29.6,-84.3,42.1,-63.9Z" transform="translate(100 100)"></path>
      </svg>
    </div>
  </div>
</div>
</section>

<!-- Popular Industries Section -->
<section class="bg-base-100 py-16 md:py-24">
<div class="container mx-auto px-4">
  <!-- Section Heading -->
  <div class="text-center mb-12 md:mb-16">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      Explore Popular 
      <span class="text-primary">Industries</span>
    </h2>
    <p class="text-base-content/70 max-w-xl mx-auto">
      Discover opportunities in your field of expertise across various industries
    </p>
  </div>

  <!-- Categories Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
       <!-- Category Card 1 -->

    @foreach ($industries as $industry)                    
    <div class="group card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300">
      <div class="card-body items-center text-center">
        <div class="mb-4 text-primary">
          @if(Str::contains($industry->icon, '<svg'))
          {!!$industry->icon!!}
          @endif
        </div>
        <h3 class="card-title mb-2">{{$industry->name}}</h3>
        <div class="flex flex-wrap justify-center items-center gap-2 text-md font-semibold text-base-content/70">
          <span>{{$industry->job_posts_count}}+ Open {{Str::plural('Job', $industry->job_posts_count)}}</span>
          <div class="w-1 h-1 rounded-full bg-base-content/30"></div>
          <span>{{$industry->companies_count}}+  {{Str::plural('Company', $industry->companies_count)}}</span>
          <div class="w-1 h-1 rounded-full bg-base-content/30"></div>
          <span>{{$industry->sub_industries_count}} Sub-{{Str::plural('Industry', $industry->sub_industries_count)}}</span>
        </div>
        <div class="mt-3 group-hover:opacity-100 transition-opacity duration-300">
          <a wire:navigate href="{{route('jobs',['industry'=>$industry->id])}}">
          <button class="btn btn-link btn-xs text-primary p-0 hover:no-underline">
            Explore Opportunities
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ml-1">
              <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd"></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- View All Button -->
  <div class="text-center">
    <a wire:navigate href="{{route('industries')}}">
    <button class="btn btn-outline btn-primary px-8">
      View All Industries
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </button>
  </a>
  </div>
</div>
</section>

<!-- Featured Jobs Section -->
<section class="bg-base-100 py-16 md:py-24">
<div class="container mx-auto px-4">
  <!-- Section Heading -->
  <div class="text-center mb-8 md:mb-12">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      Top 
      <span class="text-primary">Featured Jobs</span>
    </h2>
    <p class="text-base-content/70 max-w-xl mx-auto">
      Browse through our curated selection of high-quality job opportunities
    </p>
  </div>

  <!-- Jobs Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    @foreach ($jobs as $job)
                <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300 group">
                  <div class="card-body">
                    <div class="flex items-start justify-between mb-4">
                      <div class="w-12 h-12 overflow-hidden object-cover rounded-box bg-primary/10 flex items-center justify-center">
                        @if($job->company->image && Storage::disk('public')->exists('/images/'.$job->company->image))
                        <img src="{{asset('storage/images/'.$job->company->image)}}" alt="">
                        @else
                        <div class="text-primary font-bold">
                         @php
                          $cname = '';
                         foreach(explode(' ', $job->company->name) as $name){
                          $cname.= ucfirst(substr($name,0,1 ));
                         }
                         @endphp
                         {{$cname}}
                        </div>
                        @endif
                      </div>
                      <div class="flex items-center gap-2">
                    <!-- "New" Badge for urgency -->
                    @if ($job->created_at->gt(now()->subDays(7)))
                    <span class="badge badge-primary badge-sm">New</span>
                    @endif
                    
                    @if($job->urgently_hiring == 1)
                    <span class="badge badge-error badge-sm w-auto h-auto">Urgently Hiring</span>
                    @endif
                    <!-- Favorite Button -->
                    <button class="btn btn-ghost btn-sm">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                      </svg>
                    </button>
                  </div>
                    </div>
                    
                    <h3 class="card-title mb-2">{{Str::limit($job->title, 30, '.....')}}</h3>
                    <div class="text-sm text-base-content/70 mb-4">
                      <p>{{$job->company->name}} • {{ $job->city_area->name }}, {{ $job->city->name }}</p>
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
                    <div class="card-actions">
                      <a wire:navigate href="{{route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug])}}">
                      <button class="btn btn-primary btn-block">
                        Apply Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                      </button>
                    </a>
                    </div>
                  </div>
                </div>
              
    @endforeach
  </div>

  <!-- View All Button -->
  <div class="text-center">
    <a wire:navigate href="{{route('jobs')}}">
    <button class="btn btn-outline btn-primary px-8">
      View All Jobs
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </button>
  </a>
  </div>
</div>
</section>

<!-- Featured Companies Section -->
<section class="bg-base-100 py-16 md:py-24">
<div class="container mx-auto px-4">
  <!-- Section Heading -->
  <div class="text-center mb-12 md:mb-16">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      Top Hiring 
      <span class="text-primary">Companies</span>
    </h2>
    <p class="text-base-content/70 max-w-xl mx-auto">
      Connect with leading employers across various industries
    </p>
  </div>

  <!-- Companies Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
    <!-- Company Card -->
    @foreach ($companies as $company)
    <div class="card bg-base-200 shadow-md hover:shadow-lg transition-shadow duration-300 group">
        <div class="card-body items-center text-center">
          <!-- Company Logo -->
          @if($company->image && Storage::disk('public')->exists('/images/'.$company->image))
          <img loading="lazy" src="{{asset('storage/images/'.$company->image)}}" class="w-20 h-20 rounded-2xl bg-primary/10 mb-6 flex items-center justify-center">
          </img>
          @else
          <div class="w-20 h-20 rounded-2xl bg-primary/10 mb-6 flex items-center justify-center">
            <span class="text-2xl font-bold text-primary">  
             
            @php
            $name = explode(' ',$company->name);
            $initials = '';
            foreach($name as $initial){
              $initials.= substr($initial, 0, 1);
            }
            @endphp
           {{$initials}}
            </span>
          </div>
        
          @endif
          
          <h3 class="card-title mb-2"><a class="hover:underline" wire:navigate href="{{route('company.view', [
          'id'=>$company->id,'slug'=>App\Helpers\MyFunc::sexySlug($company->name, time : false)])}}">{{$company->name}}</a></h3>
          <p class="text-sm text-base-content/70 mb-4">{{$company->industry->name}}</p>

          <p class="text-sm text-base-content/70 mb-4 flex items-center gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
          </svg>
          {{$company->city->name}} ,{{$company->city_area->name}}</p>

          <p class="text-sm text-base-content/70 mb-4">Company Size: {{$company->company_size}} employees</p>

          <div class="rating rating-md mb-6">
              <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" aria-label="1 star">
              <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" aria-label="2 star" checked="checked">
              <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" aria-label="3 star">
              <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" aria-label="4 star">
              <input type="radio" name="rating-6" class="mask mask-star-2 bg-orange-400" aria-label="5 star">
          </div>
          
          <div class="badge badge-primary badge-lg mb-4">
            {{$company->job_posts_count}} {{Str::plural('Job', $company->job_posts_count)}} Available
          </div>
          
          <a wire:navigate href="{{route('jobs', ['company'=>$company->id])}}">
          <button class="btn btn-outline btn-primary btn-sm gap-2">
            View Jobs
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
          </button>
        </a>
        </div>
      </div>
    @endforeach
  </div>

  <!-- View All Button -->
  <div class="text-center">
    <a wire:navigate href="{{route('companies')}}">
    <button class="btn btn-outline btn-primary px-8">
      View All Companies
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </button>
    </a>
  </div>
</div>
</section>

<!-- Testimonials Section -->
<section class="bg-base-100 py-16 md:py-24">
<div class="container mx-auto px-4">
  <!-- Section Heading -->
  <div class="text-center mb-12 md:mb-16">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">
      What 
      <span class="text-primary">Job Seekers Say</span>
    </h2>
    <p class="text-base-content/70 max-w-xl mx-auto">
      Hear from successful candidates who found their perfect match through our platform
    </p>
  </div>

  <!-- Testimonials Grid -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
    <!-- Testimonial Card 1 -->
    <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow duration-300">
      <div class="card-body">
        <div class="flex items-center gap-4 mb-4">
          <div class="avatar">
            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
              <span class="text-lg font-bold text-primary">JD</span>
            </div>
          </div>
          <div>
            <h3 class="font-bold">John Doe</h3>
            <p class="text-sm text-base-content/70">Software Engineer</p>
          </div>
        </div>
        
        <div class="mb-4 flex gap-1 text-primary">
          <!-- Stars -->
          ★★★★★
        </div>
        
        <p class="text-base-content/90 mb-6">
          "This platform helped me land my dream job at a top tech company. The application process was seamless!"
        </p>
      </div>
    </div>

    <!-- Testimonial Card 2 -->
    <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow duration-300">
      <div class="card-body">
        <div class="flex items-center gap-4 mb-4">
          <div class="avatar">
            <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center">
              <span class="text-lg font-bold text-secondary">SA</span>
            </div>
          </div>
          <div>
            <h3 class="font-bold">Sarah Ahmed</h3>
            <p class="text-sm text-base-content/70">Marketing Manager</p>
          </div>
        </div>
        
        <div class="mb-4 flex gap-1 text-primary">
          ★★★★☆
        </div>
        
        <p class="text-base-content/90 mb-6">
          "Found multiple relevant opportunities within days. The job matching algorithm is spot-on!"
        </p>
      </div>
    </div>

    <!-- Testimonial Card 3 -->
    <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow duration-300">
      <div class="card-body">
        <div class="flex items-center gap-4 mb-4">
          <div class="avatar">
            <div class="w-12 h-12 rounded-full bg-accent/10 flex items-center justify-center">
              <span class="text-lg font-bold text-accent">MB</span>
            </div>
          </div>
          <div>
            <h3 class="font-bold">Michael Brown</h3>
            <p class="text-sm text-base-content/70">Product Designer</p>
          </div>
        </div>
        
        <div class="mb-4 flex gap-1 text-primary">
          ★★★★★
        </div>
        
        <p class="text-base-content/90 mb-6">
          "The career resources and interview prep materials were incredibly helpful throughout my job search."
        </p>
      </div>
    </div>
  </div>

  <!-- CTA Section -->
  <div class="text-center space-y-8">
    <div class="mb-8">
      <h3 class="text-xl font-bold mb-4">
        Join thousands of happy job seekers!
      </h3>
      <button class="btn btn-primary gap-2">
        Create Your Profile Today
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
      </button>
    </div>

    <div>
      <button class="btn btn-outline btn-primary">
        Read More Testimonials
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>
  </div>
</div>
</section>

<!-- CTA Section -->
<section class="relative bg-gradient-to-r from-primary to-secondary/90 text-primary-content overflow-hidden">
<div class="container mx-auto px-4 py-16 md:py-24">
  <div class="max-w-4xl mx-auto text-center relative z-10">
    <!-- Heading -->
    <h2 class="text-3xl md:text-4xl font-bold mb-6">
      Start Your 
      <span class="text-secondary">Job Search</span> 
      Today!
    </h2>

    <!-- Subheading -->
    <p class="text-lg md:text-xl mb-8 opacity-90 max-w-2xl mx-auto">
      Join thousands of professionals and companies already finding success on our platform
    </p>

    <!-- Action Buttons -->
    <div class="flex flex-col md:flex-row gap-4 justify-center">
      <button class="btn btn-secondary btn-lg gap-2 w-full md:w-auto">
        Sign Up as Job Seeker
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
      </button>

      <button class="btn btn-outline btn-lg gap-2 w-full md:w-auto hover:bg-base-100 hover:text-base-content">
        Post a Job as Employer
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
      </button>
    </div>
  </div>

  <!-- Background Elements -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-0 left-0 w-96 h-96 -translate-x-1/2 -translate-y-1/3">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M44.8,-65.2C56.1,-56.5,61.3,-40.7,67.7,-25.2C74.1,-9.7,81.7,5.5,80.1,19.3C78.5,33.1,67.8,45.4,55.1,53.9C42.4,62.4,27.7,67.1,12.6,69.9C-2.5,72.7,-18,73.6,-30.1,67.7C-42.2,61.8,-50.9,49,-58.9,36.1C-66.9,23.1,-74.3,10.1,-75.9,-4.3C-77.5,-18.7,-73.4,-37.3,-63.5,-49.6C-53.7,-61.8,-38.1,-67.6,-23.4,-74.8C-8.7,-82,5.1,-90.5,19.9,-89.4C34.7,-88.4,50.4,-77.7,59.1,-63.8C67.8,-49.9,69.5,-32.7,71.7,-16.7C73.9,-0.7,76.6,14.1,72.3,25.5C68,36.9,56.7,44.9,45.9,54.2C35.1,63.5,24.7,74.1,11.8,78.8C-1.1,83.5,-16.6,82.3,-28.4,75.3C-40.2,68.3,-48.4,55.5,-57.7,43.3C-67,31.1,-77.4,19.5,-80.4,6.2C-83.5,-7.2,-79.1,-22.3,-70.7,-33.2C-62.3,-44.1,-49.8,-50.8,-37.4,-58.8C-25,-66.8,-12.5,-76.2,1.8,-79.3C16.2,-82.5,32.4,-79.5,44.8,-65.2Z" transform="translate(100 100)"></path>
      </svg>
    </div>
    <div class="absolute bottom-0 right-0 w-96 h-96 translate-x-1/2 translate-y-1/3">
      <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M42.1,-63.9C55.6,-54.7,68.2,-44.5,74.5,-31.6C80.8,-18.7,80.7,-3.1,76.8,10.7C72.9,24.6,65.2,36.5,55.6,46.1C46,55.7,34.5,62.9,21.4,67.3C8.3,71.7,-6.4,73.3,-20.7,70.5C-35,67.7,-49,60.5,-59.5,49.9C-70,39.3,-77.1,25.3,-78.9,10.7C-80.6,-3.8,-77.1,-18.9,-69.2,-30.7C-61.3,-42.5,-49.1,-51.1,-36.3,-60.4C-23.5,-69.7,-10.2,-79.8,2.3,-83.4C14.8,-87.1,29.6,-84.3,42.1,-63.9Z" transform="translate(100 100)"></path>
      </svg>
    </div>
  </div>
</div>
</section>

<footer class="footer p-10 bg-neutral text-neutral-content" data-theme="dark">
<div class="container mx-auto px-4">
  <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Company Information -->
    <div class="space-y-4">
      <div class="flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
        </svg>
        <span class="text-xl font-bold">JobPortal</span>
      </div>
      <p class="opacity-70 text-sm">
        Connecting talent with opportunity since 2025. Our mission is to make job searching and hiring simple, efficient, and effective.
      </p>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="footer-title opacity-100 text-primary">Quick Links</h3> 
      <ul class="menu">
        <li><a class="link link-hover opacity-70 hover:text-primary">Home</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">About Us</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Browse Jobs</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">For Employers</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Blog</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Contact</a></li>
      </ul>
    </div>

    <!-- Job Categories -->
    <div>
      <h3 class="footer-title opacity-100 text-primary">Job Categories</h3> 
      <ul class="menu">
        <li><a class="link link-hover opacity-70 hover:text-primary">IT &amp; Software</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Healthcare</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Marketing</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Finance</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Engineering</a></li>
        <li><a class="link link-hover opacity-70 hover:text-primary">Design</a></li>
      </ul>
    </div>

    <!-- Follow Us -->
    <div>
      <h3 class="footer-title opacity-100 text-primary">Follow Us</h3> 
      <div class="flex gap-4 mt-4">
        <a class="btn btn-circle btn-sm btn-outline hover:btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
          </svg>
        </a>
        <a class="btn btn-circle btn-sm btn-outline hover:btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"></path>
          </svg>
        </a>
        <a class="btn btn-circle btn-sm btn-outline hover:btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>

  <!-- Copyright & Back to Top -->
  <div class="border-t border-neutral-content/10 mt-12 pt-6">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <div class="text-center md:text-left opacity-70 text-sm">
        © 2025 JobPortal. All rights reserved.
      </div>
      <div class="mt-4 md:mt-0">
        <a href="#top" class="btn btn-ghost btn-sm gap-2 hover:text-primary">
          Back to Top
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>
</footer>
</main>