<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'viewRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register');

Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::prefix('admin')->group(function() {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/transaksi', [AdminController::class, 'index'])->name('admin.transaksi.index');
        Route::get('/transaksi/{id}', [AdminController::class, 'show'])->name('admin.transaksi.show');
        Route::get('/transaksi/{id}/edit', [AdminController::class, 'edit'])->name('admin.transaksi.edit');
        Route::get('/category', [AdminController::class, 'category'])->name('admin.category.index');
        Route::get('/feedback', [AdminController::class, 'feedback'])->name('admin.feedback.index');
    });
});

Route::middleware(['auth', 'role:siswa'])->group(function() {
    Route::prefix('siswa')->group(function() {
        Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
        Route::get('/transaksi', [SiswaController::class, 'index'])->name('siswa.transaksi.index');
        Route::get('/transaksi/create', [SiswaController::class, 'create'])->name('siswa.transaksi.create');
        Route::get('/transaksi/{id}', [SiswaController::class, 'show'])->name('siswa.transaksi.show');
        Route::get('/transaksi/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.transaksi.edit');
        Route::get('/feedback', [SiswaController::class, 'feedback'])->name('siswa.feedback.index');
    });
});