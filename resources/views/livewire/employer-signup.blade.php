<div>
   <!-- The best athlete wants his opponent at his best. -->
   <main class="min-h-screen bg-base-200 flex items-center justify-center p-4">
    <div class="p-6 card bg-base-100 shadow-xl w-full max-w-md transition-all duration-300">
        <!-- Because she competes with no one, no one can compete with her. -->
        <!-- Card Header -->
        <div class="p-6 border-b border-base-300">
            <div class="flex justify-center items-center">
                <h2 class="text-2xl font-bold flex items-center gap-3">
                    @if($step == 1)
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"></path>
                </svg>
                Employer Registration
                    @elseif ($step == 2)
                        Verify Your Email
                    @elseif ($step == 3)
                    <div class="flex items-center gap-3">
                        <div class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Hey Employer {{$name}}!</h2>
                            <p class="text-sm text-base-content/70">Email verified! Let's complete your profile</p>
                        </div>
                    </div>
                    @elseif($step == 4)
                        <div class="flex justify-center items-center">
                            <h2 class="text-2xl font-bold flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"></path>
                                </svg>
                                Company Profile
                            </h2>
                        </div>
                    @elseif($step == 5)
                        <div class="flex justify-center items-center ">
                            <h2 class="text-2xl font-bold">
                                <div class="flex items-center gap-3">
                                    <div class="text-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <span>Company Profile Completed!</span>
                                </div>
                            </h2>
                        </div>
                    @endif
                </h2>
            </div>
        </div>
        <!-- Card Header -->

        
        <!-- Card Body -->
        <!-- Progress Bar -->
        @if($step == 5)
        <div class="px-6 pt-4">
            <progress class="progress progress-success w-full h-2" value="100" max="100"></progress>
            <div class="flex justify-between text-sm text-base-content/70 mt-2">
                <span>{{$step}}/{{$total_steps}}</span>
                <span>{{($step*100/$total_steps)}}% Complete</span>
            </div>
        </div>
        @else
        <div class="px-6 pt-4 mb-4">
            <div class="w-full bg-base-300 rounded-full h-2">
                <div class="bg-primary h-2 transition-all rounded-full 
                w-{{$step}}/{{$total_steps}}
            "></div>
            </div>
            <div class="flex justify-between text-sm text-base-content/70 mt-2">
                <span>{{$step}}/{{$total_steps}}</span>
                <span>{{($step*100/$total_steps)}}% Complete</span>
            </div>
        </div>
        @endif
        
           
            @if ($step == 1)
                <!-- Form Step 1 -->
                <form wire:submit="register" class="space-y-4">
                    <!-- Username -->
                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                                 class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <input 
                                wire:model.blur="name" 
                                type="text" 
                                placeholder="Enter your username" 
                                class="input input-bordered input-primary w-full pl-12" 
                                
                            >
                        </div>
                        <span class="text-red-500 mt-3">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
    
                    <!-- Email -->
                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text">Email</span>
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
     class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary">
    <path stroke-linecap="round" stroke-linejoin="round" 
          d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
