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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('unit_price', 10, 2);
            $table->bigInteger('stock_quantity')->nullable();
            $table->bigInteger('selling_quantity');
            $table->bigInteger('emergency_quantity')->nullable();
            $table->bigInteger('total_quantity')->nullable();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade')->onUpdate('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
