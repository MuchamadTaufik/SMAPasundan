<?php

namespace App\Http\Controllers\Guru;

use App\Models\Biodata;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class KonsultasiController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::where('jenis_kegiatans_id', 2)->latest()->get();

        return view('dashboard-guru.konsultasi.index', compact('kegiatan'));
    }

    public function penjadwalan(Kegiatan $kegiatan)
    {   
        $kegiatan->waktu = Carbon::parse($kegiatan->waktu)->format('H:i');
        return view('dashboard-guru.konsultasi.penjadwalan', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        try {
            $rules = [
                'tanggal' => 'required|date',
                'waktu' => 'required|date_format:H:i',
                'tempat_select' => 'required|in:onsite,online',
                'tempat' => 'required'
            ];

            $validateData = $request->validate($rules);

            $kegiatan->update($validateData);

            alert()->success('Berhasil', 'Konsultasi Berhasil dijadwalkan');
                return redirect('/dashboard/konsultasi')->withInput();
            } catch (\Exception $e) {
                dd($e->getMessage());
        }
    }

    public function rekap(Biodata $biodata)
    {
        $kegiatan = $biodata->kegiatan()
        ->where('jenis_kegiatans_id', 2)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('dashboard-guru.konsultasi.rekap.index',compact('biodata','kegiatan'));
    }

    public function downloadRekapKonsultasi($jenis_kegiatans_id)
    {
        $kegiatan = Kegiatan::with('biodata')
            ->where('jenis_kegiatans_id', $jenis_kegiatans_id)
            ->latest()
            ->get();

            $pdf = app(PDF::class);
            $pdf->loadView('dashboard-guru.konsultasi.laporan', compact('kegiatan'));
    
            // Mengunduh file PDF
            return $pdf->download('rekapitulasi_konsultasi.pdf');
    }

    public function downloadRekapKonsultasiSiswa($biodata_id, $jenis_kegiatans_id)
    {
        $kegiatan = Kegiatan::with('biodata')
            ->where('biodata_id', $biodata_id)
            ->where('jenis_kegiatans_id', $jenis_kegiatans_id)
            ->whereNotNull('tanggal')
            ->latest()
            ->get();

        $pdf = app(PDF::class);
        $pdf->loadView('dashboard-guru.konsultasi.rekap.surat', compact('kegiatan'));

        return $pdf->download('rekapan_konsultasi_siswa.pdf');
    }

    public function downloadKonsultasi(Kegiatan $kegiatan)
    {
        $pdf = app(PDF::class);
        $pdf->loadView('dashboard-guru.konsultasi.surat.index', compact('kegiatan'));

        return $pdf->download('laporan_konsultasi_siswa_'.$kegiatan->id.'.pdf');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id);

        alert()->success('Success', 'Data Konsultasi Berhasil dihapus');
        return redirect()->back()->withInput();
    }
}
