<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\MessageController;

// Jobseeker
use App\Http\Controllers\Jobseeker\JobseekerDashboardController;

// Employer
use App\Http\Controllers\Employer\EmployerDashboardController;
use App\Http\Controllers\Employer\DocumentController;

// Admin
use App\Http\Controllers\Admin\AdminDashboardController;

// Government
use App\Http\Controllers\Government\GovernmentDashboardController;
use App\Http\Controllers\Government\GovernmentAuthController;

// 🔹 Home route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 🔹 Laravel built-in auth for jobseekers, employers, admins
Auth::routes();

// 🔹 Government custom auth
Route::prefix('government')->group(function () {
    Route::get('/login', [GovernmentAuthController::class, 'showLoginForm'])->name('government.login');
    Route::post('/login', [GovernmentAuthController::class, 'login'])->name('government.login.submit');
    Route::post('/logout', [GovernmentAuthController::class, 'logout'])->name('government.logout');

    Route::middleware('auth:government')->group(function () {
        Route::get('/dashboard', [GovernmentDashboardController::class, 'index'])->name('government.dashboard');
        Route::post('/approve-document', [GovernmentDashboardController::class, 'approveDocument'])->name('government.document.approve');
    });
});

// 🔹 Authenticated user routes
Route::middleware('auth')->group(function () {
    // Shared Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resume Upload & Parsing
    Route::get('/resume/upload', [ResumeController::class, 'upload'])->name('resume.upload');
    Route::post('/resume/parse', [ResumeController::class, 'parse'])->name('resume.parse');

    // Messaging
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});

// 🔹 Jobseeker dashboard
Route::middleware(['auth', 'verified'])->prefix('jobseeker')->name('jobseeker.')->group(function () {
    Route::get('/dashboard', [JobseekerDashboardController::class, 'index'])->name('dashboard');
});

// 🔹 Employer routes
Route::middleware(['auth', 'verified'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('dashboard');

    // Document Upload
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents', [DocumentController::class, 'upload'])->name('documents.upload');
});

// 🔹 Admin dashboard
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
