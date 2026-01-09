<?php

namespace App\Http\Controllers;

use App\Models\AttendanceType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('admin/attendanceTypes/Index', [
            'attendanceTypes' => AttendanceType::orderBy('id', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'note' => 'nullable|string',
        ]);

        AttendanceType::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceType $attendanceType)
    {
        $attendanceType = AttendanceType::findOrFail($attendanceType->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceType $attendanceType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'note' => 'nullable|string',
        ]);

        $attendanceType->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceType $attendanceType)
    {
        $attendanceType->delete();
    }
}
