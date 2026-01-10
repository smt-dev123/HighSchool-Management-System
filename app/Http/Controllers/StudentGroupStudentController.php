<?php

namespace App\Http\Controllers;

use App\Models\StudentGroupStudent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentGroupStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        StudentGroupStudent::with(['studentGroup', 'student'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_group_id' => 'required|exists:student_groups,id',
            'student_id' => 'required|exists:students,id',
        ]);

        StudentGroupStudent::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentGroupStudent $studentGroupStudent)
    {
        $studentGroupStudent->load(['studentGroup', 'student']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentGroupStudent $studentGroupStudent)
    {
        $data = $request->validate([
            'student_group_id' => 'required|exists:student_groups,id',
            'student_id' => 'required|exists:students,id',
        ]);

        $studentGroupStudent->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentGroupStudent $studentGroupStudent)
    {
        $studentGroupStudent->delete();
    }
}
