<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSiswa = User::where('role','siswa')->count();
        
        $totalGuru = User::where('role','guru')->count();

        $totalAdmin = User::where('role','admin')->count();
        return view('index', [
            'totalSiswa' => $totalSiswa,
            'totalGuru' => $totalGuru,
            'totalAdmin' => $totalAdmin
        ]);
    }

    public function profile()
    {   
        return view('profile.index');
    }
}
