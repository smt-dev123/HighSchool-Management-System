<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreLine extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreLineFactory> */
    use HasFactory;

    protected $fillable = [
        "score_id",
        "student_id",
        "subject_grade_id",
        "mark",
    ];

    // Relationships
    public function score()
    {
        return $this->belongsTo(Score::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subjectGrade()
    {
        return $this->belongsTo(SubjectGradeLevel::class);
    }
}
