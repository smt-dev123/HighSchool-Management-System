<?php

namespace App\Http\Controllers;

use App\Models\TeacherRole;
use Illuminate\Http\Request;

class TeacherRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacherRole = TeacherRole::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        TeacherRole::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherRole $teacherRole)
    {
        $teacherRole = TeacherRole::findOrFail($teacherRole->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeacherRole $teacherRole)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $teacherRole->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherRole $teacherRole)
    {
        $teacherRole->delete();
    }
}
