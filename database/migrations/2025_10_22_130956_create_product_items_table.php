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
        Schema::create('product_items', function (Blueprint $table) {
            $table->bigIncrements('product_item_id');
            $table->string('SKU', 50);
            $table->integer('qty_in_stock')->nullable(false);
            $table->decimal('price', 10, 2)->nullable(false);
            $table->string('image')->nullable(false);
            $table->foreignId('product_id')
                ->constrained('products', 'product_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
