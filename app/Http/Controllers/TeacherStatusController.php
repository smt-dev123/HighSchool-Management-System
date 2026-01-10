<?php

namespace App\Http\Controllers;

use App\Models\TeacherStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        TeacherStatus::orderBy("created_at", "desc")->get();
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
        TeacherStatus::find($teacherStatus->id);
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
