<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        "student_code",
        "name_kh",
        "name_en",
        "gender",
        "dob",
        "address",
        "phone",
        "email",
        "from_school",
        "father_name",
        "mother_name",
        "guardian_phone",
        "status_id",
        "role_id",
        "other",
    ];

    protected $casts = [
        'dob' => 'datetime:Y-m-d',
    ];

    // Relationships
    public function status()
    {
        return $this->belongsTo(StudentStatus::class);
    }

    public function role()
    {
        return $this->belongsTo(StudentRole::class);
    }

    public function classes()
    {
        return $this->hasMany(StudentClass::class);
    }

    public function groups()
    {
        return $this->belongsToMany(
            StudentGroup::class,
            'student_group_students',
            'student_id',
            'student_group_id'
        );
    }

    public function attendanceLines()
    {
        return $this->hasMany(AttendanceLine::class);
    }

    public function scoreLines()
    {
        return $this->hasMany(ScoreLine::class);
    }
}
