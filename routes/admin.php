<?php

use App\Http\Controllers\AcademicYearController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubjectGradeLevelController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('auth')->group(function () {
    Route::get('admin/dashboard', function () {
        return Inertia::render('admin/dashboard/Index');
    })->name('admin.dashboard');
    Route::resource('admin/students', StudentController::class)
        ->names('admin.student');
    Route::resource('admin/teachers', TeacherController::class)
        ->names('admin.teacher');
    Route::resource('admin/subjects', SubjectController::class)
        ->names('admin.subject');
    Route::resource('admin/subject_grade_levels', SubjectGradeLevelController::class)
        ->names('admin.subject_grade_level');
    Route::resource('admin/classes', ClassesController::class)
        ->names('admin.class');
    Route::resource('admin/times', TimeController::class)
        ->names('admin.time');
    Route::resource('admin/attendances', \App\Http\Controllers\AttendanceController::class)
        ->names('admin.attendance');
    Route::resource('admin/academic-years', AcademicYearController::class)
        ->names('admin.academic');
    Route::resource('admin/users', UserController::class)
        ->names('admin.user');
})->middleware(['auth', 'verified']);
