<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroupStudent extends Model
{
    /** @use HasFactory<\Database\Factories\StudentGroupStudentFactory> */
    use HasFactory;

    protected $fillable = ['student_group_id', 'student_id'];

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class, 'student_group_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
