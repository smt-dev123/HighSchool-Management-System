<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = Score::with(['class', 'scoreType', 'lines'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'score_type_id' => 'required|exists:score_types,id',
        ]);

        Score::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {
        $score->load(['class', 'scoreType', 'lines']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        $data = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'score_type_id' => 'required|exists:score_types,id',
        ]);

        $score->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        $score->delete();
    }
}
