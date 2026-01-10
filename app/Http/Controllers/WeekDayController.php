<?php

namespace App\Http\Controllers;

use App\Models\WeekDay;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeekDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        WeekDay::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        WeekDay::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(WeekDay $weekDay)
    {
        WeekDay::find($weekDay->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WeekDay $weekDay)
    {
        $data = $request->validate([
            'name_kh' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
        ]);

        $weekDay->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeekDay $weekDay)
    {
        $weekDay->delete();
    }
}
