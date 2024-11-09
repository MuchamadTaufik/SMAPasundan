<?php

namespace App\Http\Controllers\Admin;

use App\Models\Semester;
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
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        //
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
}
