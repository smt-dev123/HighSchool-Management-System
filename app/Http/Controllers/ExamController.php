<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class ExamController extends Controller
{
    public function index()
    {
        return Inertia::render('admin/exams/Index', [
            'exams' => Exam::with(['academicYear', 'class'])->orderBy('id', 'desc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'academic_year_id' => 'nullable|exists:academic_years,id',
            'class_id' => 'nullable|exists:classes,id',
            'note' => 'nullable|string',
        ]);

        Exam::create($data);
    }

    public function show(Exam $exam)
    {
        $exam->load(['academicYear', 'class']);
        return Inertia::render('admin/exams/Show', ['exam' => $exam]);
    }

    public function update(Request $request, Exam $exam)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'nullable|date',
            'academic_year_id' => 'nullable|exists:academic_years,id',
            'class_id' => 'nullable|exists:classes,id',
            'note' => 'nullable|string',
        ]);

        $exam->update($data);
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
    }
}
