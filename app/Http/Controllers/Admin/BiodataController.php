<?php

namespace App\Http\Controllers\Admin;

use App\Models\Biodata;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBiodataRequest;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexGuru()
    {
        // Dapatkan semua biodata yang berhubungan dengan pengguna yang memiliki peran 'guru'
        $biodata = Biodata::whereHas('user', function($query) {
            $query->where('role', 'guru');
        })->latest()->get();

        return view('dashboard-admin.guru.index', compact('biodata'));
    }

    public function indexSiswa()
    {
        $biodata = Biodata::whereHas('user', function($query) {
            $query->where('role','siswa');
        })->latest()->get();

        return view('dashboard-admin.siswa.index', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editGuru(Biodata $biodata)
    {
        return view('dashboard-admin.guru.edit', compact('biodata'));
    }

    public function editSiswa(Biodata $biodata)
    {
        return view('dashboard-admin.siswa.edit', compact('biodata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBiodataRequest $request, Biodata $biodata)
    {
        try {
            $rules = [
                'user_id' => 'nullable|exists:users,id',
                'semester_id' => 'nullable|exists:semesters,id',
                'kelas_id' => 'nullable|exists:kelas,id',
                'nomor_induk' => 'nullable|max:255|unique:biodatas,nomor_induk,' . $biodata->id,
                'alamat' => 'nullable|max:255',
                'nomor_hp' => 'nullable|max:25'
            ];

            $validateData = $request->validate($rules);

            $biodata->update($validateData);

            alert()->success('Berhasil', 'Biodata Berhasil diubah');
            return redirect('/')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Biodata $biodata)
    {
        try {
            // Hapus user terkait dengan biodata ini
            $user = $biodata->user;
            if ($user) {
                $user->delete();
            }
            
            // Hapus biodata
            $biodata->delete();

            alert()->success('Success', 'Biodata dan Akun dihapus');
            return redirect('/')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

}
