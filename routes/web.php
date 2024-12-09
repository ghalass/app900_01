<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\auth\AdminLoginController;
use App\Http\Controllers\admin\auth\AdminRegisterController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\user\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::middleware('auth')
    ->group(function () {

        Route::get('/user/profile', [ProfileController::class, 'index'])
            ->name('profile');
    });

Route::get('/admin/dashboard/home', [AdminHomeController::class, 'index'])
    ->name('admin.dashboard.home')->middleware('auth.admin');

Route::get('/admin/dashboard/login', [AdminLoginController::class, 'login'])
    ->name('admin.dashboard.login');

Route::post('/admin/dashboard/login', [AdminLoginController::class, 'checkLogin'])
    ->name('admin.dashboard.check');

Route::get('/admin/dashboard/register', [AdminRegisterController::class, 'register'])
    ->name('admin.dashboard.register');

Route::post('/admin/dashboard/register', [AdminRegisterController::class, 'store'])
    ->name('admin.dashboard.store');

// Route::get('/configs', [ConfigController::class, 'index'])
//     ->name('configs');

// Route::get('/configs/sites', [ConfigController::class, 'sites'])
//     ->name('configs.sites');

Route::prefix('configs')->group(function () {
    Route::get('/', [ConfigController::class, 'index'])->name('configs');
    Route::get('/sites', [ConfigController::class, 'sites'])->name('configs.sites');
});