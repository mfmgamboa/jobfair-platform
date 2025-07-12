<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Jobseeker\JobseekerDashboardController;
use App\Http\Controllers\Employer\EmployerDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Government\GovernmentDashboardController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Auth::routes();

// Profile routes (for "profile.edit" error fix)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Jobseeker dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/jobseeker/dashboard', [JobseekerDashboardController::class, 'index'])->name('jobseeker.dashboard');
});

// Employer dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/employer/dashboard', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');
});

// Admin dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

// Government dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/government/dashboard', [GovernmentDashboardController::class, 'index'])->name('government.dashboard');
});

// Fallback dashboard route for navigation links
Route::middleware(['auth', 'verified'])->get('/dashboard', function () {
    $user = Auth::user();

    switch ($user->role) {
        case 'jobseeker':
            return redirect()->route('jobseeker.dashboard');
        case 'employer':
            return redirect()->route('employer.dashboard');
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'government':
            return redirect()->route('government.dashboard');
        default:
            abort(403, 'Unauthorized.');
    }
})->name('dashboard');
