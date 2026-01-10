<?php

namespace App\Http\Controllers;

use App\Models\StudentRole;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        StudentRole::all();
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

        $studentRole = StudentRole::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRole $studentRole)
    {
        StudentRole::find($studentRole->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentRole $studentRole)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $studentRole->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRole $studentRole)
    {
        $studentRole->delete();
    }
}
