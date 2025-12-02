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
        Schema::create('compare_products', function (Blueprint $table) {
            $table->bigIncrements('compare_product_id');
            $table->foreignId('product_item_id')
                ->constrained('product_items', 'product_item_id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('user_id')
                ->nullable(true)
                ->constrained('users', 'user_id')
                ->onDelete('cascade')
                ->onUpdate('cascade')
            ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compare_product');
    }
};
