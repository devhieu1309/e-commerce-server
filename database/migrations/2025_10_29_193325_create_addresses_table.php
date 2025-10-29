<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();

            $table->string('full_name');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->text('address_line');
            $table->string('zip')->nullable();
            $table->boolean('is_default')->default(false);
            $table->timestamps();

            // === Foreign Keys ===
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
