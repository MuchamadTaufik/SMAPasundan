<?php

namespace App\Http\Controllers\Dashboard;

use App\Charts\KegiatanChart;
use App\Charts\PenggunaChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Kunjungan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(PenggunaChart $penggunaChart, KegiatanChart $kegiatanChart)
    {
        $totalSiswa = User::where('role','siswa')->count();
        
        $totalGuru = User::where('role','guru')->count();

        $totalAdmin = User::where('role','admin')->count();

        $totalBimbingan = Kegiatan::where('jenis_kegiatans_id', 1)->count();

        $totalKonsultasi = Kegiatan::where('jenis_kegiatans_id', 2)->count();

        $totalKunjungan = Kunjungan::count();
        return view('index', [
            'totalSiswa' => $totalSiswa,
            'totalGuru' => $totalGuru,
            'totalAdmin' => $totalAdmin,
            'totalBimbingan' => $totalBimbingan,
            'totalKonsultasi' => $totalKonsultasi,
            'totalKunjungan' => $totalKunjungan,
            'penggunaChart' => $penggunaChart->build(),
            'kegiatanChart' => $kegiatanChart->build()
        ]);
    }

    public function profile()
    {   
        return view('profile.index');
    }
}
