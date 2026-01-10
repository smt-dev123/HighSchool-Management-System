<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    /** @use HasFactory<\Database\Factories\TimeFactory> */
    use HasFactory;

    protected $fillable = [
        "name",
        "start_time",
        "end_time",
    ];

    public function scheduleLines()
    {
        return $this->hasMany(ScheduleLine::class, 'time_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'time_id');
    }
}