</svg>
                            <input 
                                wire:model.blur="email" 
                                type="text" 
                                placeholder="Enter your Email" 
                                class="input input-bordered input-primary w-full pl-12" 
                                
                            >
                        </div>
                        <span class="text-red-500 mt-3">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <!-- Password -->
                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                            class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary">
                           <path stroke-linecap="round" stroke-linejoin="round" 
                                 d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                         </svg>
                         <input 
                         wire:model.live.debounce.500ms="password" 
                         type="password"  
                         class="input input-bordered input-primary w-full pl-12" placeholder="••••••••"
                         required
                     >
                        </div>
                        <span class="text-red-500 mt-3">
                            @error('password')
                                {{$message}}
                            @enderror
                        </span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-control relative">
                        <label class="label">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
     class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary">
    <path stroke-linecap="round" stroke-linejoin="round" 
          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
                            <input 
                                wire:model.blur="confirm_password" 
                                type="password"  
                                class="input input-bordered input-primary w-full pl-12" placeholder="••••••••"
                                
                            >
                        </div>
                        <span class="text-red-500 mt-3">
                        @error('confirm_password')
                        {{$message}}
                    @enderror
                        </span>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-between items-center py-6">
                        <a wire:navigate href="{{route('home')}}">
                        <button type="button" class="btn btn-ghost px-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
                            </svg>
                            Back
                        </button>
                        </a>
                        <button type="submit" wire:loading.attr="disabled" class="btn btn-primary px-8">
                            <span class="flex gap-2" wire:loading.class="loading loading-spinner">
                                Next
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
     <!-- Card Footer -->
     <div class="p-6 border-t border-base-300 text-center">
        <p class="text-sm text-base-content/70">
            Already have an account?
            <a href="#" class="link-primary">Sign in</a>
        </p>
    </div>

            @elseif ($step == 2)
                <div class="space-y-6">
                    <p class="text-base-content/90 text-center">
                        We've sent a 6-digit code to <br>
                        <span class="font-medium text-primary">{{$email}}</span>
                    </p>

                    <!-- OTP Input -->
                    <div class="form-control">
                        <label class="label text-center flex justify-center items-center mb-3">
                            <span class="label-text">Verification Code</span>
                        </label>
                        <div class="flex justify-center gap-2 mb-3">
                            <input multiple wire:model.blur="otp.0" type="text" maxlength="1" class="otp-input input input-bordered input-primary w-12 text-center" pattern="\d">
                            <input wire:model.blur="otp.1" type="text" maxlength="1" class="otp-input input input-bordered input-primary w-12 text-center" pattern="\d">
                            <input wire:model.blur="otp.2" type="text" maxlength="1" class="otp-input input input-bordered input-primary w-12 text-center" pattern="\d">
                            <input wire:model.blur="otp.3" type="text" maxlength="1" class="otp-input input input-bordered input-primary w-12 text-center" pattern="\d">
                            <input wire:model.blur="otp.4" type="text" maxlength="1" class="otp-input input input-bordered input-primary w-12 text-center" pattern="\d">
                            <input wire:model.blur="otp.5" type="text" maxlength="1" class="otp-input input input-bordered input-primary w-12 text-center" pattern="\d">
                        </div>  
                        <label class="label text-center flex justify-center items-center"> 
                       @error('otp')
                       <span class="text-red-500">
                           {{$message}}
                       </span>
                       @enderror
                        </label>    
                    </div>

                    <!-- Resend Code -->
                    <div class="text-center text-sm">
                        <p class="text-base-content/70 flex justify-center items-center gap-3">
                            Didn't receive code?
                            <button wire:click="resendOtp" class=" hover:underline cursor-pointer link-primary" wire:loading.class="loading loading-spinner" wire:loading.attr="disabled">
                                <span>
                                    Resend Code
                                </span>
                            </button>
                        </p>
                    </div>
                </div>

            @elseif($step == 3)
            <form wire:submit="createProfile" class="space-y-4">
                <!-- Name -->
                <div class="form-control relative">
                    <label class="label label-text pb-1">Phone Number</label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                          </svg>                          
                        <input wire:model="phone_number" type="tel" placeholder="+92-XXX-XXXXXXX " class="input input-bordered input-primary w-full pl-10" ="">
                    </div>
                    @error('phone_number')
                    <span class="text-error mt-3">
                        {{$message}}
                    </span>
                    @enderror
                </div>
        
                <!-- Gender -->
                <div class="form-control">
                    <label class="label label-text pb-1">Gender</label>
                    <div class="flex gap-4">
                        <input wire:model="gender" value="male"  id="male" type="radio" name="radio-1" class="radio" />
                        <label for="male" class="mr-2">
                            Male
                        </label>

                        <input wire:model="gender" value="female" id="female" type="radio" name="radio-1" wire class="radio" />
                        <label for="female" class="flex gap-2 mr-2">
                            Female    
                        </label>
                    </div>
                    @error('gender')
                    <span class="text-error mt-3">
                        {{$message}}
                    </span>
                    @enderror
                </div>
        
                <!-- Social Links -->
                <div class="divider my-6"></div>
                
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label label-text pb-1">GitHub Profile</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"></path>
                            </svg>
                            <input type="url" wire:model="github" placeholder="https://github.com/username" class="input input-bordered input-primary w-full pl-10">
                        </div>
                    </div>
        
                    <div class="form-control">
                        <label class="label label-text pb-1">LinkedIn Profile</label>
                        <div class="relative">
                            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path>
                            </svg>
                            <input type="url"  wire:model="linkedin" placeholder="https://linkedin.com/in/username" class="input input-bordered input-primary w-full pl-10">
                        </div>
                    </div>
                    <div class="p-6 border-t border-base-300">
                        <div class="flex justify-between items-center">
                            <button wire:click="skip" class="btn btn-ghost">Skip for now</button>
                            <button wire:loading.attr="disabled" class="btn btn-primary gap-2">
                                <span class="flex gap-2" wire:loading.class="loading loading-spinner">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            @elseif($step == 4)
            <form wire:submit="saveCompanyProfile" class="space-y-4">
                <!--  Fields -->
                <div class="space-y-4">
                    <!-- Add this section below the progress bar but before other form fields -->
