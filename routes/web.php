<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate'])->middleware('guest');

Route::post('/logout',[LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard-admin', [DashboardController::class, 'indexAdmin'])->name('dashboard-admin');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    //Dashboard
    Route::get('/dashboard-guru', [DashboardController::class, 'indexGuru'])->name('dashboard-guru');
    
    //Profile-Guru
    Route::get('/dashboard-guru/profile', [DashboardController::class, 'profileGuru'])->name('profile.guru');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/', [DashboardController::class, 'indexSiswa'])->name('dashboard-siswa');
});