<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('/jobseeker/profile/create', [ProfileController::class, 'create'])->name('profile.create');
    Route::post('/jobseeker/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/jobseeker/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/jobseeker/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/jobseeker/profile', [ProfileController::class, 'update'])->name('profile.update');
});
