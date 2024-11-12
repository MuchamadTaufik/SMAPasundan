<?php

namespace App\Http\Controllers\Siswa;

use App\Models\JenisKegiatan;
use App\Models\AjuanKonsultasi;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class AjuanKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $jenisKegiatan = JenisKegiatan::find(2);
        return view('dashboard-siswa.pengajuan.index', compact('jenisKegiatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jenis_kegiatans_id' => 'required|exists:jenis_kegiatans,id',
            'biodata_id' => 'required|exists:biodatas,id',
            'topik' => 'required|max:255',
            'tujuan' => 'required|max:255'
        ]);

        Kegiatan::create($validateData);

        toast()->success('Berhasil', 'Ajuan Konsultasi Berhasil ditambahkan, Cek Secara Berkala Informasi Penjadwalan');
        return redirect('/')->withInput();
    }

    public function jadwal()
    {
        // Mendapatkan biodata_id dari pengguna yang sedang login
        $biodataId = auth()->user()->biodata->id;

        // Mengambil semua kegiatan yang sesuai dengan biodata_id pengguna yang sedang login
        $kegiatan = Kegiatan::where('biodata_id', $biodataId)->get();

        // Mengirim data kegiatan ke view
        return view('dashboard-siswa.data.konsultasi.index', compact('kegiatan'));
    }

}
