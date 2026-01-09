<?php

namespace App\Http\Controllers;

use App\Models\StudentStatus;
use Illuminate\Http\Request;

class StudentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentStatus = StudentStatus::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'status_kh' => 'required|string|max:100',
            'status_en' => 'required|string|max:100',
            'other' => 'nullable|string|max:255',
        ]);

        StudentStatus::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentStatus $studentStatus)
    {
        $studentStatus = StudentStatus::findOrFail($studentStatus->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentStatus $studentStatus)
    {
        $data = $request->validate([
            'status_kh' => 'required|string|max:100',
            'status_en' => 'required|string|max:100',
            'other' => 'nullable|string|max:255',
        ]);

        $studentStatus->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentStatus $studentStatus)
    {
        $studentStatus->delete();
    }
}
