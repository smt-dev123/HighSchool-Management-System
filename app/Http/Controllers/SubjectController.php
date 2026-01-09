<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/subjects/Index', [
            'subjects' => Subject::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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

        Subject::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        $subject = Subject::findOrFail($subject->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $subject->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
    }
}
