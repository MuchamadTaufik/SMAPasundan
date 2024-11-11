<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $pengguna = User::latest()->get();
        return view('dashboard-admin.pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:guru,admin,siswa',
            'password' => 'required|min:6|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Hash password
            $validateData['password'] = Hash::make($validateData['password']);

            // Buat user terlebih dahulu
            $user = User::create([
                'name' => $validateData['name'],
                'email' => $validateData['email'],
                'role' => $validateData['role'],
                'password' => $validateData['password']
            ]);

            // Membuat biodata kosong yang terhubung dengan user
            Biodata::create([
                'user_id' => $user->id,
                'semester_id' => null,
                'kelas_id' => null,
                'nomor_induk' => null,
                'alamat' => null,
                'nomor_hp' => null
            ]);

            DB::commit();
            toast()->success('Berhasil', 'Akun berhasil didaftarkan');
            return redirect('/dashboard/pengguna');

        } catch (\Exception $e) {
            DB::rollBack();            
            toast()->error('Register Gagal', 'Terjadi kesalahan saat mendaftarkan akun.');
            return back()->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {   
        return view('dashboard-admin.pengguna.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $rules = [
                'name' => 'required|max:255',
                'role' => 'required|in:admin,siswa,guru',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|min:5|max:255'
            ];

            $validateData = $request->validate($rules);

            if ($request->filled('password')) {
                $validateData['password'] = bcrypt($request->password);
            } else {
                // Remove password from validated data if it wasn't provided
                unset($validateData['password']);
            }

            $user->update($validateData);

            alert()->success('Berhasil', 'Akun berhasil diubah');
            return redirect('/dashboard/pengguna')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        alert()->success('Success', 'Akun berhasil dihapus');
        return redirect('/dashboard/pengguna')->withInput();
    }
}
