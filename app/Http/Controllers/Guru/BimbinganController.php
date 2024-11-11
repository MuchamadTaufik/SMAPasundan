<?php

namespace App\Http\Controllers\Guru;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\JenisKegiatan;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\AssignOp\BitwiseOr;
use Barryvdh\DomPDF\PDF;

class BimbinganController extends Controller
{
    public function index()
    {
        $biodata = Biodata::whereHas('user', function ($query) {
            $query->where('role', 'siswa'); // Menambahkan filter role pada relasi user
        })
        ->with('kegiatan') // Memuat relasi 'kegiatan'
        ->latest()
        ->get();
        return view('dashboard-guru.bimbingan.index', compact('biodata'));
    }

    public function create(Biodata $biodata)
    {   
        $jenisKegiatan = JenisKegiatan::find(1);
        return view('dashboard-guru.bimbingan.create', compact('biodata','jenisKegiatan'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_kegiatans_id' => 'required|exists:jenis_kegiatans,id',
            'biodata_id' => 'required|exists:biodatas,id',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'topik' => 'required|max:255',
            'tujuan' => 'required|max:255',
            'pemateri' => 'nullable|max:255',
            'rencana_tindak_lanjut' => 'required|max:255',
            'tempat_select' => 'required|in:onsite,online',
            'tempat' => 'required'
            
        ]);

        Kegiatan::create($validateData);

        toast()->success('Berhasil', 'Data Bimbingan Berhasil ditambahkan');
        return redirect('/dashboard/bimbingan')->withInput();
    }

    public function rekap(Biodata $biodata)
    {
        $kegiatan = $biodata->kegiatan;

        return view('dashboard-guru.bimbingan.rekap.index', compact('kegiatan','biodata'));
    }

    public function downloadRekap($biodata_id, $jenis_kegiatans_id)
    {
        // Mengambil kegiatan dengan eager loading siswa
        $kegiatan = Kegiatan::with('biodata')
            ->where('biodata_id', $biodata_id)
            ->where('jenis_kegiatans_id', $jenis_kegiatans_id)
            ->get();

        $pdf = app(PDF::class);
        $pdf->loadView('dashboard-guru.bimbingan.rekap.surat', compact('kegiatan'));

        return $pdf->download('rekapan_bimbingan_siswa.pdf');
    }
}