<div class="form-control">
    <label class="label">
        <span class="label-text">Company Logo</span>
    </label>
    <div class="flex items-center justify-center w-full">
        <label class="border-2 border-dashed border-base-300 rounded-x  l p-6 w-full text-center 
                  hover:border-primary transition-colors cursor-pointer relative"
               x-data="{ isUploading: false }"
               x-on:livewire-upload-start="isUploading = true"
               x-on:livewire-upload-finish="isUploading = false"
               x-on:livewire-upload-error="isUploading = false">
            <div class="space-y-2">
                <!-- Preview or Placeholder -->
                <div class="avatar flex justify-center">
                    <div class="w-24 rounded-full bg-primary/10 ring ring-primary/20">
                        <template x-if="!$wire.image">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-primary/40 mx-auto mt-6" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                <path stroke-linecap="round" stroke-linejoin="round" 
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </template>
                        <template x-if="$wire.image">
                            <img 
                            @if($image && in_array($image->getClientOriginalExtension(), ['jpeg','jpg','png']))
                            src="{{$image->temporaryUrl()}}"
                            @endif
                             alt="Company logo preview" />
                        </template>
                    </div>
                </div>

                <!-- Upload Text -->
                <div class="text-center">
                    @if($image && in_array($image->getClientOriginalExtension(), ['jpeg','jpg','png']))
                    <p class="text-sm text-base-content/90 text-wrap truncate" title="{{$image->getClientOriginalName()}}">
                        <span class="text-primary font-medium">{{$image->getClientOriginalName()}}</span> 
                    </p>
                    @else
                    <p class="text-sm text-base-content/90">
                        <span class="text-primary font-medium">Click to upload</span> 
                    </p>
                    <p class="text-xs text-base-content/50 mt-1">
                        SVG, PNG, JPG (max 2MB)
                    </p>
                    @endif
                </div>
            </div>

            <!-- Loading State -->
            <div x-show="isUploading" class="absolute inset-0 bg-base-100/50 flex items-center justify-center">
                <span class="loading loading-spinner loading-lg text-primary"></span>
            </div>

            <input type="file" wire:model.live="image" 
                   class="hidden" 
                   accept="image/png, image/jpeg, image/svg+xml">
        </label>
    </div>
    <span class="text-error mt-2">
        @error('image') <span class="text-error">{{ $message }}</span> @enderror
    </span>
