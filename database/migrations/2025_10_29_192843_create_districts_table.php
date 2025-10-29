<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->string('name', 100);
            $table->string('full_name', 255);
            $table->unsignedBigInteger('province_id')->nullable();
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
