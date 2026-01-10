<?php

namespace App\Http\Controllers;

use App\Models\TeacherRole;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        TeacherRole::all();
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
        TeacherRole::find($teacherRole->id);
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
