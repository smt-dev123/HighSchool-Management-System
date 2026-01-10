<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Teacher::with(['status', 'classes'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'dob' => 'required|date',
            'join_date' => 'required|date',
            'level' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email|unique:teachers,email',
            'profile' => 'nullable|string',
            'is_enable_account' => 'boolean',
            'status_id' => 'required|exists:teacher_statuses,id',
            'other' => 'nullable|string',
        ]);

        Teacher::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teacher->load(['status', 'classes']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female',
            'dob' => 'required|date',
            'join_date' => 'required|date',
            'level' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email|unique:teachers,email,' . $teacher->id,
            'profile' => 'nullable|string',
            'is_enable_account' => 'boolean',
            'status_id' => 'required|exists:teacher_statuses,id',
            'other' => 'nullable|string',
        ]);

        $teacher->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
    }
}
