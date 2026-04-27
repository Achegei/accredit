<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {

            // --- Identity Enhancements ---
            if (!Schema::hasColumn('students', 'gender')) {
                $table->string('gender')->nullable()->after('date_of_birth');
            }

            if (!Schema::hasColumn('students', 'registration_number')) {
                $table->string('registration_number')->nullable()->unique()->after('id_number');
            }

            if (!Schema::hasColumn('students', 'enrollment_date')) {
                $table->date('enrollment_date')->nullable()->after('registration_number');
            }

            if (!Schema::hasColumn('students', 'status')) {
                $table->string('status')->default('active')->after('enrollment_date');
            }

        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {

            if (Schema::hasColumn('students', 'gender')) {
                $table->dropColumn('gender');
            }

            if (Schema::hasColumn('students', 'registration_number')) {
                $table->dropColumn('registration_number');
            }

            if (Schema::hasColumn('students', 'enrollment_date')) {
                $table->dropColumn('enrollment_date');
            }

            if (Schema::hasColumn('students', 'status')) {
                $table->dropColumn('status');
            }

        });
    }
};