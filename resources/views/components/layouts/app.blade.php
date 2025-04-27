<!DOCTYPE html>
<html style="scroll-behavior: smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="corporate">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Linkdeed JobPortal - Find Your Dream Job' }}</title>
  @include('components.layouts.scripts')
</head>

@stack('headScripts')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body {
      font-family: 'poppins', sans-serif;
    }
    
  </style>
</head>

<body>
  
  @include('components.layouts.navbar')

  @if(Str::contains(url()->current(), 'dashboard'))
  @include('components.layouts.sidebar')
  @else
  {{$slot}}
@if(!Request::routeIs('user.signup', 'employer.signup', 'login'))
  @includeIf('components.layouts.footer')
@endif
  @endif


  <script type="module" src="/js/app.js"></script>

  @stack('scripts')

</body>

</html>