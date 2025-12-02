<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_line', function (Blueprint $table) {
            $table->id('order_line_id');
            $table->unsignedBigInteger('product_item_id');
            $table->unsignedBigInteger('shop_order_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('product_item_id')->references('product_item_id')->on('product_items')->onDelete('restrict');
            $table->foreign('shop_order_id')->references('shop_order_id')->on('shopping_order')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_line');
    }
};
