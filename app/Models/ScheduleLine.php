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
}
