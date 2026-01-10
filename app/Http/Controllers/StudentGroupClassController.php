<?php

namespace App\Http\Controllers;

use App\Models\StudentGroupClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentGroupClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        StudentGroupClass::with(['studentGroup', 'class'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_group_id' => 'required|exists:student_groups,id',
            'class_id' => 'required|exists:classes,id',
        ]);

        $studentGroupClass = StudentGroupClass::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentGroupClass $studentGroupClass)
    {
        $studentGroupClass->load(['studentGroup', 'class']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentGroupClass $studentGroupClass)
    {
        $data = $request->validate([
            'student_group_id' => 'required|exists:student_groups,id',
            'class_id' => 'required|exists:classes,id',
        ]);

        $studentGroupClass->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentGroupClass $studentGroupClass)
    {
        $studentGroupClass->delete();
    }
}
