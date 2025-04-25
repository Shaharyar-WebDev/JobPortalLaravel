@if(Str::contains(url()->current(),'user/dashboard'))

  <div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle">
    
    <!-- Main Content -->
    <div class="drawer-content flex flex-col">
        <!-- Navbar for Mobile -->
        <div class="lg:hidden navbar bg-base-100">
            <div class="flex-none">
                <label for="my-drawer-2" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>
        </div>

        <!-- Dashboard Main -->
  {{$slot}}
        <!-- Dashboard Main End -->
    </div>

    <!-- Sidebar -->
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <aside class="w-80 min-h-screen bg-base-200 p-4">
            <div class="flex items-center gap-4 mb-8">
                <div class="avatar">
                    <div class="w-10 flex justify-center items-center rounded-full bg-primary/10 ring ring-primary/20">
                        <!-- user avatar or initials -->
                        @php
                        if(Auth::user()->role == 'user'){
                            $user = \App\Models\User::find(Auth::id());
                            $image_name = $user->image;
                                $disk = 'users';
                            }
                            elseif(Auth::user()->role == 'employer'){
                                
                                $image_name = \App\Models\Company::where('user_id', Auth::id())->first()->image;
                                $disk = 'companies';
                            }
                        @endphp
                        @if($image_name && Storage::disk('public')->exists("/images/$disk/".$image_name))
                        <img class="text-primary w-full h-[100%] flex justify-center items-center" src="{{asset("/storage/images/$disk/".$image_name)}}">
                        @else
                        <span class="text-primary w-full h-[100%] flex justify-center items-center font-semibold">
                          @php
                          $initials = "";
                          $user_name = explode(' ', Auth::user()->name);
                          foreach($user_name as $name){
                            $initials.=substr($name, 0, 1);
                          }
                          @endphp
                          {{$initials}}
                        </span>
                        @endif
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{Auth::user()->name}}</h2>
                    <p class="text-sm">{{ucfirst(Auth::user()->role)}}</p>
                </div>
            </div>

            <ul class="menu">
              <li><a  class="my-1 flex items-center gap-2 p-4 @if(url()->current() === route('employer.jobs-add')) active @endif" wire:navigate href={{route('user.savedJobs')}}>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>                
                Saved Jobs</a></li>
                <li><a class="my-1 flex items-center gap-2 p-4  @if(url()->current() === route('user.applications'))active @endif" wire:navigate href={{route('user.applications')}}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                      </svg>
                       My Applications</a></li>
                <li><a class="my-1 flex items-center gap-2 p-4  @if(url()->current() === route('user.profile'))active @endif" wire:navigate href={{route('user.profile')}}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>                      
                    Profile Settings</a></li>
            </ul>

            <!-- Profile Completeness -->
            {{-- <div class="mt-8 card bg-base-100 shadow">
                <div class="card-body p-4 text-center flex flex-col justify-center items-center">
                    <h3 class="font-bold mb-2">Profile Strength</h3>
                    <div class="text-center radial-progress transition text-primary" style="--value:75">75%</div>
                    <p class="text-sm mt-2">Complete your profile for better job matches</p>
                </div>
            </div> --}}
        </aside>
    </div>
    
</div>

  @elseif(Str::contains(url()->current(),'employer/dashboard'))

  <div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle">
    
    <!-- Main Content -->
    <div class="drawer-content flex flex-col">
        <!-- Navbar for Mobile -->
        <div class="lg:hidden navbar bg-base-100">
            <div class="flex-none">
                <label for="my-drawer-2" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>
        </div>

        <!-- Dashboard Main -->
  {{$slot}}
        <!-- Dashboard Main End -->
    </div>

    <!-- Sidebar -->
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <aside class="w-80 min-h-screen bg-base-200 p-4">
            <div class="flex items-center gap-4 mb-8">
                <div class="avatar">
                    <div class="w-10 flex justify-center items-center rounded-full bg-primary/10 ring ring-primary/20">
                        <!-- user avatar or initials -->
                        @php
                        if(Auth::user()->role == 'user'){
                            $user = \App\Models\User::find(Auth::id());
                            $image_name = $user->image;
                                $disk = 'users';
                            }
                            elseif(Auth::user()->role == 'employer'){
                                
                                $image_name = \App\Models\Company::where('user_id', Auth::id())->first()->image;
                                $disk = 'companies';
                            }
                        @endphp
                        @if($image_name && Storage::disk('public')->exists("/images/$disk/".$image_name))
                        <img class="text-primary w-full h-[100%] flex justify-center items-center" src="{{asset("/storage/images/$disk/".$image_name)}}">
                        @else
                        <span class="text-primary w-full h-[100%] flex justify-center items-center font-semibold">
                          @php
                          $initials = "";
                          $user_name = explode(' ', Auth::user()->name);
                          foreach($user_name as $name){
                            $initials.=substr($name, 0, 1);
                          }
                          @endphp
                          {{$initials}}
                        </span>
                        @endif
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-bold">{{Auth::user()->name}}</h2>
                    <p class="text-sm">{{ucfirst(Auth::user()->role)}}</p>
                </div>
            </div>

            <ul class="menu">
                <li><a class="my-1 flex items-center gap-2 p-4  @if(url()->current() === route('employer.dashboard'))active @endif" wire:navigate href={{route('employer.dashboard')}}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                  </svg>
                   Dashboard</a></li>
                <li class="[&_details>summary]:hover:bg-primary/10 @if (Request::routeIs('employer.jobs')) active @endif ">
                    <!-- Collapsible Parent -->
                    <details
                    @if (Str::contains(url()->current(), '/jobs')) open @endif
                    >
                        <summary class="flex items-center justify-between gap-2 p-4 my-1 cursor-pointer">
                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                                  </svg>
                                Jobs
                            </div>
                        </summary>
                
                        <!-- Nested Items -->
                        <ul class="pl-4">
                            <li>
                                <a class="my-1 flex items-center gap-3 p-4 hover:bg-primary/10 @if (Request::routeIs('employer.jobs-add')) active @endif" 
                                   wire:navigate href="{{route('employer.jobs-add')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                              d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Add Jobs
                                </a>
                            </li>
                            <li>
                                <a class="my-1 flex items-center gap-3 p-4 hover:bg-primary/10 @if (Request::routeIs('employer.jobs-view')) active @endif" 
                                   wire:navigate href="{{route('employer.jobs-view')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                         stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" 
                                              d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                    </svg>
                                    View Jobs
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>
                <li><a class="my-1 flex items-center gap-3 p-4   @if (Request::routeIs('employer.manage-applications')) active @endif" wire:navigate href={{route('employer.manage-applications')}}>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                      </svg>
                       Manage Applications</a></li>
                <li><a class="my-1 flex items-center gap-3 p-4   @if (Request::routeIs('employer.profile'))active @endif" wire:navigate href={{route('employer.profile')}}><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                  </svg>
                   Profile & Settings</a></li>
            </ul>

            <!-- Profile Completeness -->
        </aside>
    </div>
    
</div>

  @endif