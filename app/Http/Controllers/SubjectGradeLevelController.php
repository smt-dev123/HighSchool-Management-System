<?php

namespace App\Http\Controllers;

use App\Models\SubjectGradeLevel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectGradeLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        SubjectGradeLevel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        SubjectGradeLevel::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectGradeLevel $subjectGradeLevel)
    {
        SubjectGradeLevel::find($subjectGradeLevel->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjectGradeLevel $subjectGradeLevel)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
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
