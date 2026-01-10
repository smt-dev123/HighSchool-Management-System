<?php

namespace App\Http\Controllers;

use App\Models\ScoreLine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScoreLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ScoreLine::with(['score', 'student', 'subjectGrade'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'score_id' => 'required|exists:scores,id',
            'student_id' => 'required|exists:students,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
            'mark' => 'required|string|max:255',
        ]);

        ScoreLine::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScoreLine $scoreLine)
    {
        $scoreLine->load(['score', 'student', 'subjectGrade']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoreLine $scoreLine)
    {
        $data = $request->validate([
            'score_id' => 'required|exists:scores,id',
            'student_id' => 'required|exists:students,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
            'mark' => 'required|string|max:255',
        ]);

        $scoreLine->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoreLine $scoreLine)
    {
        $scoreLine->delete();
    }
}
