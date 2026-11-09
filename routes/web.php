<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'viewRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');
});