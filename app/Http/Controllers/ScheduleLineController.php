<?php

namespace App\Http\Controllers;

use App\Models\ScheduleLine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScheduleLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ScheduleLine::with(['schedule', 'time', 'day', 'subjectGrade'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'time_id' => 'required|exists:times,id',
            'day_id' => 'required|exists:week_days,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
        ]);

        ScheduleLine::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScheduleLine $scheduleLine)
    {
        $scheduleLine->load(['schedule', 'time', 'day', 'subjectGrade']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScheduleLine $scheduleLine)
    {
        $data = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'time_id' => 'required|exists:times,id',
            'day_id' => 'required|exists:week_days,id',
            'subject_grade_id' => 'required|exists:subject_grade_levels,id',
        ]);

        $scheduleLine->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScheduleLine $scheduleLine)
    {
        $scheduleLine->delete();
    }
}
