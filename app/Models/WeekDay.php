<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    /** @use HasFactory<\Database\Factories\WeekDayFactory> */
    use HasFactory;

    protected $fillable = [
        "name_kh",
        "name_en",
    ];
}
