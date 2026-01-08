<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = [
        "student_code",
        "name_kh",
        "name_en",
        "gender",
        "dob",
        "address",
        "phone",
        "email",
        "from_school",
        "father_name",
        "mother_name",
        "profile",
        "status_id",
        "role_id",
        "other",
    ];
}
