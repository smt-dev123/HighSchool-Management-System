<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentClasses = StudentClass::with(['student', 'class'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'is_duplicated' => 'boolean',
            'other' => 'nullable|string',
        ]);

        StudentClass::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentClass $studentClass)
    {
        $studentClass->load(['student', 'class']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentClass $studentClass)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:students,id',
            'class_id' => 'required|exists:classes,id',
            'is_duplicated' => 'boolean',
            'other' => 'nullable|string',
        ]);

        $studentClass->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClass $studentClass)
    {
        $studentClass->delete();
    }
}
