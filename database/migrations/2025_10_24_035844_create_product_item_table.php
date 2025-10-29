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
        //
        Schema::create('product_item', function (Blueprint $table) {
            $table->id();
            $table->char('SKU', 20);
            $table->integer('qty_in_stock'); // không auto_increment, không primary key
            $table->string('product_image', 255);
            $table->decimal('price', 10, 2); // sửa decimal đúng cú pháp
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
