<!DOCTYPE html>
<html lang="en" data-theme="business">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found - Linkdeed JobPortal</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.9.4/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="min-h-screen bg-base-100">
    <div class="container mx-auto px-4 py-16">
        <div class="max-w-4xl mx-auto text-center min-h-[76vh] flex justify-center items-center">
            <!-- Animated SVG -->
            <div class="float-animation">
                <div class="float-animation flex justify-center items-center text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-36 h-36 mb-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                      </svg>                                
            </div>

            <!-- Content -->
            <h1 class="text-4xl font-bold text-base-content mb-4">404 - Page Not Found</h1>
            <p class="text-lg text-base-content/70 mb-8">
                Oops! The page you're looking for has vanished into the digital void.
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