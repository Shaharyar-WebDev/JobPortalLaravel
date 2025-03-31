<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Companies;
use App\Livewire\Home;
use App\Livewire\Industries;
use App\Livewire\Jobs;

Route::get('/', Home::class)->name('home');

Route::get('/jobs', Jobs::class)->name('jobs');

Route::get('/industries', Industries::class)->name('industries');

Route::get('/companies', Companies::class)->name('companies');

