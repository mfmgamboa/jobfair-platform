<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Shared
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;

// Chat
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ChatController;

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

// Events
use App\Events\TestMessageEvent;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/trigger-pusher', function () {
    broadcast(new TestMessageEvent('🎉 It works!'))->toOthers();
    return 'Event broadcasted!';
});

// Enable Laravel auth with email verification
Auth::routes(['verify' => true]);

Route::prefix('government')->group(function () {
    Route::get('/login', [GovernmentAuthController::class, 'showLoginForm'])->name('government.login');
    Route::post('/login', [GovernmentAuthController::class, 'login'])->name('government.login.submit');
    Route::post('/logout', [GovernmentAuthController::class, 'logout'])->name('government.logout');

    Route::middleware('auth:government')->group(function () {
        Route::get('/dashboard', [GovernmentDashboardController::class, 'index'])->name('government.dashboard');
        Route::post('/approve-document', [GovernmentDashboardController::class, 'approveDocument'])->name('government.document.approve');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/resume/upload', [ResumeController::class, 'upload'])->name('resume.upload');
    Route::post('/resume/parse', [ResumeController::class, 'parse'])->name('resume.parse');

    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

    Route::get('/chat/contacts', [ChatController::class, 'index'])->name('chat.contacts');
    Route::get('/chat/messages/{user}', [ChatController::class, 'fetchMessages'])->name('chat.messages');
    Route::post('/chat/messages', [ChatController::class, 'sendMessage'])->name('chat.send');

    Route::get('/chat-ui', function () {
        return view('chat');
    })->name('chat.ui');
});

Route::middleware(['auth', 'verified'])->prefix('jobseeker')->name('jobseeker.')->group(function () {
    Route::get('/dashboard', [JobseekerDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'verified'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents', [DocumentController::class, 'upload'])->name('documents.upload');
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
