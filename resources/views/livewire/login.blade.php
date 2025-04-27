<main class="min-h-screen bg-base-200 flex items-center justify-center p-4">
    <!-- The best athlete wants his opponent at his best. -->
    <div class="p-6 card bg-base-100 shadow-xl w-full max-w-md transition-all duration-300">
        <!-- Card Header -->
        <div class="p-6 border-b border-base-300">
            <div class="flex justify-center items-center">
                <h2 class="text-2xl font-bold flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-primary">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>                      
                    Welcome Back!
                </h2>
            </div>
        </div>
    
        <!-- Form -->
        <form wire:submit="login" class="space-y-4">
            <!-- Email -->
            <div class="form-control relative">
                <label class="label">
                    <span class="label-text">Email Address</span>
                </label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                    </svg>
                    <input type="email" wire:model="email" 
                           class="input input-bordered input-primary w-full pl-12" 
                           placeholder="Enter your email" required>
                </div>
                    @error('email')
                    <span class="text-error mt-3">
                     {{ $message }} 
                    </span>
                    @enderror
            </div>
    
            <!-- Password -->
            <div class="form-control relative">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                    </svg>
                    <input type="password" wire:model="password" 
                           class="input input-bordered input-primary w-full pl-12" 
                           placeholder="••••••••" required>
                </div>
                @error('password')
                <span class="text-error mt-3">
                     {{ $message }}
                </span>
                @enderror
            </div>
    
            <div class="divider"></div>
            <!-- Submit Button -->
            <button type="submit" wire:loading.attr="disabled" 
                    class="btn btn-primary w-full mt-6">
                <span class="flex gap-2 items-center" wire:loading.class="loading loading-spinner">
                    Sign In
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                    </svg>
                </span>
            </button>
        </form>
    
        <!-- Card Footer -->
        <div class="p-6 border-t border-base-300 text-center">
            <p class="text-sm text-base-content/70">
                New to JobPortal? 
                <a wire:navigate href="{{route('user.signup')}}" class="link link-primary">Create account</a>
            </p>
        </div>
    </div>
    @if(session('response'))
    <div class="toast toast-top w-full justify-center items-center md:wd-auto top-20 toast-center md:toast-end z-50" id="php-toast">
        <div class="flex gap-2 alert alert-{{session('response')['status']}} shadow-lg max-w-md">
            <div class="flex items-center gap-2">
                <!-- Icons based on type -->
                @php
                    $icons = [
                        'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"/></svg>',
                        'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>',
                        'warning' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M6.938 4h10.124C18.07 4 19 4.93 19 6v12c0 1.07-.93 2-2.082 2H7.082C6.03 20 5 19.07 5 18V6c0-1.07.93-2 2.062-2z"/></svg>',
                        'info' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/></svg>',
                    ];
                    @endphp
                    {!!$icons[strToLower(session('response')['status'])]!!}
                <span>{{session('response')['message']}}</span>
            </div>
            <button onclick="this.closest('.toast').remove()" class="btn btn-ghost btn-xs ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Auto-dismiss in 4 seconds -->
    <script>
        setTimeout(() => {
            const toast = document.getElementById('php-toast');
            if (toast) toast.remove();
        }, 4000);
    </script>
  
  @endif
</main>

