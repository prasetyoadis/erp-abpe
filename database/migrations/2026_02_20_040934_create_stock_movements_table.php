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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('warehouse_id');
            $table->ulidMorphs('reference'); // sales, purchase, production, adjustment
            $table->ulidMorphs('item'); // products, materials
            $table->enum('movement_type', ['IN', 'OUT', 'ADJUSTMENT', 'PRODUCTION_USE']);
            $table->integer('quantity');
            $table->bigInteger('unit_cost')->nullable();
            $table->bigInteger('total_cost')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
