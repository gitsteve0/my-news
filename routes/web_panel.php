<?php

use App\Http\Controllers\Panel\AdminController;
use App\Http\Controllers\Panel\NewsController;
use App\Http\Controllers\Panel\AdminLoginController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('panel')->name('panel.')->group(function () {
    Route::middleware('guest:panel')->group(function () {
        Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login']);
    });

    Route::middleware('auth:panel')->group(function () {
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('admins', AdminController::class)->except('show')->middleware('can:administrate');
        Route::resource('users', UserController::class)->except('show');
        Route::resource('news', NewsController::class)->except('show');
    });
});
