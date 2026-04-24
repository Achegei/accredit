<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('verifications', function (Blueprint $table) {
            $table->id();

            // We do NOT enforce foreign key here intentionally
            // because certificate_number is what public users will submit
            $table->string('certificate_number');

            $table->timestamp('checked_at')->useCurrent();

            $table->ipAddress('ip_address')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};