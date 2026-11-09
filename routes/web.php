<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'viewRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('siswa/dashboard', [DashboardController::class, 'siswaDashboard'])->name('siswa.dashboard');
});