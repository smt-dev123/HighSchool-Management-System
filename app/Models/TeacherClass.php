<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherClassFactory> */
    use HasFactory;

    protected $fillable = [
        "teacher_id",
        "class_id",
        "subject_grade_id",
        "role_id",
    ];
}
