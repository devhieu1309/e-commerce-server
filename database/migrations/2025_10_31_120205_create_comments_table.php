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
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->string('fullname', 255)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->text('content')->nullable(false);
            $table->foreignId('news_id')->constrained('news')->onDelete('cascade');
            $table->foreignId('user_id')->nullable(true)->constrained('users', 'user_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
