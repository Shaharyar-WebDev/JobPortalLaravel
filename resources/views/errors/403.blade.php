<!DOCTYPE html>
<html lang="en" data-theme="business">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden - Linkdeed JobPortal</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen bg-base-100">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl text-error mx-auto text-center min-h-[76vh] flex justify-center items-center">
            <!-- Animated SVG -->
            <div class="float-animation">
                <div class="float-animation">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-44 h-44 mx-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                      </svg>                  
            </div>

            <!-- Content -->
            <h1 class="text-4xl font-bold text-base-content text-error mb-4">403 - Access Denied</h1>
            <p class="text-lg text-error text-base-content/70 mb-8">
                {{$exception->getMessage() ?: "Our cyber-shields detected unauthorized access. Don't worry, it's not personal!"}}
              
            </p>
            <div class="flex justify-center gap-4">
                <a wire:navigate href="{{route('home')}}" class="btn btn-primary gap-2 hover:scale-[1.02] transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Return Home
                </a>
            </div>
        </div>
    </div>
</body>
<script type="module" src="/js/app.js"></script>
</html>