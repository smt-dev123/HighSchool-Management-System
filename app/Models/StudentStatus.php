<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentStatus extends Model
{
    /** @use HasFactory<\Database\Factories\StudentStatusFactory> */
    use HasFactory;
    protected $fillable = ['status_kh', 'status_en', 'other'];
}
