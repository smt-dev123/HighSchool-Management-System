<?php

namespace App\Http\Controllers;

use App\Models\AttendanceLine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AttendanceLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        AttendanceLine::with(['attendance', 'student', 'attendanceType'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'attendance_id' => 'required|exists:attendances,id',
            'student_id' => 'required|exists:students,id',
            'attendance_type_id' => 'required|exists:attendance_types,id',
        ]);

        AttendanceLine::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceLine $attendanceLine)
    {
        $attendanceLine->load(['attendance', 'student', 'attendanceType']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceLine $attendanceLine)
    {
        $data = $request->validate([
            'attendance_id' => 'required|exists:attendances,id',
            'student_id' => 'required|exists:students,id',
            'attendance_type_id' => 'required|exists:attendance_types,id',
        ]);

        $attendanceLine->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceLine $attendanceLine)
    {
        $attendanceLine->delete();
    }
}
