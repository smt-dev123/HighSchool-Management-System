<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRole extends Model
{
    /** @use HasFactory<\Database\Factories\StudentRoleFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "note",
    ];
}
