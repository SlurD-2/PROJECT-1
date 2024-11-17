<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('navigation.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route for Requests
// routes/web.php




Route::middleware('auth')->group(function () {

    //PROFILE

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //REQUEST
    
    Route::get('/request', [RequestController::class, 'request'])->name('navigation.request');
    Route::get('users/requests', [RequestController::class, 'request'])->name('navigation.request');
    Route::post('users/requests', [RequestController::class, 'store'])->name('navigation.request.store'); 
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';

