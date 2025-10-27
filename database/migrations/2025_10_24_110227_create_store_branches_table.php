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
        Schema::create('store_branches', function (Blueprint $table) {
            $table->bigIncrements('store_branch_id');
            $table->string('name', 255);
            $table->string('phone_number', 20)->nullable(false);
            $table->string('email', 80)->nullable(false);
            $table->string('opening_hours', 50)->nullable(false);
            $table->foreignId('address_id')
                ->constrained('addresses', 'address_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->decimal('latitude', 9, 6)->nullable(); // Vĩ độ
            $table->decimal('longitude', 9, 6)->nullable(); // Kinh độ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_branches');
    }
};
