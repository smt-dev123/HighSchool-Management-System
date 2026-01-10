<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $fillable = [
        "class_id",
        "time_id",
        "day_id",
        "subject_grade_id",
        "teacher_id",
    ];

    // Relationships
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function day()
    {
        return $this->belongsTo(WeekDay::class);
    }

    public function subjectGrade()
    {
        return $this->belongsTo(SubjectGradeLevel::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function lines()
    {
        return $this->hasMany(AttendanceLine::class);
    }
}
