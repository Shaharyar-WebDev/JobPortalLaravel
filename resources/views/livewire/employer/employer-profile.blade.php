<div>
    <div class="container mx-auto md:p-8">
        <!-- Header -->
        <div class="p-4 mb-8">
                <div class="text-sm breadcrumbs mb-2">
                    <ul>
                        <li><a>Dashboard</a></li> 
                        <li class="text-primary">Profile &amp; Settings</li>
                    </ul>
                </div>
                <h1 class="text-3xl font-bold">Company Profile &amp; Settings</h1>            
        </div>
    
        <div class="card bg-base-100 shadow-sm mb-8">
            <div class="card-body">
                <div class="flex flex-col md:flex-row items-center gap-8">
                    <div class="flex flex-col justify-center items-center gap-3">
                    <div class="avatar">
                        <div class="w-24 rounded-xl overflow-hidden">
                        <label class="cursor-pointer" for="image">
                            @if($profile_img)
             <img class="rounded-full !object-cover" src="
                              @if($errors->any('profile_img'))
                              https://imageplaceholder.net/600x400
                              @else
                              {{$profile_img->temporaryUrl()}}
                              @endif
                              "/>        
                            @else
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
                            <img class="text-primary w-full h-[100%] flex justify-center rounded-full items-center" src="{{asset("/storage/images/$disk/".$image)}}">
                            @else
                            <span class="bg-primary/10 ring ring-primary/20 text-primary rounded-full w-full h-[100%] flex justify-center items-center">
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
                            @endif
                     
                        </label>
                            </div>
                          </div>
                          @error('profile_img')
                          <span class="text-error">
                          {{$message}}
                          </span>
                           @enderror
                          <form wire:submit="updateImage" class="flex flex-row gap-2">
                            @if($profile_img)
                            <button type="button" class="btn btn-otline btn-error" wire:click="resetImage">
                                Cancel
                            </button>
                            <button
                            @error('profile_img')
                            disabled
                             @enderror 
                             class="btn btn-success" type="submit">
                            Confirm
                            @else
                            <label
                            for="image" class="btn btn-primary">
                            Update
                            @endif
                            <input class="hidden" type="file" wire:model.live="profile_img" accept="image/jpg,image/jpeg,image/png" id="image">
                            @if($profile_img)
                            </button>
                            @else
                            </label> 
                            @endif
                            </label>
                        </form>
                    </div>
                          <div class="w-full text-center md:text-left break-words px-2">
                            <h1 class="text-xl sm:text-2xl md:text-3xl font-bold break-words">
                                {{$company->name}}
                            </h1>
                            <p class="text-sm sm:text-base text-primary mb-2 break-words">
                                {{$company->email}}
                            </p>
                            <p class="text-sm sm:text-base content/70 mb-2 break-words">
                                {!!$description!!}
                            </p>
                        </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 2xl:grid-cols-3 gap-8">

            <!-- Left Column - Profile Overview -->
            <div id="companyForm" class="col-span-3 lg:col-span-2 space-y-6">
                <!-- Company Profile Card -->
                <div class="card bg-base-100 shadow-sm">
                    <form wire:submit="updateCompany" class="card-body">
                        <div  class="flex flex-col md:flex-row gap-6">
                            <div class="flex-1 space-y-4">
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Company Name</span>
                                    </label>
                                    <input wire:model="name" type="text" class="input input-bordered" value="{{$name}}" @disabled(!$editing)>
                                    @error('name')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Industry</span>
                                        </label>
                                        <select class="select select-bordered" wire:model.live="industry" value={{$industry}} @disabled(!$editing)>
                                       @foreach ($industries as $industry)
                                           <option value="{{$industry->id}}">{{$industry->name}}</option>
                                       @endforeach
                                    </select>
                                    @error('industry')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Sub Industry</span>
                                        </label>
                                        <select class="select select-bordered" wire:model="sub_industry" value="{{$sub_industry}}" @disabled(!$editing)>
                                       @foreach ($sub_industries as $sub_industry)
                                           <option value="{{$sub_industry->id}}">{{$sub_industry->name}}</option>
                                       @endforeach
                                    </select>
                                    @error('sub_industry')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Company Size</span>
                                        </label>
                                        <select wire:model="company_size" value="" class="select select-bordered" @disabled(!$editing)>
                                            <option value="1-50">11-50 employees</option>
                                            <option value="51-500">51-500 employees</option>
                                            <option value="500+">500+ employees</option>
                                        </select>
                                        @error('company_size')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Valuation</span>
                                        </label>
                                        <input type="number" wire:model="valuation" class="input input-bordered" value="{{$valuation}}" @disabled(!$editing)>
                                        @error('valuation')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">City</span>
                                        </label>
                                        <select class="select select-bordered" wire:model.live="city" value={{$city}} @disabled(!$editing)>
                                       @foreach ($cities as $city)
                                           <option value="{{$city->id}}">{{$city->name}}</option>
                                       @endforeach
                                    </select>
                                    @error('city')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">City Area</span>
                                        </label>
                                        <select class="select select-bordered" wire:model="city_area" value={{$city_area}} @disabled(!$editing)>
                                            <option class="hidden">Select City Area</option>
                                       @foreach ($city_areas as $city_area)
                                           <option value="{{$city_area->id}}">{{$city_area->name}}</option>
                                       @endforeach
                                    </select>
                                    @error('city_area')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Company Address</span>
                                    </label>
                                    <input type="text" wire:model="address" class="input input-bordered" placeholder="Enter Address" value="{{$address}}" @disabled(!$editing)>
                                    @error('address')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Company Email</span>
                                        </label>
                                        <input type="text" wire:model="email" class="input input-bordered" placeholder="Enter Address" value="{{$email}}" @disabled(!$editing)>
                                        @error('email')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Company Contact</span>
                                        </label>
                                        <input type="text" wire:model="contact" class="input input-bordered" placeholder="Enter Address" value="{{$contact}}" @disabled(!$editing)>
                                        @error('contact')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Github</span>
                                        </label>
                                        <input type="text" wire:model="github" class="input input-bordered" placeholder="Enter Github" value="{{$github}}" @disabled(!$editing)>
                                        @error('github')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Linkedin</span>
                                        </label>
                                        <input type="text" wire:model="linkedin" class="input input-bordered" placeholder="Enter Linkedin" value="{{$linkedin}}" @disabled(!$editing)>
                                        @error('linkedin')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Company Website</span>
                                    </label>
                                    <input type="text" wire:model="website" class="input input-bordered" placeholder="Enter Website" value="{{$website}}" @disabled(!$editing)>
                                    @error('website')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-control bg-base-200 p-4 rounded-box" >
                                    <label class="label">
                                        <span class="label-text">Company Description</span>
                                    </label>
                                    <div wire:ignore>
                                        <input type="hidden" wire:model.live="description" id="my_input" value="{{$description}}">
                                        <trix-toolbar id="my_toolbar"></trix-toolbar>
                                        <div class="more-stuff-inbetween"></div>
                                        <trix-editor toolbar="my_toolbar" class="trix-editor" input="my_input"></trix-editor>
                                    </div>
                                    @error('description')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="divider"></div>

                                <div class="form-control">
                                    <label class="label">
                                        <span class="label-text">Phone Number</span>
                                    </label>
                                    <input type="text" wire:model="phone_number" class="input input-bordered" placeholder="Enter Number" value="{{$phone_number}}" @disabled(!$editing)>
                                    @error('phone_number')
                                    <span class="text-error mt-2">
                                        {{$message}}
                                    </span>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">User Name</span>
                                        </label>
                                        <input type="text" wire:model="user_name" class="input input-bordered" placeholder="Enter Number" value="{{$email}}" @disabled(!$editing)>
                                        @error('user_name')
                                        <span class="text-error mt-2">
                                            {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">User Email</span>
                                        </label>
                                        <input type="tel" class="input input-bordered" placeholder="Enter Number" value="{{$user_email}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($editing)
                        <div class="form-control flex flex-row gap-2 float-right">
                            <button id="saveBtn" type="submit" class="btn btn-success">
                                <span wire:loading.class="loading loading-spinner">
                                    Save
                                </span>
                            </button>
                        </div>
                        @else
                        <div class="form-control flex flex-row gap-2 float-right">
                            <button wire:click="edit" type="button" id="editBtn" class="btn btn-primary">
                                <span wire:loading.class="loading loading-spinner">
                                    Edit Profile
                                </span>   
                            </button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
    
            <!-- Right Column - Notifications & Billing -->
            <div class="space-y-6 col-span-3 2xl:col-span-1">
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-6">Hiring Preferences</h2>
                        <div class="grid grid-cols-1 gap-6">                
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Job Visibility</span>
                                </label>
                                <div class="flex items-center gap-2">
                                    <input type="checkbox" class="toggle toggle-primary" @if($public_listings == 'visible')
                                    checked="true"
                                    @elseif($public_listings == 'hidden')
                                    checked="false"
                                    @endif
                                    wire:model.live="jobs_visibility">
                                    <span class="label-text">Public Listings</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                        
                <!-- Security Card -->
                <div class="card bg-base-100 shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-6">Security Settings</h2>
                        <div class="space-y-4">
                            <div class="form-control gap-2">
                                <div>
                                <label class="label">
                                    <span class="label-text">Change Password</span>
                                </label>
                                <div class="grid grid-cols-1 gap-2">
                                    <input type="password" class="input w-auto input-bordered md:col-span-2" placeholder="New Password" wire:model.live="password">
                                    @error('password')
                                        <span class="text-error">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                                <button wire:click="updatePassword" class="btn btn-primary mt-4 md:mt-0">
                                    <span wire:loading.class="loading loading-spinner">
                                        Change Password        
                                    </span>
                                </button>
                            </div>
                            <div class="divider"></div>
                            <div class="form-control">
                                <button class="btn btn-error btn-outline" onclick="delete_modal.showModal()">
                                    Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Billing Card -->
                {{-- <div class="card bg-base-100 shadow-sm">
    <div class="card-body">
        <h2 class="card-title mb-6">Billing &amp; Subscription</h2>
        <div class="space-y-4">
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Premium Plan - Active until March 2025</span>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Payment Method</span>
                </label>
                <div class="flex items-center gap-2">
                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span>**** **** **** 4242</span>
                </div>
            </div>
            <button class="btn btn-outline btn-block">View Billing History</button>
        </div>
    </div>
    </div> --}}
            </div>
        </div>
    </div>
    
    <!-- Delete Account Modal -->
    <dialog id="delete_modal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Delete Account</h3>
            <p class="py-4">Are you sure you want to delete your account? This action cannot be undone!</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancel</button>
                    <button wire:click="deleteAccount" class="btn btn-error">
                        <span wire:loading.class="loading loading-spinner">
                        Delete Account
                        </span>
                </button>
                </form>
            </div>
        </div>
    </dialog>
    @includeIf('livewire.partials.alert')
</div>
@push('scripts')
<script>

    description = document.querySelector(".trix-editor");
    description.addEventListener('trix-change', (e)=>{
        Livewire.dispatch('DescriptionUpdate', {value : e.target.value});
    });
   
</script>
@endpush
