<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreType extends Model
{
    /** @use HasFactory<\Database\Factories\ScoreTypeFactory> */
    use HasFactory;

    protected $casts = ['date' => 'date'];

    protected $fillable = [
        "name",
        "date",
    ];

    public function scores()
    {
        return $this->hasMany(Score::class, 'score_type_id');
    }
}
