<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/classes/Index', [
            'classes' => Classes::with(['classType', 'gradeLevel', 'academicYear'])->orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'class_type_id' => 'required|exists:class_types,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'other' => 'nullable|string',
        ]);

        Classes::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes)
    {
        $classes->load(['classType', 'gradeLevel', 'academicYear', 'students', 'teachers', 'schedules']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $classes)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'class_type_id' => 'required|exists:class_types,id',
            'grade_level_id' => 'required|exists:grade_levels,id',
            'academic_year_id' => 'required|exists:academic_years,id',
            'other' => 'nullable|string',
        ]);

        $classes->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();
    }
}
