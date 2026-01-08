<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceLine extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceLineFactory> */
    use HasFactory;

    protected $fillable = [
        "attendance_id",
        "student_id",
        "attendance_type_id",
    ];
}
