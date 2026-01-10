<?php

namespace App\Http\Controllers;

use App\Models\TeacherClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherClasses = TeacherClass::with(['teacher', 'class', 'subjectGrade', 'role'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'class_id' => 'required|exists:classes,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
            'role_id' => 'required|exists:teacher_roles,id',
        ]);

        TeacherClass::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherClass $teacherClass)
    {
        $teacherClass->load(['teacher', 'class', 'subjectGrade', 'role']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherClass $teacherClass)
    {
        $data = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'class_id' => 'required|exists:classes,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
            'role_id' => 'required|exists:teacher_roles,id',
        ]);

        $teacherClass->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherClass $teacherClass)
    {
        $teacherClass->delete();
    }
}
