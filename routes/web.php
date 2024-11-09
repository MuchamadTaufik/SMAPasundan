<?php

use App\Http\Controllers\Admin\AkunPenggunaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SemesterController;
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

Route::group(['middleware' => ['auth', 'role:admin,guru,siswa']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('profile');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    //Akun Pengguna
    Route::get('/dashboard/pengguna', [AkunPenggunaController::class, 'index'])->name('akun.pengguna');
    Route::get('/dashboard/pengguna/create', [AkunPenggunaController::class, 'create'])->name('akun.pengguna.create');
    Route::post('/dashboard/pengguna/store', [AkunPenggunaController::class, 'store'])->name('akun.pengguna.store');
    Route::get('/dashboard/pengguna/edit/{user}', [AkunPenggunaController::class, 'edit'])->name('akun.pengguna.edit');
    Route::put('/dashboard/pengguna/update/{user}', [AkunPenggunaController::class, 'update'])->name('akun.pengguna.update');
    Route::delete('/dashboard/pengguna/delete/{user}', [AkunPenggunaController::class, 'destroy'])->name('akun.pengguna.delete');

    //Semester
    Route::get('/dashboard/semester', [SemesterController::class, 'index'])->name('semester');
    Route::get('/dashboard/semester/create', [SemesterController::class, 'create'])->name('semester.create');
    Route::post('/dashboard/semester/create', [SemesterController::class, 'store'])->name('semester.store');
    Route::get('/dashboard/semester/edit/{semester}', [SemesterController::class, 'edit'])->name('semester.edit');
    Route::put('/dashboard/semester/update/{semester}', [SemesterController::class, 'update'])->name('semester.update');
    Route::delete('/dashboard/semester/delete/{semester}', [SemesterController::class, 'destroy'])->name('semester.delete');

    //Kelas
    Route::get('/dashboard/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/dashboard/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/dashboard/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/dashboard/kelas/edit/{kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/dashboard/kelas/update/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/dashboard/kelas/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    
});