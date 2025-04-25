<?php

use App\Livewire\Job;
use App\Livewire\Home;
use App\Livewire\Jobs;
use App\Helpers\MyFunc;
use App\Livewire\Apply;
use App\Livewire\Login;
use App\Models\Company;
use App\Models\JobPost;
use App\Livewire\Logout;
use App\Livewire\Companies;
use Illuminate\Support\Str;
use App\Livewire\Industries;
use App\Livewire\UserSignup;
use App\Livewire\UserProfile;
use App\Livewire\UserSavedJobs;
use App\Livewire\CompanyProfile;
use App\Livewire\EmployerSignup;
use App\Livewire\UserApplications;
use App\Livewire\ManageApplication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Employer\EmployerJobsAdd;
use App\Livewire\Employer\EmployerProfile;
use App\Livewire\Employer\EmployerJobsView;
use App\Livewire\Employer\EmployerDashboard;
use App\Livewire\Employer\EmployerManageApplication;

Route::get('/', Home::class)->name('home');

Route::get('/jobs', Jobs::class)->name('jobs');

Route::get('/industries', Industries::class)->name('industries');

Route::get('/companies', Companies::class)->name('companies');

Route::get('/jobs/{id}/{slug}', Job::class)->name('job.view');

Route::get('/companies/{id}/{slug}', CompanyProfile::class)->name('company.view');

Route::get('/slug/job/{id}', function($id){

    $job = JobPost::findOrFail($id);

    $slug = Myfunc::sexySlug(values: [$job->title, $job->city->name, $job->company->name]);

    return $slug;

});

Route::get('/slug/company/{id}', function($id){

    $company = Company::findOrFail($id);

    $slug = Myfunc::sexySlug(values: [$company->name] ,time:false);

    return $slug;

});

Route::prefix('/user')->group(function(){

    Route::get('/signup', userSignup::class)->name('user.signup')->middleware('guest');

    // Route::get('/verify', userSignup::class)->name('verification.notice');

    Route::middleware(['UserRole'])->group(function(){
        
        Route::get('/dashboard', function(){
            return redirect(route('user.profile'));
        });
        
        Route::prefix('/dashboard')->group(function(){
            
            Route::get('/account', UserProfile::class)->name('user.profile');
            
            Route::get('/saved-jobs', UserSavedJobs::class)->name('user.savedJobs');
            
        Route::get('/my-applications', UserApplications::class)->name('user.applications');
        
    });

    Route::get('/jobs/{id}/{slug}/apply', Apply::class)->name('job.apply')->middleware(['Authentication', 'UserRole']);
    
});

});

Route::prefix('/employer')->group(function(){

    Route::get('/signup', EmployerSignup::class)->name('employer.signup');

    Route::middleware(['EmployerRole'])->group(function(){
        
        Route::get('/dashboard', EmployerDashboard::class)->name('employer.dashboard');    
        
        Route::prefix('/dashboard')->group(function(){
            
            Route::get('/jobs/view', EmployerJobsView::class )->name('employer.jobs-view');

            Route::get('/jobs/add', EmployerJobsAdd::class )->name('employer.jobs-add');

            Route::get('/manage-applications', EmployerManageApplication::class)->name('employer.manage-applications');

            Route::get('/Profile', EmployerProfile::class)->name('employer.profile');

        });
        
    });
});

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::get('/logout', Logout::class)->name('logout');
