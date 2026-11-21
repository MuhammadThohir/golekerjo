<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('jobs', JobController::class);

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('categories', CategoryController::class);

    Route::resource('users', UserController::class);

    Route::patch('/jobs/{job}/activate', [JobController::class, 'activate'])
        ->name('jobs.activate');

    Route::patch('/jobs/{job}/deactivate', [JobController::class, 'deactivate'])
        ->name('jobs.deactivate');
    
    Route::patch('/jobs/{job}/premium', [JobController::class, 'premium'])
        ->name('jobs.premium');

    Route::patch('/jobs/{job}/unpremium', [JobController::class, 'unpremium'])
        ->name('jobs.unpremium');

    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings.index');

    Route::put('/settings', [SettingController::class, 'update'])
        ->name('settings.update');

});

require __DIR__.'/auth.php';
