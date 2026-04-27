<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('institutions')) {
            Schema::table('institutions', function (Blueprint $table) {

                if (!Schema::hasColumn('institutions', 'accredited_at')) {
                    $table->timestamp('accredited_at')->nullable()->after('status');
                }

                if (!Schema::hasColumn('institutions', 'expires_at')) {
                    $table->timestamp('expires_at')->nullable()->after('accredited_at');
                }

            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('institutions')) {
            Schema::table('institutions', function (Blueprint $table) {

                if (Schema::hasColumn('institutions', 'accredited_at')) {
                    $table->dropColumn('accredited_at');
                }

                if (Schema::hasColumn('institutions', 'expires_at')) {
                    $table->dropColumn('expires_at');
                }

            });
        }
    }
};