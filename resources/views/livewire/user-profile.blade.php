<main class="container mx-auto md:px-4 py-8">
    <!-- In work, do what you enjoy. -->

    <!-- Profile Header -->
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
                            {{Auth::user()->name}}
                        </h1>
                        <p class="text-sm sm:text-base text-primary mb-2 break-words">
                            {{Auth::user()->email}}
                        </p>
                    </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <form id="profile" wire:submit="updateProfile">
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Full Name</span>
                            </label>
                            <input type="text" wire:model="name" class="input input-bordered" placeholder="Name" disabled>
                            @error('name')
                                <span class="text-error mt-3">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email Address</span>
                            </label>
                            <input class="input input-bordered flex items-center" wire:model='email' disabled>
                            @error('email')
                            <span class="text-error mt-3">
                                {{$message}}
                            </span>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Phone Number</span>
                            </label>
                            <input wire:model="phone_number" type="tel" placeholder="Enter Phone Number" class="input input-bordered" disabled>
                            @error('phone_number')
                            <span class="text-error mt-3">
                                {{$message}}
                            </span>
                        @enderror
                        </div>
                        <div class="form-control">
                            <label for="gender" class="ml-2 mt-2 mb-4">Gender:</label>
                        <div class="flex gap-4">
                            <input wire:model="gender" value="male"  id="male" type="radio" name="radio-1" class="radio" 
                            @if($gender == 'male') checked @endif disabled/>
                            <label for="male" class="mr-2">
                                Male
                            </label>
    
                            <input wire:model="gender" value="female" id="female" type="radio" name="radio-1" wire class="radio"  @if($gender == 'female') checked @endif disabled/>
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
                    </div>
                    <div class="divider"></div>
                    <h3 class="font-bold mb-2">Social Links</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="label">
                                <span class="label-text">Github Url</span>
                            </label>
                            <input wire:model="github" type="text" class="input input-bordered flex-1 w-full" value="{{Auth::user()->github}}" placeholder="Github URL" disabled>
                            @error('github')
                            <span class="text-error mt-3">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div>
                            <label class="label">
                                <span class="label-text">Linkedin Url</span>
                            </label>
                            <input type="text" wire:model="linkedin" class="input input-bordered flex-1 w-full" value="{{Auth::user()->linkedin}}" placeholder="Linkedin URL" disabled>
                            @error('linkedin')
                            <span class="text-error mt-3">
                                {{$message}}
                            </span>
                        @enderror
                        </div>
                    </div>
                    <div class="flex justify-end mt-2">
                        <button id="edit" class="btn btn-primary w-40">Edit</button>
                        <button style="display: none" id="save" type="submit" class="btn btn-primary w-40">
                            <span wire:loading.class="loading loading-spinner">
                                Save        
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            </form>
            <!-- Resume & Documents -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <label for="resume">
                    <h2 class="card-title mb-4">Resume</h2>
                    <form wire:submit="updateResume" class="pb-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Upload Resume (PDF/DOCX)</span>
                        </label>
                        <div class="flex items-center gap-2">
                            <input wire:model.live="resume" type="file" accept="application/pdf,application/doc,application/docx" class="file-input file-input-bordered w-full" required>
                            <button  class="btn btn-gray text-primary
                             @if($errors->any('resume'))
                            btn-disabled
                            cursor-not-allowed
                            @endif
                            "><span wire:loading.class="loading loading-spinner">
                                Upload Cv
                            </span></button>
                        </div>
                    </div>
                </form>
                @error('resume')
                    <span class="text-error pt-3">
                        {{$message}}
                    </span>
                @enderror
                    <div class="mt-4">
                        <div class="flex items-center justify-between p-4 bg-base-200 rounded-box">
                            @if ($cv)
                                <span class="font-bold">{{$cv}}</span>
                                <button wire:click="deleteCv" class="btn btn-outline btn-error btn-sm">
                                    <span wire:loading.class="loading loading-spinner">
                                        Delete
                                    </span>
                                </button>
                            @else
                            No Cv Uploaded!
                            @endif
                        </div>
                    </div>
                </label>
                </div>
            </div>

        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            
            <!-- Profile Completeness -->
            {{-- <div class="m-8 md:m-0 card bg-primary text-primary-content">
                <div class="card-body">
                    <h2 class="card-title">Profile Strength</h2>
                    <div class="radial-progress" style="--value:75">75%</div>
                    <p class="text-sm">Complete your profile for better job matches</p>
                </div>
            </div> --}}
            
            <!-- Account Settings -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Account Settings</h2>
                    <form wire:submit="updatePassword">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Change Password</span>
                            </label>
                            <input type="password" class="input input-bordered" wire:model.live.debounce.500ms="password" placeholder="New Password" required>
                            @error('password')
                                <span class="text-error mt-2">
                                    {{$message}}
                                </span>
                            @enderror
                            <button class="btn btn-primary btn-outline mt-4
                             @error ('password')
                             btn-disabled cursor-not-allowed
                            @enderror">Update Password</button>
                        </div>
                    </form>
                        <div class="divider"></div>
                    <button onclick="delete_modal.showModal()" class="btn btn-error btn-outline">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Account Modal -->
    <dialog id="delete_modal" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Delete Account</h3>
            <p class="py-4">Are you sure you want to delete your account? This action cannot be undone!</p>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">Cancel</button>
                </form>
                <button class="btn btn-error" wire:click="deleteAccount">Delete Account</button>
            </div>
        </div>
    </dialog>
    @includeIf('livewire.partials.alert')
</main>
@push('scripts')
    <script>
        editBtn = document.querySelector('#edit');
        saveBtn = document.querySelector('#save');
        inputs = document.querySelectorAll('#profile input');

        document.querySelector('#edit').onclick = (e)=>{
            e.preventDefault();
           inputs.forEach(input=>{
            input.disabled=false;
           });
           editBtn.style.display='none';
           saveBtn.style.display = 'block'
        }

        saveBtn.onclick = () => {
                saveBtn.style.display = 'none'
                editBtn.style.display='block';
                inputs.forEach(input=>{
                input.disabled=true;
            })
        }
    </script>
@endpush

