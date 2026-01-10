<?php

namespace App\Http\Controllers;

use App\Models\StudentGroup;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        StudentGroup::with(['classes', 'students'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:student_groups,code',
            'note' => 'nullable|string',
        ]);

        StudentGroup::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentGroup $studentGroup)
    {
        $studentGroup->load(['classes', 'students']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentGroup $studentGroup)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:student_groups,code,' . $studentGroup->id,
            'note' => 'nullable|string',
        ]);

        $studentGroup->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentGroup $studentGroup)
    {
        $studentGroup->delete();
    }
}
