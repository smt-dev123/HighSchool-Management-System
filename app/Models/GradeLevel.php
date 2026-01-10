<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    /** @use HasFactory<\Database\Factories\GradeLevelFactory> */
    use HasFactory;
    protected $fillable = [
        "name",
        "note",
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class, 'grade_level_id');
    }

    public function subjectGradeLevels()
    {
        return $this->hasMany(SubjectGradeLevel::class, 'grade_level_id');
    }
}
