<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsMainController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('/dashboard')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/user', UsersController::class);
    Route::resource('/berita', BeritaController::class);
    Route::resource('/documents', DocumentController::class);
    Route::post('/users/{id}/update-password', [UsersController::class, 'updatePassword'])->name('users.updatePassword');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [MainController::class, 'index']);
Route::get('/news', [NewsMainController::class, 'index']);
Route::get('/news/{id}', [NewsMainController::class, 'show'])->name('news.show');
