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

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class, 'grade_level_id');
    }

    public function classType()
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }

    public function scheduleLines()
    {
        return $this->hasMany(ScheduleLine::class, 'subject_grade_level_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'subject_grade_level_id');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'subject_grade_level_id');
    }

    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class, 'subject_grade_level_id');
    }
}
