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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('classe_id')->constrained()->onDelete('cascade');
            $table->foreignId('academic_id')->constrained()->onDelete('cascade');
            $table->foreignId('faculty_id')->constrained()->onDelete('cascade');
            $table->string('enrollment_type');  //ENUM
            $table->string('enrollment_status');  //ENUM :'pending', 'approved', 'rejected'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
