<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shopping_order', function (Blueprint $table) {
            $table->id('shop_order_id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('order_date');
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('customer_address_id')->nullable();
            $table->unsignedBigInteger('shipping_method_id');
            $table->decimal('order_total', 10, 2);
            $table->unsignedBigInteger('order_status_id');
            $table->timestamps();

            //Khóa ngoại
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('payment_type_id')->references('payment_type_id')->on('payment_type')->onDelete('restrict');
            $table->foreign('address_id')->references('address_id')->on('addresses')->onDelete('restrict');
            $table->foreign('customer_address_id')->references('customer_address_id')->on('customer_addresses')->onDelete('restrict');
            $table->foreign('shipping_method_id')->references('shipping_method_id')->on('shipping_methods')->onDelete('restrict');
            $table->foreign('order_status_id')->references('order_status_id')->on('order_status')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_order');
    }
};