</div>

                    <!-- Name -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Company Name *</span>
                        </label>
                        <input type="text" wire:model.live.debounce.500ms="name" class="input input-bordered input-primary" placeholder="Enter company name" ="">
                        <span class="text-red-500 mt-3">
                            @error('name')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
        
                    <!-- Email -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Official Email *</span>
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"></path>
                            </svg>
                            <input type="email" wire:model.live.debounce.500ms="email" class="input input-bordered input-primary pl-12 w-full" placeholder="contact@company.com" ="">
                        </div>
                        <span class="text-red-500 mt-3">
                            @error('email')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
        
                <!-- Industry Section -->
                
        
                <div class="space-y-4">
                    <!-- Industry Dropdowns -->
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Industry *</span>
                        </label>
                        <select wire:model.live="industry_id" class="select select-bordered select-primary" ="">
                            <option class="hidden">Select Industry</option>
                            @foreach($industries as $industry)
                            <option value="{{$industry->id}}">{{$industry->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-red-500 mt-3">
                            @error('industry_id')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
        
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Sub-Industry *</span>
                        </label>
                        <select wire:model.live="sub_industry_id" class="select select-bordered select-primary" ="">
                            @if ($sub_industries)
                            @foreach($sub_industries as $sub_industry)
                            <option value="{{$sub_industry->id}}">{{$sub_industry->name}}</option>
                            @endforeach
                            @else                            
                            <option class="hidden">Select Industry First</option>
                            @endif
                            
                        </select>
                        <span class="text-red-500 mt-3">
                            @error('sub_industry_id')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
        
                <!-- Location Section -->
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">City *</span>
                        </label>
                        <select wire:model.live="city_id" class="select select-bordered select-primary" ="">
                            <option class="hidden">Select City</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <span class="text-red-500 mt-3">
                            @error('city_id')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
        
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">City Area</span>
                        </label>
                        <select wire:model.live="city_area_id" class="select select-bordered select-primary" ="">
                            @if ($city_areas)
                            @foreach($city_areas as $city_area)
                            <option value="{{$city_area->id}}">{{$city_area->name}}</option>
                            @endforeach
                            @else                            
                            <option class="hidden">Select City First</option>
                            @endif
                        </select>
                        <span class="text-red-500 mt-3">
                            @error('city_area_id')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>

                <!-- Address-->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Company Address *</span>
                    </label>
                    <input type="text" wire:model.live.debounce.500ms="address" class="input input-bordered input-primary" placeholder="Enter company name" ="">
                    <span class="text-red-500 mt-3">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                  <!-- Company contact -->
                  <div class="form-control">
                    <label class="label">
                        <span class="label-text">Company Contact *</span>
                    </label>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                          </svg>                          
                        <input type="text" wire:model.blur="contact" class="input input-bordered input-primary pl-12 w-full" placeholder="+92 - *** *******">
                    </div>
                    <span class="text-red-500 mt-3">
                        @error('contact')
                            {{$message}}
                        @enderror
                    </span>
                </div>
                
                <!-- Additional Info -->
                <div class="space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Company Size</span>
                        </label>
                        <select wire:model.live="company_size" class="select select-bordered w-full select-md">
                            <option class="hidden">Company Size</option>
                            <option value="1-50">Small (1 - 50)</option>
                            <option value="51-500">Medium (51 - 500) </option>
                            <option value="500+">Large (500+)</option>
                          </select>
                        <span class="text-red-500 mt-3">
                            @error('company_size')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
        
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Valuation ($)</span>
                        </label>
                        <input min="1" type="number" wire:model.blur="valuation" class="input input-bordered input-primary" placeholder="Enter valuation">
                        <span class="text-red-500 mt-3">
                            @error('valuation')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
        
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Website</span>
                        </label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.11 1.157-4.418"></path>
                            </svg>
                            <input type="url" wire:model.blur="website" class="input input-bordered input-primary pl-12 w-full" placeholder="https://company.com">
                            <span class="text-red-500 mt-3">
                                @error('website')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
        
                <!-- Description -->
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Description *</span>
                    </label>
                    <textarea wire:model.blur="description" class="textarea textarea-bordered textarea-primary h-32" placeholder="Company overview (min. 200 characters)" ="" style="height: 15px;"></textarea>
                    <span class="text-red-500 mt-3">
                        @error('description')
                            {{$message}}
                        @enderror
                    </span>
                </div>
        
                <!-- Form Actions -->
                <div class="flex justify-center items-center py-6">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-primary px-8 hover:scale-[1.02] transition-transform">
                        <span class="flex gap-2" wire:loading.class="loading loading-spinner">
                            Save Profile
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"></path>
        </svg>
        
                        </span>
                    </button>
                </div>
            </form>
            @elseif($step == 5)
            <div class="p-6 space-y-6 text-center">
                <div class="flex justify-center text-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                
                <div class="space-y-2">
                    <h3 class="text-2xl font-bold text-base-content mb-2">Welcome to LinkDeed!</h3>
                    <span class="text-primary font-medium">{{$name}}</span>
                    <p class="text-base-content/70">
                      Your company Profile is now live and visible to job seekers!
                    </p>
                </div>
        
                <div class="flex flex-col gap-4">
                    <a wire:navigate href="{{route('employer.dashboard')}}">
                    <button class="btn btn-success gap-2 px-8 transition-all h-auto">
                        Go to Employer Dashboard
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </button>
                    </a>

                    <a wire:navigate href="{{route('employer.jobs-add')}}" class="link link-primary text-sm flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z" />
                          </svg>
                          
                        Post a Job
                    </a>
                </div>
            </div>
            @endif

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

 @push('scripts')
 <script type="module" src="/js/user-signup.js"></script>
 @endpush
</main>
</div>
