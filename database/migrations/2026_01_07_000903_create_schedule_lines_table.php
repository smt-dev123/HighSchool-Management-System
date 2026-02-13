<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedule_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();
            $table->foreignId('time_id')->constrained()->restrictOnDelete();
            $table->foreignId('day_id')->constrained('week_days')->restrictOnDelete();
            $table->foreignId('subject_grade_id')->constrained('subject_grade_levels')->restrictOnDelete();
            // មិនអាចមាន subject ២ នៅថ្ងៃ និងម៉ោងដូចគ្នា ក្នុង class ដូចគ្នា
            $table->unique(['schedule_id', 'time_id', 'day_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_lines');
    }
};
