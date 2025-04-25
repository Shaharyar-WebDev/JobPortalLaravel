<!-- Navigation Bar -->
<nav class="navbar bg-base-100 shadow-lg px-4 sm:px-8 sticky top-0 z-50">
    <!-- Logo -->
    <div class="navbar-start !gap-0">
      <a wire:navigate href="{{route('home')}}" class="btn btn-ghost text-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        LinkDeed
      </a>
    </div>

    <!-- Desktop Navigation -->
    @if(!Request::routeIs('user.signup', 'employer.signup', 'login'))
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal gap-2 px-1">
        <li><a wire:navigate class="hover:text-primary" href="{{route('home')}}">Home</a></li>
        <li><a wire:navigate class="hover:text-primary" href="{{route('jobs')}}">Jobs</a></li>
        <li><a wire:navigate href="{{route('industries')}}">Industries</a></li>
        <li><a wire:navigate href="{{route('companies')}}">Companies</a></li>
      </ul>
    </div>
    @endif

    <!-- Desktop Search and Auth -->
    <div class="navbar-end md:gap-4">

      <!-- Theme Toggle -->
      <div class="hidden md:block dropdown">
        <div tabindex="0" role="button" class="btn m-1">
          Theme
          <svg width="12px" height="12px" class="inline-block h-2 w-2 fill-current opacity-60"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
            <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
          </svg>
        </div>
        <ul tabindex="0" class="dropdown-content bg-base-300 rounded-box z-1 p-2 shadow-2xl">
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Dark"
              value="dark" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Light"
              value="light" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Corporate"
              value="corporate" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Business"
              value="business" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Luxury"
              value="luxury" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Night"
              value="night" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Black"
              value="black" />
          </li>
        </ul>
      </div>

      <!-- Auth Buttons (Desktop) -->
        @if(Auth::guest())
      <div class="lg:flex gap-2">
        <a wire:navigate href="{{route('login')}}" class="btn btn-outline btn-ghost hidden lg:flex">Login
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path>
        </svg>
        </a>
        @if(Request::routeIs('user.signup'))
        <a wire:navigate href="{{route('employer.signup')}}" class="btn btn-primary h-auto"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
        </svg>        
        Employer Sign Up
      </a>
      @elseif (Request::routeIs('employer.signup'))
      <a wire:navigate href="{{route('user.signup')}}" class="btn btn-primary h-auto"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
      </svg>         
     User Sign Up
    </a>
      @else
      <a wire:navigate href="{{route('user.signup')}}" class="btn btn-primary h-auto"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
      </svg>         
     Sign Up
    </a>
      @endif
      </div>
      @else
      <div class="flex gap-2">
        <!-- Profile Dropdown -->
        <div class="dropdown dropdown-end">
            <button class="btn btn-ghost flex items-center gap-3 hover:bg-primary/10" title="{{Auth::user()->email}}">
        <div class="avatar">
            <div class="w-10 flex justify-center items-center rounded-full bg-primary/10 ring ring-primary/20">
                <!-- user avatar or initials -->
                @php
                if(Auth::user()->role == 'user'){
                    $user = \App\Models\User::find(Auth::id());
                    $image = $user->image;
                        $disk = 'users';
                    }
                    elseif(Auth::user()->role == 'employer'){
                        
                        $image = \App\Models\Company::where('user_id', Auth::id())->first()->image;
                        $disk = 'companies';
                    }
                @endphp
                @if($image && Storage::disk('public')->exists("/images/$disk/".$image))
                <img class="text-primary w-full h-[100%] flex justify-center items-center" src="{{asset("/storage/images/$disk/".$image)}}">
                @else
                <span class="text-primary w-full h-[100%] flex justify-center items-center">
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
        <svg width="12px" height="12px" class="inline-block h-2 w-2 fill-current opacity-60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2048 2048">
          <path d="M1799 349l242 241-1017 1017L7 590l242-241 775 775 775-775z"></path>
        </svg>
    </button>
            
            <!-- Dropdown Menu -->
            <ul class="dropdown-content z-[1] menu p-2 shadow-xl bg-base-100 rounded-box w-52 
                      border border-base-300 mt-4" tabindex="0">
                      @if(Auth::user()->role == "user")
                <li>
                    <a wire:navigate href="{{route('user.profile')}}" class="gap-2 text-base-content hover:bg-primary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Profile
                    </a>
                </li>
                @else
                <li>
                    <a wire:navigate href="{{route( 'employer.dashboard')}}" class="gap-2 text-base-content hover:bg-primary/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                @endif
                <li>
                    <a wire:navigate href="{{route('logout')}}" class="gap-2 text-error hover:bg-error/10">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" 
                                  d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
      @endif

      <!-- Mobile Menu Button -->
      <div class="lg:hidden dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </label>
        <ul tabindex="0" class="dropdown-content menu menu-sm mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          @if(!Request::routeIs('user.signup', 'employer.signup', 'login'))
          <li class="menu-title">
            <span>Menu</span>
          </li>
          <li><a wire:navigate href="{{route('home')}}">Home</a></li>
          <li><a wire:navigate href="{{route('jobs')}}">Jobs</a></li>
          <li><a wire:navigate href="{{route('industries')}}">Industries</a></li>
          <li><a wire:navigate href="{{route('companies')}}">Companies</a></li>
          @endif
          @if(Auth::guest())
          <li class="menu-title">
            <span>Account</span>
          </li>
          <li><a wire:navigate href="{{route('login')}}">Login</a></li>
          <li><a wire:navigate href="{{route('user.signup')}}">Sign Up</a></li>
          @endif
          <li class="menu-title">Theme</li>
              <li>
                <input type="radio" name="theme-dropdown"
                  class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Dark"
                  value="dark" />
              </li>
              <li>
                <input type="radio" name="theme-dropdown"
                  class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Light"
                  value="light" />
              </li>
              <li>
                <input type="radio" name="theme-dropdown"
                  class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Corporate"
                  value="corporate" />
              </li>
              <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Business"
              value="business" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Luxury"
              value="luxury" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Night"
              value="night" />
          </li>
          <li>
            <input type="radio" name="theme-dropdown"
              class="theme-controller !w-full btn btn-sm btn-block btn-ghost justify-start" aria-label="Black"
              value="black" />
          </li>
            </ul>
          </li>
      </div>
    </div>
</nav>