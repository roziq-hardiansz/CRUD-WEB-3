<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ROUTE MAHASISWA - RBAC (Role-Based Access Control)
|--------------------------------------------------------------------------
| CATATAN URUTAN ROUTE:
| Route khusus Admin (statis /mahasiswa/create) WAJIB ditaruh di ATAS 
| route dinamis (/mahasiswa/{mahasiswa}). 
| 
| Jika terbalik, URL '/mahasiswa/create' akan dibaca sebagai parameter ID 
| '{mahasiswa}', yang menyebabkan error 404 (bukan 403 saat diakses member).
*/

// 1. Group Khusus Admin (CRUD Penuh) - Memakai RoleMiddleware ('role:admin')
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});

// 2. Group Read-Only (Dapat diakses oleh Admin & Member)
Route::middleware(['auth'])->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');
});

require __DIR__.'/auth.php';