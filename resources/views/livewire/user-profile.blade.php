<main class="container mx-auto md:px-4 py-8">
    <!-- In work, do what you enjoy. -->

    <!-- Profile Header -->
    <div class="card bg-base-100 shadow-sm mb-8">
        <div class="card-body">
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="avatar">
                    <div class="w-24 rounded-full bg-primary/10 relative">
                        <img src="https://dummyimage.com/100x100">
                        <button class="btn btn-circle btn-sm absolute bottom-0 right-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-3xl font-bold">John Doe</h1>
                    <p class="text-lg text-primary mb-2">Frontend Developer</p>
                    <p class="text-base-content/70">Passionate about building user-friendly web applications with modern technologies</p>
                    <button class="btn btn-primary mt-4">Edit Profile</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Personal Information -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Full Name</span>
                            </label>
                            <input type="text" class="input input-bordered" value="John Doe">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email Address</span>
                            </label>
                            <input type="email" class="input input-bordered" value="john@example.com">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Phone Number</span>
                            </label>
                            <input type="tel" class="input input-bordered" value="+1 234 567 890">
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Location</span>
                            </label>
                            <input type="text" class="input input-bordered" value="New York, NY">
                        </div>
                    </div>
                    <div class="divider"></div>
                    <h3 class="font-bold mb-2">Social Links</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" class="input input-bordered flex-1" placeholder="LinkedIn URL">
                        <input type="text" class="input input-bordered flex-1" placeholder="GitHub URL">
                    </div>
                </div>
            </div>

            <!-- Resume & Documents -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Resume &amp; Documents</h2>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Upload Resume (PDF/DOCX)</span>
                        </label>
                        <input type="file" class="file-input file-input-bordered w-full">
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center justify-between p-4 bg-base-200 rounded-box">
                            <div>
                                <span class="font-bold">john-doe-resume.pdf</span>
                                <span class="text-sm text-base-content/70 ml-2">Uploaded 2 days ago</span>
                            </div>
                            <button class="btn btn-ghost btn-sm text-error">Replace</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Skills & Experience -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Skills &amp; Experience</h2>
                    <div class="mb-6">
                        <h3 class="font-bold mb-2">Skills</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="badge badge-primary">JavaScript</span>
                            <span class="badge badge-primary">React</span>
                            <span class="badge badge-primary">Tailwind CSS</span>
                            <button class="btn btn-circle btn-xs">+</button>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="border-l-4 border-primary pl-4">
                            <h3 class="font-bold">Senior Frontend Developer</h3>
                            <p class="text-primary">Tech Leaders Inc.</p>
                            <p class="text-sm text-base-content/70">2020 - Present</p>
                            <p class="mt-2">Led development of multiple web applications...</p>
                        </div>
                        <!-- Add more experience blocks -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Job Preferences -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Job Preferences</h2>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Preferred Role</span>
                        </label>
                        <input type="text" class="input input-bordered" value="Senior Frontend Developer">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Desired Salary</span>
                        </label>
                        <input type="text" class="input input-bordered" value="$90,000 - $120,000">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Job Type</span>
                        </label>
                        <select class="select select-bordered">
                            <option>Remote</option>
                            <option>Hybrid</option>
                            <option>On-site</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Account Settings -->
            <div class="card bg-base-100 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title mb-4">Account Settings</h2>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Change Password</span>
                        </label>
                        <input type="password" class="input input-bordered" placeholder="New Password">
                    </div>
                    <div class="divider"></div>
                    <button class="btn btn-error btn-outline">Delete Account</button>
                </div>
            </div>

            <!-- Profile Completeness -->
            <div class="card bg-primary text-primary-content">
                <div class="card-body">
                    <h2 class="card-title">Profile Strength</h2>
                    <div class="radial-progress" style="--value:75">75%</div>
                    <p class="text-sm">Complete your profile for better job matches</p>
                </div>
            </div>
        </div>
    </div>
</main>

