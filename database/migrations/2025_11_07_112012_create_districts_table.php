<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('districts_id');
            $table->unsignedBigInteger('provinces_id')->nullable();

            $table->string('code', 10)->nullable();
            $table->string('name', 100);
            $table->string('codename', 100)->nullable();
            $table->string('division_type', 50)->nullable();
            $table->string('short_codename', 100)->nullable();

            $table->timestamps();

            $table->foreign('provinces_id')->references('provinces_id')->on('provinces')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
