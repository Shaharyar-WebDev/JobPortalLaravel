<div>
    {{-- Be like water. --}}
     <!-- Hero Section -->
 <div class="hero h-auto min-h-96 relative overflow-hidden">
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
        </div></div>
    <div class="hero-content text-center relative">
        <div class="max-w-2xl">
            @if($company->image && Storage::disk('public')->exists('/images/companies/'.$company->image))
            <img loading="lazy" src="{{asset('storage/images/companies/'.$company->image)}}" class="object-cover w-32 h-32 mx-auto mb-6 rounded-full bg-primary/10 flex items-center justify-center">
                <!-- <span class="text-4xl font-bold text-primary">TL</span> -->
            @else
            <div class="object-cover w-32 h-32 mx-auto mb-6 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="text-primary text-3xl font-bold">
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
            <h1 class="mb-4 text-4xl font-bold">{{$company->name}}</h1>
            <div class="flex flex-col justify-center gap-4 mb-4 items-center">
                <span class="badge h-auto badge-lg badge-primary"><a class="hover:underline" wire:navigate
                    href="{{route('jobs', ['industry' => $company->industry->id])}}">{{$company->industry->name}}</a>
                </span>
                <span class="text-lg flex items-center md:gap-2"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"></path>
  </svg>
  <span>
  <a class="hover:underline" wire:navigate href="{{route('jobs', ['city' => $company->city->id])}}">{{$company->city->name}}</a>, <a class="hover:underline" wire:navigate href="{{route('jobs', ['city_area' => $company->city_area->id])}}">{{$company->city_area->name}}</a>
</span></span>
            </div>
        </div>
    </div>
  </div>
  
  <!-- Main Content -->
  <main class="container mx-auto px-4 py-8">
      <!-- About Section -->
      <div class="grid lg:grid-cols-3 gap-8 mb-12">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-3xl font-bold">Description</h2>
            <div class="text-base-content/80 leading-[2] pb-8">
                {!!$company->description!!}
            </div>
    
            <!-- Key Details Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Existing stats counter cards remain unchanged -->
                <div class="stats shadow-sm bg-base-200">
                    <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                          </svg>                          
                    </div>
                    <div class="stat-title">{{Str::plural('Job', number_format($company->job_posts_count))}}</div>
                    <div class="text-2xl font-bold text-primary" data-count="{{number_format($company->job_posts_count)}}" id="counter-job-posts">{{number_format($company->job_posts_count)}}</div>
                </div>
            
                </div>
                <div class="stats counter shadow-sm bg-base-200">
                     <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Company Size</div>
                    <div class="text-2xl font-bold text-primary">{{$company->company_size}}</div>
                    <div class="stat-desc">Employees</div>
                </div>
            
        
                </div>
                @if($company->valuation)
                <div class="stats shadow-sm bg-base-200">
                     <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"></path>
</svg>

                    </div>
                    <div class="stat-title">Valuation</div>
                    <div class="text-2xl font-bold text-primary" data-count="{{$company->valuation}}" id="valuation-counter">
                        {{App\Helpers\MyFunc::currency_format($company->valuation)}}
                    </div>
                    <div class="stat-desc">Pakistani Rupees (pkr)</div>
                </div>
                </div>
                @endif
            </div>
    
            <!-- Updated Social & Share Section -->
             <!-- Social Cards Grid -->
        <div class="grid grid-cols-1 gap-4">
          @php
          $company_emp = \App\Models\User::findOrFail($company->user_id);
          @endphp

        @if($company_emp->github || $company_emp->linkedin)
          <div class="card bg-base-200 shadow-sm">
            <div class="card-body p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold">Connect With Us</h3>
                        <p class="text-sm text-base-content/70">Follow our social channels for updates</p>
                    </div>
                    <div class="flex gap-2 mt-4 md:mt-0">
                      @if($company_emp->linkedin)
                        <a class="btn btn-ghost btn-circle text-primary hover:bg-base-300" href="{{$company_emp->linkedin}}" title="{{$company_emp->linkedin}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                            </svg>
                        </a>
                        @endif
                        @if($company_emp->github)
                        <a class="btn btn-ghost btn-circle text-primary hover:bg-base-300" href="{{$company_emp->github}}" title="{{$company_emp->github}}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>


