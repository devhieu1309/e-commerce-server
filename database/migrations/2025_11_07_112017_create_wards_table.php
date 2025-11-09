<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->bigIncrements('wards_id');
            $table->unsignedBigInteger('districts_id')->nullable();

            $table->string('code', 10)->nullable();
            $table->string('name', 100);
            $table->string('codename', 100)->nullable();
            $table->string('division_type', 50)->nullable();
            $table->string('short_codename', 100)->nullable();

            $table->timestamps();

            $table->foreign('districts_id')->references('districts_id')->on('districts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wards');
    }
};
