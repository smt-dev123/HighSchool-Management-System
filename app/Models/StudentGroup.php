<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    /** @use HasFactory<\Database\Factories\StudentGroupFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function classes()
    {
        return $this->hasMany(StudentGroupClass::class, 'student_group_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_group_students', 'student_group_id', 'student_id');
    }
}
