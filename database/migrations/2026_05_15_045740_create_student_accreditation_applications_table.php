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
        Schema::create('student_accreditation_applications', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | 👤 STUDENT DETAILS
            |--------------------------------------------------------------------------
            */
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();

            /*
            |--------------------------------------------------------------------------
            | 🎓 ACADEMIC DETAILS
            |--------------------------------------------------------------------------
            */
            $table->string('institution_name');
            $table->string('course_name');
            $table->string('award_received');
            $table->date('graduation_date')->nullable();

            $table->enum('study_mode', [
                'full_time',
                'part_time',
                'online',
                'hybrid'
            ])->nullable();

            $table->string('student_number')->nullable();

            /*
            |--------------------------------------------------------------------------
            | 🏫 INSTITUTION CONTACTS
            |--------------------------------------------------------------------------
            */
            $table->string('institution_email')->nullable();
            $table->string('institution_phone')->nullable();
            $table->string('institution_website')->nullable();
            $table->string('registrar_name')->nullable();

            /*
            |--------------------------------------------------------------------------
            | 📂 FILES
            |--------------------------------------------------------------------------
            */
            $table->string('certificate_path')->nullable();
            $table->string('transcript_path')->nullable();
            $table->string('id_document_path')->nullable();

            /*
            |--------------------------------------------------------------------------
            | 🔁 APPLICATION STATUS
            |--------------------------------------------------------------------------
            */
            $table->enum('status', [
                'pending',
                'under_review',
                'awaiting_institution_verification',
                'institution_verified',
                'approved',
                'rejected'
            ])->default('pending');

            /*
            |--------------------------------------------------------------------------
            | 📝 INTERNAL NOTES
            |--------------------------------------------------------------------------
            */
            $table->text('admin_notes')->nullable();
            $table->text('institution_feedback')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accreditation_applications');
    }
};