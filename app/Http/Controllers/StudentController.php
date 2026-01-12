<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentRole;
use App\Models\StudentStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = StudentStatus::all();
        $roles = StudentRole::all();

        return Inertia::render('admin/students/Index', [

            'student_statuses' => $statuses,
            'student_roles'    => $roles,
            'students' => Student::with(['status', 'role', 'classes'])->orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_code' => 'required|string|max:255|unique:students,student_code',
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'gender' => 'required|string|in:M,F',
            'dob' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email|unique:students,email',
            'from_school' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'guardian_phone' => 'nullable|string',
            'status_id' => 'required|exists:student_statuses,id',
            'role_id' => 'required|exists:student_roles,id',
            'other' => 'nullable|string',
        ]);
        Student::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load(['status', 'role', 'classes']);

        return Inertia::render('admin/students/Show', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'student_code' => 'required|string|max:255|unique:students,student_code,' . $student->id,
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'gender' => 'required|string|in:M,F',
            'dob' => 'required|date',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email|unique:students,email,' . $student->id,
            'from_school' => 'nullable|string',
            'father_name' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'guardian_phone' => 'nullable|string',
            'status_id' => 'required|exists:student_statuses,id',
            'role_id' => 'required|exists:student_roles,id',
            'other' => 'nullable|string',
        ]);

        $student->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
    }
}
