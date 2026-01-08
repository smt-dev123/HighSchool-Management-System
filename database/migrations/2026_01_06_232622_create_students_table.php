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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code')->unique();
            $table->string('name_kh');
            $table->string('name_en');
            $table->string('gender');
            $table->date('dob');
            $table->text('address');

            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('from_school')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('guardian_phone')->nullable();

            $table->foreignId('status_id')
                ->constrained('student_statuses')
                ->restrictOnDelete();

            $table->foreignId('role_id')
                ->constrained('student_roles')
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
        Schema::dropIfExists('students');
    }
};
