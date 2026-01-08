<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherStatus extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherStatusFactory> */
    use HasFactory;

    protected $fillable = [
        "status_kh",
        "status_en",
        "other",
    ];
}
