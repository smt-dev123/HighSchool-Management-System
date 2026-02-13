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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->string('name_kh');
            $table->string('name_en');
            $table->string('gender');
            $table->date('dob');
            $table->date('join_date');

            $table->string('level');
            $table->text('address');
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('profile')->nullable();

            $table->boolean('is_enable_account')->default(true);

            $table->foreignId('status_id')
                ->constrained('teacher_statuses')
                ->restrictOnDelete();

            $table->text('other')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
