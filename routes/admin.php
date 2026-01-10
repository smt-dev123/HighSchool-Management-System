<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return Inertia::render('admin/dashboard/Index');
    })->name('admin.dashboard');

    Route::resource('admin/academic-years', AcademicYearController::class)
        ->names('admin.academic');
    Route::resource('admin/times', TimeController::class)
        ->names('admin.time');
    Route::resource('admin/subjects', SubjectController::class)
        ->names('admin.subject');

    Route::resource('admin/students', StudentController::class)
        ->names('admin.student');
})->middleware(['auth', 'verified']);
