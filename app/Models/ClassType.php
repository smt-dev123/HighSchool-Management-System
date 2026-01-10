<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    /** @use HasFactory<\Database\Factories\ClassTypeFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "note",
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'class_type_id');
    }

    public function subjectGradeLevels()
    {
        return $this->hasMany(SubjectGradeLevel::class, 'class_type_id');
    }
}
