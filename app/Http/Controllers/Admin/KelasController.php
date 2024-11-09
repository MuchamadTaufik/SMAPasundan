<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $kelas = Kelas::latest()->get();
        return view('dashboard-admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-admin.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelasRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:kelas'
        ]);

        Kelas::create($validateData);

        toast()->success('Berhasil', 'Kelas Berhasil ditambahkan');
        return redirect('/dashboard/kelas')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        return view('dashboard-admin.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        try {
            $rules = [
                'name' => 'required|unique:kelas,name,' . $kelas->id
            ];

            $validateData = $request->validate($rules);

            $kelas->update($validateData);

            alert()->success('Berhasil', 'Kelas Berhasil diubah');
            return redirect('/dashboard/kelas')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        alert()->success('Success', 'Kelas berhasil dihapus');
        return redirect('/dashboard/kelas')->withInput();
    }
}
