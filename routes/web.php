<?php

use App\Livewire\Job;
use App\Livewire\Home;
use App\Livewire\Jobs;
use App\Helpers\MyFunc;
use App\Livewire\Apply;
use App\Livewire\UserApplications;
use App\Models\Company;
use App\Models\JobPost;
use App\Livewire\Companies;
use Illuminate\Support\Str;
use App\Livewire\Industries;
use App\Livewire\UserProfile;
use App\Livewire\CompanyProfile;
use App\Livewire\UserSavedJobs;
use Illuminate\Support\Facades\Route;

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

Route::get('/jobs/{id}/{slug}/apply', Apply::class)->name('job.apply');

Route::get('user/account', function(){
    return redirect()->to('user.profile');
});

Route::prefix('user/account')->group(function(){

    Route::get('profile', UserProfile::class)->name('user.profile');
    
    Route::get('/saved-jobs', UserSavedJobs::class)->name('user.savedJobs');
    
    Route::get('/my-applications', UserApplications::class)->name('user.applications');

});
