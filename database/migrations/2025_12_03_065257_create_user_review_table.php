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
        Schema::create('user_review', function (Blueprint $table) {
            $table->bigIncrements('user_review_id');
            $table->tinyInteger('rating')->nullable(false);
            $table->text('comment')->nullable(true);

            $table->foreignId('user_id')
                ->constrained('users', 'user_id')
                ->onDelete('cascade');

            $table->foreignId('shop_order_id')
                ->constrained('shopping_order', 'shop_order_id')
                ->onDelete('cascade')
                ->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_review');
    }
};
