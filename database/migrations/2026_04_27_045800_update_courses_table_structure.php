<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('courses')) {
            Schema::table('courses', function (Blueprint $table) {

                if (!Schema::hasColumn('courses', 'level')) {
                    $table->enum('level', ['certificate', 'diploma', 'degree', 'cpd'])
                          ->default('certificate')
                          ->after('name');
                }

                if (!Schema::hasColumn('courses', 'duration_days')) {
                    $table->integer('duration_days')->nullable()->after('duration');
                }

            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('courses')) {
            Schema::table('courses', function (Blueprint $table) {

                if (Schema::hasColumn('courses', 'level')) {
                    $table->dropColumn('level');
                }

                if (Schema::hasColumn('courses', 'duration_days')) {
                    $table->dropColumn('duration_days');
                }

            });
        }
    }
};