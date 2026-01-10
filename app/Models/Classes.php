<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    /** @use HasFactory<\Database\Factories\ClassesFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "class_type_id",
        "grade_level_id",
        "academic_year_id",
        "other",
    ];

    // Relationships
    public function classType()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function gradeLevel()
    {
        return $this->belongsTo(GradeLevel::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function students()
    {
        return $this->hasMany(StudentClass::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(
            Teacher::class,
            'teacher_classes',
            'class_id',
            'teacher_id'
        );
    }

    public function teacherClasses()
    {
        return $this->hasMany(TeacherClass::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }

    public function studentGroups()
    {
        return $this->belongsToMany(
            StudentGroup::class,
            'student_group_classes',
            'class_id',
            'student_group_id'
        );
    }
}
