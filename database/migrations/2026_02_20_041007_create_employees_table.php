<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('employee_code');
            $table->string('name');
            $table->foreignUlid('departement_id');
            $table->string('position');
            $table->enum('employment_type', ['full_time', 'part_time']);
            $table->date('join_date');
            $table->bigInteger('salary');
            $table->enum('status', ['active', 'on_leave', 'resigned']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
