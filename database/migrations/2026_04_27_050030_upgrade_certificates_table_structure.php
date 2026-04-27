<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        if (Schema::hasTable('certificates')) {

            Schema::table('certificates', function (Blueprint $table) {

                // 🏢 Add institution
                if (!Schema::hasColumn('certificates', 'institution_id')) {
                    $table->foreignId('institution_id')
                          ->nullable()
                          ->after('course_id')
                          ->constrained()
                          ->nullOnDelete();
                }

                // 📅 Completion date (IMPORTANT)
                if (!Schema::hasColumn('certificates', 'completion_date')) {
                    $table->date('completion_date')
                          ->nullable()
                          ->after('issue_date');
                }

                // 🔐 Verification code
                if (!Schema::hasColumn('certificates', 'verification_code')) {
                    $table->string('verification_code')
                          ->nullable()
                          ->unique()
                          ->after('certificate_number');
                }

                // 🔄 Upgrade status
                if (Schema::hasColumn('certificates', 'status')) {
                    $table->dropColumn('status');
                }

            });

            // Re-add status safely (outside closure for enum change)
            Schema::table('certificates', function (Blueprint $table) {

                if (!Schema::hasColumn('certificates', 'status')) {
                    $table->enum('status', [
                        'pending',
                        'approved',
                        'rejected',
                        'issued',
                        'revoked'
                    ])->default('issued')->after('grade');
                }

                // 👤 Audit fields
                if (!Schema::hasColumn('certificates', 'issued_by')) {
                    $table->foreignId('issued_by')
                          ->nullable()
                          ->constrained('users')
                          ->nullOnDelete();
                }

                if (!Schema::hasColumn('certificates', 'approved_by')) {
                    $table->foreignId('approved_by')
                          ->nullable()
                          ->constrained('users')
                          ->nullOnDelete();
                }

                if (!Schema::hasColumn('certificates', 'issued_at')) {
                    $table->timestamp('issued_at')->nullable();
                }

                if (!Schema::hasColumn('certificates', 'revoked_at')) {
                    $table->timestamp('revoked_at')->nullable();
                }

            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('certificates')) {

            Schema::table('certificates', function (Blueprint $table) {

                if (Schema::hasColumn('certificates', 'institution_id')) {
                    $table->dropConstrainedForeignId('institution_id');
                }

                if (Schema::hasColumn('certificates', 'completion_date')) {
                    $table->dropColumn('completion_date');
                }

                if (Schema::hasColumn('certificates', 'verification_code')) {
                    $table->dropColumn('verification_code');
                }

                if (Schema::hasColumn('certificates', 'issued_by')) {
                    $table->dropConstrainedForeignId('issued_by');
                }

                if (Schema::hasColumn('certificates', 'approved_by')) {
                    $table->dropConstrainedForeignId('approved_by');
                }

                if (Schema::hasColumn('certificates', 'issued_at')) {
                    $table->dropColumn('issued_at');
                }

                if (Schema::hasColumn('certificates', 'revoked_at')) {
                    $table->dropColumn('revoked_at');
                }

                // rollback status (simple)
                if (Schema::hasColumn('certificates', 'status')) {
                    $table->dropColumn('status');
                }

                $table->enum('status', ['valid', 'revoked'])->default('valid');

            });
        }
    }
};