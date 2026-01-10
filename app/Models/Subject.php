<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /** @use HasFactory<\Database\Factories\SubjectFactory> */
    use HasFactory;

    protected $fillable = [
        "name_kh",
        "name_en",
        "note",
    ];

    public function gradeLevels()
    {
        return $this->hasMany(SubjectGradeLevel::class, 'subject_id');
    }
}
