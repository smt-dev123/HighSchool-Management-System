<?php

namespace App\Http\Controllers;

use App\Models\ClassType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ClassType::all();
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

        ClassType::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassType $classType)
    {
        ClassType::find($classType->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassType $classType)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'note' => 'nullable|string',
        ]);

        $classType->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassType $classType)
    {
        $classType->delete();
    }
}
