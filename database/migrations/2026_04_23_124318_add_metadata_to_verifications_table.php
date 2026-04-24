<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('verifications', function (Blueprint $table) {

            // What browser/device made the request
            $table->text('user_agent')->nullable()->after('ip_address');

            // Outcome of verification attempt
            $table->enum('result', ['valid', 'invalid', 'not_found'])
                ->nullable()
                ->after('certificate_number');

            // Optional: helps analytics per institution
            $table->foreignId('institution_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete()
                ->after('result');
        });
    }

    public function down(): void
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->dropForeign(['institution_id']);
            $table->dropColumn(['user_agent', 'result', 'institution_id']);
        });
    }
};