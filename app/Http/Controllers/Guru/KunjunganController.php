<?php

namespace App\Http\Controllers\Guru;

use App\Models\Biodata;
use Barryvdh\DomPDF\PDF;
use App\Models\Kunjungan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKunjunganRequest;
use App\Http\Requests\UpdateKunjunganRequest;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $biodata = Biodata::whereHas('user', function ($query) {
            $query->where('role', 'siswa'); // Menambahkan filter role pada relasi user
        })
        ->with('kunjungan')
        ->latest()
        ->get();
        return view('dashboard-guru.kunjungan.index', compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Biodata $biodata)
    {
        return view('dashboard-guru.kunjungan.create', compact('biodata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKunjunganRequest $request)
    {
        $validateData = $request->validate([
            'biodata_id' => 'required|exists:biodatas,id',
            'tanggal' => 'required|date',
            'permasalahan' => 'required|max:255',
            'tujuan' => 'required|max:255',
            'pihak_terlibat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'ringkasan' => 'required|max:255',
            'rencana_tindak_lanjut' => 'required|max:255',
        ]);

        Kunjungan::create($validateData);

        toast()->success('Berhasil', 'Data Kunjungan Berhasil ditambahkan');
        return redirect('/dashboard/kunjungan')->withInput();
    }

    /**
     * Display the specified resource.
     */

    public function downloadRekapKunjungan()
    {
        $kunjungan = Kunjungan::with('biodata')
            ->latest()
            ->get();

            $pdf = app(PDF::class);
            $pdf->loadView('dashboard-guru.kunjungan.laporan', compact('kunjungan'));
    
            // Mengunduh file PDF
            return $pdf->download('rekapitulasi_kunjungan.pdf');
    }

    public function rekap(Biodata $biodata)
    {
        $kunjungan = $biodata->kunjungan()
        ->orderBy('created_at', 'desc')
        ->get();
        return view('dashboard-guru.kunjungan.rekap.index', compact('kunjungan','biodata'));
    }

    public function downloadRekapKunjunganSiswa($biodata_id)
    {
        $kunjungan = Kunjungan::with('biodata')
            ->where('biodata_id', $biodata_id)
            ->latest()
            ->get();

        $pdf = app(PDF::class);
        $pdf->loadView('dashboard-guru.kunjungan.rekap.surat', compact('kunjungan'));

        return $pdf->download('rekapan_kunjungan_siswa.pdf');
    }

    public function downloadKunjungan(Kunjungan $kunjungan)
    {
        $pdf = app(PDF::class);
        $pdf->loadView('dashboard-guru.kunjungan.surat.index', compact('kunjungan'));

        return $pdf->download('laporan_kunjungan_siswa_'.$kunjungan->id.'.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kunjungan $kunjungan)
    {
        return view('dashboard-guru.kunjungan.edit', compact('kunjungan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKunjunganRequest $request, Kunjungan $kunjungan)
    {
        try {
            $rules = [
                'biodata_id' => 'required',
                'tanggal' => 'required|date',
                'permasalahan' => 'required|max:255',
                'tujuan' => 'required|max:255',
                'pihak_terlibat' => 'required|max:255',
                'alamat' => 'required|max:255',
                'ringkasan' => 'required|max:255',
                'rencana_tindak_lanjut' => 'required|max:255',
            ];

            $validateData = $request->validate($rules);

            $kunjungan->update($validateData);

            alert()->success('Berhasil', 'Data Kunjungan Berhasil diubah');
                return redirect('/dashboard/kunjungan')->withInput();
            } catch (\Exception $e) {
                dd($e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kunjungan $kunjungan)
    {
        Kunjungan::destroy($kunjungan->id);

        alert()->success('Success', 'Data Kunjungan Berhasil dihapus');
        return redirect()->back()->withInput();
    }
}
