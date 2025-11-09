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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('address_id');

            // Liên kết user
            $table->foreignId('user_id')
                ->constrained('users', 'user_id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            // Liên kết quốc gia (KHÔNG ràng buộc foreign key nữa)
            $table->unsignedBigInteger('countries_id')->nullable(); // hoặc string nếu bảng SQL dùng VARCHAR

            // Liên kết tỉnh/thành
            $table->unsignedBigInteger('provinces_id')->nullable();

            // Liên kết quận/huyện
            $table->unsignedBigInteger('districts_id')->nullable();

            // Liên kết phường/xã
            $table->unsignedBigInteger('wards_id')->nullable();

            // Thông tin chi tiết
            $table->string('name', 100);
            $table->string('phone', 20);
            $table->string('company', 100)->nullable();
            $table->string('detailed_address', 255);
            $table->string('zip', 10)->nullable();
            $table->boolean('isDefault')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
