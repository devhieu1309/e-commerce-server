<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->bigIncrements('customer_address_id');


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->string('name', 100)->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('company')->nullable();
            $table->string('detailed_address', 255);


            $table->unsignedBigInteger('provinces_id');
            $table->foreign('provinces_id')
                ->references('provinces_id')
                ->on('provinces')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->unsignedBigInteger('wards_id');
            $table->foreign('wards_id')
                ->references('wards_id')
                ->on('wards')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('isDefault')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
