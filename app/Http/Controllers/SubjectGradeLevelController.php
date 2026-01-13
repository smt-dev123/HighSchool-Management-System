<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use App\Models\GradeLevel;
use App\Models\Subject;
use App\Models\SubjectGradeLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class SubjectGradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('admin/subject_grade_levels/Index', [
            'subject_grade_levels' => SubjectGradeLevel::with(['subject', 'gradeLevel', 'classType'])->orderBy('id', 'desc')->get(),
            'subjects' => Subject::all(),
            'grade_levels' => GradeLevel::all(),
            'class_types' => ClassType::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'subject_id' => 'required|integer|exists:subjects,id',
            'grade_level_id' => 'required|integer|exists:grade_levels,id',
            'class_type_id' => 'required|integer|exists:class_types,id',
            'full_score' => 'required|numeric',
            'divide' => 'required|numeric',
            'average' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        $created = SubjectGradeLevel::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectGradeLevel $subjectGradeLevel)
    {
        return $subjectGradeLevel->load(['subject', 'gradeLevel', 'classType']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjectGradeLevel $subjectGradeLevel)
    {
        $data = $request->validate([
            'subject_id' => 'required|integer|exists:subjects,id',
            'grade_level_id' => 'required|integer|exists:grade_levels,id',
            'class_type_id' => 'required|integer|exists:class_types,id',
            'full_score' => 'required|numeric',
            'divide' => 'required|numeric',
            'average' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        $subjectGradeLevel->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectGradeLevel $subjectGradeLevel)
    {
        $subjectGradeLevel->delete();
    }
}
