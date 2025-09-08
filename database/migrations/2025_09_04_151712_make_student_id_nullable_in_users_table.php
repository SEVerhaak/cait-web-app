<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop the existing unique index on student_id
            $table->dropUnique('users_student_id_unique');
        });

        Schema::table('users', function (Blueprint $table) {
            // Make student_id nullable and keep unique
            $table->string('student_id')->nullable()->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Revert student_id to not nullable
            $table->dropUnique('users_student_id_unique');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('student_id')->unique()->change();
        });
    }
};
