<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroupClass extends Model
{
    /** @use HasFactory<\Database\Factories\StudentGroupClassFactory> */
    use HasFactory;

    protected $fillable = ['student_group_id', 'class_id'];

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class, 'student_group_id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
