<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Shared Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;

// Chat Controllers
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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Welcome Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// 🔁 Test Broadcast Route
Route::get('/trigger-pusher', function () {
    broadcast(new TestMessageEvent('🎉 It works!'))->toOthers();
    return 'Event broadcasted!';
});

// 🔐 Laravel Auth with Email Verification
Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| Government Routes
|--------------------------------------------------------------------------
*/
Route::prefix('government')->group(function () {
    Route::get('/login', [GovernmentAuthController::class, 'showLoginForm'])->name('government.login');
    Route::post('/login', [GovernmentAuthController::class, 'login'])->name('government.login.submit');
    Route::post('/logout', [GovernmentAuthController::class, 'logout'])->name('government.logout');

    Route::middleware('auth:government')->group(function () {
        Route::get('/dashboard', [GovernmentDashboardController::class, 'index'])->name('government.dashboard');
        Route::post('/approve-document', [GovernmentDashboardController::class, 'approveDocument'])->name('government.document.approve');
    });
});

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // 👤 Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 📄 Resume Upload & Parsing
    Route::get('/resume/upload', [ResumeController::class, 'upload'])->name('resume.upload');
    Route::post('/resume/parse', [ResumeController::class, 'parse'])->name('resume.parse');

    // 💬 Messaging Routes (Private Chat)
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');

    // 💬 Real-time Chat API
    Route::get('/chat/contacts', [ChatController::class, 'index'])->name('chat.contacts');
    Route::get('/chat/messages/{user}', [ChatController::class, 'fetchMessages'])->name('chat.messages');
    Route::post('/chat/messages', [ChatController::class, 'sendMessage'])->name('chat.send');

    // 💬 Chat UI Page
    Route::get('/chat-ui', function () {
        return view('chat');
    })->name('chat.ui');
});

/*
|--------------------------------------------------------------------------
| Jobseeker Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('jobseeker')->name('jobseeker.')->group(function () {
    Route::get('/dashboard', [JobseekerDashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Employer Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('employer')->name('employer.')->group(function () {
    Route::get('/dashboard', [EmployerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/documents', [DocumentController::class, 'index'])->name('documents');
    Route::post('/documents', [DocumentController::class, 'upload'])->name('documents.upload');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});
