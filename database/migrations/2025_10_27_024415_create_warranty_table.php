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
        Schema::create('warranty', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number', 100)->nullable(false);
            $table->enum('warranty_status', ['Còn bảo hành', 'Hết hạn bảo hành'])->default('Còn bảo hành');
            $table->date('warranty_start')->nullable();
            $table->date('warranty_expiry')->nullable();
            $table->string('branch', 100)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('warranty');
    }
};
