<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceLine;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = Attendance::with(['class', 'time', 'day', 'subjectGrade', 'teacher'])->get();

        return Inertia::render('admin/attendances/Index', [
            'attendances' => $attendances,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'time_id' => 'required|exists:times,id',
            'day_id' => 'required|exists:week_days,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        Attendance::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $attendance->load(['class.students.student', 'time', 'day', 'subjectGrade']);

        // ទាញយកវត្តមានដែលធ្លាប់កត់រួច (បើមាន)
        $existingDetails = AttendanceLine::where('attendance_id', $attendance->id)->get();

        return Inertia::render('admin/attendances/Show', [
            'attendance' => $attendance,
            'existingDetails' => $existingDetails,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'time_id' => 'required|exists:times,id',
            'day_id' => 'required|exists:week_days,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $attendance->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
    }
}
