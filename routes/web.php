<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




Route::redirect('/', '/Prototype/login', 201);

Route::prefix('Prototype')->name('Prototype.')->group(function () {
    Route::get('/login', function () {
        return Inertia::render('Prototype/login');
    })->name('login');
    Route::get('/register',function(){
        return Inertia::render('Prototype/register');
    })->name('register');
});


Route::middleware(['role:admin'])->get('/admin', function() {
    return 'fbsdhfbvufbjhwfr';
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
