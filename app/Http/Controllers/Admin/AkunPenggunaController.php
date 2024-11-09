<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
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

        try {
            $validateData['password'] = Hash::make($validateData['password']);

            User::create($validateData);

            toast()->success('Berhasil', 'Akun berhasil di daftarkan');
            return redirect('/dashboard/pengguna')->withInput();
        } catch (\Exception $e) {
            toast()->error('Register Gagal', 'Email Telah digunakan.');
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
