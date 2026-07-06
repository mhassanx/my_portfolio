<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

// Public portfolio (single page)
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin area (Breeze auth + CMS)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('projects', ProjectController::class)->except(['show']);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('skills', SkillController::class)->except(['show']);
        Route::resource('social-links', SocialLinkController::class)->except(['show']);

        Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');

        Route::get('messages', [ContactMessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [ContactMessageController::class, 'show'])->name('messages.show');
        Route::delete('messages/{message}', [ContactMessageController::class, 'destroy'])->name('messages.destroy');

        // Breeze: change password (optional, for admin account)
        Route::put('account/password', [PasswordController::class, 'update'])->name('password.update');
    });
});
