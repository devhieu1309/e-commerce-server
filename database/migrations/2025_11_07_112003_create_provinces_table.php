<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('provinces_id');
            $table->unsignedBigInteger('countries_id')->nullable();

            $table->string('code', 10)->nullable();
            $table->string('name', 100);
            $table->string('codename', 100)->nullable();
            $table->string('division_type', 50)->nullable();
            $table->string('phone_code', 10)->nullable();

            $table->timestamps();

            $table->foreign('countries_id')->references('countries_id')->on('countries')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
