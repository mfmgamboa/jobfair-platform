<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employer\EmployerDashboardController;

Route::prefix('employer')->middleware(['web'])->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');
});

Route::prefix('admin')->middleware(['web'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
