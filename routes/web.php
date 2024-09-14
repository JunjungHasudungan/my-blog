<?php

use App\Http\Controllers\{
    ArticleController, ChirpController
};
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('chirps', [ChirpController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('chirps'); 

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('articles', [ArticleController::class, 'index'])->name('articles');
});

Route::view('profile', 'profile', ['pageTitle' => 'Profile'])
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
