<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('certificate_requests', function (Blueprint $table) {

            if (!Schema::hasColumn('certificate_requests', 'reviewed_by')) {
                $table->unsignedBigInteger('reviewed_by')->nullable()->after('status');
            }

            if (!Schema::hasColumn('certificate_requests', 'reviewed_at')) {
                $table->timestamp('reviewed_at')->nullable()->after('reviewed_by');
            }

            if (!Schema::hasColumn('certificate_requests', 'resubmission_count')) {
                $table->integer('resubmission_count')->default(0)->after('reviewed_at');
            }

        });
    }

    public function down(): void
    {
        Schema::table('certificate_requests', function (Blueprint $table) {
            $table->dropColumn([
                'reviewed_by',
                'reviewed_at',
                'resubmission_count',
            ]);
        });
    }
};