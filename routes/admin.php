<?php

use App\Http\Controllers\AcademicYearController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return Inertia::render('admin/dashboard/Index');
    })->name('admin.dashboard');

    Route::resource('admin/academic-years', AcademicYearController::class)
        ->names('admin.academic');

    Route::get('admin/students', function () {
        return Inertia::render('admin/students/Index');
    })->name('admin.students');
})->middleware(['auth', 'verified']);
