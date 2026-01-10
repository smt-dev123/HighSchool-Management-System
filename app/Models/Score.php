<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreFactory> */
    use HasFactory;

    protected $fillable = [
        "class_id",
        "score_type_id",
    ];

    // Relationships
    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function scoreType()
    {
        return $this->belongsTo(ScoreType::class);
    }

    public function lines()
    {
        return $this->hasMany(ScoreLine::class);
    }
}
