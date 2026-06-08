<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/dashboard', '/kontrol/dashboard');

Route::prefix('kontrol')->group(function () {

    Route::get('/', function () {
        return redirect('/kontrol/dashboard');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('jobs', JobController::class);

    Route::resource('categories', CategoryController::class);

});