<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Jobseeker\JobseekerDashboardController;
use App\Http\Controllers\Employer\EmployerDashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Government\GovernmentDashboardController;
use App\Http\Controllers\ResumeController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Auth::routes();

// Profile routes
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

// Resume Upload & Parsing (PDF/DOC)
Route::middleware(['auth'])->group(function () {
    Route::get('/resume/upload', [ResumeController::class, 'upload'])->name('resume.upload');
    Route::post('/resume/parse', [ResumeController::class, 'parse'])->name('resume.parse');
});
