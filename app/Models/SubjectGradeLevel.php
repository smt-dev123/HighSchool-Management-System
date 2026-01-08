<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectGradeLevel extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectGradeLevelFactory> */
    use HasFactory;

    protected $fillable = [
        "subject_id",
        "grade_level_id",
        "class_type_id",
        "full_score",
        "divide",
        "average",
    ];
}
