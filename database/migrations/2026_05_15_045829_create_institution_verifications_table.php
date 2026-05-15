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
        Schema::create('institution_verifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('application_id')
                ->constrained('student_accreditation_applications')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | 📞 CONTACT PERSON
            |--------------------------------------------------------------------------
            */
            $table->string('contact_person')->nullable();
            $table->string('contact_email')->nullable();

            /*
            |--------------------------------------------------------------------------
            | 🔁 VERIFICATION STATUS
            |--------------------------------------------------------------------------
            */
            $table->enum('verification_status', [
                'pending',
                'contacted',
                'responded',
                'verified',
                'failed'
            ])->default('pending');

            /*
            |--------------------------------------------------------------------------
            | 📚 CURRICULUM EVALUATION
            |--------------------------------------------------------------------------
            */
            $table->integer('program_hours')->nullable();

            $table->string('delivery_language')->nullable();

            $table->string('study_mode')->nullable();

            $table->text('curriculum_summary')->nullable();

            $table->text('institution_response')->nullable();

            /*
            |--------------------------------------------------------------------------
            | ⏱ TIMESTAMPS
            |--------------------------------------------------------------------------
            */
            $table->timestamp('contacted_at')->nullable();
            $table->timestamp('responded_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institution_verifications');
    }
};