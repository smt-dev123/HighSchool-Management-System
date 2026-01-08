<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;

    protected $fillable = [
        "name_kh",
        "name_en",
        "gender",
        "dob",
        "join_date",
        "level",
        "address",
        "phone",
        "email",
        "profile",
        "is_enable_account",
        "status_id",
        "other",
    ];
}
