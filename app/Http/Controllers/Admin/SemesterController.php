<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Biodata;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $semester = Semester::latest()->get();

        return view('dashboard-admin.semester.index', compact('semester'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-admin.semester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemesterRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:semesters'
        ]); 

        Semester::create($validateData);

        toast()->success('Berhasil', 'Semester berhasil ditambahkan');
        return redirect('/dashboard/semester')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semester $semester)
    {
        return view('dashboard-admin.semester.edit', compact('semester'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        try {
            $rules = [
                'name' => 'required|unique:semesters,name,' . $semester->id,
            ];

            $validateData = $request->validate($rules);

            $semester->update($validateData);

            alert()->success('Berhasil', 'Semester Berhasil diubah');
            return redirect('/dashboard/semester')->withInput();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();

        alert()->success('Success', 'Semester berhasil dihapus');
        return redirect('/dashboard/semester')->withInput();
    }

    public function generate()
    {   
        $users = User::whereIn('role', ['guru','siswa'])->get();
        $semester = Semester::all();
        return view('dashboard-admin.semester.generate', compact('semester','users'));
    }


    public function storeSemester(Request $request)
    {
        $request->validate([
            'semester_id' => 'required|exists:semesters,id',
            'user_ids' => 'required|array',
            'user_ids.*' => 'exists:users,id',
        ]);

        $semesterId = $request->input('semester_id');
        $userIds = $request->input('user_ids');

        
        foreach ($userIds as $userId) {
            $user = User::find($userId);
            if ($user && $user->biodata) {
                $user->biodata->update(['semester_id' => $semesterId]);
            } else {
                $biodata = Biodata::create([
                    'user_id' => $userId,
                    'semester_id' => $semesterId,
                    'kelas_id' => null,
                    'nomor_induk' => null,
                    'alamat' => null,
                    'nomor_hp' => null,
                ]);
            }
        }

        alert()->success('Success', 'Semester berhasil digenerate');
        return redirect()->route('semester')->withInput();
    }


}
