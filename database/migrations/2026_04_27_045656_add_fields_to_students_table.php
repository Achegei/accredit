<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('students')) {
            Schema::table('students', function (Blueprint $table) {

                if (!Schema::hasColumn('students', 'phone')) {
                    $table->string('phone')->nullable()->after('email');
                }

                if (!Schema::hasColumn('students', 'date_of_birth')) {
                    $table->date('date_of_birth')->nullable()->after('id_number');
                }

                if (!Schema::hasColumn('students', 'nationality')) {
                    $table->string('nationality')->nullable()->after('date_of_birth');
                }

            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('students')) {
            Schema::table('students', function (Blueprint $table) {

                if (Schema::hasColumn('students', 'phone')) {
                    $table->dropColumn('phone');
                }

                if (Schema::hasColumn('students', 'date_of_birth')) {
                    $table->dropColumn('date_of_birth');
                }

                if (Schema::hasColumn('students', 'nationality')) {
                    $table->dropColumn('nationality');
                }

            });
        }
    }
};