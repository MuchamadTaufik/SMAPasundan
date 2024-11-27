<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Biodata;
use Illuminate\Http\Request;
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

    public function generate()
    {   
        $users = User::where('role', 'siswa')->get();
        $kelas = Kelas::all();
        return view('dashboard-admin.kelas.generate', compact('kelas','users'));
    }

    public function storeKelas(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $kelasId = $request->input('kelas_id');
        $userIds = $request->input('user_ids');

        
        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user && $user->biodata) {
                $user->biodata->update(['kelas_id' => $kelasId]);
            } else {
                $biodata = Biodata::create([
                    'user_id' => $userId,
                    'kelas_id' => $kelasId,
                    'semester_id' => null,
                    'nomor_induk' => null,
                    'alamat' => null,
                    'nomor_hp' => null,
                ]);
            }
        }

        alert()->success('Success', 'Kelas berhasil digenerate');
        return redirect()->route('kelas')->withInput();
    }
}