@endif

@php
  $company_url = route('company.view', [
    'id'=>$company->id,'slug'=>App\Helpers\MyFunc::sexySlug($company->name, time : false)]);
@endphp

<div class="card bg-base-200 shadow-sm">
    <div class="card-body p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <!-- Text Content -->
            <div class="space-y-2">
                <h3 class="text-xl font-bold">Share This Company</h3>
                <p class="text-sm text-base-content/70">Spread the word with your network</p>
            </div>
            
            <!-- Social Icons -->
            <div class="flex gap-2">
                {{-- <!-- Twitter/X -->
                <a class="btn btn-ghost btn-circle text-primary hover:bg-base-300 transition-colors" aria-label="Share on Twitter">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
                    </svg>
                </a> --}}

                <!-- Facebook -->
                <a class="btn btn-ghost btn-circle text-primary hover:bg-base-300 transition-colors" href="https://www.facebook.com/sharer/sharer.php?u={{ $company_url }}" target="_blank"
                  title="https://www.facebook.com/sharer/sharer.php?u={{ $company_url }}" aria-label="Share on Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
                    </svg>
                </a>

                <!-- LinkedIn -->
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $company_url }}&title={{ $company->name }}" title="https://www.linkedin.com/shareArticle?mini=true&url={{ $company_url }}&title={{ $company->name }}" class="btn btn-ghost btn-circle text-primary hover:bg-base-300 transition-colors" target="_blank" aria-label="Share on LinkedIn">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                    </svg>
                </a>

                <!-- Generic Share -->
                <a onclick="shareCompanyProfile()" class="btn btn-ghost btn-circle text-primary hover:bg-base-300 transition-colors" aria-label="Share via Link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        <!-- Optional Copy Link Field -->
        <div class="mt-4">
            <div class="flex gap-2">
                <input type="text" id="url" value="{{$company_url}}" class="input input-bordered w-full truncate" readonly="">
                <button onclick="copy('{{$company_url}}')" class="btn btn-ghost text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
        </div>
    

        </div>
    
        <!-- Right Column - Updated Company Details -->
        <div class="card bg-base-200 shadow-sm h-fit">
            <div class="card-body p-6 space-y-6">
                <!-- Company Info Section -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold">Key Details</h3>
                    <div class="space-y-6">
                        <!-- Industry -->
                        <div class="flex gap-4">
                            <div class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-base-content/70 mb-1">Primary Industry</p>
                                <p class="font-medium">{{$company->industry->name}}</p>
                                <p class="text-sm text-base-content/70 mt-1">{{$company->sub_industry->name}}</p>
                            </div>
                        </div>
    
                        <!-- Location -->
                        <div class="flex gap-4">
                            <div class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-base-content/70 mb-1">Address</p>
                                <p class="font-medium">{{$company->city->name}}
                                </p>
                                <p>
                                {{$company->city_area->name}}
                                </p>
                                <p class="text-sm text-base-content/70 mt-1">{{$company->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="divider"></div>
    
                <!-- Contact Section -->
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold">Contact Channels</h3>
                    <div class="space-y-6">
                        <!-- Email -->
                        <div class="flex gap-4">
                            <div class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-base-content/70 mb-1">Business Inquiries</p>
                                <a href="mailto:{{$company->email}}" class="link link-primary font-medium">{{$company->email}}</a>
                            </div>
                        </div>
    
                        <!-- Phone -->
                        <div class="flex gap-4">
                            <div class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-base-content/70 mb-1">HR Department</p>
                                <p class="font-medium">{{$company->contact}}</p>
                            </div>
                        </div>
    
                        @if($company->website)
                        <!-- Website -->
                        <div class="flex gap-4">
                            <div class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-base-content/70 mb-1">Online Presence</p>
                                <a href="{{$company->website}}" class="link link-primary font-medium" target="_blank">{{$company->website}}</a>
                            </div>
                        </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
  
      <!-- Open Jobs -->
      <section class="mb-12">
        <div class="flex items-center justify-between mb-8">
            <h3 class="text-3xl font-bold"> Latest Jobs</h3>
            <div class="badge badge-lg badge-primary">Total {{number_format(count($jobs))}} {{Str::Plural('job', $jobs)}}</div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
              <!-- Job Card -->
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
          
              @if(!App\Models\User::isRole('employer'))
                 
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
                 @if(Auth::check())
          
                 @if(App\Models\User::isRole('user'))
                 @if(\App\Models\User::hasAppliedTo($job->id))
                  <div class="card-actions">
                    <button class="btn btn-success disabled flex gap-4 w-full" disabled>
                    Already Applied
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>                                 
                    </button>
                  </div>
                 @else
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
          
          
                  @endif
                  @else
                    <div class="card-actions">
                      <button class="btn btn-disabled h-auto flex gap-4 w-full">
                      Employers Can Not Apply!
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                      </svg>                                       
                      </button>
                    </div>
                    </a>
                  @endif
                 @else
                 <a wire:click="urlStore({{$job->id}})" wire:navigate href="{{route( 'login',['redirect_to'=>route('job.apply', ['id'=>$job->id, 'slug'=>$job->slug])])}}">
                  <div class="card-actions">
                    <button class="btn btn-primary h-auto flex gap-4 w-full">
                    Login To Apply Now
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>                    
                    </button>
                  </div>
                  </a>
                 @endif
                  </div>
                </div>
              
          
                @endforeach
              @else
              <!-- Empty State -->
              <div class="col-span-4 w-full flex justify-center items-center">
              <div class="text-center py-16">
            <div class="max-w-md mx-auto mb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-base-content/20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <h2 class="text-xl font-bold mb-4">No Job Postings For This Company Yet</h2>
            <p class="text-base-content/70 mb-6">Please Check Back Later For Jobs</p>
              </div>
            </div>
              @endif
              <!-- Add more job cards -->
              
          </div>

          @if(count($jobs) > 0)
            <!-- View All Button -->
  <div class="text-center">
    <a wire:navigate href="{{route('jobs', ['company'=> $company->id])}}">
    <button class="btn btn-outline btn-primary px-8">
      View All Jobs Of Company
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
      </svg>
    </button>
  </a>
  </div>
  @endif
      </section>
      @includeIf('livewire.partials.alert')
  
      {{-- <!-- Reviews Section -->
      <section class="bg-base-100 py-8 md:py-12">
        <div class="container mx-auto px-4">
          <!-- Section Header -->
          <div class="flex items-center justify-between mb-8">
            <h3 class="text-3xl font-bold">Replies</h3>
            <div class="badge badge-lg badge-primary">Total 24 Replies</div>
          </div>
      
          <!-- Reply Form -->
          <div class="card bg-base-200 shadow-sm mb-8">
            
          </div>
      
          <!-- Replies List -->
          <div class="space-y-6">
            <!-- Reply Item -->
            <article class="card bg-base-200 shadow-sm">
        <div class="card-body p-6">
          <div class="flex gap-4">
            <!-- User Avatar -->
            <div class="avatar">
              <div class="w-12 h-12 rounded-full bg-secondary/10 flex items-center justify-center">
                <span class="text-lg font-bold text-secondary">SA</span>
              </div>
            </div>
      
            <!-- Content -->
            <div class="flex-1">
              <!-- Header -->
              <div class="flex flex-wrap items-center gap-3 mb-2">
                <h4 class="font-bold">Sarah Ahmed</h4>
                <span class="badge badge-sm">HR Manager</span>
                <span class="text-sm text-base-content/70">• 2 hours ago</span>
                <!-- Star Rating -->
                <div class="rating rating-xs rating-half pointer-events-none">
                  <input type="radio" name="rating-3" class="rating-hidden">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-1" checked="">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-2" checked="">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-1" checked="">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-2" checked="">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-1">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-2">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-1">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-2">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-1">
                  <input type="radio" name="rating-3" class="bg-primary mask mask-star-2 mask-half-2">
                </div>
              </div>
      
              <!-- Message -->
              <p class="text-base-content/90 mb-4">
                Thank you for your application! We've scheduled the next interview round 
                for July 25th. Please confirm your availability by tomorrow.
              </p>
      
              <!-- Actions -->
              <div class="flex items-center gap-4">
                <button class="btn btn-ghost btn-sm text-base-content/70 hover:bg-base-300 gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                  </svg>
                  Reply
                </button>
                <button class="btn btn-ghost btn-sm text-base-content/70 hover:bg-base-300 gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                  </svg>
                  12
                </button>
              </div>
            </div>
          </div>
        </div>
      </article>
      
            <!-- Second Reply Example -->
            <article class="card bg-base-200 shadow-sm">
              <div class="card-body p-6">
                <div class="flex gap-4">
                  <div class="avatar">
                    <div class="w-12 h-12 rounded-full bg-accent/10 flex items-center justify-center">
                      <span class="text-lg font-bold text-accent">MB</span>
                    </div>
                  </div>
                  <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                      <h4 class="font-bold">Michael Brown</h4>
                      <span class="badge badge-sm">Candidate</span>
                      <span class="text-sm text-base-content/70">• 1 hour ago</span>
                    </div>
                    <p class="text-base-content/90 mb-4">
                      Thanks for the update! I'm available all day on the 25th. Looking forward 
                      to the next steps in the process.
                    </p>
                    <div class="flex items-center gap-4">
                      <button class="btn btn-ghost btn-sm text-base-content/70 hover:bg-base-300 gap-1">
                        <!-- Reply Icon -->
                        Reply
                      </button>
                      <button class="btn btn-ghost btn-sm text-base-content/70 hover:bg-base-300 gap-1">
                        <!-- Like Icon -->
                        5
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </article>
          </div>
      
          <!-- Pagination -->
          <div class="flex justify-center mt-8">
            <div class="btn-group">
              <button class="btn btn-ghost">Previous</button>
              <button class="btn btn-ghost btn-active">1</button>
              <button class="btn btn-ghost">2</button>
              <button class="btn btn-ghost">3</button>
              <button class="btn btn-ghost">Next</button>
            </div>
          </div>
        </div>
      </section> --}}
  </main>
  
  {{-- <dialog id="reviewModal" class="modal"> NOT IN USE
      <div class="modal-box">
          <h3 class="font-bold text-lg mb-4">Add Your Review</h3>
        <div class="modal-action">
          
      <form class="space-y-4 w-full" method="dialog">
          <!-- Rating -->
          <div class="form-control">
            <label class="label">
              <span class="label-text">Your Rating</span>
            </label>
            <div class="rating rating-md gap-1">
              <input type="radio" name="rating" class="mask mask-star-2 bg-orange-400">
              <input type="radio" name="rating" class="mask mask-star-2 bg-orange-400" checked="">
              <input type="radio" name="rating" class="mask mask-star-2 bg-orange-400">
              <input type="radio" name="rating" class="mask mask-star-2 bg-orange-400">
              <input type="radio" name="rating" class="mask mask-star-2 bg-orange-400">
            </div>
          </div>
          <!-- Review Text -->
          <div class="form-control">
            <label class="label">
              <span class="label-text">Your Review</span>
            </label>
            <textarea class="textarea textarea-bordered h-32" placeholder="Share your experience..." required=""></textarea>
            <label class="label">
              <span class="label-text-alt">Max 500 characters</span>
            </label>
          </div>
          <!-- Submit Button -->
          <button type="button" id="review" class="btn btn-primary w-full">
            Submit Review
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
            </svg>
          </button>
        </form>
        </div>
      </div>
    </dialog> --}}
</div>


@push('scripts')
  <script>
    function shareCompanyProfile() {
        if (navigator.share) {
            navigator.share({
                title: '{{ $company->name }}',
                text: 'Check out this company profile on LinkDeed!',
                url: '{{ request()->fullUrl() }}'
            }).then(() => {
                console.log('Shared successfully!');
            }).catch((error) => {
                console.error('Error sharing:', error);
            });
        } else {
            alert('Sharing not supported on this browser. Please use copy/paste or social icons.');
        }
    }

    function copy(url){
      navigator.clipboard.writeText(url);
    }
</script>
<script type="module" src="/js/company-profile.js"></script>
@endpush
 