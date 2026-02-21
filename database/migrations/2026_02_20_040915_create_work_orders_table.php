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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('wo_number')->unique();
            $table->foreignUlid('product_id');
            $table->foreignUlid('machine_id');
            $table->integer('planned_quantity');
            $table->integer('produced_quantity')->default(0);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['planned', 'running', 'qc', 'done'])->default('planned');
            $table->text('note')->nullable();
            $table->timestamps();
        });

        Schema::create('work_order_materials', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('work_order_id');
            $table->foreignUlid('material_id');
            $table->integer('planned_qty');
            $table->integer('actual_qty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order_materials');
        Schema::dropIfExists('work_orders');
    }
};
