<?php

namespace App\Http\Controllers;

use App\Models\TeacherStatus;
use Illuminate\Http\Request;

class TeacherStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherStatus = TeacherStatus::orderBy("created_at", "desc")->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'status_kh' => 'required|string|max:255',
            'status_en' => 'required|string|max:255',
            'other' => 'nullable|string',
        ]);

        TeacherStatus::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherStatus $teacherStatus)
    {
        $teacherStatus = TeacherStatus::findOrFail($teacherStatus->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherStatus $teacherStatus)
    {
        $data = $request->validate([
            'status_kh' => 'required|string|max:255',
            'status_en' => 'required|string|max:255',
            'other' => 'nullable|string',
        ]);

        $teacherStatus->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherStatus $teacherStatus)
    {
        $teacherStatus->delete();
    }
}
