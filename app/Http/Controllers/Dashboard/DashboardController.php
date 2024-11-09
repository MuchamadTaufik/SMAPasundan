<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexGuru()
    {
        $user = Auth::user();

        return view('dashboard-guru.index', [
            'user' => $user
        ]);
    }

    public function indexSiswa()
    {
        $user = Auth::user();

        return view('dashboard-siswa.index', [
            'user' => $user
        ]);
    }

    public function profileGuru()
    {
        $user = Auth::user();
        return view('dashboard-guru.profile.index', compact('user'));
    }
}
