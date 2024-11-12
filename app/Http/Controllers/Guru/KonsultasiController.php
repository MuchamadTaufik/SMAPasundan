<?php

namespace App\Http\Controllers\Guru;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\Models\Kegiatan;

class KonsultasiController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::where('jenis_kegiatans_id','2')->latest()->get();

        return view('dashboard-guru.konsultasi.index', compact('kegiatan'));
    }

    public function penjadwalan(Kegiatan $kegiatan)
    {
        return view('dashboard-guru.konsultasi.penjadwalan', compact('kegiatan'));
    }
}
