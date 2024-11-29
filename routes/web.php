<?php

use App\Http\Controllers\Admin\AkunPenggunaController;
use App\Http\Controllers\Admin\BiodataController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SemesterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Guru\BimbinganController;
use App\Http\Controllers\Guru\KonsultasiController;
use App\Http\Controllers\Guru\KunjunganController;
use App\Http\Controllers\Siswa\AjuanKonsultasiController;

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

    Route::get('/dashboard/konsultasi/surat/{kegiatan}', [KonsultasiController::class, 'downloadKonsultasi'])->name('konsultasi.download');
    Route::get('/dashboard/bimbingan/surat/{kegiatan}', [BimbinganController::class, 'downloadBimbingan'])->name('bimbingan.download');
    Route::get('/dashboard/kunjungan/surat/{kunjungan}', [KunjunganController::class, 'downloadKunjungan'])->name('kunjungan.download');

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

    Route::get('/dashboard/semester/generate',[SemesterController::class, 'generate'])->name('semester.generate');
    Route::post('/dashboard/generate-semester', [SemesterController::class, 'storeSemester'])->name('generate.semester');

    //Kelas
    Route::get('/dashboard/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/dashboard/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/dashboard/kelas/store', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/dashboard/kelas/edit/{kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/dashboard/kelas/update/{kelas}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/dashboard/kelas/delete/{kelas}', [KelasController::class, 'destroy'])->name('kelas.delete');

    Route::post('/dashboard/generate-kelas', [KelasController::class, 'storeKelas'])->name('generate.kelas');
    Route::get('/dashboard/kelas/generate',[KelasController::class, 'generate'])->name('kelas.generate');

    //Guru
    Route::get('/dashboard/guruBk', [BiodataController::class, 'indexGuru'])->name('guru');
    Route::get('/dashboard/guruBk/edit/{biodata}', [BiodataController::class, 'editGuru'])->name('guru.edit');

    //Guru dan Siswa
    Route::put('/dashboard/update/{biodata}', [BiodataController::class, 'update'])->name('guru.update');
    Route::delete('/dashboard/delete/{biodata}', [BiodataController::class, 'destroy'])->name('guru.delete');

    //Siswa
    Route::get('/dashboard/siswa', [BiodataController::class, 'indexSiswa'])->name('siswa');
    Route::get('/dashboard/siswa/edit/{biodata}', [BiodataController::class, 'editSiswa'])->name('siswa.edit');
});

Route::middleware(['auth', 'role:guru'])->group(function () {
    //Bimbingan
    Route::get('/dashboard/bimbingan', [BimbinganController::class, 'index'])->name('bimbingan');
    Route::get('/dashboard/bimbingan/{biodata}', [BimbinganController::class, 'create'])->name('bimbingan.create');
    Route::post('/dashboard/bimbingan/create', [BimbinganController::class, 'store'])->name('bimbingan.store');
    Route::get('/dashboard/bimbingan/rekap/{biodata}', [BimbinganController::class, 'rekap'])->name('bimbingan.rekap');
    Route::get('/dashboard/bimbingan/edit/{kegiatan}', [BimbinganController::class, 'edit'])->name('bimbingan.edit');
    Route::put('/dashboard/bimbingan/update/{kegiatan}', [BimbinganController::class, 'update'])->name('bimbingan.update');
    Route::delete('/dashboard/bimbingan/delete/{kegiatan}', [BimbinganController::class, 'destroy'])->name('bimbingan.delete');

    Route::get('/dashboard/bimbingan/laporan/{biodata_id}/{jenis_kegiatans_id}', [BimbinganController::class, 'downloadRekap'])->name('bimbingan.laporan');
    Route::get('/dashboard/bimbingan/rekapitulasi/{jenis_kegiatans_id}', [BimbinganController::class, 'downloadRekapBimbingan'])->name('bimbingan.rekapitulasi');

    //Konsultasi
    Route::get('/dashboard/konsultasi', [KonsultasiController::class, 'index'])->name('konsultasi');
    Route::get('/dashboard/konsultasi/jadwal/{kegiatan}', [KonsultasiController::class, 'penjadwalan'])->name('konsultasi.jadwal');
    Route::put('/dashboard/konsultasi/jadwal/update/{kegiatan}', [KonsultasiController::class, 'update'])->name('konsultasi.update');
    Route::get('/dashboard/konsultasi/rekap/{biodata}', [KonsultasiController::class, 'rekap'])->name('konsultasi.rekap');
    Route::delete('/dashboard/konsultasi/delete/{kegiatan}', [KonsultasiController::class, 'destroy'])->name('konsultasi.delete');

    Route::get('/dashboard/konsultasi/rekapitulasi/{jenis_kegiatans_id}', [KonsultasiController::class, 'downloadRekapKonsultasi'])->name('konsultasi.rekapitulasi');
    Route::get('/dashboard/konsultasi/laporan/{biodata_id}/{jenis_kegiatans_id}', [KonsultasiController::class, 'downloadRekapKonsultasiSiswa'])->name('konsultasi.laporan');
    

    Route::get('/dashboard/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');
    Route::get('/dashboard/kunjungan/create/{biodata}', [KunjunganController::class, 'create'])->name('kunjungan.create');
    Route::post('/dashboard/kunjungan/store', [KunjunganController::class, 'store'])->name('kunjungan.store');
    Route::get('/dashboard/kunjungan/rekap/{biodata}', [KunjunganController::class, 'rekap'])->name('kunjungan.rekap');
    Route::get('/dashboard/kunjungan/edit/{kunjungan}', [KunjunganController::class, 'edit'])->name('kunjungan.edit');
    Route::put('/dashboard/kunjungan/update/{kunjungan}', [KunjunganController::class, 'update'])->name('kunjungan.update');
    Route::delete('/dashboard/kunjungan/delete/{kunjungan}', [KunjunganController::class, 'destroy'])->name('kunjungan.delete');

    Route::get('/dashboard/kunjungan/rekapitulasi', [KunjunganController::class, 'downloadRekapKunjungan'])->name('kunjungan.rekapitulasi');
    Route::get('/dashboard/kunjungan/laporan/{biodata_id}', [KunjunganController::class, 'downloadRekapKunjunganSiswa'])->name('kunjungan.laporan');
});

Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/pengajuan-konsultasi', [AjuanKonsultasiController::class, 'index'])->name('pengajuan');
    Route::post('/pengajuan-konsultasi/create', [AjuanKonsultasiController::class, 'store'])->name('pengajuan.store');

    //Data
    Route::get('/jadwal-konsultasi', [AjuanKonsultasiController::class, 'jadwal'])->name('data.konsultasi');
    Route::get('/jadwal-bimbingan', [BimbinganController::class, 'indexSiswa'])->name('data.bimbingan');
    Route::get('/jadwal-kunjungan', [KunjunganController::class, 'indexSiswa'])->name('data.kunjungan');
});