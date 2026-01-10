<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleLine extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleLineFactory> */
    use HasFactory;

    protected $fillable = [
        "schedule_id",
        "time_id",
        "day_id",
        "subject_grade_id",
    ];

    // Relationships
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
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
}
