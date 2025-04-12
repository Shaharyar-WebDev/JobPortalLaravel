<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'JobPortal - Find Your Dream Job' }}</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
 <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

@stack('headScripts')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      font-family: 'poppins', sans-serif;
    }
    
  </style>
</head>

<body>
  <!-- Navigation Bar -->
  <nav class="navbar bg-base-100 shadow-lg px-4 sm:px-8 sticky top-0 z-50">
    <!-- Logo -->
    <div class="navbar-start">
      <a wire:navigate href="{{route('home')}}" class="btn btn-ghost text-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-primary" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
        </svg>
        JobPortal
      </a>
    </div>

    <!-- Desktop Navigation -->
    <div class="navbar-center hidden lg:flex">
      <ul class="menu menu-horizontal gap-2 px-1">
        <li><a wire:navigate class="hover:text-primary" href="{{route('home')}}">Home</a></li>
        <li><a wire:navigate class="hover:text-primary" href="{{route('jobs')}}">Jobs</a></li>
        <li><a wire:navigate href="{{route('industries')}}">Industries</a></li>
        <li><a wire:navigate href="{{route('companies')}}">Companies</a></li>
      </ul>
    </div>

    <!-- Desktop Search and Auth -->
    <div class="navbar-end gap-4">

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
        </ul>
      </div>

      <!-- Auth Buttons (Desktop) -->
      <div class="hidden lg:flex gap-2">
        <a class="btn btn-ghost">Login</a>
        <a wire:navigate href="{{route('user.profile')}}" class="btn btn-primary">Sign Up</a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="lg:hidden dropdown dropdown-end">
        <label tabindex="0" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </label>
        <ul tabindex="0" class="dropdown-content menu menu-sm mt-3 p-2 shadow bg-base-100 rounded-box w-52">
          <li class="menu-title">
            <span>Menu</span>
          </li>
          <li><a wire:navigate href="{{route('home')}}">Home</a></li>
          <li><a wire:navigate href="{{route('jobs')}}">Jobs</a></li>
          <li><a wire:navigate href="{{route('industries')}}">Industries</a></li>
          <li><a wire:navigate href="{{route('companies')}}">Companies</a></li>
          <li class="menu-title">
            <span>Account</span>
          </li>
          <li><a>Login</a></li>
          <li><a>Sign Up</a></li>
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
            </ul>
          </li>
      </div>
    </div>
  </nav>

  @if(Str::contains(url()->current(),'account'))

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
            <div class="flex items-center gap-2 mb-8">
                <div class="w-12 h-12 rounded-box bg-primary/10 flex items-center justify-center">
                    <span class="text-xl font-bold text-primary">JD</span>
                </div>
                <div>
                    <h2 class="text-xl font-bold">John Doe</h2>
                    <p class="text-sm">Software Engineer</p>
                </div>
            </div>

            <ul class="menu">
              <li><a  class="my-1 flex items-center gap-2 p-4 @if(url()->current() === route('user.savedJobs')) active @endif" wire:navigate href={{route('user.savedJobs')}}>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>                
                Saved Jobs</a></li>
                <li><a class="my-1 flex items-center gap-2 p-4  @if(url()->current() === route('user.applications'))active @endif" wire:navigate href={{route('user.applications')}}>📨 My Applications</a></li>
                <li><a class="my-1 flex items-center gap-2 p-4  @if(url()->current() === route('user.profile'))active @endif" wire:navigate href={{route('user.profile')}}>👤 Profile Settings</a></li>
            </ul>

            <!-- Profile Completeness -->
            <div class="mt-8 card bg-base-100 shadow">
                <div class="card-body p-4 text-center flex flex-col justify-center items-center">
                    <h3 class="font-bold mb-2">Profile Strength</h3>
                    <div class="text-center radial-progress transition text-primary" style="--value:75">75%</div>
                    <p class="text-sm mt-2">Complete your profile for better job matches</p>
                </div>
            </div>
        </aside>
    </div>
</div>

  @else

  {{$slot}}

  @endif

  <script type="module" src="/js/app.js"></script>

  @stack('scripts')

</body>

</html>