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
        Schema::create('qc_records', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('work_order_id');
            $table->foreignId('inspector_id')->constrained('employees');
            $table->enum('status', ['pass', 'fail', 'pending'])->default('pending');
            $table->integer('inspected_quantity');
            $table->text('notes')->nullable();
            $table->date('inspection_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qc_records');
    }
};
