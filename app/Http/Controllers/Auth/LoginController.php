<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Cek role pengguna
            if ($user->role === 'admin') {
                toast()->success('Hallo', 'Selamat Datang ' . $user->name);
                return redirect()->intended('dashboard-admin')->withInput();
            } elseif ($user->role === 'guru') {
                toast()->success('Hallo', 'Selamat Datang ' . $user->name);
                return redirect()->intended('dashboard-guru')->withInput();
            } elseif ($user->role === 'siswa') {
                toast()->success('Hallo', 'Selamat Datang ' . $user->name);
                return redirect()->intended('dashboard-siswa')->withInput();
            }
        }

        // Jika autentikasi gagal
        toast()->error('Login Gagal', 'Harap Cek Kembali Email dan Password');
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
