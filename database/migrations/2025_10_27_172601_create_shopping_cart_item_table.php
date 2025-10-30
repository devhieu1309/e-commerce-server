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
        Schema::create('shopping_cart_item', function (Blueprint $table) {
            $table->bigIncrements('shopping_cart_item_id');
            $table->foreignId('shopping_cart_id')->constrained('shopping_cart','shopping_cart_id')->onDelete('cascade');
            $table->foreignId('product_item_id')->constrained('product_items', 'product_item_id')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_cart_item');
    }
};
