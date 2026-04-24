<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            // Each course belongs to an institution
            $table->foreignId('institution_id')
                ->constrained('institutions')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('code')->unique(); // e.g. IT-101, BUS-202

            $table->string('duration')->nullable(); 
            // e.g. "6 months", "2 years"

            $table->enum('accreditation_status', [
                'pending',
                'approved',
                'rejected',
                'expired'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};