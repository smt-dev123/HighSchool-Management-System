<?php

namespace App\Http\Controllers;

use App\Models\StudentStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentStatuses = StudentStatus::all();

        return response()->json([
            'success' => true,
            'data' => $studentStatuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'status_kh' => 'required|string|max:100',
            'status_en' => 'required|string|max:100',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
        ]);

        StudentStatus::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentStatus $studentStatus)
    {
        StudentStatus::find($studentStatus->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentStatus $studentStatus)
    {
        $data = $request->validate([
            'status_kh' => 'required|string|max:100',
            'status_en' => 'required|string|max:100',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $studentStatus->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentStatus $studentStatus)
    {
        $studentStatus->delete();
    }
}
