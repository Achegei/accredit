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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->string('institution_name');
            $table->string('contact_person');
            $table->string('email');
            $table->string('phone')->nullable();

            $table->string('category')->nullable(); // Institution, TVET, Online, etc
            $table->text('description')->nullable();

            $table->enum('status', ['pending', 'reviewing', 'approved', 'rejected'])
                  ->default('pending');

            $table->text('notes')->nullable(); // admin internal comments

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
