<?php

namespace App\Http\Controllers;

use App\Models\ScoreType;
use Illuminate\Http\Request;

class ScoreTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scoreTypes = ScoreType::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'date' => 'required|date',
        ]);

        ScoreType::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ScoreType $scoreType)
    {
        $scoreType = ScoreType::findOrFail($scoreType->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ScoreType $scoreType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'date' => 'required|date',
        ]);

        $scoreType->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ScoreType $scoreType)
    {
        $scoreType->delete();
    }
}
