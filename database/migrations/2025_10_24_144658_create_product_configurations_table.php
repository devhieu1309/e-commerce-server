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
         Schema::create('product_configurations', function (Blueprint $table) {
            $table->foreignId('product_item_id')
                ->constrained('product_items', 'product_item_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('variation_option_id')
                ->constrained('variation_options', 'variation_option_id')       
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
        Schema::dropIfExists('product_configurations');
    }
};
