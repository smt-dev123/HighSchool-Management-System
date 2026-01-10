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

    // Relationships
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function attendanceType()
    {
        return $this->belongsTo(AttendanceType::class);
    }
}
