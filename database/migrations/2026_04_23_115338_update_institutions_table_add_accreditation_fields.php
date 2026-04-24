<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('institutions', function (Blueprint $table) {

            // Link to application (IMPORTANT)
            if (!Schema::hasColumn('institutions', 'application_id')) {
                $table->foreignId('application_id')
                    ->nullable()
                    ->constrained('applications')
                    ->nullOnDelete();
            }

            // Accreditation level (core business logic)
            if (!Schema::hasColumn('institutions', 'accreditation_level')) {
                $table->string('accreditation_level')->nullable();
            }

            // Logo for portal + certificates
            if (!Schema::hasColumn('institutions', 'logo')) {
                $table->string('logo')->nullable();
            }

            // Public verification system (VERY IMPORTANT)
            if (!Schema::hasColumn('institutions', 'verification_code')) {
                $table->string('verification_code')->unique()->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('institutions', function (Blueprint $table) {

            if (Schema::hasColumn('institutions', 'application_id')) {
                $table->dropConstrainedForeignId('application_id');
            }

            $table->dropColumn([
                'accreditation_level',
                'logo',
                'verification_code'
            ]);
        });
    }
};