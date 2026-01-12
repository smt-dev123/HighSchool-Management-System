<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        "name_kh",
        "name_en",
        "gender",
        "dob",
        "join_date",
        "level",
        "address",
        "phone",
        "email",
        "profile",
        "is_enable_account",
        "status_id",
        "other",
    ];

    protected $casts = [
        'dob' => 'datetime:Y-m-d',
        'join_date' => 'datetime:Y-m-d',
        'is_enable_account' => 'boolean',
    ];

    // Relationships
    public function status()
    {
        return $this->belongsTo(TeacherStatus::class);
    }

    public function classes()
    {
        return $this->belongsToMany(
            Classes::class,
            'teacher_classes',
            'teacher_id',
            'class_id'
        );
    }

    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
